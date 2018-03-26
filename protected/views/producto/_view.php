<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_producto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_producto),array('view','id'=>$data->id_producto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_producto')); ?>:</b>
	<?php echo CHtml::encode($data->idTipoProducto->tipo_producto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('productoc')); ?>:</b>
	<?php echo CHtml::encode($data->producto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->idEstatus->estatus_titulo); ?>
	<br />



	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_modifica')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_modifica); ?>
	<br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_registro')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_modifica')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_modifica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img')); ?>:</b>
	<?php echo CHtml::encode($data->img); ?>
	<br />

	*/ ?>

</div>