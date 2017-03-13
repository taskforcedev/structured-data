<?php

namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing\CreativeWork;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class WebSite extends CreativeWork implements SchemaTypeInterface
{
    public function __construct()
    {
        $this->requiredFields = [
            
        ];

        $this->recommendedFields = [
            
        ];

        $this->type = 'WebSite';
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

        $optionalFields = [];

        foreach ($optionalFields as $field) {
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
