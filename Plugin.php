<?php

namespace Kanboard\Plugin\CommentActions;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        $project_id = '1';

//        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//        if(strpos($actual_link, 'project')!==false){
//            $data = "project/";
//            $res = substr($actual_link, strpos($actual_link, $data) + 8);
//            $project_id = substr($res, 0, strpos($res, "/"));
//        }

        $this->template->hook->attach("template:config:sidebar",
            "CommentActions:config/sidebar");
        $this->template->hook->attach("template:task:show:after-texteditor",
            "CommentActions:comment_actions",
            array('comment_actions_enabled' => $this->isCommentActionsEnabled(), 'users_list' => $this->getAllUsers($project_id)));
        $this->template->hook->attach("template:task:comment:after-texteditor",
            "CommentActions:comment_actions",
            array('comment_actions_enabled' => $this->isCommentActionsEnabled(), 'users_list' => $this->getAllUsers($project_id)));

        $this->route->addRoute('settings/commentactions', 'CommentActionsSettingsController', 'index',
            'CommentActions');
        $this->template->setTemplateOverride('task_comments/create', 'CommentActions:task_comments/create');
        $this->template->setTemplateOverride('comment/create', 'CommentActions:comment/create');
        $this->template->setTemplateOverride('comment/edit', 'CommentActions:comment/edit');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getClasses()
    {
     return array(
         'Plugin\CommentActions\Controller' => array(
             'CommentActionsController',
         )
     );
    }

    public function getPluginName()
    {
        return 'CommentActions';
    }

    public function getPluginDescription()
    {
        return t('Description');
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

    public function isCommentActionsEnabled() {
        return $this->configModel->getOption('comment_actions');
    }

    public function getAllUsers($project_id) {
        $array = $this->projectUserRoleModel->getUsers($project_id);
        return $this->userModel->prepareList($array);
    }
}
