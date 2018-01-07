<?php

use Zend\Expressive\Helper;

return [
    'dependencies' => [
        'invokables' => [
            Helper\ServerUrlHelper::class => Helper\ServerUrlHelper::class,
            App\Action\PingAction::class => App\Action\PingAction::class,
            App\Action\RestAction::class => App\Action\RestAction::class,
        ],
        'factories' => [
            Helper\UrlHelper::class => Helper\UrlHelperFactory::class,
            App\Action\HomePageAction::class => App\Action\HomePageFactory::class,
            App\Action\DoctrineAction::class => App\Action\DoctrineActionFactory::class,
            Zend\Expressive\Application::class => Zend\Expressive\Container\ApplicationFactory::class,
            'doctrine.entity_manager.orm_default' => \ContainerInteropDoctrine\EntityManagerFactory::class,
        ],
        'aliases' => [
            'Doctrine\ORM\EntityManager' => 'doctrine.entity_manager.orm_default',
        ],
    ]
];
