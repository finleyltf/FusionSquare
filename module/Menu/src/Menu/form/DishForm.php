<?php
namespace Menu\Form;

use Zend\Form\Form;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;


class DishForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('dish');

        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');//cause need upload image
        $this->add(array(
            'name' => 'dishId',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'fName',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Finnish name',
            ),
        ));

        $this->add(array(
            'name' => 'cName',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Chinese name',
            ),
        ));

        $this->add(array(
            'name' => 'eName',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'English name',
            ),
        ));

        $this->add(array(
            'name' => 'description',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Description',
            ),
        ));

        $this->add(array(
            'name' => 'price',
            'attributes' => array(
                'type'  => 'number',
            ),
            'options' => array(
                'label' => 'price',
            ),
        ));

        $this->add(array(
            'name' => 'spiceDgree',
            'attributes' => array(
                'type'  => 'number',
            ),
            'options' => array(
                'label' => 'spice degree',
            ),
        ));

        $this->add(array(
            'name' => 'image',
            'attributes' => array(
                'type'  => 'file',
            ),
            'options' => array(
                'label' => 'File Upload',
            ),
        ));

        $this->add(array(
            'name' => 'category',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
            ),
        ));

        $this->add(array(
            'name' => 'restaurant',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));

    }
}
