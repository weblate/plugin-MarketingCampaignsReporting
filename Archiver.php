<?php

/**
 * Matomo - free/libre analytics platform
 *
 * @link    https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 * Based on code from AdvancedCampaignReporting plugin by Piwik PRO released under GPL v3 or later:
 * https://github.com/PiwikPRO/plugin-AdvancedCampaignReporting
 */

namespace Piwik\Plugins\MarketingCampaignsReporting;

class Archiver extends \Piwik\Plugin\Archiver
{
    public const CAMPAIGN_ID_RECORD_NAME = 'MarketingCampaignsReporting_Id';
    public const CAMPAIGN_NAME_RECORD_NAME = 'MarketingCampaignsReporting_Name';
    public const CAMPAIGN_KEYWORD_RECORD_NAME = 'MarketingCampaignsReporting_Keyword';
    public const CAMPAIGN_SOURCE_RECORD_NAME = 'MarketingCampaignsReporting_Source';
    public const CAMPAIGN_MEDIUM_RECORD_NAME = 'MarketingCampaignsReporting_Medium';
    public const CAMPAIGN_CONTENT_RECORD_NAME = 'MarketingCampaignsReporting_Content';
    public const CAMPAIGN_GROUP_RECORD_NAME = 'MarketingCampaignsReporting_Group';
    public const CAMPAIGN_PLACEMENT_RECORD_NAME = 'MarketingCampaignsReporting_Placement';
    public const HIERARCHICAL_SOURCE_MEDIUM_RECORD_NAME = 'MarketingCampaignsReporting_SourceMedium_Name';

    public const SEPARATOR_COMBINED_DIMENSIONS = " - ";
}
