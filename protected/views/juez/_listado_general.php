<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<?php
$id_ronda = $_GET['id_ronda'];
//echo $id_ronda;
//echo "ID: ".$id_copetencia."<br>";
//echo "ID_categoria: ".$id_categoria;

//$participanteTotales = Participante::model()->findAll();
//foreach ($participanteTotales as $participanteTotal){
//    $participante = Participante::model()->findAll('id_copetencia ='.$participanteTotal->id_copetencia." AND id_categoria =".$participanteTotal->id_categoria." AND id_usuario =".$participanteTotal->id_usuario);
//    for($i = 0; $i < count($participante); $i++){
//        Participante::model()->deleteAll('id_participante ='.$id);
//    }
//}

if($id_copetencia){
  $competencia = Competencia::model()->find('id_copetencia ='.$id_copetencia);  
//  $categoria = Categoria::model()->find('id_categoria ='.$id_categoria);


$this->breadcrumbs=array(
	'Djs',
);

$this->menu=array(
array('label'=>'Competences','url'=>array('index')),
//array('label'=>'Category','url'=>array('index')),
//array('label'=>'Group','url'=>array('index')),
//array('label'=>'Competences','url'=>array('index')),
//array('label'=>'Manage Dj','url'=>array('admin')),
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
    var table = $('#example3').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollX": true,
      });
     
    $('#example3 tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } );

} );    
</script>


<span class="ez">
    <?php 
    if($id_ronda == 1){
        $ronda = "Final";
    }
    if($id_ronda == 2){
        $ronda = "Semifinal";
    }
    if($id_ronda == 3){
        $ronda = "Play Off";
    }
    
    echo __('Qualify'); ?> / <?php echo __('Competition'); ?>: <?php echo $competencia->competencia; ?> / <?php echo __($ronda); ?>
    <div class="pull-right "  >
        <a onclick="calificaciones()" data-toggle="modal" data-target="#myModal" class="btn btn-primary">
            <span  onclick="" class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;<?php echo __('My qualifications'); ?>
        </a>
    </div>

</span>
<div class="pd-inner">
   
        <?php
        $categoriaPosicionada = 0;
        foreach ($categorias as $categoria){
            $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND acreditado = 1 AND audio != "audio_defaul.mp3" AND musica_validada = 1 AND reproducida = 0 AND ronda= '.$id_ronda.' ORDER BY orden ASC LIMIT 1');
            
            $countFInal = 0;
            if($inscripciones){
//                 echo $categoria->id_categoria;
                $categoriaPosicionada = $categoria->id_categoria;
                ?>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="alert alert-success">
                            <center>
                                <h5><b><?php
                                $categoriaPosicionadaTexto = $categoria->idCategoria->categoria;
                                echo $categoria->idCategoria->categoria; ?></b></h5>   
                            </center>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php
                $count = 0;
                
                foreach ($inscripciones as $inscripcion){
                    $juezInscripcion = JuezInscripcion::model()->findAll('id_inscripcion ='.$inscripcion->id_inscripcion." AND id_juez =".Yii::app()->user->id_usuario_sistema);
                    $mostrar = 0;
                    if(count($juezInscripcion) == 0){
                     
                    
                    ?>
                    <input type="hidden" id="inscripcion" name="inscripcion" value="<?php echo $inscripcion->id_inscripcion; ?>" />
                    <div class="col-sm-12 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><?php echo $inscripcion->idCategoria->categoria; ?></div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <tr>
                                        <td><center><strong><?php echo __('Inscription'); ?> :</strong><?php echo $inscripcion->id_inscripcion; ?></center></td>
                                    </tr>
                                    <tr>
                                        
                                        <td><center><strong>
                                           <?php echo __('Competitor'); ?>
                                        </strong></center>
                                        </td>
                                    </tr>
                                    <tr>
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
                                                    echo "<center>".__('It has no participant')."</center>";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td style="text-align: center">
                                                <strong>Audio:</strong> <?php echo $inscripcion->audio; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: center"><strong><?php echo __('Qualification items'); ?></strong></td>
                                    </tr>
                                    <?php 
                                    
                                    $itemsCalificaciones = JuezItemCalificacion::model()->findAll('id_juez ='.Yii::app()->user->id_usuario_sistema) ;
                                    $countItems = count($itemsCalificaciones);
                                    $i = 0;
                                    foreach ($itemsCalificaciones as $itemsCalificacion){
                                        
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="row-fluid">
                                                    <!--<div class="span6">-->
                                                    <input type="hidden" id="amount<?php echo $i; ?>" name="amount<?php echo $i; ?>" />
                                                    <input value="<?php echo $itemsCalificacion->idItems->id_item_calificacion; ?>" type="hidden" id="idItemsCalificado<?php echo $i; ?>" name="idItemsCalificado<?php echo $i; ?>" />
                                                    <!--</div>-->
                                                    <div class="pull-right "  >
                                                        <label id="amountLabel<?php echo $i; ?>">0</label>
                                                    </div>
                                                    <br>
                                                    <div class="span6">
                                                        <div id="v-slider<?php echo $i; ?>" style="height:10px;"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php echo $itemsCalificacion->idItems->item_calificacion; ?>
                                            </td>
                                        </tr>
                                    
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                        <tr>
                                            <td>
                                                <center>
                                                    <strong>Mistakes</strong>
                                                </center>
                                                <div class="pull-right "  >
                                                    <input type="hidden" id="ErrorTotalText" value="0">
                                                    <label id="ErrorTotal">0</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center>
                                                <?php
                                                for($e=0; $e < 10; $e++){
                                                    ?>
                                                    <input onclick="errores(<?php echo $e; ?>)" value="1" style="width: 30px; height: 30px; cursor: pointer;" id="error<?php echo $e; ?>" type="checkbox" name="error<?php echo $e; ?>" placeholder="Inline checkboxes">&nbsp;&nbsp;
                                                    <?php
                                                }
                                                ?>
                                                </center>
                                            </td>
                                        </tr>
                                </table>

                                
                
                                
                            </div>
                        </div>
                    </div>
                
                <?php
                $count++;
                //=============//
                }else{
                    ?>
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="alert alert-success">
                                <?php 
                                    $mostrar = 1;
                                    echo __('Waiting for the Dj')."<hr>"; 
                                    echo '<center><button type="button" onClick="location.reload();" class="btn btn-primary">'.__('Update').'</button></center>';
                                    break;
                                ?>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-4">
                            
                        </div>
                    </div>
                    <?php
                }
        //===============//
                }
                ?>
                </div>    
                <?php
                break;
                $countFInal++;
            }
            
        }
           
//        }
//        if($countFInal <= 0){
//            
//        }else{
            if($mostrar != 1){
            ?>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <?php //echo CHtml::link(CHtml::encode(__('Qualify')),array('listadoGeneral','idc'=>$id_copetencia ,'idInscripcion'=>$idInscripcion), array('class' => 'btn btn-default')); ?>
                    <a onclick="calificar()" class="btn btn-default"><?php echo __('Qualify'); ?></a>
                </div>
                
            </div>
            <?php
            }
//        }
    ?>
    
    
</div>
<?php
}else{
    echo "Debe de seleccionar una competencia.";
}
?>
<?php 
/*
for ($i=0; $i<= 20; $i++){ ?>
<pre class="prettyprint linenums">
$("#v-slider<?php echo $i;?>").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui, i=i) {
        var valor = ui.value;
        $("#amount<?php echo $i;?>").val(valor);
        $('#amountLabel<?php echo $i;?>').html(valor);
    }

});
$("#amount<?php echo $i;?>").val($("#v-slider<?php echo $i;?>").slider("value"));
$('#amountLabel<?php echo $i;?>').html($("#v-slider<?php echo $i;?>").slider("value"));
</pre>
<br>
<?php
}
*/



?>



<?php $this->beginWidget(
    'booster.widgets.TbModal',
    array('id' => 'myModal')
); ?>

    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4><?php echo __('My qualifications'); ?></h4>
    </div>

    <div class="modal-body">
        <div id="okRegistro">
            <div class="container-fluid">
                <!--<div id="contenidoTabla"></div>-->
                <?php
//                    $pagos = Pago::model()->findAll(array(
//                                                                'select'=>'id_tipo_pago, id_copetencia',
//                                                                'condition'=>$or
//                                                               ));
                    $calificacionesPromedios = Calificacion::model()->findAll(array(
                                                                'select'=>'id_inscripcion',
                                                                'condition'=>'id_juez ='.Yii::app()->user->id_usuario_sistema.' group by id_inscripcion'
                                                               ));
                    $total = 0;
                    $error = 0;
                    if($calificacionesPromedios){
                        foreach ($calificacionesPromedios as $calificacionesPromedio){
                            $inscripcionesCalificada = Inscripcion::model()->find('id_inscripcion ='.$calificacionesPromedio->id_inscripcion);
                            $total = $total + $inscripcionesCalificada->calificacion_final;
                            $error = $error + $inscripcionesCalificada->error;
                        }
                        $total = $total / count($calificacionesPromedios);
                        $error = $error / count($calificacionesPromedios);
                    }
                    ?> 
                    
                    
                    
                    <?php
                    $calificaciones = Calificacion::model()->findAll('id_juez ='.Yii::app()->user->id_usuario_sistema);    
                    
                    
                ?>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="pull-right "  >
                            <strong>
                                <?php echo __('Category'); ?>:
                            </strong>
                            &nbsp;
                            <?php echo $categoriaPosicionadaTexto; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="pull-right "  >
                            <strong>
                                <?php echo __('Average Calification'); ?>:
                            </strong>
                            &nbsp;
                            <?php echo $total; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="pull-right "  >
                            <strong>
                                <?php echo __('Average errors'); ?>:
                            </strong>
                            &nbsp;
                            <?php echo $error; ?>
                        </div>
                    </div>
                </div>
                <hr>
                <table id="example3"  style=" width: 100%" class="table table-hover">
                    <thead>
                        <tr>
                            <td style=" width: 33%"><center><strong><?php echo __('Participants'); ?></strong></center></td>
                            <td style=" width: 33%"><center><strong><?php echo __('Rating items'); ?></strong></center></td>
                            <td style=" width: 33%"><center><strong><?php echo __('Scores'); ?></strong></center></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        foreach ($calificaciones as $calificacion){
                            
                            if($calificacion->idInscripcion->id_categoria == $categoriaPosicionada){
                            ?>
                            <tr>
                                <td>
                                    <?php 
                                        $participantes = Participante::model()->findAll('id_inscripcion ='.$calificacion->id_inscripcion);
                                        if(count($participantes) != 0){
                                            ?><ul><?php
                                            foreach ($participantes as $participante){
                                                ?><li><?php echo $participante->idUsuario->primer_nombre." ".$participante->idUsuario->primer_apellido; ?></li><?php
                                            }
                                            ?></ul><?php
                                        }else{
                                            echo "0 participantes";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <center><?php echo $calificacion->idItems->item_calificacion; ?></center>
                                </td>
                                <td>
                                    <center><?php  echo $calificacion->rango_max; ?></center>
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
    <div class="modal-footer">

        <?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'id'=>'bt_cancelar',
                'label' => 'Close',
                'url' => '#',
                'htmlOptions' => array('data-dismiss' => 'modal'),
            )
        ); ?>
    </div>
<?php $this->endWidget(); ?>

<div id="v-slider" style="height:200px; display: none;"></div>

<?php
/*for($i=7; $i <= 20; $i++){
    ?>
    <pre class="prettyprint linenums">
        $("#v-slider<?php echo $i; ?>").slider({
            orientation: "horizontal",
            range: "min",
            min: 0,
            max: 10,
            step:0.01,
            value: 0,
            slide: function (event, ui) {
                $("#amount<?php echo $i; ?>").val(ui.value);
                $('#amountLabel<?php echo $i; ?>').html(ui.value);
            }
        });
        $("#amount<?php echo $i; ?>").val($("#v-slider<?php echo $i; ?>").slider("value"));
        $('#amountLabel<?php echo $i; ?>').html($("#v-slider<?php echo $i; ?>").slider("value"));
    </pre>

    <?php
}*/
?>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/images/jquery/assets/js/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/images/jquery/assets/js/demo.js" type="text/javascript"></script>
<script>
    
$("#v-slider0").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount0").val(ui.value);
        $('#amountLabel0').html(ui.value);
    }
});
$("#amount0").val($("#v-slider0").slider("value"));
$('#amountLabel0').html($("#v-slider0").slider("value"));
    
    
$("#v-slider1").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount1").val(ui.value);
        $('#amountLabel1').html(ui.value);
    }
});
$("#amount1").val($("#v-slider1").slider("value"));
$('#amountLabel1').html($("#v-slider1").slider("value"));    
    
$("#v-slider2").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount2").val(ui.value);
        $('#amountLabel2').html(ui.value);
    }
});
$("#amount2").val($("#v-slider2").slider("value"));
$('#amountLabel2').html($("#v-slider2").slider("value"));    
    
    
$("#v-slider3").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount3").val(ui.value);
        $('#amountLabel3').html(ui.value);
    }
});
$("#amount3").val($("#v-slider3").slider("value"));
$('#amountLabel3').html($("#v-slider3").slider("value"));     
       
$("#v-slider4").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount4").val(ui.value);
        $('#amountLabel4').html(ui.value);
    }
});
$("#amount4").val($("#v-slider4").slider("value"));
$('#amountLabel4').html($("#v-slider4").slider("value"));     
    
       
$("#v-slider5").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount5").val(ui.value);
        $('#amountLabel5').html(ui.value);
    }
});
$("#amount5").val($("#v-slider5").slider("value"));
$('#amountLabel5').html($("#v-slider5").slider("value")); 

$("#v-slider6").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount6").val(ui.value);
        $('#amountLabel6').html(ui.value);
    }
});
$("#amount6").val($("#v-slider6").slider("value"));
$('#amountLabel6').html($("#v-slider6").slider("value"));     
    
$("#v-slider7").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount7").val(ui.value);
        $('#amountLabel7').html(ui.value);
    }
});
$("#amount7").val($("#v-slider7").slider("value"));
$('#amountLabel7').html($("#v-slider7").slider("value"));


$("#v-slider8").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount8").val(ui.value);
        $('#amountLabel8').html(ui.value);
    }
});
$("#amount8").val($("#v-slider8").slider("value"));
$('#amountLabel8').html($("#v-slider8").slider("value"));


$("#v-slider9").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount9").val(ui.value);
        $('#amountLabel9').html(ui.value);
    }
});
$("#amount9").val($("#v-slider9").slider("value"));
$('#amountLabel9').html($("#v-slider9").slider("value"));


$("#v-slider10").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount10").val(ui.value);
        $('#amountLabel10').html(ui.value);
    }
});
$("#amount10").val($("#v-slider10").slider("value"));
$('#amountLabel10').html($("#v-slider10").slider("value"));


$("#v-slider11").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount11").val(ui.value);
        $('#amountLabel11').html(ui.value);
    }
});
$("#amount11").val($("#v-slider11").slider("value"));
$('#amountLabel11').html($("#v-slider11").slider("value"));


$("#v-slider12").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount12").val(ui.value);
        $('#amountLabel12').html(ui.value);
    }
});
$("#amount12").val($("#v-slider12").slider("value"));
$('#amountLabel12').html($("#v-slider12").slider("value"));


$("#v-slider13").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount13").val(ui.value);
        $('#amountLabel13').html(ui.value);
    }
});
$("#amount13").val($("#v-slider13").slider("value"));
$('#amountLabel13').html($("#v-slider13").slider("value"));


$("#v-slider14").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount14").val(ui.value);
        $('#amountLabel14').html(ui.value);
    }
});
$("#amount14").val($("#v-slider14").slider("value"));
$('#amountLabel14').html($("#v-slider14").slider("value"));


$("#v-slider15").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount15").val(ui.value);
        $('#amountLabel15').html(ui.value);
    }
});
$("#amount15").val($("#v-slider15").slider("value"));
$('#amountLabel15').html($("#v-slider15").slider("value"));


$("#v-slider16").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount16").val(ui.value);
        $('#amountLabel16').html(ui.value);
    }
});
$("#amount16").val($("#v-slider16").slider("value"));
$('#amountLabel16').html($("#v-slider16").slider("value"));


$("#v-slider17").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount17").val(ui.value);
        $('#amountLabel17').html(ui.value);
    }
});
$("#amount17").val($("#v-slider17").slider("value"));
$('#amountLabel17').html($("#v-slider17").slider("value"));


$("#v-slider18").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount18").val(ui.value);
        $('#amountLabel18').html(ui.value);
    }
});
$("#amount18").val($("#v-slider18").slider("value"));
$('#amountLabel18').html($("#v-slider18").slider("value"));


$("#v-slider19").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount19").val(ui.value);
        $('#amountLabel19').html(ui.value);
    }
});
$("#amount19").val($("#v-slider19").slider("value"));
$('#amountLabel19').html($("#v-slider19").slider("value"));


$("#v-slider20").slider({
    orientation: "horizontal",
    range: "min",
    min: 0,
    max: 10,
    step:0.01,
    value: 0,
    slide: function (event, ui) {
        $("#amount20").val(ui.value);
        $('#amountLabel20').html(ui.value);
    }
});
$("#amount20").val($("#v-slider20").slider("value"));
$('#amountLabel20').html($("#v-slider20").slider("value"));

//$("#v-slider0").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount0").val(valor);
//        $('#amountLabel0').html(valor);
//    }
//
//});
//$("#amount0").val($("#v-slider0").slider("value"));
//$('#amountLabel0').html($("#v-slider0").slider("value"));



//
//
//$("#v-slider1").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount1").val(valor);
//        $('#amountLabel1').html(valor);
//    }
//
//});
//$("#amount1").val($("#v-slider1").slider("value"));
//$('#amountLabel1').html($("#v-slider1").slider("value"));
//
//
//$("#v-slider2").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount2").val(valor);
//        $('#amountLabel2').html(valor);
//    }
//
//});
//$("#amount2").val($("#v-slider2").slider("value"));
//$('#amountLabel2').html($("#v-slider2").slider("value"));
//
//
//$("#v-slider3").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount3").val(valor);
//        $('#amountLabel3').html(valor);
//    }
//
//});
//$("#amount3").val($("#v-slider3").slider("value"));
//$('#amountLabel3').html($("#v-slider3").slider("value"));
//
//
//$("#v-slider4").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount4").val(valor);
//        $('#amountLabel4').html(valor);
//    }
//
//});
//$("#amount4").val($("#v-slider4").slider("value"));
//$('#amountLabel4').html($("#v-slider4").slider("value"));
//
//
//$("#v-slider5").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount5").val(valor);
//        $('#amountLabel5').html(valor);
//    }
//
//});
//$("#amount5").val($("#v-slider5").slider("value"));
//$('#amountLabel5').html($("#v-slider5").slider("value"));
//
//
//$("#v-slider6").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount6").val(valor);
//        $('#amountLabel6').html(valor);
//    }
//
//});
//$("#amount6").val($("#v-slider6").slider("value"));
//$('#amountLabel6').html($("#v-slider6").slider("value"));
//
//
//$("#v-slider7").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount7").val(valor);
//        $('#amountLabel7').html(valor);
//    }
//
//});
//$("#amount7").val($("#v-slider7").slider("value"));
//$('#amountLabel7').html($("#v-slider7").slider("value"));
//
//
//$("#v-slider8").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount8").val(valor);
//        $('#amountLabel8').html(valor);
//    }
//
//});
//$("#amount8").val($("#v-slider8").slider("value"));
//$('#amountLabel8').html($("#v-slider8").slider("value"));
//
//
//$("#v-slider9").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount9").val(valor);
//        $('#amountLabel9').html(valor);
//    }
//
//});
//$("#amount9").val($("#v-slider9").slider("value"));
//$('#amountLabel9').html($("#v-slider9").slider("value"));
//
//
//$("#v-slider10").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount10").val(valor);
//        $('#amountLabel10').html(valor);
//    }
//
//});
//$("#amount10").val($("#v-slider10").slider("value"));
//$('#amountLabel10').html($("#v-slider10").slider("value"));
//
//
//$("#v-slider11").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount11").val(valor);
//        $('#amountLabel11').html(valor);
//    }
//
//});
//$("#amount11").val($("#v-slider11").slider("value"));
//$('#amountLabel11').html($("#v-slider11").slider("value"));
//
//
//$("#v-slider12").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount12").val(valor);
//        $('#amountLabel12').html(valor);
//    }
//
//});
//$("#amount12").val($("#v-slider12").slider("value"));
//$('#amountLabel12').html($("#v-slider12").slider("value"));
//
//
//$("#v-slider13").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount13").val(valor);
//        $('#amountLabel13').html(valor);
//    }
//
//});
//$("#amount13").val($("#v-slider13").slider("value"));
//$('#amountLabel13').html($("#v-slider13").slider("value"));
//
//
//$("#v-slider14").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount14").val(valor);
//        $('#amountLabel14').html(valor);
//    }
//
//});
//$("#amount14").val($("#v-slider14").slider("value"));
//$('#amountLabel14').html($("#v-slider14").slider("value"));
//
//
//$("#v-slider15").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount15").val(valor);
//        $('#amountLabel15').html(valor);
//    }
//
//});
//$("#amount15").val($("#v-slider15").slider("value"));
//$('#amountLabel15').html($("#v-slider15").slider("value"));
//
//
//$("#v-slider16").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount16").val(valor);
//        $('#amountLabel16').html(valor);
//    }
//
//});
//$("#amount16").val($("#v-slider16").slider("value"));
//$('#amountLabel16').html($("#v-slider16").slider("value"));
//
//
//$("#v-slider17").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount17").val(valor);
//        $('#amountLabel17').html(valor);
//    }
//
//});
//$("#amount17").val($("#v-slider17").slider("value"));
//$('#amountLabel17').html($("#v-slider17").slider("value"));
//
//
//$("#v-slider18").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount18").val(valor);
//        $('#amountLabel18').html(valor);
//    }
//
//});
//$("#amount18").val($("#v-slider18").slider("value"));
//$('#amountLabel18').html($("#v-slider18").slider("value"));
//
//
//$("#v-slider19").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount19").val(valor);
//        $('#amountLabel19').html(valor);
//    }
//
//});
//$("#amount19").val($("#v-slider19").slider("value"));
//$('#amountLabel19').html($("#v-slider19").slider("value"));
//
//
//$("#v-slider20").slider({
//    orientation: "horizontal",
//    range: "min",
//    min: 0,
//    max: 10,
//    step:0.01,
//    value: 0,
//    slide: function (event, ui, i=i) {
//        var valor = ui.value;
//        $("#amount20").val(valor);
//        $('#amountLabel20').html(valor);
//    }
//
//});
//$("#amount20").val($("#v-slider20").slider("value"));
//$('#amountLabel20').html($("#v-slider20").slider("value"));
//


    
function calificaciones(){
    $.post("<?php echo Yii::app()->createUrl('juez/calificacionPersonal') ?>",{ 
       
    },
    function(data){
        $('#contenidoTabla').html(data);
    });
}    
    
    
function errores(id){
    var existente = $('#ErrorTotalText').val();
    var error = document.getElementById("error"+id).checked;
    
    if(error){
        error = 1;
        existente = parseInt(existente) + parseInt(error);
    }else{
        error = 1;
        existente = parseInt(existente) - parseInt(error);
    }
     
    
    $('#ErrorTotalText').val(existente);
    $('#ErrorTotal').html(existente);
}    
    
    
function calificar(){
    
    
    
    var inscripcion = $('#inscripcion').val();
    
    var itemsCalificacion0 = $('#idItemsCalificado0').val();
    var itemsCalificacion1 = $('#idItemsCalificado1').val();
    var itemsCalificacion2 = $('#idItemsCalificado2').val();
    var itemsCalificacion3 = $('#idItemsCalificado3').val();
    var itemsCalificacion4 = $('#idItemsCalificado4').val();
    var itemsCalificacion5 = $('#idItemsCalificado5').val();
    var itemsCalificacion6 = $('#idItemsCalificado6').val();
    var itemsCalificacion7 = $('#idItemsCalificado7').val();
    var itemsCalificacion8 = $('#idItemsCalificado8').val();
    var itemsCalificacion9 = $('#idItemsCalificado9').val();
    var itemsCalificacion10 = $('#idItemsCalificado10').val();
    var itemsCalificacion11 = $('#idItemsCalificado11').val();
    var itemsCalificacion12 = $('#idItemsCalificado12').val();
    var itemsCalificacion13 = $('#idItemsCalificado13').val();
    var itemsCalificacion14 = $('#idItemsCalificado14').val();
    var itemsCalificacion15 = $('#idItemsCalificado15').val();
    var itemsCalificacion16 = $('#idItemsCalificado16').val();
    var itemsCalificacion17 = $('#idItemsCalificado17').val();
    var itemsCalificacion18 = $('#idItemsCalificado18').val();
    var itemsCalificacion19 = $('#idItemsCalificado19').val();
    var itemsCalificacion20 = $('#idItemsCalificado20').val();
    
    var amount0 = $("#amount0").val();
    var amount1 = $("#amount1").val();
    var amount2 = $("#amount2").val();
    var amount3 = $("#amount3").val();
    var amount4 = $("#amount4").val();
    var amount5 = $("#amount5").val();
    var amount6 = $("#amount6").val();
    var amount7 = $("#amount7").val();
    var amount8 = $("#amount8").val();
    var amount9 = $("#amount9").val();
    var amount10 = $("#amount10").val();
    var amount11 = $("#amount11").val();
    var amount12 = $("#amount12").val();
    var amount13 = $("#amount13").val();
    var amount14 = $("#amount14").val();
    var amount15 = $("#amount15").val();
    var amount16 = $("#amount16").val();
    var amount17 = $("#amount17").val();
    var amount18 = $("#amount18").val();
    var amount19 = $("#amount19").val();
    var amount20 = $("#amount20").val();
    
    var error0 = document.getElementById("error0").checked;
    var error1 = document.getElementById("error1").checked;
    var error2 = document.getElementById("error2").checked;
    var error3 = document.getElementById("error3").checked;
    var error4 = document.getElementById("error4").checked;
    var error5 = document.getElementById("error5").checked;
    var error6 = document.getElementById("error6").checked;
    var error7 = document.getElementById("error7").checked;
    var error8 = document.getElementById("error8").checked;
    var error9 = document.getElementById("error9").checked;
    
    
    if(error0){
        error0 = 1;
    }else{
        
    }
    if(error1){
        error1 = 1;
    }else{
        
    }
    if(error2){
        error2 = 1;
    }else{
        
    }
    if(error3){
        error3 = 1;
    }else{
        
    }
    if(error4){
        error4 = 1;
    }else{
        
    }
    if(error5){
        error5 = 1;
    }else{
        
    }
    if(error6){
        error6 = 1;
    }else{
        
    }
    if(error7){
        error7 = 1;
    }else{
        
    }
    if(error8){
        error8 = 1;
    }else{
        
    }
    if(error9){
        error9 = 1;
    }else{
        
    }
    
    
    $.post("<?php echo Yii::app()->createUrl('juez/calificacionInscripcion') ?>",{ 
        inscripcion:inscripcion,
        itemsCalificacion0:itemsCalificacion0,
        itemsCalificacion1:itemsCalificacion1,
        itemsCalificacion2:itemsCalificacion2,
        itemsCalificacion3:itemsCalificacion3,
        itemsCalificacion4:itemsCalificacion4,
        itemsCalificacion5:itemsCalificacion5,
        itemsCalificacion6:itemsCalificacion6,
        itemsCalificacion7:itemsCalificacion7,
        itemsCalificacion8:itemsCalificacion8,
        itemsCalificacion9:itemsCalificacion9,
        itemsCalificacion10:itemsCalificacion10,
        itemsCalificacion11:itemsCalificacion11,
        itemsCalificacion12:itemsCalificacion12,
        itemsCalificacion13:itemsCalificacion13,
        itemsCalificacion14:itemsCalificacion14,
        itemsCalificacion15:itemsCalificacion15,
        itemsCalificacion16:itemsCalificacion16,
        itemsCalificacion17:itemsCalificacion17,
        itemsCalificacion18:itemsCalificacion18,
        itemsCalificacion19:itemsCalificacion19,
        itemsCalificacion20:itemsCalificacion20,
        amount0:amount0,
        amount1:amount1,
        amount2:amount2,
        amount3:amount3,
        amount4:amount4,
        amount5:amount5,
        amount6:amount6,
        amount7:amount7,
        amount8:amount8,
        amount9:amount9,
        amount10:amount10,
        amount11:amount11,
        amount12:amount12,
        amount13:amount13,
        amount14:amount14,
        amount15:amount15,
        amount16:amount16,
        amount17:amount17,
        amount18:amount18,
        amount19:amount19,
        amount20:amount20,
        error0:error0,
        error1:error1,
        error2:error2,
        error3:error3,
        error4:error4,
        error5:error5,
        error6:error6,
        error7:error7,
        error8:error8,
        error9:error9,
    }).done(function(data) {
        location.reload();
        //location.href = 'listadoGeneral?idc=47';
    });
//    location.href = 'listadoGeneral?idc=47';
}    
    
    
    
</script>
<script>
function soloNumeros(e)
{
    var key = window.Event ? e.which : e.keyCode
    return ((key >= 48 && key <= 57) || (key==8))
}      
    
//function guardarOrden(id){
//    
//    var valor = $('#ordenCategoria'+id).val();
//    var mensaje;
//    var opcion = confirm("¿Realmente desea almacenar el orden indicado?");
//    if(valor != ""){
////        alert(valor+' / '+id);
//        if (opcion == true) {
//            $.post("<?php echo Yii::app()->createUrl('inscripcion/Orden') ?>",{ id:id, valor:valor },
//            function(data){
//                location.reload();
//            });
//        } 
//    
//    }
//    
//}    

function guardarOrden(id, validado ,todo, id_copetencia, id_categoria ){
    
    var valor = $('#ordenCategoria'+id).val();
    var mensaje;
    var opcion = confirm("¿Realmente desea validar el orden indicado?");
    if(valor != ""){
//        alert(valor+' / '+id);
        if (opcion == true) {
            $.post("<?php echo Yii::app()->createUrl('inscripcion/OrdenValidado') ?>",{ id:id, valor:valor, validado:validado, todo:todo, id_copetencia:id_copetencia, id_categoria:id_categoria },
            function(data){
//                location.reload();
            });
        } 
    
    }
    
}
</script>