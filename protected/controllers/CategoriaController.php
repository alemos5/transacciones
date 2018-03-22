<?php

class CategoriaController extends Controller
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
return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update','admin', 'findCategoria'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
'users'=>array('admin'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new Categoria;
$categoriaItems = new CategoriaItemCalificacion;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Categoria']))
{
//    die($_POST['countRowParticipante']);
$model->attributes=$_POST['Categoria'];
if($model->save()){
//    echo var_dump($_POST);die(); 
    if($_POST['nextRowParticipante'] > 0) {
        //die();
        
        for($i=0; $i < $_POST['countRowParticipante']; $i++) {
            if($_POST['AddItemsCategoria'.$i]){
                $categoriaItems = new CategoriaItemCalificacion;
                $categoriaItems->id_categoria = $model->id_categoria;
                $categoriaItems->id_item_calificacion = $_POST['AddItemsCategoria'.$i];
                $categoriaItems->rango_min = $_POST['CategoriaItemCalificacion_rango_min'.$i];
                $categoriaItems->rango_max = $_POST['CategoriaItemCalificacion_rango_max'.$i];
                $categoriaItems->estatus = 1;
                if($categoriaItems->save()){
                    //die("Exitoso");
                }else{
                    print_r($categoriaItems->getErrors());
                    die();
                }
            }
        }
    }
}
$this->redirect(array('view','id'=>$model->id_categoria));
}

$this->render('create',array(
'model'=>$model, 'categoriaItems'=>$categoriaItems
));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);
$categoriaItems = new CategoriaItemCalificacion;
$categoriaItemsCount = CategoriaItemCalificacion::model()->findAll('id_categoria ='.$id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Categoria']))
{
$model->attributes=$_POST['Categoria'];
if($model->save()){
    if($_POST['nextRowParticipante'] > 0) {
//        echo var_dump($_POST);
//        die();
        CategoriaItemCalificacion::model()->deleteAll('id_categoria ='.$id);
        
        for($i=0; $i < $_POST['countRowParticipante']; $i++) {
//            echo "<br>".$i." -> ".$_POST['AddItemsCategoria'.$i];
            if($_POST['AddItemsCategoria'.$i]){
                $categoriaItems = new CategoriaItemCalificacion;
                $categoriaItems->id_categoria = $model->id_categoria;
                $categoriaItems->id_item_calificacion = $_POST['AddItemsCategoria'.$i];
                $categoriaItems->rango_min = $_POST['CategoriaItemCalificacion_rango_min'.$i];
                $categoriaItems->rango_max = $_POST['CategoriaItemCalificacion_rango_max'.$i];
                $categoriaItems->estatus = 1;
                if($categoriaItems->save()){
                    //die("Exitoso");
//                    echo "<br> Exitoso";
                }else{
                    echo print_r($categoriaItems->getErrors());
                    die();
                }
            }
        }
        
    }
}
$this->redirect(array('view','id'=>$model->id_categoria));
}

$this->render('update',array(
'model'=>$model, 'categoriaItems'=>$categoriaItems, 'categoriaItemsCount'=>$categoriaItemsCount
));
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
$dataProvider=new CActiveDataProvider('Categoria');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Categoria('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Categoria']))
$model->attributes=$_GET['Categoria'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Categoria::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='categoria-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}

    public function actionFindCategoria()
    {
        if($_POST['id_categoria'])
        {
          //$inscripcion = Inscripcion::model()->findAll('id_categoria ='.$_POST['id_categoria']);  
          //$count = interval count($inscripcion);
          
          $capacidadMax = (int)$model->competidor_max;
          $model= Categoria::model()->find('id_categoria ='.$_POST['id_categoria']);
          echo "<b>ID Categoría:</b> ".$model->id_categoria."<br>";
          echo "<b>Categoría:</b> ".$model->categoria."<br>";
          echo "<b>Descripción:</b> ".$model->descripcion."<br>";
          echo "<b>Edad mínima:</b> ".$model->edad_min." años de edad<br>";
          echo "<b>Edad máxima:</b> ".$model->edad_max." años de edad<br>";
          //echo "<b>Capacidad máxima:</b> ".$model->competidor_max." inscripciones<br>";
          
          //========================================================================//
          // Calcular el costo por competencia
          //========================================================================//
//          $competencias = CompetenciaTipo::model()>findAll('id_copetencia ='.$_POST['id_copetencia'].' AN id_tipo_categoria ='.$model->id_tipo_categoria);  
//          foreach ($competencias as $competencia){
////              echo  $competencia->costo."<br>";
//          }
          
//            echo "<hr>".$model->id_tipo_categoria."<hr>";
            
            $valorCategoria = 0;
            
            if($model->id_categoria == 27 || $model->id_categoria == 28 || $model->id_categoria == 30){
                $valorCategoria = 0;
            }else{
            
                $fechaActual = strtotime(date("Y-m-d H:i:s"));
                $competencias = CompetenciaTipo::model()->findAll('id_copetencia ='.$_POST['id_competencia'].' AND id_tipo_categoria ='.$model->id_tipo_categoria.' ORDER BY fecha DESC');
                foreach ($competencias as $competencia){
                    $fechaCategoria = strtotime($competencia->fecha);
    //                echo  "<hr>".$competencia->costo." - ".$competencia->fecha."<br>";
                    if($fechaCategoria >= $fechaActual){
                        $valorCategoria = $competencia->costo;
                    }
                }
            }
//            echo "<hr>".$valorCategoria;
            
            echo "<b>El costo de la categoría es de:</b> ".$valorCategoria."$<br>";
            ?>
            <input type="hidden" id="valorCategoriaController" name="valorCategoriaController" value="<?php echo $valorCategoria; ?>">
            <input type="hidden" id="cantidadPermitida" name="cantidadPermitida" value="<?php echo $model->id_tipo_categoria; ?>">
            <?php
          //echo "<b>Cupos Disponibles:</b> ".$capacidadMax-$count." cupos disponibles<br>";
        }
        
    }

}
