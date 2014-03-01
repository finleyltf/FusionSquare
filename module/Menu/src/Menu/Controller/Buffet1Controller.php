<?php

namespace Menu\Controller;

use Menu\Entity\Buffet1;
use Menu\Form\Buffet1Form;
use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Doctrine\ORM\EntityManager;

class Buffet1Controller extends AbstractActionController
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
        return array();
        // 单周菜单链接
            // ListViewAction()

        // 双周菜单链接
            // Buffet2Controller的ListViewAction()

    }


    public function listViewAction()
    {
        return new ViewModel(array(
            'buffet1' => $this->getEntityManager()->getRepository('Menu\Entity\Buffet1')->findall()
        ));


    }



    public function addAction()
    {
        // 初始化 buffet1 form，把submit button改为add
        $form = new Buffet1Form();
        $form->get('submit')->setValue('Add');

        // request isPost()?
        $request = $this->getRequest();
        if ($request->isPost()) {
            //if yes 初始化buffet1的entity，并取得输入的数据，验证$form isValid()后,存入数据库

            $buffet1 = new Buffet1();
            $data_entered = array_merge_recursive(
                $request->getPost()->toArray()
            );
            $form->setData($data_entered);

            //if $form isValid()
            if ($form->isValid()) {
                // get data from valid form
                $data_to_be_saved = $form->getData();
                $buffet1->populate($data_to_be_saved);

                // 表单取到的是string，转成int和数据库对应
                $buffet1->setDayMark((int)$buffet1->getDayMark());
                $buffet1->setDisplayOrder((int)$buffet1->getDisplayOrder());


                // save data to database
                $this->getEntityManager()->persist($buffet1);
                $this->getEntityManager()->flush();

                // 存储成功后successful的message？
            }

            // back to listview
            return $this->redirect()->toRoute('buffet1', array(
                'action' => 'listView' // listview or listView ??
            ));
        }


        //if no 给一张空的form，return
        return array(
            'form' => $form
        );


    }

    public function editAction()
    {


    }

    public function deleteAction()
    {


    }


}


