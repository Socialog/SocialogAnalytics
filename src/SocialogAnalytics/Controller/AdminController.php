<?php

namespace SocialogAnalytics\Controller;

use SocialogAdmin\Controller\AbstractController;

/**
 * Admin
 */
class AdminController extends AbstractController
{
    /**
     * Home
     */
    public function indexAction()
    {
		$sm = $this->getServiceLocator();
		$config = $sm->get('socialog_analytics_config');

        return array(
			'config' => $config
		);
    }

    public function editAction()
    {
        return array();
    }
}
