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
			array('id_tipo_pago, id_pago_estatus, id_copetencia, id_categoria, id_usuario, id_usuario_pagador, id_forma_pago', 'numerical', 'integerOnly'=>true),
			array('costo_pagar,  id_inscripcion, costo_pagado', 'length', 'max'=>10),
			array('referencia, fecha_pago, fecha_pagado', 'length', 'max'=>250),
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
			'id_pago' => 'Id Pago',
			'id_tipo_pago' => 'Id Tipo Pago',
			'id_copetencia' => 'Id Copetencia',
			'id_categoria' => 'Id Categoria',
			'id_usuario' => 'Id Usuario',
			'id_usuario_pagador' => 'Id Usuario Pagador',
			'costo_pagar' => 'Costo Pagar',
			'costo_pagado' => 'Costo Pagado',
			'id_forma_pago' => 'Id Forma Pago',
			'referencia' => 'Referencia',
			'img' => 'Img',
			'descripcion' => 'Descripcion',
                        'fecha_pago' => 'Fecha de Pago',
                        'id_pago_estatus'=>'Estatus del pago',
                        'id_inscripcion'=>'Inscripción',
                        'fecha_pagado'=>'Fecha de pago'
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
