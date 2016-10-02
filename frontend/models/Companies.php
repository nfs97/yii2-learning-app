<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "companies".
 *
 * @property integer $company_id
 * @property string $company_name
 * @property string $company_email
 * @property string $company_address
 * @property string $logo
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
            [['company_name', 'company_email', 'company_address', 'company_status'], 'required'],
            [['comany_created_date'], 'safe'],
            [['company_status'], 'string'],
            [['file'], 'file'],
            [['company_name', 'logo', 'company_email'], 'string', 'max' => 100],
            [['company_address'], 'string', 'max' => 255],
        ];
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
            'comany_created_date' => 'Comany Created Date',
            'company_status' => 'Company Status',
            'file' => 'logo',
        ];
    }
}
