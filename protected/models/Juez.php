<?php

/**
 * This is the model class for table "juez".
 *
 * The followings are the available columns in table 'juez':
 * @property integer $id_juez
 * @property integer $id_usuario_sistema
 * @property integer $id_competencia
 * @property string $fecha_registro
 * @property integer $estatus
 */
class Juez extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'juez';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario_sistema, id_competencia, fecha_registro', 'required'),
			array('id_usuario_sistema, id_competencia, estatus', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_juez, id_usuario_sistema, id_competencia, fecha_registro, estatus', 'safe', 'on'=>'search'),
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
                    'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario_sistema'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_juez' => 'Id Juez',
			'id_usuario_sistema' => 'Id Usuario Sistema',
			'id_competencia' => 'Id Competencia',
			'fecha_registro' => 'Fecha Registro',
			'estatus' => 'Estatus',
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

		$criteria->compare('id_juez',$this->id_juez);
		$criteria->compare('id_usuario_sistema',$this->id_usuario_sistema);
		$criteria->compare('id_competencia',$this->id_competencia);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Juez the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
