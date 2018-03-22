<!--<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>-->
<!--<style>
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
</script>-->
<?php
$this->breadcrumbs=array(
	'Payments',
);

//$this->menu=array(
//array('label'=>'Competitor pass','url'=>array('listadoPase')),
//array('label'=>'Administrar Pagos','url'=>array('admin')),
//);

$pagosCategorias = Pago::model()->findAll('id_tipo_pago = 2 AND id_copetencia = 47');

?>


<span class="ez">Payments: Pago Categoria</span>

<div class="pd-inner">
   <div class="row">
        <div class="col-sm-12 col-md-12">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of pay
                    <div class="pull-right">
                        <?php echo "Número de Registros: ".count($pagosCategorias); ?>
                    </div>
                </div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="table table-hover table-bordered" cellspacing="0">
                            <thead>
                                <tr>
                                    <td style=" width: 5%;"><center><strong>ID Pago</strong></center></td>
                                    <td style=" width: 5%;"><center><strong>Tipo de pago</strong></center></td>
                                    <td style=" width: 5%;"><center><strong>Monto pago</strong></center></td>
                                    <td style=" width: 10%;"><center><strong>Competencia</strong></center></td>
                                    <td style=" width: 10%;"><center><strong>Fecha Registro de Pago</strong></center></td>
                                    <td style=" width: 15%;"><center><strong>Id pago Detalle</strong></center></td>
                                    <td style=" width: 15%;"><center><strong>Tipo Inscripción</strong></center></td>
                                    <td style=" width: 15%;"><center><strong>Inscripción</strong></center></td>
                                    <td style=" width: 15%;"><center><strong>Participantes</strong></center></td>
                                    <td style=" width: 40%;"><center><strong>Monto Pago</strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                               foreach ($pagosCategorias as $pagoPase){
                                   $usuario = Usuario::model()->find('id_usuario_sistema ='.$pagoPase->id_usuario_pagador);
                                   ?>
                                <?php 
                                if($pagoPase->id_pago_estatus == 1){ echo '<tr>'; } 
                                if($pagoPase->id_pago_estatus == 2){ echo '<tr class="success">'; }  
                                if($pagoPase->id_pago_estatus == 3){ echo '<tr class="danger">'; }  
                                if($pagoPase->id_pago_estatus == 4){ echo '<tr class="warning">'; }  
                                ?>
                                
                                
                                    <td><center><?php echo $pagoPase->id_pago; ?></center></td>
                                    <td><center><?php if($pagoPase->id_tipo_pago == 1){ echo "Pase Competidor"; }else{ echo "Inscripción Categoría"; } ?></center></td>
                                    <td><center><?php echo $pagoPase->costo_pagar; ?></center></td>
                                    <td><center><?php echo $pagoPase->idCompetencia->competencia; ?></center></td>
                                    <td><center><?php echo $pagoPase->fecha_pago; ?></center></td>
                                    <?php
                                        $pagosDetalles = PagoDetalle::model()->findAll('id_pago ='.$pagoPase->id_pago);    
                                    ?>
                                    <td>
                                        <ul>
                                        <?php
                                        if($pagosDetalles){
                                            $costoPagar = 0;
                                            $valor = 0;
                                            foreach ($pagosDetalles as $pagoDetalle){
                                                $costoPagar += $pagoDetalle->monto;
                                                 
//                                                if($pagoPase->fecha_pago <= '2017-10-26 23:59:59'){
//                                                    $valor = 100.00;
//                                                }
//                                                if($pagoPase->fecha_pago >= '2017-10-27 00:00:00'){
//                                                    $valor = 120.00;
//                                                }
//                                              Yii::app()->db->createCommand("UPDATE pago_detalle SET monto = ".$valor." WHERE id_pago_detalle = ".$pagoDetalle->id_pago_detalle."")->query();
                                                ?>
                                                
                                                <li><?php echo $pagoDetalle->id_pago_detalle." : ".$pagoDetalle->monto?></li>
                                                <ul><li><?php echo $valor; ?></li></ul>
                                                <?php

                                            }
                                        }else{
                                            echo "<li>No posee pagos detalles registrados</li>";
//                                            Pago::model()->deleteAll('id_pago ='.$pagoPase->id_pago);
                                        }
                                        ?>
                                        </ul>
                                    </td>
                                    <td>
                                        <center>
                                            <?php 
                                                $inscripciones = Inscripcion::model()->find('id_inscripcion ='.$pagoPase->id_inscripcion);    
                                                echo $inscripciones->idCategoria->idTipoCategoria->tipo; 
                                            ?>
                                        </center>
                                    </td>
                                    <?php
                                        $inscripciones = Inscripcion::model()->findAll('id_inscripcion ='.$pagoPase->id_inscripcion);    
                                    ?>
                                    <td>
                                        <center>
                                            <ul>    
                                                <?php    
                                                    if($inscripciones){
        //                                            $costoPagar = 0;
        //                                            $valor = 0;
                                                    foreach ($inscripciones as $inscripcion){
        //                                                $costoPagar += $pagoDetalle->monto;

        //                                                if($pagoPase->fecha_pago <= '2017-10-26 23:59:59'){
        //                                                    $valor = 100.00;
        //                                                }
        //                                                if($pagoPase->fecha_pago >= '2017-10-27 00:00:00'){
        //                                                    $valor = 120.00;
        //                                                }
        //                                              Yii::app()->db->createCommand("UPDATE pago_detalle SET monto = ".$valor." WHERE id_pago_detalle = ".$pagoDetalle->id_pago_detalle."")->query();
                                                        ?>

                                                        <li><?php echo $inscripcion->id_inscripcion; ?></li>
                                                        <ul><li><?php echo $inscripcion->idCategoria->categoria; ?></li></ul>
                                                        <?php

                                                    }

                                                }else{
                                                    echo "<li>No posee pagos detalles registrados</li>";
        //                                            Pago::model()->deleteAll('id_pago ='.$pagoPase->id_pago);
                                                }

                                                ?>
                                            </ul>
                                        </center>
                                    </td>
                                    <?php
                                        $participantes = Participante::model()->findAll('id_inscripcion ='.$pagoPase->id_inscripcion);    
                                    ?>
                                    <td>
                                        <center>
                                            <ul>    
                                                <?php    
                                                if($participantes){
        //                                            $costoPagar = 0;
        //                                            $valor = 0;
                                                    foreach ($participantes as $participante){
        //                                                $costoPagar += $pagoDetalle->monto;

        //                                                if($pagoPase->fecha_pago <= '2017-10-26 23:59:59'){
        //                                                    $valor = 100.00;
        //                                                }
        //                                                if($pagoPase->fecha_pago >= '2017-10-27 00:00:00'){
        //                                                    $valor = 120.00;
        //                                                }
        //                                              Yii::app()->db->createCommand("UPDATE pago_detalle SET monto = ".$valor." WHERE id_pago_detalle = ".$pagoDetalle->id_pago_detalle."")->query();
                                                        ?>

                                                        <li><?php echo $participante->idUsuario->correo; ?></li>
                                                        <?php

                                                    }

                                                }else{
                                                    echo "<li>No posee pagos detalles registrados</li>";
        //                                            Pago::model()->deleteAll('id_pago ='.$pagoPase->id_pago);
                                                }

                                                ?>
                                            </ul>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php 
                                                $inscripciones = Inscripcion::model()->find('id_inscripcion ='.$pagoPase->id_inscripcion);    
                                                //echo $inscripciones->idCategoria->idTipoCategoria->tipo; 
                                                if($inscripciones->idCategoria->id_tipo_categoria == 1){
//                                                    echo "Solista";
                                                    if($pagoPase->fecha_pago <= '2017-10-26 23:59:59'){
                                                        $valor = 100.00;
                                                    }
                                                    if($pagoPase->fecha_pago >= '2017-10-27 00:00:00'){
                                                        $valor = 120.00;
                                                    }
                                                    if($valor == $pagoPase->costo_pagar){
                                                        echo $valor."<hr>Correcto";
                                                    }else{
                                                        echo "xxx<hr>Incorrecto";
                                                    }
                                                }
                                                if($inscripciones->idCategoria->id_tipo_categoria == 2){
//                                                    echo "Pareja";
                                                    if($pagoPase->fecha_pago <= '2017-10-26 23:59:59'){
                                                        $valor = 140.00;
                                                    }
                                                    if($pagoPase->fecha_pago >= '2017-10-27 00:00:00'){
                                                        $valor = 160.00;
                                                    }
                                                    if($valor == $pagoPase->costo_pagar){
                                                        echo $valor."<hr>Correcto";
                                                    }else{
                                                        echo "xxx<hr>Incorrecto";
                                                    }
                                                }
                                                if($inscripciones->idCategoria->id_tipo_categoria == 3){
//                                                    echo "Grupo";
                                                    if($pagoPase->fecha_pago <= '2017-10-26 23:59:59'){
                                                        $valor = 190.00;
                                                    }
                                                    if($pagoPase->fecha_pago >= '2017-10-27 00:00:00'){
                                                        $valor = 220.00;
                                                    }
                                                    if($valor == $pagoPase->costo_pagar){
                                                        echo $valor."<hr>Correcto";
                                                    }else{
                                                        echo "xxx<hr>Incorrecto";
                                                    }
                                                }
                                            ?>
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
            </div>
        </div>
    </div>
</div>

