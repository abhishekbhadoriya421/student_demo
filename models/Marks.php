<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marks".
 *
 * @property int $rno
 * @property int|null $id
 * @property int|null $english
 * @property int|null $maths
 * @property int|null $hindi
 * @property string|null $createAt
 * @property string|null $updatedAt
 * @property int|null $totalMarks
 *
 * @property Student $id0
 */
class Marks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['english', 'maths', 'hindi'], 'required'],
            [['id', 'english', 'maths', 'hindi', 'totalMarks'], 'integer'],
            [['english'],'integer','max'=>100,'min'=>0],
            [['hindi'],'integer','max'=>100,'min'=>0],
            [['maths'],'integer','max'=>100,'min'=>0],
            [['createAt', 'updatedAt'], 'safe'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::class, 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rno' => 'Rno',
            'id' => 'ID',
            'english' => 'English',
            'maths' => 'Maths',
            'hindi' => 'Hindi',
            'createAt' => 'Create At',
            'updatedAt' => 'Updated At',
            'totalMarks' => 'Total Marks',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Student::class, ['id' => 'id']);
    }
}
