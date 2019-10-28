<div class="page-header">
    <h2><?= t('Edit a comment') ?></h2>
</div>

<form method="post" action="<?= $this->url->href('CommentActionsController', 'update', array('plugin' => 'KanboardCommentActions', 'task_id' => $task['id'], 'project_id' => $task['project_id'], 'comment_id' => $comment['id'])) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>

    <?= $this->form->textEditor('comment', $values, $errors, array('autofocus' => true, 'required' => true)) ?>

    <?= $this->hook->render('template:task:comment:after-texteditor', array($task)) ?>

    <?= $this->modal->submitButtons() ?>
</form>
