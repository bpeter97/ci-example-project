<?php

$home = '';
$projects = '';
$register = '';

if($this->uri->segment(1) == 'projects') {
    $projects = 'active';
} else if ($this->uri->segment(2) ==  'register') {
    $register = 'active';
} else {
    $home = 'active';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="<?php echo base_url().'assets/js/jquery-3.2.1.min.js'; ?>"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
</head>
<body>
   
    <div class="container">

        <nav class="navbar navbar-default" style="margin-top:10px;">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url().'home'; ?>">Task Manager</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="<?= $home ?>"><a href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a></li>
                    <?php if($this->session->userdata('logged_in')): ?>
                        <li class="<?= $projects ?>"><a href="<?= base_url().'projects'; ?>">Projects</a></li>    
                    <?php endif; ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if($this->session->userdata('logged_in')): ?>
                        <?php echo "<li><p style='margin-top:15px;'>Hello " . $this->session->userdata('username') . '.</p></li>'; ?>
                        <li><a href="<?= base_url().'users/logout'; ?>">Logout</a></li>    
                    <?php else: ?>
                    <li class="<?= $register ?>"><a href="<?= base_url().'users/register'; ?>">Register</a></li>
                    <?php endif; ?>
                </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="col-xs-3">
            <?php $this->load->view('users/login_view'); ?>
        </div>
        <div class="col-xs-9">
            <?php $this->load->view($main_view); ?>
        </div>
    </div>
</body>
</html>