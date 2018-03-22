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
array('label'=>__('Competences'),'url'=>array('index')),
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
     
//    $('#example tbody')
//        .on( 'mouseenter', 'td', function () {
//            var colIdx = table.cell(this).index().column;
// 
//            $( table.cells().nodes() ).removeClass( 'highlight' );
//            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
//        } );

    

} );    
</script>
<span class="ez"><?php echo __('List order / Competition'); ?>: <?php echo $competencia->competencia; ?></span>

<div class="pd-inner">

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('List of Categories'); ?></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="row-border hover order-column" cellspacing="0">
                            <thead>
                                <tr>
                                    <td><center><strong><?php echo __('Competition'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Block'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Categories'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Order'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Number of Registrations'); ?></strong></center></td>
                                    <!--<td><center><strong>Por validar</strong></center></td>-->
                                    <td><center><strong><?php echo __('Detail'); ?></strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $categorias = CompetenciaCategoria::model()->findAll('id_copetencia ='.$competencia->id_copetencia);
                                foreach ($categorias as $categoria){
                                    ?>
                                    <tr>
                                        <td><?php echo $categoria->idCopetencia->competencia; ?></td>
                                        <td><?php echo $categoria->idCategoria->idBloque->bloque; ?></td>
                                        <td><?php echo $categoria->idCategoria->categoria; ?></td>
                                        
                                        <td>
                                            <center>
                                            <?php 
                                                  $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND acreditado = 1');
//                                                  echo count($inscripciones);  
                                            ?>
                                            <div class="form-group">
                                                <div class="col-sm-10 bootstrap-timepicker input-group">
                                                <?php 
                                                if($categoria->validado == 1){
                                                    ?><input disabled="disabled" value="<?php echo $categoria->orden; ?>" onKeyPress="return soloNumeros(event)" id="ordenCategoria<?php echo $categoria->id_competencia_categoria; ?>" class="form-control" type="text" onblur="" placeholder="Orden" name="ordenCategoria" maxlength="4" size="35"><?php
                                                }else{
                                                    ?>
                                                    <input value="<?php echo $categoria->orden; ?>" onKeyPress="return soloNumeros(event)" id="ordenCategoria<?php echo $categoria->id_competencia_categoria; ?>" class="form-control" type="text" onblur="" placeholder="Orden" name="ordenCategoria" maxlength="4" size="35">
                                                    <label class="input-group-addon btn btn-primary" style="width: 10%;" onclick="guardarOrden(<?php  echo $categoria->id_competencia_categoria; ?>)">
                                                        <span  class="glyphicon  glyphicon-floppy-disk" aria-hidden="true"></span>
                                                    </label>    
                                                    <?php
                                                }
                                                ?>
                                                
                                                </div>    
                                            </div>
                                            </center>
                                        </td>
                                        
                                        <td>
                                            <center>
                                            <?php 
                                                $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND acreditado = 1');
                                                echo count($inscripciones);
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
                <div class="panel-heading">Current Order - Referential</div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="row-border hover order-column" cellspacing="0">
                            <thead>
                                <tr>
                                    <td><center><strong><?php echo __('Competition'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Block'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Categories'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Order'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Number of Registrations'); ?></strong></center></td>
                                    <!--<td><center><strong>Por validar</strong></center></td>-->
                                    <!--<td><center><strong>Detallar</strong></center></td>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $categorias = CompetenciaCategoria::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND orden != 0 '.' ORDER BY orden ');
                                foreach ($categorias as $categoria){
                                    ?>
                                    <tr>
                                        <td><?php echo $categoria->idCopetencia->competencia; ?></td>
                                        <td><?php echo $categoria->idCategoria->idBloque->bloque; ?></td>
                                        <td><?php echo $categoria->idCategoria->categoria; ?></td>
                                        
                                        <td>
                                            <center>
                                            <?php 
                                                  $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND acreditado = 1');
//                                                  echo count($inscripciones);  
                                            ?>
                                            <div class="form-group">
                                                <div class="col-sm-10 bootstrap-timepicker input-group">
                                                <input disabled="disabled" value="<?php echo $categoria->orden; ?>" onKeyPress="return soloNumeros(event)" id="ordenCategoria<?php echo $categoria->id_competencia_categoria; ?>" class="form-control" type="text" onblur="" placeholder="<?php echo __('Order'); ?>" name="ordenCategoria" maxlength="4" size="35">
                                                </div>    
                                            </div>
                                            </center>
                                        </td>
                                        
                                        <td>
                                            <center>
                                            <?php 
                                                $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND acreditado = 1');
                                                echo count($inscripciones);
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
<?php
}else{
    echo __('You must select a competition');
}
?>

<script>
function soloNumeros(e)
{
    var key = window.Event ? e.which : e.keyCode
    return ((key >= 48 && key <= 57) || (key==8))
}    

function guardarOrden(id){
    
    var valor = $('#ordenCategoria'+id).val();
    var mensaje;
    var opcion = confirm(<?php echo __('Do you really want to store the indicated order?'); ?>);
    if(valor != ""){
//        alert(valor+' / '+id);
        if (opcion == true) {
            $.post("<?php echo Yii::app()->createUrl('competenciaCategoria/Orden') ?>",{ id:id, valor:valor },
            function(data){
                location.reload();
            });
        } 
    
    }
    
}
</script>
