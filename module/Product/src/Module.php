<?php

namespace Product;

use Product\Controller\ProductController;
use Product\Controller\Factory\ProductControllerFactory;
use Product\Service\Factory\ProductServiceFactory;
use Product\Service\ProductService;
use Product\Form\Factory\ProductFormFactory;
use Product\Form\ProductForm;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ConfigProviderInterface, ServiceProviderInterface, ControllerProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . "/../config/module.config.php";
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                ProductForm::class => ProductFormFactory::class,
                ProductService::class => ProductServiceFactory::class,
            ]
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                ProductController::class => ProductControllerFactory::class
            ]
        ];
    }
}
