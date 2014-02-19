<?php
namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $articleService = null;
    protected $categoryService = null;
    protected $userService = null;

    function __construct(
        \Blog_Service_Article $articleService,
        \Blog_Service_Category $categoryService,
        \User_Service_User $userService
    ) {
        $this->setArticleService($articleService);
        $this->setCategoryService($categoryService);
        $this->setUserService($userService);
    }

    public function categoryAction()
    {
        [...]

        $category = $this->getCategoryService()->fetchSingleByUrl($url);

        if (!$category) {
            [...]

            $category = $this->getCategoryService()->fetchSingleById($id);

            [...]
        }

        $articleList = $this->getArticleService()->fetchListByCategory(
            $category->getId(), $page
        );
        $pageHandling = $this->getArticleService()->pageListByCategory(
            $category->getId(), $page
        );

        [...]
    }

    public function getArticleService()
    {
        return $this->articleService;
    }

    public function setArticleService($articleService)
    {
        $this->articleService = $articleService;
    }

    public function getCategoryService()
    {
        return $this->categoryService;
    }

    public function setCategoryService($categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getUserService()
    {
        return $this->userService;
    }

    public function setUserService($userService)
    {
        $this->userService = $userService;
    }

    public function indexAction()
    {
        [...]

        $articleList  = $this->getArticleService()->fetchListApproved($page);
        $pageHandling = $this->getArticleService()->pageListApproved($page);

        [...]
    }

    public function showAction()
    {
        [...]

        $article = $this->getArticleService()->fetchSingleByUrl($url);

        if (!$article) {
            [...]

            $article = $this->getArticleService()->fetchSingleById($id);

            [...]
        }
    }

    public function userAction()
    {
        [...]

        $user = $this->getUserService()->fetchSingleByUrl($url);

        if (!$user) {
            [...]

            $user = $this->getUserService()->fetchSingleById($id);

            [...]
        }

        $articleList  = $this->getArticleService()->fetchListByUser(
            $user->getId(), $page
        );
        $pageHandling = $this->getArticleService()->pageListByUser(
            $user->getId(), $page
        );

        [...]
    }
}

