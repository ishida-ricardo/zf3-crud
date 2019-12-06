<?php

namespace Product\InputFilter;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class ProductInputFilter extends InputFilter
{
    
    public function __construct()
    {
        // $this->add([
        //     'name' => 'id',
        //     'required' => true,
        //     'allow_empty' => true
        // ]);
        $this->add([
            'name' => 'title',
            'required' => true,
            'filters' => [
                ['name' => StringTrim::class],
                ['name' => StripTags::class]
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [
                            NotEmpty::IS_EMPTY => 'O campo é requerido!'
                        ]
                    ]
                ]
            ]
        ]);
        $this->add([
            'name' => 'content',
            'required' => true,
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [
                            NotEmpty::IS_EMPTY => 'O campo é requerido!'
                        ]
                    ]
                ]
            ]
        ]);
        $this->add([
            'name' => 'price',
            'required' => true,
            'filters' => [
                // ['name' => StringTrim::class],
                // ['name' => StripTags::class]
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [
                            NotEmpty::IS_EMPTY => 'O campo é requerido!'
                        ]
                    ]
                ],
                [
                    'name' => 'Float',
                    'options' => array(
                        'min' => 0,
                        'precision' => 2,
                        'locale' => 'de'
                    ),
                ],
            ]
        ]);
    }
}