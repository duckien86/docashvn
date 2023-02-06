<?php
/* @var $this SiteController */

?>

<div class="container">
    <div class="course">
        <?php $this->widget('booster.widgets.TbAlert'); ?>
        <div class="space_40"></div>
        <div class="xs_space_20"></div>
        <div class="col-md-6 col-xs-12">
            <p style="font-size: 20px;">Điền thông tin khảo sát </p>
            <p style="font-size: 14px; color:red">(Cần phải khai báo trước khi thực hiện khảo sát)</p>
            <div class="form">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id'                   => 'contact-form',
                    'action'               => Yii::app()->controller->createAbsoluteUrl("site/interactive"),
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
                    <?php echo $form->error($model, 'company'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->textField($model, 'email', array('placeholder' => Yii::t('web/full_home', 'email'), 'class' => 'form-control', 'size' => 45)); ?>
                    <?php echo $form->error($model, 'email'); ?>
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
                            <?php echo $form->error($model, 'verifyCode'); ?>
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
        <div class="space_60"></div>
    </div>
</div>