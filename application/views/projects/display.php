
<div class="col-xs-9">
    <h1>Project Name: <?= $project->project_name; ?></h1>
    <p>Date Created: <?= $project->date_created; ?></p>
    <h3>Description</h3>
    <p><?= $project->project_body; ?></p>
</div>
<div class="col-xs-3 pull-right">
    <ul class="list-group">
        <h4>Project Actions</h4>
        <li class="list-group-item"><a href="<?= base_url(); ?>tasks/create/<?= $project->id; ?>">Create Task</a></li>
        <li class="list-group-item"><a href="<?= base_url(); ?>projects/edit/<?= $project->id; ?>">Edit Project</a></li>
        <li class="list-group-item"><a href="<?= base_url(); ?>projects/delete/<?= $project->id; ?>">Delete Project</a></li>
    </ul>
</div>