<?php
namespace Kanboard\Plugin\CommentActions\Controller;


use Kanboard\Controller\CommentController;
use Kanboard\Core\Controller\AccessForbiddenException;
use Kanboard\Core\Controller\PageNotFoundException;
use Kanboard\Model\ConfigModel;
use Kanboard\Model\UserModel;

class CommentActionsController extends CommentController
{

    /**
     * Add comment form
     *
     * @access public
     * @param array $values
     * @param array $errors
     * @throws AccessForbiddenException
     * @throws PageNotFoundException
     */
    public function create(array $values = array(), array $errors = array())
    {
        $project = $this->getProject();
        $task = $this->getTask();
        $values['project_id'] = $task['project_id'];
        $this->response->html($this->helper->layout->task('task_comments/create', array(
            'values' => $values,
            'errors' => $errors,
            'task' => $task,
            'project' => $project,
            'comment_actions_enabled' => $this->isCommentActionsEnabled(),
            'users_list' => $this->getAllUsers()
        )));
    }

    /**
     * Add a comment
     *
     * @access public
     */
    public function save()
    {
        var_dump($this->getAllUsers());
        die;
        $task = $this->getTask();
        $values = $this->request->getValues();
        $values['task_id'] = $task['id'];
        $values['user_id'] = $this->userSession->getId();
        $actionPluginEnabled = $this->isCommentActionsEnabled();


        $actionsEnabled = isset($values['assign_issue']) && $values['assign_issue'];
        if( $actionPluginEnabled && $actionsEnabled ) {
//            parse text
        }


        list($valid, $errors) = $this->commentValidator->validateCreation($values);

        if ($valid) {
            if ($this->commentModel->create($values) !== false) {
                $this->flash->success(t('Comment added successfully.'));
            } else {
                $this->flash->failure(t('Unable to create your comment.'));
            }

            $this->response->redirect($this->helper->url->to('TaskViewController', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id']), 'comments'), true);
        } else {
            $this->create($values, $errors);
        }
    }

    protected function isCommentActionsEnabled() {
        return $this->configModel->getOption('comment_actions');
    }


    protected function getAllUsers() {
        return $this->userModel->getAll();
    }
}
