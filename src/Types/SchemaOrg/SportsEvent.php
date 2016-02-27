<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg;

use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class SportsEvent implements SchemaTypeInterface
{
    public $name;
    public $status;
    public $date;
    public $location;

    public function __construct($options = [])
    {
        $fields = ['name', 'status', 'date', 'location'];

        foreach ($fields as $field) {
            if (array_key_exists($field, $options)) {
                $this->$field = $options[$field];
            } else {
                $this->$field = '';
            }
        }

        if ($this->status == '') {
            $this->status = 'EventScheduled';
        }
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setStatus($status = 'EventScheduled')
    {
        $validStatuses = [
            'EventCancelled', 'EventPostponed', 'EventRescheduled', 'EventScheduled'
        ];

        if (!in_array($status, $validStatuses)) {
            $status = 'EventScheduled';
        }

        $this->status = $status;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getJsonLd()
    {
        $jsonLd = [
            '@context' => 'http://schema.org',
            '@type' => 'SportsEvent',
        ];

        if ($this->name !== '') { $jsonLd['name'] = $this->name; }
        if ($this->date !== '') { $jsonLd['startDate'] = $this->date; }
        if ($this->status !== '') { $jsonLd['eventStatus'] = $this->status; }
        if ($this->location !== '') {
            $jsonLd['location'] = (object)$this->location;
        }

        $object = (object)$jsonLd;

        return json_encode($object);
    }
}