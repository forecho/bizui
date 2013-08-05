<?php

/**
 * This is the model class for table "{{comments}}".
 *
 * The followings are the available columns in table '{{comments}}':
 * @property string $bc_id
 * @property integer $bp_id
 * @property integer $bu_id
 * @property string $bc_text
 * @property integer $bc_status
 * @property integer $bc_parent
 * @property integer $bc_like
 * @property integer $bc_create_time
 * @property string $bc_path
 */
class Comments extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comments the static model class
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
		return '{{comments}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bc_text', 'required'),
			array('bp_id, bu_id, bc_status, bc_parent, bc_like, bc_create_time', 'numerical', 'integerOnly'=>true),
			array('bc_path', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('bc_id, bp_id, bu_id, bc_text, bc_status, bc_parent, bc_like, bc_create_time', 'safe', 'on'=>'search'),
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
			'posts'=>array(self::BELONGS_TO, 'Posts', 'bp_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'bc_id' => 'Bc',
			'bp_id' => 'Bp',
			'bu_id' => 'Bu',
			'bc_text' => t('bc_text', 'model'),
			'bc_status' => 'Bc Status',
			'bc_parent' => 'Bc Parent',
			'bc_like' => 'Bc Like',
			'bc_create_time' => 'Bc Create Time',
			'bc_path' => 'Bc Path',
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

		$criteria->compare('bc_id',$this->bc_id,true);
		$criteria->compare('bp_id',$this->bp_id);
		$criteria->compare('bu_id',$this->bu_id);
		$criteria->compare('bc_text',$this->bc_text,true);
		$criteria->compare('bc_status',$this->bc_status);
		$criteria->compare('bc_parent',$this->bc_parent);
		//$criteria->compare('bc_like',$this->bc_like);
		$criteria->compare('bc_create_time',$this->bc_create_time);
		$criteria->compare('bc_path',$this->bc_path);

		$criteria->order = 'bc_create_time DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * 某条文章评论总数
	 */
	public function PostCommentsCount($postid='')
	{
		$n = Comments::model()->count("bp_id=:id",array(":id"=>$postid));
		return $n;  
	}
}