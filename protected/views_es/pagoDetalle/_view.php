<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_pago_detalle')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pago_detalle),array('view','id'=>$data->id_pago_detalle)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pago')); ?>:</b>
	<?php echo CHtml::encode($data->id_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_pago')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->id_categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_competencia')); ?>:</b>
	<?php echo CHtml::encode($data->id_competencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('items')); ?>:</b>
	<?php echo CHtml::encode($data->items); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('monto')); ?>:</b>
	<?php echo CHtml::encode($data->monto); ?>
	<br />

	*/ ?>

</div>