<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
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

<?php
$this->breadcrumbs=array(
	'Franquiciados',
);

$this->menu=array(
array('label'=>__('Create Franquiciado'),'url'=>array('create')),
array('label'=>__('Manage Franquiciado'),'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Franchisee'); ?></span>

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
        
        ?>
        
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo __('Results table: Pass Competitor'); ?></div>
                    <div class="panel-body">

                        <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr style=" background-color: #ccc;">
                                    <td><center><?php echo __('Competition'); ?></center></td>
                                    <td><center><?php echo __('Items'); ?></center></td>
                                    <td><center><?php echo __('# Pass'); ?></center></td>
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
                                    <td><center><?php echo __('Pass Competitor'); ?></center></td>
                                    <td>
                                        <center>
                                            <?php
                                            
                                            $pagosPase = Pago::model()->findAll('id_copetencia ='.$franquiciado->id_competencia.' AND id_tipo_pago = 1 AND id_pago_estatus = 2');
                                            $totalPase += count($pagosPase);
                                            echo count($pagosPase);
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php
                                            $pagosPases = Pago::model()->findAll('id_copetencia ='.$franquiciado->id_competencia.' AND id_tipo_pago = 1 AND id_pago_estatus = 2');
                                            $valor =0;
                                            foreach ($pagosPases as $pagoPase){
                                                $valor += $pagoPase->costo_pagar;
                                            }
                                            $totalValor += $valor;
                                            echo number_format($valor, 2, '.', ',');
                                            ?>
                                        </center>
                                    </td>
                                    <td><center><?php echo $franquiciado->porcentaje; $totalPorcentaje += $franquiciado->porcentaje;?></center></td>
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
                
                 <div class="panel-group">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse1"><?php echo __('Results table: Detail Pass Competitor'); ?></a>
                        </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <?php 
                            $or .= "  AND id_pago_estatus = 2";
                            $pagosPases = Pago::model()->findAll('id_tipo_pago = 1'.$or); ?>
                            <div class="table-responsive">

                            <table style=" width: 100%;" id="example" class="table table-hover" cellspacing="0">
                                <thead>
                                <tr>
                                    <td><center><strong><?php echo __('ID Payment'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Document type'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Documentation'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Name and Last Name'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Mail'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Paid Value'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Win Service Charge'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Total to pay'); ?></strong></center></td>
                                </tr>
                                    
                                </thead>
                                <tbody>
                                   <?php
                                   foreach ($pagosPases as $pagoPase){
                                       $usuario = Usuario::model()->find('id_usuario_sistema ='.$pagoPase->id_usuario_pagador);
                                       ?>
                                    <?php 
//                                    if($pagoPase->id_pago_estatus == 1){ echo '<tr>'; } 
//                                    if($pagoPase->id_pago_estatus == 2){ echo '<tr class="success">'; }  
//                                    if($pagoPase->id_pago_estatus == 3){ echo '<tr class="danger">'; }  
//                                    if($pagoPase->id_pago_estatus == 4){ echo '<tr class="warning">'; }  
                                    ?>
                                    <tr>

                                        <td><center><?php echo $pagoPase->id_pago; ?></center></td>
                                        <!--<td><center><?php // if($pagoPase->id_tipo_pago == 1){ echo "Pase Competidor"; }else{ echo "Inscripción Categoría"; } ?></center></td>-->
<!--                                        <td>
                                            <center>
                                                <?php 
//                                                if($pagoPase->id_pago_estatus == 1){ echo "Por pagar"; } 
//                                                if($pagoPase->id_pago_estatus == 2){ echo "Pagado"; }  
//                                                if($pagoPase->id_pago_estatus == 3){ echo "Rechazado"; }  
//                                                if($pagoPase->id_pago_estatus == 4){ echo "En espera"; }  
                                                ?>
                                            </center>
                                        </td>-->
<!--                                        <td>
                                            <center>
                                                <div class="btn-group">
                                                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                    Acción <span class="caret"></span>
                                                  </button>

                                                  <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a style=" cursor: pointer;" onclick="validarPago(<?php echo $pagoPase->id_pago; ?>, '1')">
                                                            Por pagar
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a style=" cursor: pointer;" onclick="validarPago(<?php echo $pagoPase->id_pago; ?>, '2')">
                                                            Confirmar
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a style=" cursor: pointer;" onclick="validarPago(<?php echo $pagoPase->id_pago; ?>, '3')">
                                                            Rechazar
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a style=" cursor: pointer;" onclick="validarPago(<?php echo $pagoPase->id_pago; ?>, '4')">
                                                            En espera
                                                        </a>
                                                    </li>
                                                  </ul>
                                                </div>
                                            </center>
                                        </td>-->
                                        <!--<td><center><?php // echo $pagoPase->idCompetencia->competencia; ?></center></td>-->
<!--                                        <td><center><?php echo $pagoPase->fecha_pago; ?></center></td>
                                        <td><center><?php echo $pagoPase->fecha_pagado; ?></center></td>-->
                                        <td>
                                            <center>
                                                <?php 
                                                    if($usuario->tipo_documento == 1){
                                                       echo 'National ID';
                                                    }
                                                    if($usuario->tipo_documento == 2){
                                                        echo __('Driver License');
                                                    }
                                                    if($usuario->tipo_documento == 3){
                                                        echo 'Cedula de Extranjería';
                                                    }
                                                    if($usuario->tipo_documento == 4){
                                                        echo __('Passport');
                                                    }
                                                    if($usuario->tipo_documento == 5){
                                                        echo 'Tarjeta de Identidad';
                                                    }
                                                    if($usuario->tipo_documento == 6){
                                                        echo 'Registro Civil';
                                                    }
                                                ?>
                                            </center>
                                        </td>
                                        <td><center><?php echo $usuario->cedula; ?></center></td>
                                        <td><center><?php echo $usuario->primer_nombre." ".$usuario->primer_apellido; ?></center></td>
                                        <td><center><?php echo $usuario->correo; ?></center></td>
<!--                                        <td>
                                            <UL>


                                            <?php
//                                            $pagosDetalles = PagoDetalle::model()->findAll('id_pago ='.$pagoPase->id_pago);
//                                            foreach ($pagosDetalles as $pagoDetalle){
//                                                ?><li><?php // echo $pagoDetalle->idUsuario->correo; ?></li><?php
//                                            }
                                            ?>
                                            </UL>
                                        </td>-->

                                        
                                        <td><center><?php echo number_format($pagoPase->costo_pagar, 2, '.', ','); ?></center></td>
                                        <td>
                                            <center>
                                                <?php
                                                $porcentaje = 0;
                                                $PorcentajeFranquiciado = Franquiciado::model()->find('id_competencia ='.$pagoPase->id_copetencia.' AND id_usuario_sistema ='.Yii::app()->user->id_usuario_sistema);
                                                echo number_format($PorcentajeFranquiciado->porcentaje, 2, '.', ',');
                                                
                                                $porcentaje = $PorcentajeFranquiciado->porcentaje;
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php 
                                                $calculo =0;
                                                $calculo = ($pagoPase->costo_pagar * $porcentaje)/100;
//                                                echo $pagoPase->costo_pagar - $calculo;
                                                echo number_format($pagoPase->costo_pagar - $calculo, 2, '.', ',');
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
        </div>
        
        
        
        <?php
    }
    ?>
</div>
