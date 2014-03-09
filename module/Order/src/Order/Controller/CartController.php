<?php

namespace Order\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Doctrine\ORM\EntityManager,
    Zend\Validator\File\Size;

class CartController extends AbstractActionController {

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
         
    public function addAction() { 
     session_start();
     $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
     $dish = $this->getEntityManager()->getRepository('Menu\Entity\Dish')->findOneBy(array('dishId' => $id));
     $fname = $dish->getFName();
     if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
     }

     // check if the item is in the array, if it is, do not add
    if(in_array($id, $_SESSION['cart'])){
            
            echo "<pre>";
            print_r($_SESSION['cart']);
            echo "</pre>";
                        session_destroy();die();
    }

    // else, add the item to the array
    else{
            array_push($_SESSION['cart'], $id,$fname);
            
            echo "<pre>";
            print_r($_SESSION['cart']);
            echo "</pre>"; session_destroy();die();

    }

        die("121212");
        
        
    }   

}


