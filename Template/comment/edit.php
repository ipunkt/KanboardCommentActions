<div class="page-header">
    <h2><?= t('Edit a comment') ?></h2>
</div>

<form method="post" action="<?= $this->url->href('CommentActionsController', 'update', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'comment_id' => $comment['id'])) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>
    <?php echo 'comment/edit' ?>
    <?= $this->form->textEditor('comment', $values, $errors, array('autofocus' => true, 'required' => true)) ?>

    <?= $this->form->checkbox('assign_issue', t('Aufgabe zuweisen an'), 1, 0) ?>

    <br>

    <?= $this->app->component('select-dropdown-autocomplete', array(
        'items' => $users_list,
        'placeholder' => t('Choose user'),
    )) ?>


    <?= $this->modal->submitButtons() ?>
</form>
