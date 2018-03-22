<?php  ?>

<!--<input type="text" id="contenidoSelect" >-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.multi-select.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->



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
<span class="ez">Mis Consolidaciones</span>
<div class="pd-inner">
   <?php 
   
   function ultimaMilla($ultimaMilla){
       $row['ultima_milla'] = $ultimaMilla;
       if ($row['ultima_milla'] != '') {
            if (substr($row['ultima_milla'], 0, 4 ) == "5336" Or substr($row['ultima_milla'], 0, 4 ) == "7701" Or substr($row['ultima_milla'], 0, 4 ) == "7757" Or substr($row['ultima_milla'], 0, 4 ) == "7759" Or substr($row['ultima_milla'], 0, 4 ) == "7758") {
           				
                $url = "http://tracking.telocomproenusa.com/millacoordinadora.php?milla=".$row['ultima_milla'];

                        echo "<a href='".$url
                        ."' target='_blank'> <button type='button' class='btn btn-success'>Rastrear Guía</button></a>";
                        }else  if (substr($row['ultima_milla'], 0, 4 ) == "7000" Or substr($row['ultima_milla'], 0, 4 ) == "0008") {

                $url = "http://solex.blulogistics.net/solex/Home/GuiaRastreo?Numero=".$row['ultima_milla']."&app=";

                echo "<a href='".$url
                                ."' target='_blank'> <button type='button' class='btn btn-success'>Rastrear Guía</button></a>";

                }else{
                    echo "ENTREGADO A LA TRANSPORTADORA";
                }
       }
   }
   
   
   function estatusManifiesto($estatus_manifiesto){
       $row['estatus_manifiesto'] = $estatus_manifiesto;
       if($row['estatus_manifiesto'] == 10){
        echo "<img src='".Yii::app()->request->baseUrl."/images/pto_azul.png' border='0' />&nbsp;Paquete listo para el env&iacute;o" ;
       }elseif($row['estatus_manifiesto'] == 11){
        echo "<img src='".Yii::app()->request->baseUrl."/images/pto_amarillo.png' border='0' />&nbsp;Entregado a la aerolínea ";
       }elseif($row['estatus_manifiesto']== 12){
        echo "<img src='".Yii::app()->request->baseUrl."/images/pto_naranja.png' border='0' />&nbsp;Pa&iacute;s destino";
       }elseif($row['estatus_manifiesto'] == 13){
        echo "<img src='".Yii::app()->request->baseUrl."/images/pto_viola.png' border='0' />&nbsp;Proceso de aduana";
       }elseif($row['estatus_manifiesto'] == 14){
        echo "<img src='".Yii::app()->request->baseUrl."/images/pto_verde.png' border='0' />&nbsp;Liberaci&oacute;n de aduanas";
       }elseif($row['estatus_manifiesto'] == 15){
        echo "<img src='".Yii::app()->request->baseUrl."/images/pto_verde.png' border='0' />&nbsp;Procesando para entrega local";
       }
   }
   function historial($orden){
       ?>
        <button onclick="historial(<?php echo "'".$orden."'"; ?>)" class="btn btn-info btn_historial" value="CO1421-1234104047" data-target="#historialModal" data-toggle="modal" type="button">Ver historial</button>
       <?php
   }
   
   function accion($instrucciones){
        $row['instrucciones'] = $instrucciones;
       
        if ($row['instrucciones']==0) {
            echo "<button onclick='instruccion(".$instrucciones.")' type='button' class='btn btn-primary' data-toggle='modal' data-target='#instruccionModal'>Enviar instrucciones</button>";
        }elseif ($row['instrucciones']==5) {
            echo "Instrucciones enviadas <span class='glyphicon glyphicon-envelope'></span>";
        }elseif ($row['instrucciones']==2) {
            echo "Instrucciones recibidas <span class='glyphicon glyphicon-ok'></span>";
        }
       
   }
    $this->widget('booster.widgets.TbGridView',array(
    'id'=>'ordenes-grid',
    'dataProvider'=>$model->searchPersonal($correo),
    'filter'=>$model,
    'columns'=>array(
            'fecha',
            'ware_reciept',
//            'ultima_milla',
            array(
                'header'=>'Ultima Milla',
                'name'=>'ultima_milla',
                'filter'=>False,
                'value'=>'ultimaMilla($data->ultima_milla)',
            ),
            array(
                'header'=>'Estatus del Manifiesto',
                'name'=>'code_cliente',
                'filter'=>False,
                'value'=>'estatusManifiesto($data->estatus_manifiesto)',
            ),
            array(
                'header'=>'Historial',
                'name'=>'code_cliente',
                'filter'=>False,
                'value'=>'historial($data->ware_reciept)',
            ),
            array(
                'header'=>'Acción',
                'name'=>'code_cliente',
                'filter'=>False,
                'value'=>'accion($data->instrucciones)',
            ),
        ),
    )); 
    ?>
</div>

<?php $this->beginWidget('booster.widgets.TbModal', array('id'=>'historialModal')) ?>
    <div class="modal-header">
      <a class="close" data-dismiss="modal">&times;</a>
      <h4>Historial de Orden: </h4>
    </div>

    <div class="modal-body ">
        <div id="respuestaUsuario"></div>
        <div id="contenidoModal" style="display: block;">
            <div id="" class="container-fluid historial"></div>
        </div>
    </div>
    
    <div class="modal-footer">
      <?php $this->widget('booster.widgets.TbButton', array(
        'context'=>'default',
        'label'=>'Cancelar',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal')
      ));?>
    </div>
<?php $this->endWidget(); ?>




<?php $this->beginWidget('booster.widgets.TbModal', array('id'=>'instruccionModal')) ?>
    
    <div class="modal-header">
      <a class="close" data-dismiss="modal">&times;</a>
      <h4>Instrucción: </h4>
    </div>

    <div class="modal-body ">
        <div id="respuestaUsuario"></div>
        <div id="contenidoModal" style="display: block;">
            <div id="" class="container-fluid">
                <div id="formularioInstruccion">
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        
        <button type='submit' class='btn btn-primary'>Enviar Instrucción</button>
        <!--</form>-->
        <?php $this->widget('booster.widgets.TbButton', array(
          'context'=>'default',
          'label'=>'Cancelar',
          'url'=>'#',
          'htmlOptions'=>array('data-dismiss'=>'modal')
        ));?>
    </div>
    
<?php $this->endWidget(); ?>


<?php  ?>

<script>
$(document).ready(function(){
//    $('#orders').DataTable({ 
//
//    	"order": [[ 0, "desc" ]],
//        
//});
//    $('#consol').DataTable({
//
//    }
//
//    	);

     // $('#example').DataTable();

//    var codigos=<?php // echo json_encode($codigos); ?>
//
//    for (var i = 0; i < codigos.length ; i++) {
//    	$('.codigos').append('<option value='+codigos[i]+'>'+codigos[i]+'</option>');
//    }

    $('.close_modal').click(function(){
    	$(".all_order").prop('checked', false);
    	$(".order").prop('checked', false);

    });

    $(".codigos").multiSelect({
	  selectableHeader: "<div>Paquetes en lista</div>",
	  selectionHeader: "<div>Paquetes a enviar</div>",

	});


    $('.all_order').click(function(){ //seleccionar todos los paquetes
	    if ($(this).is(':checked')) {
	        $('.codigos').multiSelect('select_all');
   		}else{
	        $('.codigos').multiSelect('deselect_all');
   		}

    });


    $('.all_order').click(function(){ //seleccionar todos los paquetes
	    if ($(this).is(':checked')) {
	        $('.codigos').multiSelect('select_all');
   		}else{
	        $('.codigos').multiSelect('deselect_all');
   		}

    });
   });       
    
function historial(orden){
    $.post("https://telocomproenusa.com/tracking/rastreo_ordenes_casillero.php",{ orden:orden }).done(function( data ) {
        $('.historial').html(data);
     });
}          
    
function instruccion(orden){
 






 
    $.post("<?php echo Yii::app()->createUrl('usuario/instruccionFormulario') ?>",{ orden:orden }).done(function( data ) {
        
//        var content = JSON.parse(data);
//        alert(content);
//        $('#contenidoSelect').val(data);
        $('#formularioInstruccion').html(data);
        
        
//        var test = $('#group_id_list34');
////        var contenidoSelect = $('#contenidoSelect').val();
//    //    alert(contenidoSelect);
//        var data2 = $(test).select2('data');
//        var stringCompleto = JSON.stringify(data);
//        var contenido = JSON.parse(data);
//        
//        
//        alert(contenido.Error);
////        contenidoSelect = String(contenidoSelect);
//        data2.push('{\"id\":\"5\",\"text\":\"Armando\"}');
//        $(test).select2("data", data2, true);
        
        
     }).done(function() {
         
         //llenar();
     });
     
    
     
}    
function replacer(key, value) {
  // Filtrando propiedades 
  if (typeof value === "%\%") {
    return undefined;
  }
  return value;
}
function llenar(){
    
}
</script>