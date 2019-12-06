<?php

namespace Product\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Product\Form\ProductForm;
use Product\Service\ProductService;

class ProductController extends AbstractActionController
{

    private $service;
    private $form;

    public function __construct(ProductService $service, ProductForm $form)
    {
        $this->service = $service;
        $this->form = $form;
    }
    
    public function indexAction()
    {
        $products = $this->service->findAll();
        return new ViewModel(["products" => $products]);
    }
    
    public function createAction()
    {
        $form = $this->form;
        $request = $this->getRequest();

        if ($request->isPost()) {

            $form->setData($request->getPost());
            if (!$form->isValid()) 
                return new ViewModel(['form' => $form]);
            
            $product = $form->getData();
            if($this->service->create($product))
                $this->flashMessenger()->addSuccessMessage("Product created.");
            else
                $this->flashMessenger()->addErrorMessage("Error Product create");

            return $this->redirect()->toRoute('products');
        }
        
        return new ViewModel(['form' => $form]);
    }
    
    public function updateAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id || !($product = $this->service->find($id)))
            return $this->redirect()->toRoute('products');
        
        $form = $this->form;
        $form->bind($product);
        $request = $this->getRequest();

        if ($request->isPost()) {

            $data = $request->getPost();
            $form->setData($data);
            if (!$form->isValid())
                return new ViewModel(['id' => $id, 'form' => $form]);

            $productUpdated = $form->getData();
            if($this->service->update($productUpdated))
                $this->flashMessenger()->addSuccessMessage("Product updated.");
            else
                $this->flashMessenger()->addErrorMessage("Error Product update");

            return $this->redirect()->toRoute('products');

        }

        return new ViewModel([
            'id' => $id,
            'form' => $form
        ]);
    }

    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if ($this->service->delete($id))
            $this->flashMessenger()->addSuccessMessage("Product deleted.");
        else
            $this->flashMessenger()->addErrorMessage("Error Product delete");

        return $this->redirect()->toRoute('products');
    }
}