<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $bu_email;
	public $bu_name;
	public $bu_password;
	public $rememberMe = 1;
    public $agreement = 1;
	public $returnUrl;
	
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that bu_email and bu_password are required,
	 * and bu_password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('bu_email', 'required', 'message'=>t('please_input_your_email', 'model')),
			array('bu_email', 'unique', 'className'=>'User', 'attributeName'=>'bu_email', 'on'=>'signup', 'message'=>t('email_is_exist', 'model')),
			array('bu_email', 'email'),

			array('bu_name', 'required', 'message'=>t('please_input_your_nickname', 'model'), 'on'=>'signup'),
            array('bu_name', 'unique', 'className'=>'User', 'attributeName'=>'bu_name', 'on'=>'signup', 'message'=>t('nickname_is_exist', 'model')),
       
			
			array('bu_password', 'required', 'message'=>t('please_input_your_password', 'model')),
			array('bu_password', 'authenticate', 'on'=>'login'),

			array('bu_email, returnUrl', 'length', 'max'=>255),
			array('agreement', 'compare', 'compareValue'=>true, 'on'=>'signup', 'message'=>t('please_agree_policy', 'model')),

			array('rememberMe', 'boolean', 'on'=>'login'),
            array('bu_name, bu_password', 'length', 'min'=>3, 'max'=>50),
            array('bu_email, returnUrl', 'length', 'max'=>255),
            array('rememberMe', 'in', 'range'=>array(0, 1)),
		);
	}


	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'bu_email' => t('bu_email', 'model'),
			'bu_name' => t('bu_name', 'model'),
			'bu_password' => t('bu_password', 'model'),
			'rememberMe'=>t('remember_me', 'model'),
			'agreement' => t('agreement', 'model'),
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
			if(!$this->_identity->authenticate()){
				$this->addError($attribute, t('email_or_password_error', 'model'));
			}
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
			//登录成功更新时间和IP
			User::model()->updateByPk(Yii::app()->user->id,array('bu_last_time'=>time(), 'bu_last_ip'=>GetIP())); 
			return true;
		}
		else
			return false;
	}

	/**
     * 创建新账号
     */
    public function signup()
    {
        $user = new User();
	    $user->bu_email = $this->bu_email;
	    $user->bu_name = $this->bu_name;
	    $user->bu_password = md5($this->bu_password);

	    if ($user->save()) {
	        $this->afterSignup($user);
	        return true;
	    }
	    else
	        return false;
    }


    public function afterLogin()
    {
        
        $returnUrl = urldecode($this->returnUrl);
        if (empty($returnUrl))
            $returnUrl = strip_tags(trim($_GET['url']));
        if (empty($returnUrl))
                $returnUrl = aurl('user/default');
        
        request()->redirect($returnUrl);
        exit(0);
    }
    
    public function afterSignup($user)
    {
        user()->loginRequired();
        exit(0);
    }

}
