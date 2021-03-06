<?php

class ReservaController extends Controller
{
	

	 
	// public $layout='//layouts/column2.php';
	
/*	public function accessRules()
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
*/
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
	public function actionCreate() {		
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Reserva'])) {
			$model = new Reserva;
			$model->attributes=$_POST['Reserva'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$reservas = $_POST['reservas'];
		foreach ($reservas as $i => $reserva) {
			$model = new Reserva;
			$model->espacoId   = $reserva['espacoId'];
			$model->dataInicio = $reserva['dataInicio'];
			$model->dataFim    = $reserva['dataInicio'];
			$model->usuarioId  = Yii::app()->user->id;

			$model->save();
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

		if(isset($_POST['Reserva']))
		{
			$model->attributes=$_POST['Reserva'];
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
	public function actionIndex() {
		$userId = Yii::app()->user->id;
		$today = date('Y-m-01');
		$end   = date('Y-m-t');
		$reservas = Yii::app()->db->createCommand()
					    ->select('usuarioId, dataInicio, dataFim, espacoId, espaco.nomeEspaco')
					    ->from('reserva')
					    ->join('espaco', 'reserva.espacoId = espaco.id')					    
					    ->queryAll();

		$espacos = Yii::app()->db->createCommand()
					    ->select('id, nomeEspaco')
					    ->from('espaco')
					    ->queryAll();

		$this->render('index',array(
			'reservas' => $reservas,
			'espacos'  => $espacos,
			'userId'   => $userId
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Reserva('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Reserva']))
			$model->attributes=$_GET['Reserva'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Reserva the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Reserva::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Reserva $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='reserva-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
