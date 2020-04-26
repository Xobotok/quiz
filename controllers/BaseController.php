<?php

namespace app\controllers;

use app\models\Database;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class BaseController extends Controller {
    public $enableCsrfValidation = false;
}
