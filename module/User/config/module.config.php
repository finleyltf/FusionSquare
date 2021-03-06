<?php

/**
 * First, specify the namespace at the top of the file:
 * This allows us to use the __NAMESPACE__ magic constant in our configuration below.
 */
namespace User; //重要！影响下面的Doctrine的__NAMESPACE__

return array(
//    'controllers'  => array(
//        'invokables' => array(
//            'Post\Controller\Post' => 'Post\Controller\PostController',
//        ),
//    ),

    // The following section is new and should be added to your file
//    'router'       => array(
//        'routes' => array(
//            'post' => array(
//                'type'    => 'segment',
//                'options' => array(
//                    'route'       => '/post[/][:action][/:id]',
//                    'constraints' => array(
//                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                        'id'     => '[0-9]+',
//                    ),
//                    'defaults'    => array(
//                        'controller' => 'Post\Controller\Post',
//                        'action'     => 'index',
//                    ),
//                ),
//            ),
//        ),
//    ),

//    'view_manager' => array(
//        'template_path_stack' => array(
//            'post' => __DIR__ . '/../view',
//        ),
//    ),

    // Doctrine config
    'doctrine'     => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default'             => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    )
);