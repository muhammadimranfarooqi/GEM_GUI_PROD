
<?php
include "head.php";
?>
<?php include "head_panel.php"; ?>



<div class="container-fluid">
    <div class="row">

        <?php include "side.php"; ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header"><img src="images/sc2.png" width="4%">Edit Super Chamber  </h1>

            <!--<a href="edit_sup_chamber.php?id=<?php //echo $_GET["id"]; ?>"><button class="btn btn-success" type="button">Edit</button></a>-->
            <a href="list_sup_chambers.php"><button class="btn btn-warning" type="button"><span aria-hidden="true" class="glyphicon glyphicon-backward"></span>Back to list</button></a>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Super Chamber [<?php echo $_GET["id"]; ?>] </h3>
                </div>
                <div class="panel-body">
                     <?php
                  
	$type = "L";
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
$serial_num = $data[0]['SERIAL_NUMBER'];
$check_long = '-L-';
if (strpos($serial_num, 'S-') !== false) {
  //  echo 'true';
    $check_long = '-S-';
	$type= "S";
//	echo $check_long;
}



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
                        <!--<div class="col-md-4"><img alt="200x200" class="img-thumbnail" data-src="holder.js/200x200" style="width: 200px; height: 200px;" src="uploads/SCHAMBER.png" data-holder-rendered="true"></div>-->
                    
<!--                    <div class="row">
                                <div class="col-md-4"><div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Child chambers:</h3>
                                        </div>
                                        <div class="panel-body">
                                            <ul class="list-group">
                                                <li class="list-group-item"><label> Chamber1:</label> <a href="show_chamber.php?id=GE1/1-VI-L-CERN-0001">GE1/1-VI-L-CERN-0001</a> </li>
                                                <li class="list-group-item"><label> Chamber2:</label> <a href="show_chamber.php?id=GE1/1-VI-L-CERN-0004">GE1/1-VI-L-CERN-0004</a></li>
                                                
                                            </ul>
                                        </div>
                                    </div></div>
                                
                        <div class="col-md-4"><div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">QC performed:</h3>
                                        </div>
                                        <div class="panel-body">
                                            <ul class="list-group">
                                               
                                                
                                                
                                            </ul>
                                        </div>
                                    </div></div>
                            </div>-->
<div class="row">
                                <div class="col-md-6"><div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Detector parts:</h3>
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
                                            <h3 class="panel-title">Attach New Chambers:</h3>
                                        </div>

<div class="panel-body">


    <form id="attachmentform"  class="form-horizontal" method="post" action="edit_sup_chamber_process.php"  name="attachmentform">

<input type="hidden" class="form-control"  name="serial_number" value="<?= $data[0]['SERIAL_NUMBER'] ?>"  />   
<input type="hidden" class="form-control"  name="type" value="<?= $type ?>"  />

<?php 

    global $CHAMBER_TO_SUPER_CHAMBER;

    // Database connection
    $conn = database_connection();
 $sql = "select PART_ID, RELATIONSHIP_ID from CMS_GEM_CORE_CONSTRUCT.PHYSICAL_PARTS_TREE where PART_PARENT_ID='" . $data[0]['PART_ID'] . "' AND IS_RECORD_DELETED = 'F'"; //select data or insert data


    $query = oci_parse($conn, $sql);
    //Oci_bind_by_name($query,':bind_name',$bind_para); //if needed
    $arr = oci_execute($query);

    $result_arr = array();
//echo $FOIL_TO_CHAMBER;


 $sqltemp = "select RELATIONSHIP_ID from CMS_GEM_CORE_CONSTRUCT.PART_TO_ATTR_RLTNSHPS  where DISPLAY_NAME = 'GEM Chamber to Depth' AND IS_RECORD_DELETED = 'F'"; //sel

 $querytemp = oci_parse($conn, $sqltemp);
    //Oci_bind_by_name($query,':bind_name',$bind_para); //if needed
    $arrtemp = oci_execute($querytemp);

        $relationship_id_foil_position = 0;
    $result_arrtemp = array();
    while ($rowtemp = oci_fetch_array($querytemp, OCI_ASSOC + OCI_RETURN_NULLS)) {
        $relationship_id_foil_position =        $rowtemp['RELATIONSHIP_ID'];
//echo $relationship_id_foil_position;
}

$count = 0;



$positionarrp =  array();
    while ($row = oci_fetch_array($query, OCI_ASSOC + OCI_RETURN_NULLS)) {

        // foil -> chamber
        if ($row['RELATIONSHIP_ID'] === $CHAMBER_TO_SUPER_CHAMBER) {

 	    $serialarr = getSerialById($row['PART_ID']);
            $serial = $serialarr[0]['SERIAL_NUMBER'];

            $positionarr = get_attribute_position($row['PART_ID'], $relationship_id_foil_position);
            $position = $positionarr[0]['POSITION'];
            array_push($positionarrp, $position);
//	    $count++;
	}

}


if (in_array("1", $positionarrp)){
//	echo "true";
}
else {
 
 $parts_available_list = get_available_parts_nohtml($CHAMBER_KIND_OF_PART_ID, $check_long);
                                if (!empty($parts_available_list)) {
//print_r ($parts_available_list);


 $count++;


?>
<div class="col-sm-4">
               <label > Select Chamber 1: </label>

</div>

<div class="col-sm-8">

<select name="chamber1" class="form-control">

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



if (in_array("2", $positionarrp)){
//      echo "true";
}
else {

 $parts_available_list = get_available_parts_nohtml($CHAMBER_KIND_OF_PART_ID, $check_long);
                                if (!empty($parts_available_list)) {
//print_r ($parts_available_list);


 $count++;


?>
<div class="col-sm-4">
               <label > Select Chamber 2: </label>

</div>

<div class="col-sm-8">

<select name="chamber2" class="form-control">

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
