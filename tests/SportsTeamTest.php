<?php namespace Taskforcedev\StructuredData\Tests;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Organization\SportsOrganization\SportsTeam;
use Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Person;

class SportsTeamTest extends TestCase
{
    public function testSettingAthleteWorksIfPassedPersonInstance()
    {
        $sportsTeam = new SportsTeam();
        $person = new Person();
        $person->setGivenName('David');

        $person2 = new Person();
        $person2->setGivenName('David');

        $sportsTeam->addAthlete($person);
        $sportsTeam->addAthlete($person2);

        var_dump($sportsTeam->getJsonLd());
    }
}
