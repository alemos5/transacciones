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
<span class="ez">Backstage / Competencia: <?php echo $competencia->competencia; ?> / Listado General</span>

<div class="pd-inner">

    <div class="row">
        <div class="col-sm-12 col-md-12">
            
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Inscripciones</div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="table table-hover" cellspacing="0">
                            <thead>
                                <tr>
                                    <td style=" width: 10%;"><center><strong>Competencia</strong></center></td>
                                    <td style=" width: 10%;"><center><strong>Bloque</strong></center></td>
                                    <td style=" width: 10%;"><center><strong>Categorías</strong></center></td>
                                    <td style=" width: 10%;"><center><strong>Nombre del grupo</strong></center></td>
                                    <td style=" width: 40%;"><center><strong>Participantes</strong></center></td>
                                    <td style=" width: 10%;"><center><strong>Audio</strong></center></td>
                                    <td style=" width: 10%;"><center><strong>Reproducir</strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                
                                
                                <?php
                                $categorias = CompetenciaCategoria::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND validado = 1 '.'  ORDER BY orden ASC ');
                                foreach ($categorias as $categoria){
                                    $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND acreditado = 1 and validado = 1 AND musica_validada = 1 ORDER BY orden ASC');
                                    foreach ($inscripciones as $inscripcion){
                                        ?>
                                        <tr>
                                            <td><?php echo $categoria->idCopetencia->competencia; ?></td>
                                            <td><?php echo $categoria->idCategoria->idBloque->bloque; ?></td>
                                            <td><?php echo $categoria->idCategoria->categoria; ?></td>
                                            <td>
                                                <center>
                                                    <?php 
                                                        if($inscripcion->grupo){
                                                            echo $inscripcion->grupo;
                                                        }else{
                                                            echo $inscripcion->idCategoria->idTipoCategoria->tipo;
                                                        }
                                                    ?>
                                                </center>
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
                                                        echo "0 participantes";
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $inscripcion->audio; ?></td>
                                            <td>
                                            <center>
                                            <?php if($inscripcion->audio != "audio_defaul.mp3"){ ?>    
                                                <a target="_blank" href="<?php echo Yii::app()->request->baseUrl; ?>/images/audio/<?php echo $inscripcion->audio; ?>">
                                                    <span class="glyphicon glyphicon-play" aria-hidden="true"></span>
                                                </a>
                                            <?php } ?>    
                                            </center>
                                        </td>
                                        </tr>    
                                        <?php
                                    }
                                    
                                    ?>
                                    
                                    <?php
                                }
                                ?>
                                
                                
                                <?php
                                /*
                                $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND acreditado = 1 AND validado = 1 ORDER BY ordeN ASC');
                                foreach ($inscripciones as $inscripcion){
                                    ?>
                                    <?php if($inscripcion->audio == "audio_defaul.mp3"){ ?>     
                                        <tr class="danger">
                                    <?php }else{ ?>
                                        <tr ">
                                    <?php } ?>    
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
                                                    echo "0 participantes";
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $inscripcion->audio; ?></td>
                                       
                                    </tr>
                                    <?php
                                }*/
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