<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quiz_test_user_list".
 *
 * @property int $id
 * @property int $user_id
 * @property int $quiz_test_id
 *
 * @property QuizTest $quizTest
 * @property Users $user
 */
class QuizTestUserList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz_test_user_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'quiz_test_id'], 'required'],
            [['user_id', 'quiz_test_id'], 'integer'],
            [['quiz_test_id'], 'exist', 'skipOnError' => true, 'targetClass' => QuizTest::className(), 'targetAttribute' => ['quiz_test_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'quiz_test_id' => 'Quiz Test ID',
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
