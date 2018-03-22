<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>


<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'clientes-subcliente-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php
$this->breadcrumbs=array(
	'Clientes Subclientes',
);

$this->menu=array(
    array('label'=>'Tracking','url'=>array('tracking')),
array('label'=>'Administración de Tracking','url'=>array('admin')),
);
?>
<style>
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

    var table2 = $('#example2').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
      });
     
    $('#example2 tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table2.cell(this).index().column;
 
            $( table2.cells().nodes() ).removeClass( 'highlight' );
            $( table2.column( colIdx ).nodes() ).addClass( 'highlight' );
        } );


} );    
</script>
<span  class="ez">Tracking</span>

<div class="pd-inner">
<?php 
   
if(Yii::app()->user->id_perfil_sistema=='2' || Yii::app()->user->id_perfil_sistema=='4'){
    
    
//    echo Yii::app()->user->code_cliente;
//    
    
    $subclientes = ClientesSubcliente::model()->findAll('id_cliente ='.Yii::app()->user->id_cliente);
    $i = 0;
    $or = "";
    foreach ($subclientes as $subcliente){
        if($i == 0){
            $or = " code_cliente ='".$subcliente->code_cliente_hijo."'";
        }else{ 
            $or .= " OR code_cliente ='".$subcliente->code_cliente_hijo."'";
        }
        $i++;
    }
    
    
    $ordenes = Ordenes::model()->findAll('code_cliente = "'.Yii::app()->user->code_cliente.'"');
    if($ordenes){
        ?>
            <div class="panel panel-default">
              <div class="panel-heading">Resultados Encontrados de sus Ordenes</div>
              <div class="panel-body">
                    <table style=" width: 100%;" id="example" class="table table-hover" cellspacing="0">
                        <thead>
                            <tr>
                                <td>Cliente</td> 
                                <td>Orden</td> 
                                <!--<td>Número de Guía</td>--> 
                                <td>Descripción</td>
                                <td>Tracking</td> 
                                <td>Estatus</td> 
                                <td>Fecha de Registro</td> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($ordenes as $orden){
                                ?>
                                <tr>
                                    <td><?php echo $orden->nombre_cliente; ?></td>
                                    <td><?php echo $orden->ware_reciept; ?></td>
                                    <td><?php echo $orden->descripcion; ?></td>
                                    <!--<td><?php // echo $orden->numero_guia; ?></td>-->
                                    <td><?php echo $orden->tracking; ?></td>
                                    <td>
                                        <?php

                                        switch ($orden->estatus_manifiesto) {
                                            case '10':
                                                $estado = 'Paquete listo para el envio.';
                                                $mensaje = 'Su orden esta lista para ser despachado al destino elegido.'.'<br>'.'El proceso de entrega de su orden puede tardar 4 dias habiles, contados desde el dia siguiente despues del pago de su factura.';
                                                break;

                                            case '11':
                                                $estado = 'Entregado a la aerolinea';
                                                $mensaje = 'Su paquete esta en transito, actualmente se encuentra procesando por la aerolinea.';
                                                break;

                                            case '12':
                                                $estado = 'Pais destino';
                                                $mensaje = 'Su paquete continua en transito;  se encuentra en el Pais de destino.';
                                                break;

                                            case '13':
                                                $estado = 'Proceso de Aduanas';
                                                $mensaje = 'Su paquete esta en transito, ingreso a proceso de Aduanas, esto puede tardar de 1 a 2 dias.';

                                                break;

                                            case '14':
                                                $estado = 'Liberacion de Aduanas';
                                                $mensaje = 'Su paquete esta en transito, fue liberado de aduanas sin ninguna novedad.';

                                                break;

                                            case '15':
                                                $estado = 'Procesando para entrega local';
                                                $mensaje = 'Su paquete esta en transito, se encuentra en nuestra bodega Bogota y esta en proceso para ser entregado a la trasnportadora terrestre local.';
                                                break;

                                            default:
                                                $estado = 'En Bodega';
                                                break;
                                        }
                                        echo $estado;
                                        ?>
                                    </td>
                                    <td><?php echo $orden->fecha; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
              </div>
            </div>
    
    
    <?php
    }
    //echo $or; die();
    if($or){
    $ordenes = Ordenes::model()->findAll($or);
    ?>
            
    <div class="panel panel-default">
        <div class="panel-heading">Resultados Encontrados de sus Subclientes</div>
        <div class="panel-body">
              <table style=" width: 100%;" id="example2" class="table table-hover" cellspacing="0">
                  <thead>
                      <tr>
                          <td>ID Orden</td> 
                          <td>Subcliente</td>
                          <td>Orden</td>
                          <td>Peso</td>
                          <td>Número de Guía</td> 
                          <td>Tracking</td> 
                          <td>Estatus</td>
                          <td>Fecha de Registro</td>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      foreach ($ordenes as $orden){
                          ?>
                          <tr>
                                <td><?php echo $orden->id_orden; ?></td>
                              
                                <td>
                                    <?php 
                                    $cliente = Clientes::model()->find("code_cliente ='".$orden->code_cliente."'");
                                    echo $cliente->nombre; 
                                    ?>
                                </td>
                                  <td><?php echo $orden->ware_reciept; ?></td>
                                  <td><?php echo $orden->peso; ?></td>
                                <td><?php echo $orden->numero_guia; ?></td>
                                <td><?php echo $orden->tracking; ?></td>
                                <td>
                                    <?php

                                    switch ($orden->estatus_manifiesto) {
                                        case '10':
                                            $estado = 'Paquete listo para el envio.';
                                            $mensaje = 'Su orden esta lista para ser despachado al destino elegido.'.'<br>'.'El proceso de entrega de su orden puede tardar 4 dias habiles, contados desde el dia siguiente despues del pago de su factura.';
                                            break;

                                        case '11':
                                            $estado = 'Entregado a la aerolinea';
                                            $mensaje = 'Su paquete esta en transito, actualmente se encuentra procesando por la aerolinea.';
                                            break;

                                        case '12':
                                            $estado = 'Pais destino';
                                            $mensaje = 'Su paquete continua en transito;  se encuentra en el Pais de destino.';
                                            break;

                                        case '13':
                                            $estado = 'Proceso de Aduanas';
                                            $mensaje = 'Su paquete esta en transito, ingreso a proceso de Aduanas, esto puede tardar de 1 a 2 dias.';

                                            break;

                                        case '14':
                                            $estado = 'Liberacion de Aduanas';
                                            $mensaje = 'Su paquete esta en transito, fue liberado de aduanas sin ninguna novedad.';

                                            break;

                                        case '15':
                                            $estado = 'Procesando para entrega local';
                                            $mensaje = 'Su paquete esta en transito, se encuentra en nuestra bodega Bogota y esta en proceso para ser entregado a la trasnportadora terrestre local.';
                                            break;

                                        default:
                                            $estado = 'En Bodega';
                                            break;
                                    }
                                    echo $estado;
                                    ?>
                                </td>
                                <td><?php echo $orden->fecha; ?></td>
                          </tr>
                          <?php
                      }
                      ?>
                  </tbody>
              </table>
        </div>
      </div>

    <?php
    }else{
       ?>
        <div class="alert alert-danger">No se poseen registros de sus subclientes</div>
        <?php
    }
}else{
?>
<div class="row">
    <div class="col-xs-6">
      <label class="control-label required" for="Afianzamiento_id_socio">
        Nombre del Cliente:
        <span class="required">*</span>
      </label>
      <?php 
        if($model->idClientes->nombre){
            $socio = $model->idClientes->nombre;
        }
      ?>
      <input id="Cliente_nb_cliente" onblur="vaciar(this.value)" class="span5 ui-autocomplete-input form-control" type="text" name="Cliente_nb_cliente" placeholder="Nombre del cliente" autocomplete="off" value="<?php echo $socio; ?>">
      <?php //echo $form->textFieldGroup($model,'id_socio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
      <?php echo $form->hiddenField($model,'id_cliente',array('type'=>"hidden", 'value'=>$model->idClientes->id_cliente)); ?>
      <br>
  </div>
    <div class="col-xs-6">
        <?php
      if($model->id_cliente_hijo)
        $data =  array();
      else $data = array();
      echo $form->dropDownListGroup($model,'id_cliente_hijo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'findOrdenes(this.value)'),'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'SubClientes:'))); ?>
    </div>

</div>
<div class="row">
    <div class="col-xs-12">
        <div id="ordenes"></div>
    </div>
</div>

<?php 
}

$this->endWidget(); ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-ui-no-conflict.min.js"></script>
<script>
function remove(id) {
  
  if(confirm('¿Realmente esta seguro de eliminar el Subcliente?')) {
    $('#remove'+id).remove();
    $.post("<?php echo Yii::app()->createUrl('clientesSubcliente/eliminarSubcliente') ?>",{ id:id },function(data){
    });
    
  }
  
}

function findOrdenes(id_subcliente){
    $.post("<?php echo Yii::app()->createUrl('clientesSubcliente/ordenes') ?>",{ id_subcliente:id_subcliente },
    function(data){
        $('#ordenes').html(data);
    });
}

    
function vaciar(data){
   if(!data){ 
       $('#ClientesSubcliente_id_cliente').val('');
   }
}    
jQuery('#Cliente_nb_cliente').autocomplete({
  minLength: 3,
  source: function (request, response) {
    $.ajax({
      url: '<?php echo Yii::app()->createUrl('clientes/findJsonCliente') ?>',
      dataType: "json",
      data: {term: request.term},
      success: function (data) {
        if(data){  
            response($.map(data, function (item) {
              return {
                label: 'Código Cliente: ' + item.code_cliente + ', Nombre: ' + item.nombre,
                value: item.code_cliente+'; '+item.nombre,//item.id_socio,
                id: item.id_cliente,
                name: item.nombre,
              }
            }));
        }
    }
    });
  },
  select: function (event, ui) {
    var id_cliente = ui.item.id;
    $('#ClientesSubcliente_id_cliente').val(ui.item.id);
    $.post("<?php echo Yii::app()->createUrl('clientesSubcliente/findSubCliente') ?>",{ id_cliente:id_cliente },function(data){$("#ClientesSubcliente_id_cliente_hijo").html(data);});
    //ClientesSubcliente_id_cliente_hijo
  },
});
</script>