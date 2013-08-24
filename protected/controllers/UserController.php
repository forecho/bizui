<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/user';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','newpwd'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','changepwd','myposts','mycomments','likecomments','likeposts'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel(Yii::app()->user->id);

		  	if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		    {
		        echo CActiveForm::validate($model);
		        Yii::app()->end();
		    }

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->bu_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * 修改密码
	 */
	public function actionChangepwd()
	{
		$model=new User('changepwd');

		if(isset($_POST['User']))
		{	
			$model=$this->loadModel(Yii::app()->user->id);
			if (md5($_POST['User']['password_current']) != $model->bu_password) {
				Yii::app()->user->setFlash('error', t('password_current_is_error', 'model'));  
            	$this->refresh();
			}else{
				$model->bu_password=md5($_POST['User']['password']);
				if($model->save()){
					Yii::app()->user->setFlash('success', t('password_change_success', 'model'));  
            		$this->refresh();
            	}
			}
		}

		$this->render('changepwd',array(
			'model'=>$model,
		));

	}


	//我喜欢的文章
	public function actionLikeposts()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$model = new Save;
		$model->bu_id = Yii::app()->user->id;
		$model->type = '1';

		$this->render('likeposts', array(
				'model'=>$model,
			));
	}


	//我的文章
	public function actionMyposts()
	{

		$model = new Posts;
		$model->bu_id = Yii::app()->user->id;

		$this->render('myposts', array(
				'model'=>$model,
			));
	}

	//我赞的评论
	public function actionLikecomments()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$model = new Save;
		$model->bu_id = Yii::app()->user->id;
		$model->type = '2';

		$this->render('likecomments', array(
				'model'=>$model,
			));
	}

	//我发布的评论
	public function actionMycomments()
	{

		$model = new Comments;
		$model->bu_id = Yii::app()->user->id;

		$this->render('mycomments', array(
				'model'=>$model,
			));
	}

	/**
	 * 忘记密码 新密码
	 */
	public function actionNewpwd($decdata)
	{
		$model=new User('newpwd');
		//解密
		$decdata = decryptParamsForUrl($decdata);
		if (time()>$decdata['lasttime']) {
			Yii::app()->user->setFlash('error', t('time_out', 'model'));  
        	$this->refresh();
        	exit();
		}
		if(isset($_POST['User']))
		{	
			$model=User::model()->findByAttributes(array('bu_email'=>$decdata['mail']));
			$model->bu_password=md5($_POST['User']['password']);
			if($model->save()){
				Yii::app()->user->setFlash('success', t('password_change_success', 'model'));  
        		$this->refresh();
        	}
			
		}

		$this->render('newpwd',array(
			'model'=>$model,
		));

	}
}
