<?php

class ClientesSubclienteController extends Controller
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
'actions'=>array('create','update', 'eliminarSubcliente', 'tracking', 'findSubCliente', 'ordenes'),
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
public function actionOrdenes(){
    $id_subcliente = $_POST['id_subcliente'];
    if($id_subcliente){
        $ordenes = Ordenes::model()->findAll('code_cliente = "'.$id_subcliente.'"');
        ?>
<div class="panel panel-default">
  <div class="panel-heading">Resultados Encontrados</div>
  <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>ID Orden</td> 
                    <td>Orden</td> 
                    <!--<td>Número de Guía</td>--> 
                    <?php 
                    //echo Yii::app()->user->id_perfil_sistema;
                        if(Yii::app()->user->id_perfil_sistema=='1'){
                            ?><td>Número de Guía</td><?php
                        }else{
                            ?><td>Descripción</td><?php
                        }
                    ?>
                    <td>Tracking</td> 
                    <td>Estatus</td> 
                    <td>Fecha de Registro</td> 
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($ordenes as $orden){
                    ?>
                    <tr>
                        <td><?php echo $orden->id_orden; ?></td>
                        <td><?php echo $orden->ware_reciept; ?></td>
                        
                        <?php 
                        if(Yii::app()->user->id_perfil_sistema=='1'){
                            ?><td><?php echo $orden->numero_guia; ?></td><?php
                        }else{
                            ?><td><?php echo $orden->descripcion; ?></td><?php
                        }
                        ?>
                        
                        
                        
                        <td><?php echo $orden->tracking; ?></td>
                        <td>
                            <?php

                            switch ($orden->estatus_manifiesto) {
                                case '10':
                                    $estado = 'Paquete listo para el envio.';
                                    $mensaje = 'Su orden esta lista para ser despachado al destino elegido.'.'<br>'.'El proceso de entrega de su orden puede tardar 4 dias habiles, contados desde el dia siguiente despues del pago de su factura.';
                                    break;

                                case '11':
                                    $estado = 'Entregado a la aerolinea';
                                    $mensaje = 'Su paquete esta en transito, actualmente se encuentra procesando por la aerolinea.';
                                    break;

                                case '12':
                                    $estado = 'Pais destino';
                                    $mensaje = 'Su paquete continua en transito;  se encuentra en el Pais de destino.';
                                    break;

                                case '13':
                                    $estado = 'Proceso de Aduanas';
                                    $mensaje = 'Su paquete esta en transito, ingreso a proceso de Aduanas, esto puede tardar de 1 a 2 dias.';

                                    break;

                                case '14':
                                    $estado = 'Liberacion de Aduanas';
                                    $mensaje = 'Su paquete esta en transito, fue liberado de aduanas sin ninguna novedad.';

                                    break;

                                case '15':
                                    $estado = 'Procesando para entrega local';
                                    $mensaje = 'Su paquete esta en transito, se encuentra en nuestra bodega Bogota y esta en proceso para ser entregado a la trasnportadora terrestre local.';
                                    break;

                                default:
                                    $estado = 'En Bodega';
                                    break;
                            }
                            echo $estado;
                            ?>
                        </td>
                        <td><?php echo $orden->fecha; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
  </div>
</div>

        <?php
    }
}

public function actionFindSubCliente()
  {
    if($_POST['id_cliente'])
    {
      $model= Clientes::model()->findAll('id_cliente=:id_cliente ORDER BY nombre', array(':id_cliente'=>$_POST['id_cliente']));
      echo "<option value=\"\">Seleccione...</option>";
      foreach($model as $cliente)
      {
        echo "<option value=\"".$cliente->code_cliente."\">".$cliente->nombre."</option>";
      }
    }
    else echo "<option value=\"\">Seleccione...</option>";
    Yii::app()->end();
  }

public function actionEliminarSubcliente(){
    $id = $_POST['id'];
    if($id){
        $this->loadModel($id)->delete();
    }
}

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
    $model=new ClientesSubcliente;

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['ClientesSubcliente']))
    {
        
        //===========================================================//
        // Registro de Clientes
        //===========================================================//
        $model->attributes=$_POST['ClientesSubcliente'];
        $cliente = Clientes::model()->find('id_cliente ='.$model->id_cliente);
        //===========================================================//
        // Registro de Usuario para el clientes
        //===========================================================//

        $usuario = new Usuario;
        $usuario->cedula = $cliente->id_cliente;
        $usuario->usuario = $cliente->email;
        $usuario->primer_nombre= $cliente->nombre;
        $usuario->segundo_nombre= $cliente->nombre;
        $usuario->primer_apellido= $cliente->nombre;
        $usuario->segundo_apellido= $cliente->nombre;
        $usuario->fecha_nacimiento= date('d-m-Y');
        $usuario->sexo= 1;
        $usuario->observacion_personal= "Registro de Cliente";
        $usuario->contrasena= $cliente->password;
        $usuario->fecha_registro= date('Y-m-d H:i:s');
        $usuario->estatus= 1;
        $usuario->estatus_contrasena= 1;
        $usuario->id_perfil_sistema= 2;
        $usuario->direccion_ip= '127.0.0.1';
        $usuario->id_registrador= Yii::app()->user->id_usuario_sistema;
        $usuario->id_sociedad= 1;
        $usuario->correo= $cliente->email;
        $usuario->id_cliente= $cliente->id_cliente;
        $usuario->code_cliente= $cliente->code_cliente;
        $usuario->padre_hijo= 1;
        
        
        if($usuario->save()){

        }else{
             echo "Cliente Padre: <hr>";
           print_r($usuario->getErrors());
           die();
        }
        
        $correlativo = 1;
        
        if (count($_POST['group_id_list'] > 0)){
            for($i=0; $i < count($_POST['group_id_list']); $i++) {
                
                
                
                
                
                //===========================================================//
                // Registro de Subclientes
                //===========================================================//
                $clienteHijo = Clientes::model()->find('id_cliente ='.$_POST['group_id_list'][$i]);
                
                $subcliente =new ClientesSubcliente;
                $subcliente->id_cliente = $model->id_cliente;
                $subcliente->id_cliente_hijo = $_POST['group_id_list'][$i];
                $subcliente->code_cliente_padre = $cliente->code_cliente;
                $subcliente->code_cliente_hijo = $clienteHijo->code_cliente;
                $codigoPadreHijo = $cliente->code_cliente.'-'.$correlativo;
                $subcliente->code_padre_hijo = $codigoPadreHijo;
                $subcliente->fecha_registro = date('Y-m-d H:i:s');
                $subcliente->estatus = 1;
                $subcliente->descripcioon = 'Np';
                        //$_POST['group_id_list'][$i];
                if($subcliente->save()){
                    //===========================================================//
                    // Registro de Usuario para el Subclientes
                    //===========================================================//
                    
                    $usuario = new Usuario;
                    $usuario->cedula = $clienteHijo->id_cliente;
                    $usuario->usuario = $clienteHijo->email;
                    $usuario->primer_nombre= $clienteHijo->nombre;
                    $usuario->segundo_nombre= $clienteHijo->nombre;
                    $usuario->primer_apellido= $clienteHijo->nombre;
                    $usuario->segundo_apellido= $clienteHijo->nombre;
                    $usuario->fecha_nacimiento= date('d-m-Y');
                    $usuario->sexo= 1;
                    $usuario->observacion_personal= "Registro de Cliente";
                    $usuario->contrasena= $clienteHijo->password;
                    $usuario->fecha_registro= date('Y-m-d H:i:s');
                    $usuario->estatus= 1;
                    $usuario->estatus_contrasena= 1;
                    $usuario->id_perfil_sistema= 2;
                    $usuario->direccion_ip= '127.0.0.1';
                    $usuario->id_registrador= Yii::app()->user->id_usuario_sistema;
                    $usuario->id_sociedad= 1;
                    $usuario->correo= $clienteHijo->email;
                    $usuario->id_cliente= $clienteHijo->id_cliente;
                    $usuario->code_cliente= $clienteHijo->code_cliente;
                    $usuario->padre_hijo= 0;


                    if($usuario->save()){

                    }else{
                       echo "Cliente Hijo: <hr>";
                       print_r($usuario->getErrors());
                       die();
                    }
                    
                    
                }else{
                    print_r($subcliente->getErrors());
                    die();
                }
                $correlativo++; 
            }
        }
        $this->redirect(array('view','id'=>$model->id_clientes_subcliente));
        
//        $model->attributes=$_POST['ClientesSubcliente'];
//        i$f($model->save())
//        $this->redirect(array('view','id'=>$model->id_clientes_subcliente));
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

    if(isset($_POST['ClientesSubcliente']))
    {
        $model->attributes=$_POST['ClientesSubcliente'];
        $cliente = Clientes::model()->find('id_cliente ='.$model->id_cliente);
        //===========================================================//
        // Registro de Clientes
        //===========================================================//
        $clientesHijos = ClientesSubcliente::model()->findAll('id_cliente ='.$model->id_cliente);
        $correlativo = count($clientesHijos)+1;
        if (count($_POST['group_id_list'] > 0)){
            for($i=0; $i < count($_POST['group_id_list']); $i++) {
                
                $clienteHijo = Clientes::model()->find('id_cliente ='.$_POST['group_id_list'][$i]);
                
                $subcliente =new ClientesSubcliente;
                $subcliente->id_cliente = $model->id_cliente;
                $subcliente->id_cliente_hijo = $_POST['group_id_list'][$i];
                $subcliente->code_cliente_padre = $cliente->code_cliente;
                $subcliente->code_cliente_hijo = $clienteHijo->code_cliente;
                $codigoPadreHijo = $cliente->code_cliente.'-'.$correlativo;
                $subcliente->code_padre_hijo = $codigoPadreHijo;
                $subcliente->fecha_registro = date('Y-m-d H:i:s');
                $subcliente->estatus = 1;
                $subcliente->descripcioon = 'Np';
                        //$_POST['group_id_list'][$i];
                if($subcliente->save()){
//                                die("Exitoso");
                }else{
                    print_r($model->getErrors());
                    die();
                }
                $correlativo++; 
            }
        }
        
        
//        if($model->save())
        $this->redirect(array('view','id'=>$model->id_clientes_subcliente));
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

public function actionTracking(){
    
    $model =  new ClientesSubcliente;
    $this->render('tracking',array(
        'model'=>$model
    ));
}

public function actionIndex()
{
$dataProvider=new CActiveDataProvider('ClientesSubcliente', array(
    'criteria'=>array(
        'condition'=>'',
        'group' => 'id_cliente',
        'order'=>'fecha_registro DESC',
        
    )));
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new ClientesSubcliente('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['ClientesSubcliente']))
$model->attributes=$_GET['ClientesSubcliente'];

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
$model=ClientesSubcliente::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='clientes-subcliente-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
