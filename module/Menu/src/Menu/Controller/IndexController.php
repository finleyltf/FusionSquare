<?php

namespace Menu\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Doctrine\ORM\EntityManager;

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

        return new ViewModel(array(
            'dishes' => $this->getEntityManager()->getRepository('Menu\Entity\Dish')->findAll() 
        ));
    }
    
    public function addAction()
    {
        //fecth all the category and restaurant and put them in select option
        $categoryList = $this->getEntityManager()->getRepository('Menu\Entity\Category')->findAll();

        $categories = array();
        foreach ($categoryList as $list) {
            $categories[$list->getCategoryId()] = $list->getName();
        }
        
        $restaurantList = $this->getEntityManager()->getRepository('Menu\Entity\Restaurant')->findAll();
        $restaurants = array();
        foreach ($restaurantList as $list) {
            $restaurants[$list->getRestaurantId()] = $list->getName();
        }

        $form = new \Menu\Form\DishForm;
        
        $form->get('category')->setAttributes(array(
        'options' => $categories,   
        )); 
        $form->get('restaurant')->setAttributes(array(
        'options' => $restaurants,   
        )); 
 
        return array('form' => $form);
    }

}


