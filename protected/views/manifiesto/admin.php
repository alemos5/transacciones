<?php
$this->breadcrumbs=array(
	'Manifiestos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Listr Manifiesto','url'=>array('index')),
array('label'=>'Crear Manifiesto','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('manifiesto-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span  class="ez">Administrar Manifiesto</span>

<div class="pd-inner">
<?php
//href="https://telocomproenusa.commanifiesto.php?id='.$id_orden.'"
function imprimir($id_orden){
    echo '<center><a target="_black" class="update"
    href="https://telocomproenusa.com/manifiesto.php?id='.$id_orden.'"
    data-toggle="tooltip" title="" data-original-title="Imprimir">
    <i class="glyphicon glyphicon-print"></i>
    </a></center>';
}
function imprimirNew($id_orden){
    echo '<center><a target="_black" class="update"
    href="https://telocomproenusa.com/controlcourier/manifiesto/listadoManifiesto/'.$id_orden.'"  
    data-toggle="tooltip" title="" data-original-title="Imprimir">
    <i class="glyphicon glyphicon-print"></i>
    </a></center>';
}
function status($val, $orden){
	if($val == 10 || $val == 0){
		$status = "<img data-target='#Modal' data-toggle='modal' onclick='calcular(".$val.",".$orden.")' src='".Yii::app()->request->baseUrl."/images/pto_azul.png' border='0' />&nbsp;"
                        . "<a style='cursor: pointer' data-target='#Modal' data-toggle='modal' onclick='calcular(".$val.",".$orden.")'>Paquete listo para el env&iacute;o</a>" ;
	}elseif($val == 11){
		$status = "<img src='".Yii::app()->request->baseUrl."/images/pto_amarillo.png' border='0' onclick='calcular(".$val.",".$orden.")'/>&nbsp;"
                        . "<a style='cursor: pointer' data-target='#Modal' data-toggle='modal' onclick='calcular(".$val.",".$orden.")'>Entregado a la aerolinea</a>";
	}elseif($val== 12){
		$status = "<img src='".Yii::app()->request->baseUrl."/images/pto_naranja.png' border='0' onclick='calcular(".$val.",".$orden.")'/>&nbsp;"
                        . "<a style='cursor: pointer' data-target='#Modal' data-toggle='modal' onclick='calcular(".$val.",".$orden.")'>Pa&iacute;s destino</a>";
	}elseif($val == 13){
		$status = "<img src='".Yii::app()->request->baseUrl."/images/pto_viola.png' border='0' onclick='calcular(".$val.",".$orden.")'/>&nbsp;"
                        . "<a style='cursor: pointer' data-target='#Modal' data-toggle='modal' onclick='calcular(".$val.",".$orden.")'>Proceso de Aduana</a>";
	}elseif($val == 14){
		$status = "<img src='".Yii::app()->request->baseUrl."/images/pto_verde.png' border='0' onclick='calcular(".$val.",".$orden.")'/>&nbsp;"
                        . "<a style='cursor: pointer' data-target='#Modal' data-toggle='modal' onclick='calcular(".$val.",".$orden.")'>Liberaci&oacute;n de Aduanas</a>";
	}elseif($val == 15){
		$status = "<img src='".Yii::app()->request->baseUrl."/images/pto_verde.png' border='0' onclick='calcular(".$val.",".$orden.")'/>&nbsp;"
                        . "<a style='cursor: pointer' data-target='#Modal' data-toggle='modal' onclick='calcular(".$val.",".$orden.")'>Procesando para entrega local</a>";
	}

	return $status;
}

$this->widget('booster.widgets.TbGridView',array(
'id'=>'manifiesto-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_manifiesto',
		'vchar_nombre',
		'vchar_numero',
//		'float_peso',
//		'id_instruccion',
		'dt_registro',
        array(
            'filter'=>false,
            'header'=>'Imprimir',
            'name'=>'id_manifiesto',
            'type'=>'raw',
            'value'=>'imprimir($data->id_manifiesto)',
        ),
        array(
            'filter'=>false,
            'header'=>'Propuesta Imprimir',
            'name'=>'id_manifiesto',
            'type'=>'raw',
            'value'=>'imprimirNew($data->id_manifiesto)',
        ),
//                '',
        array(
          'filter'=>false,
          'header'=>false,
          'name'=>'status',
          'type'=>'raw',
          'value'=>'status($data->status, $data->id_manifiesto)',
        ),
		/*
		'id_status',
		'ref',
		'vchar_comprador',
		'vchar_rif',
		'vchar_direccion',
		'vchar_telefono',
		'vchar_atencion',
		'vchar_codigoi_manifiesto',
		'status',
		'AWB',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
    
<?php $this->beginWidget('booster.widgets.TbModal', array('id'=>'Modal')) ?>
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4><?php echo __('Cambie el status del manifiesto de ser necesario '); ?></h4>
    </div>

    <div class="modal-body">
        <div id="respuestaUsuario"></div>
        <div id="contenidoModal" style="display: block;">
            <div class="container-fluid">
                <div class="pd-inner">
                    <div id="imagenCarga" style="display: none">
                        <center>
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/cargando.gif">
                        </center>
                    </div>
                    <div id="estatusManifiesto">
                    <center>
                        <!--<form id="form1" name="form1" method="post" action="https://telocomproenusa.comtesting.php" >  enctype="multipart/form-data" -->
                            <span class="subtitulo"></span>
                            <select name="status_manifiesto" id="status_manifiesto">
                            <option value="10">Paquete listo para el envio.</option> 
                                <option value="11">Entregado a la aerolinea</option>
                                <option value="12">Pais destino</option>
                                <option value="13">Proceso de Aduanas</option>
                                <option value="14">Liberacion de Aduanas</option>
                                <option value="15">Procesando para entrega local</option>
                           <!--  {status_list} -->
                            </select>
                            <span class="avisopop" id="obg_orden"></span>
                            <input type="hidden" id="estatus" name="estatus" value="" />
                            <input type="hidden" name="manifiesto" id="manifiesto" value="" />
                            <span class="titulo" style="text-align: center; margin-left:5px;">
                                <input onclick="estatusManifiesto()" type="submit" name="button" id="button" value="Enviar" />
                            </span>
                          <!--</form>-->
                    </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        
        <?php $this->widget('booster.widgets.TbButton', array(
          'context'=>'default',
          'label'=>__('Close'),
          'url'=>'#',
          'htmlOptions'=>array('data-dismiss'=>'modal')
        ));?>
    </div>
<?php $this->endWidget(); ?>    
</div>
<script>
function calcular(estatus, manifiesto){
    $('#manifiesto').val(manifiesto);
}
function estatusManifiesto(){
    var estatus = $('#status_manifiesto').val();
    var manifiesto = $('#manifiesto').val();
    
//    alert(estatus+' '+manifiesto);
   $('#imagenCarga').css('display', 'block');
        $('#estatusManifiesto').css('display', 'none');
    $.post("https://telocomproenusa.comtesting.php",{
        status_manifiesto:estatus,
        id:manifiesto
    },
    function(data){
       //$('#correoExistente').val(data);
       // alert(data);
    }).done(function( data ) {
        //alert( "Data Loaded: " + data );
    });


    /*$.post( "https://telocomproenusa.comtesting.php",
        {
            status_manifiesto:estatus,
            id:manifiesto
        })
    .done(function( data ) {
       alert('Aqui');
    });
    //window.location.reload();*/
    setInterval("location.reload()",3000);
}
</script>