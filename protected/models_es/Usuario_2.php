<?php

/**
 * This is the model class for table "usuario_sistema".
 *
 * The followings are the available columns in table 'usuario_sistema':
 * @property integer $id_usuario_sistema
 * @property integer $tipo_documento
 * @property string $cedula
 * @property string $rif
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $fecha_nacimiento
 * @property string $sexo
 * @property string $observacion_personal
 * @property integer $a_r
 * @property integer $n_j
 * @property string $razon_social
 * @property string $tlf_habitacion
 * @property string $tlf_personal
 * @property string $tlf_personal2
 * @property string $correo
 * @property string $correo2
 * @property integer $autorizacion
 * @property string $img
 * @property string $usuario
 * @property string $contrasena
 * @property integer $id_perfil_sistema
 * @property string $fecha_registro
 * @property integer $estatus
 * @property integer $estatus_contrasena
 * @property string $direccion_ip
 * @property integer $id_registrador
 * @property integer $id_sociedad
 *
 * The followings are the available model relations:
 * @property UsuarioAutorizado[] $usuarioAutorizados
 * @property Transaccion[] $transaccions
 * @property UsuarioEstatuHistorico[] $usuarioEstatuHistoricos
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario_sistema';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
//		return array(
//			array('cedula,  rif, primer_nombre, latitud, longitud, primer_apellido, sexo, razon_social, tlf_habitacion, tlf_personal, tlf_personal2, correo, correo2, img, usuario, contrasena, fecha_registro, direccion_ip, id_registrador, id_sociedad', 'required'),
//			array('tipo_documento, a_r, n_j, autorizacion, id_perfil_sistema, estatus, estatus_contrasena, id_registrador, id_sociedad', 'numerical', 'integerOnly'=>true),
//			array('cedula', 'length', 'max'=>15),
//			array('primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, direccion_ip', 'length', 'max'=>20),
//			array('sexo', 'length', 'max'=>1),
//			array('observacion_personal,  contrasena, latitud, longitud', 'length', 'max'=>200),
//			array('razon_social, tlf_habitacion, tlf_personal, tlf_personal2, correo, correo2, img', 'length', 'max'=>250),
//			array('usuario', 'length', 'max'=>50),
//			array('fecha_nacimiento', 'safe'),
//                        array('cedula, usuario', 'unique'),
//			// The following rule is used by search().
//			// @todo Please remove those attributes that should not be searched.
//			array('id_usuario_sistema, latitud, longitud, tipo_documento, cedula, rif, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, sexo, observacion_personal, a_r, n_j, razon_social, tlf_habitacion, tlf_personal, tlf_personal2, correo, correo2, autorizacion, img, usuario, contrasena, id_perfil_sistema, fecha_registro, estatus, estatus_contrasena, direccion_ip, id_registrador, id_sociedad', 'safe', 'on'=>'search'),
//		);
                return array(
			array('primer_nombre, cedula, tipo_documento, correo, primer_apellido, contrasena', 'required'),
			array('tipo_documento, a_r, n_j, autorizacion, id_perfil_sistema, estatus, estatus_contrasena, id_registrador, id_sociedad', 'numerical', 'integerOnly'=>true),
			array('cedula', 'length', 'max'=>15),
			array('primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, direccion_ip', 'length', 'max'=>20),
			array('sexo', 'length', 'max'=>1),
			array('observacion_personal, contrasena', 'length', 'max'=>200),
			array('razon_social, tlf_habitacion, tlf_personal, tlf_personal2, correo, correo2, img', 'length', 'max'=>250),
			array('usuario', 'length', 'max'=>50),
			array('rif, fecha_registro, latitud, longitud', 'safe'),
                        array('fecha_nacimiento', 'date', 'format'=>'dd-MM-yyyy'),
                        //array('fecha_nacimiento', 'match', 'pattern'=>'/^\d{1,2}-\d{1,2}-\d{4}/', 'message'=>'Formato invalido. Ejemplo: 01-02-2015'),
                        array('fecha_nacimiento', 'validateDate'),
                        array('cedula', 'unique', 'message'=>'Cedula ya creada.'),
                        array('usuario', 'unique', 'message'=>'Usuario anteriormente creado'),
                        array('correo', 'unique', 'message'=>'Correo anteriormente creado'),
                        array('correo2', 'unique', 'message'=>'Correo anteriormente creado'),
                        array('correo','email'),
                        array('correo2','email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usuario_sistema, tipo_documento, cedula, fecha_nacimiento, sexo, rif, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, sexo, observacion_personal, a_r, n_j, razon_social, tlf_habitacion, tlf_personal, tlf_personal2, correo, correo2, autorizacion, img, usuario, contrasena, id_perfil_sistema, fecha_registro, estatus, estatus_contrasena, direccion_ip, id_registrador, id_sociedad, latitud, longitud', 'safe', 'on'=>'search'),
		);
	}
        public function validateDate () {
            if($this->fecha_nacimiento == '')
              $this->fecha_nacimiento = null;
          }
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'usuarioAutorizados' => array(self::HAS_MANY, 'UsuarioAutorizado', 'id_usuario_sistema'),
			'transaccions' => array(self::HAS_MANY, 'Transaccion', 'id_usuario_sistema'),
			'usuarioEstatuHistoricos' => array(self::HAS_MANY, 'UsuarioEstatuHistorico', 'id_usuario_sistema'),
                        'idPerfilSistema' => array(self::BELONGS_TO, 'Perfil', 'id_perfil_sistema'),
                        'idRegistrador' => array(self::BELONGS_TO, 'Usuario', array('id_registrador'=>'id_usuario_sistema')),
                        'idSociedad' => array(self::BELONGS_TO, 'Sociedad', 'id_sociedad'),
                        'idParticipante' => array(self::BELONGS_TO, 'ComiteParticipante', 'id_usuario_sistema'),  
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario_sistema' => 'Id Usuario Sistema',
			'tipo_documento' => 'Tipo Documento',
			'cedula' => 'Identificación',
			'rif' => 'Rif',
			'primer_nombre' => 'Primer Nombre',
			'segundo_nombre' => 'Segundo Nombre',
			'primer_apellido' => 'Primer Apellido',
			'segundo_apellido' => 'Segundo Apellido',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'sexo' => 'Sexo',
			'observacion_personal' => 'Observacion Personal',
			'a_r' => 'A R',
			'n_j' => 'N J',
			'razon_social' => 'Razon Social',
			'tlf_habitacion' => 'Tlf Habitacion',
			'tlf_personal' => 'Tlf Personal',
			'tlf_personal2' => 'Tlf Personal2',
			'correo' => 'Correo',
			'correo2' => 'Correo2',
			'autorizacion' => 'Autorizacion',
			'img' => 'Img',
			'usuario' => 'Usuario',
			'contrasena' => 'Contrasena',
			'id_perfil_sistema' => 'Id Perfil Sistema',
			'fecha_registro' => 'Fecha Registro',
			'estatus' => 'Estatus',
			'estatus_contrasena' => 'Estatus Contrasena',
			'direccion_ip' => 'Direccion Ip',
			'id_registrador' => 'Id Registrador',
			'id_sociedad' => 'Id Sociedad',
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

		$criteria->compare('id_usuario_sistema',$this->id_usuario_sistema);
		$criteria->compare('tipo_documento',$this->tipo_documento);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('rif',$this->rif,true);
		$criteria->compare('primer_nombre',$this->primer_nombre,true);
		$criteria->compare('segundo_nombre',$this->segundo_nombre,true);
		$criteria->compare('primer_apellido',$this->primer_apellido,true);
		$criteria->compare('segundo_apellido',$this->segundo_apellido,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('observacion_personal',$this->observacion_personal,true);
		$criteria->compare('a_r',$this->a_r);
		$criteria->compare('n_j',$this->n_j);
		$criteria->compare('razon_social',$this->razon_social,true);
		$criteria->compare('tlf_habitacion',$this->tlf_habitacion,true);
		$criteria->compare('tlf_personal',$this->tlf_personal,true);
		$criteria->compare('tlf_personal2',$this->tlf_personal2,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('correo2',$this->correo2,true);
		$criteria->compare('autorizacion',$this->autorizacion);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('contrasena',$this->contrasena,true);
		$criteria->compare('id_perfil_sistema',$this->id_perfil_sistema);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('estatus_contrasena',$this->estatus_contrasena);
		$criteria->compare('direccion_ip',$this->direccion_ip,true);
		$criteria->compare('id_registrador',$this->id_registrador);
		$criteria->compare('id_sociedad',$this->id_sociedad);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function validatePassword($password) {
            return $this->hashPassword($password)===$this->contrasena;
        }

        public function hashPassword($password) {
          return md5($password);
        }
        static function getRealIP() {
            if (!empty($_SERVER['HTTP_CLIENT_IP']))
              return $_SERVER['HTTP_CLIENT_IP'];
            if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
              return $_SERVER['HTTP_X_FORWARDED_FOR'];
            return $_SERVER['REMOTE_ADDR'];
          }
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
