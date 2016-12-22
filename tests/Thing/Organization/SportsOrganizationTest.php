<?php namespace Taskforcedev\StructuredData\Tests\Thing\Organization;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Organization\SportsOrganization;
use Taskforcedev\StructuredData\Tests\TestCase;

class SportsOrganizationTest extends TestCase
{
    public function testClassReturnsCorrectNamespace()
    {
        $sportsOrg = new SportsOrganization();
        $class = get_class($sportsOrg);

        $this->assertEquals($class, 'Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Organization\SportsOrganization', 'Test namespace is correct');
    }

    public function testJsonLdIsValid()
    {
        $so = new SportsOrganization();
        $so->setName('Tyne and Wear Pool Team');
        $jsonLd = $so->getJsonLd();
        $this->assertTrue(strpos($jsonLd, '"@type":"SportsOrganization"') !== false, 'Json-LD uses the correct type.');
        $this->assertTrue(strpos($jsonLd, '"name":"Tyne and Wear Pool Team"') !== false, 'Json-LD outputs the provided name.');
    }
}
