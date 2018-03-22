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

    

} );    
</script>
    <?php


$this->breadcrumbs=array(
	'Reportes',
);

$this->menu=array(
    array('label'=>__('Reports by competence'),'url'=>Yii::app()->request->baseUrl.'/reporte/index'),
    array('label'=>__('Participants list-competition'),'url'=>Yii::app()->request->baseUrl.'/reporte/listadoCompetencia'),
    array('label'=>__('List by categories'),'url'=>Yii::app()->request->baseUrl.'/reporte/listadoCategoria'),
);
?>

<span class="ez"><?php echo __('Report'); ?>: </span>

<div class="pd-inner">
       
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('List of Entries by Competition'); ?></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="row-border hover order-column"  cellspacing="0"> <!--class="row-border hover order-column"-->
                            <thead>
                                <tr>
                                    <th><center><strong>#</strong></center></th>
                                    <th><center><strong><?php echo __('Competition'); ?></strong></center></th>
                                    <th><center><strong><?php echo __('Block'); ?></strong></center></th>
                                    <th><center><strong><?php echo __('Category'); ?></strong></center></th>
                                    <th><center><strong><?php echo __('Type Category'); ?></strong></center></th>
                                    <th><center><strong><?php echo __('Quantity Inscriptions'); ?></strong></center></th>
                                    <th><center><strong><?php echo __('Quantity Inscriptions Accredited'); ?></strong></center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $countCategoria = 0;
                                foreach ($competenciaCategorias as $competenciaCategoria){
                                    if($competenciaCategoria->idCopetencia->estatus == 1){
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><center><?php echo $i;?></center></td>
                                            <td><center><?php echo $competenciaCategoria->idCopetencia->competencia; ?></center></td>
                                            <td><center><?php echo $competenciaCategoria->idCategoria->idBloque->bloque; ?></center></td>
                                            <td><center><?php echo $competenciaCategoria->idCategoria->categoria; ?></center></td>
                                            <td><center><?php echo $competenciaCategoria->idCategoria->idTipoCategoria->tipo; ?></center></td>
                                            <td>
                                                <center>
                                                    <?php 
                                                        $inscripcionCategoria = Inscripcion::model()->findAll('id_copetencia = '.$competenciaCategoria->id_copetencia.' AND id_categoria ='.$competenciaCategoria->id_categoria);
                                                        echo count($inscripcionCategoria);
                                                        $countCategoria += count($inscripcionCategoria);
                                                    ?>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <?php 
                                                        $inscripcionCategoria = Inscripcion::model()->findAll('id_copetencia = '.$competenciaCategoria->id_copetencia.' AND id_categoria ='.$competenciaCategoria->id_categoria.' AND acreditado = 1');
                                                        echo count($inscripcionCategoria);
                                                        $countCategoria += count($inscripcionCategoria);
                                                    ?>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
<!--                                <tr>
                                    <td colspan="5"><center>Total</center></td>
                                    <td><center><?php //echo $countCategoria; ?></center></td>
                                </tr>        -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Gráficos</div>
                <div class="panel-body">

                    <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

                </div>

            </div>
        </div>
    </div>-->
</div>
<?php
//$dato = array(name=>'Microsoft Internet Explorer', y=>53.33);
//$dato = json_encode($dato);
//$dato = array(array(name=>'prueba', y=>2), array(name=>'prueba2', y=>23),);
//$dato = +array(name=>'prueba2', y=>23);

//echo var_dump($dato)."<hr>";
//echo json_encode($dato);
//$dato = array(name=>$competencia->competencia, y=>);
//echo var_dump($dato)."<hr>";
?>

<!--<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Registros por Competencia'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f}',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Inscripciones',
        colorByPoint: true,
        data: <?php echo json_encode($dato) ?>
    }]
});
</script>-->




<?php 



//$this->widget('booster.widgets.TbListView',array(
//'dataProvider'=>$dataProvider,
//'itemView'=>'_view',
//)); 
?>
