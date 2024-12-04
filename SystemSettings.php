<?php

/**
 * Matomo - free/libre analytics platform
 *
 * @link    https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */

namespace Piwik\Plugins\MarketingCampaignsReporting;

use Piwik\Piwik;
use Piwik\Settings\Setting;
use Piwik\Settings\FieldConfig;

class SystemSettings extends \Piwik\Settings\Plugin\SystemSettings
{
    /** @var Setting */
    public $doNotChangeCaseOfUtmParameters;

    protected function init()
    {
        $this->doNotChangeCaseOfUtmParameters = $this->makeSetting('doNotChangeCaseOfUtmParameters', true, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = Piwik::translate('MarketingCampaignsReporting_DoNotChangeCaseOfUtmParametersTitle');
            $field->description = Piwik::translate('MarketingCampaignsReporting_DoNotChangeCaseOfUtmParametersDescription');
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
        });
    }
}