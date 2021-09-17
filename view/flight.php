<?php include './controlers/connection.php' ?>
<!-- Header-->
<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-7">
           

        <div class="col-sm-5">
            

            

        </div>
    </div>

</header><!-- /header -->
<!-- Header-->

<div class="breadcrumbs">
    
</div>

<div class="content mt-3">

    <div class="col-sm-12">
        
    </div>


    
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        
            <div class="col-md-12">
            
            <div class="card-body">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#teacherModal"><i class="fa fa-plus"></i>&nbsp; New Flight</button>
</div>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Flight List </strong>
                    </div>
                    
                    <div class="card-body">
                    
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Information</th>
                                    <th>Seats</th>
                                    
                                    <th>Available</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>

                            <?php 
                         
                                            include "./controlers/connection.php";
                                            $query = "SELECT * FROM ((flight_list INNER JOIN airlines_list ON flight_list.airline_id) INNER JOIN depature_table ON flight_list.depature_id ) WHERE airlines_list.airline_id = flight_list.airline_id AND depature_table.depature_id = flight_list.depature_id";
                                            $Statement=$conn->prepare($query);
                                            $Statement->execute();
                                            $row=$Statement->fetchAll(PDO::FETCH_ASSOC);
                                            $count=1;
                                            foreach ($row as $display){
                                                $flight_id = $display['flight_id'];
                                                $date = $display['date_created'];
                                                $info = $display['airlines'];
                                                $airport = $display['depature_airport'];
                                                $arrival = $display['arrival_airport'];
                                                $airline_logo = $display['logo_path'];
                                                $d_time = $display['departure_datetime'];
                                                $a_time = $display['arrival_datetime'];
                                                $seats = $display['seats'];
                                                $price = $display['price'];
                                                
                                                
                                                    ?>
                                                     <tr>
                                                     <td><?php echo $date ?></td>
                                                     <td>
                                                     <div class="col-sm-4"> <img src="./images/<?php echo $airline_logo ?>" alt="" class="btn-rounder badge-pill"></div>
                                                     <div class="col-sm-6">
                                                          <p>Airline :<b><?php echo $info ?></b></p>
                                                          <p><small>Location :<b><?php echo $airport.' - '.$arrival?></small></b></p>
                                                          <p><small>Departure :<b><?php echo date('M d,Y h:i A',strtotime($d_time)) ?></small></b></p>
                                                          <p><small>Arrival :<b><?php echo date('M d,Y h:i A',strtotime($a_time)) ?></small></b></p>
                                                          </div>
                                                     </td>
                                                     <td><?php echo $seats ?></td> 
                                                     
                                                     <td><?php echo $seats ?></td>
                                                     <td><?php echo $price ?></td>

                                                     <td>
                                                     <a  href="edit-flight.php?id=<?php echo $flight_id;?>" class="btn btn-success btn-sm"  ><span class="fa fa-edit"></span>&nbsp; Edit</a>
                                                    <a  href="./controlers/remove-flight.php?id=<?php echo $flight_id;?>" class="btn btn-danger btn-sm"  ><span class="fa fa-trash"></span>&nbsp; Delete</a>
                                                   
                                                    </td>
                                                
                                                    
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
    </div><!-- .animated -->
</div><!-- .content -->


</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Teacher modal -->

<?php 
                         
                         include "./controlers/connection.php";
                         $query ="SELECT * FROM airlines_list";
                         $Statement=$conn->prepare($query);
                         $Statement->execute();
                         $row=$Statement->fetchAll(PDO::FETCH_ASSOC);
                         
?>

<?php 
                         
                         include "./controlers/connection.php";
                         $query ="SELECT * FROM airport_list";
                         $Statement=$conn->prepare($query);
                         $Statement->execute();
                         $location=$Statement->fetchAll(PDO::FETCH_ASSOC);
                         
?>

<?php 
                         
                         include "./controlers/connection.php";
                         $query ="SELECT * FROM airport_list";
                         $Statement=$conn->prepare($query);
                         $Statement->execute();
                         $arrival=$Statement->fetchAll(PDO::FETCH_ASSOC);
                         
?>

<div class="modal fade" id="teacherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Flight</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="./controlers/insertFlight.php">

        <div class="form-group">
            <label for="exampleFormControlSelect1">Airline</label>
            <select class="form-control" id="exampleFormControlSelect1" name="airline">
              <option>Please select Airline</option>
              <?php foreach ($row as $display){
                    $airline_id = $display['airline_id'];
                    $airline_name = $display['airlines'];
              ?>
                <option value="<?php echo $airline_id ?>"><?php echo $airline_name ?></option>
              <?php } ?>
            </select>
        </div>

        

      <div class="form-group">
        <label for="my-input">Plane No</label>
        <input id="my-input" class="form-control" type="text" name="planeNo" required>
        </div>

    
  <div class="row">
    <div class="col">
    <label for="exampleFormControlSelect1">Depature Location</label>
    <select class="form-control" id="exampleFormControlSelect1" name="depature">
              <option>Please select</option>
              <?php foreach ($location as $display){
                    $location_id = $display['id'];
                    $location = $display['location'];
              ?>
                <option value="<?php echo $location ?>"><?php echo $location ?></option>
              <?php } ?>
            </select>
    </div>
    <div class="col">
    <label for="exampleFormControlSelect1">Arrival Location</label>
    <select class="form-control" id="exampleFormControlSelect1" name="arrival">
              <option>Please Select</option>
              <?php foreach ($arrival as $display){
                    $arrival_id = $display['id'];
                    $arrival = $display['location'];
              ?>
                <option value="<?php echo $arrival ?>"><?php echo $arrival ?></option>
              <?php } ?>
            </select>
    </div>
  </div>


<br>

        <div class="form-group">
        
  <div class="row">
    <div class="col">
    <label for="my-input">Depature Time/Date</label>
      <input type="datetime-local" id="datetime" class="form-control" placeholder="" name="d_time">
    </div>
    <div class="col">
    <label for="my-input">Arrival Time/Date</label>
      <input type="datetime-local" class="form-control" placeholder="" name="a_time">
    </div>
  </div>

        </div>

     

        <div class="form-group">
        
  <div class="row">
    <div class="col">
    <label for="my-input">Seats</label>
      <input type="text" class="form-control" placeholder="" name="seats">
    </div>
    <div class="col">
    <label for="my-input">Price</label>
      <input type="number" class="form-control" placeholder="" name="price">
    </div>
  </div>

        </div>
     

      

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="insertFlight">
      </div>
      </form>
    </div>
  </div>
</div>





