<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_participante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_participante),array('view','id'=>$data->id_participante)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_inscripcion')); ?>:</b>
	<?php echo CHtml::encode($data->id_inscripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_copetencia')); ?>:</b>
	<?php echo CHtml::encode($data->id_copetencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->id_categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_registro')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>