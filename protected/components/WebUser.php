<?php
class WebUser extends CWebUser
{
  public function checkAccessControllers($controller, $action)
  {
    echo "Entro...";
    $controller = Yii::import('application.controllers.'.$controller.'Controller');
    $permissions = $controller::accessRules();
    if(isset($permissions[0]['actions']))
    {
      foreach($permissions[0]['actions'] as $key => $value)
      {
	if($action == $value) return true;
      }
    }
    return false;
  }
  
  public function buildMenu()
  {


      if(Yii::app()->user->isGuest)
      return array(array('label'=>__('Log In'), 'url'=>array('/site/login')));
    $in = array();
    $inicio = 0;
    $perfiles_menus = PerfilMenu::model()->findAll('id_perfil_sistema=?', array(Yii::app()->user->id_perfil_sistema));
    foreach($perfiles_menus as $perfil_menu)
    {
      $in[] = $perfil_menu->id_menu_sistema;
      $inicio++;
    }

    return $this->concatenatedToBuildMenu($in, 0);
  }
  
  private function concatenatedToBuildMenu($in, $valor)
  {
    $criteria=new CDbCriteria; 
    $criteria->addInCondition('id_menu_sistema',$in);
    $criteria->compare('padre', $valor);
    $criteria->compare('estatus', 1);
    $criteria->order = 'nivel';
    $menus = Menu::model()->findAll($criteria);
    $mostrar = array();
    foreach($menus as $menu)
    {
      $criteria=new CDbCriteria; 
      $criteria->addInCondition('id_menu_sistema',$in);
      $criteria->compare('padre', $valor);
      $criteria->compare('estatus', 1);
      $contadorHijos = Menu::model()->count($criteria);
      if($contadorHijos == 0)
	$mostrar[] = array('label'=>__('Home'), 'url'=>array('/site/index'));
      else{
	$addMostrar = array('label'=>__($menu->nombre), 'url'=>array($menu->ruta), 'style'=>'home', 'items'=>$this->concatenatedToBuildMenu($in, $menu->id_menu_sistema));
	if($menu->style != '')
	  $addMostrar['style'] = $menu->style;
          $mostrar[] = $addMostrar;
      }
    }
    return $mostrar;
  }
}