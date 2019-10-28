<div class="page-header">
    <h2><?= t('Add a comment') ?></h2>
    <ul>
        <li>
            <?= $this->modal->medium('paper-plane', t('Send by email'), 'CommentMailController', 'create', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
        </li>
    </ul>
</div>
<form method="post" action="<?= $this->url->href('CommentActionsController', 'save', array('plugin' => 'KanboardCommentActions', 'task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>
    <?= $this->form->textEditor('comment', $values, $errors, array('autofocus' => true, 'required' => true)) ?>

    <?= $this->hook->render('template:task:comment:after-texteditor', array($task)) ?>

    <?= $this->modal->submitButtons() ?>
</form>
