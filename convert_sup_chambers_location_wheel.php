<?php
include "head.php";
if(isset($_POST["submited"])){
include_once "functions/functions.php";
include_once "functions/generate_xml.php";
include_once "functions/globals.php";
include_once "functions/generate_xml.php";
$conn = database_connection();
$SC_SERIAL_NO= $_POST['SC_SERIAL_NO'];
$SC_SERIAL_NO= trim($SC_SERIAL_NO);
$INSTALLATION_LOCATION = $_POST['INSTALLATION_LOCATION'];
$COOLING_CLOSED = isset($_POST['COOLING_CLOSED'])?1:0;
$LV_CONNECTED = isset($_POST['LV_CONNECTED'])?1:0;
$HV_CONNECTED = isset($_POST['HV_CONNECTED'])?1:0;
$FIBRES_CONNECTED = isset($_POST['FIBRES_CONNECTED'])?1:0;
$GAS_CONNECTED = isset($_POST['GAS_CONNECTED'])?1:0;
$DAQ_CONNECTION_DONE = isset($_POST['DAQ_CONNECTION_DONE'])?1:0;

$SC_INSERTED = isset($_POST['SC_INSERTED'])?1:0;
$GAS_LEAK_TEST_PASSED = isset($_POST['GAS_LEAK_TEST_PASSED'])?1:0;
$COOLING_PRESSURE_TEST_PASSED = isset($_POST['COOLING_PRESSURE_TEST_PASSED'])?1:0;
$TEMP_CHAIN_CONNECTED = isset($_POST['TEMP_CHAIN_CONNECTED'])?1:0;
$RADMON_CONNECTED = isset($_POST['RADMON_CONNECTED'])?1:0;



$INSTALLATION_DATE = date($_POST['INSTALLATION_DATE']);
$FileName = 'SC_INSTALLATION_STATUS_LOC'; 
$output=shell_exec("my_env_new/bin/python SC_Installation_Status_Loc.py '$FileName' '$INSTALLATION_LOCATION' '$SC_SERIAL_NO'  '$COOLING_CLOSED' '$LV_CONNECTED' '$HV_CONNECTED' '$FIBRES_CONNECTED' '$GAS_CONNECTED' '$SC_INSERTED' '$GAS_LEAK_TEST_PASSED' '$COOLING_PRESSURE_TEST_PASSED' '$TEMP_CHAIN_CONNECTED' '$RADMON_CONNECTED' '$DAQ_CONNECTION_DONE' '$INSTALLATION_DATE'");
$LocalFilePATH =  $FileName .".xml";
$check = shell_exec ("zip  archive-$(date +'%Y-%m-%d-%H-%M-%S').zip $LocalFilePATH");
{
//foreach (glob("images/*.jpg") as $large) 
foreach (glob("*.zip") as $filename) { 
//echo "$filename\n";
//echo str_replace("","","$filename\n");
echo str_replace("","","<a href='$filename'>$filename</a>\n");
}
}
// Send the file to the spool area
$res_arr = SendXML($filename);
//echo $res_arr;
//echo var_dump($res_arr) ;
}
?>
<?php
function unlinkr($dir, $pattern = "*") {
    // find all files and folders matching pattern
    $files = glob($dir . "/$pattern"); 
    //interate thorugh the files and folders
    foreach($files as $file){ 
    //if it is a directory then re-call unlinkr function to delete files inside this directory     
        if (is_dir($file) and !in_array($file, array('..', '.')))  {
            //echo "<p>opening directory $file </p>";
            unlinkr($file, $pattern);
            rmdir($file);
        } else if(is_file($file) and ($file != __FILE__)) {
            unlink($file); 
        }
    }
}
$dir= getcwd();
unlinkr ($dir, "*.xml");
unlinkr ($dir, "*.zip");
 $_SESSION['post_return'] = $res_arr;
                    $_SESSION['new_chamber_ntfy'] = '<div role="alert" class="alert alert-success">
       You successfully created zip file .  <strong>ID:</strong> ' . $filename .
                    '</div>';
                    header('Location: confirmation.php'); //?msg='.$msg."&statusCode=".$statusCode."&return=".$return
                        die();
 include "foot.php";
 ?>
