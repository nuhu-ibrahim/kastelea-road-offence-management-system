
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
                    <div class="col-lg-8 col-md-2 col-sm-2 col-xs-6">
                        <?php if(isset($_GET['success']) && $_GET['success'] == "true"){ ?>
                            <div class = "alert alert-success">
                                Citizen Offence Information Profiled Successfully.
                            </div>
                        <?php } ?> 
                        <?php echo form_open_multipart(base_url('/profile-offender/'.$citizen->citizen_id)); ?>
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
                                
                                <h4 style = "color:blue;">Offender Basic Information</h4> 
                                <?php if(form_error('license_no')) {?>
                                        <?php echo form_error('license_no'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('License Number', 'license_no'); ?>
                                    <?php echo form_input('license_no', $citizen->license_no, array("class"=>"form-control", 'disabled' => 'true')); ?>
                                </div>
                                
                                <?php if(form_error('firstname')) {?>
                                        <?php echo form_error('firstname'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Firstname', 'firstname'); ?>
                                    <?php echo form_input('firstname', $citizen->firstname, array("class"=>"form-control", 'disabled' => 'true')); ?>
                                </div>
                                
                                <?php if(form_error('lastname')) {?>
                                        <?php echo form_error('lastname'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Lastname', 'lastname'); ?>
                                    <?php echo form_input('lastname', $citizen->lastname, array("class"=>"form-control", 'disabled' => 'true')); ?>
                                </div>
                                
                                <br />
                                <h4 style = "color:blue;">Offence Information</h4> 
                                <?php if(form_error('code')) {?>
                                        <?php echo form_error('code'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Offence Code', 'code'); ?>
                                    <?php echo form_dropdown('code', $offence_codes, $offence_id, array("class"=>"form-control")); ?>
                                </div>
                                
                                <?php if(form_error('vehicle_reg_no')) {?>
                                        <?php echo form_error('vehicle_reg_no'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Vehicle Registration Number', 'vehicle_reg_no'); ?>
                                    <?php echo form_input('vehicle_reg_no', $offence_info->vehicle_reg_no, array("class"=>"form-control")); ?>
                                </div>
                                
                                <?php if(form_error('vehicle_make')) {?>
                                        <?php echo form_error('vehicle_make'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Vehicle Make', 'vehicle_make'); ?>
                                    <?php echo form_input('vehicle_make', $offence_info->vehicle_make, array("class"=>"form-control")); ?>
                                </div>
                                
                                <?php if(form_error('vehicle_colour')) {?>
                                        <?php echo form_error('vehicle_colour'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Vehicle Colour', 'vehicle_colour'); ?>
                                    <?php echo form_input('vehicle_colour', $offence_info->vehicle_colour, array("class"=>"form-control")); ?>
                                </div>
                                    
                                <?php if(form_error('vehicle_type')) {?>
                                        <?php echo form_error('vehicle_type'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Vehicle Type', 'vehicle_type'); ?>
                                    <?php echo form_dropdown('vehicle_type', array(""=>"--Select Vehicle Type--",'Motorcycle'=>"Motorcycle", "Station Wagon"=>"Station Wagon", "Bus"=>"Bus", "Tanker"=>"Tanker", "Taxi"=>"Taxi", "Jeep"=>"Jeep", "Truck"=>"Truck"), $offence_info->vehicle_type, array("class"=>"form-control")); ?>
                                </div>
                                
                                <?php if(form_error('vehicle_ownership')) {?>
                                        <?php echo form_error('vehicle_ownership'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Vehicle Ownership', 'vehicle_ownership'); ?>
                                    <?php echo form_dropdown('vehicle_ownership', array(""=>"--Select Ownership--",'Commercial'=>"Commercial", "Private"=>"Private", "Government"=>"Government"), $offence_info->vehicle_ownership, array("class"=>"form-control")); ?>
                                </div>
                                
                                <?php if(form_error('report_location')) {?>
                                        <?php echo form_error('report_location'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Report Location', 'report_location'); ?>
                                    <!--?php echo form_textarea('description', $expense->description, array("class"=>"form-control", "rows"=>"2")); ?-->
                                    <textarea name="report_location" class="form-control" rows="2" cols="40"><?php echo $offence_info->report_location ?></textarea>
                                </div>
                                
                                <?php if(form_error('report_date')) {?>
                                        <?php echo form_error('report_date'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Report Date', 'report_date'); ?>
                                    <?php echo form_input('report_date', $offence_info->report_date, array("class"=>"form-control", 'id'=>'datetimepicker2')); ?>
                                </div>
                                
                                <?php if(form_error('offence_date')) {?>
                                        <?php echo form_error('offence_date'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Offence Date', 'offence_date'); ?>
                                    <?php echo form_input('offence_date', $offence_info->offence_date, array("class"=>"form-control", 'id'=>'datetimepicker33')); ?>
                                </div>
                                
                                <?php if(form_error('officer_type')) {?>
                                        <?php echo form_error('officer_type'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Officer Type', 'officer_type'); ?>
                                    <?php echo form_dropdown('officer_type', array(""=>"--Select Officer Type--",'Uniformed Marshal'=>"Uniformed Marshal", "PIN"=>"PIN", "Command"=>"Command", "Special Marshal"=>"Special Marshal"), $offence_info->officer_type, array("class"=>"form-control")); ?>
                                </div>
                                
                                <?php if(form_error('officer_id')) {?>
                                        <?php echo form_error('officer_id'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Officer ID', 'officer_id'); ?>
                                    <?php echo form_input('officer_id', $offence_info->officer_id, array("class"=>"form-control")); ?>
                                </div>
                                
                                <?php if(form_error('officer_comment')) {?>
                                        <?php echo form_error('officer_comment'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Officer Comment', 'officer_comment'); ?>
                                    <!--?php echo form_textarea('description', $expense->description, array("class"=>"form-control", "rows"=>"2")); ?-->
                                    <textarea name="officer_comment" class="form-control" rows="2" cols="40"><?php echo $offence_info->officer_comment ?></textarea>
                                </div>
                               
                            </div>
                            <div class="box-footer">
                                <?php echo form_submit('save', 'Add Offence Information', array("class"=>"btn btn-primary")); ?>
                            </div>  
                        <?php echo form_close(); ?>   
                    </div> 
                </div>
            </div>
        