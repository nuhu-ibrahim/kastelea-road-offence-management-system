<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KASTELEA : Login</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('assets/ui/'); ?>css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('assets/ui/'); ?>css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img height = "130" width = '190' src="<?php echo base_url('assets/ui/'); ?>img/logo-invoice.jpg" />
            </div>
        </div>
         <div class="row ">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <?php echo $this->upload->display_errors('<div class="alert alert-error">', '</div>'); ?>
                                <?php echo form_open_multipart(); ?>
                                    <?php if(count($error) > 0){ ?>
                                        <?php foreach($error as $er){ ?>
                                            <div style = 'color:red; text-align: center;'>
                                                <?php echo $er ?>
                                            </div>
                                    <?php 
                                        } 
                                    } 
                                    ?> 
                                    <hr />
                                    <h5 style = 'text-align:center;'>Enter Details to Login</h5>
                                    <br />
                                    <?php if(form_error('username')) {?>
                                        <?php echo form_error('username'); ?>
                                    <?php } ?>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                        <?php echo form_input('username', $username, array("class"=>"form-control", "placeholder"=>"Your Username")); ?>
                                    </div>
                                    
                                    <?php if(form_error('password')) {?>
                                        <?php echo form_error('password'); ?>
                                    <?php } ?>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                        <?php echo form_password('password', $password, array("class"=>"form-control", "placeholder"=>"Your Password", "type"=>"password")); ?>
                                    </div>
                                    <?php echo form_submit('save', 'Login Now', array("class"=>"btn btn-primary")); ?>
                                <?php echo form_close(); ?>
                            </div>
                           
                        </div>
        </div>
    </div>

</body>
</html>