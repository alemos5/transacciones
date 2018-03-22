<?php

/**
 * This is the model class for table "juez_item_calificacion".
 *
 * The followings are the available columns in table 'juez_item_calificacion':
 * @property integer $id_juez_item_calificacion
 * @property integer $id_juez
 * @property integer $id_item_calificacion
 */
class JuezItemCalificacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'juez_item_calificacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_juez, id_item_calificacion', 'required'),
			array('id_juez, id_item_calificacion', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_juez_item_calificacion, id_juez, id_item_calificacion', 'safe', 'on'=>'search'),
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
                    'idItems' => array(self::BELONGS_TO, 'ItemCalificacion', 'id_item_calificacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_juez_item_calificacion' => 'Id Juez Item Calificacion',
			'id_juez' => 'Id Juez',
			'id_item_calificacion' => 'Id Item Calificacion',
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

		$criteria->compare('id_juez_item_calificacion',$this->id_juez_item_calificacion);
		$criteria->compare('id_juez',$this->id_juez);
		$criteria->compare('id_item_calificacion',$this->id_item_calificacion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return JuezItemCalificacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
