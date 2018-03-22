<?php

class DjController extends Controller
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
'actions'=>array('create','update', 'ronda', 'comprimirAudio', 'listadoCategoria', 'listadoInscripcion', 'listadoGeneral'),
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
public function actionRonda(){
    $this->render('ronda',array(
    
    ));
}
public function actionComprimirAudio(){
    function agregar_zip($dir, $zip){
//verificamos si $dir es un directorio
   if (is_dir($dir)) {
   //abrimos el directorio y lo asignamos a $da
      if ($da = opendir($dir)) {          
      //leemos del directorio hasta que termine
         while (($archivo = readdir($da))!== false) {  
        //Si dentro del directorio hallamos otro directorio 
        //llamamos recursivamente esta función
        //para que verifique dentro del nuevo directorio
           if (is_dir($dir . $archivo) && $archivo!="." && $archivo!=".."){
               agregar_zip($dir.$archivo . "/", $zip);  
    
           }elseif(is_file($dir.$archivo) && $archivo!="." && $archivo!=".."){
               //echo "Agregando archivo: $dir$archivo ";                                    
               $zip->addFile($dir.$archivo, $dir.$archivo);                    
           }            
        }
      //cerramos el directorio abierto en el momento
      closedir($da);
     }
  }      
}

//creamos una instancia de ZipArchive      
$zip = new ZipArchive();
     
//directorio a comprimir
//la barra inclinada al final es importante
//la ruta debe ser relativa no absoluta      
$dir = '/var/www/wlp/images/audio/';
     
//ruta donde guardar los archivos zip, ya debe existir
$rutaFinal= '/var/www/wlp/images/audio/';
     
$archivoZip = "audio.zip";  
     
if($zip->open($archivoZip,ZIPARCHIVE::CREATE)===true) {  
  agregar_zip($dir, $zip);
  $zip->close();
     
  //Muevo el archivo a la ruta definida
  @rename($archivoZip, "$rutaFinal$archivoZip");
     
  //Hasta aqui el archivo zip ya esta creado
     
                    
}

  //Verificar si el archivo ha sido creado
  if (file_exists($rutaFinal.$archivoZip)){
     //echo "Proceso Finalizado!! 
     //Descargar: $archivoZip";  
    ?>
    <a class="btn btn-primary"  href="<?php echo Yii::app()->request->baseUrl; ?>/images/audio/<?php echo $archivoZip; ?>">
        <?php echo __('Download Music'); ?>
    </a>
    <?php
  }else{
     echo "Error, archivo zip no ha sido creado!!";
  }

    
}

public function actionListadoGeneral($id_copetencia = Null, $id_categoria = Null)
{
//    echo var_dump($_GET); die();
    $id_copetencia = $_GET['idc'];
    $id_categoria = $_GET['idca_'];
    $idInscripcion = $_GET['idInscripcion'];
    $idInscripcionA = $_GET['idInscripcionAnterior'];
    if($idInscripcion){
        $idInscripcionAnterior = $idInscripcion;
        $inscripcion=Inscripcion::model()->findByPk($idInscripcion);
        $inscripcion->attributes=$_POST['idInscripcion'];
        $inscripcion->reproducida = 1;
        if($inscripcion->save()){
            $categoria = $inscripcion->id_categoria;
            $inscripcionTotal = Inscripcion::model()->findAll('id_categoria ='.$categoria);
            $countInscripciones = Inscripcion::model()->findAll('id_categoria ='.$categoria.' AND reproducida = 1');
            if($inscripcionTotal == $countInscripciones){
                Yii::app()->db->createCommand("UPDATE competencia_categoria SET reproducida = 1 WHERE id_copetencia = ".$id_copetencia." AND id_categoria =".$categoria)->query();
            }
        }else{
            print_r($inscripcion->getErrors());
            die();
        }
    }
    if($idInscripcionA){
        $inscripcion=Inscripcion::model()->findByPk($idInscripcionA);
        $inscripcion->attributes=$_POST['idInscripcionAnterior'];
        $inscripcion->reproducida = 0;
        if($inscripcion->save()){
            
        }else{
            print_r("Atras: ".$inscripcion->getErrors());
            die();
        }
    }
    //$dataProvider=new CActiveDataProvider('Dj');
    $categorias = CompetenciaCategoria::model()->findAll('id_copetencia ='.$id_copetencia.' AND reproducida = 0 ORDER BY orden ASC');
    
    $this->render('_listado_general',array(
    'id_copetencia'=>$id_copetencia, 'id_categoria'=>$id_categoria, 'categorias'=>$categorias, 'idInscripcionAnterior'=>$idInscripcionAnterior
    ));
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
$model=new Dj;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Dj']))
{
$model->attributes=$_POST['Dj'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_dj));
}

$this->render('create',array(
'model'=>$model,
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

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Dj']))
{
$model->attributes=$_POST['Dj'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_dj));
}

$this->render('update',array(
'model'=>$model,
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
$dataProvider=new CActiveDataProvider('Dj');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

public function actionListadoCategoria($id_copetencia = Null)
{
    $id_copetencia = $_GET['idc'];
    //$dataProvider=new CActiveDataProvider('Dj');
    $this->render('_listado_categoria',array(
    'id_copetencia'=>$id_copetencia,
    ));
}
public function actionListadoInscripcion($id_copetencia = Null, $id_categoria = Null)
{
//    echo var_dump($_GET); die();
    $id_copetencia = $_GET['idc'];
    $id_categoria = $_GET['idca_'];
    //$dataProvider=new CActiveDataProvider('Dj');
    $this->render('_listado_inscripcion',array(
    'id_copetencia'=>$id_copetencia, 'id_categoria'=>$id_categoria
    ));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Dj('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Dj']))
$model->attributes=$_GET['Dj'];

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
$model=Dj::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='dj-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
