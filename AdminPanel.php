<?php

namespace modules\adminpanel;

use Craft;
use yii\base\Module;

class AdminPanel extends Module
{
    public function init()
    {
        parent::init();
        Craft::setAlias('@modules/adminpanel', $this->getBasePath());
        $this->controllerNamespace = 'modules\adminpanel\controllers';
    }
}
