<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_juez')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_juez),array('view','id'=>$data->id_juez)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_sistema')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_competencia')); ?>:</b>
	<?php echo CHtml::encode($data->idCompetencia->competencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />



</div>