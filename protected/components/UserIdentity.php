<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the email and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;
	private $_name;

	public function authenticate()
	{
		//转小写
		$email = strtolower($this->username);
		//$bu_email作为条件进入数据库查询匹配
		$user = User::model()->find('bu_email = ?', array($email));
		
		//用户名不存在，报错
		if ($user === null){
		
			$this->errorCode = self::ERROR_USERNAME_INVALID;

		}elseif ($user->bu_password != md5($this->password)){
		
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		
		}else {
		
			$this->errorCode = self::ERROR_NONE;
			$this->_id = $user->bu_id;
			$this->_name = $user->bu_name;
			$this->cacheUserData($user);
		}
		return !$this->errorCode;
	}

	public function getId()
	{
	    return $this->_id;
	}

	public function getEmail()
	{
	    return $this->username;
	}

	public function getName()
	{
	    return $this->_name;
	}

	/**
	 * 设置用户资料，放入session中
	 * @param User $user
	 */
	private function cacheUserData($u)
	{
	    $s = app()->session;
	}
}