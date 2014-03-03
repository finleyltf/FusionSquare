<?php

namespace Menu\Controller;

use Menu\Entity\Buffet1;
use Menu\Entity\Buffet2;
use Menu\Form\BuffetForm;
use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Doctrine\ORM\EntityManager;

class BuffetAdminController extends AbstractActionController
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
        // get weekMark from index page, '1' or '2'
        $weekMark = $this->params()->fromRoute('weekMark');
        if (!$weekMark) {
            return $this->redirect()->toRoute('buffetAdmin', array(
                'action' => 'index'
            ));
        }


        return new ViewModel(array(
            'buffet'   => $this->getEntityManager()->getRepository('Menu\Entity\Buffet' . $weekMark)->findall(),
            'weekMark' => $weekMark,
        ));


    }


    public function addAction()
    {
        // get weekMark from route
        $weekMark = $this->params()->fromRoute('weekMark');

        // 初始化 buffet form，把submit button改为add
        $form = new BuffetForm();
        $form->get('submit')->setValue('Add');

        // request isPost()?
        $request = $this->getRequest();
        if ($request->isPost()) {
            //if yes 初始化buffet1或者buffet2的entity，并取得输入的数据，验证$form isValid()后,存入数据库
            if ($weekMark == '1') {
                $buffet = new Buffet1();
            } elseif ($weekMark == '2') {
                $buffet = new Buffet2();
            }

            $data_entered = array_merge_recursive(
                $request->getPost()->toArray()
            );


            $form->setData($data_entered);

            //if $form isValid()
            if ($form->isValid()) {
                // get data from valid form
                $data_to_be_saved = $form->getData();
                $buffet->populate($data_to_be_saved);


                // 表单取到的是string，转成int和数据库对应
                $buffet->setDayMark((int)$buffet->getDayMark());
                $buffet->setDisplayOrder((int)$buffet->getDisplayOrder());


                // save data to database
                $this->getEntityManager()->persist($buffet);
                $this->getEntityManager()->flush();

                // 存储成功后successful的message？


                // back to listview
                return $this->redirect()->toRoute('buffetAdmin', array(
                    'action'   => 'listView', // listview or listView ?? : listView
                    'weekMark' => $weekMark,
                ));

            }


        }


        //if no 给一张空的form，return
        return array(
            'form'     => $form,
            'weekMark' => $weekMark,
        );


    }

    public function editAction()
    {
        // get buffet dish id & weekMark from route
        $id       = (int)$this->params()->fromRoute('id');
        $weekMark = (string)$this->params()->fromRoute('weekMark');

        // id 不存在则返回listView
        if (!$id) {
            return $this->redirect()->toRoute('buffetAdmin', array(
                'action'   => 'listView',
                'weekMark' => $weekMark,
            ));
        }

        // get buffet dish by id and weekMark
        try {
            $buffet = $this->getEntityManager()->find('Menu\Entity\Buffet' . $weekMark, $id);
        } catch (\Exception $ex) {
            // 异常，返回listView
            return $this->redirect()->toRoute('buffetAdmin', array(
                'action'   => 'listView',
                'weekMark' => $weekMark,
            ));
        }


        // bind to form, set the submit button to edit
        $form = new BuffetForm();


        $form->bind($buffet);

        $form->get('submit')->setAttribute('value', 'Edit');


        // request isPost()?
        $request = $this->getRequest();
        if ($request->isPost()) {
            // yes, go edit

            // get data entered by user
            $data_entered = $request->getPost();

            // set data to $form
            $form->setData($data_entered);

            // check $form isValid()
            if ($form->isValid()) {
                // yes, save data
                $this->getEntityManager()->flush();


                // after edit successfully, redirect to list view
                $this->redirect()->toRoute('buffetAdmin', array(
                    'action'   => 'listView',
                    'weekMark' => $weekMark,
                ));

            } else {
                die('die123, form not valid');
            }


        }


        // no, return the form with bound values, and id (view phtml needs id)
        return array(
            'form'     => $form,
            'weekMark' => $weekMark,
            'id'       => $id,
        );

    }

    public function deleteAction()
    {
        // get weekMark and id from route
        $id       = $this->params()->fromRoute('id', 0);
        $weekMark = $this->params()->fromRoute('weekMark');

        if (!$id) {
//            return $this->redirect()->toRoute('buffetAdmin', array(
//                'action'   => 'listView',
//                'weekMark' => $weekMark,
//            ));

            // debug
            die('no id detect!');


        }

        // get buffet dish by weekMark and id
        try {
            $buffet = $this->getEntityManager()->find('Menu\Entity\Buffet' . $weekMark, $id);
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('buffetAdmin', array(
                'action'   => 'listView',
                'weekMark' => $weekMark,
            ));
        }

        // isPost()?
        $request = $this->getRequest();
        if ($request->isPost()) {
            // yes, go delete
            // get the yes or no value from the button, which is from the <form> in delete.phtml
            $delete_btn = $request->getPost('delete_btn');

            // delete: yes or no ?
            if ($delete_btn == "Yes") {
                // yes, delete

                $this->getEntityManager()->Remove($buffet);
                $this->getEntityManager()->flush();
            }

            // no, back to listView
            return $this->redirect()->toRoute('buffetAdmin', array(
                'action'   => 'listView',
                'weekMark' => $weekMark,
            ));
        }

        // return weekMark, id, and the specific buffet dish found by id (so that we can see which one is being deleted )
        return array(
            'weekMark' => $weekMark,
            'id'       => $id,
            'buffet'   => $buffet,
        );

    }


}


