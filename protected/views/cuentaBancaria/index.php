<?php
$this->breadcrumbs=array(
	'Cuenta Bancarias',
);

$this->menu=array(
array('label'=>'Crear CuentaBancaria','url'=>array('create')),
array('label'=>'Administración de CuentaBancaria','url'=>array('admin')),
);

function tipoCuenta($idTipoCuenta){
    if($idTipoCuenta == 1){
        $tipoCUenta = "Corriente";
    }
    if($idTipoCuenta == 2){
        $tipoCUenta = "Ahorros";
    }
    return $tipoCUenta;
}

function tipoDocumento($idTipoDocumento){
    if($idTipoDocumento == 1){
        $tipoDocumento = "C.I";
    }
    if($idTipoDocumento == 2){
        $tipoDocumento = "DNI";
    }
    if($idTipoDocumento == 3){
        $tipoDocumento = "Pasaporte";
    }
    return $tipoDocumento;
}

?>

<span  class="ez">Cuenta Bancarias</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>