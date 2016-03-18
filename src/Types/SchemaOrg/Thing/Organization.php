<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing;
use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class Organization extends Thing implements SchemaTypeInterface
{
    public $members;

    public function __construct($options = [])
    {
        $fields = [  ];

        foreach ($fields as $field) {
            if (array_key_exists($field, $options)) {
                $this->$field = $options[$field];
            } else {
                $this->$field = '';
            }
        }

        // Initialize members array
        $this->members = [];
    }

    public function addMember($member)
    {
        if (!is_object($member)) {
            return false; // Member must be an Organization or Person.
        }

        $this->members[] = $member;
    }

    public function getJsonLd($context = true, $json_object = true)
    {
        $jsonLd = [
            '@context' => 'http://schema.org',
            '@type' => 'SportsOrganization',
        ];

        $requiredFields = ['name'];

        foreach ($requiredFields as $field) {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        $optionalFields = ['sport'];

        foreach ($optionalFields as $field) {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        $object = (object)$jsonLd;

        return json_encode($object);
    }
}
