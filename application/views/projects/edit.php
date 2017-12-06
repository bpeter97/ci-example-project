<h3>Edit Project</h3>

<?php if(validation_errors()): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo validation_errors(); ?>
    </div>
<?php endif; ?>

<?php $attributes = array('id' => 'edit_project_form', 'class' => 'form_horizontal'); ?>

<?php echo form_open('projects/edit/'.$project->id, $attributes); ?>

<div class="form-group">
    <?php 
        echo form_label('Project Name');
        
        $data = array(
            'class' => 'form-control',
            'name' => 'project_name',
            'value' => $project->project_name
        );
        echo form_input($data);
    ?>
</div>
<div class="form-group">
    <?php 
        echo form_label('Project Description');
        
        $data = array(
            'class' => 'form-control',
            'name' => 'project_body',
            'value' => $project->project_body
        );
        echo form_textarea($data);
    ?>
</div>
<div class="form-group">
    <?php 
        
        $data = array(
            'class' => 'btn btn-primary',
            'name' => 'submit register',
            'value' => 'Submit Changes'
        );
        echo form_submit($data);
        
    ?>
</div>
<?= form_close(); ?>