<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_juez_categoria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_juez_categoria),array('view','id'=>$data->id_juez_categoria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_juez')); ?>:</b>
	<?php echo CHtml::encode($data->id_juez); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_competencia')); ?>:</b>
	<?php echo CHtml::encode($data->id_competencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->id_categoria); ?>
	<br />


</div>