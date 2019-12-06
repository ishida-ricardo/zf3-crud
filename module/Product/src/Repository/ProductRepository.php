<?php

namespace Product\Repository;

use Doctrine\ORM\EntityRepository;
use Product\Entity\Product;

class ProductRepository extends EntityRepository
{

    public function create($product)
    {
        $em = $this->getEntityManager();
        $em->persist($product);
        $em->flush();
        return $product;
    }

    public function update($product)
    {
        $em = $this->getEntityManager();
        $em->flush();
        return $product;
    }

    public function delete($product)
    {
        $em = $this->getEntityManager();
        $em->remove($product);
        $em->flush();
        return true;
    }

}