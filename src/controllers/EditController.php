<?php

namespace deuxhuithuit\adminpanel\controllers;

use craft\web\Controller;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UnauthorizedHttpException;

class EditController extends Controller
{
    protected array|bool|int $allowAnonymous = true;

    public function actionRedirect(): Response
    {
        $canAccess = \Craft::$app->getUser()?->getIdentity()?->can('accessCp');
        if (!$canAccess) {
            throw new UnauthorizedHttpException('Unauthorized');
        }
        $query = $this->request->getQueryParams();
        if (!isset($query['uri'])) {
            throw new BadRequestHttpException('Missing entry uri');
        }
        if (!isset($query['site'])) {
            throw new BadRequestHttpException('Missing site handle');
        }
        $entryUri = $query['uri'];
        $siteHandle = $query['site'];
        $site = \Craft::$app->sites->getSiteByHandle($siteHandle);
        if (!$site) {
            throw new BadRequestHttpException('Invalid site handle');
        }
        $entry = \Craft::$app->elements->getElementByUri($entryUri, $site['id']);
        if (!$entry) {
            throw new NotFoundHttpException('No entry found');
        }

        return $this->redirect($entry->cpEditUrl);
    }
}
