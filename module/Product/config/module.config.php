<?php

namespace Product;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\Router\Http\Literal;
use Zend\ServiceManager\Factory\InvokableFactory;
use Controller\ProductController;

return [
    'controllers' => [
        'factories' => [
            #Controller\BlogController::class => InvokableFactory::class
        ]
    ],
    'router' => [
        'routes' => [
            'products' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/products[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ProductController::class,
                        'action' => 'index'
                    ]
                ]
            ],
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'blog' => __DIR__ . "/../view"
        ],
    ],
    'doctrine' => [
        'driver' => [
            'Product_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../src/Entity'
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    'Product\Entity' => 'Product_driver'
                ]
            ]
        ],
        // 'fixtures' => [
        //     'BlogFixture' => __DIR__ . '/../src/Fixture'
        // ]
    ]
];