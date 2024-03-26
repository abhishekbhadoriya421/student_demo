<?php

namespace app\components;

use Yii;
use yii\base\Model;

class SecurityHelper extends Model
{
    public static function hashData($id)
    {
        if(!empty($id)){
            return Yii::$app->security->hashData($id,Yii::$app->params["secretKey"]);
        }else{
            die;
        }
    }

    public  static  function validateData($id)
    {
        if(!empty($id)){
            return Yii::$app->security->validateData($id,Yii::$app->params["secretKey"]);
        }else{
            die;
        }
    }

}