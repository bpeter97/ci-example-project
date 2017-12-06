<h3>Register</h3>

<?php if(validation_errors()): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo validation_errors(); ?>
    </div>
<?php endif; ?>

<?php $attributes = array('id' => 'register_form', 'class' => 'form_horizontal'); ?>

<?php echo form_open('users/register', $attributes); ?>

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
        // Password input
        echo form_label('First Name');
        
        $data = array(
            'class' => 'form-control',
            'name' => 'first_name',
            'placeholder' => 'Enter your first name.'
        );
        echo form_input($data);
    ?>
</div>

<div class="form-group">
    <?php 
        // Password input
        echo form_label('Last Name');
        
        $data = array(
            'class' => 'form-control',
            'name' => 'last_name',
            'placeholder' => 'Enter your last name.'
        );
        echo form_input($data);
    ?>
</div>

<div class="form-group">
    <?php 
        // Password input
        echo form_label('Email');
        
        $data = array(
            'class' => 'form-control',
            'name' => 'email',
            'placeholder' => 'Enter your email.'
        );
        echo form_input($data);
    ?>
</div>

<div class="form-group">
    <?php 
        // Password input
        echo form_label('Confirm Email');
        
        $data = array(
            'class' => 'form-control',
            'name' => 'confirm_email',
            'placeholder' => 'Confirm your email.'
        );
        echo form_input($data);
    ?>
</div>

<div class="form-group">
    <?php 
        
        $data = array(
            'class' => 'btn btn-primary',
            'name' => 'submit register',
            'value' => 'Register'
        );
        echo form_submit($data);
        
    ?>
</div>
<?= form_close(); ?>