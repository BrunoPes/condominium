<?php

class PedidoservicoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	// public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pedidoservico;
		$get = $_GET;

		if($get != NULL && !empty($get["id"])) {
			$id = $get["id"];
			$servico = Yii::app()->db->createCommand()
					->SELECT("servico.id, nomeServico as serv, preco, usuarioId, usuario.name, usuario.email, usuario.telefone")
					->FROM("servico")
					->JOIN("usuario", "usuario.id = usuarioId")
					->WHERE("servico.id = :id", array(":id" => $id))
					->ORDER("usuario.name ASC")
					->queryRow();
		}

		if(isset($_POST['Pedidoservico']))
		{
			$model->attributes=$_POST['Pedidoservico'];
			$model->mensagem = $_POST['Pedidoservico']['mensagem'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		if($id == null || empty($id)){
			$this->render('create',array(
				'model'=>$model,
			));
		} else {
			$this->render('create',array(
				'model'=>$model,
				'servico'=>$servico
			));
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pedidoservico']))
		{
			$model->attributes=$_POST['Pedidoservico'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
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
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$post = $_POST;

		if($post != NULL && !empty($post) && sizeof($post) >= 1) {
			$id = $post["id"];
			$flag = $post["action"];

			$pedidoServ = Pedidoservico::model()->find('id = :id', array(":id" => $id));
			$pedidoServ->flagAceito = $flag;
			$pedidoServ->update();
			return true;
		}

		$presUserId = Yii::app()->user->id;
		$pedidos = Yii::app()->db->createCommand()
						->SELECT("ps.id, mensagem, dataServico, flagAceito, u.id as userId, u.name")
						->FROM("pedidoservico as ps")
						->JOIN("usuario u", "u.id = ps.usuarioId")
						->WHERE("ps.prestadorId = :id", array(":id" => $presUserId))
						->ORDER("dataServico DESC")
						->queryAll();

		$this->render('index', array(
			'pedidos' => $pedidos
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pedidoservico('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pedidoservico']))
			$model->attributes=$_GET['Pedidoservico'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pedidoservico the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pedidoservico::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pedidoservico $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pedidoservico-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
