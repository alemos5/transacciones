<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_orden')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_orden),array('view','id'=>$data->id_orden)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ware_reciept')); ?>:</b>
	<?php echo CHtml::encode($data->ware_reciept); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_guia')); ?>:</b>
	<?php echo CHtml::encode($data->numero_guia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tracking')); ?>:</b>
	<?php echo CHtml::encode($data->tracking); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('courier')); ?>:</b>
	<?php echo CHtml::encode($data->courier); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ope')); ?>:</b>
	<?php echo CHtml::encode($data->id_ope); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->code_cliente); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alto')); ?>:</b>
	<?php echo CHtml::encode($data->alto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ancho')); ?>:</b>
	<?php echo CHtml::encode($data->ancho); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('largo')); ?>:</b>
	<?php echo CHtml::encode($data->largo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso')); ?>:</b>
	<?php echo CHtml::encode($data->peso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('costo')); ?>:</b>
	<?php echo CHtml::encode($data->costo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('instrucciones')); ?>:</b>
	<?php echo CHtml::encode($data->instrucciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden')); ?>:</b>
	<?php echo CHtml::encode($data->orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seguro')); ?>:</b>
	<?php echo CHtml::encode($data->seguro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pt')); ?>:</b>
	<?php echo CHtml::encode($data->pt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cost_env')); ?>:</b>
	<?php echo CHtml::encode($data->cost_env); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('env_email')); ?>:</b>
	<?php echo CHtml::encode($data->env_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recargo')); ?>:</b>
	<?php echo CHtml::encode($data->recargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_recargo')); ?>:</b>
	<?php echo CHtml::encode($data->status_recargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cant')); ?>:</b>
	<?php echo CHtml::encode($data->cant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peli')); ?>:</b>
	<?php echo CHtml::encode($data->peli); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tienda')); ?>:</b>
	<?php echo CHtml::encode($data->tienda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc')); ?>:</b>
	<?php echo CHtml::encode($data->doc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tasa_de_cambio')); ?>:</b>
	<?php echo CHtml::encode($data->tasa_de_cambio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('int_manejo')); ?>:</b>
	<?php echo CHtml::encode($data->int_manejo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('int_documentacion')); ?>:</b>
	<?php echo CHtml::encode($data->int_documentacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('int_gastos_administrativos')); ?>:</b>
	<?php echo CHtml::encode($data->int_gastos_administrativos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('int_reempaque')); ?>:</b>
	<?php echo CHtml::encode($data->int_reempaque); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('int_descuento')); ?>:</b>
	<?php echo CHtml::encode($data->int_descuento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('int_devolucion')); ?>:</b>
	<?php echo CHtml::encode($data->int_devolucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('int_almacenaje')); ?>:</b>
	<?php echo CHtml::encode($data->int_almacenaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('int_comision_tc')); ?>:</b>
	<?php echo CHtml::encode($data->int_comision_tc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('int_desaduanamiento')); ?>:</b>
	<?php echo CHtml::encode($data->int_desaduanamiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion1')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->direccion_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ultima_milla')); ?>:</b>
	<?php echo CHtml::encode($data->ultima_milla); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus_manifiesto')); ?>:</b>
	<?php echo CHtml::encode($data->estatus_manifiesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('info_extra')); ?>:</b>
	<?php echo CHtml::encode($data->info_extra); ?>
	<br />

	*/ ?>

</div>