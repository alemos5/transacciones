<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_musica')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_musica),array('view','id'=>$data->id_musica)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('musica')); ?>:</b>
	<?php echo CHtml::encode($data->musica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>