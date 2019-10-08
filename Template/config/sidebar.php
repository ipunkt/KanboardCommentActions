<li <?= $this->app->checkMenuSelection('CommentActionsSettingsController', 'index') ?>>
    <?= $this->url->link(t('Comment Actions settings'), 'CommentActionsSettingsController', 'index',
        ['plugin' => 'CommentActions']) ?>
</li>
