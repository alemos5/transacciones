<?php

/**
 * This is the model class for table "menu_sistema".
 *
 * The followings are the available columns in table 'menu_sistema':
 * @property integer $id_menu_sistema
 * @property string $nombre
 * @property string $ruta
 * @property integer $padre
 * @property integer $nivel
 * @property string $style
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property PerfilSistema[] $perfilSistemas
 */
class Menu extends CActiveRecord {
  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'menu_sistema';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('nombre, ruta', 'required'),
      array('padre, nivel, estatus', 'numerical', 'integerOnly'=>true),
      array('nombre', 'length', 'max'=>50),
      array('ruta, style', 'length', 'max'=>200),
      // The following rule is used by search().
      // @todo Please remove those attributes that should not be searched.
      array('id_menu_sistema, nombre, ruta, padre, nivel, style, estatus', 'safe', 'on'=>'search'),
    );
  }

  /**
   * @return array relational rules.
  */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
      'perfilSistemas' => array(self::MANY_MANY, 'PerfilSistema', 'perfil_menu(id_menu_sistema, id_perfil_sistema)'),
      'padreMenu' => array(self::BELONGS_TO, 'Menu', array(id_menu_sistema, padre)),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
      'id_menu_sistema' => __('Menu number'),
      'nombre' => __('Name'),
      'ruta' => __('Route'),
      'padre' => __('Father'),
      'nivel' => __('Level'),
      'style' => __('Style'),
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
  public function search() {
    // @todo Please modify the following code to remove attributes that should not be searched.

    $criteria=new CDbCriteria;

    $criteria->compare('id_menu_sistema',$this->id_menu_sistema);
    $criteria->compare('nombre',$this->nombre,true);
    $criteria->compare('ruta',$this->ruta,true);
    $criteria->compare('padre',$this->padre);
    $criteria->compare('nivel',$this->nivel);
    $criteria->compare('style',$this->style,true);
    $criteria->compare('estatus',$this->estatus);

    return new CActiveDataProvider($this, array('criteria'=>$criteria,));
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return Menu the static model class
   */
  public static function model($className=__CLASS__) {
    return parent::model($className);
  }
}
