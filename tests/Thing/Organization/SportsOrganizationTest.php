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
}
