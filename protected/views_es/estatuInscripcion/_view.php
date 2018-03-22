<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_estatu_inscripcion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_estatu_inscripcion),array('view','id'=>$data->id_estatu_inscripcion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatu_inscripcion')); ?>:</b>
	<?php echo CHtml::encode($data->estatu_inscripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>