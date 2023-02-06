<?php

/**
 * @var $this SurveyController
 * @var $msg string
 * @var $require_login boolean
 * @var $return_home boolean
 */
?>

<?php $this->beginWidget(
    'booster.widgets.TbModal',
    array(
        'id' => 'modal_survey_complete',
        // 'autoOpen' => true,
    )
); ?>
<div class="modal-body">
    <a class="close" data-dismiss="modal">&times;</a>
    <img style="height: 300px;" src="<?php echo Yii::app()->theme->baseUrl ?>/images/popup_survey_complete.png">

    <div id="modal_survey_complete_title" class="modal_survey_complete_content">
        <div><b><?php echo $msg; ?></b></div>
    </div>

    <div id="modal_survey_complete_content_1" class="modal_survey_complete_content">
        <?php
        if (!empty($msg)) {

            echo 'Tìm hiểu thêm về nguyên tắc tranh tụng theo BLTTHS năm 2015 ' . CHtml::link('tại đây', 'http://leres.vn/an-pham/35');
        } else {
            echo CHtml::encode(Yii::t('web/portal', 'survey_require_login'));
        }
        ?>
    </div>

    <?php if ($require_login) { ?>

        <div id="modal_survey_complete_content_2" class="modal_survey_complete_content">
            <?php echo CHtml::encode(Yii::t('web/portal', 'survey_require_login_note')); ?>
        </div>

        <?php
        $return_url = "?return_url=" . Yii::app()->request->hostInfo . Yii::app()->request->url;
        $url_login = $GLOBALS['config_common']['domain_sso']['sso'] . $GLOBALS['config_common']['domain_sso']['pid'] . $return_url;
        $url_register = str_replace('login', 'register', $url_login);
        ?>

        <a id="btnSurveyLogin" href="<?php echo $url_login; ?>" class="btn btn-lg"><?php echo CHtml::encode(Yii::t('web/portal', 'login')) ?></a>
        <a id="btnSurveyRegister" href="<?php echo $url_register; ?>" class="btn btn-lg"><?php echo CHtml::encode(Yii::t('web/portal', 'register')) ?></a>
    <?php } ?>

</div>
<?php $this->endWidget(); ?>

<?php if (!empty($msg)) { ?>
    <script>
        $(document).ready(function() {
            $('#modal_survey_complete').modal('show');

            <?php if ($return_home) { ?>
                $('#modal_survey_complete').on('hidden.bs.modal', function() {
                    window.location.href = "<?php echo Yii::app()->createAbsoluteUrl('site/index') ?>"
                });
            <?php } ?>

        });
    </script>
<?php } ?>