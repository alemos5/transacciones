<div class="view">

	<b><?php echo "Identificador de Pago"; ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pago),array('view','id'=>$data->id_pago)); ?>
	<br />

	<b><?php echo "Tipo de Pago"; ?>:</b>
	<?php echo CHtml::encode($data->idTipoPago->tipo_pago); ?>
	<br />

	<b><?php echo validarTipo($data->id_copetencia, $data->id_categoria); ?>:</b>
	<?php echo validar($data->id_copetencia, $data->id_categoria); ?>
	<br />

	

	<?php /*
         <b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->id_categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_pagador')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_pagador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('costo_pagar')); ?>:</b>
	<?php echo CHtml::encode($data->costo_pagar); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('costo_pagado')); ?>:</b>
	<?php echo CHtml::encode($data->costo_pagado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_forma_pago')); ?>:</b>
	<?php echo CHtml::encode($data->id_forma_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referencia')); ?>:</b>
	<?php echo CHtml::encode($data->referencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img')); ?>:</b>
	<?php echo CHtml::encode($data->img); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	*/ ?>

</div>