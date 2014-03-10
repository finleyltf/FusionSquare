<?php

namespace User\Controller;

use User\Form\ReservationSearchForm;
use Zend\Form\Element\Select;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;


class ReservationController extends AbstractActionController
{

    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;

    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }

        return $this->em;
    }


    public function indexAction()
    {
        // initialise ReservationSearchForm
        $ReservationSearchForm = new ReservationSearchForm();

        // setValueOptions for time_h
        $hourList = array();
        for ($count = 11; $count <= 22; $count++):
            $hourList[$count] = $count;
        endfor;
        $ReservationSearchForm->get('time_h')
            ->setValue(19)
            ->setValueOptions($hourList);




        // getRequest
        // request isPost()?
        // if yes,
        // flag request->getPost('submit'), if 此值为...，则说明post的是SearchForm，则判断预订时间是不是ok， if 此值不为null，则说明post的是reservationDetails表，则存入数据库
        // if null
        // flag date ok?
        // if yes, return dateOkFlag=1, return reservationDetailsForm
        // if no, return dateOkFlag=0, return message to choose a new time

        // if not null
        // ..... save to database


        // return ReservationSearch Form
        return array(
            'ReservationSearchForm' => $ReservationSearchForm,
        );


    }


    public function availableAction()
    {


    }


    public function confirmAction()
    {


    }


}