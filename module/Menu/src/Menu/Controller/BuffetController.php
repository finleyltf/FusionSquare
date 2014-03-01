<?php

namespace Menu\Controller;

use Menu\Entity\Buffet1;
use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Doctrine\ORM\EntityManager;

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

    public function indexAction()
    {

//        echo '<pre>';
//        var_dump(new ViewModel(array(
//            'buffet' => $this->getEntityManager()->getRepository('Menu\Entity\Buffet1')->findall()
//        )));
//        echo '</pre>';



        return new ViewModel(array(
            'buffet' => $this->getEntityManager()->getRepository('Menu\Entity\Buffet1')->findall()
        ));




//        $buffet = new Buffet1();
//        $buffet->setWeekMark('1');
//        $buffet->setDisplayOrder('5');
//        $buffet->setSpiceDegree('3');
//        $buffet->setColdDish('0');
//        $buffet->setFName('porssalihha ööö äää');
//        $buffet->setEName('Pork in brown sause');
//        $buffet->setCName('红烧肉');
//
//        $this->getEntityManager()->persist($buffet);
//        $this->getEntityManager()->flush();
//
//        echo '<pre>';
//        var_dump($buffet->getBuffet1Id());
//        var_dump($buffet->getCName());
//        var_dump($buffet->getFName());
//        echo '</pre>';


    }

    public function addAction()
    {


    }

    public function editAction()
    {


    }

    public function deleteAction()
    {


    }


}


