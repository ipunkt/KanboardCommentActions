<h4><?= t('Assign Task to:') ?></h4>
<?= $this->app->component('select-dropdown-autocomplete', array(
    'name' => 'user_id',
    'items' => $users_list,
    'placeholder' => t('Choose user')
)) ?>
