<div class="input-addon margin-top markdown">
    <p class="pagination-previous"><?= t('Assign Task to:') ?></p>
    <?= $this->app->component('select-dropdown-autocomplete', array(
        'name' => 'user_id',
        'items' => $users_list,
        'placeholder' => t('Choose user')
    )) ?>
</div>
