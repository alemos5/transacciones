<?php
/**
 * YiiPDF class file.
 *
 * @author ikirux
 * @link http://www.yiiframework.com/
 *
 * This is a fork of http://www.yiiframework.com/extension/tcpdf
 */

/**
 * Include the the TCPDF class. IMPORTANT: Don't forget to customize its configuration
 * if needed.
 */
define("K_PATH_CACHE", Yii::app()->getRuntimePath());
define("TCPDF_INSTALL_DIR", Yii::getPathOfAlias('ven') . '/tecnick.com/tcpdf/');
require_once(TCPDF_INSTALL_DIR . 'config/tcpdf_config.php');
require_once(TCPDF_INSTALL_DIR . 'tcpdf.php');

/**
 * TcPDF is a simple wrapper for the TCPDF library.
 * @see http://www.tecnick.com/public/code/cp_dpage.php?aiocp_dp=tcpdf
 */
class YiiPDF
{
   	/**
     * The internal TCPDF object.
     *
     * @var object TCPDF
     */
   	private $myTCPDF = null;

	/**
	 * This is the class constructor.
	 * It allows to set up the page format, the orientation and the measure unit used in all the methods (except for the font sizes).
	 * 
	 * IMPORTANT: Please note that this method sets the mb_internal_encoding to ASCII, so if you are using the mbstring module functions 
	 * with TCPDF you need to correctly set/unset the mb_internal_encoding when needed.
	 * 
	 * @param $orientation (string) page orientation. Possible values are (case insensitive):<ul><li>P or Portrait (default)</li><li>L or Landscape</li><li>'' (empty string) for automatic orientation</li></ul>
	 * @param $unit (string) User measure unit. Possible values are:<ul><li>pt: point</li><li>mm: millimeter (default)</li><li>cm: centimeter</li><li>in: inch</li></ul><br />A point equals 1/72 of inch, that is to say about 0.35 mm (an inch being 2.54 cm). This is a very common unit in typography; font sizes are expressed in that unit.
	 * @param $format (mixed) The format used for pages. It can be either: one of the string values specified at getPageSizeFromFormat() or an array of parameters specified at setPageFormat().
	 * @param $unicode (boolean) TRUE means that the input text is unicode (default = true)
	 * @param $encoding (string) Charset encoding (used only when converting back html entities); default is UTF-8.
	 * @param $diskcache (boolean) If TRUE reduce the RAM memory usage by caching temporary data on filesystem (slower).
	 * @param $pdfa (boolean) If TRUE set the document to PDF/A mode.
	 * @public
	 * @see getPageSizeFromFormat(), setPageFormat()
	 */
	public function __construct($orientation = 'P', $unit = 'mm', $format = 'A4', $unicode = true, $encoding = 'UTF-8', $diskcache = false, $pdfa = false)
    {
		$this->myTCPDF = new TCPDF($orientation, $unit, $format, $unicode, $encoding);
   	}

   	/**
     * PHP defined magic method
     *
     */
	public function __call($method, $params)
	{
		if (is_object($this->myTCPDF) && get_class($this->myTCPDF) === 'TCPDF') {
			return call_user_func_array([$this->myTCPDF, $method], $params);
		} else {
			throw new CException(Yii::t('TcPDF', 'Can not call a method of a non existent object'));
		}
	}

	public function __set($name, $value)
	{
		if (is_object($this->myTCPDF) && get_class($this->myTCPDF) === 'TCPDF') {
	   		$this->myTCPDF->$name = $value;	
	   	} else {
	   		throw new CException(Yii::t('TcPDF', 'Can not set a property of a non existent object'));
	   	}
	}

	public function __get($name)
	{
	   	if (is_object($this->myTCPDF) && get_class($this->myTCPDF) === 'TCPDF') {
	   		return $this->myTCPDF->$name;
	   	} else {
	   		throw new CException(Yii::t('TcPDF', 'Can not access a property of a non existent object'));
	   	}
	}

	/**
	 * Cleanup work before serializing.
	 * This is a PHP defined magic method.
	 * @return array the names of instance-variables to serialize.
	 */
	public function __sleep() {}

	/**
	 * This method will be automatically called when unserialization happens.
	 * This is a PHP defined magic method.
	 */
	public function __wakeup() {}
}