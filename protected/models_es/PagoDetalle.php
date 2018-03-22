<?php

/**
 * This is the model class for table "pago_detalle".
 *
 * The followings are the available columns in table 'pago_detalle':
 * @property integer $id_pago_detalle
 * @property integer $id_pago
 * @property integer $id_tipo_pago
 * @property integer $id_categoria
 * @property integer $id_competencia
 * @property integer $id_usuario
 * @property string $items
 * @property string $monto
 */
class PagoDetalle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pago_detalle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pago', 'required'),
			array('id_pago, id_inscripcion, id_tipo_pago, id_categoria, id_competencia, id_usuario, id_usuario_registro', 'numerical', 'integerOnly'=>true),
			array('items', 'length', 'max'=>250),
			array('monto', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pago_detalle, id_pago, id_tipo_pago, id_categoria, id_competencia, id_usuario, items, monto', 'safe', 'on'=>'search'),
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
                    'idInscripcion' => array(self::BELONGS_TO, 'Inscripcion', 'id_inscripcion'),
                    'idCategoria' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
                    'idPago' => array(self::BELONGS_TO, 'Pago', 'id_pago'),
                    'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
                    'idUsuarioRegistro' => array(self::BELONGS_TO, 'Usuario', 'id_usuario_registro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pago_detalle' => 'Id Pago Detalle',
			'id_pago' => 'Id Pago',
			'id_tipo_pago' => 'Id Tipo Pago',
                        'id_inscripcion' => 'Id Inscripcion',
			'id_categoria' => 'Id Categoria',
			'id_competencia' => 'Id Competencia',
			'id_usuario' => 'Id Usuario',
                        'id_usuario_registro'=> 'id_usuario_registro',
			'items' => 'Items',
			'monto' => 'Monto',
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

		$criteria->compare('id_pago_detalle',$this->id_pago_detalle);
		$criteria->compare('id_pago',$this->id_pago);
		$criteria->compare('id_tipo_pago',$this->id_tipo_pago);
		$criteria->compare('id_categoria',$this->id_categoria);
		$criteria->compare('id_competencia',$this->id_competencia);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('items',$this->items,true);
		$criteria->compare('monto',$this->monto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function participanteLista($tipo = NULL)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_pago_detalle',$this->id_pago_detalle);
		$criteria->compare('id_pago',$this->id_pago);
		$criteria->compare('id_tipo_pago',$this->id_tipo_pago);
		$criteria->compare('id_categoria',$this->id_categoria);
		$criteria->compare('id_competencia',$this->id_competencia);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('items',$this->items,true);
		$criteria->compare('monto',$this->monto,true);
//                $criteria->join = "LEFT JOIN Incripcion ON insccripcion.id_inscripcion = t.id_inscripcion";
//                if($tipo == 1){
//                    $criteria->addCondition('id_competencia is not null AND id_usuario ='.Yii::app()->user->id_usuario_sistema);
//                }else{
//                    $criteria->addCondition('id_categoria is not null AND id_usuario ='.Yii::app()->user->id_usuario_sistema);
//                }
                $criteria->addCondition('id_usuario ='.Yii::app()->user->id_usuario_sistema.' OR id_usuario_registro ='.Yii::app()->user->id_usuario_sistema);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PagoDetalle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
