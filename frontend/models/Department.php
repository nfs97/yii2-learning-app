<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "department".
 *
 * @property integer $department_id
 * @property integer $branch_id
 * @property integer $company_id
 * @property string $department_name
 * @property string $department_created_date
 * @property string $department_status
 */
class Department extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['branch_id', 'company_id', 'department_name', 'department_created_date', 'department_status'], 'required'],
            [['branch_id', 'company_id'], 'integer'],
            [['department_created_date'], 'safe'],
            [['department_status'], 'string'],
            [['department_name'], 'string', 'max' => 100],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branch::className(), 'targetAttribute' => ['branch_id' => 'branch_id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'Department ID',
            'branch_id' => 'Branch Name',
            'company_id' => 'Company Name',
            'department_name' => 'Department Name',
            'department_created_date' => 'Department Created Date',
            'department_status' => 'Department Status',
        ];
    }


    /**
     * @return ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(Branch::className(), ['branch_id' => 'branch_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasOne(Companies::className(), ['company_id' => 'company_id']);
    }
}
