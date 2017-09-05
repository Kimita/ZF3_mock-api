<?php
namespace Common;

use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Db\Adapter\Adapter;

return [
    'router' => [
        'routes' => [
            'site-top' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/[:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'site-login' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/login[/][:token]',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\LoginController::class => function ($sm) {
                $retObj = new Controller\LoginController();
                return $retObj->setUsersTable($sm->get(Model\UsersTable::class));
            },
        ],
    ],
    'service_manager' => [
        'factories' => [
            Listeners\ApiErrorListener::class => InvokableFactory::class,
            Model\UsersTable::class => function ($sm) {
                $retObj = new Model\UsersTable();
                return $retObj->setDbAdapter($sm->get(Adapter::class));
            },
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];