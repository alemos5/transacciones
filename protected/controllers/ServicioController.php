<?php

class ServicioController extends Controller
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
'actions'=>array('create','update', 'findServicio', 'findServicioCotizacion', 'findServicioDatos', 'admin', 'tablaContenido', 'tablaContenidoUsuario'),
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

public function actionTablaContenido(){
    
    $servicioImpuestos = ServicioImpuesto::model()->findAll('id_servicio ='.$_POST['id_servicio']);
    $accion = $_POST['accion'];
    $items = $_POST['items'];
    ?>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <td><center><strong>Gastos</strong></center></td>
                <td><center><strong>Tarifa</strong></center></td>
                <td><center><strong>Precio Especial</strong></center></td>
                <td><center><strong>Costo Total</strong></center></td>
                <td><center><strong>Kilo</strong></center></td>
                <td><center><strong>Libra</strong></center></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $tarifa = 0;
            $precioEspecial = 0;
            $costoTotal = 0;
            $kiloTotal = 0;
            $libraTotal = 0;
            foreach ($servicioImpuestos as $servicioImpuesto){
                ?>
                <tr>
                    <td><center><?php echo $servicioImpuesto->idImpuesto->impuesto; ?></center></td>
                    <td><center><?php echo $servicioImpuesto->precio_sugerido; $tarifa += $servicioImpuesto->precio_sugerido; ?></center></td>
                    <td>
                        <center>
                            <?php 
                                $servicioEspecial = ServicioUsuario::model()->find('id_usuario ='.Yii::app()->user->id_usuario_sistema.' AND id_servicio ='.$servicioImpuesto->id_servicio.' AND id_impuesto ='.$servicioImpuesto->id_impuesto);
                                if($servicioEspecial){
                                    echo $precio = $servicioEspecial->costo_especial;
                                }else{
                                    echo $precio = $servicioImpuesto->precio_sugerido;
                                }
                                $precioEspecial += $precio;
                            ?>
                        </center>
                    </td>
                    <?php
                    if($accion == 0){
                        ?>
                        <td><center>0</center></td>
                        <td><center>0</center></td>
                        <td><center>0</center></td>
                        <?php 
                    }else{
                        
                        $kg = $_POST['peso']/2.2046;
                        $kg = number_format($kg, 10, '.', '');
                        $lb = $_POST['peso'];
                        $cantidad = $_POST['cantidad'];
                        ?>
                        <td>
                            <center>
                                <?php
                                   $costoTotalTemporal = 0; 
//                                echo "Armando";
                                    if($servicioImpuesto->id_calculo_a == 1){
//                                       echo "Calculo =".$precio." x ".$kg."<hr>";
                                       echo $costoTotalTemporal = number_format($precio*$kg, 10, '.', '');  
                                       $costoTotal += number_format($precio*$kg, 10, '.', '');  
                                    }
                                    if($servicioImpuesto->id_calculo_a == 2){
//                                        echo "Calculo =".$precio." x ".$cantidad."<hr>";
                                        echo  $costoTotalTemporal = number_format($precio*$cantidad, 10, '.', '');
                                        $costoTotal += number_format($precio*$cantidad, 10, '.', '');  
                                    }
                                ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php 
                                
                                    if($servicioImpuesto->kg_c == 0){
                                        $kiloTotal += number_format($precio*$kg, 10, '.', '');  
                                        echo number_format($precio*$kg, 10, '.', ''); 
                                    }else{
                                        $kiloTotal += number_format($precio/$kg, 10, '.', '');
                                        echo number_format($precio/$kg, 10, '.', '');
                                    }
//                                    echo $kiloTotal;  
                                ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php 
                                    if($servicioImpuesto->lb_c == 0){
                                        $libraTotal += number_format($costoTotalTemporal*$lb, 10, '.', '');  
                                        echo number_format($costoTotalTemporal*$lb, 10, '.', '');  
                                    }else{
                                        $libraTotal += number_format($costoTotalTemporal/$lb, 10, '.', '');  
                                        echo number_format($costoTotalTemporal/$lb, 10, '.', '');  
                                    }
                                
//                                    echo $libraTotal;
                                ?>
                            </center>
                        </td>
                        <?php 
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <center>
                        <strong>Total</strong>
                    </center>
                </td>
                <td>
                    <center>
                        <strong><?php echo $tarifa; ?></strong>
                    </center>
                </td>
                <td>
                    <center>
                        <strong><?php echo $precioEspecial; ?></strong>
                    </center>
                </td>
                <td>
                    <center>
                        <strong><?php echo $costoTotal; ?></strong>
                        <input type="hidden" value="<?php echo $costoTotal; ?>" name="CostoTotal<?php echo $items; ?>" id="CostoTotal<?php echo $items; ?>">
                    </center>
                </td>
                <td>
                    <center>
                        <strong><?php echo $kiloTotal; ?></strong>
                    </center>
                </td>
                <td>
                    <center>
                        <strong><?php echo $libraTotal; ?></strong>
                    </center>
                </td>
            </tr>
        </tfoot>
    </table>
    <?php
}
public function actionTablaContenidoUsuario(){
    
    $items = $_POST['items'];
    $servicioImpuestos = ServicioImpuesto::model()->findAll('id_servicio ='.$_POST['id_servicio']);
    $accion = $_POST['accion'];
    ?>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <td style=" width: 33%;"><center><strong>Gastos</strong></center></td>
                <td style=" width: 33%;"><center><strong>Precio</strong></center></td>
                <td style=" width: 33%;"><center><strong>Precio Especial</strong></center></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($servicioImpuestos as $servicioImpuesto){
                ?>
                <tr>
                    <td><center><?php echo $servicioImpuesto->idImpuesto->impuesto; ?></center></td>
                    <td><center><?php echo $servicioImpuesto->precio_sugerido; ?></center></td>
                    <td>
                        <center>
                            <input onkeyup="sumaPrecioSugerido(this.value, <?php echo $items; ?>, <?php echo $i ?>)" onkeypress="return NumCheck(event, this)" id="PrecioEspecial<?php echo $items; ?>_<?php echo $i ?>" class="span5 form-control" type="text" maxlength="9" placeholder="0.0" value="" name="PrecioEspecial<?php echo $items; ?>_<?php echo $i ?>">
                        </center>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
    <?php
}

public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

public function actionfindServicio(){
    if($_POST['id_servicio']){
        $servicio = Servicio::model()->find('id_servicio = '.$_POST['id_servicio']);
        echo $servicio->precio_sugerido;
    }
}

public function actionfindServicioCotizacion(){
    if($_POST['id_servicio']){
        
        $servicioEspecial = ServicioUsuario::model()->findAll('id_servicio ='.$_POST['id_servicio'].' AND id_usuario ='.Yii::app()->user->id_usuario_sistema);
        if($servicioEspecial){
            
            $serviciosEspeciales = ServicioUsuario::model()->findAll('id_servicio = '.$_POST['id_servicio'].' AND id_usuario ='.Yii::app()->user->id_usuario_sistema);
            $costoEspecial = 0;
            foreach ($serviciosEspeciales as $servicioEspecial){
                $costoEspecial += $servicioEspecial->costo_especial;
            }
            echo number_format($costoEspecial, 2, '.', '');
        }else{
            $servicio = Servicio::model()->find('id_servicio = '.$_POST['id_servicio']);
            echo $servicio->precio_sugerido;
        }
    }
}

public function actionfindServicioDatos(){
    if($_POST['id_servicio']){
        
        $servicioImpuestos = ServicioImpuesto::model()->findAll('id_servicio ='.$_POST['id_servicio']);
//        echo "<ul>";
            
        foreach ($servicioImpuestos as $servicioImpuesto){
        ?>
        <ul>
            <li><?php echo "Gasto:: ".$servicioImpuesto->idImpuesto->impuesto; ?>
                <ul>
                    <li><?php echo "Porcentaje: ".$servicioImpuesto->porcentaje; ?></li>
                    <li><?php echo "Precio: ".$servicioImpuesto->precio_impuesto; ?></li>
                </ul>
            </li>
        </ul>
        <?php
//        echo "</ul>";
        }
    }
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
    $model=new Servicio;
    $servicioImpuesto = new ServicioImpuesto();
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    
//    echo var_dump($_POST);
//    die();
    if(isset($_POST['Servicio']))
    {
        
        
        
        $model->attributes=$_POST['Servicio'];
        $model->porcentaje_ganacia = 0;
        $model->precio_neto = 0;
        $model->precio_sugerido = 0;
        if($model->save()){
            $precioNeto = 0;
            $precioSugerido = 0;
            $porcentajeGanancia = 0;
            if($_POST['nextRowParticipante'] > 0) {
//                echo var_dump($_POST);
//                die();
                $totalImpuesto = 0;
                for($i=0; $i <= $_POST['countRowParticipante']; $i++) {
                    if($_POST['AddItemsImpuesto'.$i]){
                        $servicioImpuestoItems = new ServicioImpuesto;
                        $servicioImpuestoItems->id_impuesto = $_POST['AddItemsImpuesto'.$i];
                        $servicioImpuestoItems->id_servicio = $model->id_servicio;
                        $servicioImpuestoItems->id_unidad_medida = $_POST['AddItemsImpuestoUnidadMedida'.$i];
                        $servicioImpuestoItems->id_tipo_cobro = $_POST['AddItemsImpuestoTipoCobro'.$i];
                        $servicioImpuestoItems->id_calculo_a = $_POST['AddItemsCalculo_a'.$i];
                        $servicioImpuestoItems->precio_impuesto = $_POST['ImpuestoCosto'.$i];
                        $servicioImpuestoItems->precio_sugerido = $_POST['PrecioSugerido'.$i];
                        
                        $servicioImpuestoItems->kg_c = $_POST['AddItemsKg_c'.$i];
                        $servicioImpuestoItems->lb_c = $_POST['AddItemsLb_c'.$i];
                        
                        $servicioImpuestoItems->porcentaje = 0.00;
                        
                        $precioNeto += $_POST['ImpuestoCosto'.$i];
                        $precioSugerido += $_POST['PrecioSugerido'.$i];
                        
//                        echo $servicioImpuestoItems->precio_sugerido."<hr>";
                        
                        
                        $servicioImpuestoItems->estatus = 1;
                        if($servicioImpuestoItems->save()){
                            
//                            $gatoOperativo = $precio_neto+$totalImpuesto;
                            $porcentajeGanancia = (($precioSugerido*100)/$precioNeto)-100;
                            
                            $servicio=Servicio::model()->findByPk($model->id_servicio);
                            $servicio->attributes=$gatoOperativo;
                            $servicio->precio_neto = $precioNeto;
                            $servicio->precio_impuesto = $precioNeto;
                            $servicio->gasto_operativo = 0.00;
                            $servicio->precio_sugerido = $precioSugerido;
                            $servicio->porcentaje_ganacia = number_format($porcentajeGanancia, 2, '.', '');
                            if($servicio->save()){
                                
                            }else{
                                echo "Error en registro de servicio Update<br>".$porcentajeGanancia."<hr>";
                                print_r($servicio->getErrors());
                                die();
                            }
                        }else{
                            echo "Error en registro de servicio Impuesto <hr>";
                            print_r($servicioImpuestoItems->getErrors());
                            die();
                        }
                    }
                }
//                die();
            }
            
        }else{
            echo "Error en registro de servicio Original<hr>";
             print_r($model->getErrors());
             die();
           //$this->redirect(array('view','id'=>$model->id_servicio));
        }
        $this->redirect(array('view','id'=>$model->id_servicio));
    }

    $this->render('create',array(
    'model'=>$model, 'servicioImpuesto'=>$servicioImpuesto
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
    $servicioImpuesto = new ServicioImpuesto();
    $servicioItemsCount = ServicioImpuesto::model()->findAll('id_servicio ='.$id);
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
//    echo var_dump($_POST); die();
    if(isset($_POST['Servicio']))
    {
    $model->attributes=$_POST['Servicio'];
    $model->porcentaje_ganacia = 0;
    $model->precio_neto = 0;
    $model->precio_sugerido = 0;
    if($model->save()){
        ServicioImpuesto::model()->deleteAll('id_servicio ='.$id);
        $totalImpuesto = 0;
        for($i=0; $i < $_POST['countRowParticipante']; $i++) {
            if($_POST['AddItemsImpuesto'.$i]){
                $servicioImpuestoItems = new ServicioImpuesto;
                $servicioImpuestoItems->id_impuesto = $_POST['AddItemsImpuesto'.$i];
                $servicioImpuestoItems->id_servicio = $model->id_servicio;
                $servicioImpuestoItems->id_unidad_medida = $_POST['AddItemsImpuestoUnidadMedida'.$i];
                $servicioImpuestoItems->id_tipo_cobro = $_POST['AddItemsImpuestoTipoCobro'.$i];
                $servicioImpuestoItems->id_calculo_a = $_POST['AddItemsCalculo_a'.$i];
                $servicioImpuestoItems->precio_impuesto = number_format($_POST['ImpuestoCosto'.$i], 2, '.', '');
                $servicioImpuestoItems->precio_sugerido = number_format($_POST['PrecioSugerido'.$i], 2, '.', ''); 
                
                $servicioImpuestoItems->kg_c = $_POST['AddItemsKg_c'.$i];
                $servicioImpuestoItems->lb_c = $_POST['AddItemsLb_c'.$i];
                        
                $servicioImpuestoItems->porcentaje = 0.00;

                $precioNeto += $_POST['ImpuestoCosto'.$i];
                $precioSugerido += $_POST['PrecioSugerido'.$i];

//                        echo $servicioImpuestoItems->precio_sugerido."<hr>";


                $servicioImpuestoItems->estatus = 1;
                if($servicioImpuestoItems->save()){

//                            $gatoOperativo = $precio_neto+$totalImpuesto;
                    $porcentajeGanancia = (($precioSugerido*100)/$precioNeto)-100;

                    $servicio=Servicio::model()->findByPk($model->id_servicio);
                    $servicio->attributes=$gatoOperativo;
                    $servicio->precio_neto = $precioNeto;
                    $servicio->precio_impuesto = $precioNeto;
                    $servicio->gasto_operativo = 0.00;
                    $servicio->precio_sugerido = $precioSugerido;
                    $servicio->porcentaje_ganacia = number_format($porcentajeGanancia, 2, '.', '');
                    if($servicio->save()){

                    }else{
                        echo "Error en registro de servicio Update<br>".$porcentajeGanancia."<hr>";
                        print_r($servicio->getErrors());
                        die();
                    }
                }else{
                    echo "Error en registro de servicio Impuesto :".$servicioImpuestoItems->precio_sugerido." <hr>";
                    print_r($servicioImpuestoItems->getErrors());
                    die();
                }
            }
        }
        
        
    }else{
        echo "Aqui";
        print_r($model->getErrors());
        die();
    }
    $this->redirect(array('view','id'=>$model->id_servicio));
    }

    $this->render('update',array(
    'model'=>$model, 'servicioImpuesto'=>$servicioImpuesto, 'servicioItemsCount'=>$servicioItemsCount
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
$dataProvider=new CActiveDataProvider('Servicio');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Servicio('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Servicio']))
$model->attributes=$_GET['Servicio'];

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
$model=Servicio::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='servicio-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
