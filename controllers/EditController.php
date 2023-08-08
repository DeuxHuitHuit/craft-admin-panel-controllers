<?php

namespace modules\adminpanel\controllers;

use Craft;
use craft\web\Controller;
use yii\web\Response;
use craft\helpers\UrlHelper;

class EditController extends Controller
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
        $query = $this->request->getQueryParams();
        if (!isset($query['uri'])) {
            $this->response->setStatusCode(400, 'Bad request');
            return $this->asJson([
                'message' => 'Missing entry uri'
            ]);
        }
        if (!isset($query['site'])) {
            $this->response->setStatusCode(400, 'Bad request');
            return $this->asJson([
                'message' => 'Missing site handle'
            ]);
        }
        $entryUri = $query['uri'];
        $siteHandle = $query['site'];
        $site = Craft::$app->sites->getSiteByHandle($siteHandle);
        if (!$site) {
            $this->response->setStatusCode(400, 'Bad request');
            return $this->asJson([
                'message' => 'Invalid site handle'
            ]);
        }
        $entry = Craft::$app->elements->getElementByUri($entryUri, $site['id']);
        if (!$entry) {
            $this->response->setStatusCode(400, 'Bad request');
            return $this->asJson([
                'message' => 'No entry found',
                'entry' => $entryUri
            ]);
        }
        return $this->redirect($entry->cpEditUrl);
    }
}
