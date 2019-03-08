
<?php
include "head.php";
?>
<?php include "head_panel.php"; ?>



<div class="container-fluid">
    <div class="row">

        <?php include "side.php"; ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header"><img src="images/GEB.png" width="4%"> Edit GEB  </h1>

            <!--<a href="edit_gem.php?id=<?php /*echo $_GET["id"];*/ ?>"><button class="btn btn-success" type="button">Edit</button></a>-->
            <a href="list_parts_geb.php"><button class="btn btn-warning" type="button"><span aria-hidden="true" class="glyphicon glyphicon-backward"></span>Back to list</button></a>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">GEB [<?php echo $_GET["id"]; ?>] </h3>
                </div>
                <div class="panel-body">
                                                           <?php
                                $data = get_part_by_ID_KIND($_GET["id"],$_GET["type"]);
                                if (!empty($data)) {
                                    ?>
                    <!-- Panel content -->
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
                                    }
                                    if (!empty($data[0]['NAME_LABEL'])) {
                                        ?> 
                                            <tr>
                                                <th>Name:</th>
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
				    if (!empty($data[0]['DISPLAY_NAME'])) {
                                        ?>
                                            <tr>
                                                <th>GEB TYPE:</th>
                                                <td> <?= $data[0]['DISPLAY_NAME']; ?></td>
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
                    </div>
                    <?php
                                } else {
                                    echo "No Item found for this ID";
                                }
                                ?>

                   <div class="row">
                                <div class="col-md-6"><div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Child parts:</h3>
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
                                            <h3 class="panel-title">Attach New Child parts:</h3>
                                        </div>

<div class="panel-body">


    <form id="attachmentform"  class="form-horizontal" method="post" action="edit_geb_process.php"  name="attachmentform">

<input type="hidden" class="form-control"  name="serial_number" value="<?= $data[0]['SERIAL_NUMBER'] ?>"  />   
<input type="hidden" class="form-control"  name="geb_kind" value="<?= $data[0]['DISPLAY_NAME'] ?>"  />

<!--
<div class="col-sm-4">
               <label > Select VFAT Type: </label>

</div>
<div class="col-sm-8">

<select name="vfat_type" id = "vfat_type" class="form-control" >
   <option value = "select" selected >Select VFAT Type </option>";

   <option value = "GEM VFAT2" >GEM VFAT2 </option>";
   <option value = "GEM VFAT3" >GEM VFAT3 </option>";

</select>

</div>

-->

<?php 


//echo "t".$_GET['vfat_kind']; 

$GEB_TYPE_CHECK = $data[0]['DISPLAY_NAME'] ;

	global $VFAT2_TO_GEB;
        global $VFAT2_TO_GEB_NARROW;
        global $VFAT2_TO_GEB_WIDE;


global $GEB_KIND_OF_PART_NAME;
    global $GEB_NARROW_KIND_OF_PART_NAME;
    global $GEB_WIDE_KIND_OF_PART_NAME;

   global $GEB_KIND_OF_PART_ID;

   global $GEB_NARROW_KIND_OF_PART_ID;
    global $GEB_WIDE_KIND_OF_PART_ID;
   global $VFAT_KIND_OF_PART_ID;



    // Database connection
    $conn = database_connection();
 $sql = "select PART_ID, RELATIONSHIP_ID from CMS_GEM_CORE_CONSTRUCT.PHYSICAL_PARTS_TREE where PART_PARENT_ID='" . $data[0]['PART_ID'] . "' AND IS_RECORD_DELETED = 'F'"; //select data or insert data


    $query = oci_parse($conn, $sql);
    //Oci_bind_by_name($query,':bind_name',$bind_para); //if needed
    $arr = oci_execute($query);

    $result_arr = array();
//echo $FOIL_TO_CHAMBER;


 $sqltemp = "select RELATIONSHIP_ID from CMS_GEM_CORE_CONSTRUCT.PART_TO_ATTR_RLTNSHPS  where DISPLAY_NAME = 'GEM VFAT2 to VFAT2 Position' AND IS_RECORD_DELETED = 'F'"; //sel

//$sqltemp = "select RELATIONSHIP_ID from CMS_GEM_CORE_CONSTRUCT.PART_TO_ATTR_RLTNSHPS  where DISPLAY_NAME = 'GEM VFAT3 to VFAT3 Position' AND IS_RECORD_DELETED = 'F'"; //sel


 $querytemp = oci_parse($conn, $sqltemp);
    //Oci_bind_by_name($query,':bind_name',$bind_para); //if needed
    $arrtemp = oci_execute($querytemp);

        $relationship_id_vfat_position = 0;
    $result_arrtemp = array();
    while ($rowtemp = oci_fetch_array($querytemp, OCI_ASSOC + OCI_RETURN_NULLS)) {
        $relationship_id_vfat_position =        $rowtemp['RELATIONSHIP_ID'];
//echo $relationship_id_foil_position;
}




$positionarrp =  array();

$count = 0;
    while ($row = oci_fetch_array($query, OCI_ASSOC + OCI_RETURN_NULLS)) {

        // foil -> chamber
        if ($row['RELATIONSHIP_ID'] === $VFAT2_TO_GEB) {

 	    $serialarr = getSerialById($row['PART_ID']);
            $serial = $serialarr[0]['SERIAL_NUMBER'];

            $positionarr = get_attribute_position($row['PART_ID'], $relationship_id_vfat_position);
            $position = $positionarr[0]['POSITION'];
            array_push($positionarrp, $position);
//	    $count++;
	}

         if ($row['RELATIONSHIP_ID'] === $VFAT2_TO_GEB_NARROW) {

            $serialarr = getSerialById($row['PART_ID']);
            $serial = $serialarr[0]['SERIAL_NUMBER'];

            $positionarr = get_attribute_position($row['PART_ID'], $relationship_id_vfat_position);
            $position = $positionarr[0]['POSITION'];
            array_push($positionarrp, $position);
//          $count++;
        }


 if ($row['RELATIONSHIP_ID'] === $VFAT2_TO_GEB_WIDE) {

            $serialarr = getSerialById($row['PART_ID']);
            $serial = $serialarr[0]['SERIAL_NUMBER'];

            $positionarr = get_attribute_position($row['PART_ID'], $relationship_id_vfat_position);
            $position = $positionarr[0]['POSITION'];
            array_push($positionarrp, $position);
//          $count++;
        }





}

if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Narrow')

if (in_array("0", $positionarrp)){
//	echo "true";
}
else {
 
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);

                                if (!empty($parts_available_list)) {
//print_r ($parts_available_list);


 $count++;


?>
<div class="col-sm-4">
               <label id = "vfat0label" > Select VFAT 0: </label>

</div>
<div class="col-sm-8">

<select name="vfat0" id = "vfat0"  class="form-control">

<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>

<?php

if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Narrow')

if (in_array("1", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
	 $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 1: </label>
</div>
<div class="col-sm-8">
<select name="vfat1" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>


<?php

if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Narrow')

if (in_array("2", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 2: </label>
</div>
<div class="col-sm-8">
<select name="vfat2" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>


<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Narrow')

if (in_array("3", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 3: </label>
</div>
<div class="col-sm-8">
<select name="vfat3" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>


<?php

if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Wide')

if (in_array("4", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 4: </label>
</div>
<div class="col-sm-8">
<select name="vfat4" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>



<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Wide')

if (in_array("5", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 5: </label>
</div>
<div class="col-sm-8">
<select name="vfat5" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>



<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Wide')

if (in_array("6", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 6: </label>
</div>
<div class="col-sm-8">
<select name="vfat6" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>



<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Wide')

if (in_array("7", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 7: </label>
</div>
<div class="col-sm-8">
<select name="vfat7" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>


<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Narrow')

if (in_array("8", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 8: </label>
</div>
<div class="col-sm-8">
<select name="vfat8" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>


<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Narrow')

if (in_array("9", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 9: </label>
</div>
<div class="col-sm-8">
<select name="vfat9" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>




<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Narrow')

if (in_array("10", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 10: </label>
</div>
<div class="col-sm-8">
<select name="vfat10" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>

<?php

if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Narrow')

if (in_array("11", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 11: </label>
</div>
<div class="col-sm-8">
<select name="vfat11" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>

<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Wide')

if (in_array("12", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 12: </label>
</div>
<div class="col-sm-8">
<select name="vfat12" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>




<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Wide')

if (in_array("13", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 13: </label>
</div>
<div class="col-sm-8">
<select name="vfat13" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>


<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Wide')

if (in_array("14", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 14: </label>
</div>
<div class="col-sm-8">
<select name="vfat14" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>


<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Wide')

if (in_array("15", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 15: </label>
</div>
<div class="col-sm-8">
<select name="vfat15" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>


<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Narrow')

if (in_array("16", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 16: </label>
</div>
<div class="col-sm-8">
<select name="vfat16" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>



<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Narrow')

if (in_array("17", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 17: </label>
</div>
<div class="col-sm-8">
<select name="vfat17" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>




<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Narrow')

if (in_array("18", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 18: </label>
</div>
<div class="col-sm-8">
<select name="vfat18" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>



<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Narrow')

if (in_array("19", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 19: </label>
</div>
<div class="col-sm-8">
<select name="vfat19" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>



<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Wide')

if (in_array("20", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 20: </label>
</div>
<div class="col-sm-8">
<select name="vfat20" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>



<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Wide')

if (in_array("21", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 21: </label>
</div>
<div class="col-sm-8">
<select name="vfat21" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>



<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Wide')

if (in_array("22", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 22: </label>
</div>
<div class="col-sm-8">
<select name="vfat22" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>



<?php
if ($GEB_TYPE_CHECK === 'GEM Electronics Board' or $GEB_TYPE_CHECK === 'GEM Electronics Board Wide')

if (in_array("23", $positionarrp)){
//      echo "true";
}
else {
 $parts_available_list = get_available_parts_nohtml_noversion($VFAT_KIND_OF_PART_ID);
    if (!empty($parts_available_list)) {
//print_r ($parts_available_list);
         $count++;
?>
<div class="col-sm-4">
               <label > Select VFAT 23: </label>
</div>
<div class="col-sm-8">
<select name="vfat23" class="form-control">
<?php
foreach($parts_available_list as $key => $value) {
   echo "<option value = ". $value['SERIAL_NUMBER'] . " > " . $value['SERIAL_NUMBER'] ."</option>";
}
}
echo '</select>';
?>
</div>
<?php
}
?>











<div class="col-sm-12">

</div>
<?php 

//echo $count;
if ($count!=0){
?>
<div class="btn-group" class="col-sm-12" >	      
	<button  class="btn  btn-primary" type="submit"  >Attach</button>
</div>
<?php
}
?>
</form>

 </div>
                                    </div></div>






            
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include "foot.php";
i?>
<script>
     jQuery(document).ready(function($) {
$("#partslist").show();
$("#<?= $GEB_ID; ?>").attr("class","active");
})
/*
$("#vfat_type").change(function () {
        var end = this.value;
	alert (end);       
if (end == "GEM VFAT3"){
	$("#vfat0").prop("disabled", true);
	$("#vfat0").hide();
	$("#vfat1").prop("disabled", true);
        $("#vfat1").hide();
 	$("#vfat2").prop("disabled", true);
        $("#vfat2").hide();
 	$("#vfat3").prop("disabled", true);
        $("#vfat3").hide();
 	$("#vfat4").prop("disabled", true);
        $("#vfat4").hide();
 	$("#vfat5").prop("disabled", true);
        $("#vfat5").hide();
 	$("#vfat6").prop("disabled", true);
        $("#vfat6").hide();
 	$("#vfat7").prop("disabled", true);
        $("#vfat7").hide();
 	$("#vfat8").prop("disabled", true);
        $("#vfat8").hide();
	$("#vfat9").prop("disabled", true);
        $("#vfat9").hide();
 	$("#vfat10").prop("disabled", true);
        $("#vfat10").hide();
 	$("#vfat11").prop("disabled", true);
        $("#vfat11").hide();
 	$("#vfat12").prop("disabled", true);
        $("#vfat12").hide();
 	$("#vfat13").prop("disabled", true);
        $("#vfat13").hide();
 	$("#vfat14").prop("disabled", true);
        $("#vfat14").hide();
 	$("#vfat15").prop("disabled", true);
        $("#vfat15").hide();
 	$("#vfat16").prop("disabled", true);
        $("#vfat16").hide();
	$("#vfat17").prop("disabled", true);
        $("#vfat17").hide();
 	$("#vfat18").prop("disabled", true);
        $("#vfat18").hide();
 	$("#vfat19").prop("disabled", true);
        $("#vfat19").hide();
 	$("#vfat20").prop("disabled", true);
        $("#vfat20").hide();
 	$("#vfat21").prop("disabled", true);
        $("#vfat21").hide();
 	$("#vfat22").prop("disabled", true);
        $("#vfat22").hide();
 	$("#vfat23").prop("disabled", true);
        $("#vfat23").hide();
	

$("#vfat0label").hide();
$("#vfat1label").hide();
$("#vfat2label").hide();
$("#vfat3label").hide();
$("#vfat4label").hide();
$("#vfat5label").hide();
$("#vfat6label").hide();
$("#vfat7label").hide();
$("#vfat8label").hide();
$("#vfat9label").hide();
$("#vfat10label").hide();
$("#vfat11label").hide();
$("#vfat12label").hide();
$("#vfat13label").hide();
$("#vfat14label").hide();
$("#vfat15label").hide();
$("#vfat16label").hide();
$("#vfat17label").hide();
$("#vfat18label").hide();
$("#vfat19label").hide();
$("#vfat20label").hide();
$("#vfat21label").hide();
$("#vfat22label").hide();
$("#vfat23label").hide();

}
    
if (end == "GEM VFAT2"){
$("#vfat0").prop("disabled", false);
        $("#vfat0").show();
$("#vfat0label").show();

}
});

*/

</script>
