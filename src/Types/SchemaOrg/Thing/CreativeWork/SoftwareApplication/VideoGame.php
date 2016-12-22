<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing\CreativeWork\SoftwareApplication;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing;
use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class VideoGame extends Thing implements SchemaTypeInterface
{
    public $type = 'VideoGame';
    public $requiredFields;
    public $recommendedFields;
    public $optionalFields;

    public function __construct()
    {
        $this->requiredFields = [];
        $this->recommendedFields = [];
        $this->optionalFields = [];
    }

    public function getJsonLd($context = true, $json_object = true)
    {
        $jsonLd = [
            '@type' => $this->type,
        ];

        if ($context === true) { $jsonLd['@context'] = 'http://schema.org'; }

        foreach ($this->requiredFields as $field) {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        foreach ($this->recommendedFields as $field) {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        foreach ($this->optionalFields as $field) {
            if ($this->$field !== '') {
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
