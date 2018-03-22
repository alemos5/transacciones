<?php
class ValidatorRIF {
  function validate($rif) {
    $retorno = preg_match("/^([VEJGP]{1})([0-9]{9}$)/", $rif);
    if ($retorno) {
      $digitos = str_split($rif);
      $digitos[8] *= 2;
      $digitos[7] *= 3;
      $digitos[6] *= 4;
      $digitos[5] *= 5;
      $digitos[4] *= 6;
      $digitos[3] *= 7;
      $digitos[2] *= 2;
      $digitos[1] *= 3;
      // Determinar dígito especial según la inicial del RIF
      // Regla introducida por el SENIAT
      switch ($digitos[0]) {
        case 'V':
          $digitoEspecial = 1;
          break;
        case 'E':
          $digitoEspecial = 2;
          break;
        case 'J':
          $digitoEspecial = 3;
          break;
        case 'P':
          $digitoEspecial = 4;
          break;
        case 'G':
          $digitoEspecial = 5;
          break;
      }
      $suma = (array_sum($digitos)- $digitos[9]) + ($digitoEspecial*4);
      $residuo = $suma % 11;
      $resta = 11 - $residuo;
      $digitoVerificador = ($resta >= 10) ? 0 : $resta;
      if ($digitoVerificador != $digitos[9]) $retorno = false;
    }
    return $retorno;
  }
}