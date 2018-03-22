<?php

/**
 * This is the model class for table "pais".
 *
 * The followings are the available columns in table 'pais':
 * @property integer $id_pais
 * @property string $Code
 * @property string $pais
 * @property string $nombre_largo
 * @property string $Continent
 * @property string $Region
 * @property double $SurfaceArea
 * @property integer $IndepYear
 * @property integer $Population
 * @property double $LifeExpectancy
 * @property double $GNP
 * @property double $GNPOld
 * @property string $LocalName
 * @property string $GovernmentForm
 * @property string $HeadOfState
 * @property integer $Capital
 * @property string $codigo
 * @property string $calling_code
 * @property integer $permitido
 */
class Pais extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pais';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IndepYear, Population, Capital, permitido', 'numerical', 'integerOnly'=>true),
			array('tarifa_peso, SurfaceArea, LifeExpectancy, GNP, GNPOld', 'numerical'),
			array('Code', 'length', 'max'=>3),
			array('pais', 'length', 'max'=>52),
			array('nombre_largo', 'length', 'max'=>250),
			array('Continent', 'length', 'max'=>13),
			array('Region', 'length', 'max'=>26),
			array('LocalName, GovernmentForm', 'length', 'max'=>45),
			array('HeadOfState', 'length', 'max'=>60),
			array('codigo', 'length', 'max'=>2),
			array('calling_code', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pais, Code, pais, nombre_largo, Continent, Region, SurfaceArea, IndepYear, Population, LifeExpectancy, GNP, GNPOld, LocalName, GovernmentForm, HeadOfState, Capital, codigo, calling_code, permitido', 'safe', 'on'=>'search'),
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
			'id_pais' => 'Id Pais',
			'Code' => 'Code',
			'pais' => 'Pais',
			'nombre_largo' => 'Nombre Largo',
			'Continent' => 'Continent',
			'Region' => 'Region',
			'SurfaceArea' => 'Surface Area',
			'IndepYear' => 'Indep Year',
			'Population' => 'Population',
			'LifeExpectancy' => 'Life Expectancy',
			'GNP' => 'Gnp',
			'GNPOld' => 'Gnpold',
			'LocalName' => 'Local Name',
			'GovernmentForm' => 'Government Form',
			'HeadOfState' => 'Head Of State',
			'Capital' => 'Capital',
			'codigo' => 'Codigo',
			'calling_code' => 'Calling Code',
			'permitido' => 'Permitido',
            'tarifa_peso' => 'Tarifa por peso',
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

		$criteria->compare('id_pais',$this->id_pais);
		$criteria->compare('Code',$this->Code,true);
		$criteria->compare('pais',$this->pais,true);
		$criteria->compare('nombre_largo',$this->nombre_largo,true);
		$criteria->compare('Continent',$this->Continent,true);
		$criteria->compare('Region',$this->Region,true);
		$criteria->compare('SurfaceArea',$this->SurfaceArea);
		$criteria->compare('IndepYear',$this->IndepYear);
		$criteria->compare('Population',$this->Population);
		$criteria->compare('LifeExpectancy',$this->LifeExpectancy);
		$criteria->compare('GNP',$this->GNP);
		$criteria->compare('GNPOld',$this->GNPOld);
		$criteria->compare('LocalName',$this->LocalName,true);
		$criteria->compare('GovernmentForm',$this->GovernmentForm,true);
		$criteria->compare('HeadOfState',$this->HeadOfState,true);
		$criteria->compare('Capital',$this->Capital);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('calling_code',$this->calling_code,true);
		$criteria->compare('permitido',$this->permitido);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pais the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
