<?php

/**
 * Matomo - free/libre analytics platform
 *
 * @link    https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\MarketingCampaignsReporting\tests\Integration;

use Piwik\Tests\Framework\Fixture;
use Piwik\Tests\Framework\TestCase\IntegrationTestCase;
use Piwik\Plugins\MarketingCampaignsReporting\SystemSettings;

/**
 * @group SystemSettings
 * @group Plugins
 */
class SystemSettingsTest extends IntegrationTestCase
{
    /**
     * @var SystemSettings
     */
    private $settings;

    public function setUp(): void
    {
        parent::setUp();

        Fixture::loadAllTranslations();

        Fixture::createSuperUser();
        Fixture::createWebsite('2014-01-01 00:01:02');

        $this->settings = new SystemSettings();
    }

    public function tearDown(): void
    {
        parent::tearDown();

        Fixture::resetTranslations();
    }

    public function test_doNotChangeCaseOfUtmParameters_default()
    {
        $this->assertTrue($this->settings->doNotChangeCaseOfUtmParameters->getValue());
    }

    public function test_doNotChangeCaseOfUtmParameters_shouldThrowException()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('The value for the "Retain campaign parameter capitalisation" field in the "MarketingCampaignsReporting" plugin is not allowed');
        $this->settings->doNotChangeCaseOfUtmParameters->setValue('aa');
    }

    public function test_doNotChangeCaseOfUtmParameters_updateSuccess()
    {
        $this->settings->doNotChangeCaseOfUtmParameters->setValue(true);
        $this->settings->save();
        $this->assertTrue($this->settings->doNotChangeCaseOfUtmParameters->getValue());

        $this->settings->doNotChangeCaseOfUtmParameters->setValue(1);
        $this->settings->save();
        $this->assertTrue($this->settings->doNotChangeCaseOfUtmParameters->getValue());

        $this->settings->doNotChangeCaseOfUtmParameters->setValue(0);
        $this->settings->save();
        $this->assertFalse($this->settings->doNotChangeCaseOfUtmParameters->getValue());

        $this->settings->doNotChangeCaseOfUtmParameters->setValue('1');
        $this->settings->save();
        $this->assertTrue($this->settings->doNotChangeCaseOfUtmParameters->getValue());

        $this->settings->doNotChangeCaseOfUtmParameters->setValue('0');
        $this->settings->save();
        $this->assertFalse($this->settings->doNotChangeCaseOfUtmParameters->getValue());
    }
}
