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
                                       
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Booked Flight List</strong>
                    </div>
                    
                    <div class="card-body">
                        <table  id="flight-list" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> #</th>
                                    <th>Information</th>
                                    <th>Flight Info</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php 
                         
                                            include "./controlers/connection.php";
                                            $query = "SELECT * FROM (((booked_flight INNER JOIN flight_list ON flight_list.flight_id) INNER JOIN depature_table ON flight_list.depature_id) INNER JOIN airlines_list ON flight_list.airline_id) WHERE booked_flight.flight_id = flight_list.flight_id AND airlines_list.airline_id = flight_list.airline_id";
                                            $Statement=$conn->prepare($query);
                                            $Statement->execute();
                                            $row=$Statement->fetchAll(PDO::FETCH_ASSOC);
                                            $count=1;
                                            foreach ($row as $display){
                                                
                                                $book_id = $display['id'];
                                                $name = $display['name'];
												$address = $display['address'];
												$phone = $display['contact'];
												$info = $display['airlines'];
                                                $airport = $display['depature_airport'];
                                                $arrival = $display['arrival_airport'];
                                                $airline_logo = $display['logo_path'];
                                                $d_time = $display['departure_datetime'];
                                                $a_time = $display['arrival_datetime'];
                                                
                                                
                                                
                                                    ?>
                                                    <tr>
                                                    <td><?php echo $count++ ?></td>
                                                    <td>
                                                     <div class="col-sm-6">
                                                          <p>Fullname :<b><?php echo $name ?></b></p>
                                                          <p><small>Adddress :<b><?php echo $address?></small></b></p>
                                                          <p><small>Phone Number :<b><?php echo $phone  ?></small></b></p>
                                                          </div>
                                                     </td>
                                                   

													 <td>
                                                     <div class="col-sm-4"> <img src="./images/<?php echo $airline_logo ?>" alt="" class="btn-rounder badge-pill"></div>
                                                     <div class="col-sm-6">
                                                          <p>Airline :<b><?php echo $info ?></b></p>
                                                          <p><small>Location :<b><?php echo $airport.' - '.$arrival?></small></b></p>
                                                          <p><small>Departure :<b><?php echo date('M d,Y h:i A',strtotime($d_time)) ?></small></b></p>
                                                          <p><small>Arrival :<b><?php echo date('M d,Y h:i A',strtotime($a_time)) ?></small></b></p>
                                                          </div>
                                                     </td>

                                                    <td>
                                                    <a  href="./controlers/approve.php?id=<?php echo $book_id;?>" class="btn btn-success btn-sm"  ><span class="fa fa-edit"></span>&nbsp; Approve</a>
                                                    <a  href="./controlers/cancel.php?id=<?php echo $book_id;?>" class="btn btn-danger btn-sm"  ><span class="fa fa-trash"></span>&nbsp; Cancel</a>
                                                   
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


