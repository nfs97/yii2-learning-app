<?php

namespace frontend\modules\settings\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "companies".
 *
 * @property integer $company_id
 * @property string $company_name
 * @property string $company_email
 * @property string $company_address
 * @property string $company_start_date
 * @property string $comany_created_date
 * @property string $company_status
 */
class Companies extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_name', 'company_email', 'company_address', 'company_start_date', 'company_status'], 'required'],
            [['company_start_date', 'comany_created_date'], 'safe'],
            ['company_start_date', 'checkDate'],
            [['company_status'], 'string'],
            [['file'], 'file'],
            [['company_name', 'company_email'], 'string', 'max' => 100],
            [['logo'], 'string', 'max' => 200],
            [['company_address'], 'string', 'max' => 255],
        ];
    }

    public function checkDate($attribute, $params)
    {
        $today = date('Y-m-d');
        $selectedDate = date($this->company_start_date);
        if ($selectedDate > $today) {
            $this->addError($attribute, 'Your company start date must be before today');
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
            'company_email' => 'Company Email',
            'company_address' => 'Company Address',
            'company_start_date' => 'Company Start Date',
            'comany_created_date' => 'Comany Created Date',
            'company_status' => 'Company Status',
            'file' => 'Logo',
        ];
    }
}
