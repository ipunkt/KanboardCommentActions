<?php

namespace Kanboard\Plugin\CommentActions\Controller;


use Kanboard\Controller\BaseController;


class CommentActionsController extends BaseController
{
    /**
     * Display settings page
     *
     * @access public
     */
    public function index()
    {
        $this->response->html($this->helper->layout->config('CommentActions:config/comment-actions-settings', array(
            'title' => t('Settings').' &gt; '.t('Comment Actions')
        )));
    }

    public function save()
    {
        $values =  $this->request->getValues();
        $redirect = $this->request->getStringParam('redirect', 'index');
        switch ($redirect) {
            case 'index':
                $values += array(
                    'comment_actions' => 0
                );
                break;
        }

        if ($this->configModel->save($values)) {
            $this->languageModel->loadCurrentLanguage();
            $this->flash->success(t('Settings saved successfully.'));
        } else {
            $this->flash->failure(t('Unable to save your settings.'));
        }
        $this->response->redirect($this->helper->url->to('CommentActionsController', 'index', array('plugin' => 'CommentActions')));

    }
}
