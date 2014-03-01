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
         * buffet1_id
         * day_mark
         * display_order
         * c_name
         * e_name
         * f_name
         * spice_degree
         * cold_dish
         *
         */

        // buffet1_id
        $this->add(array(
            'name'       => 'buffet1_id',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));

        // day_mark
        $this->add(array(
            'type'       => 'Zend\Form\Element\Select',
            'name'       => 'day_mark',
            'options'    => array(
                'label'         => 'Dish of which day:',
                'value_options' => array(
                    '0' => 'day_mark',
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

        // display_order
        $this->add(array(
            'name'       => 'display_order',
            'attributes' => array(
                'type' => 'text',
            ),
            'options'    => array(
                'label' => 'display_order',
            ),
        ));


        // c_name
        $this->add(array(
            'name'       => 'c_name',
            'attributes' => array(
                'type' => 'text',
            ),
            'options'    => array(
                'label' => 'Name in Chinese',
            ),
        ));


        // e_name
        $this->add(array(
            'name'       => 'e_name',
            'attributes' => array(
                'type' => 'text',
            ),
            'options'    => array(
                'label' => 'Name in English',
            ),
        ));


        // f_name
        $this->add(array(
            'name'       => 'f_name',
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
            'name'       => 'spice_degree',
            'options'    => array(
                'label'         => 'Spice Degree',
                'empty_option'  => 'Please choose a spice degree',
                'value_options' => array(
                    0 => '无辣',
                    1 => '微辣',
                    2 => '中辣',
                    3 => '特辣',
                ),
            ),
            'attributes' => array(
                'value' => 'empty_option' //set selected to '0'
            )
        ));

        // cold_dish
        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'cold_dish',
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