<?php
//error_reporting(E_ALL); 
//ini_set('display_errors', 1);
//echo "test";
if(isset($_POST["submited"])){
include_once "functions/functions.php";
include_once "functions/generate_xml.php";
include_once "functions/globals.php";
include_once "functions/generate_xml.php";
$conn = database_connection();
$RUN_BEGIN_TIMESTAMP =''; //date($_POST['RUN_BEGIN_TIMESTAMP'].':s');
$RUN_END_TIMESTAMP = '';//date($_POST['RUN_END_TIMESTAMP'].':s');
$LOCATION = '';//$_POST['LOCATION'];
$INITIATED_BY_USER = '';//$_POST['INITIATED_BY_USER'];
$COMMENT_DESCRIPTION = '';//$_POST['COMMENT_DESCRIPTION'];
//$run_number = $_POST['run_number'];
$ch1 = 'select';
$ch2 = 'select';
$ch3 = 'select';
$ch4 = 'select';
$ch5 = 'select';
$ch6 = 'select';
$ch7 = 'select';
$ch8 = 'select';
$ch9 = 'select';
$ch10 = 'select';
$ch11 = 'select';
$ch12 = 'select';
$ch13 = 'select';
$ch14 = 'select';
$ch15 = 'select';
$ch16 = 'select';
$ch17 = 'select';
$ch18 = 'select';
$ch19 = 'select';
$ch20 = 'select';
$ch21 = 'select';
$ch22 = 'select';
$ch23 = 'select';
$ch24 = 'select';
$ch25 = 'select';
$ch26 = 'select';
$ch27 = 'select';
$ch28 = 'select';
$ch29 = 'select';
$ch30 = 'select';



function getchambers($part_id){
            $result_arr = array();


 $conn = database_connection();

    $sql = "select PART_ID, RELATIONSHIP_ID from CMS_GEM_CORE_CONSTRUCT.PHYSICAL_PARTS_TREE where PART_PARENT_ID='" . $part_id . "' AND IS_RECORD_DELETED = 'F'"; //select data or insert data


    $query = oci_parse($conn, $sql);
    //Oci_bind_by_name($query,':bind_name',$bind_para); //if needed
    $arr = oci_execute($query);



    while ($row = oci_fetch_array($query, OCI_ASSOC + OCI_RETURN_NULLS)) {


            $serialarr = getSerialById($row['PART_ID']);
            $serial = $serialarr[0]['SERIAL_NUMBER'];
           $sqltemp = "select RELATIONSHIP_ID from CMS_GEM_CORE_CONSTRUCT.PART_TO_ATTR_RLTNSHPS  where DISPLAY_NAME = 'GEM Chamber to Depth' AND IS_RECORD_DELETED = 'F'"; //sel

            $querytemp = oci_parse($conn, $sqltemp);
    //Oci_bind_by_name($query,':bind_name',$bind_para); //if needed
            $arrtemp = oci_execute($querytemp);

            $relationship_id_foil_position = 0;
            $result_arrtemp = array();
            while ($rowtemp = oci_fetch_array($querytemp, OCI_ASSOC + OCI_RETURN_NULLS)) {
                $relationship_id_foil_position =        $rowtemp['RELATIONSHIP_ID'];
            }
           
       //    echo $relationship_id_foil_position;
		$positionarr = get_attribute_position($row['PART_ID'], $relationship_id_foil_position);
        
//	print_r ( $positionarr);   
	$position = $positionarr[0]['POSITION'];
         //         echo $position;

	   $result_arr[$position] = $serial; 
	   //echo $serial;    

}

	   //print_r ($result_arr);
return $result_arr;

}


$sch1 = $_POST['superchamber1'];
$sch2 = $_POST['superchamber2'];
$sch3 = $_POST['superchamber3'];
$sch4 = $_POST['superchamber4'];
$sch5 = $_POST['superchamber5'];
$sch6 = $_POST['superchamber6'];
$sch7 = $_POST['superchamber7'];
$sch8 = $_POST['superchamber8'];
$sch9 = $_POST['superchamber9'];
$sch10 = $_POST['superchamber10'];
$sch11 = $_POST['superchamber11'];
$sch12 = $_POST['superchamber12'];
$sch13 = $_POST['superchamber13'];
$sch14 = $_POST['superchamber14'];
$sch15 = $_POST['superchamber15'];


if($sch1 != 'select'){
$sch1_idarr = get_part_id_from_serial_number($sch1);
$sch1_id = $sch1_idarr[0]['PART_ID'];
$data = getchambers($sch1_id);
$ch1 = $data[1];
$ch2 = $data[2];
}

if($sch2 != 'select'){
$sch2_idarr = get_part_id_from_serial_number($sch2);
$sch2_id = $sch2_idarr[0]['PART_ID'];
$data = getchambers($sch2_id);
$ch3 = $data[1];
$ch4 = $data[2];
}
if($sch3 != 'select'){
$sch3_idarr = get_part_id_from_serial_number($sch3);
$sch3_id = $sch3_idarr[0]['PART_ID'];
$data = getchambers($sch3_id);
$ch5 = $data[1];
$ch6 = $data[2];
}
if($sch4 != 'select'){
$sch4_idarr = get_part_id_from_serial_number($sch4);
$sch4_id = $sch4_idarr[0]['PART_ID'];
$data = getchambers($sch4_id);
$ch7 = $data[1];
$ch8 = $data[2];
}
if($sch5!= 'select'){
$sch5_idarr = get_part_id_from_serial_number($sch5);
$sch5_id = $sch5_idarr[0]['PART_ID'];
$data = getchambers($sch5_id);
$ch9 = $data[1];
$ch10 = $data[2];
}


if($sch6 != 'select'){
$sch6_idarr = get_part_id_from_serial_number($sch6);
$sch6_id = $sch6_idarr[0]['PART_ID'];
$data = getchambers($sch6_id);
$ch11 = $data[1];
$ch12 = $data[2];
}

if($sch7 != 'select'){
$sch7_idarr = get_part_id_from_serial_number($sch7);
$sch7_id = $sch7_idarr[0]['PART_ID'];
$data = getchambers($sch7_id);
$ch13 = $data[1];
$ch14 = $data[2];
}
if($sch8 != 'select'){
$sch8_idarr = get_part_id_from_serial_number($sch8);
$sch8_id = $sch8_idarr[0]['PART_ID'];
$data = getchambers($sch8_id);
$ch15 = $data[1];
$ch16 = $data[2];
}
if($sch9 != 'select'){
$sch9_idarr = get_part_id_from_serial_number($sch9);
$sch9_id = $sch4_idarr[0]['PART_ID'];
$data = getchambers($sch9_id);
$ch17 = $data[1];
$ch18 = $data[2];
}
if($sch10!= 'select'){
$sch10_idarr = get_part_id_from_serial_number($sch10);
$sch10_id = $sch10_idarr[0]['PART_ID'];
$data = getchambers($sch10_id);
$ch19 = $data[1];
$ch20 = $data[2];
}




if($sch11 != 'select'){
$sch11_idarr = get_part_id_from_serial_number($sch11);
$sch11_id = $sch11_idarr[0]['PART_ID'];
$data = getchambers($sch11_id);
$ch21 = $data[1];
$ch22 = $data[2];
}

if($sch12 != 'select'){
$sch12_idarr = get_part_id_from_serial_number($sch12);
$sch12_id = $sch12_idarr[0]['PART_ID'];
$data = getchambers($sch12_id);
$ch23 = $data[1];
$ch24 = $data[2];
}
if($sch13 != 'select'){
$sch13_idarr = get_part_id_from_serial_number($sch13);
$sch13_id = $sch13_idarr[0]['PART_ID'];
$data = getchambers($sch13_id);
$ch25 = $data[1];
$ch26 = $data[2];
}
if($sch14 != 'select'){
$sch14_idarr = get_part_id_from_serial_number($sch14);
$sch14_id = $sch14_idarr[0]['PART_ID'];
$data = getchambers($sch14_id);
$ch27 = $data[1];
$ch28 = $data[2];
}
if($sch15!= 'select'){
$sch15_idarr = get_part_id_from_serial_number($sch15);
$sch15_id = $sch15_idarr[0]['PART_ID'];
$data = getchambers($sch15_id);
$ch29 = $data[1];
$ch30 = $data[2];
}





if(is_null($ch1))
  $ch1 = 'select';
if(is_null($ch2))
  $ch2 = 'select';
if(is_null($ch3))
  $ch3 = 'select';
if(is_null($ch4))
  $ch4 = 'select';
if(is_null($ch5))
  $ch5 = 'select';
if(is_null($ch6))
  $ch6 = 'select';
if(is_null($ch7))
  $ch7 = 'select';
if(is_null($ch8))
  $ch8 = 'select';
if(is_null($ch9))
  $ch9 = 'select';
if(is_null($ch10))
  $ch10 = 'select';
if(is_null($ch11))
  $ch11 = 'select';
if(is_null($ch12))
  $ch12 = 'select';
if(is_null($ch13))
  $ch13 = 'select';
if(is_null($ch14))
  $ch14 = 'select';
if(is_null($ch15))
  $ch15 = 'select';
if(is_null($ch16))
  $ch16 = 'select';
if(is_null($ch17))
  $ch17 = 'select';
if(is_null($ch18))
  $ch18 = 'select';
if(is_null($ch19))
  $ch19 = 'select';
if(is_null($ch20))
  $ch20 = 'select';

if(is_null($ch21))
  $ch21 = 'select';
if(is_null($ch22))
  $ch22 = 'select';
if(is_null($ch23))
  $ch23 = 'select';
if(is_null($ch24))
  $ch24 = 'select';
if(is_null($ch25))
  $ch25 = 'select';
if(is_null($ch26))
  $ch26 = 'select';
if(is_null($ch27))
  $ch27 = 'select';
if(is_null($ch28))
  $ch28 = 'select';
if(is_null($ch29))
  $ch29 = 'select';
if(is_null($ch30))
  $ch30 = 'select';

/*



echo $ch1;
echo $ch2;
echo $ch3;
echo $ch4;
echo $ch5;
echo $ch6;
echo $ch7;
echo $ch8;
echo $ch9;
echo $ch10;
*/

$flip2 = isset($_POST['flip2'])?1:0;
$flip4 = isset($_POST['flip4'])?1:0;
$flip6 = isset($_POST['flip6'])?1:0;
$flip8 = isset($_POST['flip8'])?1:0;
$flip10 = isset($_POST['flip10'])?1:0;
$flip12 = isset($_POST['flip12'])?1:0;
$flip14 = isset($_POST['flip14'])?1:0;
$flip16 = isset($_POST['flip16'])?1:0;
$flip18 = isset($_POST['flip18'])?1:0;
$flip20 = isset($_POST['flip20'])?1:0;
$flip22 = isset($_POST['flip22'])?1:0;
$flip24 = isset($_POST['flip24'])?1:0;
$flip26 = isset($_POST['flip26'])?1:0;
$flip28 = isset($_POST['flip28'])?1:0;
$flip30 = isset($_POST['flip30'])?1:0;
$flow2 = $_POST['flow2'];
$flow4 = $_POST['flow4'];
$flow6 = $_POST['flow6'];
$flow8 = $_POST['flow8'];
$flow10 = $_POST['flow10'];
$flow12 = $_POST['flow12'];
$flow14 = $_POST['flow14'];
$flow16 = $_POST['flow16'];
$flow18 = $_POST['flow18'];
$flow20 = $_POST['flow20'];
$flow22 = $_POST['flow22'];
$flow24 = $_POST['flow24'];
$flow26 = $_POST['flow26'];
$flow28 = $_POST['flow28'];
$flow30 = $_POST['flow30'];
//echo $flip4;
//echo $flow2;
//echo $flip4;
$FileName= 'qc8_stand_geo_file';//
include "head.php";

$out = shell_exec("python QC8_stand_geometry_run.py" );
$run_number = trim($out);
 $output=shell_exec("my_env_new/bin/python qc8_stand_geo_conf.py '$FileName' '$LOCATION' '$INITIATED_BY_USER' '$COMMENT_DESCRIPTION' '$RUN_BEGIN_TIMESTAMP' '$RUN_END_TIMESTAMP' '$run_number' '$ch1' '$ch2' '$ch3' '$ch4' '$ch5' '$ch6' '$ch7' '$ch8' '$ch9' '$ch10' '$ch11' '$ch12' '$ch13' '$ch14' '$ch15' '$ch16' '$ch17' '$ch18' '$ch19' '$ch20' '$ch21' '$ch22' '$ch23' '$ch24' '$ch25' '$ch26' '$ch27' '$ch28' '$ch29' '$ch30' '$flip2' '$flip4' '$flip6' '$flip8' '$flip10' '$flip12' '$flip14' '$flip16' '$flip18' '$flip20' '$flip22' '$flip24' '$flip26' '$flip28' '$flip30' '$flow2' '$flow4' '$flow6' '$flow8' '$flow10' '$flow12' '$flow14' '$flow16' '$flow18' '$flow20' '$flow22' '$flow24' '$flow26' '$flow28' '$flow30'");
$LocalFilePATH =  $FileName .".xml";
$check = shell_exec ("zip  archive-$(date +'%Y-%m-%d-%H-%M-%S').zip $LocalFilePATH");
{
foreach (glob("*.zip") as $filename) { 
echo str_replace("","","<a href='$filename'>$filename</a>\n");
}
}
}
$res_arr = SendXML($filename);
?>
<?php
function unlinkr($dir, $pattern = "*") {
    $files = glob($dir . "/$pattern"); 
    foreach($files as $file){ 
        if (is_dir($file) and !in_array($file, array('..', '.')))  {
            unlinkr($file, $pattern);
            rmdir($file);
        } else if(is_file($file) and ($file != __FILE__)) {
            unlink($file); 
        }
    }
}
$dir= getcwd();
unlinkr ($dir, "*.xml");
unlinkr ($dir, "*.xls");
unlinkr ($dir, "*.xlsx");
unlinkr ($dir, "*.xlsm");
unlinkr ($dir, "*.zip");
 $_SESSION['post_return'] = $res_arr;
                   $_SESSION['new_chamber_ntfy'] = '<div role="alert" class="alert alert-success">
     <strong>Well done!</strong> Zip file for QC8 Stand Geometry Conf ID is : ' . $filename .
                   '</div>';
                    header('Location: confirmation.php'); //?msg='.$msg."&statusCode=".$statusCode."&return=".$return
                        die();
?>
