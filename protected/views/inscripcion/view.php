<?php
$this->breadcrumbs=array(
	'Subscription'=>array('index'),
	$model->id_inscripcion,
);

$this->menu=array(
array('label'=>__('See my subscriptions'),'url'=>array('index')),
//array('label'=>'Subscribe','url'=>array('create')),
array('label'=>__('Update my subscription'),'url'=>array('update','id'=>$model->id_inscripcion)),
//array('label'=>'Delete subscription','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_inscripcion),'confirm'=>'Are you sure you want to delete this item?')),
//array('label'=>'Manage Subscription','url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Subscription'); ?></span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'type' => 'striped bordered hover',
'attributes'=>array(
//		'id_inscripcion',
//		'id_copetencia',
    array(
        'label'=>__('Competence'),
        'value'=>$model->idCopetencia->competencia,
    ),
//		'id_usuario',
//		'grupo',
    array(
        'label'=>__('Description'),
        'value'=>$model->descripcion,
    ),
    array(
        'label'=>__('School'),
        'value'=>$model->idEscuela->escuela,
    ),
//    array(
//        'label'=>'Country',
//        'value'=>$model->idPais->pais,
//    ),
//    array(
//        'label'=>'City',
//        'value'=>$model->idCiudad->ciudad,
//    ),
//		'audio',
		'lugar_representa',
//		'codigo_pais',
//		'id_ciudad',
//		'id_escuela',
//		'id_estatu_inscripcion',
),
)); ?>
    
<br>
<h5><?php echo __('Receipt'); ?></h5>
<hr>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php 
        if($model->audio){
            ?>
            <iframe style="width: 100%; height: 50px; border: 0px;" src="../images/audio/<?php echo $model->audio; ?>"></iframe>
            <?php
        }else{
            ?>
            <div class="alert alert-danger"><?php echo __('You don\'t have any audio registered'); ?></div>
            <?php
        }
        ?>
    </div>
</div>
<br>
<h5><?php echo __('Participants'); ?></h5>
<hr>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span onclick="" class="glyphicon glyphicon-user" aria-hidden="true"></span>  <?php echo __('Data'); ?>
            </div>
            <div class="panel-body">
                <div style=" margin-top: 0px;" class="pd-inner">
                <div id="table-participante" style="padding: 0 5px 5px 5px;">
                    <div class="row" id="head-table-participante">
                      <!--<div class="col-xs-4" style="padding: 8px;"><center><strong>Identification</strong></center></div>-->
                      <div class="col-xs-6" style="padding: 5px;"><strong>User</strong></div>
                      <!--<div class="col-xs-6" style="text-align: right; padding: 5px;"><strong>Action</strong></div>-->
                    </div>
                    <?php
                    $count = 0;
                    $countRowParticipante = 0;
//                    if (!$model->isNewRecord){
                        $countRowParticipante = 1;
                        $i = 0;
                        $participantesCompetenciaCategoria = Participante::model()->findAll('id_inscripcion ='.$model->id_inscripcion);
                        if(isset($participantesCompetenciaCategoria)){
                            $count = count($participantesCompetenciaCategoria);
                            foreach($participantesCompetenciaCategoria as $participanteCC){
                                ?>
                            <div id="removeParticipante<?php echo $i;?>" class="row"  style="border-top: 1px solid #ddd;">
                           <!--<div class="row">-->
                               <div class="col-xs-6" style="padding: 8px;"> 
                                   <input type="hidden" id="id_usuario_eR<?php echo $i;?>" name="id_usuario_eR<?php echo $i;?>" value="<?php echo $participanteCC->id_usuario;?>">    
                                   <label><?php echo $participanteCC->idUsuario->usuario;?></label>
                               </div>

<!--                               <div style="text-align: right" class="col-xs-6" style="padding: 8px;">
                                   <a class="delete" data-original-title="Borrar" title="" data-toggle="tooltip" href="javascript:removeParticipante(<?php echo $i; ?>, <?php echo $participanteCC->id_participante; ?>)">
                                   <i class="glyphicon glyphicon-trash"></i>
                                   </a>
                               </div>-->
                           </div>
                                <?php
                                $i++;
                                $countRowParticipante++;
                            }
                        }
//                    
                    ?>
                </div>
                <input id="countRowParticipante" type="hidden" name="countRowParticipante" value="<?php echo $countRowParticipante; ?>" />
                <input id="nextRowParticipante" type="hidden" name="nextRowParticipante" value="<?php echo $count; ?>" />
            </div>
        </div>   
    </div>    
    
        <?php
//        echo CHtml::link(
//            'Keep buying', 
//            Yii::app()->createUrl('site/index', array()), array('class' => 'btn btn-default link', 'style'=>'width: 100%; height: 35px;')
//        );
        ?>
    
</div>
