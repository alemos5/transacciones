<?php

/**
 * This is the model class for table "pago".
 *
 * The followings are the available columns in table 'pago':
 * @property integer $id_pago
 * @property integer $id_tipo_pago
 * @property integer $id_copetencia
 * @property integer $id_categoria
 * @property integer $id_usuario
 * @property integer $id_usuario_pagador
 * @property string $costo_pagar
 * @property string $costo_pagado
 * @property integer $id_forma_pago
 * @property string $referencia
 * @property string $img
 * @property string $descripcion
 */
class Pago extends CActiveRecord
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
//                    'Pago' => 'id_pago',
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
		return 'pago';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('acreditado, id_tipo_pago, id_pago_estatus, id_copetencia, id_categoria, id_usuario, id_usuario_pagador, id_forma_pago', 'numerical', 'integerOnly'=>true),
			array('id_usuario_registro, costo_pagar,  id_inscripcion, costo_pagado', 'length', 'max'=>10),
			array('qr, referencia, fecha_pago, ip_registro, fecha_registro,  fecha_pagado', 'length', 'max'=>250),
			array('img, descripcion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pago, id_inscripcion, id_tipo_pago, id_copetencia, id_categoria, id_usuario, id_usuario_pagador, costo_pagar, costo_pagado, id_forma_pago, referencia, img, descripcion', 'safe', 'on'=>'search'),
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
                    'idTipoPago' => array(self::BELONGS_TO, 'TipoPago', 'id_tipo_pago'),
                    'idCompetencia' => array(self::BELONGS_TO, 'Competencia', 'id_copetencia'),
                    'idCategoria' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
                    'idInscripcion' => array(self::BELONGS_TO, 'Inscripcion', 'id_inscripcion'),
                    'idPagoEstatus' => array(self::BELONGS_TO, 'PagoEstatus', 'id_pago_estatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pago' => 'Payment ID',
			'id_tipo_pago' => 'Payment type ID',
			'id_copetencia' => 'Competence ID',
			'id_categoria' => 'Category ID',
			'id_usuario' => 'User ID',
			'id_usuario_pagador' => 'Paying User Id',
			'costo_pagar' => 'Amount to pay',
			'costo_pagado' => 'Amount paid',
			'id_forma_pago' => 'Payment method ID',
			'referencia' => 'Reference',
			'img' => 'Img',
			'descripcion' => 'Description',
                        'fecha_pago' => 'Payment date',
                        'id_pago_estatus'=>'Payment status',
                        'id_inscripcion'=>'Subscription',
                        'acreditado'=>'Acreditado',
                        'qr'=>'QR',
                        'fecha_pagado'=>'Payment date',
                        'id_usuario_registro' => 'Id usuario registro',
                        'ip_registro' => 'IP registro',
                        'fecha_registro' => 'Fecha registro'
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

		$criteria->compare('id_pago',$this->id_pago);
		$criteria->compare('id_tipo_pago',$this->id_tipo_pago);
		$criteria->compare('id_copetencia',$this->id_copetencia);
		$criteria->compare('id_categoria',$this->id_categoria);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_usuario_pagador',$this->id_usuario_pagador);
		$criteria->compare('costo_pagar',$this->costo_pagar,true);
		$criteria->compare('costo_pagado',$this->costo_pagado,true);
		$criteria->compare('id_forma_pago',$this->id_forma_pago);
		$criteria->compare('referencia',$this->referencia,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('id_inscripcion',$this->id_inscripcion,true);
                $criteria->addCondition('id_usuario ='.Yii::app()->user->id_usuario_sistema.' OR id_usuario_pagador ='.Yii::app()->user->id_usuario_sistema);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pago the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
