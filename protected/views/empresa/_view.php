<div class="view">

        <b><?php echo CHtml::encode($data->getAttributeLabel('id_empresa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_empresa),array('view','id'=>$data->id_empresa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('empresa')); ?>:</b>
	<?php echo CHtml::encode($data->empresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

</div>