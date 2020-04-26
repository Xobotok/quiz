<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "questions_group_list".
 *
 * @property int $id
 * @property int $group_id
 * @property int $question_id
 * @property int|null $number Порядковый номер вопроса в тесте
 *
 * @property QuestionsGroup $group
 * @property Questions $question
 */
class QuestionsGroupList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questions_group_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'question_id'], 'required'],
            [['group_id', 'question_id', 'number'], 'integer'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => QuestionsGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Questions::className(), 'targetAttribute' => ['question_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'question_id' => 'Question ID',
            'number' => 'Number',
        ];
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(QuestionsGroup::className(), ['id' => 'group_id']);
    }

    /**
     * Gets query for [[Question]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Questions::className(), ['id' => 'question_id']);
    }
}
