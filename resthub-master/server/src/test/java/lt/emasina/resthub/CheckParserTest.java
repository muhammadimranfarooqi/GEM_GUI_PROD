package lt.emasina.resthub;

import lt.emasina.resthub.util.AbstractParser;
import lt.emasina.resthub.server.parser.check.SubSelectDef;
import lt.emasina.resthub.server.table.ServerTable;
import lt.emasina.resthub.server.table.TableId;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.junit.runners.JUnit4;

import org.quartz.SchedulerException;

/**
 * SelectParserTestSuite
 * @author valdo
 */
@RunWith(JUnit4.class)
public class CheckParserTest extends AbstractParser {
    
    public CheckParserTest() throws SchedulerException {}    
    
    @Test
    public void testSimpleSQL() {
        SubSelectDef ssd = getSubSelectDef("select * from test.customer a");
        assertEquals(1, ssd.getTables().size());
        assertEquals("a", ssd.getTables().keySet().iterator().next());
        assertEquals(0, ssd.getChildren().size());
        assertEquals(0, ssd.getParameterNames().size());
    }

    @Test
    public void testLateralSubSelectSQL() {
        SubSelectDef ssd = getSubSelectDef("select * from (select * from test.customer a) b");
        assertEquals(ssd.getTables().size(), 1);
        assertEquals("b", ssd.getTables().keySet().iterator().next());
        
        assertEquals(mf.getTable(new TableId("test", "customer")), ssd.getServerTable("a"));
        assertEquals(0, ssd.getChildren().size());
        assertEquals(0, ssd.getParameterNames().size());
    }
    
    @Test
    public void testExpressionSubSelectSQL() {
        SubSelectDef ssd = getSubSelectDef("select * from test.customer a where a.id = (select b.id from test.customer b where b.id = 10)");
        assertEquals(ssd.getTables().size(), 1);
        assertEquals("a", ssd.getTables().keySet().iterator().next());
        
        ServerTable t = mf.getTable(new TableId("test", "customer"));
        assertEquals(t, ssd.getServerTable("a"));
        assertEquals(t, ssd.getServerTable("b"));
        assertEquals(1, ssd.getChildren().size());
        assertEquals(0, ssd.getParameterNames().size());
    }
    
    @Test
    public void testParametersSubSelectSQL() {
        SubSelectDef ssd = getSubSelectDef("select * from test.customer a where a.id = (select b.id from test.customer b where b.id = :id) and a.name = :name");
        assertEquals(ssd.getTables().size(), 1);
        assertEquals("a", ssd.getTables().keySet().iterator().next());
        
        ServerTable t = mf.getTable(new TableId("test", "customer"));
        assertEquals(t, ssd.getServerTable("a"));
        assertEquals(t, ssd.getServerTable("b"));
        assertEquals(1, ssd.getChildren().size());
        assertEquals(1, ssd.getParameterNames().size());
        assertEquals("name", ssd.getParameterNames().iterator().next());
        
    }
    
}
