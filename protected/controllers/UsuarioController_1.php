<?php

class UsuarioController extends Controller {
  /**
  * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
  * using two-column layout. See 'protected/views/layouts/column2.php'.
  */
  public $layout='//layouts/column2';
  
  /**
  * @return array action filters
  */
  public function filters() {
    return array(
      'accessControl', // perform access control for CRUD operations
    );
  }
  
  /**
  * Specifies the access control rules.
  * This method is used by the 'accessControl' filter.
  * @return array access control rules
  */
//  public function accessRules() {
//    $access = array();
//    if(!Yii::app()->user->isGuest) {
//      $profile=Perfil::model()->find('id_perfil_sistema=?', array(Yii::app()->user->id_perfil_sistema));
//      $profileMenu=PerfilMenu::model()->find('id_perfil_sistema=? AND id_menu_sistema=?', array(Yii::app()->user->id_perfil_sistema, 6));
//      if($profileMenu) {
//        $actions = array();
//        if($profileMenu->crear) $actions[] = 'create';
//        if($profileMenu->modificar) $actions[] = 'update';
//        if($profileMenu->consultar) $actions[] = 'view';
//        if($profileMenu->eliminar) $actions[] = 'delete';
//        if($profileMenu->imprimir) $actions[] = 'index';
//        if($profileMenu->consultar && $profileMenu->eliminar && $profileMenu->modificar) $actions[] = 'admin';
//        if(count($actions) > 0)
//          $access[] = array('allow','actions'=>$actions,'users'=>array(Yii::app()->user->name),);
//      }
//    }
//    $access[] = array('deny');
//    return $access;
//  }
  
  public function accessRules() {
    $access = array();
    $actions = array();
    $actions[]='validarCedulaUsuario';
    $actions[]='cedulaDisponible';
    if(!Yii::app()->user->isGuest) {
      $profile=Perfil::model()->find('id_perfil_sistema=?', array(Yii::app()->user->id_perfil_sistema));
      $profileMenu=PerfilMenu::model()->find('id_perfil_sistema=? AND id_menu_sistema=?', array(Yii::app()->user->id_perfil_sistema, 6));
      if($profileMenu) {
        if($profileMenu->crear) $actions[] = 'create';
        if($profileMenu->modificar) $actions[] = 'update';
        if($profileMenu->consultar) $actions[] = 'view';
        if($profileMenu->eliminar) $actions[] = 'delete';
        if($profileMenu->imprimir) $actions[] = 'index';
        $actions[]='findJsonProfesor';
        $actions[]='buscarNombreProfesor';
        $actions[]='buscarCedulaProfesor';
        $actions[]='detallarUsuario';
        if($profileMenu->consultar && $profileMenu->eliminar && $profileMenu->modificar) $actions[] = 'admin';
        
      }
    }
    if(count($actions) > 0){
        $access[] = array('allow','actions'=>$actions,'users'=>array(Yii::app()->user->name),);
    }
    $access[] = array('deny');
    return $access;
  }
  
  
  /**
  * Displays a particular model.
  * @param integer $id the ID of the model to be displayed
  */
  public function actionView($id) {
    $this->render('view',array('model'=>$this->loadModel($id),));
  }
  
  /**
  * Creates a new model.
  * If creation is successful, the browser will be redirected to the 'view' page.
  */
  public function actionCreate() {
    $model=new Usuario;
    
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    
    if(isset($_POST['Usuario'])) {
      $model->attributes=$_POST['Usuario'];
      $textFilesErrors = '';
      if($model->contrasena != '') {
        if($model->contrasena == $_POST['repeat']) {
          $model->contrasena = $model->hashPassword($model->contrasena);
          $model->fecha_registro = date('Y-m-d');
          $model->direccion_ip = $model->getRealIP();
          $model->id_registrador = Yii::app()->user->id_usuario_sistema;
          if($model->save())
            $this->redirect(array('view','id'=>$model->id_usuario_sistema));
          else $model->contrasena = '';
        } else {
          $model->validate();
          $model->addError('contrasena','Las contraseñas no coincidió con la contraseña de verificación.');
          $model->contrasena = '';
        }
      } else {
        $model->validate();
        $model->addError('contrasena','Contraseña no puede ser nulo.');
        $model->contrasena = '';
      }
      $date = new Date();
      if($model->fecha_nacimiento) $model->fecha_nacimiento = $date->convertDateEsToEn($model->fecha_nacimiento);
    }
    
    $this->render('create',array('model'=>$model,));
  }
  
  /**
  * Updates a particular model.
  * If update is successful, the browser will be redirected to the 'view' page.
  * @param integer $id the ID of the model to be updated
  */
  public function actionUpdate($id) {
    $model=$this->loadModel($id);
    $modelRepeat=$this->loadModel($id);
    
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    
    if(isset($_POST['Usuario'])) {
      $modelRepeat->attributes=$_POST['Usuario'];
      if($modelRepeat->contrasena == '') {
        $modelRepeat->contrasena = $model->contrasena;
        if($modelRepeat->save())
          $this->redirect(array('view','id'=>$modelRepeat->id_usuario_sistema));
        else
          $model = $modelRepeat;
      } elseif($modelRepeat->contrasena == $_POST['repeat']) {
        $modelRepeat->contrasena = $modelRepeat->hashPassword($modelRepeat->contrasena);
        if($modelRepeat->save())
          $this->redirect(array('view','id'=>$modelRepeat->id_usuario_sistema));
        else
          $model = $modelRepeat;
      } else {
        $modelRepeat->validate();
        $modelRepeat->addError('contrasena','Las contraseñas no coincidió con la contraseña de verificación.');
        $modelRepeat->contrasena = '';
        $model = $modelRepeat;
      }
      $date = new Date();
      if($model->fecha_nacimiento) $model->fecha_nacimiento = $date->convertDateEsToEn($model->fecha_nacimiento);
    }
    
    $model->contrasena = '';
    $this->render('update',array('model'=>$model,));
  }
  
  /**
  * Deletes a particular model.
  * If deletion is successful, the browser will be redirected to the 'admin' page.
  * @param integer $id the ID of the model to be deleted
  */
  public function actionDelete($id) {
    if(Yii::app()->request->isPostRequest)
    {
      // we only allow deletion via POST request
      $this->loadModel($id)->delete();
      
      // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
      if(!isset($_GET['ajax']))
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    else throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
  }
  
  /**
  * Lists all models.
  */
  public function actionIndex() {
    $dataProvider=new CActiveDataProvider('Usuario');
    $this->render('index',array('dataProvider'=>$dataProvider,));
  }
  
  /**
  * Manages all models.
  */
  public function actionAdmin() {
    $model=new Usuario('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['Usuario']))
      $model->attributes=$_GET['Usuario'];
    
    $this->render('admin',array('model'=>$model,));
  }
  
  /**
  * Returns the data model based on the primary key given in the GET variable.
  * If the data model is not found, an HTTP exception will be raised.
  * @param integer the ID of the model to be loaded
  */
  public function loadModel($id) {
    $model=Usuario::model()->findByPk($id);
    if($model===null)
      throw new CHttpException(404,'The requested page does not exist.');
    return $model;
  }
  
  /**
  * Performs the AJAX validation.
  * @param CModel the model to be validated
  */
  protected function performAjaxValidation($model) {
    if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }
  
  public function actioncedulaDisponible()
  {
      $data = Usuario::model()->find("cedula = '".$_POST['UsuarioCedula']."'");
      echo count($data);
  }
  
  public function actionvalidarCedulaUsuario(){
    $date = new Date();
    $data = Usuario::model()->find("cedula = '".$_POST['UsuarioCedula']."'");    $model = new Usuario;
    $model = new Usuario;
    $idUsuario = $data->id_usuario_sistema;
    $model = $this->loadModel($idUsuario);
    $fechaNacimientoBD = $date->convertDateEnToEs($data->fecha_nacimiento);
    if ($fechaNacimientoBD == $_POST['fechaNacimiento']){
      
      if(isset($_POST['UsuarioCedula'])) {
      $model->attributes=$_POST['UsuarioCedula'];
      $model->contrasena = md5($_POST['Usuario_contrasena']);
      $model->fecha_nacimiento = $date->convertDateEnToEs($model->fecha_nacimiento);
      
      if($model->save()){
          ?>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>¡La contraseña fue cambiada satisfactoriamente!</strong><br> 
              Ingrese su nueva Contraseña a partir de este momento
            </div>
          <?php      
        }else{
          ?>
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Ocurrio un problema al actualizar la contraseña!</strong><br> 
            Intentelo nuevamente
          </div>
          <?php
        }
       }else{
        ?>
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Ocurrio un problema al actualizar la contraseña!</strong><br> 
            Intentelo nuevamente
          </div>
        <?php
      }
    }else{
      ?>
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡La fecha de Nacimiento no es correcta!</strong><br> 
        Intentelo nuevamente
      </div>
      <?php
    }
  }
}