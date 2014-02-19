<?php
namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function categoryAction()
    {
        return new ViewModel(array());
    }

    public function indexAction()
    {
        return new ViewModel(array());
    }

    public function showAction()
    {
        return new ViewModel(array());
    }

    public function userAction()
    {
        return new ViewModel(array());
    }
}

