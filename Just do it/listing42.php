<?php
namespace Blog\Form;

use Zend\Form\Form;

class ArticleForm extends Form
{
    protected $categoryOptions = array();

    protected $statusOptions = array();

    public function getCategoryOptions()
    {
        return $this->categoryOptions;
    }

    public function setCategoryOptions($categoryOptions)
    {
        $this->categoryOptions = $categoryOptions;
    }

    public function getStatusOptions()
    {
        return $this->statusOptions;
    }

    public function setStatusOptions($statusOptions)
    {
        $this->statusOptions = $statusOptions;
    }

    public function init()
    {
        $this->add(
            array(
                'type'       => 'select',
                'name'       => 'article_status',
                'options'    => array(
                    'label'         => 'label_blog_article_status',
                    'value_options' => $this->getStatusOptions(),
                ),
                'attributes' => array(
                    'class' => 'span6',
                ),
            )
        );

        $this->add(
            array(
                'type'       => 'select',
                'name'       => 'article_category',
                'options'    => array(
                    'label'         => 'label_blog_article_category',
                    'value_options' => $this->getCategoryOptions(),
                ),
                'attributes' => array(
                    'class' => 'span6',
                ),
            )
        );

        $this->add(
            array(
                'type'       => 'text',
                'name'       => 'article_title',
                'options'    => array(
                    'label'         => 'label_blog_article_title',
                    'value_options' => array(),
                ),
                'attributes' => array(
                    'class' => 'span6',
                ),
            )
        );

        $this->add(
            array(
                'type'       => 'textarea',
                'name'       => 'article_teaser',
                'options'    => array(
                    'label'         => 'label_blog_article_teaser',
                    'value_options' => array(),
                ),
                'attributes' => array(
                    'class' => 'span6 ckeditor',
                ),
            )
        );

        $this->add(
            array(
                'type'       => 'textarea',
                'name'       => 'article_text',
                'options'    => array(
                    'label'         => 'label_blog_article_text',
                    'value_options' => array(),
                ),
                'attributes' => array(
                    'class' => 'span6 ckeditor',
                ),
            )
        );

        $this->add(
            array(
                'type'       => 'submit',
                'name'       => 'submit_article_update',
                'attributes' => array(
                    'class' => 'btn btn-success',
                    'value' => 'submit_blog_article_update',
                ),
            )
        );
    }

} 
