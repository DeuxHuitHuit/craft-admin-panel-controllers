<?php

namespace modules\adminpanel\controllers;

use Craft;
use craft\web\Controller;
use yii\web\Response;
use craft\helpers\UrlHelper;

class DashboardController extends Controller
{
    protected array|bool|int $allowAnonymous = true;

    public function actionRedirect(): Response
    {
        $canAccess = Craft::$app->getUser()?->getIdentity()?->can('accessCp');
        if (!$canAccess) {
            $this->response->setStatusCode(401, 'Unauthorized');
            return $this->asJson([
                'message' => 'Unauthorized'
            ]);
        }
        return $this->redirect(UrlHelper::cpUrl());
    }
}
