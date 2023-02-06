<?php

/**
 * @var $this SurveyController
 * @var $model WSurvey
 * @var $list_question array
 * @var $modelForm WSurveyReport
 * @var $msg string
 * @var $require_login boolean
 * @var $return_home boolean
 */

$this->pageTitle = '';
?>

<div id="survey">

    <?php
    // echo $this->renderPartial('/survey/_block_banner')
    ?>

    <?php
    echo $this->renderPartial('/survey/_modal_complete', array(
        'msg' => $msg,
        'require_login' => $require_login,
        'return_home' => $return_home,
    ))
    ?>

    <a href="#" class="btn btn-lg btn-detail hidden" data-toggle="modal" data-target="#modal_survey_confirm">
        <?php echo CHtml::encode(Yii::t('web/portal', 'view')) ?>
    </a>
    <div class="container">
        <div id="survey_form_container" style='margin:200px 100px 100px 100px;'>
            <div id="survey_form">
                <div class="title">
                    <h2>
                        BẢN TRẮC NGHIỆM
                    </h2>
                </div>
                <div class="short_des">
                    <h3> Bạn biết gì về những điểm mới quan trọng trong Bộ luật Tố tụng hình sự năm 2015?
                    </h3>

                    BLTTHS năm 2015 đã đưa thêm nhiều quy định mới, mở rộng các yếu tố tranh tụng trong tố tụng hình sự của Việt Nam, bổ sung thêm nhiều quyền quan trọng cho người bào chữa và người bị buộc tội. Hãy cùng ôn lại các điểm mới này qua bài trắc nghiệm dưới đây!
                </div>
                <div class="content">
                    <?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                        'id' => 'wsurveyreport-form',
                        'method' => 'post',
                        // 'enableAjaxValidation' => true,
                        // 'enableClientValidation' => true,
                    )); ?>

                    <?php echo CHtml::hiddenField('WSurveyReport[survey_id]', $modelForm->survey_id) ?>

                    <?php echo CHtml::errorSummary($modelForm) ?>

                    <?php foreach ($list_question as $question) {
                        $view = '_item_question';
                        if (!empty($question->first_label) || !empty($question->last_label)) {
                            $view = '_item_question_level';
                        }
                        $this->renderPartial("/survey/$view", array(
                            'model' => $question,
                            'form' => $form,
                            'modelForm' => $modelForm,
                        ));
                    } ?>

                    <div class="action">
                        <?php echo CHtml::submitButton('Gửi đi', array(
                            'class'     => 'btn btn-lg btn-info',
                            'id'        => 'btnSubmitSurvey',
                        )) ?>
                    </div>

                    <?php $this->endWidget() ?>
                </div>


            </div>
        </div>
    </div>
</div>

<style>
    #survey_form {
        background: #fff;
        -moz-box-shadow: 0 0 10px 1px #888;
        -webkit-box-shadow: 0 0 10px 1px #888;
        box-shadow: 0 0 10px 2px #888;
        padding: 40px;
    }

    #survey_form .title h2 {
        font-size: 24px;
        color: black;
        text-transform: uppercase;
        text-align: center;
        margin: 0
    }

    #survey_form .short_des h3 {
        font-size: 20px;
        text-align: center;

    }

    #survey_form .short_des {
        font-style: italic;
        text-align: left;
        margin: 20px 0;

    }

    #survey_form .item_survey_question {
        margin-bottom: 20px
    }

    #survey_form .item_survey_question .question_content {
        font-size: 16px;
        color: black;
        margin-bottom: 5px;
        font-weight: bolder;
    }

    #survey_form .item_survey_answer td {
        padding-top: 0;
        padding-bottom: 8px
    }

    #survey_form .item_survey_answer td.answer_button {
        padding-left: 0
    }

    #survey_form .item_survey_answer td.answer_content {
        font-size: 14px
    }

    #survey_form .item_survey_answer td.answer_content p {
        margin: 0
    }

    #survey_form .item_survey_answer td.answer_content label {
        margin-bottom: unset;
        font-weight: unset;
        margin-right: 10px
    }

    .survey_input {
        border: none;
        outline: none;
        border-bottom: 1px solid #ccc;
        position: relative;
        font-size: 15px;
        padding: 2px;
        -moz-transition: all ease-in-out .4s;
        -webkit-transition: all ease-in-out .4s;
        transition: all ease-in-out .4s
    }

    .survey_input:focus {
        border-bottom: 1px solid #ed0977
    }

    .errorSummary {
        font-size: 15px;
        color: #ed0977;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        background-color: #dddddd1c;
        margin-bottom: 20px;
    }

    .errorSummary ul li {
        list-style: circle;
    }
</style>



<script>
    //     $(document).ready(function() {
    //         $('#survey_form input.flat').iCheck({
    //             checkboxClass: 'icheckbox_flat-blue',
    //             radioClass: 'iradio_flat-blue'
    //         });
    //     });
    // 
</script>