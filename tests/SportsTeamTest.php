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
        $person2->setGivenName('John');

        $sportsTeam->addAthlete($person);
        $sportsTeam->addAthlete($person2);

        $jsonLd = $sportsTeam->getJsonLd();

        $this->assertTrue(strpos($jsonLd, '"givenName":"John"') !== false);
        $this->assertTrue(strpos($jsonLd, '"givenName":"David"') !== false);
        $this->assertTrue(strpos($jsonLd, '"@context":"http:\/\/schema.org"') !== false);
        $this->assertTrue(strpos($jsonLd, '"@type":"SportsTeam"') !== false);

        var_dump($sportsTeam->getJsonLd());
    }
}
