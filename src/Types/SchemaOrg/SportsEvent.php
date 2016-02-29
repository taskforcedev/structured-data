<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class SportsEvent implements SchemaTypeInterface
{
    public $name; // Required.
    public $startDate; // Required.
    public $location; // Required.
    public $eventStatus; // Optional.

    public function __construct($options = [])
    {
        $fields = ['name', 'eventStatus', 'startDate', 'location'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $options)) {
                $this->$field = $options[$field];
            } else {
                $this->$field = '';
            }
        }

        if ($this->eventStatus == '') {
            $this->eventStatus = 'EventScheduled';
        }
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEventStatus($eventStatus = 'EventScheduled')
    {
        $validStatuses = [
            'EventCancelled', 'EventPostponed', 'EventRescheduled', 'EventScheduled'
        ];

        if (!in_array($eventStatus, $validStatuses)) {
            $eventStatus = 'EventScheduled';
        }

        $this->eventStatus = $eventStatus;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getJsonLd($context = true, $json_object = true)
    {
        $jsonLd = [
            '@context' => 'http://schema.org',
            '@type' => 'SportsEvent',
        ];

        $requiredFields = ['name', 'startDate'];

        foreach ($requiredFields as $field) {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        // Location is also required but needs to be cast to an object.
        if ($this->location !== '') {
            $jsonLd['location'] = (object)$this->location;
        }

        $optionalFields = ['eventStatus'];

        foreach ($optionalFields as $field) {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        $object = (object)$jsonLd;

        return json_encode($object);
    }
}
