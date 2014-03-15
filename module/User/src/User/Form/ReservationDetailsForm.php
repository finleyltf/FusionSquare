<?php
namespace User\Form;

use Zend\Form\Form;

class ReservationDetailsForm extends Form
{

    public function __construct($name = null)
    {
        parent::__construct('ReservationDetailsForm');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipart/form-data'); // add this line if upload is needed!!!
        /**
         * Reservation Form
         *
         * reservationId
         * firstName
         * lastName
         * email
         * phoneNumber
         * time
         * peopleAmount
         * message
         * restaurant(todo)
         * user(todo)
         *
         */

        // reservationId
        $this->add(array(
            'name'       => 'reservationId',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));

        // firstName
        $this->add(array(
            'name'       => 'firstName',
            'attributes' => array(
                'type'        => 'text',
                'placeholder' => 'First Name',
            ),
            'options'    => array(
                'label' => 'First Name',
            ),
        ));

        // lastName
        $this->add(array(
            'name'       => 'lastName',
            'attributes' => array(
                'type'        => 'text',
                'placeholder' => 'Last Name',
            ),
            'options'    => array(
                'label' => 'Last Name',
            ),
        ));

        // email
        $this->add(array(
            'type'    => 'Zend\Form\Element\Email',
            'name'    => 'email',
            'options' => array(
                'label' => 'Email Address'
            ),
        ));

        // phoneNumber
        $this->add(array(
            'name'       => 'phoneNumber',
            'attributes' => array(
                'type'        => 'text',
                'placeholder' => 'Phone Number',
            ),
            'options'    => array(
                'label' => 'Phone Number',
            ),
        ));

//        // time
//        $this->add(array(
//            'type'       => 'Zend\Form\Element\DateTime',
//            'name'       => 'time',
//            'attributes' => array(),
//            'options'    => array(
//                'label'  => 'time',
////                'format' => 'Y-m-d H:i:s'
//            ),
//        ));

        // time
        $this->add(array(
            'name'       => 'time',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));

//        // peopleAmount
//        $this->add(array(
//            'name'       => 'peopleAmount',
//            'attributes' => array(
//                'type'        => 'text',
//                'placeholder' => 'peopleAmount',
//            ),
//            'options'    => array(
//                'label' => 'peopleAmount',
//            ),
//        ));

        // peopleAmount
        $this->add(array(
            'name'       => 'peopleAmount',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));

        // message
        $this->add(array(
            'name'       => 'message',
            'attributes' => array(
                'type'        => 'textarea',
                'placeholder' => 'message',
            ),
            'options'    => array(
                'label' => 'message',
            ),
        ));

        // submit
        $this->add(array(
            'name'       => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'CONFIRM',
                'id'    => 'submitbutton',
            ),
        ));


    }
}