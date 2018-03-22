<span class="ez">Payments: Competitor pass</span>

<div class="pd-inner">
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label required" for="Usuario_tipo_documento">
                <?php echo __('Identification'); ?>:
            <span class="required">*</span>
            </label>
            <select id="tipo_documento" class="span5 form-control" placeholder="Tipo Documento" name="tipo_documento">
                <option value=""><?php echo __('Select...'); ?></option>
                <option selected="selected" value="1">National ID</option>
                <option value="2"><?php echo __('Driver license'); ?></option>
                <option value="3">Cédula de Extranjería</option>
                <option value="4"><?php echo __('Passport'); ?></option>
                <option value="5">Tarjeta de Identidad</option>
                <option value="6">Registro Civil</option>
            </select>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">

            <label class="control-label required" for="Usuario_tipo_documento">
               <?php echo __('Number of Identification'); ?>:
            <span class="required">*</span>
            </label>
            <div class="col-sm-12 bootstrap-timepicker input-group">
                <input onblur='findIdentificacion(this.value)'  style=" width: 100%;" id="usuarioBusqueda" class="form-control" type="text" onblur="" placeholder="<?php echo __('ID Number'); ?>" name="correoBusqueda" maxlength="30" size="45">
                <label onclick="findIdentificacion()" class="input-group-addon btn btn-primary" style="width: 10%;" onclick="">
                    <span onclick="findIdentificacion()" class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    <?php echo __('Search'); ?>
                </label>
            </div>
        </div>
    </div>
</div>
    <br>
    <br>
    <div id="resultado"></div>
    
    
</div>

<script>
       
function findIdentificacion(identificacion) {
  var id = $('#id').val();
//  alert(id);
  var tipo = $('#tipo').val();  
  identificacion = document.getElementById("usuarioBusqueda").value;
  var tipo_documento = document.getElementById("tipo_documento").value;   
  $.post("<?php echo Yii::app()->createUrl('site/findIdentificacion2') ?>",{ tipo_documento:tipo_documento, identificacion:identificacion, id:id, tipo:tipo },
  function(data){
//     if(data == 1){
//         alert("Ya el usuario se encuentra registrado");
//         $('#errorRegistro').css('display', 'block');
//         $('#cedulaE').css('display', 'block');
//     }else{
//         $('#errorRegistro').css('display', 'none');
//         $('#cedulaE').css('display', 'none');
//     }
     $('#resultado').html(data);
  });
}
</script>


