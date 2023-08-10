<?php

namespace deuxhuithuit\adminpanel;

use Craft;

class AdminPanel extends \craft\base\Plugin
{
    public function __construct($id, $parent = null, array $config = [])
    {
        Craft::setAlias('@plugin/adminpanel', $this->getBasePath());
        $this->controllerNamespace = 'deuxhuithuit\adminpanel\controllers';

        // Set this as the global instance of this module class
        static::setInstance($this);

        parent::__construct($id, $parent, $config);
    }
}
