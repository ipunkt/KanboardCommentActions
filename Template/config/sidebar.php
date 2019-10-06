<li <?= $this->app->checkMenuSelection('CommentActionsController', 'index') ?>>
    <?= $this->url->link('Comment Actions settings', 'CommentActionsController', 'index',
        ['plugin' => 'CommentActions']) ?>
</li>
