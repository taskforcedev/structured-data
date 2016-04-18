<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing\CreativeWork\Article;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;
use Taskforcedev\StructuredData\Types\SchemaOrg\Thing\CreativeWork\Article;

class NewsArticle extends Article implements SchemaTypeInterface
{
    public function getJsonLd($context = true, $json_object = true)
    {
        $jsonLd = [
            '@type' => 'NewsArticle',
        ];

        if ($context === true) { $jsonLd['@context'] = 'http://schema.org'; }

        $requiredFields = ['author', 'datePublished', 'headline', 'image', 'name', 'publisher'];

        foreach ($requiredFields as $field) {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        $recommendedFields = ['dateModified'];

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
