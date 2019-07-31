
<?php
include "head.php";
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


<div class="container-fluid">
  <div class="row">

<?php include "side.php"; ?>
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	  <h2 class="sub-header"> <img src="images/ROPCB.png" width="4%"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Geometry Stand Configuration Test  </h2>

	  <?php

	      echo '<div style="display: none" role="alert" class="alert alert-danger ">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><strong>Error!</strong> Please fill the required fields.
  </div>';
	      ?>

	      <!--<form method="POST" action="qc3_leak_test.php" enctype='multipart/form-data'>-->
	      <form method="POST" action="convert_qc8_geo_conf.php">
                        <input type="hidden" name="submited" value="true" /><br>



 <div class="row">
                      <div class="col-xs-4 panel-info panel" style="padding-left: 0px; padding-right: 0px;">
                          <div class="panel-heading">
                              <h3 class="panel-title" align="center">Column 1:</h3>
                          </div>
     

<div class="form-group">
	<div class= "col-xs-8">
		<span class="label label-primary">Super Chambers</span>
	</div>
	<div class= "col-xs-2">
		<span class="label label-success">Flip</span>
	</div>
	<div class= "col-xs-2">
		<span class="label label-danger">Flow</span>
	</div>
	
</div>

<br>
<div class="form-group">

	<div class= "col-xs-8">
		<select name="superchamber5">
                <option value="select" selected  >Select Super Chamber</option>
	
	<?php list_superchambers_combobox();
?>



	</select>
	</div>

	<div class= "col-xs-2">
		<input type="checkbox" name="flip10" value="flip10">
	</div>
	<div class= "col-xs-2">
		<input type="text" name="flow10" maxlength="4" size="2" >
	</div>
        
</div>
     



 <div class="row">
</div>
<br>
<div class="form-group">

        <div class= "col-xs-8">
                <select name="superchamber4">
                <option value="select" selected  >Select Super Chamber</option>
     
                   <?php list_superchambers_combobox();?>
</select>
        </div>

        <div class= "col-xs-2">
                <input type="checkbox" name="flip8" value="flip8">
        </div>
        <div class= "col-xs-2">
                <input type="text" name="flow8" maxlength="4" size="2"> 
        </div>
</div>

<div class="row">
</div>
<br>
<div class="form-group">

        <div class= "col-xs-8">
                <select name="superchamber3">
                <option value="select" selected  >Select Super Chamber</option>

                        <?php list_superchambers_combobox();?>
</select>
        </div>

        <div class= "col-xs-2">
                <input type="checkbox" name="flip6" value="flip6">
        </div>
        <div class= "col-xs-2">
                <input type="text" name="flow6" maxlength="4" size="2" >
        </div>
</div>

<div class="row">
</div>
<br>
<div class="form-group">

        <div class= "col-xs-8">
                <select name="superchamber2">
                <option value="select" selected  >Select Super Chamber</option>

                        <?php list_superchambers_combobox();?>
</select>
        </div>

        <div class= "col-xs-2">
                <input type="checkbox" name="flip4" value="flip4">
        </div>
        <div class= "col-xs-2">
                <input type="text" name="flow4" maxlength="4" size="2" >
        </div>
</div>


<div class="row">
</div>
<br>
<div class="form-group">

        <div class= "col-xs-8">
                <select name="superchamber1">
                <option value="select" selected  >Select Super Chamber</option>

                        <?php list_superchambers_combobox();?>
</select>
        </div>

        <div class= "col-xs-2">
                <input type="checkbox" name="flip2" value="flip2">
        </div>
        <div class= "col-xs-2">
                <input type="text" name="flow2" maxlength="4" size="2" >
        </div>
</div>



</div>


 <div class="col-xs-4 panel-info panel" style="padding-left: 0px; padding-right: 0px;">
                          <div class="panel-heading">
                              <h3 class="panel-title" align="center">Column 2:</h3>
                          

</div>

<div class="form-group">
        <div class= "col-xs-8">
                <span class="label label-primary">Super Chambers</span>
        </div>
        <div class= "col-xs-2">
                <span class="label label-success">Flip</span>
        </div>
        <div class= "col-xs-2">
                <span class="label label-danger">Flow</span>
        </div>

</div>
<br>
<div class="form-group">

	<div class= "col-xs-8">
		<select name="superchamber10">
                <option value="select" selected  >Select Super Chamber</option>
	
	<?php list_superchambers_combobox();
?>



	</select>
	</div>

	<div class= "col-xs-2">
		<input type="checkbox" name="flip20" value="flip20">
	</div>
	<div class= "col-xs-2">
		<input type="text" name="flow20" maxlength="4" size="2" >
	</div>
        
</div>
     



 <div class="row">
</div>
<br>
<div class="form-group">

        <div class= "col-xs-8">
                <select name="superchamber9">
                <option value="select" selected  >Select Super Chamber</option>

                        <?php list_superchambers_combobox();?>
</select>
        </div>

        <div class= "col-xs-2">
                <input type="checkbox" name="flip18" value="flip18">
        </div>
        <div class= "col-xs-2">
                <input type="text" name="flow18" maxlength="4" size="2" > 
        </div>
</div>

<div class="row">
</div>
<br>
<div class="form-group">

        <div class= "col-xs-8">
                <select name="superchamber8">
                <option value="select" selected  >Select Super Chamber</option>

                        <?php list_superchambers_combobox();?>
</select>
        </div>

        <div class= "col-xs-2">
                <input type="checkbox" name="flip16" value="flip16">
        </div>
        <div class= "col-xs-2">
                <input type="text" name="flow16" maxlength="4" size="2" >
        </div>
</div>


<div class="row">
</div>
<br>
<div class="form-group">

        <div class= "col-xs-8">
                <select name="superchamber7">
                <option value="select" selected  >Select Super Chamber</option>

                        <?php list_superchambers_combobox();?>
</select>
        </div>

        <div class= "col-xs-2">
                <input type="checkbox" name="flip14" value="flip14">
        </div>
        <div class= "col-xs-2">
                <input type="text" name="flow14" maxlength="4" size="2" >
        </div>
</div>


<div class="row">
</div>
<br>
<div class="form-group">

        <div class= "col-xs-8">
                <select name="superchamber6">
                <option value="select" selected  >Select Super Chamber</option>

                        <?php list_superchambers_combobox();?>
</select>
        </div>

        <div class= "col-xs-2">
                <input type="checkbox" name="flip12" value="flip12">
        </div>
        <div class= "col-xs-2">
                <input type="text" name="flow12" maxlength="4" size="2" >
        </div>
</div>


</div>

 <div class="col-xs-4 panel-info panel" style="padding-left: 0px; padding-right: 0px;">
                          <div class="panel-heading">
                              <h3 class="panel-title" align="center">  Column 3:</h3>
                          
</div>

<div class="form-group">
        <div class= "col-xs-8">
                <span class="label label-primary">Super Chambers</span>
        </div>
        <div class= "col-xs-2">
                <span class="label label-success">Flip</span>
        </div>
        <div class= "col-xs-2">
                <span class="label label-danger">Flow</span>
        </div>

</div>
<br>
<div class="form-group">

	<div class= "col-xs-8">
		<select name="superchamber15">
                <option value="select" selected  >Select Super Chamber</option>
	
	<?php list_superchambers_combobox();
?>



	</select>
	</div>

	<div class= "col-xs-2">
		<input type="checkbox" name="flip30" value="flip30">
	</div>
	<div class= "col-xs-2">
		<input type="text" name="flow30" maxlength="4" size="1" >
	</div>
        
</div>
     



 <div class="row">
</div>
<br>
<div class="form-group">

        <div class= "col-xs-8">
                <select name="superchamber14">
                <option value="select" selected  >Select Super Chamber</option>

                        <?php list_superchambers_combobox();?>
</select>
        </div>

        <div class= "col-xs-2">
                <input type="checkbox" name="flip28" value="flip28">
        </div>
        <div class= "col-xs-2">
                <input type="text" name="flow28" maxlength="4" size="1" >
        </div>

</div>
<div class="row">
</div>

<br>
<div class="form-group">

        <div class= "col-xs-8">
                <select name="superchamber13">
                <option value="select" selected  >Select Super Chamber</option>

                        <?php list_superchambers_combobox();?>
</select>
        </div>

        <div class= "col-xs-2">
                <input type="checkbox" name="flip26" value="flip26">
        </div>
        <div class= "col-xs-2">
                <input type="text" name="flow26" maxlength="4" size="1" >
        </div>
</div>


<div class="row">
</div>
<br>
<div class="form-group">

        <div class= "col-xs-8">
                <select name="superchamber12">
                <option value="select" selected  >Select Super Chamber</option>

                        <?php list_superchambers_combobox();?>
</select>
        </div>

        <div class= "col-xs-2">
                <input type="checkbox" name="flip24" value="flip24">
        </div>
        <div class= "col-xs-2">
                <input type="text" name="flow24" maxlength="4" size="1" >
        </div>
</div>
<div class="row">
</div>
<br>
<div class="form-group">

        <div class= "col-xs-8">
                <select name="superchamber11">
                <option value="select" selected  >Select Super Chamber</option>

                        <?php list_superchambers_combobox();?>
</select>
        </div>

        <div class= "col-xs-2">
                <input type="checkbox" name="flip22" value="flip22">
        </div>
        <div class= "col-xs-2">
                <input type="text" name="flow22" maxlength="4" size="1" >
        </div>
</div>

</div>


</div>



                  <button type="submit" class="btn btn-default subbutt">Submit</button>

                      </div>






              </form>




<?php
include "foot.php";
?>
<script type="text/javascript">
  //$(document).ready(function () {
    //  $("#add").click(function () {
//	  $('#mytable tbody>tr:last').clone(true).insertAfter('#mytable tbody>tr:last');
  //          alert($('#mytable tbody>tr:last').find("input").first().val());
    //        $('#mytable tbody>tr:last').find("input").first().val( $(this).val()+100);
      //      return false;
        //});
	jQuery(document).ready(function ($) {
        $( ".date" ).datetimepicker();
        $.fn.datetimepicker.defaults = {
            pickSeconds: false        // disables seconds in the time picker
        };        
            $(".imon").focus(function() {
    console.log('in');
}).blur(function() {
    console.log('out');
    $(this).parent().next().find("input").attr("value","3300")
});
    });
</script>
<script type="text/javascript" language="javascript">
function checkfile(sender) {
    var validExts = new Array(".xlsx", ".xls", ".xlsm");
    var fileExt = sender.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (validExts.indexOf(fileExt) < 0) {
      alert("Invalid file selected, valid files are of " +
               validExts.toString() + " types.");
      return false;
    }
    else return true;
}
</script>

