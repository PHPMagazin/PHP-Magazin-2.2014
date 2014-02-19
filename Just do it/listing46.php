<?php
namespace Blog\Controller;

use Blog\Form\ArticleForm;
use Blog\Service\ArticleService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController
{
    protected $articleForm = null;
    protected $articleService = null;

    function __construct(
        ArticleService $articleService, ArticleForm $articleForm
    ) {
        $this->setArticleService($articleService);
        $this->setArticleForm($articleForm);
    }

    public function createAction()
    {
        // create article
//        $id = $this->getArticleService()->create(
//            $this->getRequest()->getPost()->toArray()
//        );

        $id = null;

        if ($id) {
            return $this->redirect()->toRoute(
                'blog-admin/id',
                array(
                    'controller' => 'admin',
                    'action'     => 'update',
                    'id'         => $id
                ), true
            );
        }

        $createForm = $this->getArticleForm();
        $createForm->setAttribute(
            'action',
            $this->url()->fromRoute(
                'blog-admin',
                array('controller' => 'admin', 'action' => 'create'),
                true
            )
        );

        return new ViewModel(
            array(
                'createForm' => $createForm,
            )
        );
    }

    public function getArticleForm()
    {
        return $this->articleForm;
    }

    public function setArticleForm($articleForm)
    {
        $this->articleForm = $articleForm;
    }

    public function indexAction()
    {
        $page = $this->params()->fromRoute('page');

        $articleList  = $this->getArticleService()->fetchMany();

        return new ViewModel(
            array(
                'articleList'  => $articleList,
            )
        );
    }
}

