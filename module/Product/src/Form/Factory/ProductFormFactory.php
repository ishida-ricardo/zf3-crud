<?php

namespace Product\Form\Factory;

use Product\Entity\Product;
use Product\Form\ProductForm;
use Product\InputFilter\ProductInputFilter;
use Interop\Container\ContainerInterface;
use Zend\Hydrator\ClassMethods;

class ProductFormFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $inputFilter = new ProductInputFilter();
        $form = new ProductForm();
        $form->setInputFilter($inputFilter);
        $form->setHydrator(new ClassMethods());
        $form->setObject(new Product());
        return $form;
    }
}