<?php

namespace Menu\Controller;
use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Doctrine\ORM\EntityManager,
    Zend\Validator\File\Size;

class IndexController extends AbstractActionController {


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
         
    public function indexAction() {
        $categories = $this->getEntityManager()->getRepository('Menu\Entity\Category')->findAll();
        return new ViewModel(array(
            'dishes' => $this->getEntityManager()->getRepository('Menu\Entity\Dish')->findAll(),
            'categories' => $this->getEntityManager()->getRepository('Menu\Entity\Category')->findAll()
        ));
    }
}