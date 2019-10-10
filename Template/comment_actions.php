<?php
if (isset($comment_actions_enabled) && $comment_actions_enabled) : ?>
    <?= $this->form->checkbox('assign_issue', t('Aufgabe zuweisen an'), 1) ?>
    <br>
    <?= $this->app->component('select-dropdown-autocomplete', array(
        'name' => 'user_id',
        'items' => $users_list,
        'placeholder' => t('Choose user'),
    )) ?>
<?php endif ?>
