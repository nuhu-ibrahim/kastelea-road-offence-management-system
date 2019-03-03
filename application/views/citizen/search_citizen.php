
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
                             <strong>Welcome  <?php echo $user->firstname.' '.$user->lastname ?>!, </strong> <?php echo $sub_header ?>
                        </div>
                       
                    </div>
                </div>
                    <!-- /. ROW  --> 
                <div class="row  pad-top">
                    <div class="col-lg-12 col-md-2 col-sm-2 col-xs-6">
                        <?php if(isset($_GET['success']) && $_GET['success'] == "true"){ ?>
                            <div class = "alert alert-success">
                                Citizen Offence Information Profiled Successfully.
                            </div>
                        <?php } ?>
                        <?php echo form_open(base_url('/search-citizen')); ?>
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
                                        
                                <?php if(form_error('search_key')) {?>
                                        <?php echo form_error('search_key'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Search Key', 'search_key'); ?>
                                    <?php echo form_input('search_key', $search_key, array("class"=>"form-control")); ?>
                                </div>
                                
                                <?php if(form_error('search_option')) {?>
                                        <?php echo form_error('search_option'); ?>
                                <?php } ?>
                                <div class="form-group">
                                    <?php echo form_label('Search Option', 'search_option'); ?>
                                    <?php echo form_dropdown('search_option', array(""=>"--Select Search Option--",'name'=>"Firstname, Middlename or Lastname", "license_no"=>"License Number", "address"=>"Address"), $search_option, array("class"=>"form-control")); ?>
                                </div>
                            </div>
                            <div class="box-footer">
                                <?php echo form_submit('save', 'Search Citizen', array("class"=>"btn btn-primary")); ?>
                            </div>  
                        <?php echo form_close(); ?>
                        
                        <?php if(isset($citizens)): ?>
                            <?php if(count($citizens) > 0): ?>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Gender</th>
                                            <th>Marital Status</th>
                                            <th>Address</th>
                                            <th>License Number</th>
                                            <th>Photo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $num = 0 ?>
                                        <?php foreach($citizens as $citizen) { ?>
                                            <tr>
                                                <?php $num=$num+1  ?>
                                                <td><?php echo $num ?></td>
                                                <td><?php echo $citizen['firstname'] ?></td>
                                                <td><?php echo $citizen['lastname'] ?></td>
                                                <td><?php echo $citizen['sex'] ?></td>
                                                <td><?php echo $citizen['marital_status'] ?></td>
                                                <td><?php echo $citizen['address'] ?></td>
                                                <td><?php echo $citizen['license_no'] ?></td>
                                                <td><?php echo "<img src = '".base_url('assets/passports/').$citizen['passport']."' height='150' width = '150' />" ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Gender</th>
                                            <th>Marital Status</th>
                                            <th>Address</th>
                                            <th>License Number</th>
                                            <th>Photo</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            <?php else: ?>
                                <h1 align="center">No citizen certify the search parameters!.</h1>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div> 
                </div>
            </div>
        