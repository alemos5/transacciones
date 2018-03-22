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

<span class="ez">
    <?php echo __('Validate music: '); ?><?php echo $competencia->competencia; ?> / <?php echo __('Category'); ?>: <?php echo $categoria->categoria?>
    <div class="pull-right "  >
        <a class="btn btn-default" href="javascript:window.history.go(-1);">
            <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;&nbsp;<?php echo __('To return'); ?>
        </a>
    </div>
</span>
<div class="pd-inner">

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('List of Registrations'); ?></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="table table-hover" cellspacing="0">
                            <thead>
                                <tr>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Competition'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Block'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Category'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Id Registrations'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Number of Registrations'); ?></strong></center></td>
                                    <td style=" width: 20%;"><center><strong><?php echo __('Participants'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Audio'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Validate'); ?></strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND musica_validada = 0 Order by orden ASC');
                                foreach ($inscripciones as $inscripcion){
                                    ?>
                                    <?php if($inscripcion->audio == "audio_defaul.mp3"){ ?>     
                                        <tr class="danger">
                                    <?php }else{ ?>
                                        <tr>
                                    <?php } ?>    
                                        <td><?php echo $inscripcion->idCopetencia->competencia; ?></td>
                                        <td><?php echo $inscripcion->idCategoria->idBloque->bloque; ?></td>
                                        <td><?php echo $inscripcion->idCategoria->categoria; ?></td>
                                        <td><center><?php echo $inscripcion->id_inscripcion; ?></center></td>
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
                                        <td>
                                            <?php 
                                                echo $inscripcion->audio; 
                                            ?>
                                            <br><br>
                                            <a target="_blank" href="http://appwin.net<?php echo Yii::app()->request->baseUrl; ?>/images/audio/<?php echo $inscripcion->audio; ?>">
                                            <button type="button" class="btn btn-danger">
                                                Reproducir
                                            </button>
                                            </a>
                                        </td>
                                        <td>
                                            <center>
                                            <?php // if($inscripcion->audio != "audio_defaul.mp3"){ ?>    
                                                <a title="Validar" onclick="validar(<?php echo $inscripcion->id_inscripcion; ?>, 1)" href="">
                                                    <span title="Validar" onclick="validar(<?php echo $inscripcion->id_inscripcion; ?>, 1)" class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                                                </a>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <a title="Validar" target="_black" href="<?php echo Yii::app()->request->baseUrl; ?>/inscripcion/update/<?php echo $inscripcion->id_inscripcion; ?>">
                                                    <span title="Validar" onclick="" class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                                </a>
                                            <?php // } ?>    
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
    
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><?php echo __('Validated'); ?></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example2" class="table table-hover" cellspacing="0">
                            <thead>
                                <tr>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Competition'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Block'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Category'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Id Registrations'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Number of Registrations'); ?></strong></center></td>
                                    <td style=" width: 20%;"><center><strong><?php echo __('Participants'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Audio'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Validate'); ?></strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND musica_validada = 1 Order by orden ASC');
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
                                        <td><center><?php echo $inscripcion->id_inscripcion; ?></center></td>
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
                                        <td><?php echo $inscripcion->audio; ?>
                                        <br><br>
                                            <a target="_blank" href="http://appwin.net<?php echo Yii::app()->request->baseUrl; ?>/images/audio/<?php echo $inscripcion->audio; ?>">
                                            <button type="button" class="btn btn-primary">
                                                Reproducir
                                            </button>
                                            </a>
                                        </td>
                                        <td>
                                            <center>
                                            <?php // if($inscripcion->audio != "audio_defaul.mp3"){ ?>    
                                                <a title="Eliminar validación" onclick="validar(<?php echo $inscripcion->id_inscripcion; ?>, 0)" href="">
                                                    <span title="Eliminar validación" onclick="validar(<?php echo $inscripcion->id_inscripcion; ?>, 0)" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                                </a>
                                            <?php // } ?>    
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
<?php
}else{
    echo "Debe de seleccionar una competencia.";
}
?>

<script>
function validar(inscripcion, accion){

    var mensaje;
    if(accion  == 1){
        var opcion = confirm("¿Realmente desea validar la musica de la inscripción?");
    }else{
        var opcion = confirm("¿Realmente desea eliminar la validación de la musica para la inscripción?");
    }
    if (opcion == true) {
        $.post("<?php echo Yii::app()->createUrl('inscripcion/validarMusica') ?>",{ inscripcion:inscripcion, accion:accion },
        function(data){
//            location.reload();
        });
    } else {
//        mensaje = "Has clickado Cancelar";
    }

}    
</script>