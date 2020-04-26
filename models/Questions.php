<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property int $id
 * @property int $quiz_id
 * @property string $text
 * @property int $type_id ID типа вопроса
 *
 * @property Answers[] $answers
 * @property Quiz $quiz
 * @property QuestionsType $type
 * @property QuestionsGroupList[] $questionsGroupLists
 */
class Questions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quiz_id', 'text', 'type_id'], 'required'],
            [['quiz_id', 'type_id'], 'integer'],
            [['text'], 'string'],
            [['quiz_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quiz::className(), 'targetAttribute' => ['quiz_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => QuestionsType::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quiz_id' => 'Quiz ID',
            'text' => 'Text',
            'type_id' => 'Type ID',
        ];
    }

    /**
     * Gets query for [[Answers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answers::className(), ['question_id' => 'id']);
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
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(QuestionsType::className(), ['id' => 'type_id']);
    }

    /**
     * Gets query for [[QuestionsGroupLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionsGroupLists()
    {
        return $this->hasMany(QuestionsGroupList::className(), ['question_id' => 'id']);
    }
}
