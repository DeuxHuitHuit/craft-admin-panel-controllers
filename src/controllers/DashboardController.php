<?php

namespace deuxhuithuit\adminpanel\controllers;

use craft\helpers\UrlHelper;
use craft\web\Controller;
use yii\web\UnauthorizedHttpException;

class DashboardController extends Controller
{
    protected array|bool|int $allowAnonymous = true;

    public function actionRedirect()
    {
        $canAccess = \Craft::$app->getUser()?->getIdentity()?->can('accessCp');
        if (!$canAccess) {
            throw new UnauthorizedHttpException('Unauthorized');
        }

        return $this->redirect(UrlHelper::cpUrl());
    }
}
