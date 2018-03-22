<?php

/**
 * This is the model class for table "organizacion_ronda".
 *
 * The followings are the available columns in table 'organizacion_ronda':
 * @property integer $id_organizacion_ronda
 * @property integer $id_competencia
 * @property string $ronda
 * @property integer $capacidad_max_categoria
 * @property string $fecha_inicio
 * @property string $hora_inicio
 * @property string $fecha_final
 * @property string $hora_final
 * @property integer $estatus
 */
class OrganizacionRonda extends CActiveRecord
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
//                    'OrganizacionRonda' => 'id_organizacion_ronda',
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
		return 'organizacion_ronda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_competencia, ronda, capacidad_max_categoria, fecha_inicio, hora_inicio, fecha_final, hora_final, duracion_inscripcion', 'required'),
			array('id_competencia, capacidad_max_categoria, estatus', 'numerical', 'integerOnly'=>true),
			array('ronda', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_organizacion_ronda, id_competencia, ronda, capacidad_max_categoria, fecha_inicio, hora_inicio, fecha_final, hora_final, duracion_inscripcion, estatus', 'safe', 'on'=>'search'),
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
                    
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_organizacion_ronda' => 'Id Round',
			'id_competencia' => __('Competition'),
			'ronda' => __('Round'),
			'capacidad_max_categoria' =>  __('Maximum capacity'),
			'fecha_inicio' => __('Start date'),
			'hora_inicio' => __('Start time'),
			'fecha_final' => __('Final date'),
			'hora_final' => __('Final hour'),
                        'duracion_inscripcion' => __('Duration by participation'),
			'estatus' => __('Status'),
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

		$criteria->compare('id_organizacion_ronda',$this->id_organizacion_ronda);
		$criteria->compare('id_competencia',$this->id_competencia);
		$criteria->compare('ronda',$this->ronda,true);
		$criteria->compare('capacidad_max_categoria',$this->capacidad_max_categoria);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('hora_inicio',$this->hora_inicio,true);
		$criteria->compare('fecha_final',$this->fecha_final,true);
		$criteria->compare('hora_final',$this->hora_final,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrganizacionRonda the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
