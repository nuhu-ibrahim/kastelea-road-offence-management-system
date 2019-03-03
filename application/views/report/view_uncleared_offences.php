
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
                        <?php if(isset($citizen_offences)): ?>
                            <?php if(count($citizen_offences) > 0): ?>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Offence Code</th>
                                            <th>Offence Penalty</th>
                                            <th>Offence Date</th>
                                            <th>Report Date</th>
                                            <th>Vehicle Reg. Number</th>
                                            <th>Offence Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $num = 0 ?>
                                        <?php foreach($citizen_offences as $offence) { ?>
                                            <tr>
                                                <?php $num=$num+1  ?>
                                                <td><?php echo $num ?></td>
                                                <td><?php echo $offence['firstname'] ?></td>
                                                <td><?php echo $offence['lastname'] ?></td>
                                                <td><?php echo $offence['code'] ?></td>
                                                <td><?php echo $offence['penalty'] ?></td>
                                                <td><?php echo $offence['offence_date'] ?></td>
                                                <td><?php echo $offence['report_date'] ?></td>
                                                <td><?php echo $offence['vehicle_reg_no'] ?></td>
                                                <td><?php echo $offence['settlement'] ?></td>
                                                <?php if($offence['settlement'] == "UNSETTLED"){ ?>
                                                    <td>
                                                        <a class="btn btn-primary" onclick='goto("<?php echo base_url('/clear-charge'); ?>/<?php echo $offence['citizen_offence_id'] ?>")' id='delete_attachment' href="#">Clear Charge</a>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Offence Code</th>
                                            <th>Offence Penalty</th>
                                            <th>Offence Date</th>
                                            <th>Report Date</th>
                                            <th>Vehicle Reg. Number</th>
                                            <th>Offence Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            <?php else: ?>
                                <h1 align="center">No uncleared offences!.</h1>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div> 
                </div>
            </div>
        