<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<?php
//echo "ID: ".$id_copetencia;

if($id_copetencia){
  $competencia = Competencia::model()->find('id_copetencia ='.$id_copetencia);  


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

    

} );    
</script>
<span class="ez"><?php echo __('Franchisee: Competition').": ".$competencia->competencia; ?></span>
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
                                    <td>
                                        <center>
                                            <?php
                                            
                                            $pagosPase = Pago::model()->findAll('id_copetencia ='.$franquiciado->id_competencia.' AND id_tipo_pago = 2 AND id_pago_estatus = 2');
                                            $totalPase += count($pagosPase);
                                            echo count($pagosPase);
                                            
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php
                                            $pagosPases = Pago::model()->findAll('id_copetencia ='.$franquiciado->id_competencia.' AND id_tipo_pago = 2 AND id_pago_estatus = 2');
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
                <div class="panel-heading"><?php echo __('List of categories'); ?></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="row-border hover order-column" cellspacing="0">
                            <thead>
                                <tr>
                                    <td><center><strong><?php echo __('Competition'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Block'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Categories'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Number of Registrations'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Paid value'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Win Service Charge'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Total to pay'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Action'); ?></strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $categorias = CompetenciaCategoria::model()->findAll('id_copetencia ='.$competencia->id_copetencia);
                                foreach ($categorias as $categoria){
                                    $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria);
                                    $countInscripcion = 0;
                                    foreach ($inscripciones as $inscripcion){
                                        $pagos = Pago::model()->findAll('id_inscripcion ='.$inscripcion->id_inscripcion.' AND id_tipo_pago = 2 AND id_pago_estatus = 2');
                                        if(count($pagos)){
                                            $countInscripcion++;
                                        }
                                    }
                                    
                                    
                                    if($countInscripcion >0){
                                    ?>
                                    <tr>
                                        <td><?php echo $categoria->idCopetencia->competencia; ?></td>
                                        <td><?php echo $categoria->idCategoria->idBloque->bloque; ?></td>
                                        <td><?php echo $categoria->idCategoria->categoria; ?></td>
                                        <td>
                                            <center>
                                            <?php 
                                                $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria);
                                                echo count($inscripciones);
                                            ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                            <?php 
                                                $valor = 0;
                                                foreach ($inscripciones as $inscripcion){
                                                    $pago = Pago::model()->find('id_inscripcion ='.$inscripcion->id_inscripcion.' AND id_tipo_pago = 2 AND id_pago_estatus = 2');
                                                    $valor += $pago->costo_pagar;
                                                }
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
                                        <td>
                                            <center>
                                                <a href="listadoInscripcion?idc=<?php echo $categoria->id_copetencia; ?>&idca =<?php echo $categoria->id_categoria; ?>">
                                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                                </a>
                                            </center>
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
        </div>
    </div>
    
    
    
</div>
<?php
}else{
    echo "Debe de seleccionar una competencia.";
}
?>