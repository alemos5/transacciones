<?php

/**
 * This is the model class for table "participante".
 *
 * The followings are the available columns in table 'participante':
 * @property integer $id_participante
 * @property integer $id_inscripcion
 * @property integer $id_copetencia
 * @property integer $id_categoria
 * @property integer $id_usuario
 * @property integer $id_usuario_registro
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Inscripcion $idInscripcion
 */
class Participante extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'participante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario', 'required'),
			array('id_inscripcion, id_copetencia, id_categoria, id_usuario, id_usuario_registro, estatus', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_participante, id_inscripcion, id_copetencia, id_categoria, id_usuario, id_usuario_registro, estatus', 'safe', 'on'=>'search'),
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
			'idInscripcion' => array(self::BELONGS_TO, 'Inscripcion', 'id_inscripcion'),
			'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
			'idCompetencia' => array(self::BELONGS_TO, 'Competencia', 'id_copetencia'),
			'idCategoria' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
			'idInscripcion' => array(self::BELONGS_TO, 'Inscripcion', 'id_inscripcion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_participante' => 'Id Participant',
			'id_inscripcion' => 'Id Subscription',
			'id_copetencia' => 'Id Competence',
			'id_categoria' => 'Id Category',
			'id_usuario' => 'Id User',
			'id_usuario_registro' => 'Id register user',
			'estatus' => 'Status',
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

		$criteria->compare('id_participante',$this->id_participante);
		$criteria->compare('id_inscripcion',$this->id_inscripcion);
		$criteria->compare('id_copetencia',$this->id_copetencia);
		$criteria->compare('id_categoria',$this->id_categoria);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_usuario_registro',$this->id_usuario_registro);
		$criteria->compare('estatus',$this->estatus);
                $criteria->addCondition('id_usuario ='.Yii::app()->user->id_usuario_sistema.' OR id_usuario_registro ='.Yii::app()->user->id_usuario_sistema);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function ParticipanteLista()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_participante',$this->id_participante);
		$criteria->compare('id_inscripcion',$this->id_inscripcion);
		$criteria->compare('id_copetencia',$this->id_copetencia);
		$criteria->compare('id_categoria',$this->id_categoria);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_usuario_registro',$this->id_usuario_registro);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
        
	public function participanteActivo($estatus = NULL)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_participante',$this->id_participante);
		$criteria->compare('id_inscripcion',$this->id_inscripcion);
		$criteria->compare('id_copetencia',$this->id_copetencia);
		$criteria->compare('id_categoria',$this->id_categoria);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_usuario_registro',$this->id_usuario_registro);
		$criteria->compare('estatus',$this->estatus);
                $criteria->join = "LEFT JOIN competencia ON competencia.id_copetencia = t.id_copetencia";
                if($estatus){
                    $criteria->addCondition('competencia.estatus ='.$estatus);
                }
                $criteria->addCondition('t.id_usuario ='.Yii::app()->user->id_usuario_sistema);
//                $criteria->addCondition('id_estatus_fianza IN ('.$idEstatusFianza.')');
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Participante the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
