<?php

namespace Menu\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;

use Menu\Entity\Buffet1,
    Menu\Entity\Buffet2,
    Menu\Form\BuffetForm;

class BuffetController extends AbstractActionController
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

    public function test123()
    {


    }

    public function indexAction()
    {
        // get the dayMark(1 to 5), weekMark of current week('1' or '2')
        $dayMark                 = date('N');
        $week_number_of_the_year = date('W');
        $week_number_reminder    = fmod(floatval($week_number_of_the_year), 2.00); // 把$week_number_of_the_year转为float型，计算余数, 转为float计算就不会产生整型溢出问题
        $weekMark                = ($week_number_reminder == 0) ? ($week_number_reminder += 2) : $week_number_reminder;


        // fetch all buffet, based on weekMark
        $buffet = $this->getEntityManager()->getRepository('Menu\Entity\Buffet' . $weekMark)->findall();

        // and return buffet to index view, along with weekMark and dayMark
        return new ViewModel(array(
                'buffet'   => $buffet,
                'weekMark' => $weekMark,
                'dayMark'  => $dayMark,
            )
        );

    }


}