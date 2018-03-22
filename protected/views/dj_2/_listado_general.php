<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<?php
$id_ronda = $_GET['id_ronda'];
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
    if($id_ronda == 1){
        $ronda = "Final";
    }
    if($id_ronda == 2){
        $ronda = "Semifinal";
    }
    if($id_ronda == 3){
        $ronda = "Play Off";
    }

?>

<span class="ez">Backstage / <?php echo __('Competition'); ?>: <?php echo $competencia->competencia; ?> / <?php echo __($ronda); ?></span>
<div class="pd-inner">
   
        <?php
        
        
        foreach ($categorias as $categoria){
            $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND acreditado = 1 AND audio != "audio_defaul.mp3" AND musica_validada = 1 AND reproducida = 0  AND ronda= '.$id_ronda.'  ORDER BY orden ASC LIMIT 2');
            
            $countFInal = 0;
            if($inscripciones){
//                 echo $categoria->id_categoria;
                
                ?>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="alert alert-success">
                            <center>
                                <h5><b><?php echo $categoria->idCategoria->categoria; ?></b></h5>   
                            </center>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php
                $count = 0;
                
                foreach ($inscripciones as $inscripcion){
                    ?>
                    <div class="col-sm-12 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><?php echo $inscripcion->idCategoria->categoria; ?></div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <tr>
                                        <td>Inscripción</td>
                                        <td><?php echo $inscripcion->id_inscripcion; ?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td><strong>Participantes</strong></td>
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
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong><center>Audio</center></strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            
                                            <?php
                                            if($count == 0){
                                                $idInscripcion = $inscripcion->id_inscripcion;
                                            //echo $inscripcion->id_categoria.' - '.$inscripcion->id_inscripcion; 
                                                $configuraciones = Configuracion::model()->findAll('id_configuracion = 1');
                                                if($configuraciones->configuracion){
                                                    $ruta = $configuraciones->configuracion;
                                                }else{
                                                    $ruta = Yii::app()->request->baseUrl.'/images/audio/';
                                                }
                                                
                                                ?>
                                                <video style="width: 100%; height: 60px;" src="<?php echo $ruta; ?><?php echo $inscripcion->audio; ?>" controls>
                                                Tu navegador no implementa el elemento <code>video</code>.
                                                </video>
                                                <br>
                                                <?php 
                                                echo "<center>".$inscripcion->audio."</center>";
                                            }else{
                                                echo "<center>".$inscripcion->audio."</center>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                                <div class="raw">
                                    <!-- Vertical Slider -->
                
                                </div>
                            </div>
                        </div>
                    </div>
                
                <?php
                $count++;
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
            ?>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <?php echo CHtml::link(CHtml::encode(__('Next')),array('listadoGeneral','idc'=>$id_copetencia ,'idInscripcion'=>$idInscripcion), array('class' => 'btn btn-default')); ?>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="pull-right "  >
                            <?php echo CHtml::link(CHtml::encode(__('Back')),array('listadoGeneral','idc'=>$id_copetencia ,'idInscripcionAnterior'=>$idInscripcionAnterior), array('class' => 'btn btn-default')); ?>
                    </div>
                </div>
            </div>
            <?php
//        }
    ?>
    
    
</div>
<?php
}else{
    echo "Debe de seleccionar una competencia.";
}
?>



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