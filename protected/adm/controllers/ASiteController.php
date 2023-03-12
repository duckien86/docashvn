<?php

class ASiteController extends Controller
{
    public function init()
    {
        parent::init();
        $this->pageTitle = Yii::app()->params->project_name;
    }

    public function actionIndex()
    {
        if (Yii::app()->user->isGuest) {
            $this->redirect(array('/user/login'));
        } else {
            $this->render('index');
        }
    }

    public function actionResetData()
    {
        if (Yii::app()->user->super_admin) {

            AInstallment::model()->deleteAll();
            AInstallmentItems::model()->deleteAll();
            $criteria = new CDbCriteria();
            $criteria->condition = 'id > 1';
            ATransactions::model()->deleteAll($criteria);
        }
    }

    public function actions()
    {
        // return external action classes, e.g.:
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class'   => 'CaptchaExtendedAction',
                'density' => 10,
                'lines'   => 15
                //'backColor'=>0xFFFFFF,
            ),
        );
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
}
