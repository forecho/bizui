<?php

class PostsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view','ajaxGetScore'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','likeposts'),
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
		$row = $this->loadModel($id);

		$comments = Comments::model()->findAllBySql("SELECT *, CONCAT( bc_path,  '-', bc_id ) AS bpath FROM  {{comments}} WHERE bp_id=$id ORDER BY bpath, bc_create_time");

		$user=User::model()->find('bu_id='.$row->bu_id);

		$model=new Comments;

		if(isset($_POST['Comments']))
		{
			//评论没有登录 跳转登录
			if (!isset(Yii::app()->user->id)) {
				$this->redirect(array('site/login'));
				Yii::app()->end();
			}

			$model->attributes=$_POST['Comments'];
			$model->bu_id=Yii::app()->user->id;
			$model->bp_id=$id;
			$model->bc_parent='0';
			$model->bc_create_time=time();

			if($model->save()){
				if ($user['bu_id']!=app()->user->id) {
					# code...
					
				    $mailer = Yii::app()->phpMailer->_mailer;
				    $mailer->Subject = Yii::app()->user->getName().'刚刚评论了:'.$row->bp_title;
				    $mailer->Body = '<p>Hi,'.$user['bu_name'].'</p>
						<p>'.Yii::app()->user->getName().'在'.CHtml::link($row->bp_title, app()->homeUrl.$this->createUrl('posts/view', array('id'=>$id))).' 发表评论如下:</p>
						<pre style="border:1px solid #ddd;padding:10px 20px;font-family:sans-serif;background:#f2f2f2;line-height:24px">'.$_POST['Comments']['bc_text'].'</pre>
						<p>你可以点击这里查看评论:</p>
						<p>'.CHtml::link(app()->homeUrl.$this->createUrl('posts/view', array('id'=>$id)), app()->homeUrl.$this->createUrl('posts/view', array('id'=>$id))).'</p>
						--'.app()->name;
				    $mailer->AddAddress($user['bu_email']);
				    $mailer->send();
				}

				$this->redirect(array('view','id'=>$id));
			}
		}

		$this->pageTitle = $row->bp_title.' - '.app()->name;

		$this->render('view',array(
			'row'=>$row,
			'comments'=>$comments,
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Posts;

		// 开启Ajax验证
	    if(isset($_POST['ajax']) && $_POST['ajax']==='posts-form')
	    {
	        echo CActiveForm::validate($model);
	        Yii::app()->end();
	    }

		if(isset($_POST['Posts']))
		{
			$model->bu_id=Yii::app()->user->id;
			$model->bp_create_time=time();
			$model->bp_like='1';
			$model->attributes=$_POST['Posts'];
			//调用视频类
			$vider = Yii::createComponent('application.components.VideoClass');
			
			$vider_arr = call_user_func_array(array($vider, 'parse'), array( $_POST['Posts']['bp_url']));
			// var_dump($vider_arr);
			// echo "<hr>";
			// print_r($vider_arr);
			// exit();
			//如果没有title 就自动抓取
			if ($_POST['Posts']['bp_title']=='' && $_POST['Posts']['bp_url']) {
				if ($vider_arr['title']) {
					$model->bp_title = $vider_arr['title'];
				}else{
					$title=GetSiteMeta($_POST['Posts']['bp_url']);
					$model->bp_title=str_replace('—优酷网，视频高清在线观看', '', $title);
				}
			}
			//SWF视频地址
			$model->bp_video_url = $vider_arr['swf'];
			$model->bp_img_url = $vider_arr['img']['large'];

			if($model->save()){
				if ($_POST['Posts']['bp_url']) {
					//发一个链接有5点声望
					$record = User::model()->findByPk(Yii::app()->user->id);
					$record->saveCounters(array('bu_reputation'=>5));
					//添加到收藏
					// $save = new Save;
					// $save->bp_id = $model->bp_id;
					// $save->bu_id = Yii::app()->user->id;
					// $save->save();
				}
				$this->redirect(array('view','id'=>$model->bp_id));
			}
		}

		$this->pageTitle = t('create_posts','main');
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Posts']))
		{
			$model->attributes=$_POST['Posts'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->bp_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Posts the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Posts::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Posts $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='posts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	/**
	 * 更新赞和Score值
	 */
	public function actionAjaxGetScore()
	{
		$id = (int)Yii::app()->request->getParam('id',0);
		$type = (int)Yii::app()->request->getParam('type',1);

		//用户赞同 添加收藏
		$saveCount = Save::model()->countByAttributes(array('bp_id'=>$id, 'bu_id'=>Yii::app()->user->id, 'type'=>1));
		if ($saveCount == 0) {
			$save = new Save;
			$save->bp_id = $id;
			$save->type = $type;
			$save->bu_id = Yii::app()->user->id;
			$save->save();
		}

		if ($type==1) {
			$posts = Posts::model()->findByPk($id);
			//将排名下拉的重力因子
			//该因子决定了post 的下降速度, 值越高排名下降越快, 时效性的参数之一
			define('RANK_G', 1.8);
			//获得的投票
			$vote = $posts->bp_like+1;
			//数据创建时间
			$created = $posts->bp_create_time;
			//距离创建时间的小时数, 时效性的参数之二
			$hourDiffCreated = (time() - $created) / 3600;
			//详细算法
			$score = ($vote - 1) / pow(($hourDiffCreated + 2), RANK_G);
			Posts::model()->updateByPk($id, array('bp_score'=>$score, 'bp_like'=>$posts->bp_like+1));

			//被人赞一次加一分
			$record = User::model()->findByPk($posts->bu_id);
			$record->saveCounters(array('bu_reputation'=>1));
			//赞别人一次减一分
			$userRecord=User::model()->findByPk(Yii::app()->user->id);
			$userRecord->saveCounters(array('bu_reputation'=>-1));

			echo $posts->bp_like+1;
		}else{
			$postRecord=Comments::model()->findByPk($id);
			$postRecord->saveCounters(array('bc_like'=>1));
			echo $postRecord->bc_like;
		}
		
	}

}
