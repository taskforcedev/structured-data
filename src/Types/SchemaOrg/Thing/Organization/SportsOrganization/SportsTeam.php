<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Organization\SportsOrganization;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Organization\SportsOrganization;
use Taskforcedev\StructuredData\Types\SchemaTypeInterface;
use Taskforcedev\StructuredData\Types\SchemaOrg\Person;

class SportsTeam extends SportsOrganization implements SchemaTypeInterface
{
    public $athletes;
    public $coach;

    public function __construct(array $options)
    {
        parent::__construct($options);
        $this->athletes = [];
    }

    public function addAthlete(Person $athlete)
    {
        $this->athletes[] = $athlete;
    }

    public function setCoach(Person $coach)
    {
        $this->coach = $coach;
    }
}
