<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class Thing implements SchemaTypeInterface
{
    public $name = '';
    public $sameAs = '';
    public $url = '';

    public $type; // JSON LD Type
    public $requiredFields;
    public $recommendedFields;
    public $optionalFields;

    public function __construct($options = [])
    {
        $this->requiredFields = [
            'name',
        ];
        $this->type = 'Thing';

        $this->recommendedFields = [];

        $this->optionalFields = [
            'sameAs',
        ];

        $allFields = array_merge($this->requiredFields, $this->recommendedFields, $this->optionalFields);

        foreach ($allFields as $field) {
            if (array_key_exists($field, $options)) {
                $this->$field = $options[$field];
            }
        }
    }

    public function setName($name) { $this->name = $name; }
    public function setUrl($url) { $this->url = $url; }

    public function addSameAs($url)
    {
        if (!is_array($this->sameAs)) {
            if (isset($this->sameAs) && $this->sameAs !== '') {
                $existing = $this->sameAs;
            }
            $sameAs = [];

            if (isset($existing)) {
                $sameAs[] = $existing;
            }
        }

        $sameAs[] = $url;
    }

    public function setSameAs($url)
    {
        $sameAs = [];
        $sameAs[] = $url;

        $this->sameAs = $sameAs;
    }

    public function getRequiredFields()
    {
        return $this->requiredFields;
    }

    public function getRecommendedFields()
    {
        return $this->recommendedFields;
    }

    public function getOptionalFields()
    {
        return $this->optionalFields;
    }

    public function getJsonLd($context = true, $json_object = true)
    {
        $jsonLd = [
            '@context' => 'http://schema.org',
            '@type' => $this->type,
        ];

        foreach ($this->requiredFields as $field) {
            if ($this->$field !== '' && $this->$field !== null) {
                if (is_array($this->$field) && empty($this->$field)) {
                    continue;
                }
                $jsonLd[$field] = $this->$field;
            }
        }

        foreach ($this->recommendedFields as $field) {
            if ($this->$field !== '' && $this->$field !== null) {
                if (is_array($this->$field) && empty($this->$field)) {
                    continue;
                }
                $jsonLd[$field] = $this->$field;
            }
        }

        foreach ($this->optionalFields as $field) {
            if ($this->$field !== null && $this->$field !== '') {
                if (is_array($this->$field) && empty($this->$field)) {
                    continue;
                }
                $jsonLd[$field] = $this->$field;
            }
        }

        if ($json_object === true) {
            $object = (object)$jsonLd;

            return json_encode($object);
        }

        return $jsonLd;
    }
}
