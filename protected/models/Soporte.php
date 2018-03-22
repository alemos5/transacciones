<?php

/**
 * This is the model class for table "soporte".
 *
 * The followings are the available columns in table 'soporte':
 * @property integer $id_soporte
 * @property string $enlace
 * @property string $soporte
 * @property integer $estatus
 */
class Soporte extends CActiveRecord
{
//    public function behaviors()
//    {
//        return array(
//            'AuditFieldBehavior' => array(
//                // Path to AuditFieldBehavior class.
//                'class' => 'application.modules.audit.components.AuditFieldBehavior',
//
//                // Set to false if you just want to use getDbAttribute and other methods in this class.
//                // If left unset the value will come from AuditModule::enableAuditField
//                'enableAuditField' => null,
//
//                // Any additional models you want to use to write model and model_id audits to.  If this array is not empty then
//                // each field modifed will result in an AuditField being created for each additionalAuditModels.
//                'additionalAuditModels' => array(
//                    'Soporte' => 'id_soporte',
//                ),
//
//                // Una lista de campos para ignorar en la actualización y eliminación
//                'ignoreFields' => array(
//                    'insert' => array('modified', 'modified_by', 'deleted', 'deleted_by'),
//                    'update' => array('created', 'created_by', 'modified'),
//                ),
//
//                // A list of values that will be treated as if they were null.
//                'ignoreValues' => array('0', '0.0', '0.00', '0.000', '0.0000', '0.00000', '0.000000', '0000-00-00', '0000-00-00 00:00:00'),
//            ),
//        );
//    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'soporte';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estatus', 'numerical', 'integerOnly'=>true),
			array('enlace, soporte', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_soporte, enlace, soporte, estatus', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_soporte' => 'Id Soporte',
			'enlace' => 'Enlace',
			'soporte' => 'Soporte',
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

		$criteria->compare('id_soporte',$this->id_soporte);
		$criteria->compare('enlace',$this->enlace,true);
		$criteria->compare('soporte',$this->soporte,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Soporte the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
