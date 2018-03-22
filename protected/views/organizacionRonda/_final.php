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

    $(".up,.down").click(function(){
        var row = $(this).parents("tr:first");
        if ($(this).is(".up")) {
            row.insertBefore(row.prev());
        } else {
            row.insertAfter(row.next());
        }
    });

} );  


</script>
<?php
$this->breadcrumbs=array(
	'Organizacion Rondas',
);

$this->menu=array(
array('label'=>'Create OrganizacionRonda','url'=>array('create')),
array('label'=>'Manage OrganizacionRonda','url'=>array('admin')),
array('label'=>'Final','url'=>array('organizacionRonda/final')),
array('label'=>'Semifinal','url'=>array('organizacionRonda/semifinal')),
array('label'=>'Play off','url'=>array('organizacionRonda/eliminatoria')),
);
?>

<span class="ez"><?php echo __('Event organization: Final'); ?></span>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 text-right">
            <?php
            $this->widget('booster.widgets.TbButton', array(
                'label'=>'Exportar',
                'icon'=>'download',
                'buttonType' =>'link',
                'url'=>'ReporteOEFinal',
                'htmlOptions' => array('confirm' => '¿Está seguro que desea Agregar Exportar esta Consulta?',),
            )); ?>
        </div>
    </div>
</div>
<div class="pd-inner">
    
    
<!--    <table>
    <tr>
        <td>One</td>
        <td>
            <a href="#" class="up">Up</a>
            <a href="#" class="down">Down</a>
        </td>
    </tr>
    <tr>
        <td>Two</td>
        <td>
            <a href="#" class="up">Up</a>
            <a href="#" class="down">Down</a>
        </td>
    </tr>
    <tr>
        <td>Three</td>
        <td>
            <a href="#" class="up">Up</a>
            <a href="#" class="down">Down</a>
        </td>
    </tr>
    <tr>
        <td>Four</td>
        <td>
            <a href="#" class="up">Up</a>
            <a href="#" class="down">Down</a>
        </td>
    </tr>
    <tr>
        <td>Five</td>
        <td>
            <a href="#" class="up">Up</a>
            <a href="#" class="down">Down</a>
        </td>
    </tr>
</table>-->
    
    
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); 
    
//    echo var_dump($dataProvider);
    
    ?>
    
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('List of Categories'); ?></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="row-border hover order-column" cellspacing="0">
                            <thead>
                                <tr>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Competition'); ?></strong></center></td>
                                    <!--<td style=" width: 10%;"><center><strong><?php // echo __('Block'); ?></strong></center></td>-->
                                    <td style=" width: 10%;"><center><strong><?php echo __('Category'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Number of Registrations'); ?></strong></center></td>
                                    <td style=" width: 30%;"><center><strong><?php echo __('Date Record'); ?></strong></center></td>
                                    <td style=" width: 20%;"><center><strong><?php echo __('Hour / minutes'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Order'); ?></strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $competencia = Competencia::model()->find('id_copetencia = 47');
                                $categorias = CompetenciaCategoria::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' ORDER BY orden ASC');
                                
//                                echo var_dump($categorias);
                                $temporal = array();
                                $a = 0;
                                foreach ($categorias as $categoria){
                                    $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND acreditado = 1');
                                    if($inscripciones){
                                    if(count($inscripciones) <= $cantidad){
                                        $temporal[$a] = $categoria->id_competencia_categoria;
                                        $a++;
                                    }
                                    }
                                }

                                //echo var_dump($temporal);
                                $categorias = CompetenciaCategoria::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' ORDER BY orden ASC');
                                $a=0;
                                foreach ($categorias as $categoria){
//                                    
                                    
                                    $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND acreditado = 1');
                                    
                                    if($inscripciones){
                                        
                                    if(count($inscripciones) > 0){
                                    foreach ($inscripciones as $inscripcion){
                                        Yii::app()->db->createCommand("UPDATE `inscripcion` SET `ronda` = 1 WHERE id_copetencia = 47 AND `id_inscripcion` = ".$inscripcion->id_inscripcion." AND ganador = 0;")->query();
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $categoria->idCopetencia->competencia; ?></td>
                                        <!--<td><?php // echo $categoria->idCategoria->idBloque->bloque; ?></td>-->
                                        <td><?php echo $categoria->idCategoria->categoria; ?></td>
                                        <td>
                                            <center>
                                            <?php 
                                                $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND acreditado = 1');
                                                echo count($inscripciones);
                                            ?>
                                            </center>
                                        </td>
                                        <td>
                                            <?php
                                            
                                            $optionYear = "<option value='00'>Seleccione</option>"; 
                                            for($i=date('o'); $i>=1910; $i--) {
                                                if($categoria->anio == $i){
//                                                if($i<10){
//                                                    $i = "0".$i;
//                                                }
                                                    $optionYear .="<option selected='selected' value='".$i."'>".$i."</option>>";
                                                }else{
                                                    $optionYear .="<option value='".$i."'>".$i."</option>>";
                                                }
                                            }
                                            
                                            $optionMonth = "<option value='0'>Seleccione</option>"; 
                                            for ($i=1; $i<=12; $i++) {
                                                if($i<10){
                                                    $i = "0".$i;
                                                }
                                                if($categoria->mes == $i){
                                                    $optionMonth .="<option selected='selected' value='".$i."'>".$i."</option>>";
                                                }else{
                                                    $optionMonth .="<option value='".$i."'>".$i."</option>>";
                                                }
                                            }
                                            
                                            $optionDay = "<option value='0'>Seleccione</option>"; 
                                            for ($i=1; $i<=31; $i++) {
                                                if($i<10){
                                                    $i = "0".$i;
                                                }
                                                if($categoria->dia == $i){
                                                    $optionDay .="<option selected='selected' value='".$i."'>".$i."</option>>";
                                                }else{
                                                    $optionDay .="<option value='".$i."'>".$i."</option>>";
                                                }
                                            }
                                            
                                            $optionHour = "<option value='0'>Seleccione</option>"; 
                                            for ($i=0; $i<=23; $i++) {
                                                if($i<10){
                                                    $i = "0".$i;
                                                }
                                                if($categoria->hora == $i){
                                                    $optionHour .="<option selected='selected' value='".$i."'>".$i."</option>>";
                                                }else{
                                                    $optionHour .="<option value='".$i."'>".$i."</option>>";
                                                }
                                            }
                                            
                                            $optionMinutes = "<option value='0'>Seleccione</option>"; 
                                            for ($i=0; $i<=59; $i++) {
                                                if($i<10){
                                                    $i = "0".$i;
                                                }
                                                if($categoria->minuto == $i){
                                                    $optionMinutes .="<option selected='selected' value='".$i."'>".$i."</option>>";
                                                }else{
                                                    $optionMinutes .="<option value='".$i."'>".$i."</option>>";
                                                }
                                            }
                                            ?>
                                            
                                            
                                            
                                            <center>
                                                <div class="row">
                                                    <div style=" margin-left: 0px; padding-left: 0px; padding-right: 3px;" class="col-sm-12 col-md-4">
                                                        <label class="control-label required" for="OrganizacionEvento_dia">
                                                        <?php echo __('Year'); ?>
                                                        <span class="required">*</span>
                                                        </label>
                                                        <select onchange="actualizarfecha(<?php echo $categoria->id_competencia_categoria; ?>, this.value, '0', '0', '0', '0');"  id="OrganizacionEvento_anio" class="span5 form-control" name="OrganizacionEvento_anio" placeholder="Day">
                                                            <?php echo $optionYear; ?>
                                                        </select>
                                                    </div>
                                                    <div style=" margin-left: 0px; padding-left: 0px; padding-right: 3px;" class="col-sm-12 col-md-4">
                                                        <label class="control-label required" for="OrganizacionEvento_dia">
                                                        <?php echo __('Month'); ?>
                                                        <span class="required">*</span>
                                                        </label>
                                                        <select onchange="actualizarfecha(<?php echo $categoria->id_competencia_categoria; ?>, '0', this.value, '0', '0', '0');" id="OrganizacionEvento_mes" class="span5 form-control" name="OrganizacionEvento_mes" placeholder="Day">
                                                            <?php echo $optionMonth; ?>
                                                        </select>
                                                    </div>
                                                    <div style=" margin-left: 0px; padding-left: 0px; padding-right: 3px;" class="col-sm-12 col-md-4">
                                                        <label class="control-label required" for="OrganizacionEvento_dia">
                                                        <?php echo __('Day'); ?>
                                                        <span class="required">*</span>
                                                        </label>
                                                        <select onchange="actualizarfecha(<?php echo $categoria->id_competencia_categoria; ?>, '0', '0', this.value, '0', '0');" id="OrganizacionEvento_dia" class="span5 form-control" name="OrganizacionEvento_dia" placeholder="Day">
                                                            <?php echo $optionDay; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <div class="row">
                                                    <div style=" margin-left: 0px; padding-left: 10px; padding-right: 5px;" class="col-sm-12 col-md-6">
                                                        <label class="control-label required" for="OrganizacionEvento_dia">
                                                        <?php echo __('Hour'); ?>
                                                        <span class="required">*</span>
                                                        </label>
                                                        <select onchange="actualizarfecha(<?php echo $categoria->id_competencia_categoria; ?>, '0', '0', '0', this.value, '0');"  id="OrganizacionEvento_hora" class="span5 form-control" name="OrganizacionEvento_hora" placeholder="Hour">
                                                            <?php echo $optionHour; ?>
                                                        </select>
                                                    </div>
                                                    <div style=" margin-left: 0px; padding-left: 0px; padding-right: 5px;" class="col-sm-12 col-md-6">
                                                        <label class="control-label required" for="OrganizacionEvento_dia">
                                                        <?php echo __('Minutes'); ?>
                                                        <span class="required">*</span>
                                                        </label>
                                                        <select onchange="actualizarfecha(<?php echo $categoria->id_competencia_categoria; ?>, '0', '0', '0', '0', this.value);" id="OrganizacionEvento_minutes" class="span5 form-control" name="OrganizacionEvento_minutes" placeholder="Minutes">
                                                            <?php echo $optionMinutes; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                        </td>
<!--                                        <td>
                                            <center>
                                            <a href="listadoInscripcion?idc=<?php echo $categoria->id_copetencia; ?>&idca =<?php echo $categoria->id_categoria; ?>">
                                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                            </a>
                                            </center>
                                        </td>-->
                                        <td>
                                            <center>
                                                <div class="row">
                                                    <label class="control-label required" for="OrganizacionEvento_dia">
                                                        <?php echo __('Order'); ?>
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-sm-10 bootstrap-timepicker input-group">
                                                        
                                                        <input value="<?php echo $categoria->orden; ?>" onKeyPress="return soloNumeros(event)" id="ordenCategoria<?php echo $categoria->id_competencia_categoria; ?>" class="form-control" type="text" onblur="" placeholder="Order" name="ordenCategoria" maxlength="4" size="35">
                                                        <label class="input-group-addon btn btn-primary" style="width: 10%;" onclick="guardarOrden(<?php  echo $categoria->id_competencia_categoria; ?>)">
                                                            <span  class="glyphicon  glyphicon-floppy-disk" aria-hidden="true"></span>
                                                        </label>    
                                                        

                                                    </div>    
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php
                                    $a++;
                                }
                                 
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

<script>
    function actualizarfecha(id_categoriaCompetencia, anio, mes, dia, hora, minuto){
//        alert(id_categoriaCompetencia+' - '+anio+' - '+mes+' - '+dia);
        $.post("<?php echo Yii::app()->createUrl('competenciaCategoria/actualizarFecha') ?>",{ 
            id_categoriaCompetencia:id_categoriaCompetencia, 
            anio:anio, 
            mes:mes, 
            dia:dia, 
            hora:hora, 
            minuto:minuto, 
        },
        function(data){
//            location.reload();
        });
    }
    
    function orden(id_categoriaCompetencia, accion, a, orden_actual){
        

        $.post("<?php echo Yii::app()->createUrl('competenciaCategoria/ordenar') ?>",{ 
            id_categoriaCompetencia:id_categoriaCompetencia, 
            accion:accion, 
            a:a, 
            orden_actual:orden_actual 
        },
        function(data){
//            location.reload();
        });
    }
    
function soloNumeros(e)
{
    var key = window.Event ? e.which : e.keyCode
    return ((key >= 48 && key <= 57) || (key==8))
}    

function guardarOrden(id){
    
    var valor = $('#ordenCategoria'+id).val();
//    var mensaje;
//    var opcion = confirm("¿Realmente desea almacenar el orden indicado?");
//    if(valor != ""){
////        alert(valor+' / '+id);
//        if (opcion == true) {
            $.post("<?php echo Yii::app()->createUrl('competenciaCategoria/Orden') ?>",{ id:id, valor:valor },
            function(data){
                //location.reload();
            });
//        } 
    
    
}
</script>
