<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria_tipo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_categoria_tipo),array('view','id'=>$data->id_categoria_tipo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->categoria_tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>