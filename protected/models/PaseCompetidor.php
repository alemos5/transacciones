<?php

/**
 * This is the model class for table "pase_competidor".
 *
 * The followings are the available columns in table 'pase_competidor':
 * @property integer $id_pase_competidor
 * @property string $fecha_pase
 * @property string $valor
 * @property integer $id_competencia
 *
 * The followings are the available model relations:
 * @property Competencia $idCompetencia
 */
class PaseCompetidor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pase_competidor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_pase, id_competencia', 'required'),
			array('id_competencia, anio, mes, dia,', 'numerical', 'integerOnly'=>true),
			array('valor', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pase_competidor, fecha_pase, valor, id_competencia', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idCompetencia' => array(self::BELONGS_TO, 'Competencia', 'id_competencia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pase_competidor' => 'Id Competitor pass',
			'fecha_pase' => 'Pass data',
			'valor' => 'Value',
			'id_competencia' => 'Id Competenc',
			'dia' => 'Day',
			'mes' => 'Month',
			'Anio' => 'Year',
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

		$criteria->compare('id_pase_competidor',$this->id_pase_competidor);
		$criteria->compare('fecha_pase',$this->fecha_pase,true);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('id_competencia',$this->id_competencia);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PaseCompetidor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
