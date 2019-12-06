<?php

namespace Product\Service\Factory;

use Product\Service\ProductService;
use Product\Entity\Product;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Entity;
use Interop\Container\ContainerInterface;

class ProductServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $entityManager = $container->get(EntityManager::class);
        $repository = $entityManager->getRepository(Product::class);
        return new ProductService($repository);
    }
}