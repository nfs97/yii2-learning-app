<?php

namespace frontend\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "branch".
 *
 * @property integer $branch_id
 * @property integer $company_id
 * @property string $branch_name
 * @property string $branch_address
 * @property string $branch_create_date
 * @property string $branch_status
 */
class Branch extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'branch_name', 'branch_address', 'branch_create_date', 'branch_status'], 'required'],
            [['company_id'], 'integer'],
            [['branch_create_date'], 'safe'],
            [['branch_status'], 'string'],
            [['branch_name', 'branch_address'], 'string', 'max' => 100],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'branch_id' => 'Branch ID',
            'company_id' => 'Company Name',
            'branch_name' => 'Branch Name',
            'branch_address' => 'Branch Address',
            'branch_create_date' => 'Branch Create Date',
            'branch_status' => 'Branch Status',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasOne(Companies::className(), ['company_id' => 'company_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasMany(Department::className(), ['branch_id' => 'branch_id']);
    }
}
