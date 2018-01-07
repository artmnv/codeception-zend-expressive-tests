<?php

namespace App\Action;

use Interop\Container\ContainerInterface;

class DoctrineActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $em = $container->get(\Doctrine\ORM\EntityManager::class);

        return new DoctrineAction($em);
    }
}
