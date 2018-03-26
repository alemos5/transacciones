<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tarifa_producto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tarifa_producto),array('view','id'=>$data->id_tarifa_producto)); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_producto')); ?>:</b>
    <?php echo CHtml::encode($data->idProducto->producto); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('tarifa_producto')); ?>:</b>
    <?php echo CHtml::encode($data->tarifa_producto); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pais')); ?>:</b>
	<?php echo CHtml::encode($data->idPais->pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->idEstatus->estatus_titulo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_modifica')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_modifica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_registro')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_modifica')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_modifica); ?>
	<br />

	*/ ?>

</div>