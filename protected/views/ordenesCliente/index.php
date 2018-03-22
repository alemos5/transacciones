<?php
$this->breadcrumbs=array(
	'Ordenes Clientes',
);

$this->menu=array(
array('label'=>'Crear Prealerta','url'=>array('create')),
array('label'=>'Administrar Prealerta','url'=>array('admin')),
);

$usuario = Usuario::model()->find('id_usuario_sistema ='.Yii::app()->user->id_usuario_sistema);
$correo = $usuario->correo;
?>
<span class="ez">Prealerta</span>
<div class="pd-inner">
    <iframe style="width: 100%; border: 0px; height: 1200px;" 
            src="https://telocomproenusa.com/cruz/pre_alerta/form_seguimiento.php?email=<?php echo $correo; ?>"></iframe>
</div>
