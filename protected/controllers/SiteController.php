<?php

class SiteController extends Controller
{
	public $pageTitle='';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$model = new Posts;
		$model->order = 'bp_score DESC, bp_create_time DESC';

		$this->render('index', array(
				'model'=>$model,
			));
	}

	/**
	 * 最新排序
	 */
	public function actionNew()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$model = new Posts;
		$model->order = 'bp_create_time DESC';

		$this->render('index', array(
				'model'=>$model,
			));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm('login');

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	//注册
 	public function actionSignup()
	{   
        $model = new LoginForm('signup');
        // 开启Ajax验证
        if(isset($_POST['ajax']) && $_POST['ajax']==='signup-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['LoginForm'])) {
            $model->attributes=$_POST['LoginForm'];
            if($model->validate()){
            	if($model->signup()){ 
				   $this->redirect(array('login'));
				}
            }
        }
        
        $this->pageTitle = t('site_signup');
        
        $this->render('signup', array('model'=>$model));
    }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}


	//我的文章
	public function actionMyposts()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$model = new Posts;
		$model->bu_id = Yii::app()->user->id;

		$this->render('index', array(
				'model'=>$model,
			));
	}

	//我的文章
	public function actionLikeposts()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$model = new Posts;
		$model->bu_id = Yii::app()->user->id;

		$this->render('index', array(
				'model'=>$model,
			));
	}

	//发邮件
	public function actionReset()
	{
		$model=new LoginForm('reset');

		if (isset($_POST['LoginForm'])) {
			$model->attributes=$_POST['LoginForm'];
			$address = $_POST['LoginForm']['bu_email'];
			$is_email = User::model()->countByAttributes(array('bu_email'=>$address));

			if($model->validate()){
				//检查email是否存在
				if ($is_email==0) {
					Yii::app()->user->setFlash('error', t('email_not', 'model'));  
	            	$this->refresh();
	            	exit();
				}
				
				$encdata = encryptParamsForUrl(array('mail'=>$address, 'lasttime'=>time()+60*60*2));//加密
				$mailer = Yii::app()->phpMailer->_mailer;
		        $mailer->Subject = '找回密码';
		        $mailer->Body = '<p>Hi,</p>
					<p>我们的系统在'.date('Y-m-d H:i:m',time()).'收到一个请求，说你希望通过电子邮件重新设置你在 你丫闭嘴 的密码。你可以在2个小时之内点击下面的链接开始重设密码：</p>
					<p><a href="'.Yii::app()->homeUrl.$this->createUrl('user/newpwd', array('decdata'=>$encdata)).'">'.Yii::app()->homeUrl.$this->createUrl('user/newpwd', array('decdata'=>$encdata)).'</a></p>
					<p>如果这个请求不是由你发起的，那没问题，你不用担心，你可以安全地忽略这封邮件。</p>
					<p>如果你有任何疑问，可以回复这封邮件向我们提问。</p>
					--你丫闭嘴';
		        $mailer->AddAddress($address);
		        if ($mailer->send()) {
			        Yii::app()->user->setFlash('success', t('email_send_success', 'model'));  
	            	$this->refresh();
	            } else {
		            Yii::app()->user->setFlash('error', t('email_is_error', 'model'));  
	            	$this->refresh();
		        }
		    } 
		}

		$this->render('reset', array(
				'model'=>$model,
			));
	}

}