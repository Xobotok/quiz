<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "special_keys".
 *
 * @property string $special_key
 * @property int $quiz_test_id
 * @property int $active
 * @property int $count Оставшееся количество доступов по ключу
 *
 * @property QuizTest $quizTest
 */
class SpecialKeys extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'special_keys';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['special_key', 'quiz_test_id'], 'required'],
            [['quiz_test_id', 'active', 'count'], 'integer'],
            [['special_key'], 'string', 'max' => 128],
            [['special_key'], 'unique'],
            [['quiz_test_id'], 'exist', 'skipOnError' => true, 'targetClass' => QuizTest::className(), 'targetAttribute' => ['quiz_test_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'special_key' => 'Special Key',
            'quiz_test_id' => 'Quiz Test ID',
            'active' => 'Active',
            'count' => 'Count',
        ];
    }

    /**
     * Gets query for [[QuizTest]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuizTest()
    {
        return $this->hasOne(QuizTest::className(), ['id' => 'quiz_test_id']);
    }
}
