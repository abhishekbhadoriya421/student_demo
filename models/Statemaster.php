<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "statemaster".
 *
 * @property int $stateId
 * @property string $state
 * @property string $district
 */
class Statemaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statemaster';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['state', 'district'], 'required'],
            [['state'], 'string', 'max' => 225],
            [['district'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'stateId' => Yii::t('app', 'State ID'),
            'state' => Yii::t('app', 'State'),
            'district' => Yii::t('app', 'District'),
        ];
    }

    public static function getStateList()
    {
        $state = self::find()->select('state')->all();
        return ArrayHelper::map($state,'state','state');
    }

    public static function getDistrictList($state){
        $district = self::find()->select('district')->where(['state'=>$state])->all();
        if(!empty($district)){
            return ArrayHelper::map($district,'district','district');
        }else{
           return 'Not Found';
        }
    }
}





























//    public static function getStatesList(){
//        $state = self::find()->select('state')->all();
//        return ArrayHelper::map($state,"state",'state');
//    }
//
//    public static function getDistrictList($state){
//        $district = self::find()->select('district')->where(['state'=>$state])->all();
//        return ArrayHelper::map($district,"district",'district');
//    }