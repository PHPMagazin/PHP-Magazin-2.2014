<h1><?php echo $this->translate('title_blog_index_index'); ?></h1>
<?php foreach ($this->articleList as $article): ?>
    <div>
        <?php // echo $this->showArticle($article); ?>
        $urlShow = $this->url(
            'blog-article', array('url' => $article->getUrl()), true
        );
        ?>
        <p>
            <a href="<?php echo $urlShow; ?>" class="btn">
                <?php echo $this->translate('link_blog_index_continue'); ?>
            </a>
        </p>
        <hr/>
    </div>
<?php endforeach; ?>
<div class="box info center">
    <?php // echo $this->paginate(array('module' => 'blog', 'controller' => 'index', 'action' => 'index'), $this->pageHandling); ?>
</div>

