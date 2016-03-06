<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class Thing implements SchemaTypeInterface
{
    public $name;

    public function __construct($options = [])
    {
        $fields = [ 'name' ];

        foreach ($fields as $field) {
            if (array_key_exists($field, $options)) {
                $this->$field = $options[$field];
            } else {
                $this->$field = '';
            }
        }
    }

    public function setName($name) { $this->name = $name; }

    public function getRequiredFields() { return ['name']; }

    public function getJsonLd($context = true, $json_object = true)
    {
        $jsonLd = [
            '@context' => 'http://schema.org',
            '@type' => 'Thing',
        ];

        $requiredFields = $this->getRequiredFields();

        foreach ($requiredFields as $field) {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        $optionalFields = [];

        foreach ($optionalFields as $field) {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        $object = (object)$jsonLd;

        return json_encode($object);
    }
}
