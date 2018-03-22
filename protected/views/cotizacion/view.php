<?php
$this->breadcrumbs=array(
	'Cotizacions'=>array('index'),
	$model->id_cotizacion,
);

$this->menu=array(
array('label'=>'Listar Cotizaciones','url'=>array('index')),
array('label'=>'Crear Cotización','url'=>array('create')),
array('label'=>'Actualizar Cotización','url'=>array('update','id'=>$model->id_cotizacion)),
array('label'=>'Eliminar Cotización','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cotizacion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Cotización','url'=>array('admin')),
);
?>

<span class="ez">Detallar Cotización</span>
<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbDetailView',array(
            'type' => 'striped bordered hover',
    'data'=>$model,
    'attributes'=>array(
                    'id_cotizacion',
                    'n_cotizacion',
//                    'id_usuario_cotizacion',
                        array(
                            'label'=>'Usuario:',
                            'value'=>$model->idUsuario->correo,
                        ),
//                    'id_usuario_registro',
//                    'id_usuario_modificacion',
//                    'fecha_registro',
                        array(
                            'label'=>'Fecha de cotización:',
                            'value'=>date("d-m-Y H:i:s", strtotime($model->fecha_registro)),
                        ),
//                    'id_estatus_cotizacion',
    ),
    )); ?>
    <br>
    <h4>Servicios:</h4>    
    <hr>
    <div class="panel panel-primary">
        <div class="panel-heading">Listado de servicios</div>
        <div class="panel-body">
            
            

            <table class="table table-bordered table-hover">
                <thead style="">
                    <tr>
                        <td style=" width: 20%;"><center><strong>Empresa</strong></center></td>
                        <td style=" width: 20%;"><center><strong>Servicio</strong></center></td>
                        <td style=" width: 10%;"><center><strong>Cantidad</strong></center></td>
                        <td style=" width: 10%;"><center><strong>Precio Unitario</strong></center></td>
                        <td style=" width: 20%;"><center><strong>Precio Especial</strong></center></td>
                        <td style=" width: 20%;"><center><strong>Subtotal</strong></center></td>
                    </tr>
                </thead>
                <tbody>
                   <?php
                   $detallesCotizaciones = CotizacionDetalle::model()->findAll('id_cotizacion ='.$model->id_cotizacion);
                   $cantidadServicios = 0;
                   $precioU = 0;
                   $total = 0;
                   foreach ($detallesCotizaciones as $detallesCotizacion){
                        $cantidadServicios += $detallesCotizacion->cant_servicio;
                        $precioU += $detallesCotizacion->precio_unitario;
                        $total += $detallesCotizacion->precio_unitario;
                        $servicio = Servicio::model()->find('id_servicio ='.$detallesCotizacion->id_servicio);
                       if($servicio->precio_sugerido == $detallesCotizacion->precio_unitario){
                           ?><tr><?php $icon = "";
                       }else{
                           ?><tr class="success"><?php $icon = '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>';
                       }
                       ?>
                        
                            <td style=" width: 20%;"><center><?php echo $detallesCotizacion->idEmpresa->empresa; ?></center></td>
                            <td style=" width: 20%;"><center><?php echo $detallesCotizacion->idServicio->servicio; ?></center></td>
                            <td style=" width: 20%;"><center><?php echo $detallesCotizacion->cant_servicio; ?></center></td>
                            <td style=" width: 20%;"><center><?php echo $detallesCotizacion->precio_unitario; ?></center></td>
                            <td style=" width: 20%;">
                                <center>
                                    <?php echo $icon; ?>
                                </center>
                            </td>
                            <td style=" width: 20%;"><center><?php echo $detallesCotizacion->precio_total; ?></center></td>
                        </tr>
                       <?php
                   }
                   ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" style=" width: 20%;"><center><strong>Impuesto (<?php echo $model->porcentaje_impuesto; ?> %)</strong></center></td>
                        <td><center><strong><?php echo $model->monto_impuesto; ?></strong></center></td>
                    </tr>

                    <tr>
                        <td colspan="5" style=" width: 20%;"><center><strong>Total</strong></center></td>
<!--                        <td style=" width: 20%;"><center><strong><?php echo $cantidadServicios; ?></strong></center></td>
                        <td style=" width: 20%;"><center><strong><?php echo $precioU; ?></strong></center></td>
                        <td style=" width: 20%;"><center><strong>-</strong></center></td>-->
                        <td style=" width: 20%;"><center><strong><?php echo $model->monto_total; ?></strong></center></td>
                    </tr>
                </tfoot>
            </table>


            
        </div>
    </div>
    
</div>