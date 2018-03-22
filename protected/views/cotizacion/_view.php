<div class="view">
    <b><?php echo CHtml::encode($data->getAttributeLabel('id_cotizacion')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id_cotizacion),array('view','id'=>$data->id_cotizacion)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('n_cotizacion')); ?>:</b>
    <?php echo CHtml::encode($data->n_cotizacion); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_cotizacion')); ?>:</b>
    <?php echo CHtml::encode($data->idUsuario->correo); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
    <?php echo CHtml::encode(date("d-m-Y H:i:s", strtotime($data->fecha_registro))); ?>
    <br />
</div>