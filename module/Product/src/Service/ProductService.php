<?php

namespace Product\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use DateTime;
use Product\Entity\Product;

class ProductService
{
    private $repository;

    public function __construct(EntityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }

    public function create($product)
    {
        $product->setCreatedAt(new DateTime());
        $this->repository->create($product);
        return true;
    }

    public function update($product)
    {
        $product->setUpdatedAt(new DateTIme());
        $this->repository->update($product);
        return true;
    }

    public function delete($id)
    {
        if (!$id || !($product = $this->find($id))) 
            return false;

        $this->repository->delete($product);
        return true;
    }

}