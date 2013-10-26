<?php

class SiteController extends Controller
{
	public $layout='//layouts/column1';
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
				'minLength'=>5,      //设置最短为6位
               	'maxLength'=>6,       //设置最长为7位,生成的code在6-7直接rand了
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
		$user = User::model()->findAll(array('order'=>'bu_reputation DESC', 'limit'=>10));

		$this->render('index', array(
				'model'=>$model,
				'user'=>$user,
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
		$user = User::model()->findAll(array('order'=>'bu_reputation DESC', 'limit'=>10));

		$this->render('index', array(
				'model'=>$model,
				'user'=>$user,
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
			if($model->validate() && $model->login()){
				if (Yii::app()->user->returnUrl=='/index.php?r=site/signup') {
					$this->redirect(array('index'));
				}else{
					$this->redirect(Yii::app()->user->returnUrl);
				}
			}
		}

		$this->pageTitle = t('Login','main');
		// display the login form
		$this->render('login',array('model'=>$model));
	}



  	/**
     * Displays the login page
     */
    public function actionWblogin()
    {
        if(isset($_REQUEST['state'])==Yii::app()->session['sina_state']){
            if(isset($_REQUEST['code'])){
                Yii::import('ext.oauthLogin.sina.sinaWeibo',true);
                $keys = array();
                $keys['code'] = $_REQUEST['code'];
                $keys['redirect_uri'] = WB_CALLBACK_URL;
                try {
                    $weibo = new SaeTOAuthV2(WB_AKEY,WB_SKEY);
                    $sinaToken = $weibo->getAccessToken('code',$keys);
                } catch (CHttpException $e) {

                }
                //获取认证
                 if (isset($sinaToken)) {
                    Yii::app()->session->add('sinaToken',$sinaToken);
                    //查询微博的账号信息
                    $c = new SaeTClientV2( WB_AKEY , WB_SKEY ,Yii::app()->session['sinaToken']['access_token']);
                    $userShow  = $c->getUserShow(Yii::app()->session['sinaToken']); // done
                    var_dump($userShow);
                    //查询是否有绑定账号   
                    $user = User::model()->find('bu_weibo = :access_token',array(':access_token' =>Yii::app()->session['sinaToken']['access_token']));

                    //如果没有存在则创建账号及绑定
                    if (!isset($user)){
                        $userBingding = array();
                        $userBingding['access_token'] = Yii::app()->session['sinaToken']['access_token'];
                        $userBingding['username'] = $userShow['domain'];
                        $userBind = User::addOauth($userBingding, $_REQUEST['state']);
                    }else{
                        Yii::app()->user->id = $user->bu_id;
                        Yii::app()->user->name = $user->bu_name;
                    }
                        
                    $this->redirect(Yii::app()->session['back_url']);
                 }  else {
                     echo '认证失败';
                 }
            }
        }
    }
    
    public function actionQqlogin()
    {
        if(isset($_REQUEST['state'])==Yii::app()->session['qq_state']){
          if(isset($_REQUEST['code'])){
                Yii::import('ext.oauthLogin.qq.qqConnect',true);
                $keys = array();
                $keys['code'] = $_REQUEST['code'];
                $keys['state'] = Yii::app()->session['qq_state'];
                $keys['redirect_uri'] = QQ_CALLBACK_URL;
                try {
                    $qqConnect = new qqConnectAuthV2(QQ_APPID,QQ_APPKEY);
                    $qqToken = $qqConnect->getAccessToken('code',$keys);
                } catch (CHttpException $e) {

                }
                
                if (isset($qqToken)) {
                    Yii::app()->session->add('qqToken',$qqToken);
                    Yii::import('ext.oauthLogin.qq.qqConnect',true);
                    $c = new qqConnectAuthV2(QQ_APPID,QQ_APPKEY);
                    $userInfo = $c->getUserInfo(Yii::app()->session['qqToken']);
                    $userShow= array();
                    $userShow['screen_name'] = $userInfo['nickname'];
                    $userShow['profile_image_url'] = $userInfo['figureurl_2'];
                    //查询是否有绑定账号   
                    // $user = UserBinding::model()->with('user')->find('user_bind_type = :bind_type and user_openid=:openid',array(':bind_type' =>'qq',':openid' =>Yii::app()->session['qqToken']['openid']));
                    $userBingding = array();
                    $userBingding['access_token'] = Yii::app()->session['qqToken']['access_token'];
                    $userBingding['openid'] = Yii::app()->session['qqToken']['openid'];
                    $userBingding['username'] = $userShow['screen_name'];
                    $userBingding['bind_type'] = 'qq';
                    $userBingding['avatar'] = $userShow['profile_image_url']; 
                    //$userBind = UserBinding::addBinding($userBingding, $_REQUEST['state']);
                	var_dump($userBingding);

                    //如果没有存在则创建账号及绑定
                    if (!isset($user)){
                        $userBingding = array();
                        $userBingding['access_token'] = Yii::app()->session['qqToken']['access_token'];
                        $userBingding['openid'] = Yii::app()->session['qqToken']['openid'];
                        $userBingding['username'] = $userShow['screen_name'];
                        $userBingding['bind_type'] = 'qq';
                        $userBingding['avatar'] = $userShow['profile_image_url']; 
                        //$userBind = UserBinding::addBinding($userBingding, $_REQUEST['state']);
                    }else{
                        Yii::app()->user->id = $user->user_id;
                        Yii::app()->user->name = $user->user->username;
                    }
                    //$this->redirect(Yii::app()->session['back_url']);
                }  else {
                    echo '认证失败';
                }
          }
       }
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
            		//欢迎加入 email
            		$mailer = Yii::app()->phpMailer->_mailer;
				    $mailer->Subject = '欢迎加入 '.app()->name;
				    $mailer->Body = '<p>Hi,'.$_POST['LoginForm']['bu_name'].'</p>
						<p>你在'.date('Y-m-d H:i:m',time()).'成功注册了 '.CHtml::link(app()->name, app()->homeUrl).' 的账号。</p>
						<p>登录页面地址:<a href="'.Yii::app()->homeUrl.$this->createUrl('site/login').'">'.Yii::app()->homeUrl.$this->createUrl('site/login').'</a></p>
						<p>如果这个请求不是由你发起的，那没问题，你不用担心，你可以安全地忽略这封邮件。</p>
						<p>如果你有任何疑问，可以回复这封邮件向我们提问。</p>
						--'.app()->name;
				    $mailer->AddAddress($_POST['LoginForm']['bu_email']);
				    $mailer->send();

				   $this->redirect(array('login'));
				}
            }
        }
        
        $this->pageTitle = t('Signup','main');
        
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
					<p>我们的系统在'.date('Y-m-d H:i:m',time()).'收到一个请求，说你希望通过电子邮件重新设置你在 '.app()->name.' 的密码。你可以在2个小时之内点击下面的链接开始重设密码：</p>
					<p><a href="'.Yii::app()->homeUrl.$this->createUrl('user/newpwd', array('decdata'=>$encdata)).'">'.Yii::app()->homeUrl.$this->createUrl('user/newpwd', array('decdata'=>$encdata)).'</a></p>
					<p>如果这个请求不是由你发起的，那没问题，你不用担心，你可以安全地忽略这封邮件。</p>
					<p>如果你有任何疑问，可以回复这封邮件向我们提问。</p>
					--'.app()->name;
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

		$this->pageTitle = t('find_password','main');

		$this->render('reset', array(
				'model'=>$model,
			));
	}

	//手动更新所有的排序
	public function actionUpdate() {
         
		$posts = Posts::model()->findAll();
		foreach ($posts as $key => $value) {
			//将排名下拉的重力因子
			//该因子决定了post 的下降速度, 值越高排名下降越快, 时效性的参数之一
			$rank = 1.8;
			//获得的投票
			$vote = $value->bp_like;
			//数据创建时间
			$created = $value->bp_create_time;
			//距离创建时间的小时数, 时效性的参数之二
			$hourDiffCreated = (time() - $created) / 3600;
			//详细算法
			$score = ($vote - 1) / pow(($hourDiffCreated + 2), $rank);
			$count = Posts::model()->updateByPk($value->bp_id, array('bp_score'=>$score));
		}

        if ($count) {
        	echo "Ok";
        }else{
        	echo "No";
        }
    }


}