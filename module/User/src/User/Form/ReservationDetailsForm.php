<?php
namespace User\Form;

use Zend\Form\Form;

class ReservationDetailsForm extends Form
{

    public function __construct($name = null)
    {
        parent::__construct('reservation_confirm');
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



    }
}