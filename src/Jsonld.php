<?php namespace Taskforcedev\StructuredData;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class Jsonld
{
    public $type;

    public function __construct(SchemaTypeInterface $type)
    {
        $this->type = $type;
    }

    public function render()
    {
        echo '<script type="application/ld+json">';
        echo $this->type->getJsonLd();
        echo '</script>';
    }
}