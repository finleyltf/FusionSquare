<?php

/**
 * First, specify the namespace at the top of the file:
 * This allows us to use the __NAMESPACE__ magic constant in our configuration below.
 */
namespace Menu; //重要！影响下面的Doctrine的__NAMESPACE__

return array(
    
'controllers' => array(
        'invokables' => array(
            'Menu\Controller\Index' => 'Menu\Controller\IndexController'
        ),
    ),
    
    //Routes for this module
    'router' => array(
        
        'routes' => array(
            'menu' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/menu[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Menu\Controller\Index',
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