<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'usuarioenvio_ordenes-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'enableAjaxValidation' => false,
        ));
?>

<?php
$this->pageTitle=Yii::app()->name;
$this->menu=array(
array('label'=>__('My Profile'),'url'=>array('/usuario/'.Yii::app()->user->id_usuario_sistema)),
array('label'=>__('Ordenes'),'url'=>array('/usuario/ordenPersonal')),
array('label'=>__('Consolidaciones'),'url'=>array('/usuario/consolidacionPersonal')),
);
$usuario = Usuario::model()->find('id_usuario_sistema ='.Yii::app()->user->id_usuario_sistema);
$correo = $usuario->correo;
?>
<span class="ez">Envio de Instrucción</span>
<div class="pd-inner">
    
    <div class="row">
        <div class="col-sm-12 col-md-2">
         <?php // echo "IDO: ".$_GET['ido']; ?>   
        </div>
        <div class="col-sm-12 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Orden: <?php echo $_GET['w']; ?></div>
                <div class="panel-body">
                    <ul>
                        <li>Si deseas enviar solo algunos paquetes selecciona envió aéreo y clic en los paquetes que desea enviar.</li>
                        <!--<li>Si desea enviar todos los paquetes que tienes en tu casillero, selecciona envió aéreo y enviar todos mis paquetes.</li>-->
                        <li>Si tienes instrucciones adicionales por favor escríbelas en el campo de comentarios.</li>
                    </ul>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <input type="hidden" name="ido" value="<?php echo $_GET['ido']; ?>">
                            <input type='radio' name='order' value='1' id='order' class='order'>
                            <label>Envío aéreo</label>
                        </div>
                    </div>
<!--                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <input type='checkbox' name='all_order' class='all_order'>
                            <label>Enviar todos mis paquetes</label>
                        </div>
                    </div>-->
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <?php
                        //            echo CHtml::beginForm('/', 'post', ['id' => 'issue-574-checker-form']);
                                    $data = CHtml::listData(Ordenes::model()->findAll("status = 0 AND instrucciones = 0 AND orden = 0 AND code_cliente LIKE '".Yii::app()->user->code_cliente."'"), 'id_orden', 'ware_reciept');

                                    $this->widget(
                                        'booster.widgets.TbSelect2',
                                        array(
                                            'name' => 'group_id_list',
                                            'data' => $data,
//                                            'value' => $data,
                                            'htmlOptions' => array(
                                                'multiple' => 'multiple',
                                                'class' => 'span5 form-control',
//                                                'value' => $data,
                                            ),        
                                            'options' => array(
                                                'placeholder' => 'Seleccione su paquete',
                                                'width' => '100%',
//                                                'value'=>$data,
                                            )
                                        )
                                    );
                                    
                                     
     
                                    
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <br>
                            <label class="control-label required" for="">
                            Descripción
                            </label>
                            <textarea id="SubclienteOrdenes_descripcion" class="span8 form-control" name="SubclienteOrdenes[descripcion]" placeholder="Descripcion" required="required" cols="50" rows="6"></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <center>
                    <?php
                    $this->widget('booster.widgets.TbButton', array(
                        'buttonType' => 'submit',
                        'context' => 'primary',
                        'label' => "Enviar",
                    ));
                    ?>
                    <?php
                    $this->widget('booster.widgets.TbButton', array(
                        'buttonType' => 'submit',
                        'context' => 'default',
                        'label' => "Cancelar",
                        'htmlOptions'=> array('onclick' => 'javascript:history.back(1)'),
                    ));
                    ?>
                    </center>
                </div>
              </div>
        </div>
        <div class="col-sm-12 col-md-2">
            
        </div>
    </div>

<!--<div class="form-actions">
<?php
$this->widget('booster.widgets.TbButton', array(
    'buttonType' => 'submit',
    'context' => 'primary',
    'label' => $model->isNewRecord ? __('Create') : __('Update'),
));
?>
</div>-->

    
</div>
<?php $this->endWidget(); ?>