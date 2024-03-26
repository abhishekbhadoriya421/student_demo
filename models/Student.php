<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $name
 * @property string|null $category
 * @property int $mobile
 * @property string|null $email
 * @property string|null $createdAt
 * @property string|null $gender
 * @property string|null $imageFile
 * @property string|null $state
 * @property string|null $district
 * @property Marks[] $marks
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['name', 'mobile'], 'required'],
            [['mobile'], 'integer'],
            [['mobile'],'match' ,'pattern'=>'/^[0-9]+$/'],
            [['createdAt'], 'safe'],
            [['name', 'category'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 40],
            [['gender'], 'string', 'max' => 15],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],  // Corrected property name
            [['state', 'district'], 'string', 'max' => 225],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'category' => Yii::t('app', 'Category'),
            'mobile' => Yii::t('app', 'Mobile'),
            'email' => Yii::t('app', 'Email'),
            'createdAt' => Yii::t('app', 'Created At'),
            'gender' => Yii::t('app', 'Gender'),
            'imageFile' => Yii::t('app', 'Image File'),
            'state' => Yii::t('app', 'State'),
            'district' => Yii::t('app', 'District'),
        ];
    }

    /**
     * Gets query for [[Marks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarks()
    {
        return $this->hasMany(Marks::class, ['id' => 'id']);
    }


}
