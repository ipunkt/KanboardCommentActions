<?php

namespace Kanboard\Plugin\KanboardCommentActions;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        $this->template->hook->attachCallable("template:task:comment:after-texteditor",
            "KanboardCommentActions:comment_actions", function ($variables) {
                if (!array_key_exists('project_id', $variables)) {
                    return array();
                }
                $projectId = $variables['project_id'];
                return array(
                    'users_list' => $this->getAllProjectUsers($projectId),
                );
            });
        $this->template->hook->attachCallable("template:task:show:after-texteditor",
            "KanboardCommentActions:comment_actions", function ($variables) {
                if (!array_key_exists('project_id', $variables)) {
                    return array();
                }
                $projectId = $variables['project_id'];
                return array(
                    'users_list' => $this->getAllProjectUsers($projectId),
                );
            });
        $this->template->setTemplateOverride('task_comments/create', 'KanboardCommentActions:task_comments/create');
        $this->template->setTemplateOverride('comment/create', 'KanboardCommentActions:comment/create');
        $this->template->setTemplateOverride('comment/edit', 'KanboardCommentActions:comment/edit');
    }

    public function getAllProjectUsers($project_id)
    {
        return $this->projectUserRoleModel->getAllUsers($project_id);
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }
    public function getClasses()
    {
        return array(
            'Plugin\KanboardCommentActions\Controller' => array(
                'CommentActionsController',
            )
        );
    }

    public function getPluginName()
    {
        return 'KanboardCommentActions';
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
        return '1.0.1';
    }

    public function getPluginHomepage()
    {
        return 'https://www.ipunkt.biz/unternehmen/opensource';
    }
}
