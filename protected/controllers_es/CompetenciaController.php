<?php

class CompetenciaController extends Controller
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
'actions'=>array('create','update', 'admin'),
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
        
        
        $model=new Competencia;
        $paseCompetidor = new PaseCompetidor;
        $competenciaTipo = new CompetenciaTipo;
        $competenciaCategoria = new Categoria;
        if(isset($_POST['Competencia']))
        {
            
//            echo $uploadedFile=CUploadedFile::getInstance($model,'img'); die();
            
            $model->attributes=$_POST['Competencia'];
            
            $model->fecha_copetencia = $model->anio."-".$model->mes."-".$model->dia;
//            die($model->fecha_copetencia);
            $valorImg=0;
            
//            echo var_dump($_POST); die();
            //echo $_POST['Competencia']['img']; die();
            $rnd = rand(0,9999);  // generate random number between 0-9999
            $uploadedFile=CUploadedFile::getInstance($model,'img');
            if (!empty($uploadedFile)){
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->img = $fileName;
                $valorImg = 1;
            }else{
                $model->img = "default.png";
                $valorImg = 0;
            }
            if($model->save()){
               
                if($valorImg == 1){
                    $uploadedFile->saveAs(YiiBase::getPathOfAlias("webroot").'/images/competencia/'.$fileName);  // image will uplode to rootDirectory/banner/
                }else{
                    
                }
                //===========================================================//
                // Registro de  Pase Competidor
                //===========================================================//
                //echo var_dump($_POST); die();
                if($_POST['nextRowParticipante'] > 0) {
                    
//                    echo var_dump($_POST); die();
                    for($i=0; $i < $_POST['countRowParticipante']; $i++) {
//                        echo $_POST['anioPase'.$i]."-".$_POST['mesPase'.$i]."-".$_POST['diaPase'.$i]."<hr>";
//                        if($_POST['datepicker_'.$i]){
                            $paseCompetidorR = new PaseCompetidor;
                            $paseCompetidorR->dia = $_POST['diaPase'.$i];
                            $paseCompetidorR->mes = $_POST['mesPase'.$i];
                            $paseCompetidorR->anio = $_POST['anioPase'.$i];
                            $paseCompetidorR->fecha_pase = $_POST['anioPase'.$i]."-".$_POST['mesPase'.$i]."-".$_POST['diaPase'.$i];
                            $paseCompetidorR->valor = $_POST['PaseValor'.$i];
                            $paseCompetidorR->id_competencia = $model->id_copetencia;
                            
                            if($paseCompetidorR->save()){
//                                die("Exitoso");
                            }else{
                                print_r($categoriaItems->getErrors());
                                die();
                            }
//                        }
                    }
                }
                
               
                //===========================================================//
                // Registro de  Categorías
                //===========================================================//
                if (count($_POST['group_id_list'] > 0)){
                    for($i=0; $i < count($_POST['group_id_list']); $i++) {
                        $competenciaCategoria = new CompetenciaCategoria;
                        $competenciaCategoria->id_copetencia = $model->id_copetencia;
                        $competenciaCategoria->id_categoria = $_POST['group_id_list'][$i];
                        if($competenciaCategoria->save()){
//                                die("Exitoso");
                        }else{
                            print_r($competenciaCategoria->getErrors());
                            die();
                        }
                    }
                }
                //===========================================================//
                // Registro de  Valor por Categoría
                //===========================================================//
               
                if($_POST['nextRowParticipante2'] > 0) {

                    for($i=0; $i < $_POST['countRowParticipante2']; $i++) {
                        
                        if($_POST['tipoCategoria'.$i]){
                            $competenciaTipo = new CompetenciaTipo;
                            $competenciaTipo->id_copetencia = $model->id_copetencia;
                            $competenciaTipo->id_tipo_categoria = $_POST['tipoCategoria'.$i];
                            $competenciaTipo->dia = $_POST['diaPaseCategoria'.$i];
                            $competenciaTipo->mes = $_POST['mesPaseCategoria'.$i];
                            $competenciaTipo->anio = $_POST['anioPaseCategoria'.$i];
                            $competenciaTipo->fecha = $_POST['anioPaseCategoria'.$i]."-".$_POST['mesPaseCategoria'.$i]."-".$_POST['diaPaseCategoria'.$i];
                            $competenciaTipo->costo = $_POST['CostoTipoCategoria'.$i];
                            
                            if($competenciaTipo->save()){
//                                die("Exitoso");
                            }else{
                                print_r($competenciaTipo->getErrors());
                                die();
                            }
                        }
                    }
                }
//                echo var_dump($_POST);
//                die();
//                
            }else{
                print_r($model->getErrors());
                die();
            }
            $this->redirect(array('view','id'=>$model->id_copetencia));
        }
        $this->render('create',array(
        'model'=>$model, 
        'paseCompetidor'=>$paseCompetidor, 
        'competenciaTipo'=>$competenciaTipo,
        'competenciaCategoria'=>$competenciaCategoria,
        ));
    }

    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);
        $valorImg = $model->img;
        $paseCompetidor = new PaseCompetidor;
        $competenciaTipo = new CompetenciaTipo;
        $paseCompetidorCount = PaseCompetidor::model()->findAll('id_competencia ='.$id);
        $competenciaTipoCount = CompetenciaTipo::model()->findAll('id_copetencia ='.$id);
        $competenciaCategoria = new Categoria;
        if(isset($_POST['Competencia']))
        {
           
            $model->attributes=$_POST['Competencia'];
            $model->fecha_copetencia = $model->anio."-".$model->mes."-".$model->dia;
//             echo CUploadedFile::getInstance($model,'img'); die();
//             if(!$model->fecha_copetencia){
//                    $model->fecha_copetencia = date('Y-m-d H:i:s');
//             }else{
//                $model->fecha_copetencia = date("Y-m-d", strtotime($model->fecha_copetencia));
//             }
//             $model->fecha_copetencia = '2017-10-18 00:00:00';
            $rnd = rand(0,9999);  // generate random number between 0-9999
            
//            echo $uploadedFile=CUploadedFile::getInstance($model,'img'); die();
            $img = $uploadedFile=CUploadedFile::getInstance($model,'img');
            if($img == "" || $img == null){
//                echo "Vacio";
                $model->img = $valorImg;
            }else{
//                echo "Lleno";
                $uploadedFile=CUploadedFile::getInstance($model,'img');
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->img = $fileName;
            }
            
//            echo "img = ".$model->img; die();
//            if($uploadedFile=CUploadedFile::getInstance($model,'img')){
//                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
//                $model->img = $fileName;
//            }else{
//                $model->img = $model->img;
//            }
//            echo $model->visible; die();
            if($model->save()){
//                die("exito");
                if($img == "" || $img == null){
                    }else{
                    if(!empty($uploadedFile))  // check if uploaded file is set or not
                    {
                        $uploadedFile->saveAs(YiiBase::getPathOfAlias("webroot").'/images/competencia/'.$fileName);
                    }
                }
                
                
                
                //===========================================================//
                // Registro de  Pase Competidor
                //===========================================================//
//                echo "<br>".$_POST['countRowParticipante']; die();
                PaseCompetidor::model()->deleteAll('id_competencia ='.$id);
                if($_POST['nextRowParticipante'] > 0) {
                    

                    for($i=0; $i < $_POST['countRowParticipante']; $i++) {
                        
                        if($_POST['PaseValor'.$i]){
                            $paseCompetidorR = new PaseCompetidor;
                            $paseCompetidorR->dia = $_POST['diaPase'.$i];
                            $paseCompetidorR->mes = $_POST['mesPase'.$i];
                            $paseCompetidorR->anio = $_POST['anioPase'.$i];
                            $paseCompetidorR->fecha_pase = $_POST['anioPase'.$i]."-".$_POST['mesPase'.$i]."-".$_POST['diaPase'.$i];
                            //$paseCompetidorR->fecha_pase = date("Y-m-d", strtotime($_POST['datepicker_'.$i]));
                            $paseCompetidorR->valor = $_POST['PaseValor'.$i];
                            $paseCompetidorR->id_competencia = $model->id_copetencia;
                            
                            if($paseCompetidorR->save()){
//                                die("Exitoso");
                            }else{
                                print_r($categoriaItems->getErrors());
                                die();
                            }
                        }
                    }
                }
                
               
                //===========================================================//
                // Registro de  Categorías
                //===========================================================//
                
                
                if (count($_POST['group_id_list'] > 0)){
                    for($i=0; $i < count($_POST['group_id_list']); $i++) {
                        $competenciaCategoria = new CompetenciaCategoria;
                        $competenciaCategoria->id_copetencia = $model->id_copetencia;
                        $competenciaCategoria->id_categoria = $_POST['group_id_list'][$i];
                        if($competenciaCategoria->save()){
//                                die("Exitoso");
                        }else{
                            print_r($competenciaCategoria->getErrors());
                            die();
                        }
                    }
                }
                //===========================================================//
                // Registro de  Valor por Categoría
                //===========================================================//
//                echo $_POST['countRowParticipante2']; die();
                CompetenciaTipo::model()->deleteAll('id_copetencia ='.$id);
                if($_POST['nextRowParticipante2'] > 0) {

                    for($i=0; $i < $_POST['countRowParticipante2']; $i++) {
                        
                        if($_POST['tipoCategoria'.$i]){
                            $competenciaTipo = new CompetenciaTipo;
                            $competenciaTipo->id_copetencia = $model->id_copetencia;
                            $competenciaTipo->id_tipo_categoria = $_POST['tipoCategoria'.$i];
                            $competenciaTipo->dia = $_POST['diaPaseCategoria'.$i];
                            $competenciaTipo->mes = $_POST['mesPaseCategoria'.$i];
                            $competenciaTipo->anio = $_POST['anioPaseCategoria'.$i];
                            $competenciaTipo->fecha = $_POST['anioPaseCategoria'.$i]."-".$_POST['mesPaseCategoria'.$i]."-".$_POST['diaPaseCategoria'.$i];
                            $competenciaTipo->costo = $_POST['CostoTipoCategoria'.$i];
                            if($competenciaTipo->save()){
//                                die("Exitoso");
                            }else{
                                print_r($competenciaTipo->getErrors());
                                die();
                            }
                        }
                    }
                }
//                echo var_dump($_POST);
//                die();
                
                
                
            }else{
                echo print_r($model->getErrors());
                die();
            }
//            die();
            $this->redirect(array('view','id'=>$model->id_copetencia));
        }

        $this->render('update',array(
        'model'=>$model, 'paseCompetidor'=>$paseCompetidor, 
        'paseCompetidorCount'=>$paseCompetidorCount,
        'competenciaTipo'=>$competenciaTipo,
        'competenciaTipoCount'=>$competenciaTipoCount,
        'competenciaCategoria'=>$competenciaCategoria,
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
//$dataProvider=new CActiveDataProvider('Competencia');
$criteria=new CDbCriteria;
$criteria->addCondition('estatus != 0');
$dataProvider = new CActiveDataProvider('Competencia',array('criteria'=>$criteria,));
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Competencia('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Competencia']))
$model->attributes=$_GET['Competencia'];

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
$model=Competencia::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='competencia-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
