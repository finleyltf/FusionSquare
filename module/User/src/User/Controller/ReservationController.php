<?php

namespace User\Controller;

use User\Entity\Reservation;
use User\Form\ReservationDetailsForm;
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

        if ($request->isPost()) {
            // flag request->getPost('submit'), if 此值为...，则说明post的是SearchForm，则判断预订时间是不是ok， if 此值为...，则说明post的是reservationDetails表，则存入数据库
            $buttonFlag = $request->getPost('submit');
            if ($buttonFlag == 'Find a Table') {
                // flag: date and time selected ok?
                $date     = $request->getPost('date');
                $time_h   = $request->getPost('time_h');
                $time_m   = $request->getPost('time_m');
                $time_s   = '00';
                $time     = $time_h . ':' . $time_m . ':' . $time_s;
                $dateTime = $date . ' ' . $time;

                // update the reservationSearchForm
                $reservationSearchForm->get('date')->setValue($date);
                $reservationSearchForm->get('time_h')->setValue($time_h);
                $reservationSearchForm->get('time_m')->setValue($time_m);
                $reservationSearchForm->get('peopleAmount')->setValue($request->getPost('peopleAmount'));

                if ($this->tableAvailableCheck($dateTime)) {
                    // if yes, return tableAvailableFlag=true, return reservationDetailsForm

                    // set time and peopleAmount to the form
                    $reservationDetailsForm = new ReservationDetailsForm();
                    $reservationDetailsForm->get('time')
                        ->setValue($dateTime);
//                        ->setValue(date_create($dateTime))
//                        ->setAttribute('readonly', 'readonly')
//                        ->setOptions(array('format' => 'Y-m-d H:i'));
                    $reservationDetailsForm->get('peopleAmount')
                        ->setValue($request->getPost('peopleAmount'));

//                        ->setAttribute('readonly', 'readonly');

                    return array(
                        'tableAvailableFlag'     => true,
                        'reservationSearchForm'  => $reservationSearchForm,
                        'reservationDetailsForm' => $reservationDetailsForm,
                    );

                } else {
                    // if no, return tableAvailableFlag=false, return message "choose a new time"
                    return array(
                        'tableAvailableFlag'    => false,
                        'reservationSearchForm' => $reservationSearchForm,
                        'message'               => 'No table available for selected time, please choose another time'
                    );


                }
            } elseif ($buttonFlag == 'CONFIRM') {
                $data_entered = array_merge_recursive(
                    $request->getPost()->toArray()
                );
//                $data_entered['time'] = date_create($data_entered['time']);

                $reservationDetailsForm = new ReservationDetailsForm();
                $reservationDetailsForm->setData($data_entered);

                if ($reservationDetailsForm->isValid()) {
                    // form is valid, new Reservation Entity, populate data, save to database
                    $reservation = new Reservation();
                    $reservation->populate($reservationDetailsForm->getData());
                    $reservation->setPeopleAmount((int)$reservation->getPeopleAmount());
                    $reservation->setTime(date_create($reservation->getTime()));

                    $this->getEntityManager()->persist($reservation);
                    $this->getEntityManager()->flush();

                    // update the reservationSearchForm before return
                    $reservationSearchForm->get('date')->setValue($reservation->getTime()->format('Y-m-d'));
                    $reservationSearchForm->get('time_h')->setValue($reservation->getTime()->format('H'));
                    $reservationSearchForm->get('time_m')->setValue($reservation->getTime()->format('i'));
                    $reservationSearchForm->get('peopleAmount')->setValue($reservation->getPeopleAmount());

                    return array(
                        'reservedFlag' => true,
                        'reservationSearchForm' => $reservationSearchForm,
                        'message' => 'A table for '
                            . $reservation->getPeopleAmount()
                            . ' people is reserved for you on '
                            . $reservation->getTime()->format('Y-m-d H:i'),
                    );


                }


            }

        }


        // return ReservationSearch Form
        return array(
            'reservationSearchForm' => $reservationSearchForm,
        );


    }

    public function confirmAction()
    {


    }


    public function tableAvailableCheck($dateTime)
    {
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