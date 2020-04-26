<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $name
 * @property string $mail
 * @property string $password
 *
 * @property QuizTestUserList[] $quizTestUserLists
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'mail', 'password'], 'string'],
            [['mail', 'password'], 'required'],
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
            'mail' => 'Mail',
            'password' => 'Password',
        ];
    }

    /**
     * Gets query for [[QuizTestUserLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuizTestUserLists()
    {
        return $this->hasMany(QuizTestUserList::className(), ['user_id' => 'id']);
    }
}
