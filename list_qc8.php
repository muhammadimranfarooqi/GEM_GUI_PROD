
<?php
include "head.php";
?>
<?php include "head_panel.php"; ?>



<div class="container-fluid">
    <div class="row">

<div><?php include "side.php"; ?>
</div>
      <div align = "center">      <h1 class="page-header">Quality control list</h1></div>

</div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            



          <div class="row placeholders">
            <a href="qc8_alignment_test.php">
            <div class="col-xs-6 col-sm-4 placeholder">
              <img src="images/c1.bmp" class="img-responsive" alt="Generic placeholder thumbnail" style="width: 150px;">
              <h4>Alignment</h4>
              <span class="text-muted">QC8 Alignment Test</span>
            </div>
            </a>
            <a href="qc8_ch_vfat_efficiency_test.php">
            <div class="col-xs-6 col-sm-4 placeholder">
              <img src="images/c1.bmp" class="img-responsive" alt="Generic placeholder thumbnail" style="width: 150px;">
              <h4>Chamber VFAT Efficiency Test</h4>
              <span class="text-muted">QC8 Chamber VFAT Efficiency Test</span>
            </div>
            </a>

<a href="qc8_stand_geo_conf_test.php">
            <div class="col-xs-6 col-sm-4 placeholder">
              <img src="images/c1.bmp" class="img-responsive" alt="Generic placeholder thumbnail" style="width: 150px;">
              <h4>Stand Geometry Configuration Test</h4>
              <span class="text-muted">QC8 Stand Geometry Configuration Test</span>
            </div>
            </a>
</div>
</div>
</div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="row placeholders">

<a href="qc8_deadstrips_test.php">
            <div class="col-xs-6 col-sm-4 placeholder">
              <img src="images/c1.bmp" class="img-responsive" alt="Generic placeholder thumbnail" style="width: 150px;">
              <h4>Dead Strips</h4>
              <span class="text-muted">QC8 Dead Strips</span>
            </div>
            </a>


<a href="qc8_hotstrips_test.php">
            <div class="col-xs-6 col-sm-4 placeholder">
              <img src="images/c1.bmp" class="img-responsive" alt="Generic placeholder thumbnail" style="width: 150px;">
              <h4>Hot Strips</h4>
              <span class="text-muted">QC8 Hot Strips</span>
            </div>
            </a>

<a href="qc8_quick_efficiency_test.php">
            <div class="col-xs-6 col-sm-4 placeholder">
              <img src="images/c1.bmp" class="img-responsive" alt="Generic placeholder thumbnail" style="width: 150px;">
              <h4>Quick Efficiency</h4>
              <span class="text-muted">QC8 Quick Efficiency</span>
            </div>
            </a>


          </div>



        </div>

    </div>
</div>



<?php
include "foot.php";
?>
<script>
    $("#qc").attr("class", "active");
</script>
