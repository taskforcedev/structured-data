<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class Thing implements SchemaTypeInterface
{
    public $name;
    public $sameAs;
    public $url;

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
    public function setUrl($url) { $this->url = $url; }

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

    public function getRequiredFields()
    {
        return [ 'name' ];
    }

    public function getOptionalFields()
    {
        return [ 'sameAs' ];
    }

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

        $optionalFields = $this->getOptionalFields();

        foreach ($optionalFields as $field) {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        $object = (object)$jsonLd;

        return json_encode($object);
    }
}
