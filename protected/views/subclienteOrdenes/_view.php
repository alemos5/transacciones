<div class="view">

        <b><?php echo CHtml::encode($data->getAttributeLabel('id_subcliente_ordenes')); ?>:</b>
	<?php //echo CHtml::link(CHtml::encode($data->id_subcliente_ordenes),array('http://google.com')); ?>
        <a target="_black" href="http://tracking.telocomproenusa.com/label.php?id=<?php echo $data->id_orden; ?>"><?php echo $data->id_subcliente_ordenes; ?></a>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->idClientes->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_subcliente')); ?>:</b>
	<?php echo CHtml::encode($data->idSubClientes->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden')); ?>:</b>
	<?php echo CHtml::encode($data->orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso')); ?>:</b>
	<?php echo CHtml::encode($data->peso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('costo_global')); ?>:</b>
	<?php echo CHtml::encode($data->costo_global); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('courier')); ?>:</b>
	<?php echo CHtml::encode($data->courier); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	*/ ?>

</div>