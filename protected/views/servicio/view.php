<?php
$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	$model->id_servicio,
);

$this->menu=array(
array('label'=>'Listar Servicios','url'=>array('index')),
array('label'=>'Crear Servicio','url'=>array('create')),
array('label'=>'Actualizar Servicio','url'=>array('update','id'=>$model->id_servicio)),
array('label'=>'Eliminar Servicio','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_servicio),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Servicios','url'=>array('admin')),
);
?>

<span class="ez">Detalles del Servicio</span>
<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbDetailView',array(
    'type' => 'striped bordered hover',
    'data'=>$model,
    'attributes'=>array(
//                    'id_empresa',
                    array(
                        'label'=>'Empresa:',
                        'value'=>$model->idEmpresa->empresa,
                    ),
                    'id_servicio',
                    'servicio',
                    'precio_neto',
//                    'precio_impuesto',
//                    'gasto_operativo',
                    'precio_sugerido',
                    'porcentaje_ganacia',
    //		'estatus',
    ),
    )); ?>
    <br>
    <h4>Gastos</h4>    
    <hr>
    <div class="panel panel-primary">
        <div class="panel-heading">Listado de impuestos</div>
        <div class="panel-body">
            
            

            <table class="table table-bordered table-hover">
                <thead style="">
                    <tr>
                        <td style=" width: 20%;"><center><strong>Gastos</strong></center></td>
                        <td style=" width: 20%;"><center><strong>Unidad de Medidia</strong></center></td>
                        <td style=" width: 20%;"><center><strong>Tipo de Cobro</strong></center></td>
                        <td style=" width: 20%;"><center><strong>Calculado Por</strong></center></td>
                        <td style=" width: 10%;"><center><strong>Precio Neto</strong></center></td>
                        <td style=" width: 10%;"><center><strong>Precio Sugerido</strong></center></td>
                        <!--<td style=" width: 20%;"><center><strong>Precio de Impuesto</strong></center></td>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servicioImpuestos = ServicioImpuesto::model()->findAll('id_servicio ='.$model->id_servicio);
                    $precioImpuesto = 0;
                    $precioSugerido = 0;
                    foreach ($servicioImpuestos as $servicioImpuesto){
                        $precioImpuesto += $servicioImpuesto->precio_impuesto;
                        $precioSugerido += $servicioImpuesto->precio_sugerido;
                        ?>
                        <tr>
                            <td style=" width: 20%;"><center><?php echo $servicioImpuesto->idImpuesto->impuesto; ?></center></td>
                            <td style=" width: 20%;"><center><?php echo $servicioImpuesto->idUnidadMedida->unidad_medida; ?></center></td>
                            <td style=" width: 20%;"><center><?php echo $servicioImpuesto->idTipoCobro->tipo_cobro; ?></center></td>
                            <td style=" width: 20%;"><center><?php echo $servicioImpuesto->idCalculoA->calculo_a; ?></center></td>
                            <td style=" width: 10%;"><center><?php echo $servicioImpuesto->precio_impuesto; ?></center></td>
                            <td style=" width: 10%;"><center><?php echo $servicioImpuesto->precio_sugerido; ?></center></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" ><center><strong>Total</strong></center></td>
                        <td ><center><strong><?php echo $precioImpuesto; ?></strong></center></td>
                        <td ><center><strong><?php echo $precioSugerido; ?></strong></center></td>
                    </tr>
                </tfoot>
            </table>


            
        </div>
    </div>
    
    
    
</div>