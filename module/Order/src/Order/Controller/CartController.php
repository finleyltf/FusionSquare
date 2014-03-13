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
 
    $id = $_GET["id"];
    $qty = $_GET["qty"]; 
    $dish = $this->getEntityManager()->getRepository('Menu\Entity\Dish')->findOneBy(array('dishId' => $id));
    $fname = $dish->getFName();
    $price = $dish->getPrice();
     
    $array = array(
        "id" => $id,
        "qty" => $qty,
        "fname" => $fname,
        "price" => $price,
    );
   
    if(!isset($_SESSION['cart'])){
       $_SESSION['cart'] = array();
    }
     
    if(empty($_SESSION['cart'])){ 
        array_push($_SESSION['cart'], $array);   
    }else{   
        foreach($_SESSION['cart'] as $key=>$cart){       
        if($id==$cart['id']){
            $_SESSION['cart'][$key]['qty']=$qty;
            return new ViewModel(array(
                'carts' => $_SESSION['cart']
            ));
            }
        }   
        array_push($_SESSION['cart'], $array);   
    }
        return new ViewModel(array(
            'carts' => $_SESSION['cart']
        ));
    }   

}


