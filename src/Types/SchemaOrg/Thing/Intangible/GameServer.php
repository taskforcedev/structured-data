<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Intangible;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing;
use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class GameServer extends Thing implements SchemaTypeInterface
{
    public function getJsonLd($context = false, $json_object = false)
    {
        $jsonLd = [
            '@type' => 'GameServer',
        ];

        if ($context === true) { $jsonLd['@context'] = 'http://schema.org'; }

        if ($json_object === true) {
            $object = (object)$jsonLd;

            return json_encode($object);
        }

        return $jsonLd;
    }
}
