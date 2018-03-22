<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_competencia_categoria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_competencia_categoria),array('view','id'=>$data->id_competencia_categoria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_copetencia')); ?>:</b>
	<?php echo CHtml::encode($data->id_copetencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('costo')); ?>:</b>
	<?php echo CHtml::encode($data->costo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->id_categoria); ?>
	<br />


</div>