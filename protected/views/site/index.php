

<?php
$this->pageTitle=Yii::app()->name;
$this->menu=array(
array('label'=>__('My Profile'),'url'=>array('/usuario/'.Yii::app()->user->id_usuario_sistema)),
array('label'=>__('Ordenes / consolidaciones'),'url'=>array('/usuario/ordenPersonal')),
);
?>
<span  class="ez">
    Tu información
</span>

		
		
<?php 
$usuario = Usuario::model()->find('id_usuario_sistema ='.Yii::app()->user->id_usuario_sistema);
$usuario = $usuario->primer_nombre." ".$usuario->primer_apellido;  
$cliente = Clientes::model()->find("code_cliente = '".Yii::app()->user->code_cliente."'");
?>


<div class="pd-inner">
    <?php if(Yii::app()->user->id_perfil_sistema=='1'){ ?> 
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div style="background-color: #578EBE; color: #FFF;" class="panel panel-primary">
                <div class="panel-body">
                    <h3>Ordenes / Consolidaciones</h3>
                </div>
                <div style="background-color: #3D75A5;" class="panel-footer">
                    <a style="color: #FFF;" href="<?php echo Yii::app()->request->baseUrl; ?>/ordenes/create">
                        Crear Orden
                    </a> 
                    &nbsp;|&nbsp;
                    <a style="color: #FFF;" href="<?php echo Yii::app()->request->baseUrl; ?>/ordenes/admin">
                        Administrar Ordenes
                    </a> 
                    &nbsp;|&nbsp;
                    <a style="color: #FFF;" href="<?php echo Yii::app()->request->baseUrl; ?>/consolidaciones/admin">
                        Administrar Consolidaciones
                    </a> 
                    
                    
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div style="background-color: #578EBE; color: #FFF;" class="panel panel-primary">
                <div class="panel-body">
                    <h3>Almacen Tracking</h3>
                </div>
                <div style="background-color: #3D75A5;" class="panel-footer">
                    <a style="color: #FFF;" href="<?php echo Yii::app()->request->baseUrl; ?>/traking/admin">
                        Administrar Tracking
                    </a> 
                    &nbsp;|&nbsp;
                    <a style="color: #FFF;" href="<?php echo Yii::app()->request->baseUrl; ?>/traking/create">
                        Ingresar Tracking
                    </a> 
                    
                    
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div style="background-color: #578EBE; color: #FFF;" class="panel panel-primary">
                <div class="panel-body">
                    <h3>Clientes</h3>
                </div>
                <div style="background-color: #3D75A5;" class="panel-footer">
                    <a style="color: #FFF;" href="<?php echo Yii::app()->request->baseUrl; ?>/ordenes/create">
                        Administrar Clientes
                    </a> 
                    &nbsp;|&nbsp;
                    <a style="color: #FFF;" href="<?php echo Yii::app()->request->baseUrl; ?>/ordenes/admin">
                        Crear Cliente
                    </a> 
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div style="background-color: #578EBE; color: #FFF;" class="panel panel-primary">
                <div class="panel-body">
                    <h3>Generar Ordenes</h3>
                </div>
                <div style="background-color: #3D75A5;" class="panel-footer">
                    <a style="color: #FFF;" href="<?php echo Yii::app()->request->baseUrl; ?>/subclienteOrdenes/admin">
                        Administrar Ordenes por Subclientes
                    </a> 
                    &nbsp;|&nbsp;
                    <a style="color: #FFF;" href="<?php echo Yii::app()->request->baseUrl; ?>/subclienteOrdenes/create">
                        Crear ordenes por Subclienes
                    </a> 
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            
        </div>
        <div class="col-sm-12 col-md-4">
            
        </div>
    </div>
    <?php }else{ ?>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <center>
                        <h4>Tu dirección en USA</h4>
                        <table class="table table-hover">
                            <tr>
                                <td><b>Nombre Completo:</b></td>
                                <td><?php echo $cliente->nombre; ?></td>
                            </tr>
                            <tr>
                                <td><b>Dirección:</b> </td>
                                <td>6985 nw 50th Street/<?php echo Yii::app()->user->code_cliente; ?></td>
                            </tr>
                            <tr>
                                <td><b>City:</b></td>
                                <td>Miami</td>
                            </tr>
                            <tr>
                                <td><b>State:</b></td>
                                <td>Florida</td>
                            </tr>
                            <tr>
                                <td><b>ZIP:</b></td>
                                <td>33122</td>
                            </tr>
                        </table>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <center>
                        <h4>Destinatario</h4>
                        <table class="table table-hover">
                            
                            <tr>
                                <td><b>Nombre Completo:</b></td>
                                <td><?php echo $cliente->nombre; ?></td>
                            </tr>
                            <tr>
                                <td><b>Código Cliente:</b></td>
                                <td><?php echo Yii::app()->user->code_cliente; ?></td>
                            </tr>
                            <tr>
                                <td><b>Dirección:</b></td>
                                <td><?php echo $cliente->direccion; ?></td>
                            </tr>
                            <tr>
                                <td><b>Ciudad:</b></td>
                                <td><?php echo $cliente->estado; ?></td>
                            </tr>
                            <tr>
                                <td><b>País:</b></td>
                                <td><?php echo $cliente->ciudad; ?></td>
                            </tr>
                        </table>
                    </center>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div  class="col-sm-12 col-md-6">
            <div style="background-color: #578EBE; color: #FFF;" class="panel panel-primary">
                <div class="panel-body">
                    <h3>Ordenes / Consolidaciones</h3><HR>
                    
                    <p>Estos paquetes fueron recibidos en nuestras oficinas y están listos para ser enviados. </p>
                </div>
                <div style="background-color: #3D75A5;" class="panel-footer">
                    <a style="color: #FFF;" href="<?php echo Yii::app()->request->baseUrl; ?>/usuario/ordenPersonal">Seleccione esta opción para elegir y consolidar los paquetes a enviar.</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div style="background-color: #578EBE; color: #FFF;" class="panel panel-primary">
              <div class="panel-body">
                    <h3>Pre-Alertar</h3><HR>
                    
                    <p>Al notificarnos tu compra estaremos a la espera de tu envío para procesarlo con mayor rapidez.</p>
                </div>
                <div style="background-color: #3D75A5;" class="panel-footer">
                    <a style="color: #FFF;" href="<?php echo Yii::app()->request->baseUrl; ?>/clientesSubcliente/tracking">Busqueda por Tracking</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a style="color: #FFF;" href="<?php echo Yii::app()->request->baseUrl; ?>/ordenesCliente/create">Notificar Pre-alerta</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
