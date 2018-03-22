<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria_item_calificacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_categoria_item_calificacion),array('view','id'=>$data->id_categoria_item_calificacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->id_categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_item_calificacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_item_calificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango_min')); ?>:</b>
	<?php echo CHtml::encode($data->rango_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango_max')); ?>:</b>
	<?php echo CHtml::encode($data->rango_max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>