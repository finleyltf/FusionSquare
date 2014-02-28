<?php
namespace Menu\Form;

use Zend\Form\Form;

class BuffetForm extends Form
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
         * week_mark
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

        // week_mark
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'week_mark',
            'options' => array(
                'label' => 'week_mark',
                'value_options' => array(
                    '1' => 'week_mark',
                    '2' => '单周',
                    '3' => '双周',
                ),
            ),
            'attributes' => array(
                'value' => '1' //set selected to '1'
            )
        ));

        // display_order


        // c_name



        // e_name



        // f_name



        // spice_degree



        // cold_dish











    }
}