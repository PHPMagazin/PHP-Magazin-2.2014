<?php
namespace Blog\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ArticleFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $formElementManager)
    {
        $serviceLocator = $formElementManager->getServiceLocator();

        $categoryService = $serviceLocator->get('Blog\Service\Category');

        $categoryOptions = array();

        foreach ($categoryService->fetchMany() as $category) {
            $categoryOptions[$category->getId()] = $category->getName();
        }

        $statusOptions = array(
            'new' => 'new', 'approved' => 'approved', 'blocked' => 'blocked'
        );

        $form = new ArticleForm();
        $form->setCategoryOptions($categoryOptions);
        $form->setStatusOptions($statusOptions);

        return $form;
    }

} 
