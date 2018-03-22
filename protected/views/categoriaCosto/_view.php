<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria_costo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_categoria_costo),array('view','id'=>$data->id_categoria_costo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_competencia_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->id_competencia_categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('costo')); ?>:</b>
	<?php echo CHtml::encode($data->costo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>