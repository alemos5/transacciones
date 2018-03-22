<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_operacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_operacion),array('view','id'=>$data->id_operacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_exchange')); ?>:</b>
	<?php echo CHtml::encode($data->idExchange->exchange); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_estatus_operacion')); ?>:</b>
	<?php echo CHtml::encode($data->idEstatusOperacion->estatus_operacion); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_moneda')); ?>:</b>
	<?php echo CHtml::encode($data->idMoneda->abv.' ('.$data->idMoneda->moneda.')'); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('compra1')); ?>:</b>
	<?php echo CHtml::encode(mostrarValor($data->compra1, '1').mostrarValor($data->compra2, '2')); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('venta_en')); ?>:</b>
	<?php echo CHtml::encode(mostrarValor($data->venta_en, '1')); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target1')); ?>:</b>
	<?php echo CHtml::encode(mostrarValor($data->target1, '1').mostrarValor($data->target11, '2').mostrarValor($data->porcentaje1, '3').estatusOperacion($data->estado1)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target2')); ?>:</b>
	<?php echo CHtml::encode(mostrarValor($data->target2, '1').mostrarValor($data->target22, '2').mostrarValor($data->porcentaje2, '3').estatusOperacion($data->estado2)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target3')); ?>:</b>
	<?php echo CHtml::encode(mostrarValor($data->target3, '1').mostrarValor($data->target33, '2').mostrarValor($data->porcentaje3, '3').estatusOperacion($data->estado3)); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('stop_loss')); ?>:</b>
	<?php echo CHtml::encode(mostrarValor($data->stop_loss, '1')); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_operacion')); ?>:</b>
	<?php echo CHtml::encode($data->idTipoOperacion->tipo_operacion); ?>
	<br />

	<b><?php echo "URL de la Moneda"; ?>:</b>
        <a href="<?php echo $data->idMoneda->url; ?>" target="_blank"><?php echo $data->idMoneda->url; ?></a>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('target11')); ?>:</b>
	<?php echo CHtml::encode($data->target11); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentaje1')); ?>:</b>
	<?php echo CHtml::encode($data->porcentaje1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado1')); ?>:</b>
	<?php echo CHtml::encode($data->estado1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target2')); ?>:</b>
	<?php echo CHtml::encode($data->target2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target22')); ?>:</b>
	<?php echo CHtml::encode($data->target22); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentaje2')); ?>:</b>
	<?php echo CHtml::encode($data->porcentaje2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado2')); ?>:</b>
	<?php echo CHtml::encode($data->estado2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target3')); ?>:</b>
	<?php echo CHtml::encode($data->target3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target33')); ?>:</b>
	<?php echo CHtml::encode($data->target33); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentaje3')); ?>:</b>
	<?php echo CHtml::encode($data->porcentaje3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado3')); ?>:</b>
	<?php echo CHtml::encode($data->estado3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target4')); ?>:</b>
	<?php echo CHtml::encode($data->target4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target44')); ?>:</b>
	<?php echo CHtml::encode($data->target44); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentaje4')); ?>:</b>
	<?php echo CHtml::encode($data->porcentaje4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado4')); ?>:</b>
	<?php echo CHtml::encode($data->estado4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target5')); ?>:</b>
	<?php echo CHtml::encode($data->target5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target55')); ?>:</b>
	<?php echo CHtml::encode($data->target55); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentaje5')); ?>:</b>
	<?php echo CHtml::encode($data->porcentaje5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado5')); ?>:</b>
	<?php echo CHtml::encode($data->estado5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stop_loss')); ?>:</b>
	<?php echo CHtml::encode($data->stop_loss); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion')); ?>:</b>
	<?php echo CHtml::encode($data->observacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_sistema_reg')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_sistema_reg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_reg')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_reg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_reg')); ?>:</b>
	<?php echo CHtml::encode($data->ip_reg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_sistema_mod')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_sistema_mod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_mod')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_mod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_mod')); ?>:</b>
	<?php echo CHtml::encode($data->ip_mod); ?>
	<br />

	*/ ?>

</div>