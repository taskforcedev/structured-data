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

        $this->assertTrue(strpos($jsonLd, '"givenName":"John"') !== false, 'Json has a person with givenName: John.');
        $this->assertTrue(strpos($jsonLd, '"givenName":"David"') !== false, 'Json has a person with givenName: David.');
        $this->assertTrue(strpos($jsonLd, '"@context":"http:\/\/schema.org"') !== false, 'Json has the context for schema.org.');
        $this->assertTrue(strpos($jsonLd, '"@type":"SportsTeam"') !== false, 'Json has the type of SportsTeam as expected.');
    }
}
