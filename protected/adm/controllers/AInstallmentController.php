<?php

class AInstallmentController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $defaultAction = 'admin';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'rights',
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return AInstallment the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = AInstallment::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param AInstallment $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ainstallment-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }


    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate()
    {
        $response = ['ok' => true, 'data' => null, 'error' => null];

        if (isset($_POST['AInstallment'])) {
            $installment_id = isset($_POST['AInstallment']['id']) ? $_POST['AInstallment']['id'] : false;
            $shop_id =  Yii::app()->user->shop_id;
            if ($installment_id && $shop_id) {
                // Khai b??o modal id
                $model = AInstallment::loadContract($installment_id, $shop_id, false, false);
                $model->attributes = $_POST['AInstallment'];
                $arrSafeUpdate = [
                    'customer_name', 'phone_number', 'address', 'personal_id', 'note'
                ];
                if (!$model->saveAttributes($arrSafeUpdate)) {
                    $response['ok'] = false;
                    $response['error'] = $model->getErrors();
                }
            }
        }

        echo CJSON::encode($response);
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('AInstallment');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     * TODO: 
     * 1. N???u l?? superadmin c???n ch???n ??c c???a h??ng ????? xem
     */
    public function actionAdmin()
    {
        $model = new AInstallment('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['AInstallment'])) {
            $model->attributes = $_GET['AInstallment'];
        }

        $this->render('admin', array(
            'model' => $model,
            'shop_id' => isset(Yii::app()->user->shop_id) ? Yii::app()->user->shop_id : null,
        ));
    }

    /**
     * Ajax request
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * TODO: 
     * 3. Th??m ch???c n??ng thu ti???n
     * 
     */
    public function actionCreate()
    {
        $response = ['ok' => true, 'data' => null, 'error' => null];
        $installment = new AInstallment;
        $installment->scenario = 'createNew';

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($installment);

        if (isset($_POST['AInstallment'])) {

            if (!$installment->createContract($_POST['AInstallment'], $errors)) {
                $response['ok'] = false;
                $response['error'] = $errors;
            }
        }
        echo CJSON::encode($response);
        Yii::app()->end();
    }

    /**
     * actionAppendContract
     *
     * @return void
     */
    public function actionAppendContract()
    {
        $response = ['ok' => true, 'data' => null, 'error' => null];

        if (isset($_POST['AInstallment'])) {
            $installment_id = isset($_POST['AInstallment']['id']) ? $_POST['AInstallment']['id'] : false;
            $shop_id =  Yii::app()->user->shop_id;
            if ($installment_id && $shop_id) {
                // Khai b??o modal id
                $model = AInstallment::loadContract($installment_id, $shop_id, false, false);
                $modelNew = new AInstallment();
                $modelNew->scenario = 'createNew';

                $modelNew->attributes = $model->attributes;
                $modelNew->total_money = $_POST['AInstallment']['total_money'];
                $modelNew->receive_money = $_POST['AInstallment']['receive_money'];
                $modelNew->loan_date = $_POST['AInstallment']['loan_date'];
                $modelNew->frequency = $_POST['AInstallment']['frequency'];
                $modelNew->start_date = $_POST['AInstallment']['start_date'];

                if ($modelNew->createContract($modelNew->attributes, $errors)) {
                    $model->closeContract();
                } else {
                    $response['ok'] = false;
                    $response['error'] = $errors;
                }
            }
        }

        echo CJSON::encode($response);
    }
    /**
     * Ajax request
     * Kh???i t???o d??? li???u form thanh to??n 
     */
    public function actionDoCloseContract()
    {
        $aryReturn = ['ok' => false, 'row_affected' => 0, 'errMsg' => ''];
        $installment_id = Yii::app()->request->getParam('installment_id', false);
        $shop_id =  Yii::app()->user->shop_id;
        $extra_money = Yii::app()->request->getParam('extra_money', 0);

        if ($installment_id && $shop_id) {
            // Khai b??o modal id
            $modalID = 'modal-installment-payment';

            $installment = AInstallment::loadContract($installment_id, $shop_id, true, false);
            if ($installment && $installment->status != $installment::STATUS_FINISH) {
                if ($installment->closeContract($extra_money)) {
                    $aryReturn['ok'] = true;
                    $aryReturn['errMsg'] = "???? ????ng h???p ?????ng M??:{$installment->id}- Kh??ch({$installment->customer_name})";
                } else {
                    $aryReturn['errMsg'] = "C?? l???i x???y ra ints:$installment_id|shop:$shop_id";
                }
            } else {
                $aryReturn['errMsg'] = "Kh??ng t??m th???y H?? ho???c ???? ????ng ints:$installment_id|shop:$shop_id";
            }
        } else {
            $aryReturn['errMsg'] = "Sai d??? li???u ?????u v??o ints:$installment_id|shop:$shop_id";
        }

        echo CJSON::encode($aryReturn);
    }

    /**
     * Ajax request
     * Kh???i t???o d??? li???u form thanh to??n 
     */
    public function actionInitPaymentForm()
    {
        $aryReturn = ['payment_modal_top' => null, 'payment_modal_body' => null,];
        $id = Yii::app()->request->getParam('id', false);
        $shopId = Yii::app()->request->getParam('shop_id', isset(Yii::app()->user->shop_id) ? Yii::app()->user->shop_id : false);
        if ($id && $shopId) {

            // Khai b??o modal id
            $modalID = 'modal-installment-payment';

            $installment = AInstallment::loadContract($id, $shopId);
            if ($installment) {
                $aryReturn['payment_modal_top'] = $this->renderPartial('_payment_modal_top', array(
                    'installment' => $installment,
                    'modalID' => $modalID,
                ), true);
                $aryReturn['payment_modal_body'] = $this->renderPartial('_payment_modal_body', array(
                    'items' => $installment->items,
                    'transHistory' => $installment->transHistory,
                    'installment' => $installment,
                    'modalID' => $modalID,
                ), true);
            }
        }

        echo CJSON::encode($aryReturn);
    }

    /**
     * Ajax request
     * Th???c hi???n thanh to??n tr??? ph??
     */
    public function actionDoPayment()
    {
        $aryReturn = ['ok' => false, 'row_affected' => 0, 'errMsg' => ''];
        $installment_id = Yii::app()->request->getParam('installment_id', false);
        $item_id = Yii::app()->request->getParam('item_id', false);
        $shop_id =  Yii::app()->user->shop_id;

        if ($installment_id && $item_id && $shop_id) {
            // Khai b??o modal id
            $modalID = 'modal-installment-payment';

            $installment = AInstallment::loadContract($installment_id, $shop_id, true, false);
            foreach ($installment->items as $item) {
                if ($item->id == $item_id) { // t??m t???i ng??y mu???n ????ng ti???n
                    if ($numOfItems = $item->doPayment($installment)) {
                        $aryReturn['ok'] = true;
                        $aryReturn['row_affected'] = $numOfItems;
                    }
                }
            }
        } else {
            $aryReturn['errMsg'] = "Invalid params ints:$installment_id|item:$item_id|shop:$shop_id";
        }

        echo CJSON::encode($aryReturn);
    }

    /**
     * Ajax request
     * Th???c hi???n nghi???p v??? ghi n??? ho???c tr??? n??? 
     */
    public function actionDoAddDebit()
    {
        $aryReturn = ['ok' => false, 'errMsg' => ''];
        $installment_id = Yii::app()->request->getParam('installment_id', false);
        $type = Yii::app()->request->getParam('type', 0);
        $debitAmount = Yii::app()->request->getParam('debit_amount', 0);
        $shop_id =  Yii::app()->user->shop_id;

        if ($installment_id && $shop_id && $type > 0) {
            $installment = AInstallment::loadContract($installment_id, $shop_id, false, false);
            if ($installment) {
                // $item = new AInstallmentItems();
                if ($installment->addDebit($debitAmount, $type)) {
                    $aryReturn['ok'] = true;
                } else {
                    $aryReturn['errMsg'] = "Transaction fail";
                }
            } else {
                $aryReturn['errMsg'] = "Not found installment:$installment_id";
            }
        } else {
            $aryReturn['errMsg'] = "Invalid params shop_id: $shop_id || " . CJSON::encode($_REQUEST);
        }

        echo CJSON::encode($aryReturn);
    }


    /**
     * Ajax request
     * Kh???i t???o d??? li???u form thanh to??n 
     */
    public function actionRenderTopSummary()
    {
        $aryReturn = ['content' => false];
        $shopId = Yii::app()->request->getParam('shop_id', isset(Yii::app()->user->shop_id) ? Yii::app()->user->shop_id : false);

        if ($shopId) {
            $aryReturn['content'] = $this->renderPartial('_top_summary', ['model' => new AInstallment(), 'shop_id' => $shopId], true);
        }

        echo CJSON::encode($aryReturn);
    }
    /**
     * Ajax request
     * Kh???i t???o d??? li???u form thanh to??n 
     */
    public function actionRenderUpdateForm()
    {
        $aryReturn = ['content' => false];
        $installmentId = Yii::app()->request->getParam('installment_id', false);
        $shopId = Yii::app()->request->getParam('shop_id', isset(Yii::app()->user->shop_id) ? Yii::app()->user->shop_id : false);
        $model = AInstallment::loadContract($installmentId, $shopId);
        $model->scenario = 'update';
        $model->prepareDisplayData(); // convert data to display on form

        if ($shopId) {
            $modalUpdateID = 'modal-update-contract';
            $aryReturn['content'] = $this->renderPartial(
                '_form_update',
                [
                    'model' => $model,
                    'modalID' => $modalUpdateID,
                    'action' => $this->createUrl('aInstallment/update'),
                ],
                true
            );
        }

        echo CJSON::encode($aryReturn);
    }
}
