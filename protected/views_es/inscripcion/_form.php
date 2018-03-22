


<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'inscripcion-form',
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); 
$tipo = 2;

?>
<input id="id" name="id" value="<?php echo $id_competencia; ?>" type="hidden">
<input id="tipo" name="tipo" value="<?php echo $tipo; ?>" type="hidden">
<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php

//    echo "Id_competencia: ".$id;
    $competencia = Competencia::model()->find('id_copetencia ='.$id_competencia);
    echo $form->errorSummary($model); 
?>
<div id="errores2" style=" display: none;" class="row">
    <div class="col-sm-12 col-md-12">
        <div  class="alert alert-danger">
            <label style=" display: block;" id="superacion">Se ha llegado al cupo máximo para esta categoría</label>
        </div>
    </div>
</div>

<?php 
if($competencia->gratis != 1){
    $estatusPaseCOmpetidor = Pago::model()->find('id_copetencia ='.$competencia->id_copetencia.' AND (id_usuario ='.Yii::app()->user->id_usuario_sistema.' OR id_usuario_pagador ='.Yii::app()->user->id_usuario_sistema.' ) AND id_pago_estatus = 1');
    if($estatusPaseCOmpetidor->id_pago_estatus){
        ?>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="alert alert-success">
                    <center>
                        Para cancelar todas las categorías, ir a: &nbsp;&nbsp;<b><a href="http:<?php echo Yii::app()->baseUrl; ?>/usuario/historial">(Historia->Historial de Pagoso)</a></b>
                    </center>
                </div>
            </div>
        </div>
        <?php
    }
}
?>

<div class="row">
    <?php 
    if(!$model->id_inscripcion){
    ?>
    <div class="col-sm-12 col-md-4">
        
        <div class="row">
            <div class="col-sm-12 col-md-12">
                
                <div class="panel-group" id="accordion">
                    <?php 
                    $competenciaCategorias = CompetenciaCategoria::model()->findAll('id_copetencia ='.$id_competencia);
                    $bloques = Bloque::model()->findAll('estatus = 1');
                    $bloqueCategoriaContenedor = array();
                        foreach ($bloques as $bloque){
                            $categoriaTs = Categoria::model()->findAll('estatus = 1 AND id_bloque ='.$bloque->id_bloque);
                            $contador = 0;
                            foreach ($categoriaTs as $categoriaT){
                                $competenciaCategoriasT = CompetenciaCategoria::model()->findAll('id_copetencia ='.$id_competencia.' AND id_categoria ='.$categoriaT->id_categoria);
                                $contador = $contador + count($competenciaCategoriasT);
                            }
                            if($contador > 0){
                            ?>
                            <div class="panel panel-warning">
                              <div class="panel-heading" >
                                  
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <h4 class="panel-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $bloque->id_bloque?>">
                                      <?php echo $bloque->bloque; ?>
                                      </a>
                                    </h4>
                                </div>
                                <div style="text-align: right" class="col-sm-12 col-md-6">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $bloque->id_bloque?>">
                                        <div class="btn btn-default" >
                                            <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>  
                                        </div>
                                    </a>
                                </div>
                            </div>
                              </div>
                              <div id="collapse<?php echo $bloque->id_bloque?>" class="panel-collapse collapse">
                                 <?php
                                    foreach ($competenciaCategorias as $competenciaCategoria){
                                        
                                        //=====================================================================//
                                        // Capacidad de la categoría
                                        //=====================================================================//
                                        
                                        $countCategoria = Categoria::model()->find('id_categoria ='.$competenciaCategoria->id_categoria);
                                        $max = $countCategoria->competidor_max;
                                        $inscripcion = Inscripcion::model()->findAll('id_categoria ='.$competenciaCategoria->id_categoria);
                                        $valorFuncion = 0;
                                        if(count($inscripcion) >= $max){
                                            $valorFuncion = 1;
                                        }else{
                                            $valorFuncion = 0;
                                        }
                                        
                                        
                                        if($competenciaCategoria->idCategoria->id_bloque == $bloque->id_bloque){
                                            if($competenciaCategoria->idCategoria->estatus != 0){
                                                ?>
                                                <input type="hidden" id="idCategoria" name="idCategoria" value="<?php echo $competenciaCategoria->idCategoria->id_categoria; ?>">
                                                <input type="hidden" id="tipoCategoria<?php echo $competenciaCategoria->idCategoria->id_categoria; ?>" name="tipoCategoria<?php echo $competenciaCategoria->idCategoria->id_categoria; ?>" value="<?php echo $competenciaCategoria->idCategoria->id_tipo_categoria; ?>">
                                                <input type="hidden" id="nombreCategoria<?php echo $competenciaCategoria->idCategoria->id_categoria; ?>" name="nombreCategoria<?php echo $competenciaCategoria->idCategoria->id_categoria; ?>" value="<?php echo $competenciaCategoria->idCategoria->categoria; ?>">
                                                <label class="btn btn-default" onclick="categoria(<?php echo $competenciaCategoria->idCategoria->id_categoria; ?>, <?php echo $valorFuncion; ?>, <?php echo $competenciaCategoria->idCategoria->edad_min;?>, <?php echo $competenciaCategoria->idCategoria->edad_max; ?>)" style=" border-top: 0px; border-radius: 0px; width: 100%; height: 35px;">
                                                    <?php echo $competenciaCategoria->idCategoria->categoria."<br>"; ?>
                                                </label>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                              </div>
                            </div>
                            <?php
                            }
                        }
                    ?>
                </div> 
            </div>
        </div>
    </div>
    <?php 
    }
    if($model->id_inscripcion){
    ?>
        <div id="form_categoria" style=" display: block;" class="col-sm-12 col-md-12">
    <?php
    }else{
    ?>
        <div id="form_categoria" style=" display: none;" class="col-sm-12 col-md-8">
    <?php
    }
    ?>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div style="" id="mensajesCategoria"> 
                    <div id="errores" style=" display: none;" class="alert alert-danger">
                        <label style=" display: none;" id="superacion">Se ha llegado al cupo máximo para esta categoría</label>
                        <label style=" display: none;" id="edadFuera">El usuario seleccionado no cuenta con la edad comprendida para la categoría seleccionada.</label>
                    </div>
                    <div style=" display: none;" id="infoCategoria" class="alert alert-info"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <label class="control-label required" for="Usuario_tipo_documento">
                    Competencia:
                </label>
                <input value="<?php echo $competencia->competencia; ?>" disabled="disabled" onblur=''  style=" width: 100%;" id="competenciaSeleccionada" class="form-control" type="text" name="competenciaSeleccionada" >
                <input type="hidden" id="tipoCategoriaSeleccionada" name="tipoCategoriaSeleccionada" value="<?php echo $model->idCategoria->id_tipo_categoria;?>">
                <input type="hidden" id="categoriaSeleccionadaFinal" name="categoriaSeleccionadaFinal" value="<?php echo $model->id_categoria;?>">
                <input type="hidden" id="edadPermitidaMin" name="edadPermitida" value="">
                <input type="hidden" id="edadPermitidaMax" name="edadPermitida" value="">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <label class="control-label required" for="Usuario_tipo_documento">
                    Categoría Seleccionada:
                </label>
                <?php
//                if (!$model->isNewRecord){
//                    $valor = CompetenciaCategoria::model()->find('id_copetencia ='.$id_competencia);
//                    $valor = $valor->competenciaCategorias->idCategoria->categoria; 
//                }else{
//                    $valor = null;
//                }
                ?>
                <input value="<?php echo $model->idCategoria->categoria; ?>" disabled="disabled" onblur=''  style=" width: 100%;" id="categoriaSeleccionada" class="form-control" type="text" name="categoriaSeleccionada" >
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <?php echo $form->labelEx($model,'audio'); ?>
                <?php echo CHtml::activeFileField($model, 'audio'); ?>  
                <?php echo $form->error($model,'audio'); ?>
            </div>
        </div>
        <br>
        
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <?php echo $form->textFieldGroup($model,'lugar_representa',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>
            </div>
            <div class="col-sm-12 col-md-4">
                <?php $data = CHtml::listData(Pais::model()->findAll(array('order'=>'pais')), 'codigo', 'pais');
                    echo $form->dropDownListGroup($model,'codigo_pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'findCiudad(this.value)'), 'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Pais:'))); 
                ?>
            </div>
            <div class="col-sm-12 col-md-4">
                <?php 
                    //$data = CHtml::listData(Ciudad::model()->findAll(array('order'=>'ciudad')), 'id_ciudad', 'ciudad');
                    //echo $form->dropDownListGroup($model,'id_ciudad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Ciudad:'))); 
                    echo $form->textFieldGroup($model,'ciudad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250))));
                ?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <?php // echo $form->textAreaGroup($model,'descripcion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-home"></span>
                    <h3 class="panel-title" style="display: inline;">Participantes: <label id="participante" ></label></h3>
                    <div class="clearfix"></div>
                </div>
                    <div class="pd-inner">
                        <div id="GrupoM" style=" display: none;" class="row">
                            <div  class="col-sm-12 col-md-12">
                                <?php echo $form->textFieldGroup($model,'grupo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>
                            </div>
                        </div>
                        <?php 
                        if(!$model->id_inscripcion){
                        ?>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label required" for="Usuario_tipo_documento">
                                    T. de Identificación:
                                <span class="required">*</span>
                                </label>
                                <select id="tipo_documento" class="span5 form-control" placeholder="Tipo Documento" name="tipo_documento">
                                    <option value="">Seleccione...</option>
                                    <option selected="selected" value="1">Cédula Ciudadanía</option>
                                    <option value="2">Licencia de Conducir</option>
                                    <option value="3">Cédula de Extranjería</option>
                                    <option value="4">Pasaporte</option>
                                    <option value="5">Tarjeta de Identidad</option>
                                    <option value="6">Registro Civil</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">

                                <label class="control-label required" for="Usuario_tipo_documento">
                                    N. de Identificación:
                                <span class="required">*</span>
                                </label>
                                <div class="col-sm-12 bootstrap-timepicker input-group">
                                    <input onblur='findIdentificacion(this.value)'  onKeyPress='return soloNumeros(event)' style=" width: 100%;" id="usuarioBusqueda" class="form-control" type="text" onblur="" placeholder="Ingrese su número de identificación" name="correoBusqueda" maxlength="30" size="45">
                                    <label onclick="findIdentificacion()" class="input-group-addon btn btn-primary" style="width: 10%;" onclick="">
                                        <span onclick="findIdentificacion()" class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                        Buscar
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="UsuarioEncontrado">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span onclick="" class="glyphicon glyphicon-user" aria-hidden="true"></span>  Datos
                                </div>
                                <div class="panel-body">
                                    <div style=" margin-top: 0px;" class="pd-inner">
                                    <div id="table-participante" style="padding: 0 5px 5px 5px;">
                                        <div class="row" id="head-table-participante">
                                          <!--<div class="col-xs-4" style="padding: 8px;"><center><strong>Identificación</strong></center></div>-->
                                          <div class="col-xs-6" style="padding: 5px;"><strong>Usuario</strong></div>
                                          <div class="col-xs-4" style="padding: 5px;"><strong>Identificación</strong></div>
                                            <?php 
                                            if(!$model->id_inscripcion){
                                            ?>
                                                <div class="col-xs-2" style="text-align: right; padding: 5px;"><strong>Acción</strong></div>
                                            <?php 
                                            }
                                            ?>
                                        </div>
                                        <?php
                                        $count = 0;
                                        $countRowParticipante = 0;
                                        if (!$model->isNewRecord){
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
                                                    <?php 
                                                    if(!$model->id_inscripcion){
                                                    ?>
                                                        <div style="text-align: right" class="col-xs-6" style="padding: 8px;">
                                                           <a class="delete" data-original-title="Borrar" title="" data-toggle="tooltip" href="javascript:removeParticipante(<?php echo $i; ?>, <?php echo $participanteCC->id_participante; ?>)">
                                                           <i class="glyphicon glyphicon-trash"></i>
                                                           </a>
                                                        </div>
                                                    <?php 
                                                    }
                                                    ?>
                                               </div>
                                                    <?php
                                                    $i++;
                                                    $countRowParticipante++;
                                                }
                                            }
                                        }else{
                                          ?>
                                         </div>
                                          <?php

                                        }
                                        ?>
                                    </div>
                                    <input id="countRowParticipante" type="hidden" name="countRowParticipante" value="<?php echo $countRowParticipante; ?>" />
                                    <input id="nextRowParticipante" type="hidden" name="nextRowParticipante" value="<?php echo $count; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div  class="col-sm-12 col-md-12">
                <center>
                    <div class="form-group">
                        <center>
                        <div style="" class="col-sm-4 bootstrap-timepicker input-group">
                            <?php
                            if($model->id_inscripcion){
                                $suma = $model->costo;
                            }else{
                                $sumasPagar = Pago::model()->findAll('id_inscripcion is not null AND id_usuario_pagador ='.Yii::app()->user->id_usuario_sistema.' AND id_pago_estatus = 1');
    //                            echo var_dump($sumasPagar);
                                $suma = 0;
                                foreach ($sumasPagar as $sumaPaga){
    //                                echo $sumaPaga->idCategoria->id_tipo_categoria." = ";
                                    $costoTipo = $sumaPaga->costo_pagar;
    //                                echo "Competencia =".$sumaPaga->id_copetencia." Tipo =".$sumaPaga->idCategoria->id_tipo_categoria." Costo =".$costoTipo->costo."<hr>";
                                    $suma +=$costoTipo;
                                }
                            }
                            if($competencia->gratis != 1){
                            ?>
                                <label onclick="" class="input-group-addon" style="width: 10%;"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></label>
                                <input value="<?php echo number_format($suma, 2, '.', ''); ?>" disabled="disabled" style="width: 80%;" size="" id="correoBusqueda" class="form-control" type="text" maxlength="30" name="correoBusqueda" placeholder="0" onblur="" >
                            <?php
                            }
                            ?>
                            <input type="hidden" id="MontoPagarCategoria" value="<?php echo $suma; ?>">
                        </div>    
                        </center>
                    </div>
                </center>
            </div>
        </div>
        
        
        
        
        
        <div class="row">
            <div  class="col-sm-12 col-md-12">
                <center>
<!--                    <div class="form-actions">-->
                            <?php 
                            if($competencia->gratis != 1){
                                $this->widget('booster.widgets.TbButton', array(
                                    'buttonType'=>'submit',
                                    'context'=>'primary',
                                    'label'=>$model->isNewRecord ? 'Comprar' : 'Actualizar',
                                )); 
                            }else{
                                $this->widget('booster.widgets.TbButton', array(
                                    'buttonType'=>'submit',
                                    'context'=>'primary',
                                    'label'=>$model->isNewRecord ? 'Inscribir Categoría' : 'Actualizar',
                                )); 
                            }    
                            ?>
                    <!--</div>-->
                    <?php 
                    if($competencia->gratis != 1){
                        $estatusPaseCOmpetidor = Pago::model()->find('id_copetencia ='.$competencia->id_copetencia.' AND (id_usuario ='.Yii::app()->user->id_usuario_sistema.' OR id_usuario_pagador ='.Yii::app()->user->id_usuario_sistema.' ) AND id_pago_estatus = 1');
                        if($estatusPaseCOmpetidor->id_pago_estatus){
                            ?>
<!--                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="alert alert-success">
                                        <center>
                                            Para cancelar todas las categorías, ir a: &nbsp;&nbsp;<b><a href="http:<?php echo Yii::app()->baseUrl; ?>/usuario/historial">(Historia->Historial de Pagoso)</a></b>
                                        </center>
                                    </div>
                                </div>
                            </div>-->
                            <!--<a href="http:<?php echo Yii::app()->baseUrl; ?>/usuario/historial">Pagar todo</a>-->
                            <?php
                        }
                    }
                    ?>
                        
                        
                </center>
            </div>
        </div>
        <br>
<!--        <div class="row">
            <div  class="col-sm-12 col-md-12">
                <center>
                    
                    <a href="../pago/pagoPaypal" class="btn btn-default" href="">Pagar</a>
                    Pagar todo: &nbsp;&nbsp;<div id="paypal-button-container"></div>
                </center>
            </div>
        </div>-->
        <?php /*

            <div class="col-sm-12 col-md-4">
                <?php $data = CHtml::listData(Competencia::model()->findAll('estatus = 1'), 'id_copetencia', 'competencia');
                echo $form->dropDownListGroup($model,'id_copetencia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'findTipoCategoria(this.value)'), 'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Competencia:'))); ?>
            </div>
            <div class="col-sm-12 col-md-4">
                <?php 
                $data = array(); //= CHtml::listData(Competencia::model()->findAll('estatus = 1'), 'id_copetencia', 'competencia');
                echo $form->dropDownListGroup($model,'id_competencia_tipo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Tipo de Categoría:')));
                //echo $form->textFieldGroup($model,'id_competencia_tipo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); 
                ?>
            </div>

                //echo $form->textFieldGroup($model,'id_copetencia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php // echo $form->textFieldGroup($model,'id_usuario',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php // echo $form->textFieldGroup($model,'grupo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>
	<?php // echo $form->textAreaGroup($model,'audio', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	<?php // echo $form->textFieldGroup($model,'codigo_pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>5)))); ?>
	<?php //echo $form->textFieldGroup($model,'id_ciudad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php // echo $form->textFieldGroup($model,'id_escuela',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php */// echo $form->textFieldGroup($model,'id_estatu_inscripcion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    </div>
    <center>
        <a href="http:<?php echo Yii::app()->baseUrl; ?>/usuario/historial">Finalizar Inscripción</a>
    </center>
</div>



<?php $this->endWidget(); ?>



<!--<a onclick="prueba()">Prueba</a>-->

<script>
function categoria(id_categoria, capacidad, edadMin,edadMax){
    //errores superacion  infoCategoria
    
    var deuda = "<?php echo $suma; ?>";
    
//    alert(deuda);
    var id_competencia = $('#id').val();
    
    if(capacidad == 0){
        var nombreCategoria = $('#nombreCategoria'+id_categoria).val();
        var tipoCategoria = $('#tipoCategoria'+id_categoria).val();
        if(tipoCategoria == 3){
            $('#GrupoM').css('display', 'block');
        }else{
            $('#GrupoM').css('display', 'none');
        }
        $('#errores2').css('display', 'none');
        $('#form_categoria').css('display', 'block');
        $('#edadPermitidaMin').val(edadMin);
        $('#edadPermitidaMax').val(edadMax);
        $('#categoriaSeleccionada').val(nombreCategoria);
        $('#tipoCategoriaSeleccionada').val(tipoCategoria);
        $('#categoriaSeleccionadaFinal').val(id_categoria);
        $('#errores').css('display', 'none');
        $('#superacion').css('display', 'none');
        $('#infoCategoria').css('display', 'block');
        $.post("<?php echo Yii::app()->createUrl('categoria/findCategoria') ?>",{ id_categoria:id_categoria, id_competencia:id_competencia },function(data){
            $("#infoCategoria").html(data);
            var valorCategoriaController = $('#valorCategoriaController').val();
            var sumatoria = parseInt(valorCategoriaController) + parseInt(deuda);
//            alert(valorCategoriaController+' + '+deuda+' = '+sumatoria);
            $('#correoBusqueda').val(sumatoria);
            
        });
    }else{
        $('#errores2').css('display', 'block');
        $('#form_categoria').css('display', 'none');
        $('#edadPermitidaMin').val('');
        $('#edadPermitidaMax').val('');
        $('#infoCategoria').html('');
        $('#infoCategoria').css('display', 'none');
        $('#errores').css('display', 'block');
        $('#superacion').css('display', 'block');
        
        $('#categoriaSeleccionada').val('');
        $('#tipoCategoriaSeleccionada').val('');
        $('#categoriaSeleccionadaFinal').val('');
    }
}    
    
function findTipoCategoria(id_copetencia){
    $.post("<?php echo Yii::app()->createUrl('competenciaTipo/findCompetenciaTipo') ?>",{ id_copetencia:id_copetencia },function(data){$("#Inscripcion_id_competencia_tipo").html(data);});
}
function findCiudad(pais){
    $.post("<?php echo Yii::app()->createUrl('ciudad/findCiudad') ?>",{ pais:pais },function(data){$("#Inscripcion_id_ciudad").html(data);});
}    

//============================================================================//    
// Agregar participante
//============================================================================// 

function addNewParticipante() {
//    alert("Aqui");

    var id_usuario_e = $('#id_usuario_e').val();
    var usuario_e  = $('#usuario_e').val();
    var usuario_i  = $('#id_usuario_i').val();
    if ($('#countRowParticipante').val()==0) {
//      $('#table-participante').append('<div id="removeParticipante'+$('#nextRowParticipante').val()+'" class="row" style="border-top: 1px solid #ddd;"><div class="col-xs-3" style="padding: 8px;"><select onchange="" id="itemsCategoria'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="AddItemsCategoria'+$('#nextRowParticipante').val()+'"><?php echo $options; ?></select></div><div class="col-xs-3" style="padding: 8px;"><input type="text" class="span5 form-control" name="CategoriaItemCalificacion_rango_min'+$('#nextRowParticipante').val()+'"  id="CategoriaItemCalificacion_rango_min'+$('#nextRowParticipante').val()+'" onkeypress="return soloNumeros(event)"  value="" placeholder="0.0" maxlength="3" /></div><div class="col-xs-3" style="padding: 8px;"><input class="span5 ui-autocomplete-input form-control" type="text" name="CategoriaItemCalificacion_rango_max'+$('#nextRowParticipante').val()+'" id="CategoriaItemCalificacion_rango_max'+$('#nextRowParticipante').val()+'" onkeypress="return soloNumeros(event)"  placeholder="0.0" ></div><div class="col-xs-2" style="padding: 8px;"><a class="delete" href="javascript:removeParticipante('+$('#nextRowParticipante').val()+')" data-toggle="tooltip" title="" data-original-title="Borrar"><i class="glyphicon glyphicon-trash"></i></a></div></div>');
    }
    
    $('#table-participante').append(
//       '<div id="removeParticipante'+$('#nextRowParticipante').val()+'" class="row" style="border-top: 1px solid #ddd;"><div class="col-xs-6" style="padding: 8px;"> <input type="hidden" id="id_usuario_eR'+$('#nextRowParticipante').val()+'" name="id_usuario_eR'+$('#nextRowParticipante').val()+'" value="'+id_usuario_e+'">    <label>'+usuario_e+'</label></div><div style="text-align: right" class="col-xs-6" style="padding: 8px;"><a class="delete" href="javascript:removeParticipante('+$('#nextRowParticipante').val()+')" data-toggle="tooltip" title="" data-original-title="Borrar"><i class="glyphicon glyphicon-trash"></i></a></div></div>'  
         '<div id="removeParticipante'+$('#nextRowParticipante').val()+'" class="row" style="border-top: 1px solid #ddd;"><div class="col-xs-6" style="padding: 8px;"> <input type="hidden" id="id_usuario_eR'+$('#nextRowParticipante').val()+'" name="id_usuario_eR'+$('#nextRowParticipante').val()+'" value="'+id_usuario_e+'">    <label>'+usuario_e+'</label></div><div class="col-xs-4" style="padding: 8px;"><label>'+usuario_i+'</label></div><div style="text-align: right" class="col-xs-2" style="padding: 8px;"><a class="delete" href="javascript:removeParticipante('+$('#nextRowParticipante').val()+')" data-toggle="tooltip" title="" data-original-title="Borrar"><i class="glyphicon glyphicon-trash"></i></a></div></div>'  
     );
    $('#nextRowParticipante').val(parseFloat($('#nextRowParticipante').val())+1);
    $('#countRowParticipante').val(parseFloat($('#countRowParticipante').val())+1);
//    addNewParticipante2();
     $('#btAgregar').css('display', 'none');
}    
    
function removeParticipante(id, id_p) {
//  var id_competencia = $('#id').val();
//  var id_categoria = $('#categoriaSeleccionadaFinal').val()
  if(confirm('¿Está seguro que desea borrar este elemento?')) {
    $('#removeParticipante'+id).remove();
    $('#countRowParticipante').val(parseFloat($('#countRowParticipante').val())-1);
    if(id_p){
        $.post("<?php echo Yii::app()->createUrl('participante/eliminarP') ?>",{ id_p:id_p },function(data){});
    }
//    removeParticipante2(id);
  }
  
}    

function findIdentificacion(identificacion) {
    
    
    var edadMin = $('#edadPermitidaMin').val();
    var edadMax = $('#edadPermitidaMax').val();
//    alert(edadMin+' - '+edadMax);
    var countRow = $('#countRowParticipante').val();
    var cantidadP = $('#tipoCategoriaSeleccionada').val();
    var categoria = $('#categoriaSeleccionada').val();
    if(categoria){
        if(cantidadP >= 3){
            var idCategoria = $('#idCategoria').val();
            var idCompetencia = $('#id').val();
            var tipo = $('#tipo').val();  
            identificacion = document.getElementById("usuarioBusqueda").value;
            var tipo_documento = document.getElementById("tipo_documento").value;   
            $.post("<?php echo Yii::app()->createUrl('usuario/findIdentificacion3') ?>",{ tipo_documento:tipo_documento, identificacion:identificacion, idCategoria:idCategoria, tipo:tipo, idCompetencia:idCompetencia, edadMin:edadMin, edadMax:edadMax },
            function(data){
               $('#UsuarioEncontrado').html(data);
            });
        }else{    
            if(countRow >= cantidadP){  
                $('#UsuarioEncontrado').html('<div class="alert alert-danger"><b>¡Ya ha llegado al límite de participantes permitidos!</b></div>');
            }else{
                var idCategoria = $('#idCategoria').val();
                var idCompetencia = $('#id').val();
                var tipo = $('#tipo').val();  
                identificacion = document.getElementById("usuarioBusqueda").value;
                var tipo_documento = document.getElementById("tipo_documento").value;   
                $.post("<?php echo Yii::app()->createUrl('usuario/findIdentificacion3') ?>",{ tipo_documento:tipo_documento, identificacion:identificacion, idCategoria:idCategoria, tipo:tipo, idCompetencia:idCompetencia, edadMin:edadMin, edadMax:edadMax },
                function(data){
                   $('#UsuarioEncontrado').html(data);
                });
            }
        }
    }else{
        alert("Debe de seleccionar una categoría");
    }
}
function soloNumeros(e)
{
    var key = window.Event ? e.which : e.keyCode
    return ((key >= 48 && key <= 57) || (key==8))
}
function remove(id, id_cc) {
  
//  if(confirm('¿Está seguro que desea borrar este elemento?')) {
//    $('#remove'+id).remove();
    $.post("<?php echo Yii::app()->createUrl('competenciaCategoria/eliminarCc') ?>",{ id_cc:id_cc },function(data){});
    
//  }
  
}
</script>