<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quiz".
 *
 * @property int $id Id квиза
 * @property string $name Название квиза
 * @property string $syle_name Название стилей для данной тематики
 *
 * @property Questions[] $questions
 * @property QuizTest[] $quizTests
 */
class Quiz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'syle_name'], 'required'],
            [['syle_name'], 'string'],
            [['name'], 'string', 'max' => 52],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'syle_name' => 'Syle Name',
        ];
    }

    /**
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Questions::className(), ['quiz_id' => 'id']);
    }

    /**
     * Gets query for [[QuizTests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuizTests()
    {
        return $this->hasMany(QuizTest::className(), ['quiz_id' => 'id']);
    }
}
