/*
 * #%L
 * server
 * %%
 * Copyright (C) 2012 - 2015 valdasraps
 * %%
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Lesser Public License for more details.
 * 
 * You should have received a copy of the GNU General Lesser Public
 * License along with this program.  If not, see
 * <http://www.gnu.org/licenses/lgpl-3.0.html>.
 * #L%
 */
package lt.emasina.resthub.server;

import com.google.inject.AbstractModule;
import com.google.inject.assistedinject.FactoryModuleBuilder;
import java.io.InputStream;
import net.sf.jsqlparser.parser.CCJSqlParserManager;
import lt.emasina.resthub.ConnectionFactory;
import lt.emasina.resthub.TableFactory;
import lt.emasina.resthub.server.app.BlacklistTable;
import lt.emasina.resthub.server.app.BlacklistTables;
import lt.emasina.resthub.server.app.Cache;
import lt.emasina.resthub.server.app.Queries;
import lt.emasina.resthub.server.app.Query;
import lt.emasina.resthub.server.app.Count;
import lt.emasina.resthub.server.app.Data;
import lt.emasina.resthub.server.app.Info;
import lt.emasina.resthub.server.app.Lob;
import lt.emasina.resthub.server.app.Table;
import lt.emasina.resthub.server.app.TableData;
import lt.emasina.resthub.server.app.Tables;
import lt.emasina.resthub.server.factory.CacheFactory;
import lt.emasina.resthub.server.factory.MetadataFactory;
import lt.emasina.resthub.server.factory.MetadataFactoryIf;
import lt.emasina.resthub.server.factory.InjectorJobFactory;
import lt.emasina.resthub.server.factory.ResourceFactory;
import org.quartz.Scheduler;
import org.quartz.SchedulerFactory;
import org.quartz.impl.StdSchedulerFactory;
import org.quartz.spi.JobFactory;
import org.restlet.Restlet;
import org.restlet.routing.Filter;
import org.restlet.routing.Router;

public class ServerApp extends BaseApp {
    
    private final AbstractModule[] applicationModules;
    
    public ServerApp(final ConnectionFactory connectionFactory, final TableFactory tableFactory) throws Exception {
        this(connectionFactory, tableFactory, new ServerAppConfig());
    }
    
    public ServerApp(final ConnectionFactory connectionFactory, final TableFactory tableFactory, final ServerAppConfig cfg) throws Exception {
        
        setName("JDBC-Restlet Application");
        setDescription("Application that provides RESTful API to JDBC queries");
        setAuthor("Valdas Rapsevicius, valdas.rapsevicius@cern.ch");
        
        final StdSchedulerFactory schedulerFactory = new StdSchedulerFactory();
        
        // To skip /quartz.properties loading!
        try (InputStream in = SchedulerFactory.class.getResourceAsStream("/org/quartz/quartz.properties")) {
            schedulerFactory.initialize(in); 
        }
        
        final Scheduler scheduler = schedulerFactory.getScheduler();
        
        // Initialize tableFactory recursively
        tableFactory.init(connectionFactory);

        this.applicationModules = new AbstractModule[] { 
            new AbstractModule() {

                @Override
                protected void configure() {
                    
                    bind(ConnectionFactory.class).toInstance(connectionFactory);
                    bind(TableFactory.class).toInstance(tableFactory);
                    bind(CCJSqlParserManager.class).toInstance(new CCJSqlParserManager());
                    install(new FactoryModuleBuilder().build(ResourceFactory.class));
                    bind(JobFactory.class).to(InjectorJobFactory.class);  
                    bind(MetadataFactoryIf.class).to(MetadataFactory.class);
                    bind(Scheduler.class).toInstance(scheduler);
                    bind(ServerAppConfig.class).toInstance(cfg);
                    
                }

            }
        };
        
        getInjector().getInstance(MetadataFactoryIf.class).refresh();
        InjectorJobFactory.startUpdateJob(scheduler, getInjector().getInstance(InjectorJobFactory.class), cfg);
        
        getInjector().getInstance(CacheFactory.class);
        scheduler.start();
        
    }

    @Override
    public synchronized void stop() throws Exception {

        super.stop();
        getInjector().getInstance(Scheduler.class).shutdown();
        getInjector().getInstance(CacheFactory.class).close();
        getInjector().getInstance(TableFactory.class).closeAll();
    }
    
    @Override
    protected AbstractModule[] getApplicationModules() {
        return applicationModules;
    }

    @Override
    public Restlet createInboundRoot() {
        
        Router router = new Router(getContext());

        // GET
        router.attach("/", Tables.class);
        router.attach("/tables", Tables.class);
        router.attach("/tables/{tableNs}", Tables.class);
        router.attach("/table/{tableNs}/{tableName}", Table.class);

        // GET
        router.attach("/info", Info.class);
        
        // GET, DELETE
        router.attach("/blacklist", BlacklistTables.class);
        router.attach("/blacklist/{tableNs}", BlacklistTables.class);
        router.attach("/blacklist/{tableNs}/{tableName}", BlacklistTable.class);
        
        // GET, DELETE
        router.attach("/table/{tableNs}/{tableName}/cache", Cache.class);

        // GET
        router.attach("/queries", Queries.class);

        // POST
        router.attach("/query", Query.class);

        // GET, DELETE
        router.attach("/query/{queryId}", Query.class);

        // GET
        router.attach("/query/{queryId}/count", Count.class);

        // GET
        router.attach("/query/{queryId}/data", Data.class);
        router.attach("/query/{queryId}/page/{perPage}/{page}/data", Data.class);
        router.attach("/query/{queryId}/{row}/{col}/lob", Lob.class);
        router.attach("/query/{queryId}/page/{perPage}/{page}/{row}/{col}/lob", Lob.class);
                
        // GET
        router.attach("/table/{tableNs}/{tableName}/data", TableData.class);
        router.attach("/table/{tableNs}/{tableName}/page/{perPage}/{page}/data", TableData.class);
        
        // GET, DELETE
        router.attach("/query/{queryId}/cache", Cache.class);

        Filter filter = new RequestFilter(getContext());
        filter.setNext(router);

        return filter;

    }

}