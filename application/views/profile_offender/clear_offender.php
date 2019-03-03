
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
                        <?php if(isset($_GET['success']) && $_GET['success'] == "true"){ ?>
                            <div class = "alert alert-success">
                                Citizen Offence Cleared Successfully.
                            </div>
                        <?php } ?>
                        <?php echo form_open(base_url('/clear-offender')); ?>
                            <div class="box-body">
                                
                                <?php if(count($error) > 0){ ?>
                                    
                                    <?php foreach($error as $er){ ?>
                                        <span style = "color:red;">
                                            <?php echo $er ?>
                                        </span><br />
                                <?php 
                                    } 
                                } 
                                ?>
                                        
                                <?php if(form_error('license_no')) {?>
                                        <?php echo form_error('license_no'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Citizen License Number', 'license_no'); ?>
                                    <?php echo form_input('license_no', $citizen->license_no, array("class"=>"form-control")); ?>
                                </div>
                                
                            </div>
                            <div class="box-footer">
                                <?php echo form_submit('save', 'Validate Offender', array("class"=>"btn btn-primary")); ?>
                            </div>  
                        <?php echo form_close(); ?>
                        
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
                                                <td>
                                                    <a class="btn btn-primary" onclick='goto("<?php echo base_url('/clear-charge'); ?>/<?php echo $offence['citizen_offence_id'] ?>")' id='delete_attachment' href="#">Clear Charge</a>
                                                </td>
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
                                <h1 align="center">Citizen does not have any uncleared offences!.</h1>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div> 
                </div>
            </div>
        