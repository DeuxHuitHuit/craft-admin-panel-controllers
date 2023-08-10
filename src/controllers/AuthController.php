<?php

namespace deuxhuithuit\adminpanel\controllers;

use craft\web\Controller;
use yii\web\Response;

class AuthController extends Controller
{
    protected array|bool|int $allowAnonymous = true;

    public function actionCheck(): Response
    {
        $canAccess = \Craft::$app->getUser()?->getIdentity()?->can('accessCp');

        return $this->asJson($canAccess);
    }
}
