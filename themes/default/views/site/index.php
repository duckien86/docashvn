<?php
/* @var $this SiteController */
/* @var $partners WPartners */
?>
<?php //$this->renderPartial('//layouts/_social'); 
?>
<div id="slider_1" style="min-height: 200px;">
    <?php $this->renderPartial('//layouts/_slider', array('stacks' => WBanners::STACK_1)); ?>
</div>
<div id="slider_2">
    <?php $this->renderPartial('//layouts/_slider', array('stacks' => WBanners::STACK_2)); ?>
</div>
<div id="slider_3">
    <?php $this->renderPartial('//layouts/_slider', array('stacks' => WBanners::STACK_3)); ?>
</div>
<div class="space_10"></div>
<div class="container">
    <div class="row text-center">
        <?= $news ?>
    </div>
    <div class="space_30"></div>
    <div class="row text-center">
        <div class="br_top hidden-xs">
            <div class="container" style="padding: unset;">
                <div class="col-md-12">
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links'       => array(
                            '<span class="home_link">Thông tin liên kết</span>'
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
        <div class="space_10"></div>
        <div class="partner">
            <?php
            if ($partners && is_array($partners)) :
                foreach ($partners as $item) :
            ?>
                    <div class="col-md-2 col-xs-6">
                        <a href="<?= $item->target_link ?>" title="<?= CHtml::encode($item->title); ?>">
                            <div class="thumbnail">
                                <img src="<?= Yii::app()->params->upload_dir . $item->folder_path; ?>" alt="">
                                <div class="title">
                                    <?= CHtml::encode($item->title); ?>
                                </div>

                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="space_40"></div>