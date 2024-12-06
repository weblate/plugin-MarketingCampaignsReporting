<?php

/**
 * Matomo - free/libre analytics platform
 *
 * @link    https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */

namespace Piwik\Plugins\MarketingCampaignsReporting;

use Piwik\Container\StaticContainer;
use Piwik\Updater;
use Piwik\Updates as PiwikUpdates;
use Piwik\Updater\Migration\Factory as MigrationFactory;

class Updates_5_1_0 extends PiwikUpdates
{
    /**
     * @var MigrationFactory
     */
    private $migration;

    public function __construct(MigrationFactory $factory)
    {
        $this->migration = $factory;
    }

    public function doUpdate(Updater $updater)
    {
        // set the SystemSetting to false for existing installs as it will be true by default
        $systemSettings = StaticContainer::get(SystemSettings::class);
        $systemSettings->doNotChangeCaseOfUtmParameters->setIsWritableByCurrentUser(true);
        $systemSettings->doNotChangeCaseOfUtmParameters->setValue(false);
        $systemSettings->save();
    }
}
