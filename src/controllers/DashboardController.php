<?php

namespace modules\adminpanel\controllers;

use Craft;
use craft\web\Controller;
use yii\web\Response;
use craft\helpers\UrlHelper;
use yii\web\UnauthorizedHttpException;

class DashboardController extends Controller
{
    protected array|bool|int $allowAnonymous = true;

    public function actionRedirect()
    {
        $canAccess = Craft::$app->getUser()?->getIdentity()?->can('accessCp');
        if (!$canAccess) {
            throw new UnauthorizedHttpException('Unauthorized');
        }
        return $this->redirect(UrlHelper::cpUrl());
    }
}
