<?php namespace Taskforcedev\StructuredData\Tests\Thing\Organization;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Place;
use Taskforcedev\StructuredData\Tests\TestCase;

class PlaceTest extends TestCase
{
    public function testClassReturnsCorrectNamespace()
    {
        $place = new Place();
        $class = get_class($place);

        $this->assertEquals($class, 'Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Place', 'Test namespace is correct');
    }

    public function testPlaceRequiresAName()
    {
        $place = new Place();
        $requiredFields = $place->getRequiredFields();

        $this->assertTrue(in_array('name', $requiredFields));
    }

    public function testRecommendedFields()
    {
        $place = new Place();
        $recommendedFields = $place->getRecommendedFields();
        $this->assertTrue(in_array('address', $recommendedFields));
    }

    public function testOptionalFields()
    {
        $place = new Place();
        $optionalFields = $place->getOptionalFields();
        $this->assertTrue(in_array('sameAs', $optionalFields));
    }

    public function testJsonLdIsValid()
    {
        $place = new Place();
        $place->setName('TestPlace');
        $jsonLd = $place->getJsonLd();
        $this->assertTrue(strpos($jsonLd, '"@type":"Place"') !== false, 'Json-LD uses the correct type.');
        $this->assertTrue(strpos($jsonLd, '"name":"TestPlace"') !== false, 'Json-LD outputs the provided name.');
    }
}
