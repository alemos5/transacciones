<?php
$this->breadcrumbs=array(
	'Usuarios',
);

$this->menu=array(
array('label'=>'Crear Usuario','url'=>array('create')),
array('label'=>'Administrar Usuario','url'=>array('admin')),
);
?>

<span class="ez">Usuarios</span>

<div class="pd-inner">
<?php 

function tipoDocumento($tipoDocumento){
    if($tipoDocumento == 1){
        $data = 'Cedula Ciudadanía';
    }
    if($tipoDocumento == 2){
        $data = 'Licencia de Conducir';
    }
    if($tipoDocumento == 3){
        $data = 'Cedula de Extranjería';
    }
    if($tipoDocumento == 4){
        $data = 'Pasaporte';
    }
    if($tipoDocumento == 5){
        $data = 'Tarjeta de Identidad';
    }
    if($tipoDocumento == 6){
        $data = 'Registro Civil';
    }
    return $data;
}

$this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>