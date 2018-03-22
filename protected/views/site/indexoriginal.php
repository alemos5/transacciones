<?php
/*
if(isset(Yii::app()->user->idioma)) {
    Yii::app()->language = Yii::app()->user->idioma;
}
*/
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
<?php
$this->breadcrumbs=array(
	'Competencias',
);

$this->menu=array(
array('label'=>__('My Profile'),'url'=>array('/usuario/'.Yii::app()->user->id_usuario_sistema)),
array('label'=>__('Competence'),'url'=>array('/competencia/index')),
array('label'=>__('History'),'url'=>array('/usuario/historial')),
//array('label'=>'Administrar Competencia','url'=>array('admin')),
);
?>

<?php

$competencias = Competencia::model()->findAll('visible = 1 ORDER BY orden ASC');
?>
<style>
    .link{
        color: #FC5016;
    }
    .link:hover { color: #fff; } 
    .panelIndex{
    }
    .panelIndex:hover{
        padding: 5px;
        -webkit-box-shadow: -1px 2px 14px -2px rgba(0,0,0,0.75);
        -moz-box-shadow: -1px 2px 14px -2px rgba(0,0,0,0.75);
        box-shadow: -1px 2px 14px -2px rgba(0,0,0,0.75);
    }
</style>
<span class="ez">
    <?php //echo Yii::app()->language."<hr>".Yii::app()->user->idioma."<hr>";?><?php echo __('Competences'); ?></span>
<div class="pd-inner" style="">
<center>
    <div class="row">
    <?php 
        foreach ($competencias as $competencia){ 
        $pagoPase = PagoDetalle::model()->findAll('id_usuario ='.Yii::app()->user->id_usuario_sistema." AND id_competencia =".$competencia->id_copetencia);    
        $pagoCategoría = PagoDetalle::model()->findAll('id_usuario ='.Yii::app()->user->id_usuario_sistema." AND id_categoria =".$competencia->id_copetencia);    
            
    ?>
        <div class="col-sm-12 col-md-4">
            <div  class="panel panel-default panelIndex">
                <div title="" style="position: relative" class="panel-body">
                    <div id="bajo_cabecera" style="position: absolute; top: 0px; left: 170px; width: 50%; height: 40px;">
                        <a data-toggle="tooltip" data-placement="bottom" href="#" title="<?php echo $competencia->descripcion; ?>" alt="<?php echo $competencia->descripcion; ?>">
                            <span class="glyphicon glyphicon-question-sign"></span>
                        </a>
                    </div>	
                    <img style=" margin-top: 10px;" src="<?php $host= $_SERVER["HTTP_HOST"]; echo $urlParte = "http://".$host.""; ?>/images/competencia/<?php echo $competencia->img; ?>" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                </div>
                <div class="panel-footer">
                    <?php echo $competencia->competencia; ?>
                    <br><?php echo date("d-m-Y", strtotime($competencia->fecha_copetencia)); ?>
                    <hr style=" margin-top: 2px;">
                    
                    <div class="col-sm-12 bootstrap-timepicker input-group">
                        <?php
                            if($competencia->gratis != 1){
                                if(count($pagoPase)>0){
                                    $validacion = array('disabled'=>'');
                                }else{
                                    $validacion = array('disabled'=>'');
                                }
                                echo CHtml::link(
                                    __('Buy competitor pass'),
                                    Yii::app()->createUrl('pago/create', array('id'=>$competencia->id_copetencia, 'tipo'=>1)), array('class' => 'btn btn-default link', 'style'=>'width: 100%; height: 35px;')+$validacion
                                );
                                $estatusPaseCOmpetidor = Pago::model()->find('id_copetencia ='.$competencia->id_copetencia.' AND (id_usuario ='.Yii::app()->user->id_usuario_sistema.' OR id_usuario_pagador ='.Yii::app()->user->id_usuario_sistema.' )');
                                if(!$estatusPaseCOmpetidor->id_pago_estatus){
                                    ?>
                                    <span  class="input-group-addon">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                    </span>
                                    <?php
                                }
                                if($estatusPaseCOmpetidor->id_pago_estatus == 1){
                                    ?>
                                    <span  class="input-group-addon">
                                        <i class="glyphicon glyphicon-info-sign"></i>
                                    </span>
                                    <?php
                                }
                                if($estatusPaseCOmpetidor->id_pago_estatus == 2){
                                    ?>
                                    <span  class="input-group-addon">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </span>
                                    <?php
                                }
                                if($estatusPaseCOmpetidor->id_pago_estatus == 3){
                                    ?>
                                    <span  class="input-group-addon">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </span>
                                    <?php
                                }
                                /*if(count($pagoPase)>0){
                                ?>
                                    <span  class="input-group-addon">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </span>
                                <?php
                                }else{
                                ?>
                                    <span style=""  class="input-group-addon">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </span>
                                <?php 
                                }*/
                            }else{
                                echo "<center><h5>".__('Free Competence')."</h5><br></center>";
                            }
                        ?>
                    </div>
                    
                    <?php
                    if($competencia->gratis != 1){
                                        

                    
                    $paseCompetidorP = Pago::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_tipo_pago = 1 AND (id_usuario ='.Yii::app()->user->id_usuario_sistema.'  OR id_usuario_pagador ='.Yii::app()->user->id_usuario_sistema.') AND id_pago_estatus = 2');
                    
//                    $sumasPagar = Pago::model()->findAll('id_inscripcion is not null AND id_usuario_pagador ='.Yii::app()->user->id_usuario_sistema.' AND id_pago_estatus = 1');
                    if(count($paseCompetidorP) > 0){
                    ?>
                        <div style=" margin-top: 5px;" class="col-sm-12 bootstrap-timepicker input-group">
                            <?php
                                echo CHtml::link(
                                    'Buy Category', 
                                    Yii::app()->createUrl('inscripcion/create', array('id_competencia'=>$competencia->id_copetencia)), array('class' => 'btn btn-default link', 'style'=>'width: 100%; height: 35px;')
                                );
                            
                                $CategoriaCompetenciaP = Pago::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_tipo_pago = 2 AND id_inscripcion is not null AND (id_usuario ='.Yii::app()->user->id_usuario_sistema.'  OR id_usuario_pagador ='.Yii::app()->user->id_usuario_sistema.')');
                                if(count($CategoriaCompetenciaP) == 0){
                                    ?>
                                    <span  class="input-group-addon">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                    </span>
                                    <?php
                                }
                                
                                if(count($CategoriaCompetenciaP) > 0){
                                    $CategoriaCompetenciaPP = Pago::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_tipo_pago = 2 AND id_inscripcion is not null AND (id_usuario ='.Yii::app()->user->id_usuario_sistema.'  OR id_usuario_pagador ='.Yii::app()->user->id_usuario_sistema.') AND id_pago_estatus = 1');
                                    if(count($CategoriaCompetenciaPP) == 0){
                                        
                                        ?>
                                        <span  class="input-group-addon">
                                            <i class="glyphicon glyphicon-ok"></i>
                                        </span>
                                        <?php
                                    }
                                    if(count($CategoriaCompetenciaPP) > 0){
                                        ?>
                                        <span  class="input-group-addon">
                                            <i class="glyphicon glyphicon-info-sign"></i>
                                        </span>
                                        <?php
                                    }
                                }
                            
                            ?>
                        </div>
                    <?php 
                        } 
                        
                    }else{
                        echo CHtml::link(
                            __('Subscribe Category'),
                            Yii::app()->createUrl('inscripcion/create', array('id_competencia'=>$competencia->id_copetencia)), array('class' => 'btn btn-default link', 'style'=>'width: 100%; height: 35px;')
                        );
                    }
                        ?>
                    <!--<hr>-->
                    <?php //echo $competencia->descripcion; ?>
                    <!--<div class="col-sm-12 col-md-3">-->
                    
<!--                    <button style=" width: 100%;" type="button" class="btn btn-default">
                        Buy competitor pass &nbsp; &nbsp; <span class="glyphicon glyphicon-question-sign"></span>
                    </button>
                    <button style=" width: 100%; margin-top: 5px;" type="button" class="btn btn-default">
                        Buy category
                    </button>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
    
</center>
<br><br>
<div class="panel panel-default">
  <div class="panel-heading"><?php echo __('Legend'); ?></div>
  <div class="panel-body">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <span  class="input-group-addon">
                <i class="glyphicon glyphicon-shopping-cart"></i> 
            </span>
            <center>
                <?php echo __('Buy'); ?>
            </center>
        </div>
        <div class="col-sm-12 col-md-3">
            <span  class="input-group-addon">
                <i class="glyphicon glyphicon-info-sign"></i> 
            </span>
            <center>
                <?php echo __('Waiting for payment'); ?>

            </center>
        </div>
        <div class="col-sm-12 col-md-3">
            <span  class="input-group-addon">
                <i class="glyphicon glyphicon-ok"></i> 
            </span>
            <center>
                <?php echo __('Payment successful'); ?>

            </center>
        </div>
        <div class="col-sm-12 col-md-3">
            <span  class="input-group-addon">
                <i class="glyphicon glyphicon-remove"></i>
            </span>
            <center>
                <?php echo __('Payment with problems'); ?>

            </center>
        </div>
    </div>
  </div>
</div>
</div>

