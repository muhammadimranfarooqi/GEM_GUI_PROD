<?php
include "head.php";
?>
            
<?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               include_once "functions/functions.php";
                include_once "functions/generate_xml.php";
                include_once "functions/globals.php";
        

        if (isset($_FILES['file'])) {
                  


$FileName= $_FILES['file']['name'];
$FileTmp= $_FILES['file']['tmp_name'];
$FileType= $_FILES['file']['type'];
$FileSize= $_FILES['file']['size'];
$FileError=$_FILES['file']['error'];
if (($FileSize > 100000000)){
        die("Error - File is too Long");
}

//echo $FileType;
$ext = pathinfo($FileName, PATHINFO_EXTENSION);
//echo $ext;
$allowed = array('xml','zip');
	if( ! in_array( $ext, $allowed ) )
 {die("Wrong file type. File should be xml or zip.");

}
/*
echo $FileName.'<br>';
echo $FileTmp;
echo '<br>';
echo $FileType.'<br>';

echo $FileSize.'<br>';

echo $FileError.'<br>';
 */ 



if (!$FileTmp){
       die("No File Selected, Please Upload Again");
}else{
        move_uploaded_file($FileTmp,"$FileName");
}


  
        $res_arr = SendXML($FileName);
            
                    // Set session variables with the return 
                   session_start() ;
                    $_SESSION['post_return'] = $res_arr;
                    $_SESSION['new_chamber_ntfy'] = '<div role="alert" class="alert alert-success">
       File sent to DBLoader  <strong>ID:</strong> ' . $FileName .
                    '</div>';
                    //print_r($_SESSION);
                    // redirect to confirm page
                    header('Location: confirmation.php'); //?msg='.$msg."&statusCode=".$statusCode."&return=".$return
                        die();
 }           } else {
                ?>
<?php include "head_panel.php"; ?>
<style>
    .scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
}
    /* Flashing */
    .hover13 a:hover img {
        opacity: 1;
        -webkit-animation: flash 1.5s;
        animation: flash 1.5s;
        border: 1px inset;
    }
    @-webkit-keyframes flash {
        0% {
            opacity: .4;
        }
        100% {
            opacity: 1;
        }
    }
    @keyframes flash {
        0% {
            opacity: .4;
        }
        100% {
            opacity: 1;
        }
    }


    .rellists{
        display: none;
    }

    .rellists .dropdown{
        margin: 15px;
    }

</style>
<?php
//$serial_num_of_newest_part = get_part_ID($FOIL_KIND_OF_PART_ID);
//if ($serial_num_of_newest_part) {    print_r($serial_num_of_newest_part);
//    $serial_num = explode('-', $serial_num_of_newest_part);
//    
//} else {  
//    $serial_num = array();
//    $serial_num[2] = "L";
//    $serial_num[3] = 0000;
//}
//echo $serial_num[3];
//echo $serial_num[4];
//echo "loacations"; print_r(get_locations());
//echo "<br>institutes"; print_r(get_institutes());
//echo "<br>Manufacturers";print_r(get_manufacturers());
?>
<div class="container-fluid" >
    <div class="row">

        <?php include "side.php"; ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


                <form method="POST" enctype="multipart/form-data" action="loaddataxml.php">

                    <div class="row">
                        <div class="col-xs-6 panel-info panel" style="padding-left: 0px; padding-right: 0px;">
                            <div class="panel-heading">
                                <h3 class="panel-title" >  <span aria-hidden="true" class="glyphicon glyphicon-info-sign"></span>Load data using XML / Zip Files</h3>
                            </div>
                            <div class="panel-body">
                            <!-- <span class="text-muted">List single chambers</span> -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="float: left;">Select File to be uploaded</label>
                                    <input type= "file" class="serialInput" name="file" id="file" required>

                                    </div>
                                    
                                </div>
                                <!--                                <div class="form-group">
                                                                    <label> Manufacturer name </label><br>
                                                                    <input name="manufacturer" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="control-group">
                                                                        <label class="control-label">Manufacture date</label>
                                                                        <div class="controls input-append date form_datetime" data-date="2015-08-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                                                            <input size="16" type="text" value="2015-08-16T05:25:07" readonly>
                                                                            <span class="add-on glyphicon glyphicon-remove"><i class="icon-remove"></i></span>
                                                                            <span class="add-on glyphicon glyphicon-calendar"><i class="icon-th"></i></span>
                                                                        </div>
                                                                        <input type="hidden" id="dtp_input1" value="" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>  Status </label>
                                                                    <input name="driftId" value="" hidden>
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                            Choose Status
                                                                            <span class="caret"></span>
                                                                        </button>
                                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                                            <li><a class="status" href="#"> <span class="label label-success">Accepted</span></a></li>
                                                                            <li><a class="status" href="#"> <span class="label label-danger">Rejected</span></a></li>
                                                                            <li><a class="status" href="#"> <span class="label label-info">Repaired</span></a></li>
                                                                            <li><a class="status" href="#"> <span class="label label-primary">Installed</span></a></li>
                                                                            <li><a class="status" href="#"> <span class="label label-default">Under Test</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="checkbox">
                                                                        <label>
                                                                            <input class="testDiod" type="checkbox"> equipped with diodes?
                                                                            <input class="diodes" name="testDiod" value="" hidden>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                   
                                                                        <label> Add picture </label><br>
                                                                        <input class="testDiod" type="file">
                                                                    
                                                                </div>-->

                            </div>
                        </div>







                    <button type="submit" >Submit</button>   



                </form>
            <?php } ?>



        </div>
    </div>
</div>

<?php
include "foot.php";
?>

