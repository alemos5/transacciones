<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_calificacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_calificacion),array('view','id'=>$data->id_calificacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria_item_calificacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_categoria_item_calificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango_max')); ?>:</b>
	<?php echo CHtml::encode($data->rango_max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango_min')); ?>:</b>
	<?php echo CHtml::encode($data->rango_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_juez')); ?>:</b>
	<?php echo CHtml::encode($data->id_juez); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_inscripcion')); ?>:</b>
	<?php echo CHtml::encode($data->id_inscripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />


</div>