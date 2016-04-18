<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing\CreativeWork\Game;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class VideoGame implements SchemaTypeInterface
{
    public function getJsonLd($context = true, $json_object = true)
    {
        $jsonLd = [
            '@type' => 'VideoGame',
        ];

        if ($context === true) { $jsonLd['@context'] = 'http://schema.org'; }

        $requiredFields = [];

        foreach ($requiredFields as $field) {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        $recommendedFields = [];

        foreach ($recommendedFields as $field) {
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
