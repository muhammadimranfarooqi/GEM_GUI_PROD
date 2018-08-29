<?php include "head.php"?> 
<?php

           if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               include_once "functions/functions.php";
                include_once "functions/generate_xml.php";
                include_once "functions/globals.php";
                if (isset($_POST['serial_number'])) {


                    $temp = array();
                    $arr = array();
                    /*
                    echo '<div role="alert" class="alert alert-success">
      <strong>Well done!</strong> You successfully created Gem Chamber <strong>ID:</strong> ' . $_POST['serial'] .
                    '</div>';*/
                    $temp[$SERIAL_NUMBER] = $_POST['serial_number'];
//                    $temp[$NAME_LABEL] = $_POST['serial'];
  //                  if (isset($_POST['location'])) {
                        //echo $_POST['location'];
    //                    $temp[$LOCATION] = $_POST['location'];
      //              }
            //        if (isset($_POST['comment'])) {
              //          //echo $_POST['comment'];
                //        $temp[$COMMENT_DESCRIPTION] = $_POST['comment'];
                  //  }
        //            if (isset($_POST['barcode'])) {
                        //echo $_POST['barcode'];
          //              $temp[$BARCODE] = $_POST['barcode'];
            //        }

                    $kindOfPart = $CHAMBER_KIND_OF_PART_NAME;
                    //echo  $kindOfPart;
                    $temp[$KIND_OF_PART] = $kindOfPart;

	//		$temp[$RECORD_INSERTION_USER] = $logName;
                    //if (isset($logName)) {
                        //echo $logName;
                      //  $temp[$RECORD_INSERTION_USER] = $logName;
                   // }

          //          if (isset($_POST['manufacturer']) && !empty($_POST['manufacturer']) ) {
                        //echo $_POST['manufacturer'];
            //            $temp[$MANUFACTURER] = $_POST['manufacturer'];
              //      }


                    $childs = array();
                    $child = array();
                    $subchild = array();
                    if (!empty($_POST['readout'])) {
                        $child['SERIAL_NUMBER'] = $_POST['readout'];
                        $child['KIND_OF_PART'] = $READOUT_KIND_OF_PART_NAME;
                        $childs[] = $child;
                    }
                    if (!empty($_POST['frame'])) {
                        $child['SERIAL_NUMBER'] = $_POST['frame'];
                        $child['KIND_OF_PART'] = $FRAME_KIND_OF_PART_NAME;
                        $childs[] = $child;
                    }
                    if (!empty($_POST['drift'])) {
                        $child['SERIAL_NUMBER'] = $_POST['drift'];
                        $child['KIND_OF_PART'] = $DRIFT_KIND_OF_PART_NAME;
                        $childs[] = $child;
                    }
                    if (!empty($_POST['foil1'])) {
                        $child['SERIAL_NUMBER'] = $_POST['foil1'];
                        $child['KIND_OF_PART'] = $FOIL_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "Foil Position";
                        $subchild['VALUE'] = "GEM1";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }
                    if (!empty($_POST['foil2'])) {
                        $child['SERIAL_NUMBER'] = $_POST['foil2'];
                        $child['KIND_OF_PART'] = $FOIL_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "Foil Position";
                        $subchild['VALUE'] = "GEM2";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }
                    if (!empty($_POST['foil3'])) {
                        $child['SERIAL_NUMBER'] = $_POST['foil3'];
                        $child['KIND_OF_PART'] = $FOIL_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "Foil Position";
                        $subchild['VALUE'] = "GEM3";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }

                    $temp['children'] = $childs;
                    $arr[] = $temp;


                    $res_arr = generateXml($arr);
                    
	//	print_r ($res_arr);
                    // Set session variables with the return 
                   // session_start() ;
 //                   $_SESSION['post_return'] = $res_arr;
   //                 $_SESSION['new_chamber_ntfy'] = '<div role="alert" class="alert alert-success">
     // <strong>Well done!</strong> You successfully created GEM Chamber XML file <strong>ID:</strong> ' . $_POST['serial'] .
       //             '</div>';
                    // redirect to confirm page
                    header('Location: edit_chamber_new.php?id='.$temp[$SERIAL_NUMBER]);
                        die();
                    
                    
                }
            }

//include "head.php";
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
include "foot.php";
?>
