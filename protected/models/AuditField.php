<?php

/**
 * This is the model class for table "audit_field".
 *
 * The followings are the available columns in table 'audit_field':
 * @property integer $id
 * @property integer $audit_request_id
 * @property integer $user_id
 * @property string $old_value
 * @property string $new_value
 * @property string $action
 * @property string $model_name
 * @property string $model_id
 * @property string $field
 * @property integer $created
 *
 * The followings are the available model relations:
 * @property UsuarioSistema $user
 */
class AuditField extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'audit_field';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('audit_request_id, user_id, created', 'numerical', 'integerOnly'=>true),
			array('action', 'length', 'max'=>20),
			array('model_name', 'length', 'max'=>255),
			array('model_id, field', 'length', 'max'=>64),
			array('old_value, new_value, register', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, audit_request_id, user_id, old_value, new_value, action, model_name, model_id, field, created, register', 'safe', 'on'=>'search'),
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
            //'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'audit_request_id' => 'Audit Request',
			'user_id' => 'User',
			'old_value' => 'Old Value',
			'new_value' => 'New Value',
			'action' => 'Action',
			'model_name' => 'Model Name',
			'model_id' => 'Model',
			'field' => 'Field',
			'created' => 'Created',
			'register' => 'Register',
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
		$criteria->compare('audit_request_id',$this->audit_request_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('old_value',$this->old_value,true);
		$criteria->compare('new_value',$this->new_value,false);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('model_name',$this->model_name,true);
		$criteria->compare('model_id',$this->model_id,true);
		$criteria->compare('field',$this->field,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('register',$this->register,false);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AuditField the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
