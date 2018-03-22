<?php

/**
 * This is the model class for table "perfil_menu".
 *
 * The followings are the available columns in table 'perfil_menu':
 * @property integer $id_perfil_sistema
 * @property integer $id_menu_sistema
 * @property integer $crear
 * @property integer $modificar
 * @property integer $consultar
 * @property integer $eliminar
 * @property integer $imprimir
 */
class PerfilMenu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'perfil_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_perfil_sistema, id_menu_sistema', 'required'),
			array('id_perfil_sistema, id_menu_sistema, crear, modificar, consultar, eliminar, imprimir', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_perfil_sistema, id_menu_sistema, crear, modificar, consultar, eliminar, imprimir', 'safe', 'on'=>'search'),
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
			'menu'=>array(self::BELONGS_TO, 'Menu', 'id_menu_sistema'),
			'perfil'=>array(self::BELONGS_TO, 'Perfil', 'id_perfil_sistema'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_perfil_sistema' => __('System Profile'),
			'id_menu_sistema' => __('System menu'),
			'crear' => __('Create'),
			'modificar' => __('Edit'),
			'consultar' => __('Search'),
			'eliminar' => __('Delete'),
			'imprimir' => __('Print'),
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

		$criteria->compare('id_perfil_sistema',$this->id_perfil_sistema);
		$criteria->compare('id_menu_sistema',$this->id_menu_sistema);
		$criteria->compare('crear',$this->crear);
		$criteria->compare('modificar',$this->modificar);
		$criteria->compare('consultar',$this->consultar);
		$criteria->compare('eliminar',$this->eliminar);
		$criteria->compare('imprimir',$this->imprimir);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PerfilMenu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
