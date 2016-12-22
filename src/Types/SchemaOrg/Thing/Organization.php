<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing;
use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class Organization extends Thing implements SchemaTypeInterface
{
    public $members;
    public $address;

    public function __construct($options = [])
    {
        parent::__construct($options);
        $this->type = 'Organization';
        $this->optionalFields[] = 'members';
        $this->recommendedFields[] = 'address';
        if (!isset($this->members)) {
            $this->members = [];
        }
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function addMember($member)
    {
        if (!is_object($member)) {
            return false; // Member must be an Organization or Person.
        }

        $this->members[] = $member;
    }
}
