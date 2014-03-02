<?php
namespace Menu\Form;

use Zend\Form\Form;

class Buffet1Form extends Form
{

    public function __construct($name = null)
    {
        parent::__construct('post');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipart/form-data'); // add this line if upload is needed!!!
        /**
         * Buffet Form
         *
         * buffet1Id
         * dayMark
         * displayOrder
         * cName
         * eName
         * fName
         * spiceDegree
         * coldDish
         *
         *
         */

        // buffet1Id
        $this->add(array(
            'name'       => 'buffet1Id',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));

        // day_mark
        $this->add(array(
            'type'       => 'Zend\Form\Element\Select',
            'name'       => 'dayMark',
            'options'    => array(
                'label'         => 'Dish of which day:',
                'value_options' => array(
                    0 => 'dayMark',
                    1 => '周一',
                    2 => '周二',
                    3 => '周三',
                    4 => '周四',
                    5 => '周五',
                ),
            ),
            'attributes' => array(
                'value' => '0' //set selected to '0'
            )
        ));

        // displayOrder
        $this->add(array(
            'name'       => 'displayOrder',
            'attributes' => array(
                'type' => 'text',
            ),
            'options'    => array(
                'label' => 'displayOrder',
            ),
        ));


        // c_name
        $this->add(array(
            'name'       => 'cName',
            'attributes' => array(
                'type' => 'text',
            ),
            'options'    => array(
                'label' => 'Name in Chinese',
            ),
        ));


        // e_name
        $this->add(array(
            'name'       => 'eName',
            'attributes' => array(
                'type' => 'text',
            ),
            'options'    => array(
                'label' => 'Name in English',
            ),
        ));


        // f_name
        $this->add(array(
            'name'       => 'fName',
            'attributes' => array(
                'type' => 'text',
            ),
            'options'    => array(
                'label' => 'Name in Finnish',
            ),
        ));


        // spice_degree
        $this->add(array(
            'type'       => 'Zend\Form\Element\Select',
            'name'       => 'spiceDegree',
            'options'    => array(
                'label'         => 'Spice Degree',
//                'empty_option'  => 'Please choose a spice degree',
                'value_options' => array(
                    0 => '无辣',
                    1 => '微辣',
                    2 => '中辣',
                    3 => '特辣',
                ),
            ),
            'attributes' => array(
                'value' => 0 //set selected to '0'
            )
        ));

        // cold_dish
        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'coldDish',
            'options' => array(
                'label'              => 'Check if this is a cold dish',
                'use_hidden_element' => true,
                'checked_value'      => 1,
                'unchecked_value'    => 0
            )
        ));

        // submit
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