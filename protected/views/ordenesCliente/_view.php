<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_orden_cli')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_orden_cli),array('view','id'=>$data->id_orden_cli)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cli')); ?>:</b>
	<?php echo CHtml::encode($data->id_cli); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nu_orden')); ?>:</b>
	<?php echo CHtml::encode($data->nu_orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tienda')); ?>:</b>
	<?php echo CHtml::encode($data->tienda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc')); ?>:</b>
	<?php echo CHtml::encode($data->doc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tracking')); ?>:</b>
	<?php echo CHtml::encode($data->tracking); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('courier')); ?>:</b>
	<?php echo CHtml::encode($data->courier); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion')); ?>:</b>
	<?php echo CHtml::encode($data->observacion); ?>
	<br />

	*/ ?>

</div>