<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing;
use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class Place extends Thing implements SchemaTypeInterface
{
    public $address;

    public function __construct($options = [])
    {
        parent::__construct($options);
        $this->type = 'Place';
        $this->recommendedFields[] = 'address';
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }
}
