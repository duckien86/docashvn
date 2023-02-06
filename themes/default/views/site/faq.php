<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */
?>
<div class="br_top hidden-xs">
    <div class="container">
        <div class="col-md-12">
            <?php
            $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'       => array(
                    '<span class="home_link">' . Yii::t('web/full_home', 'contact') . '</span>'
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
<div class="container">
    <div class="course">
        <?php $this->widget('booster.widgets.TbAlert'); ?>
        <div class="space_40"></div>
        <div class="xs_space_20"></div>
        <div class="col-md-6 col-xs-12">
            <p style="font-size: 20px;">Gửi câu hỏi</p>
            <div class="form">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id'                   => 'faq-form',
                    // 'action'               => Yii::app()->controller->createAbsoluteUrl("site/faq"),
                    'enableAjaxValidation' => TRUE,
                )); ?>
                <div class="form-group">
                    <?php echo $form->textField($model, 'name', array('placeholder' => Yii::t('web/full_home', 'name'), 'class' => 'form-control', 'size' => 45)); ?>
                    <?php echo $form->error($model, 'name'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->textField($model, 'address', array('placeholder' => 'Địa chỉ', 'class' => 'form-control', 'rows' => 6, 'cols' => 47)); ?>
                    <?php echo $form->error($model, 'address'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->textField($model, 'mobile', array('placeholder' => 'Điện thoại liên hệ', 'class' => 'form-control', 'size' => 45)); ?>
                    <?php echo $form->error($model, 'mobile'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->textField($model, 'email', array('placeholder' => Yii::t('web/full_home', 'email'), 'class' => 'form-control', 'size' => 45)); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->textArea($model, 'content', array('placeholder' => 'Nội dung câu hỏi', 'class' => 'form-control', 'rows' => 6, 'cols' => 47)); ?>
                    <?php echo $form->error($model, 'content'); ?>
                </div>
                <div class="form-group">
                    <?php //echo $form->labelEx($model, 'verifyCode', array('style' => 'color:#FFF')); 
                    ?>
                    <div>
                        <?php
                        // $this->widget(
                        //     'CCaptcha',
                        //     array(
                        //         'captchaAction'  => 'site/captcha?YII_CSRF_TOKEN=' . Yii::app()->request->csrfToken,
                        //         'buttonLabel'    => '',
                        //         'clickableImage' => TRUE, 'imageOptions' => array(
                        //             'id' => 'captchaimg'
                        //         )
                        //     )
                        // );
                        ?>
                        <?php //echo $form->textField($model, 'verifyCode', array('class' => 'span3 form-control verifyCode'));
                        ?>

                        <div class="input-group">
                            <?php //echo $form->error($model, 'verifyCode'); 
                            ?>
                        </div>
                    </div>
                </div>
                <br>

                <div class="form-group submit">
                    <?php echo CHtml::submitButton('Xác nhận thông tin', array('class' => 'btn btn-info')); ?>
                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
        <div class="space_30"></div>
    </div>
</div>