<div class="view">
        <b><?php echo CHtml::encode($data->getAttributeLabel('id_banco')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_banco),array('view','id'=>$data->id_banco)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pais')); ?>:</b>
	<?php echo CHtml::encode($data->idPais->pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banco')); ?>:</b>
	<?php echo CHtml::encode($data->banco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('siglas')); ?>:</b>
	<?php echo CHtml::encode($data->siglas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->idEstatus->estatus_titulo); ?>
	<br />
</div>