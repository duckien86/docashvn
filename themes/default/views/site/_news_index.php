<?php
/* @var $this SiteController */

?>
<div class="space_90"></div>


<div class="container" style="padding: unset;">
    <div class="news">
        <!-- col 1 -->

        <div class="col-md-8 col-xs-12" style="padding-right: 0px;">
            <div class="br_top hidden-xs">
                <div class="col-md-12">
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links'       => array(
                            '<span class="home_link">' . Yii::t('web/full_home', 'news_event') . '</span>'
                        ),
                        'encodeLabel' => FALSE,
                        'homeLink'    => '',
                        'separator'   => '',
                        'htmlOptions' => array('class' => 'breadcrumb'),
                    ));
                    ?>
                </div>
            </div>

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
                                <?= $newsItem->title; ?>
                            </div>
                            <div class="txt_des">
                                <?= $newsItem->description; ?>
                            </div>
                            <div class="txt_des" style="float: right;">
                                <?= CHtml::link('Xem chi tiết', ''); ?>
                            </div>
                        </div>
                        <!-- <div class="col-md-3 col-xs-12">
                        <div class="txt_des">
                            Số lượng đặt hàng: <input type="number" id="<?= $key ?>" name="quantity" value="<?= $value->quantity ?>" min="1" max="10000" onchange="addToCart(<?= $key ?>,this.value)">
                        </div>-->

                    </div>
                    <div class="space_10" style="border-bottom: 1px dotted;margin: 0 auto;width: 96%;"></div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="col-md-4 col-xs-12" style="padding-left: 0px;">
            <!-- Thong tin -->
            <div class="br_top hidden-xs">
                <div class="col-md-12">
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links'       => array(
                            '<span class="home_link">' . Yii::t('web/full_home', 'info') . '</span>'
                        ),
                        'encodeLabel' => FALSE,
                        'homeLink'    => '',
                        'separator'   => '',
                        'htmlOptions' => array('class' => 'breadcrumb'),
                    ));
                    ?>
                </div>
            </div>

            <?php
            if ($info) :
                foreach ($info as $newsItem) :
            ?>
                    <div class="item">
                        <div class="col-md-12 col-xs-12">
                            <div class="txt_des" style="padding: 2px 10px;color: #ba3b3f;">
                                <i class="glyphicon glyphicon-arrow-right"></i>
                                <?= CHtml::link($newsItem->title, '', array('style' => 'color: #919191;')); ?>
                            </div>
                        </div>
                        <!-- 
                        <div class="col-md-8 col-xs-12">
                            <div class="txt_title">
                                <?= $newsItem->title; ?>
                            </div>
                            <div class="txt_des">
                                <?= $newsItem->description; ?>
                            </div>
                            <div class="txt_des" style="float: right;">
                                <?= CHtml::link('Xem chi tiết', ''); ?>
                            </div>
                        </div> -->
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <!-- Thong tin -->

            <!-- khảo sát -->
            <div class="br_top hidden-xs">
                <div class="col-md-12">
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links'       => array(
                            '<span class="home_link">Tìm hiểu pháp luật</span>'
                        ),
                        'encodeLabel' => FALSE,
                        'homeLink'    => '',
                        'separator'   => '',
                        'htmlOptions' => array('class' => 'breadcrumb'),
                    ));
                    ?>
                </div>
            </div>
            <div class="item">
                <div class="col-md-12 col-xs-12">
                    <div class="txt_des" style="padding: 2px 10px;color: #ba3b3f;">
                        <p>
                            <i class="glyphicon glyphicon-arrow-right"></i>
                            <?= CHtml::link('Bài trắc nghiệm tìm hiểu pháp luật – Bộ luật Tố tụng hình sự', Yii::app()->controller->createUrl('survey/index'), array('style' => 'color: #919191;')); ?>
                        </p>
                        <p style="color: #919191;">
                            Bộ luật Tố tụng hình sự năm 2015 được ban hành với nhiều sửa đổi quan trọng về tranh tụng hình sự, hãy cùng LERES tìm hiểu các điểm mới này qua bài trắc nghiệm nhỏ này nhé!
                            <br>
                            - Bản trắc nghiệm tính điểm, mỗi đáp án trả lời đúng là 1 điểm. Làm xong Bản trắc nghiệm sẽ nhận được thông báo điểm số.
                            <br>
                            - Để tìm hiểu về Bộ luật Tố tụng hình sự năm 2015 thì tham khảo tờ thông tin giới thiệu về “Tranh tụng trong xét xử được bảo đảm theo Bộ luật Tố tụng hình sự năm 2015” - ( đăng trong mục Ấn phẩm - website: Leres.vn )
                        </p>
                        <p>
                            <?= CHtml::link('Bấm <b>vào đây</b> để làm Bài trắc nghiệm.', Yii::app()->controller->createUrl('survey/index'), array('style' => 'color: #919191;')); ?>
                        </p>
                        <p style="font-size: 16px; color:#000">
                            Lượt người làm trắc nghiệm
                            <span style="font-size: 19px;padding: 0px 22px; border: 1px solid;margin-left:3px" class="well well-sm"><?= WSurveyReport::countSurvey() ?></span>
                        </p>
                        <!-- <div class="panel panel-default">
                            <div class="panel-heading">Lượt người làm trắc nghiệm</div>
                            <div class="panel-body"><?= WSurveyReport::countSurvey() ?></div>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- khảo sát -->


            <!-- photos -->
            <div class="br_top hidden-xs">
                <div class="col-md-12">
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links'       => array(
                            '<span class="home_link">' . Yii::t('web/full_home', 'photos') . '</span>'
                        ),
                        'encodeLabel' => FALSE,
                        'homeLink'    => '',
                        'separator'   => '',
                        'htmlOptions' => array('class' => 'breadcrumb'),
                    ));
                    ?>
                </div>
            </div>
            <div class="photo">
                <ul>
                    <?php
                    if ($photo) :
                        foreach ($photo as $newsItem) :
                    ?>
                            <li>
                                <a href="<?= Yii::app()->controller->createUrl('site/index'); ?>" title="">
                                    <img src="<?= $newsItem->image; ?>" alt="<?= $newsItem->title; ?>">
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- photos -->


            <!-- Video -->
            <div class="br_top hidden-xs">
                <div class="col-md-12">
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links'       => array(
                            '<span class="home_link">' . Yii::t('web/full_home', 'video') . '</span>'
                        ),
                        'encodeLabel' => FALSE,
                        'homeLink'    => '',
                        'separator'   => '',
                        'htmlOptions' => array('class' => 'breadcrumb'),
                    ));
                    ?>
                </div>
            </div>
            <div class="photo">
                <ul>
                    <?php
                    if ($video) :
                        foreach ($video as $newsItem) :
                    ?>
                            <li>
                                <a href="<?= Yii::app()->controller->createUrl('site/index'); ?>" title="">
                                    <img src="<?= $newsItem->image; ?>" alt="<?= $newsItem->title; ?>">
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- video -->

        </div>
    </div>
</div>