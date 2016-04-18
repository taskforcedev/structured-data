<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing\CreativeWork;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class Article implements SchemaTypeInterface
{
    public $author; // Required.
    public $datePublished; // Required.
    public $headline; // Required.
    public $image; // Required.
    public $name; // Required.
    public $publisher; // Required.
    public $dateModified; // Recommended.
    public $mainEntityOfPage; // Recommended.

    // Setters
    public function setAuthor($author) { $this->author = $author; }
    public function setDatePublished($datePublished) { $this->datePublished = $datePublished; }
    public function setHeadline($headline) { $this->headline = $headline; }
    public function setImage($image) { $this->image = $image; }
    public function setName($name) { $this->name = $name; }
    public function setPublisher($publisher) { $this->publisher = $publisher; }
    public function setDateModified($dateModified) { $this->dateModified = $dateModified; }
    public function setMainEntityOfPage($mainEntityOfPage) { $this->mainEntityOfPage = $mainEntityOfPage; }

    public function getJsonLd($context = true, $json_object = true)
    {
        $jsonLd = [
            '@type' => 'Article',
        ];

        if ($context === true) { $jsonLd['@context'] = 'http://schema.org'; }

        $requiredFields = ['author', 'datePublished', 'headline', 'image', 'name', 'publisher'];

        foreach ($requiredFields as $field) {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        $recommendedFields = ['dateModified'];

        foreach ($recommendedFields as $field) {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        $optionalFields = [];

        foreach ($optionalFields as $field) {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        if ($json_object === true) {
            $object = (object)$jsonLd;

            return json_encode($object);
        }

        return $jsonLd;
    }
}
