<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<?php
//echo "ID: ".$id_copetencia."<br>";
//echo "ID_categoria: ".$id_categoria;

//$participanteTotales = Participante::model()->findAll();
//foreach ($participanteTotales as $participanteTotal){
//    $participante = Participante::model()->findAll('id_copetencia ='.$participanteTotal->id_copetencia." AND id_categoria =".$participanteTotal->id_categoria." AND id_usuario =".$participanteTotal->id_usuario);
//    for($i = 0; $i < count($participante); $i++){
//        Participante::model()->deleteAll('id_participante ='.$id);
//    }
//}

if($id_copetencia && $id_categoria){
  $competencia = Competencia::model()->find('id_copetencia ='.$id_copetencia);  
  $categoria = Categoria::model()->find('id_categoria ='.$id_categoria);


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
<span class="ez"><?php echo __('Franchisee: Competition').": ".$competencia->competencia." / ".__('Category: ').$categoria->categoria; ?>
    <div class="pull-right "  >
        <a class="btn btn-default" href="javascript:window.history.go(-1);">
            <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;&nbsp;<?php echo __('To return'); ?>
        </a>
    </div>
</span>

<div class="pd-inner">
    <?php
    $franquiciados = Franquiciado::model()->findAll('id_usuario_sistema ='.Yii::app()->user->id_usuario_sistema);
    ?>
    
    
    
    
    <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo __('Results table: Inscriptions Categories'); ?></div>
                    <div class="panel-body">

                        <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr style=" background-color: #ccc;">
                                    <td><center><?php echo __('Competition'); ?></center></td>
                                    <td><center><?php echo __('Items'); ?></center></td>
                                    <td><center><?php echo __('Categories'); ?></center></td>
                                    <td><center><?php echo __('# Inscriptions Categories'); ?></center></td>
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
                                $i = 0;
                                $or = "";
                                foreach ($franquiciados as $franquiciado){
                                    if($i == 0){
                                        $or = " AND id_copetencia = ".$franquiciado->id_competencia;
                                    }else{
                                        $or .= " OR id_copetencia = ".$franquiciado->id_competencia;
                                    }
                                    ?>
                                <tr>
                                    <td><center><?php echo $franquiciado->idCompetencia->competencia;?></center></td>
                                    <td><center><?php echo __('Inscriptions Categories'); ?></center></td>
                                    <td><center><?php echo $categoria->categoria; ?></center></td>
                                    <td>
                                        <center>
                                            <?php
                                            
                                            $inscripcionesCategoria = Inscripcion::model()->findAll('id_copetencia ='.$franquiciado->id_competencia.' AND id_categoria ='.$categoria->id_categoria);
//
//
//                                            //$pagosPase = Pago::model()->findAll('id_copetencia ='.$franquiciado->id_competencia.' AND id_tipo_pago = 2 AND id_pago_estatus = 2');
//                                            $totalPase += count($inscripcionesCategoria);
//                                            echo count($inscripcionesCategoria);
                                            ?>
                                            <?php
                                                $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria);
                                                //AND id_tipo_pago = 2 AND id_pago_estatus = 2
                                                $varPago = 0;
                                                foreach ($inscripciones as $inscripcion){
                                                    $pago = Pago::model()->find('id_inscripcion ='.$inscripcion->id_inscripcion.' AND id_tipo_pago = 2 AND id_pago_estatus = 2');
                                                    $varPago = $varPago + count($pago);
//                                                    $valor += $pago->costo_pagar;
                                                }
                                                 $totalPase += $varPago;
                                                echo $varPago;
                                            ?>

                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php
//                                            $pagosPases = Pago::model()->findAll('id_copetencia ='.$franquiciado->id_competencia.' AND id_tipo_pago = 2 AND id_pago_estatus = 2');
//                                            $valor =0;
//                                            foreach ($pagosPases as $pagoPase){
//                                                $valor += $pagoPase->costo_pagar;
//                                            }
//                                            $totalValor += $valor;
//                                            echo $valor;
                                            ?>
                                            <?php 
                                                $valor = 0;
                                                foreach ($inscripcionesCategoria as $inscripcion){
                                                    $pago = Pago::model()->find('id_inscripcion ='.$inscripcion->id_inscripcion. ' AND id_tipo_pago = 2 AND id_pago_estatus = 2');
                                                    $valor += $pago->costo_pagar;
                                                }
                                                $totalValor += $valor;
//                                                echo $valor;
                                                echo number_format($valor, 2, '.', ',');
                                            ?>
                                        </center>
                                    </td>
                                    <td><center><?php 
//                                    echo $franquiciado->porcentaje; 
                                    echo number_format($franquiciado->porcentaje, 2, '.', ',');
                                    $totalPorcentaje += $franquiciado->porcentaje;?></center></td>
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
                                    $i++;
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3"><center><?php echo __('Total'); ?></center></td>
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
                <div class="panel-heading">Listado de Inscripciones</div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="table table-hover" cellspacing="0">
                            <thead>
                                <tr>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Competition'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Block'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Categories'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Group name'); ?></strong></center></td>
                                    <td style=" width: 40%;"><center><strong><?php echo __('Participants'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Audio'); ?></strong></center></td>
                                    <!--<td style=" width: 10%;"><center><strong><?php echo __('Action'); ?></strong></center></td>-->
                                    <td><center><strong><?php echo __('Paid value'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Win Service Charge'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Total to pay'); ?></strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria);
                                foreach ($inscripciones as $inscripcion){
//                                    $inscripcioness = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria);
//                                    $countInscripcion = 0;
////                                    foreach ($inscripcioness as $inscripcionn){
////                                        $pagoss = Pago::model()->findAll('id_inscripcion ='.$inscripcionn->id_inscripcion.' AND id_tipo_pago = 2 AND id_pago_estatus = 2');
////                                        if(count($pagoss) != 0){
////                                            $countInscripcion++;
////                                        }
////                                    }
//                                    $varPago = 0;
//                                    foreach ($inscripcioness as $inscripcionn){
//                                        $pago = Pago::model()->find('id_inscripcion ='.$inscripcionn->id_inscripcion.' AND id_tipo_pago = 2 AND id_pago_estatus = 2');
//                                        $varPago = $varPago + count($pago);
////                                                    $valor += $pago->costo_pagar;
//                                    }
                                    $pago = Pago::model()->find('id_inscripcion ='.$inscripcion->id_inscripcion.' AND id_pago_estatus = 2');
                                    if($pago->costo_pagar){


                                    ?>
                                     <tr>       
                                        <td><?php echo $inscripcion->idCopetencia->competencia; ?></td>
                                        <td><?php echo $inscripcion->idCategoria->idBloque->bloque; ?></td>
                                        <td><?php echo $inscripcion->idCategoria->categoria; ?></td>
                                        <td>
                                            <?php 
                                                if($inscripcion->grupo){
                                                    echo $inscripcion->grupo;
                                                }else{
                                                    echo $inscripcion->idCategoria->idTipoCategoria->tipo;
                                                }
                                            ?>
                                        </td>
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
                                                    echo "<center>0 participantes</center>";
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $inscripcion->audio; ?></td>
                                        <td>
                                            <center>
                                            <?php 
                                                $valor = 0;
//                                                foreach ($inscripciones as $inscripcion){
                                                    $pago = Pago::model()->find('id_inscripcion ='.$inscripcion->id_inscripcion.' AND id_pago_estatus = 2');
                                                    $valor += $pago->costo_pagar;
//                                                }
//                                                echo $valor;
                                                echo number_format($valor, 2, '.', ',');
                                            ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                            <?php 
                                                $porcentaje = 0;
                                                $PorcentajeFranquiciado = Franquiciado::model()->find('id_competencia ='.$competencia->id_copetencia.' AND id_usuario_sistema ='.Yii::app()->user->id_usuario_sistema);  
//                                                echo $PorcentajeFranquiciado->porcentaje;
                                                echo number_format($PorcentajeFranquiciado->porcentaje, 2, '.', ',');
                                                $porcentaje = $PorcentajeFranquiciado->porcentaje;
                                            ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                            <?php 
                                                $calculo =0;
                                                $calculo = ($valor * $porcentaje)/100;
//                                                echo $valor - $calculo; 
                                                echo number_format($valor - $calculo, 2, '.', ',');
                                            ?>
                                            </center>
                                        </td>
                                        
                                        
                                        
<!--                                        <td>
                                            <center>
                                            <?php // if($inscripcion->audio != "audio_defaul.mp3"){ ?> 
                                                <a href="">
                                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                                </a>
                                            <?php // } ?>    
                                            </center>
                                        </td>-->
                                        
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
        </div>
    </div>
    
</div>
<?php
}else{
    echo "Debe de seleccionar una competencia.";
}
?>

<script>
function validar(inscripcion, accion){

    var mensaje;
    if(accion  == 1){
        var opcion = confirm("¿Realmente desea validar la inscripción?");
    }else{
        var opcion = confirm("¿Realmente desea eliminar la validar?");
    }
    if (opcion == true) {
        $.post("<?php echo Yii::app()->createUrl('inscripcion/validar') ?>",{ inscripcion:inscripcion, accion:accion },
        function(data){
//            location.reload();
        });
    } else {
//        mensaje = "Has clickado Cancelar";
    }

}    
</script>