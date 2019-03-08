
<?php
include "head.php";
?>
<?php include "head_panel.php"; ?>



<div class="container-fluid">
    <div class="row">

        <?php include "side.php"; ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header"> <img src="images/c2.png" width="4%">Edit Chamber  </h1>

            <!--<a href="edit_chamber.php?id=<?php /*echo $_GET["id"];*/ ?>"><button class="btn btn-success" type="button">Edit</button></a>-->
            <a href="list_chambers.php"><button class="btn btn-warning" type="button"><span aria-hidden="true" class="glyphicon glyphicon-backward"></span>Back to list</button></a>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Chamber [<?php echo $_GET["id"]; ?>] </h3>
                </div>
                <div class="panel-body">
                     <?php
                                $data = get_part_by_ID($_GET["id"]);
                                if (!empty($data)) {
                                    ?>
                   <div class="row">
                        <div class="col-md-8">
                            <div class="row">



                                <div class=" col-md-12 col-lg-12 "> 
                                    <table class="table table-user-information">
                                        <tbody>
                             <?php
                                    if (!empty($data[0]['PART_ID'])) {
                                        ?> <tr>
                                                <th>ID</th>
                                                <td><?= $data[0]['PART_ID'] ?></td>
                                            </tr> <?php
                                    }
                                    if (!empty($data[0]['SERIAL_NUMBER'])) {
                                        ?> <tr>
                                                <th>Serial Number:</th>
                                                <td><?= $data[0]['SERIAL_NUMBER'] ?></td>
                                            </tr> <?php
$serial_num = $data[0]['SERIAL_NUMBER'];
$check_long = '-L-';
if (strpos($serial_num, '-S-') !== false) {
  //  echo 'true';
    $check_long = '-S-';
//	echo $check_long;
}
                                    }

                                    if (!empty($data[0]['NAME_LABEL'])) {
                                        ?> 
                                            <tr>
                                                <th>Name Label:</th>
                                                <td><?= $data[0]['NAME_LABEL'] ?></td>
                                            </tr>
                                            <?php
                                    }
                                    if (!empty($data[0]['BARCODE'])) {
                                        ?> 
                                            <tr>
                                                <th>Barcode:</th>
                                                <td> <?= $data[0]['BARCODE']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    
                                    if (!empty($data[0]['RECORD_INSERTION_TIME'])) {
                                        ?> 
                                            <tr>
                                                <th>Inserted at:</th>
                                                <td> <?= $data[0]['RECORD_INSERTION_TIME']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    if (!empty($data[0]['RECORD_INSERTION_USER'])) {
                                        ?> 
                                            <tr>
                                                <th>Inserted by:</th>
                                                <td> <?= $data[0]['RECORD_INSERTION_USER']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    if (!empty($data[0]['MANUFACTURER_ID'])) {
                                        ?> 
                                            <tr>
                                                <th>Manufacturer name:</th>
                                                <td><?= $data[0]['MANUFACTURER_ID']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    if (!empty($data[0]['LOCATION_ID'])) {
                                        ?> 
                                             <tr>
                                                 <th>Location:</th>
                                                <td><?= $data[0]['LOCATION_ID']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    if (!empty($data[0]['COMMENT_DESCRIPTION'])) {
                                        ?> 
                                            <tr>
                                                <th>Comment or description:</th>
                                                <td><?= $data[0]['COMMENT_DESCRIPTION']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        <!--<div class="col-md-4"><img alt="200x200" class="img-thumbnail" data-src="holder.js/200x200" style="width: 200px; height: 200px;" src="uploads/GEM.png" data-holder-rendered="true"></div>-->
                    </div>
                                            <?php
                                } else {
                                    echo "No Item found for this ID";
                                }
                                ?>
<!--                     Panel content 
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">



                                <div class=" col-md-12 col-lg-12 "> 
                                    <table class="table table-user-information">
                                        <tbody>
                                            <tr>
                                                <td>Serial Number</td>
                                                <td><//?php echo $_GET["id"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Manufacturer name:</td>
                                                <td>XYZ</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td><span class="label label-success">Accepted</span></td>
                                            </tr>

                                            <tr>
                                            <tr>
                                                <td>equipped with diodes?</td>
                                                <td><span aria-hidden="true" class="glyphicon glyphicon-ok"></span></td>
                                            </tr>
                                            <tr>
                                                <td>Username:</td>
                                                <td> Mr. X</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><a href="mailto:info@support.com">x@cern.ch</a></td>
                                            </tr>


                                        </tbody>
                                    </table>

                                     <a href="#" class="btn btn-primary">My Sales Performance</a>
                                     <a href="#" class="btn btn-primary">Team Sales Performance</a>
                                </div>
                            </div>
                            </div>
                        <div class="col-md-4"><img alt="200x200" class="img-thumbnail" data-src="holder.js/200x200" style="width: 200px; height: 200px;" src="uploads/GEM.png" data-holder-rendered="true"></div>
                    </div>-->
                   <div class="row">
                                <div class="col-md-6"><div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Current Detector parts:</h3>
                                        </div>
                                        <div class="panel-body">
                                            <ul class="list-group">
                                                <?php get_attached_parts($data[0]['PART_ID']); ?>
                                            </ul>
                                        </div>
                                    </div></div>

  <div class="row">
                                <div class="col-md-6"><div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Attach New Detector parts:</h3>
                                        </div>

<div class="panel-body">


    <form id="attachmentform"  class="form-horizontal" method="post" action="edit_chamber_process.php"  name="attachmentform">

<input type="hidden" class="form-control"  name="serial_number" value="<?= $data[0]['SERIAL_NUMBER'] ?>"  />   





<?php 

	global $VFAT2_TO_GEB;
    global $OPTOHYBRID_TO_GEB;
    global $OPTOHYBRID_TO_CHAMBER;
 
    global $COOLING_PLATE_TO_CHAMBER;
    global $TEMP_SENSOR_TO_CHAMBER;
    global $RADMON_SENSOR_TO_CHAMBER;


   global $GEB_TO_READOUT;
    global $GEB_NARROW_TO_CHAMBER;

    global $GEB_WIDE_TO_CHAMBER;

    global $READOUT_TO_CHAMBER;

    global $FRAME_TO_CHAMBER;
    global $DRIFT_TO_CHAMBER;
    global $FOIL_TO_CHAMBER;
    global $CHAMBER_KIND_OF_PART_NAME;
    global $DRIFT_KIND_OF_PART_NAME;
    global $FOIL_KIND_OF_PART_NAME;
    global $READOUT_KIND_OF_PART_NAME;
    global $FRAME_KIND_OF_PART_NAME;
    global $VFAT_KIND_OF_PART_NAME;
    global $OPTOHYBRID_KIND_OF_PART_NAME;
    global $GEB_KIND_OF_PART_NAME;
    global $GEB_NARROW_KIND_OF_PART_NAME;
    global $GEB_WIDE_KIND_OF_PART_NAME;
//    global $GEB_NARROW_KIND_OF_PART_ID
    global $CHAMBER_TO_SUPER_CHAMBER;
    global $GEB_NARROW_KIND_OF_PART_ID;
    global $GEB_WIDE_KIND_OF_PART_ID;


    global $COOLING_PLATE_KIND_OF_PART_NAME;
    global $TEMP_SENSOR_KIND_OF_PART_NAME;
    global $RADMON_SENSOR_KIND_OF_PART_NAME;


    // Database connection
    $conn = database_connection();
 $sql = "select PART_ID, RELATIONSHIP_ID from CMS_GEM_CORE_CONSTRUCT.PHYSICAL_PARTS_TREE where PART_PARENT_ID='" . $data[0]['PART_ID'] . "' AND IS_RECORD_DELETED = 'F'"; //select data or insert data


    $query = oci_parse($conn, $sql);
    //Oci_bind_by_name($query,':bind_name',$bind_para); //if needed
    $arr = oci_execute($query);

    $result_arr = array();
//echo $FOIL_TO_CHAMBER;


 $sqltemp = "select RELATIONSHIP_ID from CMS_GEM_CORE_CONSTRUCT.PART_TO_ATTR_RLTNSHPS  where DISPLAY_NAME = 'GEM Foil to Foil Position' AND IS_RECORD_DELETED = 'F'"; //sel

 $querytemp = oci_parse($conn, $sqltemp);
    //Oci_bind_by_name($query,':bind_name',$bind_para); //if needed
    $arrtemp = oci_execute($querytemp);

        $relationship_id_foil_position = 0;
    $result_arrtemp = array();
    while ($rowtemp = oci_fetch_array($querytemp, OCI_ASSOC + OCI_RETURN_NULLS)) {
        $relationship_id_foil_position =        $rowtemp['RELATIONSHIP_ID'];
//echo $relationship_id_foil_position;
}




$positionarrp =  array();
$driftcheck = "";
$framecheck = "";
$readoutcheck = "";
$gebnarrowcheck = "";
$gebwidecheck = "";
$ohcheck = "";
$coolingplatecheck = "";
$tempsensorcheck = "";
$redmonsensorcheck = "";

$count = 0;
    while ($row = oci_fetch_array($query, OCI_ASSOC + OCI_RETURN_NULLS)) {

        // foil -> chamber
        if ($row['RELATIONSHIP_ID'] === $FOIL_TO_CHAMBER) {

 	    $serialarr = getSerialById($row['PART_ID']);
            $serial = $serialarr[0]['SERIAL_NUMBER'];

            $positionarr = get_attribute_position($row['PART_ID'], $relationship_id_foil_position);
            $position = $positionarr[0]['POSITION'];
            array_push($positionarrp, $position);
//	    $count++;
	}
	else if ($row['RELATIONSHIP_ID'] === $DRIFT_TO_CHAMBER) {
            $serialarr = getSerialById($row['PART_ID']);
            $serial = $serialarr[0]['SERIAL_NUMBER'];
	    $driftcheck = $serial;
  //          $count++;

        }


	else if ($row['RELATIONSHIP_ID'] === $FRAME_TO_CHAMBER) {
            $serialarr = getSerialById($row['PART_ID']);
            $serial = $serialarr[0]['SERIAL_NUMBER'];
            $framecheck = $serial;
    //        $count++;

}


	else if ($row['RELATIONSHIP_ID'] === $READOUT_TO_CHAMBER) {
            $serialarr = getSerialById($row['PART_ID']);
            $serial = $serialarr[0]['SERIAL_NUMBER'];
	    $readoutcheck = $serial;
 //           $count++;

}
   else if ($row['RELATIONSHIP_ID'] === $GEB_NARROW_TO_CHAMBER) {
            $serialarr = getSerialById($row['PART_ID']);
            $serial = $serialarr[0]['SERIAL_NUMBER'];
            $gebnarrowcheck = $serial;
//           $count++;
}
 else if ($row['RELATIONSHIP_ID'] === $GEB_WIDE_TO_CHAMBER) {
           $serialarr = getSerialById($row['PART_ID']);
           $serial = $serialarr[0]['SERIAL_NUMBER'];
          $gebwidecheck = $serial;
 //           $count++;
}



 else if ($row['RELATIONSHIP_ID'] === $OPTOHYBRID_TO_CHAMBER) {
           $serialarr = getSerialById($row['PART_ID']);
           $serial = $serialarr[0]['SERIAL_NUMBER'];
          $ohcheck = $serial;
 //           $count++;
}


 else if ($row['RELATIONSHIP_ID'] === $COOLING_PLATE_TO_CHAMBER) {
           $serialarr = getSerialById($row['PART_ID']);
           $serial = $serialarr[0]['SERIAL_NUMBER'];
          $coolingplatecheck = $serial;
 //           $count++;
}
else if ($row['RELATIONSHIP_ID'] === $TEMP_SENSOR_TO_CHAMBER) {
           $serialarr = getSerialById($row['PART_ID']);
           $serial = $serialarr[0]['SERIAL_NUMBER'];
          $tempsensorcheck = $serial;
 //           $count++;
}
else if ($row['RELATIONSHIP_ID'] === $RADMON_SENSOR_TO_CHAMBER) {
           $serialarr = getSerialById($row['PART_ID']);
           $serial = $serialarr[0]['SERIAL_NUMBER'];
          $redmonsensorcheck = $serial;
 //           $count++;
}

//echo "test". $ohceck;

   }
//print_r($positionarrp);

if (in_array("GEM1", $positionarrp)){
//	echo "true";
}
else {
 
 $parts_available_list = get_available_parts_nohtml($FOIL_KIND_OF_PART_ID, $check_long);
                                if (!empty($parts_available_list)) {
//print_r ($parts_available_list);


 $count++;


?>
<div class="col-sm-4">
               <label > Select Foil 1: </label>

</div>
<div class="col-sm-8">

<select name="foil1" class="form-control">

<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
echo '</select>';
?>
</div>
<?php
}}
?>

<?php 

if (in_array("GEM2", $positionarrp)){
//      echo "true";
}
else {



$parts_available_list = get_available_parts_nohtml($FOIL_KIND_OF_PART_ID, $check_long);
                                if (!empty($parts_available_list)) {
 $count++;

//print_r ($parts_available_list);
?>
<div class="col-sm-4">
 	       <label > Select Foil 2: </label>        

</div>

        
<div class="col-sm-8">


<select name="foil2" class="form-control">

<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";

}
echo '</select>';

?>
</div>

<?php
}}
?>



<?php

if (in_array("GEM3", $positionarrp)){
//      echo "true";
}
else {

 $parts_available_list = get_available_parts_nohtml($FOIL_KIND_OF_PART_ID, $check_long);
                                if (!empty($parts_available_list)) {
 $count++;

//print_r ($parts_available_list);
?>

<div class="col-sm-4">
               <label > Select Foil 3: </label>

</div>

<div class="col-sm-8">

<select name="foil3" class="form-control">

<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}

echo '</select>';

?>
</div>

<?php
}}
?>

<?php

//echo "drift test". $driftcheck;

if(empty($driftcheck)){

 $parts_available_list = get_available_parts_nohtml($DRIFT_KIND_OF_PART_ID, $check_long);
                                if (!empty($parts_available_list)) {
 $count++;

//print_r ($parts_available_list);
?>
<div class="col-sm-4">
               <label > Select Drift: </label>

</div>

<div class="col-sm-8">

<select name="drift" class="form-control">

<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}

echo '</select>';

?>
</div>

<?php
}}
?>


<?php 
if(empty($framecheck)){


$parts_available_list = get_available_parts_nohtml($FRAME_KIND_OF_PART_ID, $check_long);
                                if (!empty($parts_available_list)) {
 $count++;

//print_r ($parts_available_list);
?>
<div class="col-sm-4">
               <label > Select Frame: </label>

</div>

<div class="col-sm-8">

<select name="frame" class="form-control">

<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}

echo '</select>';

?>
</div>

<?php
}
}
?>




<?php
if(empty($readoutcheck)){


 $parts_available_list = get_available_parts_nohtml($READOUT_KIND_OF_PART_ID, $check_long);
                                if (!empty($parts_available_list)) {
 $count++;

//print_r ($parts_available_list);
?>

<div class="col-sm-4">
               <label > Select Readout: </label>

</div>

<div class="col-sm-8">

<select name="readout" class="form-control">

<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}

echo '</select>';

?>
</div>

<?php
}}?>


<?php
if(empty($gebnarrowcheck)){


 $parts_available_list = get_available_parts_nohtml($GEB_NARROW_KIND_OF_PART_ID, $check_long);
                                if (!empty($parts_available_list)) {
 $count++;

//print_r ($parts_available_list);
?>

<div class="col-sm-4">
               <label > Select GEB Narrow: </label>

</div>

<div class="col-sm-8">

<select name="gebnarrow" class="form-control">

<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";

}
echo '</select>';

?>
</div>

<?php
}}?>

<?php
if(empty($gebwidecheck)){


 $parts_available_list = get_available_parts_nohtml($GEB_WIDE_KIND_OF_PART_ID, $check_long);
                                if (!empty($parts_available_list)) {
 $count++;

//print_r ($parts_available_list);
?>

<div class="col-sm-4">
               <label > Select GEB Wide: </label>

</div>

<div class="col-sm-8">

<select name="gebwide" class="form-control">

<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}

echo '</select>';

?>
</div>

<?php
}}?>



<?php
if(empty($ohcheck)){

$parts_available_list = get_available_parts_nohtml($OPTOHYBRID_KIND_OF_PART_ID, $check_long);
                                if (!empty($parts_available_list)) {
 $count++;
//print_r ($parts_available_list);
?>

<div class="col-sm-4">
               <label > Select Opto Hybrid: </label>

</div>

<div class="col-sm-8">

<select name="oh" class="form-control">

<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
echo '</select>';

?>
</div>

<?php
}}?>


<?php
if(empty($coolingplatecheck)){


 $parts_available_list = get_available_parts_nohtml($COOLING_PLATE_KIND_OF_PART_ID, $check_long);
                                if (!empty($parts_available_list)) {
 $count++;

//print_r ($parts_available_list);
?>

<div class="col-sm-5">
               <label > Select Cooling Plate: </label>

</div>

<div class="col-sm-7">

<select name="cooling_plate" class="form-control">

<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
echo '</select>';

?>
</div>

<?php
}}?>

<?php
if(empty($tempsensorcheck)){


 $parts_available_list = get_available_parts_nohtml_noversion($TEMP_SENSOR_KIND_OF_PART_ID);
                                if (!empty($parts_available_list)) {
 $count++;

//print_r ($parts_available_list);
?>

<div class="col-sm-5">
               <label > Select Temp Sensor:</label>

</div>

<div class="col-sm-7">

<select name="temp_sensor" class="form-control">
<option  > </option>
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}

echo '</select>';

?>
</div>

<?php
}}?>


<?php
if(empty($redmonsensorcheck)){


 $parts_available_list = get_available_parts_nohtml_noversion($RADMON_SENSOR_KIND_OF_PART_ID);
                                if (!empty($parts_available_list)) {
 $count++;

//print_r ($parts_available_list);
?>

<div class="col-sm-5">
               <label > Select Redmon Sensor:</label>

</div>

<div class="col-sm-7">

<select name="redmon_sensor" class="form-control">
<option  > </option>
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";

}
echo '</select>';

?>
</div>

<?php
}}?>



<?php 

//echo $count;
if ($count!=0){

//echo $count;
?>
<div class="btn-group" class="col-sm-12" >	      
	<button  class="btn  btn-primary" type="submit"  >Attach</button>
</div>
<?php
}
?>
</form>

</div>











                     </div>




                            </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include "foot.php";
?>
