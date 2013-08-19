<?php

class TestCommand extends CConsoleCommand 
{
         
    /**
     * 在这里写入你的代码逻辑。
     * eg: protected/yiic test index --id=15   
     */
    public function actionIndex($id='') {
         
        //$model=Posts::model()->findByPk(10);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model = Posts::model()->updateByPk($id, array('bp_score'=>11));

		// if(isset($_POST['Posts']))
		// {
			 // $model->bp_score=100;
			 // $model->save();
		//}
         //echo var_dump($model->errors);
         print_r($model);
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
         
}