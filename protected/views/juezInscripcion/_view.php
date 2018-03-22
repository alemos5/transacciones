<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_juez_inscripcion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_juez_inscripcion),array('view','id'=>$data->id_juez_inscripcion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_inscripcion')); ?>:</b>
	<?php echo CHtml::encode($data->id_inscripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_juez')); ?>:</b>
	<?php echo CHtml::encode($data->id_juez); ?>
	<br />


</div>