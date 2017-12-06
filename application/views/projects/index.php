<?php if($this->session->flashdata('project_created')):?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('project_created'); ?>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('project_edited')):?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('project_edited'); ?>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('project_deleted')):?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('project_deleted'); ?>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('project_not_deleted')):?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->session->flashdata('project_not_deleted'); ?>
    </div>
<?php endif; ?>


<div class="col-xs-9">
    <h1>Projects</h1>
</div>
<div class="col-xs-3">
    <a href="<?= base_url(); ?>projects/create" class="btn btn-primary pull-right" style="margin-top:20px;">Create Project</a>
</div>
<div class="col-xs-12">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Project Body</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($projects as $project): ?>
            <tr>
                <td><a href="<?= base_url() ?>projects/display/<?= $project->id; ?>"><?= $project->project_name; ?></a></td>
                <td><?= $project->project_body; ?></td>
                <td><a href="<?= base_url(); ?>projects/delete/<?= $project->id; ?>" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


