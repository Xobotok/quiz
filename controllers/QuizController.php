<?php

namespace app\controllers;

use app\models\Questions;
use app\models\QuestionsGroup;
use app\models\QuestionsGroupList;
use app\models\Quiz;
use app\models\QuizTest;
use app\models\QuizTheme;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class QuizController extends BaseController
{
    public function actionIndex() {
        $themes = QuizTheme::find()->asArray()->all();
        return $this->render('index', [
            'data'=>$themes,
        ]);
    }

    public function actionTheme() {
        $get = Yii::$app->request->get();
        if(isset($get['id'])) {
            $quiz = QuizTheme::findOne($get['id']);
            if(!$quiz) {
                $quiz = QuizTheme::findOne(['style_name'=>$get['id']]);
            }
            if($quiz) {
                $quiz_tests = QuizTest::find()->where(['quiz_id' => $quiz->attributes['id'], 'visible' => 1])->asArray()->all();
                $style_name = $quiz->attributes['style_name'];
                foreach ($quiz_tests as $key => $quiz_test) {
                   $questionsGroup = QuestionsGroup::findOne($quiz_test['questions_group_id'])->attributes['name'];
                    $quiz_tests[$key]['name'] = $questionsGroup;
                }
                return $this->render('theme', [
                    'data' => $quiz_tests, 'style_name' => $style_name
                ]);
            }

        }

    }

    public function actionHarryPotter()
    {
        $get = Yii::$app->request->get();
        if (isset($get['id'])) {
            if (isset($get['key'])) {
                $authorisation_result = AuthorisationController::checkSpecialKey($get['key'], $get['id']);
                if ($authorisation_result['ok'] == 0) {
                    return $this->render('harry-potter-error', [
                        'text' => $authorisation_result['text'],
                    ]);
                } else {
                    return $this->prepareTest($get['id']);
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function prepareTest($quiz_test_id)
    {
        $quiz_test = QuizTest::findOne($quiz_test_id);
        $quiz_data = $quiz_test->attributes;
        $quiz_data['name'] = $quiz_test->questionsGroup->attributes['name'];
        $groups = $quiz_test->questionsGroup->getQuestionsGroupLists()->asArray()->all();
        $questions = [];
        foreach ($groups as $group) {
            $question = Questions::findOne($group['question_id'])->attributes;
            $questions[] = $question;
        }
        $questions = json_encode($questions);
        $quiz_data = json_encode($quiz_data);
        return $this->render('test', [
            'questions' => $questions,
            'quiz_data' => $quiz_data,
        ]);
    }
}
