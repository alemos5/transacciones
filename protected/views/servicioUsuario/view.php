<?php
$this->breadcrumbs=array(
	'Servicio Usuarios'=>array('index'),
	$model->id_servicio_usuario,
);

$this->menu=array(
array('label'=>'Listar Servicios especiales por Usuario','url'=>array('index')),
array('label'=>'Crear Servicio especial por Usuario','url'=>array('create')),
array('label'=>'Actualizar Servicio especial por Usuario','url'=>array('update','id'=>$model->id_servicio_usuario)),
array('label'=>'Eliminar Servicio especial por Usuario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_servicio_usuario),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Servicios especiales por Usuario','url'=>array('admin')),
);
?>

<span class="ez">Detalles de Servicios especiales por Usuario</span>
<div class="pd-inner">
    <?php 
        
        function sumaConstoEspecial($id_servicio, $id_usuario){
//            die($id_servicio." / ".$id_usuario);
            $serviciosEspeciales = ServicioUsuario::model()->findAll('id_servicio = '.$id_servicio.' AND id_usuario ='.$id_usuario);
            $costoEspecial = 0;
            foreach ($serviciosEspeciales as $servicioEspecial){
                $costoEspecial += $servicioEspecial->costo_especial;
            }
            return number_format($costoEspecial, 2, '.', '');
        }
    
        $this->widget('booster.widgets.TbDetailView',array(
        'type' => 'striped bordered hover',
        'data'=>$model,
        'attributes'=>array(
                        'id_servicio_usuario',
                        array(
                            'label'=>'Empresa:',
                            'value'=>$model->idEmpresa->empresa,
                        ),
                        array(
                            'label'=>'Servicio',
                            'value'=>$model->idServicio->servicio,
                        ),
                        array(
                            'label'=>'Usuario',
                            'value'=>$model->idUsuario->correo,
                        ),
//                        array(
//                            'label'=>'Costo del Servicio',
//                            'value'=>$model->idServicio->precio_sugerido,
//                        ),
//                        array(
//                            'label'=>'Precio Especial',
//                            'value'=>sumaConstoEspecial($model->id_servicio, $model->id_usuario),
//                        ),
//                        'costo_servicio',
//                        'costo_especial',
//                        'estatus',
        ),
    )); ?>
    
    <br>
    <h4>Servicios:</h4>
    <hr>
    
    <div class="panel panel-primary">
        <div class="panel-heading">Listado de servicios Detallado</div>
        <div class="panel-body">
            
            

            <table class="table table-bordered table-hover">
                <thead style="">
                    <tr>
                        <td style=" width: 20%;"><center><strong>Empresa</strong></center></td>
                        <td style=" width: 20%;"><center><strong>Servicio</strong></center></td>
                        <td style=" width: 20%;"><center><strong>Precio sugerido</strong></center></td>
                        <td style=" width: 20%;"><center><strong>Precio Especial</strong></center></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servicioUsuarios = ServicioUsuario::model()->findAll('id_usuario ='.$model->id_usuario.' group by `id_servicio`');
                    
                    foreach ($servicioUsuarios as $servicioUsuario){
                        
                        ?>
                        <tr>
                            <td><center><?php echo $servicioUsuario->idEmpresa->empresa; ?></center></td>
                            <td><center><?php echo $servicioUsuario->idServicio->servicio; ?></center></td>
                            <td><center><?php echo $servicioUsuario->idServicio->precio_sugerido; ?></center></td>
                            <td><center><?php echo sumaConstoEspecial($servicioUsuario->id_servicio, $servicioUsuario->id_usuario); ?></center></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
                
            </table>


            
        </div>
    </div>
    
    
    <hr>
    <div class="panel panel-primary">
        <div class="panel-heading">Listado de servicios Detallado</div>
        <div class="panel-body">
            
            

            <table class="table table-bordered table-hover">
                <thead style="">
                    <tr>
                        <td style=" width: 20%;"><center><strong>Empresa</strong></center></td>
                        <td style=" width: 20%;"><center><strong>Servicio</strong></center></td>
                        <td style=" width: 20%;"><center><strong>Gastos</strong></center></td>
                        <td style=" width: 20%;"><center><strong>Precio sugerido</strong></center></td>
                        <td style=" width: 20%;"><center><strong>Precio Especial</strong></center></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servicioUsuarios = ServicioUsuario::model()->findAll('id_usuario ='.$model->id_usuario);
                    
                    foreach ($servicioUsuarios as $servicioUsuario){
                        
                        ?>
                        <tr>
                            <td><center><?php echo $servicioUsuario->idEmpresa->empresa; ?></center></td>
                            <td><center><?php echo $servicioUsuario->idServicio->servicio; ?></center></td>
                            <td><center><?php echo $servicioUsuario->idImpuesto->impuesto; ?></center></td>
                            <td><center><?php echo $servicioUsuario->costo_servicio; ?></center></td>
                            <td><center><?php echo $servicioUsuario->costo_especial; ?></center></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
                
            </table>


            
        </div>
    </div>
    
    
    
</div>