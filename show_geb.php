
<?php
include "head.php";
?>
<?php include "head_panel.php"; ?>



<div class="container-fluid">
    <div class="row">

        <?php include "side.php"; ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header"><img src="images/GEB.png" width="4%"> Show GEB  </h1>

            <!--<a href="edit_gem.php?id=<?php /*echo $_GET["id"];*/ ?>"><button class="btn btn-success" type="button">Edit</button></a>-->
            <a href="list_parts_geb.php"><button class="btn btn-warning" type="button"><span aria-hidden="true" class="glyphicon glyphicon-backward"></span>Back to list</button></a>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">GEB [<?php echo $_GET["id"]; ?>] </h3>
                </div>
                <div class="panel-body">
                                                           <?php
                                $data = get_part_by_ID_KIND($_GET["id"],$_GET["type"]);
                                if (!empty($data)) {
                                    ?>
                    <!-- Panel content -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">

                                <div class=" col-md-12 col-lg-12 "> 
                                    <table class="table table-user-information">
                                        <tbody>
                             <?php
                                    if (!empty($data[0]['PART_ID'])) {
                                        ?> <tr>
                                                <th>ID</th>
                                                <td><?= $data[0]['PART_ID'] ?></td>
                                            </tr> <?php
                                    }
                                    if (!empty($data[0]['SERIAL_NUMBER'])) {
                                        ?> <tr>
                                                <th>Serial Number:</th>
                                                <td><?= $data[0]['SERIAL_NUMBER'] ?></td>
                                            </tr> <?php
                                    }
                                    if (!empty($data[0]['NAME_LABEL'])) {
                                        ?> 
                                            <tr>
                                                <th>Name:</th>
                                                <td><?= $data[0]['NAME_LABEL'] ?></td>
                                            </tr>
                                            <?php
                                    }
                                    if (!empty($data[0]['BARCODE'])) {
                                        ?> 
                                            <tr>
                                                <th>Barcode:</th>
                                                <td> <?= $data[0]['BARCODE']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    
                                    if (!empty($data[0]['RECORD_INSERTION_TIME'])) {
                                        ?> 
                                            <tr>
                                                <th>Inserted at:</th>
                                                <td> <?= $data[0]['RECORD_INSERTION_TIME']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    if (!empty($data[0]['RECORD_INSERTION_USER'])) {
                                        ?> 
                                            <tr>
                                                <th>Inserted by:</th>
                                                <td> <?= $data[0]['RECORD_INSERTION_USER']; ?></td>
                                            </tr>
                                            <?php
                                    }
				    if (!empty($data[0]['DISPLAY_NAME'])) {
                                        ?>
                                            <tr>
                                                <th>GEB TYPE:</th>
                                                <td> <?= $data[0]['DISPLAY_NAME']; ?></td>
                                            </tr>
                                            <?php
                                    }

                                    if (!empty($data[0]['MANUFACTURER_ID'])) {
                                        ?> 
                                            <tr>
                                                <th>Manufacturer name:</th>
                                                <td><?= $data[0]['MANUFACTURER_ID']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    if (!empty($data[0]['LOCATION_ID'])) {
                                        ?> 
                                             <tr>
                                                 <th>Location:</th>
                                                <td><?= $data[0]['LOCATION_ID']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    if (!empty($data[0]['COMMENT_DESCRIPTION'])) {
                                        ?> 
                                            <tr>
                                                <th>Comment or description:</th>
                                                <td><?= $data[0]['COMMENT_DESCRIPTION']; ?></td>
                                            </tr>
                                            <?php
                                    }
                                    ?>
                                        
                    
                                           
                                            
                                            
                                            


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                                } else {
                                    echo "No Item found for this ID";
                                }
                                ?>

                   <div class="row">
                                <div class="col-md-6"><div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Child parts:</h3>
                                        </div>
                                        <div class="panel-body">
                                            <ul class="list-group">
                                                <?php get_attached_parts_show($data[0]['PART_ID']); ?>

                                            </ul>
                                        </div>
                                    </div></div>
  




            
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include "foot.php";
?>
<script>
     jQuery(document).ready(function($) {
$("#partslist").show();
$("#<?= $GEB_ID; ?>").attr("class","active");
})
</script>
