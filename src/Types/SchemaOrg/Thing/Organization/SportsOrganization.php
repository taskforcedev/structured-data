<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Organization;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Organization;
use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class SportsOrganization extends Organization implements SchemaTypeInterface
{
    public $name; // Required.
    public $sport; // Optional.

    public function __construct($options = [])
    {
        $fields = ['name', 'sport'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $options)) {
                $this->$field = $options[$field];
            } else {
                $this->$field = '';
            }
        }
    }

    public function setName($name) { $this->name = $name; }
    public function setSport($sport) { $this->sport = $sport; }

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
