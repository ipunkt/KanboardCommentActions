<form method="post"
      action="<?= $this->url->href('CommentActionsController', 'save',
          array('plugin' => 'KanboardCommentActions', 'task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>"
      autocomplete="off">
    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('task_id', $values) ?>
    <?= $this->form->hidden('user_id', $values) ?>
    <?= $this->form->textEditor('comment', $values, $errors, array('required' => true)) ?>

    <?= $this->hook->render('template:task:show:after-texteditor', array($task)) ?>

    <?= $this->modal->submitButtons() ?>
</form>
