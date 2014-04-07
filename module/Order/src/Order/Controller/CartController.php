<?php

namespace Order\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Doctrine\ORM\EntityManager,
    Zend\Validator\File\Size,
    Zend\View\Helper\ServerUrl;

class CartController extends AbstractActionController
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

    public function addAction()
    {
        session_start();
        $sid = session_id();
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

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (empty($_SESSION['cart'])) {
            array_push($_SESSION['cart'], $array);
        } else {
            foreach ($_SESSION['cart'] as $key => $cart) {
                if ($id == $cart['id']) {
                    $_SESSION['cart'][$key]['qty'] = $qty;
                    return new ViewModel(array(
                        'carts' => $_SESSION['cart']
                    ));
                }
            }
            array_push($_SESSION['cart'], $array);
        }

        return new ViewModel(array(
            'carts' => $_SESSION['cart'],
            'sid' => $sid
        ));
    }

    public function removeAction()
    {
        $id = $_GET["id"];
        $sid = $_GET["sid"];
        session_id($sid);
        session_start();
        foreach ($_SESSION['cart'] as $key => $cart) {
            if ($id == $cart['id']) {
                unset($_SESSION['cart'][$key]);
            }
        }
        return new ViewModel(array(
            'carts' => $_SESSION['cart'],
            'sid' => $sid
        ));
    }

    public function removeallAction()
    {
        $sid = $_GET["sid"];
        session_id($sid);
        session_start();
        session_destroy();
        $server_url = $this->getRequest()->getUri()->getScheme() . '://' . $this->getRequest()->getUri()->getHost();
        $helper = new ServerUrl();
        $url = $helper->__invoke(true);
        $menuurl = $server_url.'/menu';
        $this->redirect()->toUrl($menuurl);
        //return $this->forward()->dispatch('Menu\Controller\menu', array('action' => 'index'));
    }

    public function checkoutAction()
    {

    }

}


