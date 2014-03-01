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

        return new ViewModel(array(
            'dishes' => $this->getEntityManager()->getRepository('Menu\Entity\Dish')->findAll() 
        ));
    }
    
    public function addAction()
    {
        //fecth all the category and restaurant 
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

        //put category and restaurant in dropdown option
        $form = new \Menu\Form\DishForm;
        
        $form->get('category')->setAttributes(array(
        'options' => $categories,   
        )); 
        $form->get('restaurant')->setAttributes(array(
        'options' => $restaurants,   
        )); 
        
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            
            $file  = $this->params()->fromFiles('image');
            $data = array_merge_recursive(
                $request->getPost()->toArray(),
                $request->getFiles()->toArray()
            );

            $form->setData($data);
            
            if ($form->isValid()) {
                
            //store data into database
            $dish = new \Menu\Entity\Dish;
            $category = $this->getEntityManager()->getRepository('Menu\Entity\Category')->findOneBy(array('categoryId' => $data['category']));
            $restaurant = $this->getEntityManager()->getRepository('Menu\Entity\Restaurant')->findOneBy(array('restaurantId' => $data['restaurant']));
            $dish->setCategory($category);
            $dish->populate($form->getData());
            $dish->setImage($file['name']);
            $dish->setCategory($category);
            $dish->setRestaurant($restaurant);
            $this->getEntityManager()->persist($dish);
            $this->getEntityManager()->flush();
                
            //put image in uploads folder
            $size = new Size(array('min'=>200,'max'=>2000000000)); //minimum bytes filesize
            $adapter = new \Zend\File\Transfer\Adapter\Http(); 
            $adapter->setValidators(array($size), $file['name']);
            $adapter->setDestination(getcwd().'/public/uploads');
            $adapter->receive($file['name']);
            
            }

        }        
 
        return array('form' => $form);
    }

}


