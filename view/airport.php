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
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#teacherModal"><i class="fa fa-plus"></i>&nbsp;  Airport</button>
</div>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Flight List </strong>
                    </div>
                    
                    <div class="card-body">
                    
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Airport</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php 
                         
                                            include "./controlers/connection.php";
                                            $query ="SELECT * FROM airport_list";
                                            $Statement=$conn->prepare($query);
                                            $Statement->execute();
                                            $row=$Statement->fetchAll(PDO::FETCH_ASSOC);
                                            $count=1;
                                            foreach ($row as $display){
                                                $airport_id = $display['airport_id'];
                                                $airport_name = $display['airport'];
                                                $airport_location = $display['location'];
                                                
                                                
                                                    ?>
                                                     <tr>
                                                     <td><?php echo $count++ ?></td>
                                                     <td><?php echo $airport_name ?></td>
                                                     <td><?php echo $airport_location ?></td> 

                                                     <td>
                                                     <a  href="edit-airport.php?id=<?php echo $airport_id;?>" class="btn btn-success btn-sm"  ><span class="fa fa-edit"></span>&nbsp; Edit</a>
                                                    <a  href="./controlers/remove-airport.php?id=<?php echo $airport_id;?>" class="btn btn-danger btn-sm"  ><span class="fa fa-trash"></span>&nbsp; Delete</a>
                                                   
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

<div class="modal fade" id="teacherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Airport Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="./controlers/insertAirport.php">

       

      <div class="form-group">
        <label for="my-input">Airport </label>
        <input id="my-input" class="form-control" type="text" name="airportName" required>
        </div>

        <div class="form-group">
        <label for="my-input">Location </label>
        <input id="my-input" class="form-control" type="text" name="airportLocation" required>
        </div>

    
  
     

      

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="inserAirport">
      </div>
      </form>
    </div>
  </div>
</div>





