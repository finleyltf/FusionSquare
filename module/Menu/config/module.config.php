<?php

/**
 * First, specify the namespace at the top of the file:
 * This allows us to use the __NAMESPACE__ magic constant in our configuration below.
 */
namespace Menu; //重要！影响下面的Doctrine的__NAMESPACE__

return array(

'controllers' => array(
        'invokables' => array(
            'Menu\Controller\Menu' => 'Menu\Controller\MenuController'
        ),
    ),

    //Routes for this module
    'router' => array(

        'routes' => array(
            'menu' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/[:lang]/menu[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Menu\Controller\Menu',
                        'action' => 'index',
                        'lang' => 'en'
                    ),
                ),
            ),
            'buffetAdmin' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/buffetAdmin[/][/:action][/:weekMark][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'weekMark' => '[1-2]',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Menu\Controller\BuffetAdmin',
                        'action' => 'index',
                    ),
                ),
            ),

            'buffet' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/buffet[/][/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Menu\Controller\Buffet',
                        'action' => 'index',
                    ),
                ),
            ),

            'menuAdmin' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/menuAdmin[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Menu\Controller\MenuAdmin',
                        'action' => 'index',
                    ),
                ),
            ),

        ),
    ),

    // View setup for this module
    'view_manager' => array(
        'template_path_stack' => array(
            'menu' => __DIR__ . '/../view',
        ),
    ),

    // Doctrine config
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
                )
            )
        ),

    ),


    //when run ./vendor/bin/doctrine-module orm:validate-schema got 'Given route does not implement Console route interface' error
    'console' => array(
        'router' => array(),
    ),
);