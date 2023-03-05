<?php

class LoginController extends Controller
{
	public $defaultAction = 'login';

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if (Yii::app()->user->isGuest) {
			$model = new UserLogin;
			// collect user input data
			if (isset($_POST['UserLogin'])) {
				$model->attributes = $_POST['UserLogin'];
				// validate user input and redirect to previous page if valid
				if ($model->validate()) {
					// set lại các thông tin liên quan đến user đăng nhập
					$user = AUsers::model()->findByAttributes(array('username' => $model->username));
					Yii::app()->user->setState('shop_id', $user->shop_id);
					Yii::app()->user->setState('super_admin', $user->superuser);
					$this->lastViset();
					$this->redirect(Yii::app()->defaultController);

					// if (strpos(Yii::app()->user->returnUrl, '/index.php') !== false)
					// $this->redirect(Yii::app()->controller->module->returnUrl);
					// else
					// 	$this->redirect(Yii::app()->user->returnUrl);
				}
			}

			$this->layout = '//layouts/login';

			// display the login form
			$this->render('/user/login', array('model' => $model));
		} else
			$this->redirect(Yii::app()->controller->module->returnUrl);
	}

	private function lastViset()
	{
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit = time();
		$lastVisit->save();
	}
}
