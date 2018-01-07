<?php

namespace App\Action;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DoctrineAction
{
    /** @var EntityManager */
    private $em;

    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $user = new User();
        $user->name = $request->getParsedBody()['name'];

        $this->em->persist($user);
        $this->em->flush();

        return new JsonResponse(['ack' => time()]);
    }
}
