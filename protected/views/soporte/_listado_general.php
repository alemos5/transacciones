<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<?php

$this->breadcrumbs=array(
	'Soportes',
);

$this->menu=array(
array('label'=>'Usuario','url'=>array('index')),
//array('label'=>'Pagos','url'=>array('admin')),
//array('label'=>'Inscripciones','url'=>array('admin')),
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

    var table2 = $('#example2').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
      });
     
    $('#example2 tbody')
    .on( 'mouseenter', 'td', function () {
        var colIdx = table2.cell(this).index().column;

        $( table2.cells().nodes() ).removeClass( 'highlight' );
        $( table2.column( colIdx ).nodes() ).addClass( 'highlight' );
    } );

} );    
</script>
<span class="ez">Soporte Técnico</span>

<div class="pd-inner">
    
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Inscripciones Registradas por el usuario</div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="table table-hover" cellspacing="0">
                            <thead>
                                <tr class="warning" >
                                    <td><center><strong>ID</strong></center></td>
                                    <td><center><strong>Competencia</strong></center></td>
                                    <td><center><strong>Categoría</strong></center></td>
                                    <td><center><strong>Tipo</strong></center></td>
                                    <td><center><strong>Grupo</strong></center></td>
                                    <td><center><strong>Participantes</strong></center></td>
                                    <td><center><strong>Audio</strong></center></td>
                                    <td><center><strong>Validaciones</strong></center></td>
                                    <td><center><strong>Acción</strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $inscripciones = Inscripcion::model()->findAll('id_usuario ='.$id_usuario);
                                    function validacion($tipo){
                                        if($tipo == 1){
                                            echo "Si";
                                        }
                                        if($tipo == 0){
                                            echo "No";
                                        }
                                    }
                                    foreach ($inscripciones as $inscripcion){
                                        ?>
                                        <tr>
                                            <td><center><?php echo $inscripcion->id_inscripcion; ?></center></td>
                                            <td><center><?php echo $inscripcion->idCopetencia->competencia; ?></center></td>
                                            <td><center><?php echo $inscripcion->idCategoria->categoria; ?></center></td>
                                            <td>
                                                <center>
                                                    <?php
                                                        if($inscripcion->id_competencia_tipo == 1){
                                                            echo "Solista";
                                                            $grupo = "-";
                                                            
                                                        }
                                                        if($inscripcion->id_competencia_tipo == 2){
                                                            echo "Pareja";
                                                            $grupo = "-";
                                                        }
                                                        if($inscripcion->id_competencia_tipo == 3){
                                                            echo "Grupo";
                                                            $grupo = $inscripcion->grupo;
                                                        }
                                                        
                                                    ?>
                                                </center>
                                            </td>
                                            <td><center><?php echo $grupo ?></center></td>
                                            <td>
                                                <!--<center>-->
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
                                                <!--</center>-->
                                            </td>
                                            <td><center><?php echo $inscripcion->audio; ?></center></td>
                                            <td>
                                                <!--<center>-->
                                                    <ul>
                                                        <li>
                                                            Acreditado: <?php echo validacion($inscripcion->acreditado); ?>
                                                        </li>
                                                        <li>
                                                            Validado: <?php echo validacion($inscripcion->validado); ?>
                                                        </li>
                                                        <li>
                                                            Musica validada: <?php echo validacion($inscripcion->musica_validada); ?>
                                                        </li>
                                                        <li>
                                                            Orde de Participación: <?php echo $inscripcion->orden; ?>
                                                        </li>
                                                    </ul>
                                                <!--</center>-->
                                            </td>
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                        Acción <span class="caret"></span>
                                                      </button>

                                                      <ul class="dropdown-menu" role="menu">
                                                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/inscripcion/update/<?php echo $inscripcion->id_inscripcion; ?>" target="_black">Editar</a></li>
                                                        <li><a style=" cursor: pointer;" onclick="eliminarInscripcion(<?php echo $inscripcion->id_inscripcion; ?>)">Eliminar</a></li>
                                                        <li><a style=" cursor: pointer;" onclick="validar(<?php echo $inscripcion->id_inscripcion; ?>, 1)" >Acreditar</a></li>
                                                        <li><a style=" cursor: pointer;" onclick="validar(<?php echo $inscripcion->id_inscripcion; ?>, 0)" >Desacreditar</a></li>
                                                      </ul>
                                                    </div>
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
            <div class="panel panel-danger">
                <div class="panel-heading">Listado de Inscripciones donde participa </div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example2" class="table table-hover" cellspacing="0">
                            <thead>
                                <tr class="warning" >
                                    <td><center><strong>ID Participante</strong></center></td>
                                    <td><center><strong>ID Inscripción</strong></center></td>
                                    <td><center><strong>Competencia</strong></center></td>
                                    <td><center><strong>Categoría</strong></center></td>
                                    <td><center><strong>Tipo</strong></center></td>
                                    <td><center><strong>Grupo</strong></center></td>
                                    <td><center><strong>Participante</strong></center></td>
                                    <td><center><strong>Acción</strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $participantes = Participante::model()->findAll('id_usuario ='.$id_usuario);
                                foreach ($participantes as $participante){
                                    ?>
                                    <tr>
                                        <td><center><?php echo $participante->id_participante; ?></center></td>
                                        <td><center><?php echo $participante->id_inscripcion; ?></center></td>
                                        <td><center><?php echo $participante->idCompetencia->competencia; ?></center></td>
                                        <td><center><?php echo $participante->idCategoria->categoria; ?></center></td>
                                        <td>
                                            <center>
                                                <?php
                                                    if($participante->idInscripcion->id_competencia_tipo == 1){
                                                        echo "Solista";
                                                        $grupo = "-";

                                                    }
                                                    if($participante->idInscripcion->id_competencia_tipo == 2){
                                                        echo "Pareja";
                                                        $grupo = "-";
                                                    }
                                                    if($participante->idInscripcion->id_competencia_tipo == 3){
                                                        echo "Grupo";
                                                        $grupo = $participante->idInscripcion->grupo;
                                                    }
                                                ?>
                                            </center>
                                        </td>
                                        <td><center><?php echo $grupo; ?></center></td>
                                        <td><center><?php echo $participante->idUsuario->primer_nombre." ".$participante->idUsuario->primer_apellido; ?></center></td>
                                        
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                        Acción <span class="caret"></span>
                                                      </button>

                                                      <ul class="dropdown-menu" role="menu">
                                                        <li><a style=" cursor: pointer;" onclick="eliminarParticipacion(<?php echo $participante->id_inscripcion; ?>, <?php echo $participante->id_participante; ?>, <?php echo $id_usuario; ?>)">Eliminar</a></li>
                                                      </ul>
                                                    </div>
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
            location.reload();
        });
    } else {
//        mensaje = "Has clickado Cancelar";
    }

}      
    
function eliminarInscripcion(id_inscripcion){
    var mensaje;
    var opcion = confirm("¿Realmente desea eliminar la inscripcion seleccionada?");
    if(id_inscripcion != ""){
        if (opcion == true) {
            $.post("<?php echo Yii::app()->createUrl('inscripcion/eliminarInscripcion') ?>",{ id_inscripcion:id_inscripcion},
            function(data){
                location.reload();
            });
        } 
    
    }
}      
    
function eliminarParticipacion(id_inscripcion, id_participante, id_usuario){
    var mensaje;
    var opcion = confirm("¿Realmente desea eliminar la participación seleccionada?");
    if(id_participante != ""){
        if (opcion == true) {
            $.post("<?php echo Yii::app()->createUrl('inscripcion/eliminarParticipacion') ?>",{ id_participante:id_participante, id_usuario:id_usuario, id_inscripcion:id_inscripcion},
            function(data){
                location.reload();
            });
        } 
    
    }
} 

</script>