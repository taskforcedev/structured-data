<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class Thing implements SchemaTypeInterface
{
    public $name;
    public $sameAs;

    public function __construct($options = [])
    {
        $fields = [ 'name', 'sameAs' ];

        foreach ($fields as $field) {
            if (array_key_exists($field, $options)) {
                $this->$field = $options[$field];
            } else {
                $this->$field = '';
            }
        }
    }

    public function setName($name) { $this->name = $name; }

    public function addSameAs($url)
    {
        $sameAs = $this->sameAs;

        if (!isset($this->sameAs) || $sameAs = '') {
            $sameAs = [];
        }

        if (!is_array($sameAs)) {
            $sameAs = [];
            $sameAs[] = $this->sameAs;
        }
    }

    public function setSameAs($url)
    {
        $sameAs = [];
        $sameAs[] = $url;

        $this->sameAs = $sameAs;
    }

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

        $optionalFields = [ 'sameAs' ];

        foreach ($optionalFields as $field) {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        $object = (object)$jsonLd;

        return json_encode($object);
    }
}
