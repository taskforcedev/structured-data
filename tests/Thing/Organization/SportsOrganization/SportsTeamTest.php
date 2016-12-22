<?php namespace Taskforcedev\StructuredData\Tests\Thing\Organization\SportsOrganization;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Organization\SportsOrganization\SportsTeam;
use Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Person;
use Taskforcedev\StructuredData\Tests\TestCase;

class SportsTeamTest extends TestCase
{
    public function testClassReturnsCorrectNamespace()
    {
        $sportsTeam = new SportsTeam();
        $class = get_class($sportsTeam);

        $this->assertEquals($class, 'Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Organization\SportsOrganization\SportsTeam', 'Test namespace is correct');
    }

    public function testSportsTeamWithoutDataIsCorrect()
    {
        $sportsTeam = new SportsTeam();
        $sportsTeam->setName('My Sports Team');
        $jsonLd = $sportsTeam->getJsonLd();

        $this->assertFalse(strpos($jsonLd, '"sameAs"'), 'Json-ld should not have a not-set value.');
    }

    public function testSettingAthleteWorksIfPassedPersonInstance()
    {
        $sportsTeam = new SportsTeam();
        $sportsTeam->setName('My Sports Team');
        $person = new Person();
        $person->setGivenName('David');

        $person2 = new Person();
        $person2->setGivenName('John');

        $sportsTeam->addAthlete($person);
        $sportsTeam->addAthlete($person2);

        $jsonLd = $sportsTeam->getJsonLd();

        var_dump($jsonLd);

        $this->assertTrue(strpos($jsonLd, '"givenName":"John"') !== false, 'Json has a person with givenName: John.');
        $this->assertTrue(strpos($jsonLd, '"givenName":"David"') !== false, 'Json has a person with givenName: David.');
        $this->assertTrue(strpos($jsonLd, '"@context":"http:\/\/schema.org"') !== false, 'Json has the context for schema.org.');
        $this->assertTrue(strpos($jsonLd, '"@type":"SportsTeam"') !== false, 'Json has the type of SportsTeam as expected.');
    }

    public function testSettingCoachWorksIfPassedPersonInstance()
    {
        $sportsTeam = new SportsTeam();
        $sportsTeam->setName('My Sports Team');
        $person = new Person();
        $person->setGivenName('David');

        $sportsTeam->setCoach($person);

        $jsonLd = $sportsTeam->getJsonLd();

        $this->assertTrue(strpos($jsonLd, 'coach":{') !== false, 'Json includes Coach.');
        $this->assertTrue(strpos($jsonLd, '"givenName":"David"') !== false, 'Json has a person with givenName: John.');
        $this->assertTrue(strpos($jsonLd, '"@context":"http:\/\/schema.org"') !== false, 'Json has the context for schema.org.');
        $this->assertTrue(strpos($jsonLd, '"@type":"SportsTeam"') !== false, 'Json has the type of SportsTeam as expected.');
    }
}
