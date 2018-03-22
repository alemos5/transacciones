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
			//array('primer_nombre, ciudad, anio, mes, dia, tipo_usuario, codigo_pais, tlf_personal,  sexo, cedula, tipo_documento, correo, primer_apellido, contrasena', 'required'),
			array('cedula, usuario, direccion, primer_nombre, sexo, contrasena, fecha_registro, id_perfil_sistema, direccion_ip,', 'required'),
                        array('tipo_documento, anio, mes, dia, tipo_usuario, a_r, n_j, autorizacion, id_perfil_sistema, estatus, estatus_contrasena, id_registrador, id_sociedad, id_estado, id_ciudad, id_municipio, id_parroquia, zona_postal', 'numerical', 'integerOnly'=>true),
			array('cedula, codigo_pais', 'length', 'max'=>15),
			array('primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, direccion_ip', 'length', 'max'=>20),
			array('sexo', 'length', 'max'=>1),
			array('observacion_personal, direccion, contrasena, acreditado', 'length', 'max'=>200),
			array('razon_social, tlf_habitacion, tlf_personal, tlf_personal2, correo, correo2, img', 'length', 'max'=>250),
			array('usuario', 'length', 'max'=>50),
			array('rif, fecha_registro, latitud, longitud', 'safe'),
//                        array('fecha_nacimiento', 'date', 'format'=>'dd-MM-yyyy'),
                        //array('fecha_nacimiento', 'match', 'pattern'=>'/^\d{1,2}-\d{1,2}-\d{4}/', 'message'=>'Formato invalido. Ejemplo: 01-02-2015'),
//                        array('fecha_nacimiento', 'validateDate'),
                        array('cedula', 'unique', 'message'=>'Identification already exist'),
                        array('usuario', 'unique', 'message'=>'User ya existe'),
                        array('correo', 'unique', 'message'=>'Email ya existe'),
                        array('correo', 'unique', 'message'=>'Email ya existe'),
                        array('correo2', 'unique', 'message'=>'Email already exist'),
                        array('correo','email'),
                        array('correo2','email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('acreditado, id_usuario_sistema, tipo_documento, cedula, fecha_nacimiento, sexo, rif, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, sexo, observacion_personal, a_r, n_j, razon_social, tlf_habitacion, tlf_personal, tlf_personal2, correo, correo2, autorizacion, img, usuario, contrasena, id_perfil_sistema, fecha_registro, estatus, estatus_contrasena, direccion_ip, id_registrador, id_sociedad, latitud, longitud, id_estado, id_municipio, id_parroquia, zona_postal', 'safe', 'on'=>'search'),
		);
	}
        public function validateDate () {
            $date = new Date();
//            if($this->fecha_nacimiento == ''){
//                $this->fecha_nacimiento = null;
//            }
//            
//            else{
//                $this->fecha_nacimiento = $date->convertDateEsToEn($this->fecha_nacimiento);
//            }
            
//            if($this->fecha_nacimiento){
//                $this->fecha_nacimiento = date("Y-m-d", strtotime($this->fecha_nacimiento)); //$date->convertDateEsToEn($this->fecha_nacimiento);
//            }else{ 
//                $this->fecha_nacimiento = NULL;
//            }
            
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
			'idPais' => array(self::BELONGS_TO, 'Pais', 'codigo_pais'),
                        'idCiudad' => array(self::BELONGS_TO, 'Ciudad', 'id_ciudad'),
                        'idEstado' => array(self::BELONGS_TO, 'Estado', 'id_estado'),
			'idMunicipio' => array(self::BELONGS_TO, 'Municipio', 'id_municipio'),
			'idParroquia' => array(self::BELONGS_TO, 'Parroquia', 'id_parroquia'),
			'autorizados' => array(self::HAS_MANY, 'Autorizado', 'id_usuario_sistema'),
			'beneficiarios' => array(self::HAS_MANY, 'Beneficiario', 'id_usuario_sistema'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario_sistema' => 'User ID',
			'tipo_documento' => __('Identification'),
			'cedula' => __('Identification number'),
			'rif' => 'Rif',
            'tipo_usuario' => __('User type'),
            'primer_nombre' => __('Name'),
            'segundo_nombre' => __('Middle name'),
            'primer_apellido' => __('Last Name'),
            'segundo_apellido' => __('Second Last Name'),
            'fecha_nacimiento' => __('Birthday'),
            'sexo' => __('Gender'),
            'observacion_personal' => __('Observation'),
            'a_r' => 'A R',
            'n_j' => 'N J',
            'razon_social' => 'Razon Social',
            'tlf_habitacion' => __('Room phone'),
            'tlf_personal' => __('Phone'),
            'tlf_personal2' => __('Phone 2'),
            'correo' => __('Email'),
            'correo2' => __('Repeat Email'),
            'autorizacion' => __('Athorization'),
            'img' => 'Img',
            'usuario' => __('User'),
            'contrasena' => __('Password'),
            'id_perfil_sistema' => __('Id system profile'),
            'fecha_registro' => __('Register date'),
            'estatus' => __('Status'),
            'estatus_contrasena' => __('Password Status'),
            'direccion_ip' => 'Ip Address',
            'id_registrador' => __('Id Recorder'),
            'id_sociedad' => __('Id Society'),
            'id_estado' => __('Id State'),
            'id_municipio' => __('Id Municipality'),
            'id_parroquia' => __('Id Parish'),
            'zona_postal' => __('Zip code'),
            'dia' => __('Day'),
            'mes' => __('Month'),
            'Anio' => __('Year'),
            'codigo_pais' => __('Country'),
            'id_ciudad' => __('City'),
            'ciudad' => __('City'),
            'direccion' => __('Dirección'),
            'acreditado' => __('Accredited')
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
