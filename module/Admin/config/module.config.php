<?php

declare(strict_types=1);

namespace Admin;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\Router\Http\Method;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'dashboard' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/admin',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'admin' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/admin[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'admin/login' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/admin/login',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'login' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/admin/login[/:action]',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'prepare' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/admin/login/prepare',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'prepare',
                    ],
                ],
            ],
            'admin/login/prepare' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/admin/login/prepare',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'prepare',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\LoginController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'admin/admin'         => __DIR__ . '/../view/layout/admin.phtml',
            'admin/login'         => __DIR__ . '/../view/layout/login.phtml',
            'admin/index/index'   => __DIR__ . '/../view/admin/index/index.phtml',
            'admin/login/index'   => __DIR__ . '/../view/admin/login/index.phtml',
            'admin/login/prepare' => __DIR__ . '/../view/admin/login/prepare.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
