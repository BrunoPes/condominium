<?php

/**
 * This is the model class for table "reserva".
 *
 * The followings are the available columns in table 'reserva':
 * @property integer $id
 * @property string $dataInicio
 * @property string $dataFim
 * @property integer $usuarioId
 * @property integer $espacoId
 */
class Reserva extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reserva';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dataInicio, dataFim, usuarioId, espacoId', 'required'),
			array('usuarioId, espacoId', 'numerical', 'integerOnly'=>true),
			array('espacoId', 'checkReserve', 'on' => 'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, dataInicio, dataFim, usuarioId, espacoId', 'safe', 'on'=>'search'),
		);
	}

	public function checkReserve() {
		$id = (int) $this->espacoId;
		$dt = $this->dataInicio;
		$query = Reserva::model()->findAllByAttributes(array("espacoId" => $id, "dataInicio" => $dt));
		if(sizeof($query) >= 1) {
			$this->addError('espacoId','Espaço já reservado.');
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'dataInicio' => 'Data Inicio',
			'dataFim' => 'Data Fim',
			'usuarioId' => 'Usuario',
			'espacoId' => 'Espaco',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('dataInicio',$this->dataInicio,true);
		$criteria->compare('dataFim',$this->dataFim,true);
		$criteria->compare('usuarioId',$this->usuarioId);
		$criteria->compare('espacoId',$this->espacoId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reserva the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
