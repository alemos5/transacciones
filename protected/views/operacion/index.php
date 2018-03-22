<?php
$this->breadcrumbs=array(
	'Operaciones',
);

$this->menu=array(
array('label'=>'Crear Operación','url'=>array('create')),
array('label'=>'Administrar Operaciones','url'=>array('admin')),
);
?>

<span class="ez">Operaciones</span>

<div class="pd-inner">
    
    
<?php 
function estatusOperacion($estatus){
    if($estatus == 0){
        $estatus = Null;
    }
    if($estatus == 1){
        $estatus = " - Completado";
    }
    return $estatus;
}
function mostrarValor($valor, $tipo){
    if($valor && $valor != 0.00000000){
        if($tipo == 1){
            return $valor;
        }
        if($tipo == 2){
            return " - ".$valor;
        }
        if($tipo == 3){
            return " (".$valor."%)";
        }
    }else{
            return Null;
    }
}
$this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>