<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Intangible\StructuredValue\ContactPoint;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing;
use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class ContactPoint extends Thing implements SchemaTypeInterface
{
    public function __construct()
    {
    }

    public function getJsonLd($context = false, $json_object = false)
    {
        $jsonLd = [
            '@type' => 'ContactPoint',
        ];

        if ($context === true) { $jsonLd['@context'] = 'http://schema.org'; }

        if ($json_object === true) {
            $object = (object)$jsonLd;

            return json_encode($object);
        }

        return $jsonLd;
    }
}
