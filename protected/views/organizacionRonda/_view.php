<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_organizacion_ronda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_organizacion_ronda),array('view','id'=>$data->id_organizacion_ronda)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_competencia')); ?>:</b>
	<?php echo CHtml::encode($data->idCompetencia->competencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ronda')); ?>:</b>
	<?php echo CHtml::encode($data->ronda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('capacidad_max_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->capacidad_max_categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->hora_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_final')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_final); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('hora_final')); ?>:</b>
	<?php echo CHtml::encode($data->hora_final); ?>
	<br />
        
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('duracion_inscripcion')); ?>:</b>
	<?php echo CHtml::encode('00:'.date('H:i', strtotime($data->duracion_inscripcion))); ?>
	<br />
        
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_final')); ?>:</b>
	<?php echo CHtml::encode($data->hora_final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	*/ ?>

</div>