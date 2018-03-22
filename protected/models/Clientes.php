<?php

/**
 * This is the model class for table "clientes".
 *
 * The followings are the available columns in table 'clientes':
 * @property integer $id_cliente
 * @property string $direccion_2
 * @property string $direccion_3
 * @property integer $id_pais
 * @property string $code_cliente
 * @property string $nombre
 * @property string $compania
 * @property string $direccion
 * @property string $pais
 * @property string $ciudad
 * @property string $estado
 * @property string $telefono
 * @property string $fax
 * @property string $password
 * @property string $email
 * @property string $ci
 * @property integer $suscripcion
 * @property string $servicio
 * @property string $promocion
 * @property string $publi
 * @property string $catologo
 * @property string $otro_catalogo
 * @property integer $correo
 * @property integer $pass_conf
 * @property string $fecha
 * @property string $estatus
 * @property integer $tarifa
 * @property integer $seguro
 * @property integer $bodega
 * @property integer $costo_consolidacion
 * @property integer $impuestos
 * @property integer $otros
 * @property string $referido
 * @property integer $id_cliente_padre
 * @property string $codigo_cliente_hijo
 */
class Clientes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, pais, ciudad, estado, telefono, fecha', 'required'),
			array('id_pais, suscripcion, correo, pass_conf, tarifa, seguro, bodega, costo_consolidacion, impuestos, otros, id_cliente_padre', 'numerical', 'integerOnly'=>true),
			array('code_cliente', 'length', 'max'=>10),
			array('nombre, compania, email', 'length', 'max'=>60),
			array('pais, estado, telefono, fax', 'length', 'max'=>40),
			array('ciudad, servicio, promocion, catologo, otro_catalogo', 'length', 'max'=>30),
			array('password', 'length', 'max'=>100),
			array('ci, publi', 'length', 'max'=>20),
			array('estatus', 'length', 'max'=>1),
			array('codigo_cliente_hijo', 'length', 'max'=>250),
			array('direccion_2, direccion_3, direccion, referido', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_cliente, direccion_2, direccion_3, id_pais, code_cliente, nombre, compania, direccion, pais, ciudad, estado, telefono, fax, password, email, ci, suscripcion, servicio, promocion, publi, catologo, otro_catalogo, correo, pass_conf, fecha, estatus, tarifa, seguro, bodega, costo_consolidacion, impuestos, otros, referido, id_cliente_padre, codigo_cliente_hijo', 'safe', 'on'=>'search'),
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
			'id_cliente' => 'Id Cliente',
			'direccion_2' => 'Direccion 2',
			'direccion_3' => 'Direccion 3',
			'id_pais' => 'Id Pais',
			'code_cliente' => 'Code Cliente',
			'nombre' => 'Nombre',
			'compania' => 'Compania',
			'direccion' => 'Direccion',
			'pais' => 'Pais',
			'ciudad' => 'Ciudad',
			'estado' => 'Estado',
			'telefono' => 'Telefono',
			'fax' => 'Fax',
			'password' => 'Password',
			'email' => 'Email',
			'ci' => 'Ci',
			'suscripcion' => 'Suscripcion',
			'servicio' => 'Servicio',
			'promocion' => 'Promocion',
			'publi' => 'Publi',
			'catologo' => 'Catologo',
			'otro_catalogo' => 'Otro Catalogo',
			'correo' => 'Correo',
			'pass_conf' => 'Pass Conf',
			'fecha' => 'Fecha',
			'estatus' => 'Estatus',
			'tarifa' => 'Tarifa',
			'seguro' => 'Seguro',
			'bodega' => 'Bodega',
			'costo_consolidacion' => 'Costo Consolidacion',
			'impuestos' => 'Impuestos',
			'otros' => 'Otros',
			'referido' => 'Referido',
			'id_cliente_padre' => 'Id Cliente Padre',
			'codigo_cliente_hijo' => 'Codigo Cliente Hijo',
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

		$criteria->compare('id_cliente',$this->id_cliente);
		$criteria->compare('direccion_2',$this->direccion_2,true);
		$criteria->compare('direccion_3',$this->direccion_3,true);
		$criteria->compare('id_pais',$this->id_pais);
		$criteria->compare('code_cliente',$this->code_cliente,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('compania',$this->compania,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('pais',$this->pais,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('ci',$this->ci,true);
		$criteria->compare('suscripcion',$this->suscripcion);
		$criteria->compare('servicio',$this->servicio,true);
		$criteria->compare('promocion',$this->promocion,true);
		$criteria->compare('publi',$this->publi,true);
		$criteria->compare('catologo',$this->catologo,true);
		$criteria->compare('otro_catalogo',$this->otro_catalogo,true);
		$criteria->compare('correo',$this->correo);
		$criteria->compare('pass_conf',$this->pass_conf);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('estatus',$this->estatus,true);
		$criteria->compare('tarifa',$this->tarifa);
		$criteria->compare('seguro',$this->seguro);
		$criteria->compare('bodega',$this->bodega);
		$criteria->compare('costo_consolidacion',$this->costo_consolidacion);
		$criteria->compare('impuestos',$this->impuestos);
		$criteria->compare('otros',$this->otros);
		$criteria->compare('referido',$this->referido,true);
		$criteria->compare('id_cliente_padre',$this->id_cliente_padre);
		$criteria->compare('codigo_cliente_hijo',$this->codigo_cliente_hijo,true);
		if(Yii::app()->user->id_perfil_sistema=='1' || Yii::app()->user->id_perfil_sistema=='7'){

        }else{
            $criteria->addCondition('id_cliente_padre ='.Yii::app()->user->id_usuario_sistema);
        }

                return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Clientes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
