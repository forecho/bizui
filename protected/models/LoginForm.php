<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $bu_email;
	public $bu_password;
	public $rememberMe;
	
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that bu_email and bu_password are required,
	 * and bu_password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// bu_email and bu_password are required
			array('bu_email, bu_password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// bu_password needs to be authenticated
			array('bu_password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the bu_password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->bu_email,$this->bu_password);
			if(!$this->_identity->authenticate())
				$this->addError('bu_password','Incorrect bu_email or bu_password.');
		}
	}

	/**
	 * Logs in the user using the given bu_email and bu_password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->bu_email,$this->bu_password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
