<?php namespace Taskforcedev\StructuredData\Tests\Thing\Organization;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing;
use Taskforcedev\StructuredData\Tests\TestCase;

class ThingTest extends TestCase
{
    public function testClassReturnsCorrectNamespace()
    {
        $thing = new Thing();
        $class = get_class($thing);

        $this->assertEquals($class, 'Taskforcedev\StructuredData\Types\SchemaOrg\Thing', 'Test namespace is correct');
    }

    public function testThingRequiresAName()
    {
        $thing = new Thing();
        $requiredFields = $thing->getRequiredFields();

        $this->assertTrue(in_array('name', $requiredFields));
    }

    public function testOptionalFields()
    {
        $thing = new Thing();
        $optionalFields = $thing->getOptionalFields();
        $this->assertTrue(in_array('sameAs', $optionalFields));
    }

    public function testJsonLdIsValid()
    {
        $thing = new Thing();
        $thing->setName('TestThingy');
        $jsonLd = $thing->getJsonLd();
        $this->assertTrue(strpos($jsonLd, '"@type":"Thing"') !== false, 'Json-LD uses the correct type.');
        $this->assertTrue(strpos($jsonLd, '"name":"TestThingy"') !== false, 'Json-LD outputs the provided name.');
    }
}
