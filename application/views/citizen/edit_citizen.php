
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
                                Citizen Information Updated Successfully.
                            </div>
                        <?php } ?> 
                        <?php echo form_open_multipart(base_url('/edit-citizen/'.$citizen->citizen_id)); ?>
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
                                    <?php echo form_label('License Number', 'license_no'); ?>
                                    <?php echo form_input('license_no', $citizen->license_no, array("class"=>"form-control", 'disabled' => 'true')); ?>
                                </div>
                                
                                <?php if(form_error('firstname')) {?>
                                        <?php echo form_error('firstname'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Firstname', 'firstname'); ?>
                                    <?php echo form_input('firstname', $citizen->firstname, array("class"=>"form-control")); ?>
                                </div>

                                <?php if(form_error('middlename')) {?>
                                        <?php echo form_error('middlename'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Middlename', 'middlename'); ?>
                                    <?php echo form_input('middlename', $citizen->middlename, array("class"=>"form-control")); ?>
                                </div>
                                
                                <?php if(form_error('lastname')) {?>
                                        <?php echo form_error('lastname'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Lastname', 'lastname'); ?>
                                    <?php echo form_input('lastname', $citizen->lastname, array("class"=>"form-control")); ?>
                                </div>
                                
                                <?php if(form_error('sex')) {?>
                                        <?php echo form_error('sex'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Gender', 'sex'); ?>
                                    <?php echo form_dropdown('sex', array(""=>"--Select Gender--",'Male'=>"Male", "Female"=>"Female"), $citizen->sex, array("class"=>"form-control")); ?>
                                </div>
                                
                                <?php if(form_error('marital_status')) {?>
                                        <?php echo form_error('marital_status'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Marital Status', 'marital_status'); ?>
                                    <?php echo form_dropdown('marital_status', array(""=>"--Select Marital Status--",'Single'=>"Single", "Married"=>"Married", "Divorced"=>"Divorced", "Widowed"=>"Widowed"), $citizen->marital_status, array("class"=>"form-control")); ?>
                                </div>
                                
                                <?php if(form_error('state_of_origin')) {?>
                                        <?php echo form_error('state_of_origin'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('State of Origin', 'state_of_origin'); ?>
                                    <?php echo form_dropdown('state_of_origin', 
                                        array(""=>"--Select State of Origin--", 'Federal Capital City'=>'Federal Capital City', 'Abia'=>'Abia',
                                            'Adamawa'=>'Adamawa','Akwa Ibom'=>'Akwa Ibom','Anambra'=>'Anambra'
                                            ,'Bauchi'=>'Bauchi','Bayelsa'=>'Bayelsa','Benue'=>'Benue',
                                            'Borno'=>'Borno','Cross River'=>'Cross River','Delta'=>'Delta',
                                            'Ebonyi'=>'Ebonyi','Edo'=>'Edo','Ekiti'=>'Ekiti','Enugu'=>'Enugu',
                                            'Gombe'=>'Gombe','Imo'=>'Imo','Jigawa'=>'Jigawa','Kaduna'=>'Kaduna',
                                            'Kano'=>'Kano','Kastina'=>'Kastina','Kebbi'=>'Kebbi','Kogi'=>'Kogi',
                                            'Kwara'=>'Kwara','Lagos'=>'Lagos','Nassarawa'=>'Nassarawa','Niger'=>'Niger',
                                            'Ogun'=>'Ogun','Ondo'=>'Ondo','Osun'=>'Osun','Oyo'=>'Oyo', 'Plateau'=>'Plateau', 
                                            'Rivers'=>'Rivers', 'Sokoto'=>'Sokoto', 'Taraba'=>'Taraba', 'Yobe'=>'Yobe', 'Zamfara'=>'Zamfara'), 
                                        $citizen->state_of_origin, array("class"=>"form-control")); ?>
                                </div>
                                
                                <?php if(form_error('address')) {?>
                                        <?php echo form_error('address'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Home Address', 'address'); ?>
                                    <!--?php echo form_textarea('description', $expense->description, array("class"=>"form-control", "rows"=>"2")); ?-->
                                    <textarea name="address" class="form-control" rows="2" cols="40"><?php echo $citizen->address ?></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <?php echo form_label('Citizen Photograph', 'passport'); ?>
                                    <?php echo form_upload('passport'); ?>
                                </div>
                            </div>
                            <div class="box-footer">
                                <?php echo form_submit('save', 'Update Citizen Information', array("class"=>"btn btn-primary")); ?>
                            </div>  
                        <?php echo form_close(); ?>   
                    </div> 
                </div>
            </div>
        