<?php
class Date {
  function convertDateHoraEsToEn($date) {

    $diahora=explode(" ",$date);
    
    $date=explode("-",$diahora[0]);
    $year=$date[2];
    $month=$date[1];
    $day=$date[0];
    $date=$year."-".$month."-".$day;

    return $date.' '.$diahora[1];
  }
  
  function convertDateEsToEn($date) {
    $date=explode("-",$date);
    $year=$date[2];
    $month=$date[1];
    $day=$date[0];
    $date=$year."-".$month."-".$day;
    return $date;
  }
  
  function convertDateEnToEs($date) {
    $date=explode("-",$date);
    $year=$date[0];
    $month=$date[1];
    $day=$date[2];
    $date=$day."-".$month."-".$year;
    return $date;
  }
  
  function fechaFormato($date){
      date("d-m-Y", strtotime($date)); 
      return $date;
  }
  
  function convertDateLargaEnToEs($date) {
    $date=explode("-",$date);
    $year=$date[0];
    $month=$date[1];
    $day=$date[2];
    
    $meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');

    if($month<10){
        $mes = substr($month,1,1);
    }
    
    
    $date=$day." de ".$meses[$mes]." de ".$year;
    return $date;
  }
  
  function getAge($date) {
    list($year,$month,$day) = explode("-",$date);
    $year_dif = date("Y") - $year;
    $month_dif = date("m") - $month;
    $day_dif = date("d") - $day;
    if ($month_dif < 0 || ($month_dif == 0 && $day_dif < 0))
      $year_dif--;
    return $year_dif;
  }
  function fechaStrtotime($date) {
      if($date!=''){
        $fecha = date('d-m-Y', strtotime($date));
        return $fecha;
      }
  }
  
}