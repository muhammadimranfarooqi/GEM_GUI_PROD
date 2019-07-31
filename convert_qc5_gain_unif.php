<?php
if(isset($_POST["submited"])){
include_once "functions/functions.php";
include_once "functions/generate_xml.php";
include_once "functions/globals.php";
include_once "functions/generate_xml.php";
$conn = database_connection();
//if(isset($_FILES["file"])){
$CHAMBERS= $_POST['CHAMBER'];
$CHAMBER =trim($CHAMBERS);
$RUN_NUMBER = $_POST['RUN_NUMBER'];
$RUN_TYPE = $_POST['RUN_TYPE'];
$RUN_BEGIN_TIMESTAMP = date($_POST['RUN_BEGIN_TIMESTAMP'].':s');
$RUN_END_TIMESTAMP = date($_POST['RUN_END_TIMESTAMP'].':s');
$LOCATION = $_POST['LOCATION'];
$INITIATED_BY_USER = $_POST['INITIATED_BY_USER'];
$COMMENT_DESCRIPTION = $_POST['COMMENT_DESCRIPTION'];
$Elog= $_POST['Elog_Link'];
$Files= $_POST['File_Name'];
$comments= $_POST['comment'];

$FileName= $_FILES['root_file']['name'];
$FileTmp= $_FILES['root_file']['tmp_name'];
//$FileType= $_FILES['root_file']['type'];
$FileSize= $_FILES['root_file']['size'];
//$FileError=$_FILES['root_file']['error'];
//echo $FileName; 
$FileName1= $_FILES['plot_file1']['name'];
$FileTmp1= $_FILES['plot_file1']['tmp_name'];
$FileName2= $_FILES['plot_file2']['name'];
$FileTmp2= $_FILES['plot_file2']['tmp_name'];
$FileName3= $_FILES['plot_file3']['name'];
$FileTmp3= $_FILES['plot_file3']['tmp_name'];
$FileName4= $_FILES['plot_file4']['name'];
$FileTmp4= $_FILES['plot_file4']['tmp_name'];
$FileName5= $_FILES['plot_file5']['name'];
$FileTmp5= $_FILES['plot_file5']['tmp_name'];
$FileName6= $_FILES['plot_file6']['name'];
$FileTmp6= $_FILES['plot_file6']['tmp_name'];

if (($FileSize > 100000000)){
	die("Error - File is too Long");
}
if (!$FileTmp){
	die("No File Selected, Please Upload Again");
}else{
	move_uploaded_file($FileTmp,"$FileName");
        move_uploaded_file($FileTmp1,"$FileName1");
        move_uploaded_file($FileTmp2,"$FileName2");
        move_uploaded_file($FileTmp3,"$FileName3");
        move_uploaded_file($FileTmp4,"$FileName4");
        move_uploaded_file($FileTmp5,"$FileName5");
        move_uploaded_file($FileTmp6,"$FileName6");

}
?>
<?php
  include "head.php";
$out = shell_exec("my_env_new/bin/python QC5_test_gain_unif.py '$CHAMBER' " );
$outs = trim($out);
$output=shell_exec("my_env_new/bin/python QC5_Gain_Unif_Data.py '$FileName' '$CHAMBER' '$outs' '$LOCATION' '$INITIATED_BY_USER' '$COMMENT_DESCRIPTION' '$RUN_BEGIN_TIMESTAMP' '$RUN_END_TIMESTAMP' '$Elog' '$Files' '$comments' '$FileName1' '$FileName2' '$FileName3' '$FileName4' '$FileName5' '$FileName6'");
$LocalFilePATH =  $FileName .".xml";
$LocalFilePATH_2 =  $FileName ."_Data.xml";
$check = shell_exec ("zip  archive-$(date +'%Y-%m-%d-%H-%M-%S').zip '$LocalFilePATH' '$LocalFilePATH_2' '$FileName' '$FileName1' '$FileName2' '$FileName3' '$FileName4' '$FileName5' '$FileName6'"  );
{
//foreach (glob("images/*.jpg") as $large) 
foreach (glob("*.zip") as $filename) { 
echo str_replace("","","<a href='$filename'>$filename</a>\n");
}
}
$res_arr = SendXML($filename);
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
            //remove the directory itself
            //echo "<p> deleting directory $file </p>";
            rmdir($file);
        } else if(is_file($file) and ($file != __FILE__)) {
            // make sure you don't delete the current script
            //echo "<p>deleting file $file </p>";
            unlink($file); 
        }
    }
}
$dir= getcwd();
unlinkr ($dir, "*.xml");
unlinkr ($dir, "*.zip");
unlinkr ($dir, "*.root");
unlinkr ($dir, "*.bmp");
unlinkr ($dir, "*.jpg");
unlinkr ($dir, "*.png");
 $_SESSION['post_return'] = $res_arr;
                    $_SESSION['new_chamber_ntfy'] = '<div role="alert" class="alert alert-success">
      <strong>Well done!</strong> You successfully created zip file QC5 Gain Uniformity Test.  <strong>ID:</strong> ' . $filename .
                    '</div>';
                    // redirect to confirm page
                    header('Location: confirmation.php'); //?msg='.$msg."&statusCode=".$statusCode."&return=".$return
                        die();
?>
