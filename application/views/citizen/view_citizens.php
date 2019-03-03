<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
         <h2><?php echo $header ?></h2>   
        </div>
    </div>              
     <!-- /. ROW  -->
      <hr />
    <div class="row">
        <div class="col-lg-12 ">
            <div class="alert alert-info">
                 <strong>Welcome <?php echo $user->firstname.' '.$user->lastname ?>!, </strong> <?php echo $sub_header ?>
            </div>

        </div>
    </div>
        <!-- /. ROW  --> 
    <div class="row  pad-top">
        <div class="col-lg-12 col-md-2 col-sm-2 col-xs-6">
            <?php if(count($citizens) > 0): ?>
              
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>License Number</th>
                            <th>Firstname</th>
                            <th>Middlename</th>
                            <th>Lastname</th>
                            <th>Gender</th>
                            <th>State of Origin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num = 0 ?>
                        <?php foreach($citizens as $citizen) { ?>
                            <tr>
                                <?php $num=$num+1  ?>
                                <td><?php echo $num ?></td>
                                <td><?php echo $citizen->license_no ?></td>
                                <td><?php echo $citizen->firstname ?></td>
                                <td><?php echo $citizen->middlename ?></td>
                                <td><?php echo $citizen->lastname ?></td>
                                <td><?php echo $citizen->sex ?></td>
                                <td><?php echo $citizen->state_of_origin ?></td>
                                <td>
                                    <a class="btn btn-primary" href="<?php echo base_url('/edit-citizen'); ?>/<?php echo $citizen->citizen_id ?>">Edit</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>License Number</th>
                            <th>Firstname</th>
                            <th>Middlename</th>
                            <th>Lastname</th>
                            <th>Gender</th>
                            <th>State of Origin</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            <?php else: ?>
                <h1 align="center">No citizen yet!.</h1>
            <?php endif; ?>
        </div> 
    </div>
</div>
        
            