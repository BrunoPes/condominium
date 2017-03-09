<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	public $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);

		$record = Usuario::model()->find('email = :login', array(':login' => $this->username));
        if ($record === null){
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        	return false;
        }else if (!$record->validationPassword($this->password)){
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
            return false;
        }else {
			$this->_id = $record->id;
            $this->setState('id', $record->id);
            $this->setState('nome', $record->name);
            $this->setState('email', $record->email);
            $this->setState('userType', $record->tipoUsuario);
            $this->errorCode = self::ERROR_NONE;
        	return true;
        }
        return false;
	}

	public function getId() {
        return $this->_id;
    }
}
