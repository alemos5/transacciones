<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_competencia_tipo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_competencia_tipo),array('view','id'=>$data->id_competencia_tipo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_copetencia')); ?>:</b>
	<?php echo CHtml::encode($data->id_copetencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('costo')); ?>:</b>
	<?php echo CHtml::encode($data->costo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>