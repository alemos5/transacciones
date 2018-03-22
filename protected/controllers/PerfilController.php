<?php
class PerfilController extends Controller
{
  /**
  * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
  * using two-column layout. See 'protected/views/layouts/column2.php'.
  */
  public $layout='//layouts/column2';
  
  /**
  * @return array action filters
  */
  public function filters()
  {
      return array(
      'accessControl', // perform access control for CRUD operations
      );
  }
  
  /**
  * Specifies the access control rules.
  * This method is used by the 'accessControl' filter.
  * @return array access control rules
  */
  public function accessRules()
  {
    $access = array();
    if(!Yii::app()->user->isGuest)
    {
      $profile=Perfil::model()->find('id_perfil_sistema=?', array(Yii::app()->user->id_perfil_sistema));
      $profileMenu=PerfilMenu::model()->find('id_perfil_sistema=? AND id_menu_sistema=?', array(Yii::app()->user->id_perfil_sistema, 3));
      if($profileMenu)
      {
        $actions = array();
        if($profileMenu->crear) $actions[] = 'create';
        if($profileMenu->modificar) $actions[] = 'update';
        if($profileMenu->modificar) $actions[] = 'perfilmenu';
        if($profileMenu->modificar) $actions[] = 'toggle';
        if($profileMenu->consultar) $actions[] = 'view';
        if($profileMenu->eliminar) $actions[] = 'delete';
        if($profileMenu->imprimir) $actions[] = 'index';
        if($profileMenu->consultar && $profileMenu->eliminar && $profileMenu->modificar) $actions[] = 'admin';
        $access[] = array(
          'allow',
          'actions'=>$actions,
          'users'=>array(Yii::app()->user->name),
        );
      }
    }
    $access[] = array('deny');
    return $access;
  }
  
  /**
  * Displays a particular model.
  * @param integer $id the ID of the model to be displayed
  */
  public function actionView($id)
  {
    $this->render('view',array('model'=>$this->loadModel($id)));
  }
  
  /**
  * Creates a new model.
  * If creation is successful, the browser will be redirected to the 'view' page.
  */
  public function actionCreate()
  {
    $model=new Perfil;
    
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    
    if(isset($_POST['Perfil']))
    {
      $model->attributes=$_POST['Perfil'];
      if($model->save())
        $this->redirect(array('view','id'=>$model->id_perfil_sistema));
    }
    
    $this->render('create',array('model'=>$model));
  }
  
  /**
  * Updates a particular model.
  * If update is successful, the browser will be redirected to the 'view' page.
  * @param integer $id the ID of the model to be updated
  */
  public function actionUpdate($id)
  {
    $model=$this->loadModel($id);
    
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    
    if(isset($_POST['Perfil']))
    {
      $model->attributes=$_POST['Perfil'];
      if($model->save())
        $this->redirect(array('view','id'=>$model->id_perfil_sistema));
    }
    
    $this->render('update',array('model'=>$model));
  }
  
  /**
  * Deletes a particular model.
  * If deletion is successful, the browser will be redirected to the 'admin' page.
  * @param integer $id the ID of the model to be deleted
  */
  public function actionDelete($id)
  {
    if(Yii::app()->request->isPostRequest)
    {
      // we only allow deletion via POST request
      $this->loadModel($id)->delete();
      // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
      if(!isset($_GET['ajax']))
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    else
      throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
  }
  
  /**
  * Lists all models.
  */
  public function actionIndex()
  {
    $dataProvider=new CActiveDataProvider('Perfil');
    $this->render('index',array('dataProvider'=>$dataProvider));
  }
  
  /**
  * Manages all models.
  */
  public function actionAdmin()
  {
    $model=new Perfil('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['Perfil']))
     $model->attributes=$_GET['Perfil'];
    
    $this->render('admin',array('model'=>$model));
  }
  
  /**
  * Returns the data model based on the primary key given in the GET variable.
  * If the data model is not found, an HTTP exception will be raised.
  * @param integer the ID of the model to be loaded
  */
  public function loadModel($id)
  {
    $model=Perfil::model()->findByPk($id);
    if($model===null)
      throw new CHttpException(404,'The requested page does not exist.');
    return $model;
  }
  
  /**
  * Performs the AJAX validation.
  * @param CModel the model to be validated
  */
  protected function performAjaxValidation($model)
  {
    if(isset($_POST['ajax']) && $_POST['ajax']==='perfil-form')
    {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }
  
  public function actionPerfilmenu()
  {
    $model=new PerfilMenu;
    
    if(isset($_POST['PerfilMenu'])) $model->attributes=$_POST['PerfilMenu'];
    
    if(isset($_POST['ajax-perfilmenu'])) $model->save();
    
    if(isset($_GET['delete']) && isset($_GET['id_perfil_sistema']) && isset($_GET['id_menu_sistema']))
      PerfilMenu::model()->findByAttributes(array('id_perfil_sistema'=>$_GET['id_perfil_sistema'], 'id_menu_sistema'=>$_GET['id_menu_sistema']))->delete();
    
    if($model->id_perfil_sistema)
      $menu = new CActiveDataProvider('PerfilMenu', array(
        'criteria'=>array(
          'with'=>array('menu'=>array('joinType'=>'INNER JOIN'),'perfil'=>array('joinType'=>'INNER JOIN')),
          'condition'=>'t.id_perfil_sistema='.$model->id_perfil_sistema,
        )
      ));
    elseif(isset($_GET['perfil']) && $_GET['perfil'] !== '')
      $menu = new CActiveDataProvider('PerfilMenu', array(
        'criteria'=>array(
          'with'=>array('menu'=>array('joinType'=>'INNER JOIN'),'perfil'=>array('joinType'=>'INNER JOIN')),
          'condition'=>'t.id_perfil_sistema='.$_GET['perfil'],
        )
      ));
    else
      $menu = new CActiveDataProvider('PerfilMenu', array(
        'criteria'=>array(
          'with'=>array('menu'=>array('joinType'=>'INNER JOIN'),'perfil'=>array('joinType'=>'INNER JOIN')),
          'condition'=>'t.id_perfil_sistema=0',
        )
      ));
    
    $this->render('perfilmenu', array('model'=>$model, 'menu'=>$menu));
  }
  
  public function actionToggle()
  {
      
    $perfilMenu = PerfilMenu::model()->findByAttributes(array('id_perfil_sistema'=>$_GET['pk']['id_perfil_sistema'], 'id_menu_sistema'=>$_GET['pk']['id_menu_sistema']));

    if($perfilMenu[$_GET['attribute']]!='0'){        
        //$perfilMenu->$_GET['attribute'] = 0;
       $perfilMenu[$_GET['attribute']]=0;
    }else{
        //$perfilMenu->$_GET['attribute'] = 1;
       $perfilMenu[$_GET['attribute']]=1;
    }
    
    $perfilMenu->save();
    Yii::app()->end();
  }
}
