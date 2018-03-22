<head>
    <!--=====================-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <!--=====================-->
    
    <script>

        $(window).ready(function(){

            $("body").animate({ scrollTop: $(document).height()}, 1000);    

        });

    </script>
    
    
</head>

<?php
$this->breadcrumbs=array(
	'Users History',
);

$this->menu=array(
array('label'=>__('Create user'),'url'=>array('create')),
array('label'=>__('Manage User'),'url'=>array('admin')),
);
?>
<span class="ez"><?php echo __('History'); ?></span>
<!--<a href="#abajo">Go to the bottom of the page</a>-->
<div class="pd-inner">
    
    <?php 
    $pagoUsuarios = Pago::model()->findAll('id_usuario ='.Yii::app()->user->id_usuario_sistema);
    $error = 0;
    foreach ($pagoUsuarios as $pagoUsuario){
        $pagoDetalle = PagoDetalle::model()->findAll('id_pago ='.$pagoUsuario->id_pago);
        if(count($pagoDetalle) == 0){
            $error++;
        }
    }
    
    //=====================================================================//
    // Inscripcion sin audio
    //=====================================================================//
    $inscripcionUsuarios = Inscripcion::model()->findAll('id_usuario ='.Yii::app()->user->id_usuario_sistema);
    $error1 = 0;
    foreach ($inscripcionUsuarios as $inscripcionUsuario){
        if( $inscripcionUsuario->audio == "audio_defaul.mp3"){
            $error1++;
        }
    }
    
    //=====================================================================//
    // Inscripcion sin la cantidad correcta de participantes
    //=====================================================================//
    $inscripcionParticipantes = Inscripcion::model()->findAll('id_usuario ='.Yii::app()->user->id_usuario_sistema);
    $error2 = 0;
    foreach ($inscripcionParticipantes as $inscripcionParticipante){
        if($inscripcionParticipante->idCategoria->id_tipo_categoria == 1){
            $cantidadParticipante = 1; //Solista
        }else{
            if($inscripcionParticipante->idCategoria->id_tipo_categoria == 2){
                $cantidadParticipante = 2; //Pareja
            }else{
                $cantidadParticipante = 3; //Grupo
            }
        }
        $particiapanteInscripcion = Participante::model()->findAll('id_inscripcion ='.$inscripcionParticipante->id_inscripcion);
        if($cantidadParticipante == 3){ //Grupo
            if(count($particiapanteInscripcion) <= 1){
                $error2++;
            }
        }else{
            if($cantidadParticipante != count($particiapanteInscripcion)){
                $error2++;
            }
        }
    }
    
    
    //=====================================================================//
    // Inscripcion sin grupo
    //=====================================================================//
    $inscripcionUsuariosGrupos = Inscripcion::model()->findAll('id_competencia_tipo = 3 AND id_usuario ='.Yii::app()->user->id_usuario_sistema);
    $error3 = 0;
    foreach ($inscripcionUsuariosGrupos as $inscripcionUsuariosGrupo){
        if( $inscripcionUsuariosGrupo->grupo == "" || $inscripcionUsuariosGrupo->grupo == NULL){
            $error3++;
        }
    }
    
    
    
    if($error != 0){
        ?>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                        <?php echo __('Errors found that must be corrected'); ?>
                    </div>
                    <div class="panel-body">
                        
                        
                        
                        <table class="table  table-hover">
                            <thead >
                                <tr class="warning">
                                    <td><center><strong><?php echo __('Id Payment'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Payment method'); ?></strong></center> </td>
                                    <td><center><strong><?php echo __('Competence'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Registration date'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('To correct'); ?></strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                foreach ($pagoUsuarios as $pagoUsuario){
                                    $pagoDetalle = PagoDetalle::model()->findAll('id_pago ='.$pagoUsuario->id_pago);
                                    if(count($pagoDetalle) == 0){
                                        ?>
                                        <tr>
                                        <td><center><?php echo $pagoUsuario->id_pago; ?></center></td>
                                        <td><center>
                                            <?php
                                                if($pagoUsuario->id_tipo_pago == 1){
                                                    echo __("Competitor pass");
                                                }else{
                                                    echo __("Competition registration");
                                                }
                                            ?>
                                        </center></td>
                                        <td><center><?php echo $pagoUsuario->idCompetencia->competencia; ?></center></td>
                                        <td><center><?php echo $pagoUsuario->fecha_pago; ?></center></td>
                                        <td><center>
                                            <?php
                                            if($pagoUsuario->id_tipo_pago == 1){
                                               
                                            ?>
                                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/pago/update/<?php echo $pagoUsuario->id_pago; ?>">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </a>
                                            <?php
                                            }else{
                                                if($pagoUsuario->id_inscripcion){
                                                ?>
                                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/inscripcion/update/<?php echo $pagoUsuario->id_inscripcion; ?>">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>

                                                <?php
                                                }
                                            }
                                            ?>
                                        </center></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    
    
    if($error1 != 0){
        ?>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                        <?php echo __('Errors found that must be corrected: Audio of the Inscriptions'); ?>
                    </div>
                    <div class="panel-body">
                        
                        <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="table table-hover table-bordered" cellspacing="0">
                            <thead>
                                <tr class="warning">
                                    <td style=" width: 10%;"><center><strong><?php echo __('Competition'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Block'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Categories'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Group name'); ?></strong></center></td>
                                    <td style=" width: 40%;"><center><strong><?php echo __('Participants'); ?></strong></center></td>
                                    <!--<td style=" width: 10%;"><center><strong>Audio</strong></center></td>-->
                                    <td style=" width: 10%;"><center><strong><?php echo __('To Correct'); ?></strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                $inscripcionUsuarios = Inscripcion::model()->findAll('id_usuario ='.Yii::app()->user->id_usuario_sistema);
                                foreach ($inscripcionUsuarios as $inscripcion){
                                    if( $inscripcion->audio == "audio_defaul.mp3"){
                                        
                                   
                                
//                                $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria);
//                                foreach ($inscripciones as $inscripcion){
                                    ?>
                                    <tr>
                                        <td><?php echo $inscripcion->idCopetencia->competencia; ?></td>
                                        <td><?php echo $inscripcion->idCategoria->idBloque->bloque; ?></td>
                                        <td><?php echo $inscripcion->idCategoria->categoria; ?></td>
                                        <td>
                                            <?php 
                                                if($inscripcion->grupo){
                                                    echo $inscripcion->grupo;
                                                }else{
                                                    echo "";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                $participantes = Participante::model()->findAll('id_inscripcion ='.$inscripcion->id_inscripcion);
                                                if(count($participantes) != 0){
                                                    ?><ul><?php
                                                    foreach ($participantes as $participante){
                                                        ?><li><?php echo $participante->idUsuario->primer_nombre." ".$participante->idUsuario->primer_apellido; ?></li><?php
                                                    }
                                                    ?></ul><?php
                                                }else{
                                                    echo "0";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <center>
                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/inscripcion/update/<?php echo $inscripcion->id_inscripcion; ?>">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        
                    </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    
    
    if($error2 != 0){
        ?>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                        <?php echo __('Errors found that must be corrected: Number of users per registration'); ?>
                    </div>
                    <div class="panel-body">
                        
                        <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="table table-hover table-bordered" cellspacing="0">
                            <thead>
                                <tr class="warning">
                                    <td style=" width: 10%;"><center><strong><?php echo __('Competition'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Block'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Categories'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Type Category'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Qty. Participants'); ?></strong></center></td>
                                    <td style=" width: 40%;"><center><strong><?php echo __('Participants'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('To Correct'); ?></strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                $inscripcionParticipantes = Inscripcion::model()->findAll('id_usuario ='.Yii::app()->user->id_usuario_sistema);
                                foreach ($inscripcionParticipantes as $inscripcion){
                                    if($inscripcion->idCategoria->id_tipo_categoria == 1){
                                        $cantidadParticipante = 1; //Solista
                                    }else{
                                        if($inscripcion->idCategoria->id_tipo_categoria == 2){
                                            $cantidadParticipante = 2; //Pareja
                                        }else{
                                            $cantidadParticipante = 3; //Grupo
                                        }
                                    }
                                    $particiapanteInscripcion = Participante::model()->findAll('id_inscripcion ='.$inscripcion->id_inscripcion);
                                    if($cantidadParticipante == 3){ //Grupo
                                        if(count($particiapanteInscripcion) <= 1){
//                                            $error2++;
                                            ?>
                                            <tr>
                                                <td><?php echo $inscripcion->idCopetencia->competencia; ?></td>
                                                <td><?php echo $inscripcion->idCategoria->idBloque->bloque; ?></td>
                                                <td><?php echo $inscripcion->idCategoria->categoria; ?></td>
                                                <td><?php echo $inscripcion->idCategoria->idTipoCategoria->tipo; ?></td>
                                                <td>
                                                    <?php 
                                                        $participantes = Participante::model()->findAll('id_inscripcion ='.$inscripcion->id_inscripcion);
                                                        $cantidadP = "";
                                                        if($cantidadParticipante == 1){
                                                            $cantidadP = ' / 1';
                                                        }
                                                        if($cantidadParticipante == 2){
                                                            $cantidadP = ' / 2';
                                                        }
                                                        if($cantidadParticipante == 3){
                                                            $cantidadP = ' > 1';
                                                        }
                                                        echo count($participantes).$cantidadP;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        $participantes = Participante::model()->findAll('id_inscripcion ='.$inscripcion->id_inscripcion);
                                                        if(count($participantes) != 0){
                                                            ?><ul><?php
                                                            foreach ($participantes as $participante){
                                                                ?><li><?php echo $participante->idUsuario->primer_nombre." ".$participante->idUsuario->primer_apellido; ?></li><?php
                                                            }
                                                            ?></ul><?php
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <center>
                                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/inscripcion/update/<?php echo $inscripcion->id_inscripcion; ?>">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>
                                                    </center>
                                                </td>
                                            </tr>
                                            
                                            <?php
                                        }
                                    }else{
                                        if($cantidadParticipante != count($particiapanteInscripcion)){
//                                            $error2++;
                                            ?>
                                            <tr>
                                                <td><?php echo $inscripcion->idCopetencia->competencia; ?></td>
                                                <td><?php echo $inscripcion->idCategoria->idBloque->bloque; ?></td>
                                                <td><?php echo $inscripcion->idCategoria->categoria; ?></td>
                                                <td><?php echo $inscripcion->idCategoria->idTipoCategoria->tipo; ?></td>
                                                <td>
                                                    <?php 
                                                        $participantes = Participante::model()->findAll('id_inscripcion ='.$inscripcion->id_inscripcion);
                                                        $cantidadP = "";
                                                        if($cantidadParticipante == 1){
                                                            $cantidadP = ' / 1';
                                                        }
                                                        if($cantidadParticipante == 2){
                                                            $cantidadP = ' / 2';
                                                        }
                                                        if($cantidadParticipante == 3){
                                                            $cantidadP = ' > 1';
                                                        }
                                                        echo count($participantes).$cantidadP;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        $participantes = Participante::model()->findAll('id_inscripcion ='.$inscripcion->id_inscripcion);
                                                        if(count($participantes) != 0){
                                                            ?><ul><?php
                                                            foreach ($participantes as $participante){
                                                                ?><li><?php echo $participante->idUsuario->primer_nombre." ".$participante->idUsuario->primer_apellido; ?></li><?php
                                                            }
                                                            ?></ul><?php
                                                        }else{
                                                            echo "0";
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <center>
                                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/inscripcion/update/<?php echo $inscripcion->id_inscripcion; ?>">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>
                                                    </center>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                                        
                                   
                                
//                                $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria);
//                                foreach ($inscripciones as $inscripcion){
                                    ?>
                                    
                                    <?php
//                                    }
//                                }
                                ?>
                            </tbody>
                        </table>
                        
                    </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    
    
    
    if($error3 != 0){
        ?>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                        <?php echo __('Errors found that must be corrected: Group name'); ?>
                    </div>
                    <div class="panel-body">
                        
                        <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="table table-hover table-bordered" cellspacing="0">
                            <thead>
                                <tr class="warning">
                                    <td style=" width: 10%;"><center><strong><?php echo __('Competition'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Block'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Categories'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Group Name'); ?></strong></center></td>
                                    <td style=" width: 40%;"><center><strong><?php echo __('Participants'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('To Correct'); ?></strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                $inscripcionUsuarios = Inscripcion::model()->findAll('id_competencia_tipo = 3 AND id_usuario ='.Yii::app()->user->id_usuario_sistema);
                                foreach ($inscripcionUsuarios as $inscripcion){
                                    if( $inscripcion->grupo == "" || $inscripcion->grupo == NULL){
                                        
                                   
                                
//                                $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria);
//                                foreach ($inscripciones as $inscripcion){
                                    ?>
                                    <tr>
                                        <td><?php echo $inscripcion->idCopetencia->competencia; ?></td>
                                        <td><?php echo $inscripcion->idCategoria->idBloque->bloque; ?></td>
                                        <td><?php echo $inscripcion->idCategoria->categoria; ?></td>
                                        <td>
                                            <?php 
                                                if($inscripcion->grupo){
                                                    echo $inscripcion->grupo;
                                                }else{
                                                    echo "";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                $participantes = Participante::model()->findAll('id_inscripcion ='.$inscripcion->id_inscripcion);
                                                if(count($participantes) != 0){
                                                    ?><ul><?php
                                                    foreach ($participantes as $participante){
                                                        ?><li><?php echo $participante->idUsuario->primer_nombre." ".$participante->idUsuario->primer_apellido; ?></li><?php
                                                    }
                                                    ?></ul><?php
                                                }else{
                                                    echo "0";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <center>
                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/inscripcion/update/<?php echo $inscripcion->id_inscripcion; ?>">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        
                    </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    
    
    ?>
    
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('Active Competences'); ?></div>
                <div class="panel-body">
                    <?php 
                        $this->widget('booster.widgets.TbGridView',array(
                        'id'=>'participante-grid',
                        'dataProvider'=>$model->participanteActivo(1),
//                        'filter'=>$model,
                        'columns'=>array(
                                array(
                                    
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>__('Competence'),
                                  'name'=>'id_copetencia',
                                  'type'=>'raw',
                                  'value'=>'$data->idCompetencia->competencia',
                                ), 
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>__('Descripction'),
                                  'name'=>'id_copetencia',
                                  'type'=>'raw',
                                  'value'=>'$data->idCompetencia->descripcion',
                                ), 
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>__('Event Place'),
                                  'name'=>'id_copetencia',
                                  'type'=>'raw',
                                  'value'=>'$data->idCompetencia->direccion',
                                ), 
                            
                        ),
                        )); 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('Competences History'); ?></div>
                <div class="panel-body">
                    <?php 
                        $this->widget('booster.widgets.TbGridView',array(
                        'id'=>'participante-grid',
                        'dataProvider'=>$model->participanteActivo(),
//                        'filter'=>$model,
                        'columns'=>array(
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>__('Competence'),
                                  'name'=>'id_copetencia',
                                  'type'=>'raw',
                                  'value'=>'$data->idCompetencia->competencia',
                                ), 
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>__('Description'),
                                  'name'=>'id_copetencia',
                                  'type'=>'raw',
                                  'value'=>'$data->idCompetencia->descripcion',
                                ), 
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>__('Event Place'),
                                  'name'=>'id_copetencia',
                                  'type'=>'raw',
                                  'value'=>'$data->idCompetencia->direccion',
                                ), 
                            
                        ),
                        )); 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('Payment History'); ?></div>
                <div class="panel-body">
                    <div class="col-sm-12 col-md-12">
                    <!--<center><h4>Competitor pass</h4></center>-->
                    <hr>
                    <?php 
                    function tipoPago($tipo_pago){
                        
                        if($tipo_pago == 1){
                            $tipoPago = __("Competitor pass");
                        }
                        if($tipo_pago == 2){
                            $tipoPago = __("Category subscription");
                        }else{
                            $tipoPago = __("Competitor pass");
                        }
                        return $tipoPago;
                    }
                    
                    function competencia($idPago){
                        if($idPago){
                            $Pago = Pago::model()->find('id_pago ='.$idPago);
                            if($Pago->id_copetencia){
                                $competencia = Competencia::model()->find('id_copetencia ='.$Pago->id_copetencia);
                                return $competencia->competencia;
                            }else{
                                if($Pago->id_categoria){
                                    $categoria = Categoria::model()->find('id_categoria ='.$Pago->id_categoria);
                                    return $categoria->competenciaCategorias->idCopetencia->competencia;
                                }else{
                                    if($Pago->id_inscripcion){
                                        $inscripcion = Inscripcion::model()->find('id_inscripcion ='.$Pago->id_inscripcion);
                                        return $inscripcion->idCopetencia->competencia;
                                    }
                                }
                            }
                        }else{
                            echo "-";
                        }
                    }
                    
                    
                    
                    function categoria($idPago){
                        if($idPago){
                            $Pago = Pago::model()->find('id_pago ='.$idPago);
                            if($Pago->id_tipo_pago == 1){
                                echo "-"; 
                            }
//                            if($Pago->id_copetencia){
//                                $competencia = Competencia::model()->find('id_copetencia ='.$Pago->id_copetencia);
//                                return $competencia->competencia;
//                            }else{
                                if($Pago->id_categoria){
                                    $categoria = Categoria::model()->find('id_categoria ='.$Pago->id_categoria);
                                    return $categoria->competenciaCategorias->idCopetencia->competencia;
                                }else{
                                    if($Pago->id_inscripcion){
                                        $inscripcion = Inscripcion::model()->find('id_inscripcion ='.$Pago->id_inscripcion);
                                        return $inscripcion->idCategoria->categoria;
                                    }
                                }
//                            }
                        }else{
                            echo "-";
                        }
                    }
                    
                    
                    function estatusPago($idPago = NULL){
                        $gratis = 0;
                        if($idPago){
                        $Pago = Pago::model()->find('id_pago ='.$idPago);
                        if($Pago->id_copetencia){
                            $competencia = Competencia::model()->find('id_copetencia ='.$Pago->id_copetencia);
                            $gratis = $competencia->gratis;
//                                return $competencia->competencia;
                        }else{
                            if($Pago->id_categoria){
                                $categoria = Categoria::model()->find('id_categoria ='.$Pago->id_categoria);
//                                    return $categoria->competenciaCategorias->idCopetencia->competencia;
                                $gratis = $categoria->competenciaCategorias->idCopetencia->gratis;
                            }else{
                                if($Pago->id_inscripcion){
                                    $inscripcion = Inscripcion::model()->find('id_inscripcion ='.$Pago->id_inscripcion);
//                                        return $inscripcion->idCopetencia->competencia;
                                    $gratis = $inscripcion->idCopetencia->gratis;
                                }
                            }
                        }
                        
                        if($gratis == 1){
                            return __("Free");
                        }else{
                            $estatusPago = Pago::model()->find('id_pago ='.$idPago);
                            return $estatusPago->idPagoEstatus->pago_estatus;
                        }
                        }
                    }
                    
                    function boton($idPago){
                        return "{view}" ;
                    }
                    
                    
                    function editarInscripcion($idPago){
                        $Pago = Pago::model()->find('id_pago ='.$idPago);
                        $tipo_pago = $Pago->id_tipo_pago;
                        if($tipo_pago == 1){
                            $tipoPago = NULL;
                        }
                        if($tipo_pago == 2){
                            $tipoPago = '<a class="view" href="'.Yii::app()->request->baseUrl.'/inscripcion/update/'.$Pago->id_inscripcion.'" data-toggle="tooltip" title="" data-original-title="'.__('View').'">
                            <i class="glyphicon glyphicon-pencil"></i>
                            </a>';
                            
                        }else{
                            $tipoPago = NULL;
                        }
                        return $tipoPago;
                    }
                    function detallarInscripcion($idPago){
                        $Pago = Pago::model()->find('id_pago ='.$idPago);
                        $tipo_pago = $Pago->id_tipo_pago;
                        if($tipo_pago == 1){
                            $tipoPago = NULL;
                        }
                        if($tipo_pago == 2){
                            $tipoPago = '<a class="view" href="'.Yii::app()->request->baseUrl.'/inscripcion/'.$Pago->id_inscripcion.'" data-toggle="tooltip" title="" data-original-title="'.__('Play').'">
                            <i class="glyphicon glyphicon-volume-up"></i>
                            </a>';
                            
                        }else{
                            $tipoPago = NULL;
                        }
                        return $tipoPago;
                    }
                    
                    $boton = array(
                                    'class'=>'booster.widgets.TbButtonColumn',
                                    'template'=>'{update}',
                                    'buttons'=>array(
                                        'update' => array(
                                            'url'=>'Yii::app()->createUrl("inscripcion/update/".$data->idPago->id_inscripcion)',
//                                            'options' => array( 'title'=>'Ver', 'class' => 'glyphicon glyphicon-pencil'),
                                            'visible'=>'Yii::app()->user->id_perfil_sistema!=9',
                                        ),
                                    ),
                                );
                    $this->widget('booster.widgets.TbGridView',array(
                    'id'=>'pago-grid',
                    'dataProvider'=>$pago->participanteLista(1),
//                    'filter'=>$pago,
                    'columns'=>array(
                                    'id_pago',
//                                    'id_tipo_pago',
//                                    'id_copetencia',
//                                    'id_categoria',    
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>__('Payment method'),
                                  'name'=>'id_tipo_pago',
                                  'type'=>'raw',
                                  'value'=>'tipoPago($data->id_tipo_pago)',
                                ),
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>__('Competence'),
                                  'name'=>'id_pago',
                                  'type'=>'raw',
                                  'value'=>'competencia($data->id_pago)',
                                ), 
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>__('Category'),
                                  'name'=>'id_pago',
                                  'type'=>'raw',
                                  'value'=>'categoria($data->id_pago)',
                                ), 
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>__('Bought for'),
                                  'name'=>'id_usuario',
                                  'type'=>'raw',
                                  'value'=>'$data->idUsuario->usuario',
                                ), 
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>__('Bought by'),
                                  'name'=>'id_usuario_registro',
                                  'type'=>'raw',
                                  'value'=>'$data->idUsuarioRegistro->usuario',
                                ), 
//                                'id_usuario',
//                                'id_usuario_registro',
//                                'id_pase_estatus',
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>__('Status'),
                                  'name'=>'id_pago',
                                  'type'=>'raw',
                                  'value'=>__(estatusPago($data->id_pago)),
                                ), //
                                array(
                                    'class'=>'booster.widgets.TbButtonColumn',
                                    'template'=>'{view}',
                                    'buttons'=>array(
                                        'view' => array(
                                            'url'=>'Yii::app()->createUrl("pago/".$data->id_pago)',
                                            'visible'=>'Yii::app()->user->id_perfil_sistema!=9',
                                        ), 
                                    ),
                                ), 
                                array(
                                  'header' =>FALSE,
                                  'name'=>'id_pago',
                                  'type'=>'raw',
                                  'value'=>'editarInscripcion($data->id_pago)',
                                ),
                                array(
                                  'header' =>FALSE,
                                  'name'=>'id_pago',
                                  'type'=>'raw',
                                  'value'=>'detallarInscripcion($data->id_pago)',
                                ),
//                                array(
//                                  'filter'=>CHtml::listData(Categoria::model()->findAll(),'id_categoria','categoria'),
//                                  'name'=>'id_categoria',
//                                  'type'=>'raw',
//                                  'value'=>'$data->idCompetencia->competencia',
//                                ),
//                                    'id_usuario',
//                                    'id_usuario_pagador',
                                    /*
                                    'costo_pagar',
                                    'costo_pagado',
                                    'id_forma_pago',
                                    'referencia',
                                    'img',
                                    'descripcion',
                                    */
//                    array(
//                    'class'=>'booster.widgets.TbButtonColumn',
//                    ),
                    ),
                    )); 
                    ?>
                    <?php
                        $sumasPagar = Pago::model()->findAll('id_inscripcion is not null AND id_usuario_pagador ='.Yii::app()->user->id_usuario_sistema.' AND id_pago_estatus = 1');
//                            echo var_dump($sumasPagar);
                        $suma = 0;
                        foreach ($sumasPagar as $sumaPaga){
//                                echo $sumaPaga->idCategoria->id_tipo_categoria." = ";
                            $costoTipo = $sumaPaga->costo_pagar;
//                                echo "Competencia =".$sumaPaga->id_copetencia." Tipo =".$sumaPaga->idCategoria->id_tipo_categoria." Costo =".$costoTipo->costo."<hr>";
                            $suma +=$costoTipo;
                        }
//                        echo "Valor: ".$suma;
                        if($suma !=0){
                        ?>
                    <hr>
                            <div class="alert alert-dismissible alert-warning">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <h4><?php echo __('Warning!'); ?></h4>
                                <p><?php echo __('Remember that after paying on the Paypal payment platform you must click on the button to return to the system.'); ?></p>
                            </div>
                            <form action = "https://www.paypal.com/cgi-bin/webscr" method = "post" style="text-align: center">

                                <input type = "hidden" name = "cmd" value = "_ext-enter" />
                                <input type = "hidden" name = "redirect_cmd" value = "_xclick" />
                                <input type = "hidden" name = "business" value = "wincompetition2017@gmail.com" />
                                <input type = "hidden" name = "item_name" value = "Pago de Inscripciones Pendientes" />
                                <input type = "hidden" name = "quantity" value = "1" />
                                <input type = "hidden" name = "amount" value = "<?php echo $suma; ?>" />
                                <input type = "hidden" name = "tax_rate" value = "0" />
                                <input type = "hidden" name = "rm" value = "2" />
                                <input type = "hidden" name = "currency_code" value = "USD" />
                                <input type = "hidden" name = "address1" value = "xxxxxxxxxxx">
                                <input type = "hidden" name = "city" value = "yyyyyyyyyy">
                                <input type = "hidden" name = "state" value = "zzzzzzzzzzzz">
                                <input type = "hidden" name = "zip" value = "1111111">
                                <!--<input type = "hidden" name = "on0" value = "Nro de Pago">
                                <input type = "hidden" name = "os0" value = "<?php /*echo $model->id_pago; */?>">-->
                                <input type = "hidden" name = "return" value = "http://<?php echo $_SERVER['HTTP_HOST'].Yii::app()->createUrl('pago/ReportePago'); ?>?idPago=00"/>
                                <input type = "hidden" name = "cancel_return" value = "http://<?php echo $_SERVER['HTTP_HOST'].Yii::app()->createUrl('usuario/historial') ?>" />
                                <input type = "hidden" name = "bn" value = "PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest" />
                                <input type = "image" src = "../images/boton-paypal.png" border = "0" width = "200px" name = "submit" alt = "" border = "0"/>

                            </form>
                        <?php
                        }
                    ?>
                    </div>
                    
                
            </div>
        </div>
    </div>
</div>
</div>

<?php
/*
 <div class="col-sm-1 middle-border"></div>
                    <div style="border-left: 1px solid #F5F5F5; " class="col-sm-12 col-md-6">
                        <center><h4>Categorías</h4></center>
                        <hr>
                    <?php $this->widget('booster.widgets.TbGridView',array(
                        'id'=>'participante-grid',
                        'dataProvider'=>$participante->ParticipanteLista(),
//                        'filter'=>$participante,
                        'columns'=>array(
                                array(
                                    'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                    'header' =>'Competencia',
                                    'name'=>'id_competencia',
                                    'type'=>'raw',
                                    'value'=>'$data->idCompetencia->competencia',
                                ), 
                                array(
                                  'filter'=>CHtml::listData(Categoria::model()->findAll(),'id_categoria','categoria'),
                                  'header' =>'Categoría',
                                  'name'=>'id_categoria',
                                  'type'=>'raw',
                                  'value'=>'$data->idCategoria->categoria',
                                ),
                                array(
                                    'class'=>'booster.widgets.TbButtonColumn',
                                    'template'=>'{view}{update}{pagar}',
                                    'buttons'=>array(
                                        'view' => array(
                                            'url'=>'Yii::app()->createUrl("inscripcion/".$data->id_inscripcion)',
                                            'visible'=>'Yii::app()->user->id_perfil_sistema!=9',
                                        ),
                                        'update' => array(
                                            'url'=>'Yii::app()->createUrl("inscripcion/update/".$data->id_inscripcion)',
//                                            'options' => array( 'title'=>'Ver', 'class' => 'glyphicon glyphicon-pencil'),
                                            'visible'=>'Yii::app()->user->id_perfil_sistema!=9',
                                        ), 
                                        'pagar' => array(
                                            'url'=>'Yii::app()->createUrl("pago/pagoPaypal", array())',
                                            'options' => array( 'title'=>'Pagar', 'class' => 'glyphicon glyphicon-shopping-cart'),
                                            'visible'=>'Pagar',
                                        ), 
//                                        'editar' => array(
//                                            'imageUrl'=>false,
//                                            'url'=>'Yii::app()->createUrl("socio/consultor", array("id"=>$data->id_socio))',
//                                            'label' => '',
//                                            'options' => array( 'title'=>'Ver', 'class' => 'glyphicon glyphicon-eye-open'),
//                                            'visible'=>'Yii::app()->user->id_perfil_sistema==9',
//                                           ),
                                    ),
                                ),
//                                        'id_participante',
//                                        'id_inscripcion',
//                                        'id_copetencia',
//                                        'id_categoria',
//                                        'id_usuario',
//                                        'id_usuario_registro',
                                        /*
                                        'estatus',
                                        
//                        array(
//                        'class'=>'booster.widgets.TbButtonColumn',
//                        ),
                        ),
                        )); ?>    
                        
                    </div>
*/
?>

<script>
//    var idPago = $('#idPago').val();
    idPago = 00;
    var total = $('#MontoPagarCategoria').val();
//    alert(total);
    paypal.Button.render({
        
        env: 'production', // sandbox | production

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create
        client: {
            sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
            production: 'AccT3PSiicoe8r9H7zclS4BvAY4kjhH0BxUYxVsSh6uxOSGIEXeLtckkByKtKtsjFuS4ijL7GT7sk9GP' //'<insert production client id>'
        },

        // Show the buyer a 'Pay Now' button in the checkout flow
        commit: true,

        // payment() is called when the button is clicked
        payment: function(data, actions) {
            
            // Make a call to the REST api to create the payment
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: total, currency: 'USD' }
                        }
                    ]
                }
            });
        },

        // onAuthorize() is called when the buyer approves the payment
        onAuthorize: function(data, actions) {

            // Make a call to the REST api to execute the payment
            return actions.payment.execute().then(function() {
                $.post("<?php echo Yii::app()->createUrl('pago/ReportePago') ?>",{ idPago:idPago },function(data){});
                window.alert('Payment Complete! / ¡Pago completado!');
                
            });
        }

    }, '#paypal-button-container');

function prueba(){
    var idPago = 00;
    $.post("<?php echo Yii::app()->createUrl('pago/ReportePago') ?>",{ idPago:idPago },function(data){});
}
</script>
<!--<a onclick="prueba()">Prueba</a>-->