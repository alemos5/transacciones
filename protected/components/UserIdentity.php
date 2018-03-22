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
    if($user===null)
      $this->errorCode=self::ERROR_USERNAME_INVALID;
    else if(!$user->validatePassword($this->password))
      $this->errorCode=self::ERROR_PASSWORD_INVALID;
    else {
      $this->setState('_id', $user->usuario);
      $this->setState('id_usuario_sistema', $user->id_usuario_sistema);
      $this->setState('id_perfil_sistema', $user->id_perfil_sistema);
      $this->setState('id_sociedad', $user->id_sociedad);
      $this->setState('code_cliente', $user->code_cliente);
      $this->setState('id_cliente', $user->id_cliente);
      $this->setState('img', $user->img);
      $this->errorCode=self::ERROR_NONE;
    }
    return $this->errorCode==self::ERROR_NONE;
  }
}