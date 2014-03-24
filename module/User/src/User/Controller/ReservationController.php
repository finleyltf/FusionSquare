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

        // setValueOptions for day_d
        $currentDay            = date('d');
        $dayList               = array();
        $numDaysOfCurrentMonth = date('t', mktime(0, 0, 0, date('n'), 1, date('Y')));
        for ($i = 1; $i <= $numDaysOfCurrentMonth; $i++) {
            $dayList[$i] = $i;
        }
        $reservationSearchForm->get('date_d')
            ->setValue($currentDay)
            ->setvalueOptions($dayList)
            ->setAttribute('id', "select-day");

        // setValueOptions for day_m
        $currentMonth = date('n');
        $monthList    = array(
            1  => 'January',
            2  => 'February',
            3  => 'March',
            4  => 'April',
            5  => 'May',
            6  => 'June',
            7  => 'July',
            8  => 'August',
            9  => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December');
        $reservationSearchForm->get('date_m')
            ->setValue($currentMonth)
            ->setValueOptions($monthList)
            ->setAttribute('id', "select-month");


        // setValueOptions for day_y
        $currentYear = date('Y');
        $yearList    = array(
            date('Y')                    => date('Y'),
            (string)((int)date('Y') + 1) => (string)((int)date('Y') + 1),
//            (string)((int)date('Y') + 2) => (string)((int)date('Y') + 2)
        );
        $reservationSearchForm->get('date_y')
            ->setValue($currentYear)
            ->setValueOptions($yearList)
            ->setAttribute('id', "select-year");


        // setValueOptions for time_h
        $hourList = array();
        for ($count = 11; $count <= 22; $count++):
            $hourList[$count] = $count;
        endfor;
        $reservationSearchForm->get('time_h')
            ->setValue(18)
            ->setValueOptions($hourList)
            ->setAttribute('id', "select-hour");

        // setAttribute id for time_m
        $reservationSearchForm->get('time_m')
            ->setAttribute('id', 'select-minutes');

        // setAttribute id for peopleAmount
        $reservationSearchForm->get('peopleAmount')
            ->setAttribute('id', 'select-peopleAmount');

        // setAttribute id for submit
        $reservationSearchForm->get('submit')
            ->setAttributes(array(
                    'id'    => 'reservation-search-submit',
                    'class' => 'buttonform'
                )
            );



        // getRequest
        $request = $this->getRequest();

        if ($request->isPost()) {
            // flag request->getPost('submit'), if 此值为...，则说明post的是SearchForm，则判断预订时间是不是ok， if 此值为...，则说明post的是reservationDetails表，则存入数据库
            $buttonFlag = $request->getPost('submit');
            if ($buttonFlag == 'Find a Table') {
                // flag: date and time selected ok?
                $date_d = $request->getPost('date_d');
                $date_m = $request->getPost('date_m');
                $date_y = $request->getPost('date_y');
                $date   = $date_y . '-' . $date_m . '-' . $date_d;
                $time_h = $request->getPost('time_h');
                $time_m = $request->getPost('time_m');
                $time_s = '00';
                $time   = $time_h . ':' . $time_m . ':' . $time_s;
                $dateTime = $date . ' ' . $time;
                $peopleAmount = $request->getPost('peopleAmount');


                // update the reservationSearchForm
                $reservationSearchForm->get('date_d')->setValue($date_d);
                $reservationSearchForm->get('date_m')->setValue($date_m);
                $reservationSearchForm->get('date_y')->setValue($date_y);
                $reservationSearchForm->get('time_h')->setValue($time_h);
                $reservationSearchForm->get('time_m')->setValue($time_m);
                $reservationSearchForm->get('peopleAmount')->setValue($request->getPost('peopleAmount'));

                if ($this->tableAvailableCheck($dateTime, $peopleAmount)) {
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
                    $reservationSearchForm->get('date_d')->setValue($reservation->getTime()->format('d'));
                    $reservationSearchForm->get('date_m')->setValue($reservation->getTime()->format('m'));
                    $reservationSearchForm->get('date_y')->setValue($reservation->getTime()->format('Y'));
                    $reservationSearchForm->get('time_h')->setValue($reservation->getTime()->format('H'));
                    $reservationSearchForm->get('time_m')->setValue($reservation->getTime()->format('i'));
                    $reservationSearchForm->get('peopleAmount')->setValue($reservation->getPeopleAmount());

                    return array(
                        'reservedFlag'          => true,
                        'reservationSearchForm' => $reservationSearchForm,
                        'message'               => 'A table for '
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
            'message'               => 'Welcome!'
        );


    }


    public function reservationConfirmAction()
    {
        $email = "finleyltf@gmail.com";

        if (isset($_POST['firstName'])) {
            $validation = array();

            if (!isset($_POST['firstName']) || $_POST['firstName'] == '') {
                $validation[] = array('message'=>'Please enter Your firstName', 'id'=>'email');
            }

            if (!isset($_POST['email']) || $_POST['email'] == '') {
                $validation[] = array('message'=>'Please enter email', 'id'=>'email');
            }

            require_once getcwd() . '/public/inc/securimage/securimage.php';
            $securimage = new \Securimage();


            if ($securimage->check($_POST['captcha']) == false) {
                $validation[] = array('message' => 'Wrong captcha code', 'id' => 'form-captcha');
            }

            $phone = $_POST['phoneNumber'];
//            $amount = $_POST['amount'];
            $message = $_POST['message'];

//            $day = $_POST['day'];
//            $month = $_POST['month'];
//            $year = $_POST['year'];
//
//            $hour = $_POST['hour'];
//            $minute = $_POST['minute'];
//
//            $ampm = $_POST['ampm'];

            $headers = "";

            $message .= " Phone: " . $phone;
//            $message .= " Amount: " . $amount;
            $message .= " Email: " . $_POST['email'];

            $message .= "\n\n";
//            $message .= " Day: " . $day;
//            $message .= " Month: " . $month;
//            $message .= " Year: " . $year;
//            $message .= " Time: " . $hour . " " . $minute . " " . $ampm;

            $subject = 'Restaurant Revesrvation details';
            $headers = 'From: '. $_POST['email']. "\r\n" .'Reply-To: '. $_POST['email']. "\r\n" .'X-Mailer: PHP/' . phpversion();

            if (empty($validation)) {
                if (mail($email, $subject, $message, $headers)) {
                    echo json_encode(array('success'=>(bool)true, 'message'=>''));
                } else {
                    echo json_encode(array('success'=>(bool)false, 'type'=>'system', 'data'=>array('message'=>'Sending error, please try again later')));
                }


                // begin of sava database
                $request = $this->getRequest();

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
//                    $reservationSearchForm->get('date_d')->setValue($reservation->getTime()->format('d'));
//                    $reservationSearchForm->get('date_m')->setValue($reservation->getTime()->format('m'));
//                    $reservationSearchForm->get('date_y')->setValue($reservation->getTime()->format('Y'));
//                    $reservationSearchForm->get('time_h')->setValue($reservation->getTime()->format('H'));
//                    $reservationSearchForm->get('time_m')->setValue($reservation->getTime()->format('i'));
//                    $reservationSearchForm->get('peopleAmount')->setValue($reservation->getPeopleAmount());
//
//                    return array(
//                        'reservedFlag'          => true,
//                        'reservationSearchForm' => $reservationSearchForm,
//                        'message'               => 'A table for '
//                            . $reservation->getPeopleAmount()
//                            . ' people is reserved for you on '
//                            . $reservation->getTime()->format('Y-m-d H:i'),
//                    );


                }

                // end of save database


            } else {
                echo json_encode(array('success'=>(bool)false, 'type'=>'validation', 'data'=>$validation));
            }

            die();
        }

    }


    public function tableAvailableCheck($dateTime, $peopleAmount)
    {
        $dateTimeStamp = strtotime($dateTime);

        // how to determine flag ok?
        // 取$time，遍历这个时间点以及之前一个小时的订单，在这个时间之前的一小时内如果预订总人数超过40人，就视为已经订满。
        // 同时还要考虑新加入的这个订单的$peopleAmount，加入到这一个小时内的预订人数，视为最后的判断总人数
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

        $peopleSum += $peopleAmount;

        return $peopleSum <= 40 ? true : false;
    }

}