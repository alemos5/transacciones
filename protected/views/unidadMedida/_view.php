<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_unidad_medida')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_unidad_medida),array('view','id'=>$data->id_unidad_medida)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidad_medida')); ?>:</b>
	<?php echo CHtml::encode($data->unidad_medida); ?>
	<br />



</div>