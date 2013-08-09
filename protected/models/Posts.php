<?php

/**
 * This is the model class for table "{{posts}}".
 *
 * The followings are the available columns in table '{{posts}}':
 * @property string $bp_id
 * @property integer $bu_id
 * @property string $bp_title
 * @property string $bp_url
 * @property string $bp_video_url
 * @property string $bp_content
 * @property string $bp_score
 * @property integer $bp_like
 * @property integer $bp_create_time
 */
class Posts extends CActiveRecord
{	
	//排序,new
	public $order;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Posts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{posts}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bp_url', 'required'),
			array('bu_id, bp_like, bp_create_time', 'numerical', 'integerOnly'=>true),
			array('bp_title, bp_url, bp_video_url, bp_content', 'length', 'max'=>255),
			array('bp_score', 'length', 'max'=>20),
			array('bp_url', 'url'),
			array('bp_url', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('bp_id, bu_id, bp_title, bp_url, bp_video_url, bp_content, bp_score, bp_like, bp_create_time, order', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user'=>array(self::BELONGS_TO, 'User', 'bu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'bp_id' => 'Bp',
			'bu_id' => 'Bu',
			'bp_title' => '标题',
			'bp_url' => '网页地址',
			'bp_video_url' => 'Bp Video Url',
			'bp_content' => '简介',
			'bp_score' => 'Bp Score',
			'bp_like' => 'Bp Like',
			'bp_create_time' => 'Bp Create Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('bp_id',$this->bp_id,true);
		$criteria->compare('bu_id',$this->bu_id);
		$criteria->compare('bp_title',$this->bp_title,true);
		$criteria->compare('bp_url',$this->bp_url,true);
		$criteria->compare('bp_video_url',$this->bp_video_url,true);
		$criteria->compare('bp_content',$this->bp_content,true);
		$criteria->compare('bp_score',$this->bp_score,true);
		$criteria->compare('bp_like',$this->bp_like);
		$criteria->compare('bp_create_time',$this->bp_create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
		        'pageSize'=>20,
		    ),
		));
	}
}