<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'competencia-form',
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <div class="col-sm-12 col-md-3">
        <?php echo $form->switchGroup($model, 'visible',
                array(
                        'widgetOptions' => array(
                                'events'=>array(
                                        'switchChange'=>'js:function(event, state) {
                                          console.log(this); // DOM element
                                          console.log(event); // jQuery event
                                          console.log(state); // true | false
                                        }'
                                )
                        )
                )
        ); ?>
            <?php echo $form->switchGroup($model, 'gratis',
                array(
                        'widgetOptions' => array(
                                'events'=>array(
                                        'switchChange'=>'js:function(event, state) {
                                          console.log(this); // DOM element
                                          console.log(event); // jQuery event
                                          console.log(state); // true | false
                                        }'
                                )
                        )
                )
        ); ?>
    </div>
    <div class="col-sm-12 col-md-7">
        <?php echo $form->textFieldGroup($model,'competencia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>150)))); ?>
    </div>
    <div class="col-sm-12 col-md-2">
        <?php echo $form->textFieldGroup($model,'orden',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onKeyPress'=>"return soloNumeros(event)", 'maxlength' => 4)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-3">
        <?php echo $form->switchGroup($model, 'estatus',
                array(
                        'widgetOptions' => array(
                                'events'=>array(
                                        'switchChange'=>'js:function(event, state) {
                                          console.log(this); // DOM element
                                          console.log(event); // jQuery event
                                          console.log(state); // true | false
                                        }'
                                )
                        )
                )
        ); ?>
    </div>
    <div class="col-sm-12 col-md-3">
        <?php 
            
//            echo $form->fileFieldGroup($model, 'img',
//			array(
//				'wrapperHtmlOptions' => array(
//					'class' => 'col-sm-5',
//				),
//			)
//		); 
            ?>
        <!--<input type="file" class="span5 form-control" name="AddFile" id="AddFile" accept=".pdf" />-->
        <div class="row">
        <?php echo $form->labelEx($model,'img'); ?>
        <?php echo CHtml::activeFileField($model, 'img'); ?>  
        <?php echo $form->error($model,'img'); ?>
        </div>
        <?php if($model->isNewRecord!='1'){ ?>
        <div class="row">
             <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/competencia/'.$model->img,"image",array("width"=>200)); ?>  
        </div>
        <?php } ?>
        
        <?php //echo $form->textAreaGroup($model,'img', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
    </div>
    <div class="col-sm-12 col-md-1">
        <?php 
            $data = array(); for ($i=1; $i<=31; $i++) { if($i <10){ $i = "0".$i; } $data[$i]= $i;}
//            echo $model->dia = "0".$model->dia;
            if($model->dia){
                if($model->dia < 10){
                    $model->dia = "0".$model->dia;
                }
            }
            echo $form->dropDownListGroup($model,'dia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>'Seleccione...')+$data),  'labelOptions'=>array('label'=>'Día')));
            
        ?>
    </div>
    <div class="col-sm-12 col-md-1">
        <?php 
            $data = array(); for ($i=1; $i<=12; $i++) { if($i <10){ $i = "0".$i; } $data[$i]= $i;}
            if($model->mes){
                if($model->mes < 10){
                    $model->mes = "0".$model->mes;
                }
            }
            echo $form->dropDownListGroup($model,'mes',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Mes')));
        ?>
    </div>
    <div class="col-sm-12 col-md-2">
        <?php 
            $data = array();for($i=date('o'); $i>=1910; $i--) { $data[$i]= $i;}
            echo $form->dropDownListGroup($model,'anio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Año')));
        ?>
    </div>
    <div class="col-sm-12 col-md-2">
        <?php echo $form->textFieldGroup($model,'valor_competido',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1),'decimales')", 'maxlength' => 9)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textAreaGroup($model,'descripcion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textAreaGroup($model,'direccion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
    </div>
</div>
<hr>


<!--=======================================================================-->

<div class="panel panel-default">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-barcode"></span>
        <h3 class="panel-title" style="display: inline;">Pase de Competidor</h3>
        <div class="clearfix"></div>
    </div>
    <div id="yw0" class="panel-body">
        <div class="pd-inner">
            <div id="table-participante" style="padding: 0 20px 20px 20px;">
                
                <div class="row" id="head-table-participante">
                  <div class="col-xs-4" style="padding: 8px;"><center><strong>Fecha</strong></center></div>
                  <div class="col-xs-4" style="padding: 8px;"><center><strong>Valor</strong></center></div>
                  <div class="col-xs-4" style="padding: 8px;"><strong>Acción</strong></div>
                </div>
                
                <?php
                $count = 0;
                $countRowParticipante = 0;
                if (!$model->isNewRecord){
                    $countRowParticipante = 1;
                    $ii = 0;
                    if(isset($paseCompetidorCount)){
                        $count = count($paseCompetidorCount);
                        foreach($paseCompetidorCount as $paseCompetidorC){
                            ?>
                            <div id="removeParticipante<?php echo $ii;?>" class="row"  style="border-top: 1px solid #ddd;">
                           <!--<div class="row">-->
<!--                               <div class="col-xs-4" style="padding: 8px;">
                                   <?php
//                                    $paseCompetidor->fecha_pase = date("d-m-Y", strtotime($paseCompetidorC->fecha_pase));
//                                    echo $form->datePickerGroup($paseCompetidor, 'fecha_pase', array('widgetOptions' => array('options' => array('format' => 'dd-mm-yyyy'), 'htmlOptions' => array('class' => 'span5', 'name'=>'datepicker_'.$i, 'disabled'=>'disabled')), 'labelOptions' => array('label' => false), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>')); 
                                   ?>
                               </div>-->
                               
                                <div class="col-xs-1" style="padding: 8px;">
                                    <?php 
                                        $data = array(); for ($i=1; $i<=31; $i++) { if($i <10){ $i = "0".$i; } $data[$i]= $i;}
                                        if($paseCompetidorC->dia){
                                            if($paseCompetidorC->dia < 10){
                                                $paseCompetidorC->dia = "0".$paseCompetidorC->dia;
                                            }
                                        }
                                        $paseCompetidor->dia = $paseCompetidorC->dia;
                                        echo $form->dropDownListGroup($paseCompetidor,'dia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'diaPase'.$ii),'data'=>array(''=>'Seleccione...')+$data),  'labelOptions'=>array('label'=>false)));
                                    ?>
                                </div>
                                <div class="col-xs-1" style="padding: 8px;">
                                    <?php 
                                        $data = array(); for ($i=1; $i<=12; $i++) { if($i <10){ $i = "0".$i; } $data[$i]= $i;}
                                        if($paseCompetidorC->mes){
                                            if($paseCompetidorC->mes < 10){
                                                $paseCompetidorC->mes = "0".$paseCompetidorC->mes;
                                            }
                                        }
                                        $paseCompetidor->mes = $paseCompetidorC->mes;
                                        echo $form->dropDownListGroup($paseCompetidor,'mes',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'mesPase'.$ii),'data'=>array(''=>'Seleccione...')+$data),  'labelOptions'=>array('label'=>false)));
                                    ?>
                                </div>
                                <div class="col-xs-2" style="padding: 8px;">
                                    <?php 
                                        $data = array();for($i=date('o'); $i>=1910; $i--) { $data[$i]= $i;}
                                        $paseCompetidor->anio = $paseCompetidorC->anio;
                                        echo $form->dropDownListGroup($paseCompetidor,'anio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'anioPase'.$ii),'data'=>array(''=>'Seleccione...')+$data),  'labelOptions'=>array('label'=>false)));
                                    ?>
                                </div>
                           
                               <div class="col-xs-4" style="padding: 8px;">
                                   <?php
                                   $paseCompetidor->valor = $paseCompetidorC->valor;
                                   echo $form->textFieldGroup($paseCompetidor, 'valor', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1),'decimales')", 'maxlength' => 9, 'name'=>'PaseValor'.$ii)), 'labelOptions'=>array('label'=>false)));
                                   ?>
                               </div>
                               <div class="col-xs-3" style="padding: 8px;">
                                   <a class="delete" data-original-title="Borrar" title="" data-toggle="tooltip" href="javascript:removeParticipante(<?php echo $ii; ?>)">
                                   <i class="glyphicon glyphicon-trash"></i>
                                   </a>
                               </div>
                           </div>
                            <?php
                            $ii++;
                            $countRowParticipante++;
                        }
                    }
                }else{
                  ?>
                 
                  <?php
                    
                }
                
                ?>
                </div>
            </div>
            <input id="countRowParticipante" type="hidden" name="countRowParticipante" value="<?php echo $countRowParticipante; ?>" />
            <input id="nextRowParticipante" type="hidden" name="nextRowParticipante" value="<?php echo $count; ?>" />
            <div class="row" style="text-align: center;">
                <div class="col-xs-12">
                    <?php $this->widget('booster.widgets.TbButton', array(
                      'label'=>'Agregar items',
                      'icon'=>'plus-sign',
                      'htmlOptions'=>array('id'=>'btn-form','onclick'=>'addNewParticipante()')
                    )); ?>
                </div>
            </div>
        
    </div>
</div>

<!--=======================================================================-->

<div class="panel panel-default">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-indent-left"></span>
        <h3 class="panel-title" style="display: inline;">Ingresar Categoría</h3>
        <div class="clearfix"></div>
    </div>
    <div id="yw0" class="panel-body">
        
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <?php
        //            echo CHtml::beginForm('/', 'post', ['id' => 'issue-574-checker-form']);
                    $data = CHtml::listData(Categoria::model()->findAll('estatus = 1'), 'id_categoria', 'categoria');
                    
                    $this->widget(
                        'booster.widgets.TbSelect2',
                        array(
                            'name' => 'group_id_list',
                            'data' => $data,
                            'value' => $data2,
                            'htmlOptions' => array(
                                'multiple' => 'multiple',
                                'class' => 'span5 form-control'
                            ),
                        )
                    );
                ?>
                <br>
                <?php 
                if (!$model->isNewRecord){

                    $box = $this->beginWidget(
                        'booster.widgets.TbPanel',
                        array(
                            'title' => 'Listado de Categorías registrado',    	
                            'context' => 'primary',
                            'headerIcon' => 'th-list',
                                'padContent' => false,
                            'htmlOptions' => array('class' => 'bootstrap-widget-table')
                        )
                    );
                ?>
                <div id="table-participante3" style="padding: 0 20px 20px 20px;">
                
                    <div class="row" id="head-table-participante2">
                      <div class="col-xs-4" style="padding: 8px;"><center><strong>Identificador Categoría</strong></center></div>
                      <div class="col-xs-4" style="padding: 8px;"><center><strong>Categoría</strong></center></div>
                      <div class="col-xs-4" style="padding: 8px;"><center><strong>Acción</strong></center></div>
                    </div>
                    
                <?php 
                    $categoriaRegistradas = CompetenciaCategoria::model()->findAll('id_copetencia ='.$model->id_copetencia);
                    foreach ($categoriaRegistradas as $categoriaRegistrada){
                    ?>

                        <div id="remove<?php echo $categoriaRegistrada->id_categoria; ?>" class="row"  style="border-top: 1px solid #ddd;">
                            <div class="col-xs-4" style="padding: 8px;">
                                <center><?php echo $categoriaRegistrada->id_categoria; ?></center>
                            </div>
                            <div class="col-xs-4" style="padding: 8px;">
                                <center><?php echo $categoriaRegistrada->idCategoria->categoria; ?></center>
                            </div>
                            <div class="col-xs-4" style="padding: 8px;">
                                <center><a class="delete" data-original-title="Borrar" title="" data-toggle="tooltip" href="javascript:remove(<?php echo $categoriaRegistrada->id_categoria; ?>, <?php echo $categoriaRegistrada->id_competencia_categoria; ?>)">
                                <i class="glyphicon glyphicon-trash"></i>
                                </a></center>
                            </div>
                        </div>
                    
                    <?php } ?>
                </div>
                <?php 
                $this->endWidget(); 
                }
                
                ?>
                
                
            </div>
        </div>
        <br><br>
    </div>
</div>

<!--=======================================================================-->

<div class="panel panel-default">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-indent-left"></span>
        <h3 class="panel-title" style="display: inline;">Valor por tipo de Categoría</h3>
        <div class="clearfix"></div>
    </div>
    <div id="yw0" class="panel-body">
        
        
                <div id="table-participante2" style="padding: 0 20px 20px 20px;">
                
                    <div class="row" id="head-table-participante2">
                      <div class="col-xs-3" style="padding: 8px;"><center><strong>Tipo de Categoría</strong></center></div>
                      <div class="col-xs-4" style="padding: 8px;"><center><strong>Fecha</strong></center></div>
                      <div class="col-xs-3" style="padding: 8px;"><center><strong>Valor</strong></center></div>
                      <div class="col-xs-2" style="padding: 8px;"><center><strong>Acción</strong></center></div>
                    </div>

                    <?php
                    $count = 0;
                    $countRowParticipante2 = 0;
                    if (!$model->isNewRecord){
                        $countRowParticipante2 = 1;
                        $ii = 0;
                        if(isset($competenciaTipoCount)){
                            $count = count($competenciaTipoCount);
                            foreach($competenciaTipoCount as $competenciaTipoC){
                                ?>
                                <div id="removeParticipante2<?php echo $ii;?>" class="row"  style="border-top: 1px solid #ddd;">
                                    
                                    <div class="col-xs-3" style="padding: 8px;">
                                       <?php
                                       $competenciaTipo->id_tipo_categoria = $competenciaTipoC->id_tipo_categoria;
                                       $data = CHtml::listData(TipoCategoria::model()->findAll(array()), 'id_tipo_categoria', 'tipo');
                                       echo $form->dropDownListGroup($competenciaTipo,'id_tipo_categoria',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'tipoCategoria'.$ii), 'data'=>$data), 'labelOptions'=>array('label'=>false))); ?>
                                    </div>
<!--                                    <div class="col-xs-4" style="padding: 8px;">
                                        <?php
//                                         $competenciaTipo->fecha = date("d-m-Y", strtotime($competenciaTipoC->fecha));
//                                         echo $form->datePickerGroup($competenciaTipo, 'fecha', array('widgetOptions' => array('options' => array('format' => 'dd-mm-yyyy'), 'htmlOptions' => array('class' => 'span5', 'name'=>'datepicker_'.$i, 'disabled'=>'disabled')), 'labelOptions' => array('label' => false), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>')); 
                                        ?>
                                    </div>-->
                               
                                    <div class="col-xs-1" style="padding: 8px;">
                                        <?php 
                                            $data = array(); for ($i=1; $i<=31; $i++) { if($i <10){ $i = "0".$i; } $data[$i]= $i;}
                                            if($competenciaTipoC->dia){
                                                if($competenciaTipoC->dia < 10){
                                                    $competenciaTipoC->dia = "0".$competenciaTipoC->dia;
                                                }
                                            }
                                            $competenciaTipo->dia = $competenciaTipoC->dia;
                                            echo $form->dropDownListGroup($competenciaTipo,'dia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'diaPaseCategoria'.$ii),'data'=>array(''=>'Seleccione...')+$data),  'labelOptions'=>array('label'=>false)));
                                        ?>
                                    </div>
                                    <div class="col-xs-1" style="padding: 8px;">
                                        <?php 
                                            $data = array(); for ($i=1; $i<=12; $i++) { if($i <10){ $i = "0".$i; } $data[$i]= $i;}
                                            if($competenciaTipoC->mes){
                                                if($competenciaTipoC->mes < 10){
                                                    $competenciaTipoC->mes = "0".$competenciaTipoC->mes;
                                                }
                                            }
                                            $competenciaTipo->mes = $competenciaTipoC->mes;
                                            echo $form->dropDownListGroup($competenciaTipo,'mes',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'mesPaseCategoria'.$ii),'data'=>array(''=>'Seleccione...')+$data),  'labelOptions'=>array('label'=>false)));
                                        ?>
                                    </div>
                                    <div class="col-xs-2" style="padding: 8px;">
                                        <?php 
                                            $data = array();for($i=date('o'); $i>=1910; $i--) { $data[$i]= $i;}
                                            $competenciaTipo->anio = $competenciaTipoC->anio;
                                            echo $form->dropDownListGroup($competenciaTipo,'anio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'anioPaseCategoria'.$ii),'data'=>array(''=>'Seleccione...')+$data),  'labelOptions'=>array('label'=>false)));
                                        ?>
                                    </div>

                                   <div class="col-xs-3" style="padding: 8px;">
                                       <?php
                                       $competenciaTipo->costo = $competenciaTipoC->costo;
                                       echo $form->textFieldGroup($competenciaTipo, 'costo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1),'decimales')", 'maxlength' => 9, 'name'=>'CostoTipoCategoria'.$ii)), 'labelOptions'=>array('label'=>false)));
                                       ?>
                                   </div>
                                   <div class="col-xs-2" style="padding: 8px;">
                                       <center><a class="delete" data-original-title="Borrar" title="" data-toggle="tooltip" href="javascript:removeParticipante2(<?php echo $ii; ?>)">
                                       <i class="glyphicon glyphicon-trash"></i>
                                           </a></center>
                                   </div>
                               </div>
                                <?php
                                $ii++;
                                $countRowParticipante2++;
                            }
                        }
                    }else{
                      ?>
                 
                  <?php
                    
                }
                
                ?>
                </div>
            </div>
            <input id="countRowParticipante2" type="hidden" name="countRowParticipante2" value="<?php echo $countRowParticipante2; ?>" />
            <input id="nextRowParticipante2" type="hidden" name="nextRowParticipante2" value="<?php echo $count; ?>" />
            <div class="row" style="text-align: center;">
                <div class="col-xs-12">
                    <?php $this->widget('booster.widgets.TbButton', array(
                      'label'=>'Agregar tipo categoría',
                      'icon'=>'plus-sign',
                      'htmlOptions'=>array('id'=>'btn-form','onclick'=>'addNewParticipante2()')
                    )); ?>
                </div>
            </div>
            <br>
    </div>
</div>

<!--=======================================================================-->	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/handlebars.js"></script>
<script>
   
    
    
    
    
function soloNumeros(e)
{
    var key = window.Event ? e.which : e.keyCode
    return ((key >= 48 && key <= 57) || (key==8))
}    

//function calendario(id){
//    $('#datetimepicker'+id).datetimepicker();
//}
function remove(id, id_cc) {
  
  if(confirm('¿Está seguro que desea borrar este elemento?')) {
    $('#remove'+id).remove();
    $.post("<?php echo Yii::app()->createUrl('comnapetenciaCategoria/eliminarCc') ?>",{ id_cc:id_cc },function(data){});
    
  }
  
}
//===========================================================================================//
// Agregar Pase permitido
//===========================================================================================//


function addNewParticipante() {
    <?php
    for ($dia=1; $dia<=31; $dia++) {
        if($dia < 10){
            $dia = "0".$dia;
        }
        $optionsDia .= '<option value="'.$dia.'">'.$dia.'</option>';
    }
    for ($mes=1; $mes<=12; $mes++) { 
        if($mes < 10){
            $mes = "0".$mes;
        }
        $optionsMes .= '<option value="'.$mes.'">'.$mes.'</option>';
    }
    for($anio=date('o'); $anio>=1910; $anio--) { 
        $optionsAnio .= '<option value="'.$anio.'">'.$anio.'</option>';
    }
    ?>
    //<div id="contenedorD'+$('#nextRowParticipante').val()+'"></div>         
    $('#table-participante').append(
       '<div id="removeParticipante'+$('#nextRowParticipante').val()+'" class="row" style="border-top: 1px solid #ddd;"><div class="col-xs-1" style="padding: 8px;">  <select id="diaPase'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="diaPase'+$('#nextRowParticipante').val()+'" ><?php echo $optionsDia; ?></select></div><div class="col-xs-1" style="padding: 8px;"><select id="mesPase'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="mesPase'+$('#nextRowParticipante').val()+'"><?php echo $optionsMes; ?></select></div><div class="col-xs-2" style="padding: 8px;">  <select id="anioPase'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="anioPase'+$('#nextRowParticipante').val()+'"><?php echo $optionsAnio; ?></select></div>    <div class="col-xs-4" style="padding: 8px;"><input class="span5 ui-autocomplete-input form-control" type="text" name="PaseValor'+$('#nextRowParticipante').val()+'" id="PaseValor'+$('#nextRowParticipante').val()+'"  onkeyup="miles_decimales(this,this.value.charAt(this.value.length-1),\'decimales\')"  placeholder="0.0" maxlength="9" ></div><div class="col-xs-4" style="padding: 8px;"><a class="delete" href="javascript:removeParticipante('+$('#nextRowParticipante').val()+')" data-toggle="tooltip" title="" data-original-title="Borrar"><i class="glyphicon glyphicon-trash"></i></a></div></div>'  
    );
     
    $('#nextRowParticipante').val(parseFloat($('#nextRowParticipante').val())+1);
    $('#countRowParticipante').val(parseFloat($('#countRowParticipante').val())+1);
    
    var count = $('#nextRowParticipante').val();
    var int = 1;
    count = parseInt($('#nextRowParticipante').val()) - parseInt(int);
    var new_field = jQuery("<input type=\"text\" />")
    new_field.attr("id","datepicker_"+count);
    new_field.attr("class","span5 form-control");
    new_field.attr("name","datepicker_"+count);
    new_field.attr("data-date-format","dd-mm-yyyy");
    
    $('#contenedorD'+count).append(new_field);
    $('#contenedorD'+count).append(jQuery("<br />"));
//    $("#datepicker_"+count).datepicker({ dateFormat: 'dd-mm-yy' }).val();
//    $('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();

}

function removeParticipante(id) {
  
  if(confirm('¿Está seguro que desea borrar este elemento?')) {
    $('#removeParticipante'+id).remove();
    $('#countRowParticipante').val(parseFloat($('#countRowParticipante').val())-1);
    if ($('#countRowParticipante').val()==0) {
//      $('#head-table-participante').remove();
    }
  }
  
}

//===========================================================================================//
// Agregar Valor por tipo de Categoría
//====================================<div class="col-xs-1" style="padding: 8px;">  <select id="diaPaseCategoria'+$('#nextRowParticipante2').val()+'" class="span5 form-control" name="diaPaseCategoria'+$('#nextRowParticipante2').val()+'" ><?php echo $optionsDia; ?></select></div><div class="col-xs-1" style="padding: 8px;"><select id="mesPaseCategoria'+$('#nextRowParticipante2').val()+'" class="span5 form-control" name="mesPaseCategoria'+$('#nextRowParticipante2').val()+'"><?php echo $optionsMes; ?></select></div><div class="col-xs-1" style="padding: 8px;">  <select id="anioPaseCategoria'+$('#nextRowParticipante2').val()+'" class="span5 form-control" name="anioPaseCategoria'+$('#nextRowParticipante2').val()+'"><?php echo $optionsAnio; ?></select></div> =======================================================//

function addNewParticipante2() {
    <?php
    for ($dia=1; $dia<=31; $dia++) { 
        $optionsDia .= '<option value="'.$dia.'">'.$dia.'</option>';
    }
    for ($mes=1; $mes<=12; $mes++) { 
        $optionsMes .= '<option value="'.$mes.'">'.$mes.'</option>';
    }
    for($anio=date('o'); $anio>=1910; $anio--) { 
        $optionsAnio .= '<option value="'.$anio.'">'.$anio.'</option>';
    }
    ?>
    <?php
    $tipoCategorias = TipoCategoria::model()->findAll();
    $options = '<option value="">Seleccione...</option>';
    foreach($tipoCategorias as $tipoCategoria) {
      $options .= '<option value="'.$tipoCategoria->id_tipo_categoria.'">'.$tipoCategoria->tipo.'</option>';
    } 
    ?>
    $('#table-participante2').append(
       '<div id="removeParticipante2'+$('#nextRowParticipante2').val()+'" class="row" style="border-top: 1px solid #ddd;"><div class="col-xs-3" style="padding: 8px;">  <select onchange="" id="tipoCategoria'+$('#nextRowParticipante2').val()+'" class="span5 form-control" name="tipoCategoria'+$('#nextRowParticipante2').val()+'"><?php echo $options; ?></select> </div> <div class="col-xs-1" style="padding: 8px;">  <select id="diaPaseCategoria'+$('#nextRowParticipante2').val()+'" class="span5 form-control" name="diaPaseCategoria'+$('#nextRowParticipante2').val()+'" ><?php echo $optionsDia; ?></select></div><div class="col-xs-1" style="padding: 8px;"><select id="mesPaseCategoria'+$('#nextRowParticipante2').val()+'" class="span5 form-control" name="mesPaseCategoria'+$('#nextRowParticipante2').val()+'"><?php echo $optionsMes; ?></select></div><div class="col-xs-2" style="padding: 8px;">  <select id="anioPaseCategoria'+$('#nextRowParticipante2').val()+'" class="span5 form-control" name="anioPaseCategoria'+$('#nextRowParticipante2').val()+'"><?php echo $optionsAnio; ?></select></div> <div class="col-xs-3" style="padding: 8px;"><input class="span5 ui-autocomplete-input form-control" type="text" name="CostoTipoCategoria'+$('#nextRowParticipante2').val()+'" id="CostoTipoCategoria'+$('#nextRowParticipante2').val()+'"  onkeyup="miles_decimales(this,this.value.charAt(this.value.length-1),\'decimales\')"  placeholder="0.0" maxlength="9" ></div><div class="col-xs-2" style="padding: 8px;"><center><a class="delete" href="javascript:removeParticipante2('+$('#nextRowParticipante2').val()+')" data-toggle="tooltip" title="" data-original-title="Borrar"><i class="glyphicon glyphicon-trash"></i></a></center></div></div>'  
    );
    $('#nextRowParticipante2').val(parseFloat($('#nextRowParticipante2').val())+1);
    $('#countRowParticipante2').val(parseFloat($('#countRowParticipante2').val())+1);
}


function removeParticipante2(id) {
    if(confirm('¿Está seguro que desea borrar este elemento?')) {
        $('#removeParticipante2'+id).remove();
        $('#countRowParticipante2').val(parseFloat($('#countRowParticipante2').val())-1);
        if ($('#countRowParticipante2').val()==0) {
        }
    }
  
}

//===========================================================================================//

function miles_decimales(donde,caracter,campo,porcentaje, cantidadNumeroEntero, cantidadDecimales){

//  if(!cantidadDecimales){
      cantidadDecimales = 2;
//  }
//  if(!cantidadNumeroEntero){
      cantidadNumeroEntero = 7;
//  }
  var decimales = true;
  dec= cantidadDecimales;

  pat = /[\*,\+,\(,\),\?,\\,\$,\[,\],\^]/
  valor = donde.value
  largo = valor.length
  crtr = true
  if(isNaN(caracter) || pat.test(caracter) == true){
      if (pat.test(caracter)==true) 
              {caracter = "\\" + caracter}
      carcter = new RegExp(caracter,"g")
      valor = valor.replace(carcter,"")
      donde.value = valor
      crtr = false
  }else{
      var nums = new Array()
      cont = 0
      for(m=0;m<largo;m++){
          if(valor.charAt(m) == "." || valor.charAt(m) == " " || valor.charAt(m) == ","){
            continue;
          }else{
            nums[cont] = valor.charAt(m)
            cont++
          }
      }
  }

  if(decimales == true) {
    ctdd = eval(1 + dec);
    nmrs = cantidadNumeroEntero
  }else {
    ctdd = 1; nmrs = 3
  }
  var cad1="",cad2="",cad3="",tres=0
  if(largo > nmrs && crtr == true){
    for (k=nums.length-ctdd;k>=0;k--){
      cad1 = nums[k]
      cad2 = cad1 + cad2
      tres++
      if((tres%3) == 0){
          if(k!=0){
            //cad2 = "." + cad2 // agregar punto de miles
          }
      }
  }

    for (dd = dec; dd > 0; dd--){
      cad3 += nums[nums.length-dd] 
    }
    if(decimales == true){
      cad2 += "." + cad3
    }
    donde.value = cad2
  }
  donde.focus()
  
//  if(porcentaje === 999){
//    var porcentajeAfinazar = $("#Afianzamiento_porcentaje_afianzar").val();
//    //if (porcentajeAfinazar < 20){
//    var montoProyecto = $("#Afianzamiento_monto_proyectado").val();
//    var montoAfianzar = parseFloat(parseFloat(montoProyecto) * parseFloat(porcentajeAfinazar) / 100).toFixed(2);
//    var montoMaximoAfianzar = <?php if($montoMaximoAfinzarSociedadRegistradora){ echo $montoMaximoAfinzarSociedadRegistradora; }else{ echo "Null"; } ?>;
//    if(!isNaN(montoAfianzar)){
//      if (montoAfianzar<montoMaximoAfianzar){
//        $('#Afianzamiento_monto_fianza').val(montoAfianzar);
//      }else{
//        $('#Afianzamiento_monto_fianza').val('0');
//        $("#Afianzamiento_porcentaje_afianzar").val('');
//        alert("Monto de afianza ="+montoAfianzar+" Monto maximo a afianzar ="+montoMaximoAfianzar+"\nPor lo cual el monto calculado a afianzar excede el monto disponible del patrimonio para tal operación");
//      }
//    }else{
//        $('#Afianzamiento_monto_fianza').val('0');
//    }
//    deduccionFianza();
//    //}else{
//      //alert('Esta tratando de afianzar un ')
//    //}
//  }  
  
//  if (porcentaje === 998){
//    var montoFianza = $("#Afianzamiento_monto_fianza").val();
//    var porcentajeComision = $("#Afianzamiento_porcentaje_comision").val();
//    var montoComision = parseFloat(parseFloat(montoFianza) * parseFloat(porcentajeComision) / 100).toFixed(2);
//    if(montoComision){
//      $('#Afianzamiento_monto_comision').val(montoComision);
//    }else{
//      $('#Afianzamiento_monto_comision').val('0');
//    }
//  }
  
  
}

</script>