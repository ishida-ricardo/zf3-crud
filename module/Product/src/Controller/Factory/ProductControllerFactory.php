<?php

namespace Product\Controller\Factory;

use Product\Controller\ProductController;
use Product\Service\ProductService;
use Product\Form\ProductForm;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Entity;
use Interop\Container\ContainerInterface;

class ProductControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $service = $container->get(ProductService::class);
        $form = $container->get(ProductForm::class);
        return new ProductController($service, $form);
    }
}