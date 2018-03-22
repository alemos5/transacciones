<?php
/**
* Wrapper function for Yii::t()
*/
function __($string, $params = array(), $category = "") {
return Yii::t($category, $string, $params);
}