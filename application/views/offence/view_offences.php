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
            <?php if(count($offences) > 0): ?>
              
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Offence Code</th>
                            <th>Offence Category</th>
                            <th>Offence Points</th>
                            <th>Offence Penalty</th>
                            <th>Offence Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num = 0 ?>
                        <?php foreach($offences as $offence) { ?>
                            <tr>
                                <?php $num=$num+1  ?>
                                <td><?php echo $num ?></td>
                                <td><?php echo $offence->code ?></td>
                                <td><?php echo $offence->category ?></td>
                                <td><?php echo $offence->points ?></td>
                                <td><?php echo $offence->penalty ?></td>
                                <td><?php echo $offence->offence_desc ?></td>
                                <td>
                                    <a class="btn btn-primary" href="<?php echo base_url('/edit-offence'); ?>/<?php echo $offence->offence_id ?>">Edit</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Offence Code</th>
                            <th>Offence Category</th>
                            <th>Offence Points</th>
                            <th>Offence Penalty</th>
                            <th>Offence Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            <?php else: ?>
                <h1 align="center">No offence yet!.</h1>
            <?php endif; ?>
        </div> 
    </div>
</div>
        
            