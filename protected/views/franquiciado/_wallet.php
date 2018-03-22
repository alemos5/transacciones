<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<style>
input#Franquiciado_img{
  color: transparent;
}
td.highlight {
    background-color: whitesmoke !important;
}    
</style>
<script>
$(document).ready( function () {
//    $('#example').DataTable();
    var table = $('#example').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
      });
     
    $('#example tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } );

    var table = $('#example2').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
      });
     
    $('#example2 tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } );

} );    
</script>

<?php
$this->breadcrumbs=array(
	'Franquiciados',
);

$this->menu=array(
array('label'=>'Create Franquiciado','url'=>array('create')),
array('label'=>'Manage Franquiciado','url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Franchisee: Wallet'); ?></span>
<div class="pd-inner">
    <?php 
    if(Yii::app()->user->id_perfil_sistema=='1'){
        $this->widget('booster.widgets.TbListView',array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
        )); 
    }else{
        
        //echo Yii::app()->user->id_usuario_sistema;
        $franquiciados = Franquiciado::model()->findAll('id_usuario_sistema ='.Yii::app()->user->id_usuario_sistema);
        $id_franquiciado = 0;
        foreach ($franquiciados as $franquiciado){
            $id_franquiciado = $franquiciado->id_franquiciado;
        }
        
        $i = 0;
        $or = "";
        $orFranquiciado = "";
        foreach ($franquiciados as $franquiciado){
            if($i == 0){
                $or = "id_copetencia = ".$franquiciado->id_competencia;
                $orF = "id_copetencia = ".$franquiciado->id_competencia;
                $orFranquiciado = " id_competencia = ".$franquiciado->id_competencia;
            }else{
                $or .= " OR id_copetencia = ".$franquiciado->id_competencia;
                $orF .= " OR id_copetencia = ".$franquiciado->id_competencia;
                $orFranquiciado = " OR id_competencia = ".$franquiciado->id_competencia;
            }
            $i++;
        }
        
        ?>
        
         <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse1"><?php echo __('Bank details of the franchisee'); ?></a>
                        </h4>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div style="text-align: right">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                <div class="btn btn-default" >
                                    <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>  
                                </div>
                            </a>
                        </div>
                    </div>
                    </div>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">
                        
                        <?php 
//                    echo $id_franquiciado;
                    $model=Franquiciado::model()->findByPk($id_franquiciado);
                    echo $franquiciados->id_franquiciado;
                    $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
                            'action'=>'updateFranquiciado',
                            'id'=>'franquiciado-form',
                            'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                            'enableAjaxValidation'=>false,
                    )); 
                    ?>
                    <input type="hidden" name="id" value="<?php echo $id_franquiciado; ?>">    
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <?php $data = array('1'=>'Paypal', 
                                  '2'=>'Transferencia Bancaria'
                                );
                            echo $form->dropDownListGroup($model,'forma_pago',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>$data)));
                            ?>
                            
                            <?php //echo $form->textFieldGroup($model,'forma_pago',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <?php echo $form->textAreaGroup($model,'descripcion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            <?php echo $form->labelEx($model,'img'); ?>
                            <?php echo CHtml::activeFileField($model, 'img'); ?>  
                            <?php echo $form->error($model,'img'); ?>
                            <br>
                            <div class="alert alert-info">
                                <?php echo __('Attached account certificate'); ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="view">
                                <b><?php //echo $model->img; ?></b>
                                <?php //echo CHtml::encode($data->img); ?>
                                <a target="_black" href="<?php $host= $_SERVER["HTTP_HOST"]; echo $urlParte = "http://".$host.""; ?>/images/franquiciado/<?php echo $model->img; ?>">
                                    <img src="<?php $host= $_SERVER["HTTP_HOST"]; echo $urlParte = "http://".$host.""; ?>/images/franquiciado/<?php echo $model->img; ?>" class="img-thumbnail" alt="" style=" width: 100%; height: 180px;" >
                                </a>
                            <br />
                            </div>
                        </div>
                    </div>
                    <br><br>    

                    <div class="form-actions">
                    <?php $this->widget('booster.widgets.TbButton', array(
                            'buttonType'=>'submit',
                            'context'=>'primary',
                            'label'=>$model->isNewRecord ? 'Create' : 'Update',
                    )); ?>
                    </div>

                    <?php $this->endWidget(); ?>
                        
                        
                    </div>
                </div>
            </div>
        </div> 
    
        <br>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo __('Results table: Competition'); ?></div>
                    <div class="panel-body">

                        <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr style=" background-color: #ccc;">
                                    <td><center><?php echo __('Competition'); ?></center></td>
                                    <td><center><?php echo __('Items'); ?></center></td>
                                    <td><center><?php echo __('# Quantity'); ?></center></td>
                                    <td><center><?php echo __('Paid Value'); ?></center></td>
                                    <td><center><?php echo __('Win Service Charge'); ?></center></td>
                                    <td><center><?php echo __('Total to pay'); ?></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalPase = 0;
                                $totalValor = 0;
                                $totalPorcentaje = 0;
                                $totalResultado = 0;
//                                $pagos = Pago::model()->findAll($or.' group by `id_tipo_pago` ORDER BY `id_tipo_pago` ASC');
                                $or .= ' group by `id_tipo_pago` ORDER BY `id_tipo_pago` ASC';
                                $pagos = Pago::model()->findAll(array(
                                                                'select'=>'id_tipo_pago, id_copetencia',
                                                                'condition'=>$or
                                                               ));
                                
                                foreach ($pagos as $pago){
                                ?>
                                <tr>
                                    <td><center><?php echo $pago->idCompetencia->competencia;?></center></td>
                                    <td>
                                        <center>
                                            <?php 
                                            if($pago->id_tipo_pago == 1){
                                                echo __('Competitor pass');
                                            }
                                            if($pago->id_tipo_pago == 2){
                                                echo __('Category Inscription');
                                            }
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php
                                            $pagosPase = Pago::model()->findAll('id_copetencia ='.$pago->id_copetencia.' AND id_tipo_pago = '.$pago->id_tipo_pago.' AND id_pago_estatus = 2');
                                            $totalPase += count($pagosPase);
                                            echo count($pagosPase);
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php
                                            $pagosPases = Pago::model()->findAll('id_copetencia ='.$pago->id_copetencia.' AND id_tipo_pago = '.$pago->id_tipo_pago.' AND id_pago_estatus = 2');
                                            $valor =0;
                                            foreach ($pagosPases as $pagoPase){
                                                $valor += $pagoPase->costo_pagar;
                                            }
                                            $totalValor += $valor;
//                                            echo $valor;
                                            echo number_format($valor, 2, '.', ',');
                                            ?>
                                        </center>
                                    </td>
                                    <td><center><?php 
//                                    echo $franquiciado->porcentaje; 
                                    echo number_format($franquiciado->porcentaje, 2, '.', ',');
                                    $totalPorcentaje = $franquiciado->porcentaje;?></center></td>
                                    <td>
                                        <center>
                                            <?php
                                            $resultado = ($valor * $franquiciado->porcentaje)/100;
                                            $totalResultado += $valor - $resultado;
//                                            echo $valor - $resultado;
                                            echo number_format($valor - $resultado, 2, '.', ',');
                                            ?>
                                        </center>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"><center><?php echo __('Total'); ?></center></td>
                                    <td><center><?php echo $totalPase; ?></center></td>
                                    <td><center><?php echo number_format($totalValor, 2, '.', ','); ?></center></td>
                                    <td><center><?php echo number_format($totalPorcentaje, 2, '.', ','); ?></center></td>
                                    <td><center><?php echo number_format($totalResultado, 2, '.', ','); ?></center></td>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo __('Results table: Disbursement'); ?>
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr style=" background-color: #ccc;">
                                    <td><center><?php echo __('Competition'); ?></center></td>
                                    <td><center><?php echo __('Franchisee'); ?></center></td>
                                    <td><center><?php echo __('Description'); ?></center></td>
                                    <td><center><?php echo __('Registration date'); ?></center></td>
                                    
                                    <td><center><?php echo __('Estatus'); ?></center></td>
                                    <td><center><?php echo __('Validations'); ?></center></td>
                                    <td><center><?php echo __('Request'); ?></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $franquiciado_desembolsos = FranquiciadoDesembolso::model()->findAll($orFranquiciado);
                                $monto = 0;
                                $montoResta = 0;
                                if($franquiciado_desembolsos){
                                
                                foreach ($franquiciado_desembolsos as $franquiciado_desembolso){
                                ?>
                                <tr>
                                    <td><center><?php echo $franquiciado_desembolso->idCompetencia->competencia; ?></center></td>
                                    <td><center><?php echo $franquiciado_desembolso->idUsuario->primer_nombre." ".$franquiciado_desembolso->idUsuario->primer_apellido; ?></center></td>
                                    <td><center><?php echo $franquiciado_desembolso->descripcion; ?></center></td>
                                    <td><center><?php echo $franquiciado_desembolso->fecha_registro; ?></center></td>
                                    
                                    <td>
                                        <center>
                                            <?php
                                            if($franquiciado_desembolso->estatus == 0){
                                                echo __('In validation');
                                            }
                                            if($franquiciado_desembolso->estatus == 1){
                                                echo '<font color="blue">'.__('Validated').'</font>';
                                            }
                                            if($franquiciado_desembolso->estatus == 2){
                                                echo '<font color="green">'.__('Approved').'</font>';
                                                $montoResta += $franquiciado_desembolso->monto;
                                            }
                                            if($franquiciado_desembolso->estatus == 3){
                                                echo '<font color="red">'.__('Denied').'</font>';
                                            }
                                            ?>
                                        </center>
                                    <font color="blue"></font>
                                    </td>
                                    <td>
                                        <center>
                                            <a onclick="contenidoValidacion(<?php echo $franquiciado_desembolso->id_franquiciado_desembolso; ?>)" style=" cursor: pointer;" data-toggle="modal" data-target="#validaciones">
                                                <span onclick="contenidoValidacion(<?php echo $franquiciado_desembolso->id_franquiciado_desembolso; ?>)" style=" cursor: pointer;" data-toggle="modal" data-target="#validaciones" class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                            </a>
                                            <?php
                                                
                                            ?>
                                        </center>
                                    </td>
                                    <td><center><?php echo number_format($franquiciado_desembolso->monto, 2, '.', ','); $monto += $franquiciado_desembolso->monto; ?></center></td>
                                </tr>
                                <?php 
                                }
                                }else{
                                    ?>
                                    <tr>
                                        <td colspan="7"><center><?php echo __('No records'); ?></center></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6"><center><?php echo __('Total'); ?></center></td>
                                    <td><center><?php echo number_format($monto, 2, '.', ','); ?></center></td>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                        <?php 
                        
                        $franquiciados = Franquiciado::model()->findAll('id_usuario_sistema ='.Yii::app()->user->id_usuario_sistema.' AND '.$orFranquiciado);
                        $lider= 0;
                        foreach ($franquiciados as $franquiciado){
                            if($franquiciado->lider == 1){
                                $lider++;
                            }
                        }
                        if($lider >= 1){
                            $calculo = $totalResultado - $montoResta;
                            if($calculo > 0){ ?>
                            <br>
                            <center>

                                <button data-toggle="modal" data-target="#myModal" onclick="" type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
                                    <?php echo __('Ask for money'); ?>
                                </button>
                            </center>
                            <br>
                            <?php }else{ ?>

                            <br>
                            <center>
                                <button disabled="disabled" onclick="" type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
                                    <?php echo __('Ask for money'); ?>
                                </button>
                            </center>
                            <br>
                            <?php 
                            }
                        }?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        
        
        <?php
    }
    ?>
</div>

<!-- Modal -->
<?php $this->beginWidget(
    'booster.widgets.TbModal',
    array('id' => 'myModal')
); ?>

    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4><?php echo __('Ask for money'); ?></h4>
    </div>

    <div class="modal-body">
        <div id="okRegistro">
            <?php $date = new Date();  ?>
            <div class="container-fluid">

                <?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
                        'id'=>'franquiciado-desembolso-form',
                        'enableAjaxValidation'=>false,
                )); 
                $model=new FranquiciadoDesembolso;
                ?>

                <p class="alert alert-warning">The required fields contain <span class="required">*</span>.</p>

                <?php echo $form->errorSummary($model); ?>
                <div id="errorRegistro" style="display: none;" class="alert alert-danger">
                    <b><?php echo __('Errors Presented'); ?></b>
                    <hr>
                    <label id="competenciaFranquiciado" style="display: none;" ><?php echo __('You must enter the competition'); ?></label>
                    <label id="montoFranquiciado" style="display: none;"><?php echo __('You must enter the amount'); ?></label>
                    <label id="campo1" style="display: none;"><?php echo __('The amount entered is greater than the amount available'); ?></label>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <?php $data = CHtml::listData(Competencia::model()->findAll($orF), 'id_copetencia', 'competencia');
                        echo $form->dropDownListGroup($model,'id_competencia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>'Select...')+$data), 'labelOptions'=>array('label'=>'Competition:'))); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="control-label required" for="FranquiciadoDesembolso_monto">
                                <?php echo __('Available').":"; ?>
                            </label>
                            <input disabled="disabled" id="disponible" class="span5 form-control" type="text" name="" onkeypress="return NumCheck(event, this)" placeholder="" value="<?php echo number_format($totalResultado - $montoResta, 2, '.', ''); ?>" maxlength="10">
                        </div>
                        
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <?php echo $form->textFieldGroup($model,'monto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10, 'value'=>'', 'placeholder'=>"0.00", 'onkeypress'=>"return NumCheck(event, this)")))); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <?php echo $form->textAreaGroup($model,'descripcion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>3, 'cols'=>50, 'class'=>'span8')))); ?>
                    </div>
                </div>

                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'context' => 'primary',
                'id'=>'bt_registro',
                'label' => 'Apply for',
                'url' => '#',
                'htmlOptions' => array(
//                    'data-dismiss' => 'modal',
                    'onclick' => 'desembolso()'
                ),
            )
        ); ?>
        <?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'id'=>'bt_cancelar',
                'label' => 'Cancel',
                'url' => '#',
                'htmlOptions' => array('data-dismiss' => 'modal'),
            )
        ); ?>
    </div>
<?php $this->endWidget(); ?>

<!--======================================================================== -->
<!-- Validaciones -->
<!--======================================================================== -->

<?php $this->beginWidget(
    'booster.widgets.TbModal',
    array('id' => 'validaciones')
); ?>

    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4><?php echo __('Validation History'); ?></h4>
    </div>

    <div class="modal-body">
        
        <div id="okRegistro">
            <div class="container-fluid">
                <div id="contenidoValidacion"></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        
        <?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'id'=>'bt_cancelar',
                'label' => 'Cancel',
                'url' => '#',
                'htmlOptions' => array('data-dismiss' => 'modal'),
            )
        ); ?>
    </div>
<?php $this->endWidget(); ?>

<script>
    
function contenidoValidacion(id_franquiciado_desembolso){
    $.post("<?php echo Yii::app()->createUrl('franquiciadoAprobacion/listado') ?>",{ id_franquiciado_desembolso:id_franquiciado_desembolso },
    function(data){
        $('#contenidoValidacion').html(data);
    });
}    
    
function validar(id_franquiciado, accion){
    var mensaje;
    if(accion  == 1){
        var opcion = confirm("¿Realmente desea validar?");
    }else{
        var opcion = confirm("¿Realmente desea eliminar la validación?");
    }
    if (opcion == true) {
        $.post("<?php echo Yii::app()->createUrl('franquiciado/validar') ?>",{ id_franquiciado:id_franquiciado, accion:accion },
        function(data){
            location.reload();
        });
    } else {
//        mensaje = "Has clickado Cancelar";
    }

}    

function desembolso(){
    
    $('#montoFranquiciado').css('display', 'none');
    
    var FranquiciadoDesembolso_id_competencia = $('#FranquiciadoDesembolso_id_competencia').val();
    var FranquiciadoDesembolso_monto = $('#FranquiciadoDesembolso_monto').val();
    var FranquiciadoDesembolso_descripcion = $('#FranquiciadoDesembolso_descripcion').val();
    var disponible = $('#disponible').val();
    
    if(FranquiciadoDesembolso_id_competencia == ""){
            $('#errorRegistro').css('display', 'block');
            $('#competenciaFranquiciado').css('display', 'block');
    }else{
        $('#competenciaFranquiciado').css('display', 'none');
        if(FranquiciadoDesembolso_monto == ""){
            $('#errorRegistro').css('display', 'block');
            $('#montoFranquiciado').css('display', 'block');
        }else{
            $('#montoFranquiciado').css('display', 'none');
            if(parseFloat(disponible) < FranquiciadoDesembolso_monto ){
                $('#errorRegistro').css('display', 'block');
                $('#campo1').css('display', 'block');
            }else{
                $('#errorRegistro').css('display', 'none');
                $('#campo1').css('display', 'none');

                var url = "http://www.appwin.net/images/cargando.gif";
                $('#okRegistro').html('<center><img src="'+url+'"/></center>');
                $.post("<?php echo Yii::app()->createUrl('franquiciadoDesembolso/registarDesembolso') ?>",
                {
                    FranquiciadoDesembolso_id_competencia:FranquiciadoDesembolso_id_competencia,
                    FranquiciadoDesembolso_monto:FranquiciadoDesembolso_monto,
                    FranquiciadoDesembolso_descripcion:FranquiciadoDesembolso_descripcion,
                },
                function(data){
    //                location.reload();
                    window.location.href = "wallet";
    //               $('#bt_cancelar').html("Cerrar");
    //               $('#okRegistro').css('display', 'block');
    //               $('#okRegistro').html(data);
    //               $('#RU').css('display', 'none');
    //               $('#bt_registro').css('display', 'none');

                });
            }
        }
    }
    
}

function NumCheck(e, field) {
  key = e.keyCode ? e.keyCode : e.which
  if (key == 8) return true
  if (key > 47 && key < 58) {
    if (field.value == "") return true
    regexp = /.[0-9]{4}$/
    return !(regexp.test(field.value))
  }
  if (key == 46) {
    if (field.value == "") return false
    regexp = /^[0-9]+$/
    return regexp.test(field.value)
  }
  return false
}
</script>