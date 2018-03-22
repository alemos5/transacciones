<?php

/**
 * This is the model class for table "franquiciado".
 *
 * The followings are the available columns in table 'franquiciado':
 * @property integer $id_franquiciado
 * @property integer $id_usuario_sistema
 * @property integer $id_competencia
 * @property integer $estatus
 */
class Franquiciado extends CActiveRecord
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
//                    'Franquiciado' => 'id_franquiciado',
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
		return 'franquiciado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario_sistema, id_competencia', 'required'),
			array('lider, validado, forma_pago, id_usuario_sistema, id_competencia, estatus', 'numerical', 'integerOnly'=>true),
                        array('porcentaje', 'length', 'max'=>10),
                        array('descripcion, img', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('lider, porcentaje, id_franquiciado, id_usuario_sistema, id_competencia, estatus', 'safe', 'on'=>'search'),
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
			'id_franquiciado' => __('Franchisee'),
			'id_usuario_sistema' => __('User'),
			'id_competencia' => __('Competition'),
			'estatus' => __('Status'),
            'porcentaje'=> __('Percentage'),
            'validado'=>__('Validated'),
            'forma_pago'=>__('Method of Payment'),
            'descripcion'=>__('Description'),
            'img'=>__('Image'),
            'lider' => __('Leader'),
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

		$criteria->compare('id_franquiciado',$this->id_franquiciado);
		$criteria->compare('id_usuario_sistema',$this->id_usuario_sistema);
		$criteria->compare('id_competencia',$this->id_competencia);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Franquiciado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
