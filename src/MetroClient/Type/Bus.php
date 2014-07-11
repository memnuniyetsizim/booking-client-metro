<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 02/07/14
 * Time: 23:55
 */

namespace MetroClient\Type;


use MetroClient\Service\Client;

/**
 * Class Bus
 * @package MetroClient\Type
 */
class Bus extends AbstractType {
    /**
     * @var array
     */
    private $bus_schema;
    /**
     * @var Client object
     */
    private $client;
    /**
     * @var
     */
    private $bus_id;
    /**
     * @var
     */
    private $journey_date;
    /**
     * @var
     */
    private $departure_id;
    /**
     * @var
     */
    private $destination_id;
    /**
     * @var
     */
    private $journey_no;

    /**
     * Call method
     */
    const CALL_METHOD = 'getBusSchema';

    /**
     * @param $wsdl
     * @param $credentials
     */
    function __construct($wsdl, $credentials)
    {
        $this->client = new Client($wsdl, $credentials);
    }

    /**
     * @param mixed $bus_id
     */
    public function setBusId($bus_id)
    {
        $this->bus_id = $bus_id;
    }

    /**
     * @param mixed $departure_id
     */
    public function setDepartureId($departure_id)
    {
        $this->departure_id = $departure_id;
    }

    /**
     * @param mixed $destination_id
     */
    public function setDestinationId($destination_id)
    {
        $this->destination_id = $destination_id;
    }

    /**
     * @param mixed $journey_date
     */
    public function setJourneyDate(\DateTime $journey_date)
    {
        $this->journey_date = $journey_date->format('Y-m-d');
    }

    /**
     * @param mixed $journey_no
     */
    public function setJourneyNo($journey_no)
    {
        $this->journey_no = $journey_no;
    }

    /**
     * @return array
     */
    private function _getParameters()
    {
        return array('busDescId' => $this->bus_id,
            'journeyDate' => $this->journey_date,
            'departureId' => $this->departure_id,
            'destinationId' => $this->destination_id,
            'journeyNo' => $this->journey_no
        );
    }

    /**
     * @return mixed
     */
    public function getBusSchema()
    {
        $call_result = $this->client->request($this::CALL_METHOD, $this->_getParameters());
        return $this->parseResult($call_result);
    }

    /**
     * @param $result
     * @return mixed
     */
    public function parseResult($result)
    {
        $this->bus_schema = new \ArrayObject();
        $xml_result = (array) $result->getBusSchemaResult;
        if($this->_checkResult($xml_result['models.busSeats']))
        {
            foreach($xml_result['models.busSeats'] as $item => $seat )
            {
                $this->bus_schema->append(new BusResult($seat));
            }
            return $this->bus_schema;
        } else {
            return false;
        }
    }

    /**
     * @param $result
     * @return bool
     */
    private function _checkResult($result)
    {
        return count($result)?true:false;
    }
} 