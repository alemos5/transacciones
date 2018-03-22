<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<style>
td.highlight {
    background-color: whitesmoke !important;
}    
.modal-dialog{
  width: 60% !important;
}
</style>
    
<script>
$(document).ready( function () {
//    $('#example').DataTable();
    var table = $('#example').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollX": true,
        fixedHeader: true,
        dom: 'Bfrtip',
        order: [ 0, 'DESC' ],
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
     
    $('#example tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } );

    

} );    
</script>
<?php
$this->breadcrumbs=array(
	'Ordenes'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Listar Ordenes','url'=>array('index')),
array('label'=>'Crear Orden','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('ordenes-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span  class="ez">Administrar Ordenes</span>

<div class="pd-inner">
<form method="post" action="<?php echo Yii::app()->createUrl('ordenes/admin') ?>" class="form" name="form" id="form">
  <!--Mostrar todas las fianzas:-->
  <!--<input type="checkbox" id="include2" name="include2" value="false" />-->
  <div class="well container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label class="control-label" for="id"><?php echo __('Cantidad de ordenes a mostrar '); ?></label><br />
          <?php 
          
          
            $option = "<option  value=''>Selecciones</option>";
            if($cantidad == 500){
              $option .= "<option selected='selected' value='500'>Mostrar 500</option>";
            }else{
              $option .= "<option value='500'>Mostrar 500</option>";  
            }
            if($cantidad == 1000){
              $option .= "<option selected='selected' value='1000'>Mostrar 1000</option>";
            }else{
              $option .= "<option value='1000'>Mostrar 1000</option>";  
            }
            if($cantidad == 2000){
              $option .= "<option selected='selected' value='2000'>Mostrar 2000</option>";
            }else{
              $option .= "<option value='2000'>Mostrar 2000</option>";  
            }
            if($cantidad == 3000){
              $option .= "<option selected='selected' value='3000'>Mostrar 3000</option>";
            }else{
              $option .= "<option value='3000'>Mostrar 3000</option>";  
            }
            if($cantidad == 9999){
              $option .= "<option selected='selected' value='9999'>Mostrar Todo</option>";
            }else{
              $option .= "<option value='9999'>Mostrar Todo</option>";  
            }
          ?>
          <select name="include" class="span5 form-control" onchange="update_list_view();">
              <?php echo $option; ?>
          </select>
        </div>
      </div>
    </div>
  </div>
</form>    
    
<?php

//echo "Cantidad =".$cantidad;

function prueba($valor){
    if($valor == 1){
        $estatus = "1";
    }else{
        $estatus = "2";
    }
    return $estatus;
}

function status($val, $orden){
	if($val == 0){
		$status = "<img data-target='#Modal' data-toggle='modal' onclick='calcular(".$orden.")' src='".Yii::app()->request->baseUrl."/images/pto_azul.png' border='0' />&nbsp;"
                        . "<a style='cursor: pointer' data-target='#Modal' data-toggle='modal' onclick='calcular(".$orden.")'>Paquete listo para el env&iacute;o</a>" ;
	}elseif($val == 1){
		$status = "<img src='".Yii::app()->request->baseUrl."/images/pto_amarillo.png' border='0' />&nbsp;Entregado a la aerolinea";
	}elseif($val== 2){
		$status = "<img src='".Yii::app()->request->baseUrl."/images/pto_naranja.png' border='0' />&nbsp;Pa&iacute;s destino";
	}elseif($val == 3){
		$status = "<img src='".Yii::app()->request->baseUrl."/images/pto_viola.png' border='0' />&nbsp;Proceso de Aduana";
	}elseif($val == 4){
		$status = "<img src='".Yii::app()->request->baseUrl."/images/pto_verde.png' border='0' />&nbsp;Liberaci&oacute;n de Aduanas";
	}elseif($val == 5){
		$status = "<img src='".Yii::app()->request->baseUrl."/images/pto_verde.png' border='0' />&nbsp;Procesando para entrega local";
	}

	return $status;
}

?>
<div class="table-responsive">

    <table style="" id="example" class="table " cellspacing="0">
        <thead>
            <tr>
                <td><center><strong><?php echo __('Fecha'); ?></strong></center></td>
                <td><center><strong><?php echo __('Ware Reciept'); ?></strong></center></td>
                <td><center><strong><?php echo __('Peso'); ?></strong></center></td>
                <td><center><strong><?php echo __('Tracking'); ?></strong></center></td>
                <td><center><strong><?php echo __('Courier'); ?></strong></center></td>
                <td><center><strong><?php echo __('Nombre Cliente'); ?></strong></center></td>
                <td><center><strong><?php echo __('Eliminar'); ?></strong></center></td>
                <td><center><strong><?php echo __('Imprimir'); ?></strong></center></td>
                <td><center><strong><?php echo __('Estatus'); ?></strong></center></td>
                <td><center><strong><?php echo __('Estatus Pago'); ?></strong></center></td>
                <td><center><strong><?php echo __('Pagada'); ?></strong></center></td>
            </tr>
        </thead>
        <tbody>
           <?php 
                //$ordenes = Ordenes::model()->findAll('status= 1 AND orden= 2',array('order'=>'id_orden DESC'));
                if($cantidad == 9999){
                    $ordenes = Ordenes::model()->findAll(''
                       . 'status= 0 OR status= 1 AND instrucciones = 0 OR instrucciones = 2'
                       . ' AND orden= 0 ORDER BY fecha DESC' );
                }else{
                    $ordenes = Ordenes::model()->findAll(''
                       . 'status= 0 OR status= 1 AND instrucciones = 0 OR instrucciones = 2'
                       . ' AND orden= 0 ORDER BY fecha DESC LIMIT '.$cantidad);
                }

               foreach ($ordenes as $orden){
                   ?>
                    <tr>
                        <td>
                            <center>
                                <?php echo $orden->fecha; ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $orden->ware_reciept; ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $orden->peso; ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $orden->tracking; ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $orden->courier; ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $orden->nombre_cliente; ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <a onclick="eliminarOrden(<?php echo $orden->id_orden; ?>)" title="Eliminar Orden" >
                                    <span onclick="eliminarOrden(<?php echo $orden->id_orden; ?>)" class="glyphicon glyphicon-trash"></span>
                                </a>
                                <a title="Editar Orden" href="update/<?php echo $orden->id_orden; ?>">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a title="Detallar Orden" href="<?php echo $orden->id_orden; ?>">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                            </center>
                        </td>
                        <td>
                            <center>
                                <a target="_blank" href="http://telocomproenusa.com/controlcourier/cruz/etiqueta/etiqueta.php?id=<?php echo $orden->id_orden; ?>">
                                    <span class="glyphicon glyphicon-print"></span>
                                </a>
                               
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo status($orden->status, $orden->id_orden); ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php
                                if($orden->pagada == 1){
                                    echo "Pagada";
                                }else{
                                    echo "Por pagada";
                                }
                                ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        Acción <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a style=" cursor: pointer;" onclick="pagada(<?php echo $orden->id_orden; ?>, 1, 1)">
                                                Pagada
                                            </a>
                                        </li>
                                        <li>
                                            <a style=" cursor: pointer;" onclick="pagada(<?php echo $orden->id_orden; ?>, 0, 1)">
                                                Por pagar
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </center>
                        </td>
                    </tr>
                   <?php
               }
               $consolidaciones = Consolidaciones::model()->findAll("fecha > '2017-12-31' ORDER BY fecha DESC");
               foreach ($consolidaciones as $consolidacion){
                   ?>
                    <tr>
                        <td>
                            <center>
                                <?php echo $consolidacion->fecha; ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $consolidacion->ware_reciept; ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $consolidacion->idCliente->code_cliente; ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php //echo $consolidacion->tracking; ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php //echo $consolidacion->courier; ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $consolidacion->idCliente->nombre; ?>
                            </center>
                        </td>
                        <td>No aplica</td>
                        <td>
                            <center>
                                <a target="_blank" href="http://telocomproenusa.com/cruz/etiqueta/etiquetacon.php?id=<?php echo $consolidacion->id_con; ?>"><span class="glyphicon glyphicon-print"></span></a>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo status($consolidacion->status, $consolidacion->id_con); ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php
                                if($consolidacion->pagada == 1){
                                    echo "Pagada";
                                }else{
                                    echo "Por pagada";
                                }
                                ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        Acción <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a style=" cursor: pointer;" onclick="pagada(<?php echo $consolidacion->id_con; ?>, 1, 2)">
                                                Pagada
                                            </a>
                                        </li>
                                        <li>
                                            <a style=" cursor: pointer;" onclick="pagada(<?php echo $consolidacion->id_con; ?>, 0, 2)">
                                                Por pagar
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </center>
                        </td>
                    </tr>
                   <?php
               }
           ?>
        </tbody>
     </table>
</div>    
    
    

</div>
<?php $this->beginWidget('booster.widgets.TbModal', array('id'=>'Modal')) ?>
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4><?php echo __('Instrucciones'); ?></h4>
    </div>

    <div class="modal-body">
        <div id="respuestaUsuario"></div>
        <div id="contenidoModal" style="display: block;">
            <div class="container-fluid">
                <div class="pd-inner">
                    <div id="contenidoOrden"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <?php $this->widget('booster.widgets.TbButton', array(
          'context'=>'default',
          'label'=>__('Send'),
          'url'=>'#',
          'htmlOptions'=>array('onclick'=>'enviar_formulario()')
        ));?>
        <?php $this->widget('booster.widgets.TbButton', array(
          'context'=>'default',
          'label'=>__('Close'),
          'url'=>'#',
          'htmlOptions'=>array('data-dismiss'=>'modal')
        ));?>
    </div>
<?php $this->endWidget(); ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-ui-no-conflict.min.js"></script>
<script>
if ($('#orden_2').attr('checked') ) {
    //console.log("Checkbox seleccionado");
    alert("aqui");
}
    //orden_2
    
    
function checked(){
    alert('Aqui');
}

function pagada(id, accion, tipo){
    $.post("<?php echo Yii::app()->createUrl('ordenes/pagada') ?>",{
            id:id,
            accion:accion,
            tipo:tipo
        },
        function(data){

        }).done(function() {
        location.reload();
    });
}

function eliminarOrden(orden){
    
    var mensaje;
    var opcion = confirm("Realmente desea eliminar la orden");
    if (opcion == true) {
        $.post("<?php echo Yii::app()->createUrl('ordenes/eliminar') ?>",{ orden:orden },
        function(data){

        }).done(function() {
            location.reload();
        });
    } else {
       
    }
}    
    
function enviar_formulario(){
   document.FormInstruccion.submit();
}     
    
function calcular(orden){
    $.post("<?php echo Yii::app()->createUrl('ordenes/Instruccion') ?>",{ orden:orden },
    function(data){
       $('#contenidoOrden').html(data);
    });
}    


function update_list_view() {
//    $.fn.yiiListView.update('list-view', {data: $('#form').serialize()});
//    return false;
        document.form.submit()
}
</script>