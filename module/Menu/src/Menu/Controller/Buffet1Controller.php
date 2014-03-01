<?php

namespace Menu\Controller;

use Menu\Entity\Buffet1;
use Menu\Form\Buffet1Form;
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



        // 单周菜单链接
            // buffet1ListAction()



        // 双周菜单链接
            // buffet2ListAction()





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


