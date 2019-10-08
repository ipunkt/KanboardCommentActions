<form method="post"
      action="<?= $this->url->href('CommentActionsController', 'save',
          array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>"
      autocomplete="off">
    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('task_id', $values) ?>
    <?= $this->form->hidden('user_id', $values) ?>

    <?= $this->form->textEditor('task_comments', $values, $errors, array('required' => true)) ?>

    <!--    --><?php //if (isset($comment_actions_enabled) && $comment_actions_enabled) : ?>
    <?= $this->form->checkbox('assign_issue', t('Aufgabe zuweisen an'), 1, $values['assign_issue'] == 1) ?>

<br>

    <?= $this->app->component('select-dropdown-autocomplete', array(
        'name' => 'user_id',
        'items' => $users_list,
        'placeholder' => t('Choose user'),
    )) ?>
    <!--    --><?php //endif ?>

    <?= $this->modal->submitButtons() ?>
</form>
