<?php if($this->session->has_userdata('logged_in')): ?>

<h2>Logout</h2>

<?= form_open('users/logout'); ?>

<?php
    if($this->session->has_userdata('username')){
        echo "<p>You are logged in as " . $this->session->userdata('username') . '.</p>';
    } 
?>

<?php 

    $data = array(
        'class' => 'btn btn-primary',
        'name'  => 'submit',
        'value' => 'Logout'
    );

    echo form_submit($data);

?>

<?= form_close(); ?>

<?php elseif($this->uri->segment(2) ==  'register'): ?>
<h3>You are registering</h3>
<?php else: ?>
<h3>Login Form</h3>

<?php if(validation_errors()): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo validation_errors(); ?>
    </div>
<?php endif; ?>

<?php $attributes = array('id' => 'login_form', 'class' => 'form_horizontal'); ?>

<?php echo form_open('users/login', $attributes); ?>

<div class="form-group">
    <?php 
        // Username input
        echo form_label('Username');
        
        $data = array(
            'class' => 'form-control',
            'name' => 'username',
            'placeholder' => 'Enter your username.'
        );
        echo form_input($data);
    ?>
</div>
<div class="form-group">
    <?php 
        // Password input
        echo form_label('Password');
        
        $data = array(
            'class' => 'form-control',
            'name' => 'password',
            'placeholder' => 'Enter your password.'
        );
        echo form_password($data);
    ?>
</div>

<div class="form-group">
    <?php 
        // Password input
        echo form_label('Confirm Password');
        
        $data = array(
            'class' => 'form-control',
            'name' => 'confirm_password',
            'placeholder' => 'Confirm your password.'
        );
        echo form_password($data);
    ?>
</div>

<div class="form-group">
    <?php 
        
        $data = array(
            'class' => 'btn btn-primary',
            'name' => 'submit',
            'value' => 'Login'
        );
        echo form_submit($data);
        
    ?>
</div>
<?= form_close(); ?>
<?php endif; ?>
