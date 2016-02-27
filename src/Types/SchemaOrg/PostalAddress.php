<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class PostalAddress implements SchemaTypeInterface
{
    public $addressCountry;
    public $postalCode;
    public $streetAddress;

    public function __construct()
    {
        $this->addressCountry = '';
        $this->postalCode = '';
        $this->streetAddress = '';
    }

    public function setAddress($address)
    {
        $this->streetAddress = $address;
    }

    public function setCountry($country)
    {
        $this->addressCountry = $country;
    }

    public function setPostCode($postCode)
    {
        $this->postalCode = $postCode;
    }

    public function getJsonLd($context = false)
    {
        $jsonLd = [
            '@type' => 'PostalAddress',
        ];

        if ($context === true) { $jsonLd['@context'] = 'http://schema.org'; }

        if ($this->streetAddress !== '') { $jsonLd['streetAddress'] = $this->streetAddress; }
        if ($this->addressCountry !== '') { $jsonLd['addressCountry'] = $this->addressCountry; }
        if ($this->postalCode !== '') { $jsonLd['postalCode'] = $this->postalCode; }

        return $jsonLd;
    }
}