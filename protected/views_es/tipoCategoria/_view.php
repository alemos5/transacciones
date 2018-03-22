<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_categoria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_categoria),array('view','id'=>$data->id_tipo_categoria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>