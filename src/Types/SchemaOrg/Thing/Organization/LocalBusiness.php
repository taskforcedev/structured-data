<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Organization;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Organization;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class LocalBusiness extends Organization implements SchemaTypeInterface
{
    public $url;

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getJsonLd($context = true, $json_object = true)
    {
        $jsonLd = [
            '@type' => 'LocalBusiness',
        ];

        if ($context === true) { $jsonLd['@context'] = 'http://schema.org'; }

        $optionalFields = ['address', 'url'];

        foreach ($optionalFields as $field)
        {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        $jsonLd['name'] = $this->name;

        if ($json_object === true) {
            $object = (object)$jsonLd;

            return json_encode($object);
        }

        return $jsonLd;
    }
}
