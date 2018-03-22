<?php

/**
 * This is the model class for table "item_calificacion".
 *
 * The followings are the available columns in table 'item_calificacion':
 * @property integer $id_item_calificacion
 * @property string $item_calificacion
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property CategoriaItemCalificacion[] $categoriaItemCalificacions
 */
class ItemCalificacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item_calificacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_calificacion', 'required'),
			array('estatus', 'numerical', 'integerOnly'=>true),
			array('item_calificacion', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_item_calificacion, item_calificacion, estatus', 'safe', 'on'=>'search'),
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
			'categoriaItemCalificacions' => array(self::HAS_MANY, 'CategoriaItemCalificacion', 'id_item_calificacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_item_calificacion' => __('Id Calification item'),
			'item_calificacion' => __('Item Calification item'),
			'estatus' => __('Status'),
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

		$criteria->compare('id_item_calificacion',$this->id_item_calificacion);
		$criteria->compare('item_calificacion',$this->item_calificacion,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemCalificacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
