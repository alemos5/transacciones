<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_inscripcion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_inscripcion),array('view','id'=>$data->id_inscripcion)); ?>
	<br />

	<b><?php echo __("Competences"); ?>:</b>
	<?php echo CHtml::encode($data->idCopetencia->competencia); ?>
	<br />

	<b><?php echo __("Description"); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lugar_representa')); ?>:</b>
	<?php echo CHtml::encode($data->lugar_representa); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_pais')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->id_ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_escuela')); ?>:</b>
	<?php echo CHtml::encode($data->id_escuela); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_estatu_inscripcion')); ?>:</b>
	<?php echo CHtml::encode($data->id_estatu_inscripcion); ?>
	<br />

	*/ ?>

</div>