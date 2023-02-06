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
    <div class="agency">
        <div class="space_40"></div>
        <?php
        if ($news) :
            foreach ($news as $newsItem) :
        ?>
                <div class="item">
                    <div class="space_10"></div>
                    <div class="col-md-4 col-xs-12">
                        <div class="thumbnail">
                            <img style="height: 150px;" src="<?= $newsItem->image; ?>" alt="">
                        </div>
                    </div>

                    <div class="col-md-8 col-xs-12">
                        <div class="txt_title">
                            <?= CHtml::link($newsItem->title, $this->createUrl('site/publicationsDetail', array('id' => $newsItem->id))); ?>
                        </div>
                        <div class="txt_des">
                            <?= $newsItem->description; ?>
                        </div>
                    </div>
                    <!-- <div class="col-md-3 col-xs-12">
                        <div class="txt_des">
                            Số lượng đặt hàng: <input type="number" id="<?= $key ?>" name="quantity" value="<?= $value->quantity ?>" min="1" max="10000" onchange="addToCart(<?= $key ?>,this.value)">
                        </div>

                    </div> -->
                    <div class="space_10" style="border-bottom: 1px solid;"></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>