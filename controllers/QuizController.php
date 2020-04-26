<?php

namespace app\controllers;

use app\models\Questions;
use app\models\Quiz;
use app\models\QuizTest;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class QuizController extends BaseController {
    public function actionHarryPotter() {
        $get = Yii::$app->request->get();
        $model =
        $id = $get['id'];
        $params['id'] = $id;
        $quiz_test = QuizTest::findOne($id);
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
        return $this->render('harry-potter', [
            'questions' => $questions,
            'quiz_data' => $quiz_data,
        ]);
    }
}
