<?php
namespace User\Form;

use Zend\Form\Form;

class ReservationSearchForm extends Form
{

    public function __construct($name = null)
    {
        parent::__construct('reservation_search');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipart/form-data'); // add this line if upload is needed!!!
        /**
         * Reservation Search Form
         *
         * date
         * time_h
         * time_m
         * people amount
         *
         * submit
         *
         */

        // date
        $this->add(array(
            'type'       => 'Zend\Form\Element\Date',
            'name'       => 'date',
            'options'    => array(
                'label'  => 'Date',
                'format' => 'Y-m-d'
            ),
            'attributes' => array(
//                'min' => '2012-01-01',
//                'max' => '2020-01-01',
//                'step' => '1', // days; default step interval is 1 day
                'value' => date('Y-m-d'),
            )
        ));

        // time_h
        $this->add(array(
            'type'       => 'Zend\Form\Element\Select',
            'name'       => 'time_h',
            'options'    => array(
                'label'         => 'time in hour',
//                'empty_option'  => 'please choose xxx',
                'value_options' => array(),
            ),
            'attributes' => array( //                'value' => 0 //set selected to '0'
            )
        ));

        // time_m
        $this->add(array(
            'type'       => 'Zend\Form\Element\Select',
            'name'       => 'time_m',
            'options'    => array(
                'label'         => 'time in minute',
//                'empty_option'  => 'please choose xxx',
                'value_options' => array(
                    '00' => '00',
                    '30' => '30',
                ),
            ),
            'attributes' => array(
                'value' => 0 //set selected to '0'
            )
        ));

        // peopleAmount
        $peopleAmountList = array();
        for ($count = 1; $count <= 20; $count++):
            $peopleAmountList[$count] = (string)$count . ' people';
        endfor;
        $this->add(array(
            'type'       => 'Zend\Form\Element\Select',
            'name'       => 'peopleAmount',
            'options'    => array(
                'label'         => 'peopleAmount',
//                'empty_option'  => 'please choose xxx',
                'value_options' => $peopleAmountList,
            ),
            'attributes' => array(
                'value' => 2 //set selected to '0'
            )
        ));

        // submit
        $this->add(array(
            'name'       => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Find a Table',
                'id'    => 'submitbutton',
            ),
        ));


    }
}