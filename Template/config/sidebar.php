<li <?= $this->app->checkMenuSelection('CommentActionsController', 'index') ?>>
    <?= $this->url->link(t('Comment Actions settings'), 'CommentActionsController', 'index',
        ['plugin' => 'CommentActions']) ?>
</li>
