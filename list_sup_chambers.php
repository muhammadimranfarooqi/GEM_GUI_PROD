
<?php 
include "head.php";


?>
<?php include "head_panel.php"; ?>


    <div class="container-fluid">
      <div class="row">
<?php  include "side.php"; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><img src="images/sc2.png" width="4%">Super-Chambers List</h1>

<a href="new_sup_chamber.php"><button type="button" class="btn btn-success"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add new super-chamber</button></a>
<!--<form class="navbar-form navbar-right">
           <span class="glyphicon glyphicon-search" aria-hidden="true"></span> <input class="form-control" placeholder="Search for chamber" type="text">
          </form> -->
          <h2 class="sub-header">List</h2>
          
          <div class="table-responsive">
            <table id="example" class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Serial</th>
<!--                  <th>Status</th>-->
                  <th>User responsible</th>
                  <th>Show</th>
                </tr>
              </thead>
              <tbody>
                  <?php $drifts=  get_list_part_ID($SUPER_CHAMBER_KIND_OF_PART_ID);
          //print_r($drifts);
          foreach( $drifts as $drift){
               
              echo '<tr>
                  <td>'.$drift['PART_ID'].'</td>
                  <td>'.$drift['SERIAL_NUMBER'].'</td>
                  
                  <td><span aria-hidden="true" class="glyphicon glyphicon-user"> '.$drift['RECORD_INSERTION_USER'].' </span></td>
                  <td><a href="show_sup_chamber.php?id='.$drift['SERIAL_NUMBER'].'"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Show</button></a></td>
                </tr>';
          }
          
          ?>
<!--                <tr>
                  <td>1</td>
                  <td>SUP-GE1/1-VI-L-CERN-0001</td>
                  <td><span class="label label-primary">Installed</span></td>
                  <td><span aria-hidden="true" class="glyphicon glyphicon-user"> oaboamer </span></td>
                  <td><a href="show_sup_chamber.php?id=SUP-GE1/1-VI-L-CERN-0001"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Show</button></a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>SUP-GE1/1-VI-S-CERN-0002</td>
                  <td> <span class="label label-success">Accepted</span></td>
                  <td><span aria-hidden="true" class="glyphicon glyphicon-user"> aliah </span></td>
                  <td><a href="show_sup_chamber.php?id=SUP-GE1/1-VI-L-CERN-0002"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Show</button></a></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>SUP-GE1/1-VI-L-CERN-0010</td>
                  <td> <span class="label label-danger">Rejected</span></td>
                  <td><span aria-hidden="true" class="glyphicon glyphicon-user"> abc </span></td>
                  <td><a href="show_sup_chamber.php?id=SUP-GE1/1-VI-L-CERN-0010"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Show</button></a></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>SUP-GE1/1-VI-S-CERN-0013</td>
                  <td> <span class="label label-warning">Waiting</span></td>
                  <td><span aria-hidden="true" class="glyphicon glyphicon-user"> tester </span></td>
                  <td><a href="show_sup_chamber.php?id=SUP-GE1/1-VI-L-CERN-0013"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Show</button></a></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>SUP-GE1/1-VI-L-CERN-0019</td>
                  <td> <span class="label label-default">Spare</span></td>
                  <td><span aria-hidden="true" class="glyphicon glyphicon-user"> oaboamer </span></td>
                  <td><a href="show_sup_chamber.php?id=SUP-GE1/1-VI-L-CERN-0019"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Show</button></a></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>SUP-GE1/1-VI-S-CERN-0022</td>
                  <td> <span class="label label-primary">Installed</span></td>
                  <td><span aria-hidden="true" class="glyphicon glyphicon-user"> oaboamer </span></td>
                  <td><a href="show_sup_chamber.php?id=SUP-GE1/1-VI-L-CERN-0022"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Show</button></a></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>SUP-GE1/1-VI-L-CERN-0025</td>
                  <td> <span class="label label-primary">Installed</span></td>
                  <td><span aria-hidden="true" class="glyphicon glyphicon-user"> aliah </span></td>
                  <td><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Show</button></td>
                </tr>-->
              </tbody>
            </table>
          </div>
<!--          <nav>
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>-->
        </div>
          
      </div>
        
    </div>



  <?php 
include "foot.php";

?>
<script>
$("#schamber").attr("class","active");
$(document).ready(function() { $('#example').DataTable(); } );

</script>
