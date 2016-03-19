<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Organization\SportsOrganization;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Organization\SportsOrganization;
use Taskforcedev\StructuredData\Types\SchemaTypeInterface;
use Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Person;

class SportsTeam extends SportsOrganization implements SchemaTypeInterface
{
    public $athlete;
    public $coach;

    public function __construct($options = [])
    {
        parent::__construct($options);
        $this->athlete = [];
    }

    public function addAthlete(Person $athlete)
    {
        $context = true;
        $json_encode = false;
        $this->athlete[] = $athlete->getJsonLd($context, $json_encode);
    }

    public function setCoach(Person $coach)
    {
        $this->coach = $coach;
    }

    public function getRequiredFields()
    {
        $fields = parent::getRequiredFields();
        return $fields;
    }

    public function getOptionalFields()
    {
        $fields = parent::getOptionalFields();
        $fields[] = 'athlete';
        $fields[] = 'coach';
        return $fields;
    }

    public function getJsonLd($context = true, $json_object = true)
    {
        $jsonLd = [
            '@context' => 'http://schema.org',
            '@type' => 'SportsTeam',
        ];

        $requiredFields = $this->getRequiredFields();

        foreach ($requiredFields as $field) {
            if ($this->$field !== '' && $this->$field !== null) {
                $jsonLd[$field] = $this->$field;
            }
        }

        $optionalFields = $this->getOptionalFields();

        foreach ($optionalFields as $field) {

            if ($this->$field !== '' && $this->$field !== null) {
                if (is_array($this->$field)) {
                    if (empty($this->$field)) {
                        continue;
                    }
                }
                $jsonLd[$field] = $this->$field;
            }
        }

        $object = (object)$jsonLd;

        return json_encode($object);
    }
}
