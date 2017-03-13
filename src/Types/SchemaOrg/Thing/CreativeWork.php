<?php

namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;
use Taskforcedev\StructuredData\Interfaces\SchemaOrg\CreativeWorkAuthorInterface;
use Taskforcedev\StructuredData\Types\SchemaOrg\Thing;

class CreativeWork extends Thing implements SchemaTypeInterface
{
    public $author;

    public function __construct()
    {
        parent::__construct();
        $this->recommendedFields[] = 'author';

        $this->type = 'CreativeWork';
    }

    public function setAuthor(CreativeWorkAuthorInterface $author)
    {
        $context = false;
        $json_encode = false;
        $this->author = $author->getJsonLd($context, $json_encode);
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
