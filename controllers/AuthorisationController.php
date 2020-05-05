<?php

namespace app\controllers;

use app\models\Questions;
use app\models\Quiz;
use app\models\QuizTest;
use app\models\SpecialKeys;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class AuthorisationController extends BaseController {
    public static function checkSpecialKey($key, $quiz_id) {
        $data = SpecialKeys::findOne($key)->attributes;
        $result = [];
        if($data != null && $data['quiz_test_id'] == $quiz_id) {
            if($data['active'] == 0) {
                $result['ok'] = 0;
                $result['text'] = 'Ваш ключ не активен. Возможно Вы уже проходили тест.';
            } else if($data['count'] == 0) {
                $result['ok'] = 0;
                $result['text'] = 'Ваш ключ не активен. Возможно Вы уже проходили тест.';
            } else {
                $result['ok'] = 1;
            }
        } else {
            $result['ok'] = 0;
            $result['text'] = 'Ваш ключ не подходит. Обратитесь к администратору теста.';
        }
        return $result;
    }
}
