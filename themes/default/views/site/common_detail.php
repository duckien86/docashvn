<?php
/* @var $this SiteController */

?>
<div class="br_top hidden-xs">
    <div class="container">
        <div class="col-md-12">
            <?php
            $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'       => array(
                    '<span class="home_link">' . Yii::t('web/full_home', 'news') . '</span>'
                ),
                'encodeLabel' => FALSE,
                'homeLink'    => '',
                'separator'   => '',
                'htmlOptions' => array('class' => 'breadcrumb'),
            ));
            ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="common_detail">
        <?php
        echo $news[0]->content;
        ?>
    </div>
</div>