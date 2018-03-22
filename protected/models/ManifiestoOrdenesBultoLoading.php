<?php

/**
 * This is the model class for table "manifiesto_ordenes_bulto_loading".
 *
 * The followings are the available columns in table 'manifiesto_ordenes_bulto_loading':
 * @property integer $id_manifiesto
 * @property integer $id_orden
 * @property integer $id_tipo
 * @property integer $id_bulto
 * @property integer $id_con
 * @property integer $id_loading
 * @property integer $datos_extra
 */
class ManifiestoOrdenesBultoLoading extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '`manifiesto-ordenes-bulto-loading`';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_manifiesto, id_orden, id_tipo', 'required'),
			array('id_manifiesto, id_orden, id_tipo, id_bulto, id_con, id_loading', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_manifiesto, id_orden, id_tipo, id_bulto, id_con, id_loading, datos_extra', 'safe', 'on'=>'search'),
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
                    'idOrden' => array(self::BELONGS_TO, 'Ordenes', 'id_orden'),
                    'idConsolidacion' => array(self::BELONGS_TO, 'Consolidaciones', 'id_con'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_manifiesto' => 'Id Manifiesto',
			'id_orden' => 'Id Orden',
			'id_tipo' => 'Id Tipo',
			'id_bulto' => 'Id Bulto',
			'id_con' => 'Id Con',
			'id_loading' => 'Id Loading',
			'datos_extra' => 'Datos Extra',
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

		$criteria->compare('id_manifiesto',$this->id_manifiesto);
		$criteria->compare('id_orden',$this->id_orden);
		$criteria->compare('id_tipo',$this->id_tipo);
		$criteria->compare('id_bulto',$this->id_bulto);
		$criteria->compare('id_con',$this->id_con);
		$criteria->compare('id_loading',$this->id_loading);
		$criteria->compare('datos_extra',$this->datos_extra);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ManifiestoOrdenesBultoLoading the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
