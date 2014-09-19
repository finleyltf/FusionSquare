<?php
namespace User\Form;

use Zend\Form\Form;

class UserForm extends Form
{

    public function __construct($name = null)
    {
        parent::__construct('user');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype', 'multipart/form-data'); // add this line if upload is needed!!!
        /**
         * User Form
         *
         *  1. user_id
         *  2. firstname
         *  3. lastname
         *  4. password
         *  5. name
         *  6. email
         *  7. image
         *  8. phone_number
         *  9. address
         * 10. role
         * 11. IP
         * 12. register_time
         *
         * submit
         *
         */

        // user_id
        $this->add(array(
            'name'       => 'userId',
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
                'class'       => 'contact-form',
                'id'          => 'form-firstName',
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
                'class'       => 'contact-form',
                'id'          => 'form-lastName',
            ),
            'options'    => array(
                'label' => 'Last Name',
            ),
        ));


    }
}