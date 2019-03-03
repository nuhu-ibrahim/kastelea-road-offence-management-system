
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
                                Offence Information Updated Successfully.
                            </div>
                        <?php } ?> 
                        <?php echo form_open(base_url('/edit-offence/'.$offence->offence_id)); ?>
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
                                        
                                <?php if(form_error('code')) {?>
                                        <?php echo form_error('code'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Offence Code', 'code'); ?>
                                    <?php echo form_input('code', $offence->code, array("class"=>"form-control", "enabled"=>"true")); ?>
                                </div>
                                
                                <?php if(form_error('category')) {?>
                                        <?php echo form_error('category'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Offence Category', 'category'); ?>
                                    <?php echo form_dropdown('category', array(""=>"--Select Offence Category--",'Category 1'=>"Category 1", "Category 2"=>"Category 2", "Category 3"=>"Category 3"), $offence->category, array("class"=>"form-control")); ?>
                                </div>
                                
                                <?php if(form_error('points')) {?>
                                        <?php echo form_error('points'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Offence Ponts', 'points'); ?>
                                    <?php echo form_input('points', $offence->points, array("class"=>"form-control")); ?>
                                </div>
                              
                                <?php if(form_error('penalty')) {?>
                                        <?php echo form_error('penalty'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Offence Penalty', 'penalty'); ?>
                                    <?php echo form_input('penalty', $offence->penalty, array("class"=>"form-control")); ?>
                                </div>        
                                        
                                <?php if(form_error("offence_desc")) {?>
                                        <?php echo form_error('offence_desc'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Offence Description', 'offence_desc'); ?>
                                    <!--?php echo form_textarea('description', $expense->description, array("class"=>"form-control", "rows"=>"2")); ?-->
                                    <textarea name="offence_desc" class="form-control" rows="2" cols="40"><?php echo $offence->offence_desc ?></textarea>
                                </div>
                      
                            </div>
                            <div class="box-footer">
                                <?php echo form_submit('save', 'Update Offence Information', array("class"=>"btn btn-primary")); ?>
                            </div>  
                        <?php echo form_close(); ?>   
                    </div> 
                </div>
            </div>
        