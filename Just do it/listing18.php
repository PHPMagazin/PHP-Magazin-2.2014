<?php
namespace User\View\Helper;

use Zend\View\Helper\AbstractHelper;

class UserWidget extends AbstractHelper
{
    protected $identity;
    protected $userService;

    function __construct(
        \User_Model_User $identity, \User_Service_User $userService
    ) {
        $this->setIdentity($identity);
        $this->setUserService($userService);
    }

    public function __invoke()
    {
        $output = '';

        if (!$this->getIdentity()) {
            $loginForm = $this->getUserService()->getForm('login');
            $loginForm->setAction(
                $this->getView()->url(
                    'user',
                    array('controller' => 'index', 'action' => 'login'),
                    true
                )
            );
            $loginForm->setAttrib('class', 'form-vertical');
            $loginForm->getElement('user_name')->setAttrib('class', 'span3');
            $loginForm->getElement('user_password')->setAttrib(
                'class', 'span3'
            );
            $loginForm->setView(new \Zend_View());

            $output .= '<h3>'
                . $this->getView()->translate('heading_user_user_loggedin')
                . '</h3>';

            $output .= $loginForm->render();
        } else {
            $output .= '<h3>' . $this->getView()->translate(
                    'heading_user_user_loggedout'
                ) . '</h3>';

            $output .= '<p><i class="icon-user icon-white"></i> '
                . $this->getIdentity()->getName() . '</p>';

            $output .= '<p><i class="icon-envelope icon-white"></i> '
                . $this->getIdentity()->getEmail() . '</p>';

            $output .= '<p><a href="' . $this->getView()->url(
                    'user',
                    array('controller' => 'index', 'action' => 'logout'),
                    true
                ) . ' " class="btn btn-success">'
                . $this->getView()->translate('action_user_user_logout')
                . '</a></p>';
        }

        return $output;
    }

    public function getIdentity()
    {
        return $this->identity;
    }

    public function setIdentity($identity)
    {
        $this->identity = $identity;
    }

    public function getUserService()
    {
        return $this->userService;
    }

    public function setUserService($userService)
    {
        $this->userService = $userService;
    }
}
