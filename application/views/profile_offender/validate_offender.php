
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
                        <?php echo form_open(base_url('/validate-offender')); ?>
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
                    </div> 
                </div>
            </div>
        