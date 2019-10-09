<div class="page-header">
    <h2><?= t('Add a comment') ?></h2>
    <ul>
        <li>
            <?= $this->modal->medium('paper-plane', t('Send by email'), 'CommentMailController', 'create', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
        </li>
    </ul>
</div>
<form method="post" action="<?= $this->url->href('CommentController', 'save', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>
    <?php echo 'comment/create' ?>
    <?= $this->form->textEditor('comment', $values, $errors, array('autofocus' => true, 'required' => true)) ?>

    <?= $this->form->checkbox('assign_issue', t('Aufgabe zuweisen an'), 1, 0) ?>

    <br>

    <?= $this->app->component('select-dropdown-autocomplete', array(
        'name' => 'user_id',
        'items' => $users_list,
        'placeholder' => t('Choose user'),
    )) ?>


    <?= $this->modal->submitButtons() ?>
</form>
