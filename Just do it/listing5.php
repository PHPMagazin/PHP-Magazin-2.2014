<?php
namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function categoryAction()
    {
        $page = $this->params()->fromRoute('page');
        $url  = $this->params()->fromRoute('url');

        $categoryService = \Blog_Service_Category::getInstance();
        $category        = $categoryService->fetchSingleByUrl($url);

        if (!$category) {
            $id = $this->params()->fromRoute('id');

            $category = $categoryService->fetchSingleById($id);

            if (!$category) {
                return $this->redirect()->toRoute('blog', array(), true);
            }
        }

        $articleService = \Blog_Service_Article::getInstance();
        $articleList    = $articleService->fetchListByCategory(
            $category->getId(), $page
        );
        $pageHandling   = $articleService->pageListByCategory(
            $category->getId(), $page
        );

        if (empty($articleList) && $page > 0) {
            return $this->redirect()->toRoute(
                'blog-category', array('url' => $category->getUrl()), true
            );
        }

        return new ViewModel(
            array(
                'category'     => $category,
                'articleList'  => $articleList,
                'pageHandling' => $pageHandling,
            )
        );
    }

    public function indexAction()
    {
        $page = $this->params()->fromRoute('page');

        $articleService = \Blog_Service_Article::getInstance();
        $articleList    = $articleService->fetchListApproved($page);
        $pageHandling   = $articleService->pageListApproved($page);

        if (empty($articleList) && $page > 0) {
            return $this->redirect()->toRoute('blog', array(), true);
        }

        return new ViewModel(
            array(
                'articleList'  => $articleList,
                'pageHandling' => $pageHandling,
            )
        );
    }

    public function showAction()
    {
        $url = $this->params()->fromRoute('url');

        $articleService = \Blog_Service_Article::getInstance();
        $article        = $articleService->fetchSingleByUrl($url);

        if (!$article) {
            $id = $this->params()->fromRoute('id');

            $article = $articleService->fetchSingleById($id);

            if (!$article) {
                return $this->redirect()->toRoute('blog', array(), true);
            }
        }

        return new ViewModel(
            array(
                'article' => $article,
            )
        );
    }

    public function userAction()
    {
        $page = $this->params()->fromRoute('page');
        $url  = $this->params()->fromRoute('url');

        $userService = \User_Service_User::getInstance();
        $user        = $userService->fetchSingleByUrl($url);

        if (!$user) {
            $id = $this->params()->fromRoute('id');

            $user = $userService->fetchSingleById($id);

            if (!$user) {
                return $this->redirect()->toRoute('blog', array(), true);
            }
        }

        $articleService = \Blog_Service_Article::getInstance();
        $articleList    = $articleService->fetchListByUser(
            $user->getId(), $page
        );
        $pageHandling   = $articleService->pageListByUser(
            $user->getId(), $page
        );

        if (empty($articleList) && $page > 0) {
            return $this->redirect()->toRoute(
                'blog-user', array('url' => $user->getUrl()), true
            );
        }

        return new ViewModel(
            array(
                'user'         => $user,
                'articleList'  => $articleList,
                'pageHandling' => $pageHandling,
            )
        );
    }
}

