<?php

/**
 * This is the model class for table "usuario_sistema".
 *
 * The followings are the available columns in table 'usuario_sistema':
 * @property integer $id_usuario_sistema
 * @property integer $cedula
 * @property string $usuario
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $fecha_nacimiento
 * @property string $sexo
 * @property string $observacion_personal
 * @property string $contrasena
 * @property string $fecha_registro
 * @property integer $estatus
 * @property integer $estatus_contrasena
 * @property integer $id_perfil_sistema
 * @property string $direccion_ip
 * @property integer $id_registrador
 * @property integer $id_sociedad
 *
 * The followings are the available model relations:
 * @property PerfilSistema $idPerfilSistema
 */
class Usuario extends CActiveRecord {
  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'usuario_sistema';
  }
  
  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('cedula, usuario, primer_nombre, primer_apellido, sexo, contrasena, fecha_registro, id_perfil_sistema, direccion_ip, id_registrador, id_sociedad, fecha_nacimiento', 'required'),
      array('estatus, estatus_contrasena, id_perfil_sistema, id_registrador, id_sociedad', 'numerical', 'integerOnly'=>true),
      array('usuario', 'length', 'max'=>50),
      array('cedula', 'length', 'max'=>9),
      array('primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, direccion_ip', 'length', 'max'=>20),
      array('sexo', 'length', 'max'=>1),
      array('observacion_personal, contrasena', 'length', 'max'=>200),
      array('fecha_nacimiento', 'date', 'format'=>'dd-MM-yyyy'),
      //array('fecha_nacimiento', 'match', 'pattern'=>'/^\d{1,2}-\d{1,2}-\d{4}/', 'message'=>'Formato invalido. Ejemplo: 01-02-2015'),
      array('fecha_nacimiento', 'validateDate'),
      array('cedula', 'unique', 'message'=>'Cedula ya creada.'),
      array('usuario', 'unique', 'message'=>'Usuario anteriormente creado'),
      // The following rule is used by search().
      // @todo Please remove those attributes that should not be searched.
      array('id_usuario_sistema, cedula, usuario, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, sexo, observacion_personal, contrasena, fecha_registro, estatus, estatus_contrasena, id_perfil_sistema, direccion_ip, id_registrador, id_sociedad', 'safe', 'on'=>'search'),
    );
  }
  
  public function validateDate () {
    if($this->fecha_nacimiento == '')
      $this->fecha_nacimiento = null;
  }
  
  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
      'idPerfilSistema' => array(self::BELONGS_TO, 'Perfil', 'id_perfil_sistema'),
      'idRegistrador' => array(self::BELONGS_TO, 'Usuario', array('id_registrador'=>'id_usuario_sistema')),
      'idSociedad' => array(self::BELONGS_TO, 'Sociedad', 'id_sociedad'),
      'idParticipante' => array(self::BELONGS_TO, 'ComiteParticipante', 'id_usuario_sistema'),  
    );
  }
  
  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
      'id_usuario_sistema' => 'Número de Usuario Sistema',
      'cedula' => 'Cédula de Identidad',
      'usuario' => 'Nombre de Usuario en Sistema',
      'primer_nombre' => 'Primer Nombre',
      'segundo_nombre' => 'Segundo Nombre',
      'primer_apellido' => 'Primer Apellido',
      'segundo_apellido' => 'Segundo Apellido',
      'fecha_nacimiento' => 'Fecha de Nacimiento',
      'sexo' => 'Sexo',
      'observacion_personal' => 'Observación Personal',
      'contrasena' => 'Contraseña',
      'fecha_registro' => 'Fecha de Registro',
      'estatus' => 'Estatus',
      'estatus_contrasena' => 'Estatus de Contraseña',
      'id_perfil_sistema' => 'Perfil Sistema',
      'direccion_ip' => 'Direccion Ip',
      'id_registrador' => 'Id Registrador',
      'id_sociedad' => 'Sociedad',
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
  public function search() {
    // @todo Please modify the following code to remove attributes that should not be searched.

    $criteria=new CDbCriteria;

    $criteria->compare('id_usuario_sistema',$this->id_usuario_sistema);
    $criteria->compare('cedula',$this->cedula);
    $criteria->compare('usuario',$this->usuario,true);
    $criteria->compare('primer_nombre',$this->primer_nombre,true);
    $criteria->compare('segundo_nombre',$this->segundo_nombre,true);
    $criteria->compare('primer_apellido',$this->primer_apellido,true);
    $criteria->compare('segundo_apellido',$this->segundo_apellido,true);
    $criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
    $criteria->compare('sexo',$this->sexo,true);
    $criteria->compare('observacion_personal',$this->observacion_personal,true);
    $criteria->compare('contrasena',$this->contrasena,true);
    $criteria->compare('fecha_registro',$this->fecha_registro,true);
    $criteria->compare('estatus',$this->estatus);
    $criteria->compare('estatus_contrasena',$this->estatus_contrasena);
    $criteria->compare('id_perfil_sistema',$this->id_perfil_sistema);
    $criteria->compare('direccion_ip',$this->direccion_ip,true);
    $criteria->compare('id_registrador',$this->id_registrador);
    $criteria->compare('id_sociedad',$this->id_sociedad);

    return new CActiveDataProvider($this, array('criteria'=>$criteria,));
  }
  
  public function searchDisponible($idComite = NULL, $tipo) {
    // @todo Please modify the following code to remove attributes that should not be searched.

    $criteria=new CDbCriteria;

    $criteria->compare('id_usuario_sistema',$this->id_usuario_sistema);
    $criteria->compare('cedula',$this->cedula);
    $criteria->compare('usuario',$this->usuario,true);
    $criteria->compare('primer_nombre',$this->primer_nombre,true);
    $criteria->compare('segundo_nombre',$this->segundo_nombre,true);
    $criteria->compare('primer_apellido',$this->primer_apellido,true);
    $criteria->compare('segundo_apellido',$this->segundo_apellido,true);
    $criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
    $criteria->compare('sexo',$this->sexo,true);
    $criteria->compare('observacion_personal',$this->observacion_personal,true);
    $criteria->compare('contrasena',$this->contrasena,true);
    $criteria->compare('fecha_registro',$this->fecha_registro,true);
    $criteria->compare('estatus',$this->estatus);
    $criteria->compare('estatus_contrasena',$this->estatus_contrasena);
    $criteria->compare('id_perfil_sistema',$this->id_perfil_sistema);
    $criteria->compare('direccion_ip',$this->direccion_ip,true);
    $criteria->compare('id_registrador',$this->id_registrador);
    $criteria->compare('id_sociedad',$this->id_sociedad);
    if($idComite) {
      if($tipo == 1) {
        $criteria->addCondition('"t".id_usuario_sistema NOT IN (SELECT id_usuario_sistema FROM comite_participante WHERE comite_participante.id_comite='.$idComite.') AND "t"."id_sociedad"='.Yii::app()->user->id_sociedad);
      }
      if ($tipo == 2) {
        $criteria->join = 'LEFT JOIN comite_participante ON comite_participante.id_usuario_sistema = "t"."id_usuario_sistema"';
        $criteria->addCondition('(comite_participante.id_comite ='.$idComite.')');
      }
    }
    return new CActiveDataProvider($this, array('criteria'=>$criteria,));
  }
  
  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return Usuario the static model class
   */
  public static function model($className=__CLASS__) {
    return parent::model($className);
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
}