<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property string $bu_id
 * @property string $bu_email
 * @property string $bu_name
 * @property string $bu_password
 * @property string $bu_reg_ip
 * @property string $bu_last_ip
 * @property integer $bu_last_time
 * @property integer $bu_create_time
 * @property integer $bu_status
 * @property integer $bu_reputation
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bu_email', 'required'),
			array('bu_last_time, bu_create_time, bu_status', 'numerical', 'integerOnly'=>true),
			array('bu_email', 'length', 'max'=>255),
			array('bu_name, bu_reg_ip, bu_last_ip', 'length', 'max'=>25),
			array('bu_password', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('bu_id, bu_email, bu_name, bu_password, bu_reg_ip, bu_last_ip, bu_last_time, bu_create_time, bu_status, bu_reputation', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'bu_id' => 'Bu',
			'bu_email' => t('bu_email', 'model'),
			'bu_name' => 'Bu Name',
			'bu_password' => 'Bu Password',
			'bu_reg_ip' => 'Bu Reg Ip',
			'bu_last_ip' => 'Bu Last Ip',
			'bu_last_time' => 'Bu Last Time',
			'bu_create_time' => 'Bu Create Time',
			'bu_status' => 'Bu Status',
			'bu_reputation' => 'Bu Reputation',
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

		$criteria->compare('bu_id',$this->bu_id,true);
		$criteria->compare('bu_email',$this->bu_email,true);
		$criteria->compare('bu_name',$this->bu_name,true);
		$criteria->compare('bu_password',$this->bu_password,true);
		$criteria->compare('bu_reg_ip',$this->bu_reg_ip,true);
		$criteria->compare('bu_last_ip',$this->bu_last_ip,true);
		$criteria->compare('bu_last_time',$this->bu_last_time);
		$criteria->compare('bu_create_time',$this->bu_create_time);
		$criteria->compare('bu_status',$this->bu_status);
		$criteria->compare('bu_reputation',$this->bu_reputation);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	//查询密码是否匹配
	public function validatePassword($password)
	{
		return $this->encrypt($password)===$this->password;
	}

	// 保存数据前自动处理
	protected function beforeSave() {
		if (parent::beforeSave()) {
			//判断是否是新的
			if ($this->isNewRecord) {
				$this->bu_status = 1;
	    		$this->bu_create_time = time();
	    		$this->bu_reg_ip = GetIP();
			}
			return true;
		}else {
			return false;
		}
	}

}