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
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['AInstallment'])) {
            $model->attributes = $_POST['AInstallment'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
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
     * 1. Nếu là superadmin cần chọn đc cửa hàng để xem
     */
    public function actionAdmin()
    {
        $model = new AInstallment('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['AInstallment']))
            $model->attributes = $_GET['AInstallment'];

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
     * 3. Thêm chức năng thu tiền
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
            $installment->attributes = $_POST['AInstallment'];
            if (!Yii::app()->user->super_admin) { // set mã cửa hàng theo user đăng nhập
                $installment->shop_id = Yii::app()->user->shop_id;
            }
            $installment->create_date = date('Y-m-d H:i:s');
            $installment->create_by = Yii::app()->user->id;

            if ($installment->save()) {
                if ($installment->generateItems()) {
                    // thực hiện thêm giao dịch chi tiền
                    $transaction = new ATransactions;
                    if (!$transaction->outgoingPayment($installment->create_by, $installment->shop_id, $installment->customer_name, $installment->receive_money, 'Khách vay bát họ', 'installment_create', $installment->id)) {
                        $response['ok'] = false;
                        $response['error'] = CHtml::errorSummary($transaction);
                        $installment->cancel();
                    }
                } else { // Có lỗi trong quá trình 
                    $response['ok'] = false;
                    $response['error'] = 'Xảy ra lỗi trong quá trình tạo hợp đồng';
                }
                $response['data'] = $installment->attributes;
            } else {
                $response['ok'] = false;
                $response['error'] = CHtml::errorSummary($installment);
            }
        }
        echo CJSON::encode($response);
        Yii::app()->end();
    }

    /**
     * Ajax request
     * Khởi tạo dữ liệu form thanh toán 
     */
    public function actionInitPaymentForm()
    {
        $aryReturn = ['payment_modal_top' => null, 'payment_modal_body' => null,];
        $id = Yii::app()->request->getParam('id', false);
        $shopId = Yii::app()->request->getParam('shop_id', isset(Yii::app()->user->shop_id) ? Yii::app()->user->shop_id : false);
        if ($id && $shopId) {

            // Khai báo modal id
            $modalID = 'modal-installment-payment';

            $installment = AInstallment::loadContract($id, $shopId);
            if ($installment) {
                $aryReturn['payment_modal_top'] = $this->renderPartial('_payment_modal_top', array(
                    'installment' => $installment,
                    'modalID' => $modalID,
                ), true);
                $aryReturn['payment_modal_body'] = $this->renderPartial('_payment_modal_body', array(
                    'items' => $installment->items,
                    'modalID' => $modalID,
                ), true);
            }
        }

        echo CJSON::encode($aryReturn);
    }
}
