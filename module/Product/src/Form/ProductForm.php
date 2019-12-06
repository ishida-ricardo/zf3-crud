<?php

namespace Product\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class ProductForm extends Form
{
    public function __construct($name=null)
    {
        parent::__construct('product');

        $this->add([
           'name' => 'id',
            'type' => Element\Hidden::class
        ]);

        $this->add([
            'name' => 'title',
            'type' => Element\Text::class,
            'options' => [
                'label'=> 'Title'
            ],
            'attributes' => [
                'class'=>'form-control', 
            ]
        ]);

        $this->add([
            'name' => 'content',
            'type' => Element\Textarea::class,
            'options' => [
                'label'=> 'Content'
            ],
            'attributes' => [
                'class'=>'form-control', 
            ]
        ]);

        $this->add([
            'name' => 'price',
            'type' => Element\Text::class,
            'options' => [
                'label'=> 'Price'
            ],
            'attributes' => [
                'class'=>'form-control', 
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => Element\Submit::class,
            'attributes' => [
                'value'=> 'Save',
                'id'=>'submitbutton',
                'class'=>'btn btn-success'
            ]
        ]);
    }
}