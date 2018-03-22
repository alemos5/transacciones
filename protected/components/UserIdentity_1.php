<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
  /**
   * Authenticates a user.
   * The example implementation makes sure if the username and password
   * are both 'demo'.
   * In practical applications, this should be changed to authenticate
   * against some persistent user identity storage (e.g. database).
   * @return boolean whether authentication succeeds.
   */
  public function authenticate() {
    $username=strtolower($this->username);
    $user=Usuario::model()->find('LOWER(usuario)=?', array($username));
    
    
    
//    echo $this->username." / ".$this->password;
    $usuario = $this->username;
    $clave = $this->password;
    /*==================================*\
           Validando las palabras y password
        \*==================================*/
//        $patron = '/[a-zA-Z]/';
//        if(!preg_match($patron,$usuario)) {
//            echo "Error";
//        }
//        if(empty($clave) && $clave == NULL) {
//            echo "Error";
//        }
//
//        /*===================================*\
//           Datos LDAP
//        \*===================================*/
//        $atributos = array ("uid","mail","telephonenumber","userPassword","Pager");
//        $ldapconex = @ldap_connect("10.1.0.112","389") or die("No ha sido posible conectarse al servidor $servidor_ldap");;
//        ldap_set_option($ldapconex, LDAP_OPT_PROTOCOL_VERSION, 3);
//        $filtro = "(uid=".$usuario.")";
//        $base = "ou=Usuarios,ou=Cuentas,dc=ipostel,dc=ve";
//        $ldapget = @ldap_search($ldapconex,$base,$filtro,$atributos);
//        $ldapcat = @ldap_get_entries($ldapconex,$ldapget);


//
//        if($ldapcat[0]["uid"][0] == NULL || empty($ldapcat[0]["uid"][0])) {
//            log_user($log);	
//            echo "Error";
//        }
//
//        $bind=ldap_bind($ldapconex,$ldapcat[0]['dn'],$clave);
//
//
//        if (!$bind) {
//            log_user($log);
//            echo "Error";
//        }else{
//            
//            die("Components: UserIdentity -> Paso");
    
    
    
    if($user->estatus == 1){
//        echo "inactivo"; die();
        if($user===null)
          $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!$user->validatePassword($this->password))
          $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else {

            $this->setState('_id', $user->usuario);
            //session_start();

            if(isset($_SESSION['idioma_login']) and $_SESSION['idioma_login']!='') {
                $this->setState('idioma', $_SESSION['idioma_login']);
                Yii::app()->language=$_POST['idioma'];
            }else{
                $this->setState('idioma', 'en');
                Yii::app()->language='en';
            }

            $this->setState('id_usuario_sistema', $user->id_usuario_sistema);
            $this->setState('id_perfil_sistema', $user->id_perfil_sistema);
            $this->setState('img', $user->img);
            $this->setState('id_sociedad', $user->id_sociedad);

            $this->errorCode=self::ERROR_NONE;
        }
    }
//  }
    return $this->errorCode==self::ERROR_NONE;
//  }
//    public function prueba(){
//        echo "prueba";
//    }


//    public function autenticarLDAP($usuario,$clave) {
//        echo  $usuario." / ".$clave;
//        
//        /*==================================*\
//           Validando las palabras y password
//        \*==================================*/
//        $patron = '/[a-zA-Z]/';
//        if(!preg_match($patron,$usuario)) {
//            echo "Error";
//        }
//        if(empty($clave) && $clave == NULL) {
//            echo "Error";
//        }
//
//        /*===================================*\
//           Datos LDAP
//        \*===================================*/
//        $atributos = array ("uid","mail","telephonenumber","userPassword","Pager");
//        $ldapconex = @ldap_connect("10.1.0.112","389") or die("No ha sido posible conectarse al servidor $servidor_ldap");;
//        ldap_set_option($ldapconex, LDAP_OPT_PROTOCOL_VERSION, 3);
//        $filtro = "(uid=".$usuario.")";
//        $base = "ou=Usuarios,ou=Cuentas,dc=ipostel,dc=ve";
//        $ldapget = @ldap_search($ldapconex,$base,$filtro,$atributos);
//        $ldapcat = @ldap_get_entries($ldapconex,$ldapget);
//
//
//
//        if($ldapcat[0]["uid"][0] == NULL || empty($ldapcat[0]["uid"][0])) {
//            log_user($log);	
//            echo "Error";
//        }
//
//        $bind=ldap_bind($ldapconex,$ldapcat[0]['dn'],$clave);
//
//
//        if (!$bind) {
//            log_user($log);
//            echo "Error";
//        }else{
//            $valor = "Paso";
//            echo $valor;
//        } 
//    }
  
}
}