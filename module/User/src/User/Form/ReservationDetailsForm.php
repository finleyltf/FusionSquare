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
                'placeholder' => 'First name',
                'class' => 'contact-form',
                'id' => 'form-firstName',
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
                'placeholder' => 'Last name',
                'class' => 'contact-form',
                'id' => 'form-lastName',
            ),
            'options'    => array(
                'label' => 'Last Name',
            ),
        ));

        // email
        $this->add(array(
            'type'    => 'Zend\Form\Element\Email',
            'name'    => 'email',
            'attributes' => array(
                'placeholder' => 'Email',
                'class' => 'contact-form',
                'id' => 'form-email',
            ),
            'options' => array(
                'label' => 'Email Address'
            ),
        ));

        // phoneNumber
        $this->add(array(
            'name'       => 'phoneNumber',
            'attributes' => array(
                'type'        => 'text',
                'placeholder' => 'Phone number',
                'class' => 'contact-form',
                'id' => 'form-phoneNumber',
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
                'id' => 'form-time',
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
                'id' => 'form-peopleAmount',
            ),
        ));

        // message
        $this->add(array(
            'name'       => 'message',
            'attributes' => array(
                'type'        => 'textarea',
                'placeholder' => 'Special requests or allergies',
                'class' => 'contact-form',
                'id' => 'form-message',

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
                'id'    => 'reservation-submit',
                'class' => 'buttonform'
            ),
        ));


    }
}