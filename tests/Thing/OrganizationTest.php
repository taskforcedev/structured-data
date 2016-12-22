<?php namespace Taskforcedev\StructuredData\Tests\Thing;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Organization;
use Taskforcedev\StructuredData\Tests\TestCase;

class OrganizationTest extends TestCase
{
    public function testClassReturnsCorrectNamespace()
    {
        $org = new Organization();
        $class = get_class($org);

        $this->assertEquals($class, 'Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Organization', 'Test namespace is correct');
    }

    public function testOrganizationRequiresAName()
    {
        $org = new Organization();
        $requiredFields = $org->getRequiredFields();

        $this->assertTrue(in_array('name', $requiredFields));
    }

    public function testJsonLdIsValid()
    {
        $org = new Organization();
        $org->setName('MyOrganization');
        $jsonLd = $org->getJsonLd();
        $this->assertTrue(strpos($jsonLd, '"@type":"Organization"') !== false, 'Json-LD uses the correct type.');
        $this->assertTrue(strpos($jsonLd, '"name":"MyOrganization"') !== false, 'Json-LD outputs the provided name.');
    }
}
