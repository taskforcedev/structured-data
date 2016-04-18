<?php namespace Taskforcedev\StructuredData\Types\SchemaOrg\Thing\Intangible;

use Taskforcedev\StructuredData\Types\SchemaOrg\Thing;
use Taskforcedev\StructuredData\Types\SchemaTypeInterface;

class GameServer extends Thing implements SchemaTypeInterface
{
    public $game;
    public $playersOnline;
    public $serverStatus;

    public function setGame($game)
    {
        $this->game = $game;
    }

    public function setPlayersOnline($playersOnline)
    {
        $this->playersOnline = $playersOnline;
    }

    public function setServerStatus($serverStatus)
    {
        $this->serverStatus = $serverStatus;
    }



    public function getJsonLd($context = false, $json_object = false)
    {
        $jsonLd = [
            '@type' => 'GameServer',
        ];

        $optionalFields = [
            'game',
            'playersOnline',
            'serverStatus',
        ];

        foreach ($optionalFields as $field) {
            if ($this->$field !== '') {
                $jsonLd[$field] = $this->$field;
            }
        }

        if ($context === true) { $jsonLd['@context'] = 'http://schema.org'; }

        if ($json_object === true) {
            $object = (object)$jsonLd;

            return json_encode($object);
        }

        return $jsonLd;
    }
}
