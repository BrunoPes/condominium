<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$post = $_POST;
		$order = "";
		$userId = Yii::app()->user->id;
		$userType = Yii::app()->user->userType;

		if($userType == 2) {
			Yii::app()->request->redirect(Yii::app()->createUrl('pedidoservico/index'));
		}

		if($post != NULL && !empty($post)) {
			$order = $_POST["order"];
			$order = $order == "orderId" ? "reserva.id" : ($order == "orderSpace" ? "nomeEspaco" : "dataInicio");
			$order = $order . " DESC";
		} else {
			$order = "reserva.id DESC";
		}

		$reclamacoes = Reclamacao::model()->findAll(array("order" => "id DESC",
														"condition" => "usuarioId = :id",
														"params" => array(":id" => $userId)));
		$reservas = Yii::app()->db->createCommand()
					->SELECT("reserva.id, reserva.dataInicio, espaco.nomeEspaco")
					->FROM("reserva")
					->JOIN("espaco", "espaco.id = reserva.espacoId")
					->WHERE("reserva.usuarioId = :id", array(":id" => $userId))
					->ORDER($order)
					->queryAll();

		if($post != NULL && !empty($post) > 0) {
			$this->renderPartial("tableReservas", array("reservas" => $reservas));
		} else {
			$this->render('index', array(
				"reclamacoes" => $reclamacoes,
				"reservas" => $reservas,
			));
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout = "main_login";
		$model=new LoginForm;

		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->login())
				$this->redirect(Yii::app()->createUrl('site/index'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		// $this->layout = "/../views/layouts/main_login.php";
		Yii::app()->user->logout();
		$this->redirect(['site/login']);
	}
}
