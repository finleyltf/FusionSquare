<?php

namespace User\Controller;

use User\Entity\Reservation;
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
        $reservationSearchForm = new ReservationSearchForm();

        // setValueOptions for time_h
        $hourList = array();
        for ($count = 11; $count <= 22; $count++):
            $hourList[$count] = $count;
        endfor;
        $reservationSearchForm->get('time_h')
            ->setValue(18)
            ->setValueOptions($hourList);

        // getRequest
        $request = $this->getRequest();

        // request isPost()?
        if ($request->isPost()) {
            // flag request->getPost('submit'), if 此值为...，则说明post的是SearchForm，则判断预订时间是不是ok， if 此值不为null，则说明post的是reservationDetails表，则存入数据库
            $buttonFlag = $request->getPost('submit');

            if ($buttonFlag == 'Find a Table') {


                if ($this->tableAvailableCheck($request)) {
                    // if yes, return dateOkFlag=1, return reservationDetailsForm


                } else {
                    // if no, return dateOkFlag=0, return message "choose a new time"


                }


            } elseif ($buttonFlag == 'CONFIRM') {
                // ..... save to database
            }

        }


        // return ReservationSearch Form
        return array(
            'reservationSearchForm' => $reservationSearchForm,
        );


    }


    public function availableAction()
    {


    }


    public function confirmAction()
    {


    }


    public function tableAvailableCheck($request)
    {
        // flag: date and time selected ok?
        $date          = $request->getPost('date');
        $time_h        = $request->getPost('time_h');
        $time_m        = $request->getPost('time_m');
        $time_s        = '00';
        $time          = $time_h . ':' . $time_m . ':' . $time_s;
        $dateTime      = $date . ' ' . $time;
        $dateTimeStamp = strtotime($dateTime);

        // how to determine flag ok?
        // 取$time，遍历这个时间点以及之前一个小时的订单，在这个时间之前的一小时内如果预订总人数超过50人，就视为已经订满。
        $em        = $this->getEntityManager();
        $peopleSum = 0;
        for ($i = $dateTimeStamp; $i >= ($dateTimeStamp - 3600); $i -= 1800):
            $reservations = $em->getRepository('User\Entity\Reservation')->findBy(array(
                'time' => date_create(date('Y-m-d H:i:s', $i))));
            if (!empty($reservations)) {
                foreach ($reservations as $reservation):
                    $peopleSum += (int)$reservation->getPeopleAmount();
                endforeach;
            }
        endfor;

        return $peopleSum <= 50 ? true : false;
    }

}