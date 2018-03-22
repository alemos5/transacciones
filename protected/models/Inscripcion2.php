<?php

/**
 * This is the model class for table "inscripcion".
 *
 * The followings are the available columns in table 'inscripcion':
 * @property integer $id_inscripcion
 * @property integer $id_copetencia
 * @property integer $id_competencia_tipo
 * @property integer $id_usuario
 * @property string $grupo
 * @property string $descripcion
 * @property string $audio
 * @property string $lugar_representa
 * @property string $codigo_pais
 * @property integer $id_ciudad
 * @property integer $id_escuela
 * @property integer $id_estatu_inscripcion
 *
 * The followings are the available model relations:
 * @property CompetenciaTipo $idCompetenciaTipo
 * @property Competencia $idCopetencia
 * @property Escuela $idEscuela
 * @property EstatuInscripcion $idEstatuInscripcion
 * @property Pago[] $pagos
 * @property Participante[] $participantes
 */
class Inscripcion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inscripcion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_copetencia, ciudad, id_competencia_tipo, id_usuario, fecha_inscripcion, lugar_representa, codigo_pais,  id_estatu_inscripcion', 'required'),
			array('error, calificacion, reproducida, musica_validada, orden, validado, acreditado, id_copetencia, id_categoria, id_competencia_tipo, id_usuario, id_ciudad, id_escuela, id_escuela, id_estatu_inscripcion', 'numerical', 'integerOnly'=>true),
			array('grupo, lugar_representa, ciudad, fecha_inscripcion', 'length', 'max'=>250),
			array('costo', 'length', 'max'=>10),
                        array('codigo_pais', 'length', 'max'=>5),
                        array('qr', 'length', 'max'=>5),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('error, calificacion, reproducida, musica_validada, orden, validado, id_inscripcion, costo, id_copetencia, id_competencia_tipo, id_usuario, grupo, descripcion, audio, lugar_representa, codigo_pais, id_ciudad, id_escuela, id_estatu_inscripcion', 'safe', 'on'=>'search'),
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
			'idCompetenciaTipo' => array(self::BELONGS_TO, 'CompetenciaTipo', 'id_competencia_tipo'),
			'idCopetencia' => array(self::BELONGS_TO, 'Competencia', 'id_copetencia'),
			'idEscuela' => array(self::BELONGS_TO, 'Escuela', 'id_escuela'),
			'idEstatuInscripcion' => array(self::BELONGS_TO, 'EstatuInscripcion', 'id_estatu_inscripcion'),
			'pagos' => array(self::HAS_MANY, 'Pago', 'id_inscripcion'),
			'participantes' => array(self::BELONGS_TO, 'Participante', 'id_inscripcion'),
			'idCategoria' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
			'idPais' => array(self::BELONGS_TO, 'Pais', 'codigo_pais'),
                        'idCiudad' => array(self::BELONGS_TO, 'Ciudad', 'id_ciudad'),
			//'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario_sistema'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_inscripcion' => __('Subscription ID'),
			'id_copetencia' => __('Competence ID'),
			'id_competencia_tipo' => __('Competence type ID'),
			'id_categoria' => __('Category ID'),
			'id_usuario' => __('User ID'),
			'grupo' => __('Group'),
			'descripcion' => __('Description'),
			'audio' => __('Audio'),
			'lugar_representa' => __('Place'),
			'codigo_pais' => __('Country code'),
			'id_ciudad' => __('City ID'),
                        'ciudad' => __('City'),
			'id_escuela' => __('School ID'),
			'id_estatu_inscripcion' => __('Subscription status ID'),
                        'fecha_inscripcion' => __('Subscription date'),
                        'costo'=>__('Price'),
                        'acreditado'=>__('Accredited'),
			'orden' => __('Order'),
			'validado' => __('Validated'),
			'qr' => __('QR'),
                        'musica_validada' => __('Validated Music'),
                        'reproducida' => __('Reproduced'),
                        'calificacion' => __('Qualification'),
                        'error' => __('Error'),
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

		$criteria->compare('id_inscripcion',$this->id_inscripcion);
		$criteria->compare('id_copetencia',$this->id_copetencia);
		$criteria->compare('id_competencia_tipo',$this->id_competencia_tipo);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('grupo',$this->grupo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('audio',$this->audio,true);
		$criteria->compare('lugar_representa',$this->lugar_representa,true);
		$criteria->compare('codigo_pais',$this->codigo_pais,true);
		$criteria->compare('id_ciudad',$this->id_ciudad);
		$criteria->compare('id_escuela',$this->id_escuela);
		$criteria->compare('id_estatu_inscripcion',$this->id_estatu_inscripcion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function InscripcionesRegistrada()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_inscripcion',$this->id_inscripcion);
		$criteria->compare('id_copetencia',$this->id_copetencia);
		$criteria->compare('id_competencia_tipo',$this->id_competencia_tipo);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('grupo',$this->grupo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('audio',$this->audio,true);
		$criteria->compare('lugar_representa',$this->lugar_representa,true);
		$criteria->compare('codigo_pais',$this->codigo_pais,true);
		$criteria->compare('id_ciudad',$this->id_ciudad);
		$criteria->compare('id_escuela',$this->id_escuela);
		$criteria->compare('id_estatu_inscripcion',$this->id_estatu_inscripcion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inscripcion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
