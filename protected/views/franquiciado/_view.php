<div class="row">
    <div class="col-sm-12 col-md-8">
        <div class="view">
            <b><?php echo CHtml::encode($data->getAttributeLabel('id_franquiciado')); ?>:</b>
            <?php echo CHtml::link(CHtml::encode($data->id_franquiciado),array('view','id'=>$data->id_franquiciado)); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_sistema')); ?>:</b>
            <?php echo CHtml::encode($data->idUsuario->usuario); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('id_competencia')); ?>:</b>
            <?php echo CHtml::encode($data->idCompetencia->competencia); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('forma_pago')); ?>:</b>
            <?php //echo CHtml::encode($data->forma_pago); 
            if($data->forma_pago == 1){
                echo 'Paypal';
            }else{
                echo 'Cuenta Bancaria';
            }
            ?>
            <br />	

            <b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
            <?php echo CHtml::encode($data->descripcion); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('lider')); ?>:</b>
            <?php 
            if($data->lider == 1){
                echo 'Lider';
            }else{
                echo 'No lider';
            }
            //echo CHtml::encode($data->lider); 
            ?>
            <br />
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="view">
            <b><?php //echo CHtml::encode($data->getAttributeLabel('img')); ?></b>
            <?php //echo CHtml::encode($data->img); ?>
            <img src="<?php $host= $_SERVER["HTTP_HOST"]; echo $urlParte = "http://".$host.""; ?>/images/franquiciado/<?php echo $data->img; ?>" class="img-thumbnail" alt="Cinque Terre" style=" width: 100%; height: 130px;" >
	<br />
        </div>
    </div>
</div>