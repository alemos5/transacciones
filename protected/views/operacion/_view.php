<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_operacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_operacion),array('view','id'=>$data->id_operacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_operacion')); ?>:</b>
	<?php echo CHtml::encode($data->idTipoProducto->tipo_producto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pais')); ?>:</b>
	<?php echo CHtml::encode($data->idPais->pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto_operacion')); ?>:</b>
	<?php echo CHtml::encode($data->monto_operacion); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('monto_cierre')); ?>:</b>
    <?php echo CHtml::encode($data->monto_cierre); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_moneda_origen')); ?>:</b>
	<?php echo CHtml::encode($data->idMonedaOrigen->moneda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_moneda_destino')); ?>:</b>
	<?php echo CHtml::encode($data->idMonedaDestino->moneda); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_operacion')); ?>:</b>
    <?php echo CHtml::encode(date("d-m-Y", strtotime($data->fecha_operacion))); ?>
    <br />


    <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('monto_cierre')); ?>:</b>
	<?php echo CHtml::encode($data->monto_cierre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_operacion')); ?>:</b>
	<?php echo CHtml::encode($data->code_operacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_operacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_operacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto_oficial')); ?>:</b>
	<?php echo CHtml::encode($data->monto_oficial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentaje_oficial')); ?>:</b>
	<?php echo CHtml::encode($data->porcentaje_oficial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto_ganancia')); ?>:</b>
	<?php echo CHtml::encode($data->monto_ganancia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentaje_ganancia')); ?>:</b>
	<?php echo CHtml::encode($data->porcentaje_ganancia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_producto')); ?>:</b>
	<?php echo CHtml::encode($data->id_producto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tarifa')); ?>:</b>
	<?php echo CHtml::encode($data->tarifa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cuenta_salida')); ?>:</b>
	<?php echo CHtml::encode($data->id_cuenta_salida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cuenta_entrada')); ?>:</b>
	<?php echo CHtml::encode($data->id_cuenta_entrada); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_modifica')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_modifica); ?>
	<br />

	*/ ?>

</div>