<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_categoria),array('view','id'=>$data->id_categoria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria')); ?>:</b>
	<?php echo CHtml::encode($data->categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edad_min')); ?>:</b>
	<?php echo CHtml::encode($data->edad_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edad_max')); ?>:</b>
	<?php echo CHtml::encode($data->edad_max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('competidor_min')); ?>:</b>
	<?php echo CHtml::encode($data->competidor_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('competidor_max')); ?>:</b>
	<?php echo CHtml::encode($data->competidor_max); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bloque')); ?>:</b>
	<?php echo CHtml::encode($data->id_bloque); ?>
	<br />

	*/ ?>

</div>