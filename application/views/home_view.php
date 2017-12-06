
<?php if($this->session->flashdata('login_success')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('login_success'); ?>
    </div>
<?php elseif($this->session->flashdata('login_failed')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('login_failed'); ?>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('user_registered')):?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('user_registered'); ?>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('no_access')):?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('no_access'); ?>
    </div>
<?php endif; ?>

<div class="jumbotron">
    <h2 class="text-center">Welcome to the Task Manager.</h2>
</div>

<?php if(isset($projects)): ?>

<h2>Projects</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Project Name</th>
            <th>Project Description</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($projects as $project): ?>
        <tr>
            <td><?= $project->project_name; ?></td>
            <td><?= $project->project_body; ?></td>
            <td><a href="<?= base_url(); ?>projects">View</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php endif; ?>