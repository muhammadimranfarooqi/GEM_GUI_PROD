
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
	  <h2 class="sub-header"> <img src="images/ROPCB.png" width="4%"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Quick Efficiency Test  </h2>

	  <?php

	      echo '<div style="display: none" role="alert" class="alert alert-danger ">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><strong>Error!</strong> Please fill the required fields.
  </div>';
	      ?>

	      <!--<form method="POST" action="qc3_leak_test.php" enctype='multipart/form-data'>-->
	      <form method="POST" action="convert_qc8_quick_efficiency.php" enctype='multipart/form-data'>
			<input type="hidden" name="submited" value="true" /><br>
		  <div class="row">
		      <div class="col-xs-6 panel-info panel" style="padding-left: 0px; padding-right: 0px;">
			  <div class="panel-heading">
			      <h3 class="panel-title" >  <span aria-hidden="true" class="glyphicon glyphicon-info-sign"></span>Select file to be uploaded:</h3>
			  </div>
			  <div class="panel-body">

			  
				  <div class="form-group">
				      <label> Upload Data (EXCEL only) <i class="ace-icon glyphicon glyphicon-barcode"></i></label><br>
					

				      <!--<input type="file" name="file" id="file" required >
				      <input type="file" name="file" accept=".xls,.xlsx,.xlsm" required >-->
					<input type="file" name="file" id="file" onchange="checkfile(this);" required/>
				  </div>
			  </div>
		      </div>
			</div>







		  <button type="submit" class="btn btn-default subbutt">Submit</button>   



	      </form>
</div>
</div>
</div>

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

