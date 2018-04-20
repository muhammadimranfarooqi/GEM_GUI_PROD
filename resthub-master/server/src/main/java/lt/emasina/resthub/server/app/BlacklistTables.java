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
package lt.emasina.resthub.server.app;

import java.util.Arrays;
import java.util.Collections;
import java.util.HashSet;
import lt.emasina.resthub.server.exception.ServerErrorException;
import lt.emasina.resthub.server.table.ServerTable;
import lt.emasina.resthub.server.table.TableId;
import org.json.JSONException;
import org.json.JSONObject;
import org.restlet.data.Method;
import org.restlet.data.Status;
import org.restlet.ext.json.JsonRepresentation;
import org.restlet.resource.Delete;
import org.restlet.resource.Get;
import org.restlet.resource.Options;

public class BlacklistTables extends ServerBaseResource {
    
    private String namespace = null;
    
    @Override
    public void doInit() {
        super.doInit();
        this.namespace = super.getAttr(String.class, "tableNs");
    }
    
    @Options
    public void define() {
        getResponse().setAccessControlAllowMethods(new HashSet<>(Arrays.asList(Method.DELETE, Method.GET, Method.OPTIONS)));
        getResponse().setAccessControlAllowHeaders(Collections.singleton("Content-Type"));
        addHeader("X-Content-Types", "application/json");
    }
    
    @Get
    public void describe() {
        try {
            JSONObject ret = new JSONObject();
            for (ServerTable tmd : mf.getBlacklist()) {
                TableId id = tmd.getId();
                if (namespace != null) {
                    if (namespace.equals(id.getNamespace())) {
                        ret.put(id.getName(), tmd.getReference("blacklist", getHostRef()));
                    }
                } else {
                    if (!ret.has(id.getNamespace())) {
                        ret.put(id.getNamespace(), new JSONObject());
                    }
                    JSONObject nso = (JSONObject) ret.get(id.getNamespace());
                    nso.put(id.getName(), tmd.getReference("blacklist", getHostRef()));
                }
            }
            getResponse().setEntity(new JsonRepresentation(ret));
            
        } catch (JSONException ex) {
            throw new ServerErrorException(ex);
        }
    }
    
    @Delete
    public void remove() {
        if (namespace == null) {
            mf.clearBlacklist();
        } else {
            mf.clearBlacklist(namespace);
        }
        getResponse().setStatus(Status.SUCCESS_OK);
    }
    
}
