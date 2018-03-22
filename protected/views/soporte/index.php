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

    

} );    
</script>
<span class="ez">Soporte Técnico</span>

<div class="pd-inner">
    
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Usuarios</div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="table row-border hover order-column" cellspacing="0">
                            <thead>
                                <tr>
                                    <td><center><strong>#</strong></center></td>
                                    <td><center><strong>Tipo de D</strong></center></td>
                                    <td><center><strong>ID</strong></center></td>
                                    <td><center><strong>Nombres</strong></center></td>
                                    <td><center><strong>Apellidos</strong></center></td>
                                    <td><center><strong>correo</strong></center></td>
                                    <td><center><strong>Perfil</strong></center></td>
                                    <td><center><strong>Estatus</strong></center></td>
                                    <td><center><strong></strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $usuarios = Usuario::model()->findAll();
                                    foreach ($usuarios as $usuario){
                                        ?>
                                        <?php
                                            if($usuario->estatus == 1){
                                            ?><tr><?php
                                            }else{
                                                ?><tr class="danger"><?php    
                                            }
                                        ?>
                                        
                                            <td><center><?php echo $usuario->id_usuario_sistema; ?></center></td>
                                            <td>
                                                <center>
                                                    <?php
                                                        if($usuario->tipo_documento == 1){
                                                            echo "National ID";
                                                        }
                                                        if($usuario->tipo_documento == 2){
                                                            echo "Driver License";
                                                        }
                                                        if($usuario->tipo_documento == 3){
                                                            echo "National ID";
                                                        }
                                                        if($usuario->tipo_documento == 4){
                                                            echo "Cédula de Extranjería";
                                                        }
                                                        if($usuario->tipo_documento == 5){
                                                            echo "Tarjeta de Identidad";
                                                        }
                                                        if($usuario->tipo_documento == 6){
                                                            echo "Registro CivilD";
                                                        }
                                                    ?>
                                                </center>
                                            </td>
                                            <td><center><?php echo $usuario->cedula; ?></center></td>
                                            <td><center><?php echo $usuario->primer_nombre; ?></center></td>
                                            <td><center><?php echo $usuario->primer_apellido; ?></center></td>
                                            <td><center><?php echo $usuario->correo; ?></center></td>
                                            <td><center><?php echo $usuario->idPerfilSistema->nombre; ?></center></td>
                                            <td>
                                                <center>
                                                    <?php
                                                        if($usuario->estatus == 1){
                                                            echo "Activo";
                                                        }else{
                                                            echo "Inactivo";
                                                        }
                                                    ?>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                        Acción <span class="caret"></span>
                                                      </button>

                                                      <ul class="dropdown-menu" role="menu">
                                                        <li><a onclick="resetClave(<?php echo $usuario->id_usuario_sistema; ?>)"  href="">Reiniciar Clave</a></li>
                                                        <li><a onclick="activarUsuario(<?php echo $usuario->id_usuario_sistema; ?>, 1)" href="">Activar</a></li>
                                                        <li><a onclick="activarUsuario(<?php echo $usuario->id_usuario_sistema; ?>, 0)" href="">Desactivar</a></li>
                                                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/usuario/update/<?php echo $usuario->id_usuario_sistema; ?>">Editar</a></li>
                                                        <li><a onclick="eliminarUsuario(<?php echo $usuario->id_usuario_sistema; ?>)" href="">Eliminar</a></li>
                                                        <li class="divider"></li>
                                                        <!--<li><a href="#">Pagos</a></li>-->
                                                        <li><a target="_black" href="listadoGeneral?id=<?php echo base64_encode($usuario->id_usuario_sistema); ?>">Datos generales</a></li>
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
function resetClave(id_usuario){
    var mensaje;
    var opcion = confirm("¿Realmente desea reiniciar la clave del usuario?");
    if(id_usuario != ""){
        if (opcion == true) {
            $.post("<?php echo Yii::app()->createUrl('usuario/resetClave') ?>",{ id_usuario:id_usuario},
            function(data){
//                location.reload();
            });
        } 
    
    }
} 
function activarUsuario(id_usuario, accion){

    var mensaje;
    if(accion == 1){
        var opcion = confirm("¿Realmente desea activar el usuario?");
    }else{
        var opcion = confirm("¿Realmente desea desactivar el usuario?");
    }
    
    if(id_usuario != ""){
        if (opcion == true) {
            $.post("<?php echo Yii::app()->createUrl('usuario/activarUsuarioTecnico') ?>",{ id_usuario:id_usuario, accion:accion},
            function(data){
                location.reload();
            });
        } 
    
    }
}     
function eliminarUsuario(id_usuario, accion){

    var mensaje;
    var opcion = confirm("¿Realmente desea eliminar el usuario?");
    if(id_usuario != ""){
        if (opcion == true) {
            $.post("<?php echo Yii::app()->createUrl('usuario/eliminarUsuario') ?>",{ id_usuario:id_usuario, accion:accion},
            function(data){
                location.reload();
            });
        } 
    
    }
}    


</script>