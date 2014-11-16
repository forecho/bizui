<?php

class TestCommand extends CConsoleCommand 
{
         
    /**
     * 在这里写入你的代码逻辑。
     * eg: protected/yiic test index --id=15   
     */
    public function actionIndex() {
         
        //$model=Posts::model()->findByPk(10);

		//$model = Posts::model()->updateByPk($id, array('bp_score'=>11));
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