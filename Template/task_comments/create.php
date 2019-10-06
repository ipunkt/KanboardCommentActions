<form method="post"
      action="<?= $this->url->href('CommentController', 'save', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>"
      autocomplete="off">
    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('task_id', $values) ?>
    <?= $this->form->hidden('user_id', $values) ?>

    <?= $this->form->textEditor('task_comments', $values, $errors, array('required' => true)) ?>
    <?= $this->form->checkbox('assign_issue', t('Assign Issue'), 1, $values['assign_issue'] == 1) ?>
    <?= $this->modal->submitButtons() ?>
</form>