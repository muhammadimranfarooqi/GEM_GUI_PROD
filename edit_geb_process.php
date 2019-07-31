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

                    $kindOfPart = $_POST['geb_kind'];
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
                    



		if (!empty($_POST['vfat0'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat0'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "0";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }
                    if (!empty($_POST['vfat1'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat1'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "1";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }


		    if (!empty($_POST['vfat2'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat2'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "2";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }

		 if (!empty($_POST['vfat3'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat3'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "3";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }

 if (!empty($_POST['vfat4'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat4'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "4";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }

 if (!empty($_POST['vfat5'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat5'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "5";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }

 if (!empty($_POST['vfat6'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat6'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "6";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }

 if (!empty($_POST['vfat7'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat7'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "7";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }

 if (!empty($_POST['vfat8'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat8'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "8";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }

 if (!empty($_POST['vfat9'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat9'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "9";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }

 if (!empty($_POST['vfat10'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat10'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "10";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }

 if (!empty($_POST['vfat11'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat11'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "11";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }

 if (!empty($_POST['vfat12'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat12'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "12";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }

 if (!empty($_POST['vfat13'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat13'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "13";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }

 if (!empty($_POST['vfat14'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat14'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "14";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }
 if (!empty($_POST['vfat15'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat15'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "15";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }
 if (!empty($_POST['vfat16'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat16'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "16";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }
 if (!empty($_POST['vfat17'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat17'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "17";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }
 if (!empty($_POST['vfat18'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat18'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "18";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }
 if (!empty($_POST['vfat19'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat19'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "19";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }
 if (!empty($_POST['vfat20'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat20'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "20";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }
 if (!empty($_POST['vfat21'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat21'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "21";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }
 if (!empty($_POST['vfat22'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat22'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "22";
                        $child ['attr'] = $subchild;
                        $childs[] = $child;
                    }
 if (!empty($_POST['vfat23'])) {
                        $child['SERIAL_NUMBER'] = $_POST['vfat23'];
                        $child['KIND_OF_PART'] = $VFAT3_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "VFAT3 Position";
                        $subchild['VALUE'] = "23";
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
                    header('Location: edit_geb.php?id='.$temp[$SERIAL_NUMBER].'&type='.$kindOfPart.'');
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
