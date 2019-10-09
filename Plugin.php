<?php

namespace Kanboard\Plugin\CommentActions;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {
        $this->template->hook->attach("template:config:sidebar",
            "CommentActions:config/sidebar");
        $this->route->addRoute('settings/CommentActions', 'CommentActionsSettingsController', 'index',
            'CommentActions');
        $this->template->setTemplateOverride('task_comments/create', 'CommentActions:task_comments/create');
        $this->template->setTemplateOverride('task_comments/show', 'CommentActions:task_comments/show');
        $this->template->setTemplateOverride('comment/create', 'CommentActions:comment/create');
        $this->template->setTemplateOverride('comment/edit', 'CommentActions:comment/edit');
//        $this->template->setTemplateOverride('comment/show', 'CommentActions:comment/show');
    }

    public function onStartup()
    {
    }

    public function getClasses()
    {
     return array(
         'Plugin\CommentActions\Controller' => array(
             'CommentActionsController',
             'CommentActionsListController',
         )
     );
    }

    public function getPluginName()
    {
        return 'CommentActions';
    }

    public function getPluginDescription()
    {
        return 'Description';
    }

    public function getPluginAuthor()
    {
        return 'ipunkt Business Solutions';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://www.ipunkt.biz/unternehmen/opensource';
    }
}
