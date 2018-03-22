<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tarifa_envio_pais')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tarifa_envio_pais),array('view','id'=>$data->id_tarifa_envio_pais)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_envio')); ?>:</b>
	<?php echo CHtml::encode($data->idTipoEnvio->tipo_envio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tarifa_envio_pais')); ?>:</b>
	<?php echo CHtml::encode($data->idPais->nombre_largo); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('tarifa_envio_pais')); ?>:</b>
    <?php echo CHtml::encode($data->tarifa_envio_pais); ?>
    <br />


	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_modifica')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_modifica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_modifica')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_modifica); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_registro')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />
	*/ ?>

</div>