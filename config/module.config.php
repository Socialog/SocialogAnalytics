<?php

return array(

    /**
     * View Configuration
     */
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__. '/../view',
        ),
    ),

    /**
     * Router Configuration
     */
    'router' => array(
        'routes' => array(
            'socialog-admin' => array(
                'child_routes' => array(
                    'analytics' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route'    => '/analytics[/:action[/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'socialog-analytics-admin'
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    /**
     * Controller Configuration
     */
    'controllers' => array(
        'invokables' => array(
            'socialog-analytics-admin'	=> 'SocialogAnalytics\Controller\AdminController',
        ),
    ),

    /**
     * Admin Navigation
     */
    'navigation' => array(
        'socialog-admin' => array(
            'analytics' => array(
                'label' => 'Analytics',
                'route' => 'socialog-admin/analytics',
            ),
        ),
    ),
);
