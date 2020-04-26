<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "questions_group".
 *
 * @property int $id
 * @property string $name
 *
 * @property QuestionsGroupList[] $questionsGroupLists
 * @property QuizTest[] $quizTests
 */
class QuestionsGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questions_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
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
        ];
    }

    /**
     * Gets query for [[QuestionsGroupLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionsGroupLists()
    {
        return $this->hasMany(QuestionsGroupList::className(), ['group_id' => 'id']);
    }

    /**
     * Gets query for [[QuizTests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuizTests()
    {
        return $this->hasMany(QuizTest::className(), ['questions_group_id' => 'id']);
    }
}
