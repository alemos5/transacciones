<!--<script src="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"></script>
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>-->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<!--<script src="http://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->



<style>
td.highlight {
    background-color: whitesmoke !important;
}    
</style>
    
<script>
$(document).ready( function () {
//    $('#example').DataTable();
    var table = $('#example').DataTable( {
        "columnDefs": [
          { "width": "20%", "targets": 0 }
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
	'Reportes',
);

$this->menu=array(
    array('label'=>__('Reports by competence'),'url'=>Yii::app()->request->baseUrl.'/reporte/index'),
    array('label'=>__('Participants list-competition'),'url'=>Yii::app()->request->baseUrl.'/reporte/listadoCompetencia'),
    array('label'=>__('List by categories'),'url'=>Yii::app()->request->baseUrl.'/reporte/listadoCategoria'),
);
?>

<span class="ez">Reporte: </span>

<div class="pd-inner">
    
<!--    <div class="panel panel-default">
        <div class="panel-heading">Consolidado</div>
        <div class="panel-body">
            
            
        </div>
    </div>-->
    
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('List of Participants by Competition'); ?></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 70%;" id="example" class="row-border hover order-column" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style=" width: 5%;">#</th>
                                    <th style=" width: 10%;"><?php echo __('Competition'); ?></th>
                                    <th style=" width: 10%;"><?php echo __('Country'); ?></th>
                                    <th style=" width: 10%;"><?php echo __('City'); ?></th>
                                    <th style=" width: 10%;"><?php echo __('Inscription'); ?></th>
                                    <th style=" width: 10%;"><?php echo __('Block'); ?></th>
                                    <th style=" width: 10%;"><?php echo __('Category'); ?></th>
                                    <th style=" width: 10%;"><?php echo __('Type Category'); ?></th>
                                    <th style=" width: 10%;"><?php echo __('Type Doc'); ?>.</th>
                                    <th><?php echo __('ID Num'); ?>.</th>
                                    <th><?php echo __('Name'); ?></th>
                                    <th><?php echo __('Last Name'); ?></th>
                                    <!--<th>F. Nacimiento</th>-->
                                    <th><?php echo __('Phone'); ?></th>
                                    <th style=" width: 1%;"><?php echo __('Email'); ?></th>
<!--                                    <th>Pais</th>
                                    <th>Ciudad</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i =0;
//                                echo var_dump($inscripciones);
                                
                                foreach ($participantes as $participante){
                                    
                                    if($participante->idInscripcion->idCopetencia->estatus == 1){
                                    
                                    $i++;
                                    ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td> <?php echo $participante->idInscripcion->idCopetencia->competencia; ?></td>
                                    <?php $pais = Pais::model()->find('codigo ="'.$participante->idUsuario->codigo_pais.'"'); ?>
                                    <td><?php echo $pais->pais; ?></td>
                                    <td><?php echo $participante->idUsuario->ciudad; ?></td>
                                    <td><?php echo $participante->idInscripcion->id_inscripcion; ?></td>
                                    <td><?php echo $participante->idCategoria->idBloque->bloque; ?></td>
                                    <td><?php echo $participante->idCategoria->categoria; ?></td>
                                    <td><?php echo $participante->idCategoria->idTipoCategoria->tipo; ?></td>
                                    <td>
                                        <?php 
//                                        echo "Participante: ".$inscripcion->participantes->id_usuario;
                                        $usuario = Usuario::model()->find('id_usuario_sistema ='.$participante->id_usuario);
                                        if($usuario->tipo_documento == 1){
                                            echo "Cédula Ciudadanía";
                                        }
                                        if($usuario->tipo_documento == 2){
                                            echo __("Driver License");
                                        }
                                        if($usuario->tipo_documento == 3){
                                            echo "Cédula de Extranjería";
                                        }
                                        if($usuario->tipo_documento == 4){
                                            echo __('Passport');
                                        }
                                        if($usuario->tipo_documento == 5){
                                            echo "Tarjeta de Identidad";
                                        }
                                        if($usuario->tipo_documento == 6){
                                            echo "Registro Civil";
                                        }
//                                        echo $inscripcion->participantes->idUsuario->tipo_documento; 
                                        ?>
                                    </td>
                                    <td><?php echo $usuario->cedula; ?></td>
                                    <td><?php echo $usuario->primer_nombre; ?></td>
                                    <td><?php echo $usuario->primer_apellido; ?></td>
                                    <!--<td><?php echo $usuario->fecha_nacimiento; ?></td>-->
                                    <td><?php echo $usuario->tlf_personal; ?></td>
                                    <td><?php echo $usuario->correo; ?></td>
<!--                                    <td><?php echo $usuario->idPais->pais; ?></td>
                                    <td><?php echo $usuario->ciudad; ?></td>-->
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
