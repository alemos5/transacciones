<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cliente),array('view','id'=>$data->id_cliente)); ?>
	<br />

        <b><?php echo "Subcliente:"; ?></b>
	<?php echo CHtml::encode($data->idClienteHijo->nombre); ?>
	<br />

	<?php /*
         
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion_2')); ?>:</b>
	<?php echo CHtml::encode($data->direccion_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion_3')); ?>:</b>
	<?php echo CHtml::encode($data->direccion_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pais')); ?>:</b>
	<?php echo CHtml::encode($data->id_pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->code_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('compania')); ?>:</b>
	<?php echo CHtml::encode($data->compania); ?>
	<br />
         
	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pais')); ?>:</b>
	<?php echo CHtml::encode($data->pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax')); ?>:</b>
	<?php echo CHtml::encode($data->fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ci')); ?>:</b>
	<?php echo CHtml::encode($data->ci); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suscripcion')); ?>:</b>
	<?php echo CHtml::encode($data->suscripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('servicio')); ?>:</b>
	<?php echo CHtml::encode($data->servicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promocion')); ?>:</b>
	<?php echo CHtml::encode($data->promocion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publi')); ?>:</b>
	<?php echo CHtml::encode($data->publi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catologo')); ?>:</b>
	<?php echo CHtml::encode($data->catologo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('otro_catalogo')); ?>:</b>
	<?php echo CHtml::encode($data->otro_catalogo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo')); ?>:</b>
	<?php echo CHtml::encode($data->correo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pass_conf')); ?>:</b>
	<?php echo CHtml::encode($data->pass_conf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tarifa')); ?>:</b>
	<?php echo CHtml::encode($data->tarifa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seguro')); ?>:</b>
	<?php echo CHtml::encode($data->seguro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bodega')); ?>:</b>
	<?php echo CHtml::encode($data->bodega); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('costo_consolidacion')); ?>:</b>
	<?php echo CHtml::encode($data->costo_consolidacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('impuestos')); ?>:</b>
	<?php echo CHtml::encode($data->impuestos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('otros')); ?>:</b>
	<?php echo CHtml::encode($data->otros); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referido')); ?>:</b>
	<?php echo CHtml::encode($data->referido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente_padre')); ?>:</b>
	<?php echo CHtml::encode($data->id_cliente_padre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_cliente_hijo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_cliente_hijo); ?>
	<br />

	*/ ?>

</div>