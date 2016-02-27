<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class Place implements SchemaTypeInterface
{
    public $address;
    public $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getJsonLd($context = false, $json_object = false)
    {
        $jsonLd = [
            '@type' => 'Place',
        ];

        if ($context === true) { $jsonLd['@context'] = 'http://schema.org'; }

        $jsonLd['address'] = $this->address;
        $jsonLd['name'] = $this->name;

        if ($json_object === true) {
            $object = (object)$jsonLd;

            return json_encode($object);
        }

        return $jsonLd;
    }
}
