<?php

/**
 * This is the model class for table "competencia".
 *
 * The followings are the available columns in table 'competencia':
 * @property integer $id_copetencia
 * @property integer $visible
 * @property integer $estatus
 * @property string $img
 * @property string $descripcion
 * @property string $fecha_copetencia
 * @property string $valor_competido
 *
 * The followings are the available model relations:
 * @property CompetenciaCategoria[] $competenciaCategorias
 * @property CompetenciaTipo[] $competenciaTipos
 * @property Inscripcion[] $inscripcions
 */
class Competencia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'competencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_copetencia, direccion, competencia,valor_competido', 'required'),
			array('visible, orden, estatus, anio, mes, dia, gratis', 'numerical', 'integerOnly'=>true),
			array('valor_competido', 'length', 'max'=>10),
			array('img, direccion, descripcion', 'safe'),
//                        array('fecha_copetencia', 'date', 'format'=>'dd-MM-yyyy'),
                        //array('fecha_nacimiento', 'match', 'pattern'=>'/^\d{1,2}-\d{1,2}-\d{4}/', 'message'=>'Formato invalido. Ejemplo: 01-02-2015'),
//                        array('fecha_copetencia', 'validateDate'),
//                        array('img', 'types'=>'jpg, gif, png'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_copetencia, visible, estatus, img, descripcion, fecha_copetencia, valor_competido', 'safe', 'on'=>'search'),
		);
	}
//        public function validateDate () {
//            $date = new Date();
////            if($this->fecha_nacimiento == ''){
////                $this->fecha_nacimiento = null;
////            }
////            
////            else{
////                $this->fecha_nacimiento = $date->convertDateEsToEn($this->fecha_nacimiento);
////            }
//            
//            if($this->fecha_copetencia){
//                $this->fecha_copetencia = $date->convertDateEsToEn($this->fecha_copetencia);
//            }else{ 
//                $this->fecha_copetencia = NULL;
//            }
//            
//          }
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'competenciaCategorias' => array(self::HAS_MANY, 'CompetenciaCategoria', 'id_copetencia'),
			'competenciaTipos' => array(self::HAS_MANY, 'CompetenciaTipo', 'id_copetencia'),
			'inscripcions' => array(self::HAS_MANY, 'Inscripcion', 'id_copetencia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_copetencia' => 'Identificador de Copetencia',
			'competencia' => 'Competencia',
			'direccion' => 'Lugar del evento',
			'visible' => 'Visible',
			'estatus' => 'Activo',
			'gratis' => 'Gratis',
			'img' => 'Logo',
			'dia' => 'Día',
			'mes' => 'Mes',
			'Anio' => 'Año',
			'descripcion' => 'Descripción',
			'fecha_copetencia' => 'Fecha de la Copetencia',
			'valor_competido' => 'Valor Competido',
			'orden' => 'Orden',
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

		$criteria->compare('id_copetencia',$this->id_copetencia);
		$criteria->compare('visible',$this->visible);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_copetencia',$this->fecha_copetencia,true);
		$criteria->compare('valor_competido',$this->valor_competido,true);
		$criteria->compare('orden',$this->orden,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Competencia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
