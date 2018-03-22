<div class="row">
    <div class="col-sm-12 col-md-8">
<div class="view">

	<b><?php echo CHtml::encode(__('Competence Identifier')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_copetencia),array('view','id'=>$data->id_copetencia)); ?>
	<br />

	<b><?php echo CHtml::encode(__('Competence')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->competencia),array('view','id'=>$data->id_copetencia)); ?>
	<br />

	<b><?php echo CHtml::encode(__('Visible')); ?>:</b>
	<?php 
//        echo CHtml::encode($data->visible); 
        if($data->visible == 1){
            echo "Si";
        }else{
            echo "No";
        }
        ?>
	<br />

	<b><?php echo CHtml::encode(__('Active')); ?>:</b>
	<?php 
//        echo CHtml::encode($data->estatus); 
        if($data->estatus == 1){
            echo "Active";
        }else{
            echo "Inactive";
        }
        ?>
	<br />
        
	<b><?php echo CHtml::encode(__('Description')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode(__('Competence date')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_copetencia); ?>
	<br />

	<b><?php echo CHtml::encode(__('Value')); ?>:</b>
	<?php echo CHtml::encode($data->valor_competido); ?>
	<br />

      
</div>
    </div>
    
    <div class="col-sm-12 col-md-4">
        <div class="view">
            <b><?php //echo CHtml::encode($data->getAttributeLabel('img')); ?></b>
            <?php //echo CHtml::encode($data->img); ?>
            <img src="<?php $host= $_SERVER["HTTP_HOST"]; echo $urlParte = "http://".$host.""; ?>/images/competencia/<?php echo $data->img; ?>" class="img-thumbnail" alt="Cinque Terre" style=" width: 100%; height: 180px;" >
            
	<br />
        </div>
    </div>
</div>
 
        
        