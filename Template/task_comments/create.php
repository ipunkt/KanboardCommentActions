<form method="post"
      action="<?= $this->url->href('CommentActionsController', 'save',
          array('plugin' => 'CommentActions', 'task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>"
      autocomplete="off">
    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('task_id', $values) ?>
    <?= $this->form->hidden('user_id', $values) ?>
    <?= $this->form->textEditor('task_comments', $values, $errors, array('required' => true)) ?>

    <?= $this->hook->render('template:task:show:after-texteditor', array('task' => $task, 'project' => $project)) ?>

    <?= $this->modal->submitButtons() ?>
</form>
