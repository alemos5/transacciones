<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'juez-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">The required fields contain <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <div class="col-sm-12 col-md-4">
        <?php $data = CHtml::listData(Usuario::model()->findAll(array('order'=>'usuario ASC')), 'id_usuario_sistema', 'usuario');
        echo $form->dropDownListGroup($model,'id_usuario_sistema',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>'Select...')+$data), 'labelOptions'=>array('label'=>'User:'))); ?>
    </div>
    <div class="col-sm-12 col-md-4">
        <?php $data = CHtml::listData(Competencia::model()->findAll(), 'id_copetencia', 'competencia');
        echo $form->dropDownListGroup($model,'id_competencia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'buscarDatos(this.value)'), 'data'=>array(''=>'Select...')+$data), 'labelOptions'=>array('label'=>'Competence:'))); ?>
    </div>
    <div class="col-sm-12 col-md-4">
        <?php $data = array(''=>'Seleccione',
                            '1'=>'Activo', 
                            '0'=>'Inactivo'
                            );
        echo $form->dropDownListGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>$data)));
        ?>
        <?php //echo $form->dropDownListGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array('1' => 'Active', '0'=>'Inactive' ),), 'labelOptions'=>array('label'=>'Status:'))); ?>
    </div>
</div>


<!--=======================================================================-->
<br>
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-indent-left"></span>
        <h3 class="panel-title" style="display: inline;"><?php echo __('Add round'); ?></h3>
        <div class="clearfix"></div>
    </div>
    <div id="yw0" class="panel-body">
        
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <?php
        //            echo CHtml::beginForm('/', 'post', ['id' => 'issue-574-checker-form']);
                    
                    $rondas = CHtml::listData(OrganizacionRonda::model()->findAll('estatus = 1'), 'id_organizacion_ronda', 'ronda');
                    $this->widget(
                        'booster.widgets.TbSelect2',
                        array(
                            'name' => 'group_id_list',
                            'data' => $rondas,
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
                            'title' => __('Add round'),
                            'context' => 'primary',
                            'headerIcon' => 'th-list',
                                'padContent' => false,
                            'htmlOptions' => array('class' => 'bootstrap-widget-table')
                        )
                    );
                ?>
                <div id="table-participante3" style="padding: 0 20px 20px 20px;">
                
                    <div class="row" id="head-table-participante2">
                      <div class="col-xs-6" style="padding: 8px;"><center><strong><?php echo __('Round'); ?></strong></center></div>
                      <div class="col-xs-6" style="padding: 8px;"><center><strong><?php echo __('Action'); ?></strong></center></div>
                    </div>
                    
                <?php 
                    $rondaJueces = JuezRonda::model()->findAll('id_juez ='.$model->id_juez);
                    foreach ($rondaJueces as $rondaJuez){
                    ?>

                        <div id="remove<?php echo $rondaJuez->id_juez_ronda; ?>" class="row"  style="border-top: 1px solid #ddd;">
                            <div class="col-xs-6" style="padding: 8px;">
                                <center><?php echo $rondaJuez->idRonda->ronda; ?></center>
                            </div>
                            <div class="col-xs-6" style="padding: 8px;">
                                <center><a class="delete" data-original-title="Borrar" title="" data-toggle="tooltip" href="javascript:remove(<?php echo $rondaJuez->id_juez_ronda; ?>)">
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
<br>
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-indent-left"></span>
        <h3 class="panel-title" style="display: inline;"><?php echo __('Add Category'); ?></h3>
        <div class="clearfix"></div>
    </div>
    <div id="yw0" class="panel-body">
        
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <?php
        //            echo CHtml::beginForm('/', 'post', ['id' => 'issue-574-checker-form']);
                    
                    $categorias = CHtml::listData(Categoria::model()->findAll(), 'id_categoria', 'categoria');
                    $this->widget(
                        'booster.widgets.TbSelect2',
                        array(
                            'name' => 'group_id_list2',
                            'data' => $categorias,
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
                            'title' => __('Categories List'),
                            'context' => 'primary',
                            'headerIcon' => 'th-list',
                                'padContent' => false,
                            'htmlOptions' => array('class' => 'bootstrap-widget-table')
                        )
                    );
                ?>
                <div id="table-participante3" style="padding: 0 20px 20px 20px;">
                
                    <div class="row" id="head-table-participante2">
                      <div class="col-xs-6" style="padding: 8px;"><center><strong><?php echo __('Category'); ?></strong></center></div>
                      <div class="col-xs-6" style="padding: 8px;"><center><strong><?php echo __('Action'); ?></strong></center></div>
                    </div>
                    
                <?php 
                    $categoriaJueces = JuezCategoria::model()->findAll('id_juez ='.$model->id_juez);
                    foreach ($categoriaJueces as $categoriaJuez){
                    ?>

                        <div id="removeCategoria<?php echo $categoriaJuez->id_juez_categoria; ?>" class="row"  style="border-top: 1px solid #ddd;">
                            <div class="col-xs-6" style="padding: 8px;">
                                <center><?php echo $categoriaJuez->idCategoria->categoria; ?></center>
                            </div>
                            <div class="col-xs-6" style="padding: 8px;">
                                <center><a class="delete" data-original-title="Borrar" title="" data-toggle="tooltip" href="javascript:removeCategoria(<?php echo $categoriaJuez->id_juez_categoria; ?>)">
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
<br>
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-indent-left"></span>
        <h3 class="panel-title" style="display: inline;"><?php echo __('Rating items'); ?></h3>
        <div class="clearfix"></div>
    </div>
    <div id="yw0" class="panel-body">
        
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <?php
        //            echo CHtml::beginForm('/', 'post', ['id' => 'issue-574-checker-form']);
                    
                    $itemsCalificacion = CHtml::listData(ItemCalificacion::model()->findAll(), 'id_item_calificacion', 'item_calificacion');
                    $this->widget(
                        'booster.widgets.TbSelect2',
                        array(
                            'name' => 'group_id_list3',
                            'data' => $itemsCalificacion,
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
                            'title' => __('Rating items'),
                            'context' => 'primary',
                            'headerIcon' => 'th-list',
                                'padContent' => false,
                            'htmlOptions' => array('class' => 'bootstrap-widget-table')
                        )
                    );
                ?>
                <div id="table-participante3" style="padding: 0 20px 20px 20px;">
                
                    <div class="row" id="head-table-participante2">
                      <div class="col-xs-6" style="padding: 8px;"><center><strong><?php echo __('Rating items'); ?></strong></center></div>
                      <div class="col-xs-6" style="padding: 8px;"><center><strong><?php echo __('Action'); ?></strong></center></div>
                    </div>
                    
                <?php 
                    $itemsJueces = JuezItemCalificacion::model()->findAll('id_juez ='.$model->id_juez);
                    foreach ($itemsJueces as $itemsJuez){
                    ?>
                        <div id="removeItems<?php echo $itemsJuez->id_juez_item_calificacion; ?>" class="row"  style="border-top: 1px solid #ddd;">
                            <div class="col-xs-6" style="padding: 8px;">
                                <center><?php echo $itemsJuez->idItems->item_calificacion; ?></center>
                            </div>
                            <div class="col-xs-6" style="padding: 8px;">
                                <center><a class="delete" data-original-title="Borrar" title="" data-toggle="tooltip" href="javascript:removeItems(<?php echo $itemsJuez->id_juez_item_calificacion; ?>)">
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



<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<script>
function remove(id) {
  
  if(confirm('Are you sure you want to delete this element?')) {
    $('#remove'+id).remove();
    $.post("<?php echo Yii::app()->createUrl('juezRonda/eliminarJuezRonda') ?>",{ id:id },function(data){});
    
  }
  
} 
function removeCategoria(id) {
  
  if(confirm('Are you sure you want to delete this element?')) {
    $('#removeCategoria'+id).remove();
    $.post("<?php echo Yii::app()->createUrl('juezCategoria/eliminarJuezCategoria') ?>",{ id:id },function(data){});
    
  }
  
}  
function removeItems(id) {
  
  if(confirm('Are you sure you want to delete this element?')) {
    $('#removeItems'+id).remove();
    $.post("<?php echo Yii::app()->createUrl('JuezItemCalificacion/eliminarJuezItems') ?>",{ id:id },function(data){});
    
  }
  
}    

function buscarDatos(id_competencia){
    $.post("<?php echo Yii::app()->createUrl('juez/create') ?>",{ id_competencia:id_competencia },function(data){});
}
</script>