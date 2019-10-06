<div class="page-header">
    <h2><?= t('Comment Actions') ?></h2>
</div>
<form method="post" action="<?= $this->url->href('CommentActionsController', 'save', ['plugin' => 'CommentActions']) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>

    <fieldset>
        <?= $this->form->checkbox('comment_actions', t('Enable "Comment Actions"'), 1, $values['comment_actions'] == 1) ?>
    </fieldset>

    <?= $this->hook->render('template:config:task_comments-actions-settings', array('values' => $values, 'errors' => $errors)) ?>

    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
    </div>
</form>
