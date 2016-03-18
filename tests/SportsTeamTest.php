<?php namespace Taskforcedev\StructuredData\Tests;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Organization\SportsOrganization\SportsTeam;

class SportsTeamTest extends TestCase
{
    public function testSettingAthleteThrowsAnError()
    {
        $sportsTeam = new SportsTeam();
        var_dump($sportsTeam);
    }
}
