<?php 
include "head.php";


?>
<?php include "head_panel.php"; ?>
<<style>
<!--
input[type=checkbox]{
margin-bottom:10px;
margin-right: 10px;
margin-left: 10px;
}
-->
</style>
    <div class="container-fluid" align="left">
      <div class="row">
<?php  include "side.php"; ?>  
<?php $drifts=  get_list_part_ID($SUPER_CHAMBER_KIND_OF_PART_ID); ?>     
<script src="https://code.highcharts.com/6.0.0/highcharts.js"></script>
<script src="https://code.highcharts.com/6.0.0/modules/sunburst.js"></script>
 <div class="container-fluid">
	<div class="row">

	
	 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	  <h2 class="sub-header"> <img src="images/sc2.png" width="4%"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Super Chamber Location </h2>
</div>   
<form method="POST" action="convert_sup_chambers_location_wheel.php" enctype='multipart/form-data'> 
<div class="row" align="center">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">

                <div class="panel-heading">Add Super Chambers Location</div>
 
                <div class="panel-body">
 
			<div class="container-fluid">
				<div class="form-group">
				<div class="row-fluid">
				
		                    <div  class="col-xs-6 col-md-6" id="wheel1"></div>
		                    <div  class="col-xs-6 col-md-6" id="wheel2"></div>
		                </div>
		              
		            </div>
		           
                <div class="row">
                 <div class="form-group">   
                    <input type="hidden" name="INSTALLATION_LOCATION" id ="tb2" />
                <h3>Selected Location: <span id="span" class="d-block p-2 bg-dark text-white"></span></h3>
				
				</div>
				</div>
				<div class="row">
				<div class="form-group">
                                      <lable>Select Super Chamber:</lable>
                                       <span class="alert-danger foilalert" hidden> <i class="ace-icon fa fa-times-circle alert-danger"></i> </span>
                                   
					<select name="SC_SERIAL_NO">

				        <?php list_superchambers_combobox();?>
				        </select>
				      </div>
				</div>
				<div class="row">
						<div class="form-group">
                        <input type="hidden" name="submited" value="true" /><br>

						<input type="checkbox" name="COOLING_CLOSED" value="Y"><label> Cooling Closed</label>
						<input type="checkbox" name="LV_CONNECTED" value="Y"><label> LV Connected</label>
						<input type="checkbox" name="HV_CONNECTED" value="Y"><label> HV Connected</label>
					<input type="checkbox" name="FIBRES_CONNECTED" value="Y"><label> Fibres Connected</label>
						<input type="checkbox" name="GAS_CONNECTED" value="Y"><label>Gas connection closed</label>
						<input type="checkbox" name="DAQ_CONNECTION_DONE" value="Y"><label>DAQ connection closed</label><br>
						<input type="checkbox" name="SC_INSERTED" value="Y"><label>SC Inserted</label>
						<input type="checkbox" name="GAS_LEAK_TEST_PASSED" value="Y"><label>Gas Leak Test Passed</label>
						<input type="checkbox" name="COOLING_PRESSURE_TEST_PASSED" value="Y"><label>Cooling Pressure Test Passed</label>
						<input type="checkbox" name="TEMP_CHAIN_CONNECTED" value="Y"><label>Temp Chain Connected</label>
						<input type="checkbox" name="RADMON_CONNECTED" value="Y"><label>Radmon Connected</label>

						</div>
				</div>
				<div class="row">
				 <div class="form-group">
				  <lable>Installation Date:</lable>
				<input type="date" class="datepicker" name="INSTALLATION_DATE" data-date-format="mm/dd/yyyy">
       
    
				 </div>
				
				</div>
				<div class="row">
				 <div class="form-group">
				 <button type="submit" class="btn btn-default subbutt">Submit</button>
				 </div>
				 </div>
				</div>
				</div>
				</div>
				</div>
				
                </div>
                </form>

            </div>

        </div>

    </div>

</div>
  <?php 
include "foot.php";

?>
<script>
var data = [{
    id: '0.0',//GE1M01 - GE1M36
    parent: '',
    name: '+1'
},
{
    id: 'GE11P09',
    parent: '0.0',
  
    value: 1
}, {
    id: 'GE11P08',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11P07',
    parent: '0.0',
  
    value: 1
}, {
    id: 'GE11P06',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P05',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P04',
    parent: '0.0',
   
    value: 1
}, {
    id: 'GE11P03',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11P02',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P01',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P36',
    parent: '0.0',

    value: 1
}
, {
    id: 'GE11P35',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P34',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P33',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P32',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P31',
    parent: '0.0',
 
    value: 1
}
, {
    id: 'GE11P30',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P29',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11P28',
    parent: '0.0',
  
    value: 1
}, {
    id: 'GE11P27',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P26',
    parent: '0.0',
 
    value: 1
}
, {
    id: 'GE11P25',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P24',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P23',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P22',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P21',
    parent: '0.0',
  
    value: 1
}
, {
    id: 'GE11P20',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11P19',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P18',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11P17',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P16',
    parent: '0.0',

    value: 1
}
, {
    id: 'GE11P15',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11P14',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11P13',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11P12',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11P11',
    parent: '0.0',

    value: 1
}
, {
    id: 'GE11P10',
    parent: '0.0',

    value: 1
}
];
var data1 = [{
    id: '0.0',//GE11M01 - GE11M36
    parent: '',
    name: '-1'
},
{
    id: 'GE11M09',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11M08',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M07',
    parent: '0.0',
  
    value: 1
}, {
    id: 'GE11M06',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11M05',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11M04',
    parent: '0.0',
  
    value: 1
}, {
    id: 'GE11M03',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M02',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M01',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M36',
    parent: '0.0',

    value: 1
}
, {
    id: 'GE11M35',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M34',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11M33',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11M32',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M31',
    parent: '0.0',

    value: 1
}
, {
    id: 'GE11M30',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11M29',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M28',
    parent: '0.0',
  
    value: 1
}, {
    id: 'GE11M27',
    parent: '0.0',
 
    value: 1
}, {
    id: 'GE11M26',
    parent: '0.0',

    value: 1
}
, {
    id: 'GE11M25',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M24',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M23',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M22',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M21',
    parent: '0.0',

    value: 1
}
, {
    id: 'GE11M20',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M19',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M18',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M17',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M16',
    parent: '0.0',

    value: 1
}
, {
    id: 'GE11M15',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M14',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M13',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M12',
    parent: '0.0',

    value: 1
}, {
    id: 'GE11M11',
    parent: '0.0',

    value: 1
}
, {
    id: 'GE11M10',
    parent: '0.0',

    value: 1
}

/*for (i = 1; i <= 36; i++) {
	 document.write (",<br>{"+"id:"+i+ ",");
	 document.write	( "<br>parent:'0.0' ,");
	 document.write	 ("<br>value:1"+"<br>");
	 if(i==36){
		 document.write	 ("<br>}");
		 }
	  else{
	 document.write	 ("<br>},");}	 
}*/

//GE1M01 - GE1M36
//GE1P01- GE1P36
];
// Splice in transparent for the center circle
Highcharts.getOptions().colors.splice(0, 0, 'transparent');


Highcharts.chart('wheel1', {

    chart: {
        height: '60%'
    },
	credits: {
	        enabled: false
	    },

    title: {
        text: 'GE11P01- GE11P36'
    },
    subtitle: {
        text: 'CMS - GEM'
    },
    series: [{
        type: "sunburst",
        data: data,
        allowDrillToNode: true,
        cursor: 'pointer',
        point: {
            events: {
                click: function () {
                   // alert("alert"+this.id);
                    document.getElementById("tb2").value = this.id;
                    document.getElementById("span").textContent  = this.id;
                    
                    
                }
            }
           },
        dataLabels: {
            format: '{}',
           /* filter: {
                property: 'innerArcLength',
                operator: '>',
                value: 16
            }*/
        },
        levels: [{
            level: 1,
            levelIsConstant: false,
            dataLabels: {
               
            }
        }, {
            level: 2,
            colorByPoint: true,
           // colorIndex: 1,
            color:'#2f7ed8'
            	 
        },
        {
            level: 3,
            colorVariation: {
               // key: 'brightness',
               // to: -0.5
            }
        }, {
            level: 4,
            colorVariation: {
               // key: 'brightness',
               // to: 0.5
            }
        }]

    }],
    tooltip: {
        headerFormat: "",
        pointFormat: '{point.id}'
    }
});
Highcharts.chart('wheel2', {

    chart: {
        height: '60%'
    },
  credits: {
	        enabled: false
	    },
    title: {
        text: 'GE11M01 - GE11M36'
    },
    subtitle: {
        text: 'CMS - GEM'
    },
    series: [{
        type: "sunburst",
        data: data1,
        allowDrillToNode: true,
        cursor: 'pointer',
        point: {
            events: {
                click: function () {
                   // alert("alert"+this.id);
                    document.getElementById("tb2").value = this.id;
                    document.getElementById("span").textContent  = this.id;
                    
                    
                }
            }
           },
        dataLabels: {
            format: '{}',
           /* filter: {
                property: 'innerArcLength',
                operator: '>',
                value: 16
            }*/
        },
        levels: [{
            level: 1,
            levelIsConstant: false,
            dataLabels: {
               
            }
        }, {
            level: 2,
            colorByPoint: true,
           // colorIndex: 1,
            color:'#2f7ed8'
            	 
        },
        {
            level: 3,
            colorVariation: {
               // key: 'brightness',
               // to: -0.5
            }
        }, {
            level: 4,
            colorVariation: {
               // key: 'brightness',
               // to: 0.5
            }
        }]

    }],
    tooltip: {
        headerFormat: "{point.value}",
        pointFormat: '{point.id}'
    }
});</script>
