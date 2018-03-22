<?php

/**
 * This is the model class for table "ordenes_cliente".
 *
 * The followings are the available columns in table 'ordenes_cliente':
 * @property integer $id_orden_cli
 * @property integer $id_cli
 * @property string $nu_orden
 * @property string $tienda
 * @property string $descripcion
 * @property string $doc
 * @property double $valor
 * @property string $tracking
 * @property string $courier
 * @property string $fecha
 * @property string $observacion
 */
class OrdenesCliente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ordenes_cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nu_orden, descripcion, doc, valor, fecha', 'required'),
			array('id_cli', 'numerical', 'integerOnly'=>true),
			array('valor', 'numerical'),
			array('nu_orden', 'length', 'max'=>15),
			array('tienda', 'length', 'max'=>100),
			array('descripcion', 'length', 'max'=>255),
			array('doc, tracking', 'length', 'max'=>60),
			array('courier', 'length', 'max'=>30),
			array('observacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_orden_cli, id_cli, nu_orden, tienda, descripcion, doc, valor, tracking, courier, fecha, observacion', 'safe', 'on'=>'search'),
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
			'id_orden_cli' => 'Id Orden Cli',
			'id_cli' => 'Id Cli',
			'nu_orden' => 'Nu Orden',
			'tienda' => 'Tienda',
			'descripcion' => 'Descripcion',
			'doc' => 'Doc',
			'valor' => 'Valor',
			'tracking' => 'Tracking',
			'courier' => 'Courier',
			'fecha' => 'Fecha',
			'observacion' => 'Observacion',
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

		$criteria->compare('id_orden_cli',$this->id_orden_cli);
		$criteria->compare('id_cli',$this->id_cli);
		$criteria->compare('nu_orden',$this->nu_orden,true);
		$criteria->compare('tienda',$this->tienda,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('doc',$this->doc,true);
		$criteria->compare('valor',$this->valor);
		$criteria->compare('tracking',$this->tracking,true);
		$criteria->compare('courier',$this->courier,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('observacion',$this->observacion,true);
                if(Yii::app()->user->id_perfil_sistema!='1'){
                    $criteria->addCondition('id_cli ='.Yii::app()->user->id_cliente);
                }
                $criteria->order = 'id_orden_cli DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrdenesCliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
