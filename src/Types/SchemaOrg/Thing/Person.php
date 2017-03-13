<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;
use Taskforcedev\StructuredData\Types\SchemaOrg\Thing;
use Taskforcedev\StructuredData\Interfaces\CreativeWorkAuthorInterface;

class Person extends Thing implements SchemaTypeInterface, CreativeWorkAuthorInterface
{
    public $givenName = '';
    public $familyName = '';
    public $email = '';

    public function __construct(array $options = [])
    {
        parent::__construct($options);
        $this->requiredFields[] = 'givenName';
        $this->requiredFields[] = 'familyName';
        $this->optionalFields[] = 'email';
        $this->type = 'Person';
    }

    public function setGivenName($givenName) { $this->givenName = $givenName; }
    public function setForename($forename) { $this->givenName = $forename; }
    public function setFamilyName($familyName) { $this->familyName = $familyName; }
    public function setSurname($surname) { $this->familyName = $surname; }
    public function setEmail($email) { $this->email = $email; }
}
