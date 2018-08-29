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

                    $type = $_POST['type'];


                    $kindOfPart = $SUPER_CHAMBER_KIND_OF_PART_NAME;
                    //echo  $kindOfPart;
                    $temp[$KIND_OF_PART] = $kindOfPart;


                    $childs = array();
                    $child = array();
                    $subchild = array();
                    if (!empty($_POST['chamber1'])) {
                        $child['SERIAL_NUMBER'] = $_POST['chamber1'];
                        $child['KIND_OF_PART'] = $CHAMBER_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "Chamber Type";
                        $subchild['VALUE'] = $type;
                        $child ['attr'] = $subchild;
                        $subchild['NAME'] = "Depth";
                        $subchild['VALUE'] = "1";
                        $child ['attr1'] = $subchild;
                        $childs[] = $child;

			}
		 if (!empty($_POST['chamber2'])) {
                        $child['SERIAL_NUMBER'] = $_POST['chamber2'];
                        $child['KIND_OF_PART'] = $CHAMBER_KIND_OF_PART_NAME;
                        $subchild['NAME'] = "Chamber Type";
                        $subchild['VALUE'] = $type;
                        $child ['attr'] = $subchild;
                        $subchild['NAME'] = "Depth";
                        $subchild['VALUE'] = "2";
                        $child ['attr1'] = $subchild;
                        $childs[] = $child;

                        }

                    $temp['children'] = $childs;
                    $arr[] = $temp;
//print_r ($arr);

                    $res_arr = generateXml($arr);
                    
                    header('Location: edit_sup_chamber.php?id='.$temp[$SERIAL_NUMBER]);
                        die();
                    
                    
                }
            }

//include "head.php";
?>
<?php include "head_panel.php"; ?>
<?php 
include "foot.php";
?>
