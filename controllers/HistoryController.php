<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 17.03.16
 * Time: 14:13
 */

namespace app\controllers;

use Yii;
use app\models\BallanceHistory;
use yii\web\ForbiddenHttpException;
use yii\web\ServerErrorHttpException;


class HistoryController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\BallanceHistory';


    public function actionBallanceHistoryAll()
    {
        $this->checkAccess('BallaceHistoryAll', $this->modelClass);
        $model = new $this->modelClass();
        return $model::find()->all();
    }

    public function actionBallanceHistoryUser($uid)
    {
        $this->checkAccess('BallaceHistoryUser', $this->modelClass);

        $model = new $this->modelClass();
        //return $model::findOne($uid);
        return $model::find()->where(['=', 'user_id', $uid])->all();
    }
}