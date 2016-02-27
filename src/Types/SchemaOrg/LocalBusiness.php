<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class LocalBusiness implements SchemaTypeInterface
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

    public function getJsonLd($context = false, $array = true)
    {
        $jsonLd = [
            '@type' => 'LocalBusiness',
        ];

        if ($context === true) { $jsonLd['@context'] = 'http://schema.org'; }

        if ($this->address !== '') {
            $jsonLd['address'] = $this->address;
        }

        $jsonLd['name'] = $this->name;

        if ($array === true) {
            return $jsonLd;
        }

        $object = (object)$jsonLd;

        return json_encode($object);
    }
}
