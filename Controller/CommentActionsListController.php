<?php
namespace Kanboard\Plugin\CommentActions\Controller;


use Kanboard\Controller\CommentListController;
use Kanboard\Model\UserMetadataModel;

class CommentActionsListController extends CommentListController
{
    public function show()
    {
        $project = $this->getProject();
        $task = $this->getTask();
        $commentSortingDirection = $this->userMetadataCacheDecorator->get(UserMetadataModel::KEY_COMMENT_SORTING_DIRECTION, 'ASC');
        $this->response->html($this->template->render('comment_list/show', array(
            'project'  => $project,
            'task'     => $task,
            'comments' => $this->commentModel->getAll($task['id'], $commentSortingDirection),
            'editable' => $this->helper->user->hasProjectAccess('CommentActionsController', 'edit', $task['project_id']),
            'comment_actions_enabled' => $this->isCommentActionsEnabled(),
            'users_list' => $this->getAllUsers()
        )));
    }

    public function save()
    {
        $task = $this->getTask();
        $values = $this->request->getValues();
        $values['task_id'] = $task['id'];
        $values['user_id'] = $this->userSession->getId();

        list($valid, ) = $this->commentValidator->validateCreation($values);

        if ($valid && $this->commentModel->create($values) !== false) {
            $this->flash->success(t('Comment added successfully.'));
        }

        $this->show();
    }
}
