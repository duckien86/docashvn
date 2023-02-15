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
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * TODO: 
     * 1. Lấy dữ liệu của shop
     * 2. Lấy dữ liệu người xử lý bát họ
     * 3. Thêm chức năng thu tiền
     * 4. Khi tạo mới 1 hợp đồng cần kiểm tra có đủ tiền hay không?
     * 
     */
    public function actionCreate()
    {
        $response = ['ok' => true, 'data' => null, 'error' => null];
        $installment = new AInstallment;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($installment);

        if (isset($_POST['AInstallment'])) {
            $installment->attributes = $_POST['AInstallment'];
            $installment->total_money = str_replace('.', '', $installment->total_money);
            $installment->receive_money = str_replace('.', '', $installment->receive_money);
            $installment->start_date =  Utils::converstDate('d/m/Y', 'Y-m-d', $installment->start_date);
            if (!Yii::app()->user->super_admin) { // set mã cửa hàng theo user đăng nhập
                $installment->shop_id = Yii::app()->user->shop_id;
            }
            $installment->create_date = date('Y-m-d H:i:s');
            $installment->create_by = Yii::app()->user->id;

            if ($installment->save()) {
                if (!$installment->generateItems()) { // Có lỗi trong quá trình 
                    $response['ok'] = false;
                    $response['error'] = 'Xảy ra lỗi trong quá trình tạo hợp đồng';
                    $installment->delete();
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
     */
    public function actionAdmin()
    {
        $model = new AInstallment('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['AInstallment']))
            $model->attributes = $_GET['AInstallment'];

        $this->render('admin', array(
            'model' => $model,
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
}
