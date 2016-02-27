<?php namespace Taskforcedev\StructuredData\Types;

interface SchemaTypeInterface
{
    public function getJsonLd($context, $json_object);
}