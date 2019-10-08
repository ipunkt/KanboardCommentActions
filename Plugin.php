<?php

namespace Kanboard\Plugin\CommentActions;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {
        $this->template->hook->attach("template:config:sidebar",
            "CommentActions:config/sidebar");
        $this->route->addRoute('settings/commentactions', 'CommentActionsSettingsController', 'index',
            'CommentActions');
        $this->template->setTemplateOverride('task_comments/create', 'CommentActions:task_comments/create');
    }

    public function onStartup()
    {
    }

    public function getClasses()
    {
     return array('Plugin\CommentActions\Controller' => array('CommentActionsController'));
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