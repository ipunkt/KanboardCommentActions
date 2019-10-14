<?php

namespace Kanboard\Plugin\CommentActions;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        $this->template->hook->attachCallable("template:task:comment:after-texteditor",
            "CommentActions:comment_actions", function ($variables) {
                if (!array_key_exists('project_id', $variables)) {
                    return array();
                }
                $projectId = $variables['project_id'];
                return array(
                    'users_list' => $this->getAllProjectUsers($projectId),
                );
            });
        $this->template->hook->attachCallable("template:task:show:after-texteditor",
            "CommentActions:comment_actions", function ($variables) {
                if (!array_key_exists('project_id', $variables)) {
                    return array();
                }
                $projectId = $variables['project_id'];
                return array(
                    'users_list' => $this->getAllProjectUsers($projectId),
                );
            });
        $this->template->setTemplateOverride('task_comments/create', 'CommentActions:task_comments/create');
        $this->template->setTemplateOverride('comment/create', 'CommentActions:comment/create');
        $this->template->setTemplateOverride('comment/edit', 'CommentActions:comment/edit');
    }

    public function getAllProjectUsers($project_id)
    {
        $array = $this->projectUserRoleModel->getUsers($project_id);
        return $this->userModel->prepareList($array);
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
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
        return t('This plugin gives the ability to assign actual Task (direct in comment-create section) to one of the users in Project.');
    }

    public function getPluginAuthor()
    {
        return 'Andrei Volgin, ipunkt Business Solutions';
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
