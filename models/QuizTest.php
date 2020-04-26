<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quiz_test".
 *
 * @property int $id
 * @property string $start_time
 * @property string|null $finish_time
 * @property int $quiz_id
 * @property int $active
 * @property int $questions_group_id Группа вопросов для этого теста
 *
 * @property Quiz $quiz
 * @property QuestionsGroup $questionsGroup
 * @property QuizTestUserList[] $quizTestUserLists
 * @property SpecialKeys[] $specialKeys
 */
class QuizTest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz_test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start_time', 'quiz_id', 'questions_group_id'], 'required'],
            [['start_time', 'finish_time'], 'safe'],
            [['quiz_id', 'active', 'questions_group_id'], 'integer'],
            [['quiz_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quiz::className(), 'targetAttribute' => ['quiz_id' => 'id']],
            [['questions_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => QuestionsGroup::className(), 'targetAttribute' => ['questions_group_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_time' => 'Start Time',
            'finish_time' => 'Finish Time',
            'quiz_id' => 'Quiz ID',
            'active' => 'Active',
            'questions_group_id' => 'Questions Group ID',
        ];
    }

    /**
     * Gets query for [[Quiz]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuiz()
    {
        return $this->hasOne(Quiz::className(), ['id' => 'quiz_id']);
    }

    /**
     * Gets query for [[QuestionsGroup]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionsGroup()
    {
        return $this->hasOne(QuestionsGroup::className(), ['id' => 'questions_group_id']);
    }

    /**
     * Gets query for [[QuizTestUserLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuizTestUserLists()
    {
        return $this->hasMany(QuizTestUserList::className(), ['quiz_test_id' => 'id']);
    }

    /**
     * Gets query for [[SpecialKeys]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialKeys()
    {
        return $this->hasMany(SpecialKeys::className(), ['quiz_test_id' => 'id']);
    }
}
