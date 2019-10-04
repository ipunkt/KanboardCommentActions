<?php

namespace Kanboard\Plugin\commentactions\Controller;


use Kanboard\Controller\BaseController;


class CommentActionsController extends BaseController
{
    /**
     * Display the ASF settings page
     *
     * @access public
     */
    public function index()
    {
        $this->response->html($this->helper->layout->config('commentactions:config/comment-actions-settings', array(
            'db_size' => $this->configModel->getDatabaseSize(),
            'db_version' => $this->db->getDriver()->getDatabaseVersion(),
            'user_agent' => $this->request->getServerVariable('HTTP_USER_AGENT'),
            'title' => 'Settings'.' &gt; '.'comment actions',
        )));
    }
}
