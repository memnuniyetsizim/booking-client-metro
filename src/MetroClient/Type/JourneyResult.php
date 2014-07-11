<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 02/07/14
 * Time: 06:41
 */

namespace MetroClient\Type;


/**
 * Class JourneyResult
 * @package MetroClient\Type
 */
class JourneyResult {
    /**
     * @var
     */
    protected $journey_no;
    /**
     * @var
     */
    protected $journey_path;
    /**
     * @var
     */
    protected $journey_description;
    /**
     * @var
     * Departure time
     */
    protected $stop_hour;
    /**
     * @var
     */
    protected $end_hour;
    /**
     * @var
     */
    protected $remaining_seats;
    /**
     * @var
     */
    protected $extra_journey;
    /**
     * @var
     */
    protected $bus_type;
    /**
     * @var
     */
    protected $multi_type;
    /**
     * @var
     */
    protected $order_no_01;
    /**
     * @var
     */
    protected $order_no_02;
    /**
     * @var
     */
    protected $bus_description_id;
    /**
     * @var
     */
    protected $linkok;
    /**
     * @var
     */
    protected $price;
    /**
     * @var
     */
    protected $begin_id;
    /**
     * @var
     */
    protected $end_id;
    /**
     * @var
     */
    protected $begin_crossroad_id;
    /**
     * @var
     */
    protected $end_crossroad_id;
    /**
     * @var
     */
    protected $int_price;
    /**
     * @var
     */
    protected $card_price;
    /**
     * @var
     */
    protected $discount_price;
    /**
     * @var
     */
    protected $date;
    /**
     * @var
     */
    protected $departure_station;
    /**
     * @var
     */
    protected $destination_station;
    /**
     * @TODO can not find the meaning of this.
     * @var
     */
    protected $satilable;

    function __construct($journey)
    {
        $this->setBeginCrossroadId($journey->BEGINARAYOLID);
        $this->setBeginId($journey->BEGINID);
        $this->setBusDescriptionId($journey->BUSDESCRIPTIONID);
        $this->setBusType($journey->BUSTYPE);
        $this->setCardPrice($journey->CARDPRICE);
        $this->setDate($journey->TARIH);
        $this->setDepartureStation($journey->BINIS);
        $this->setDestinationStation($journey->INIS);
        $this->setDiscountPrice($journey->DISCOUNTPRICE);
        $this->setEndCrossroadId($journey->ENDARAYOLID);
        $this->setEndHour($journey->ENDHOUR);
        $this->setEndId($journey->ENDID);
        $this->setExtraJourney($journey->EXTRASEFER);
        $this->setIntPrice($journey->INTPRICE);
        $this->setJourneyDescription($journey->JOURNEYDSC);
        $this->setJourneyNo($journey->SEFERNO);
        $this->setJourneyPath($journey->GUZERGAH);
        $this->setLinkok($journey->LINKOK);
        $this->setMultiType($journey->MULTITYPE);
        $this->setOrderNo01($journey->SIRANO1);
        $this->setOrderNo02($journey->SIRANO2);
        $this->setPrice($journey->FIYAT);
        $this->setRemainingSeats($journey->KALANKOLTUK);
        $this->setSatilable($journey->SATILABLE);
        $this->setStopHour($journey->STOPHOUR);
    }

    /**
     * @return mixed
     */
    public function getBeginCrossroadId()
    {
        return $this->begin_crossroad_id;
    }

    /**
     * @param mixed $begin_crossroad_id
     */
    public function setBeginCrossroadId($begin_crossroad_id)
    {
        $this->begin_crossroad_id = $begin_crossroad_id;
    }

    /**
     * @return mixed
     */
    public function getBeginId()
    {
        return $this->begin_id;
    }

    /**
     * @param mixed $begin_id
     */
    public function setBeginId($begin_id)
    {
        $this->begin_id = $begin_id;
    }

    /**
     * @return mixed
     */
    public function getBusDescriptionId()
    {
        return $this->bus_description_id;
    }

    /**
     * @param mixed $bus_description
     */
    public function setBusDescriptionId($bus_description_id)
    {
        $this->bus_description_id = $bus_description_id;
    }

    /**
     * @return mixed
     */
    public function getBusType()
    {
        return $this->bus_type;
    }

    /**
     * @param mixed $bus_type
     */
    public function setBusType($bus_type)
    {
        $this->bus_type = $bus_type;
    }

    /**
     * @return mixed
     */
    public function getCardPrice()
    {
        return $this->card_price;
    }

    /**
     * @param mixed $card_price
     */
    public function setCardPrice($card_price)
    {
        $this->card_price = $card_price;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getDepartureStation()
    {
        return $this->departure_station;
    }

    /**
     * @param mixed $departure_station
     */
    public function setDepartureStation($departure_station)
    {
        $this->departure_station = $departure_station;
    }

    /**
     * @return mixed
     */
    public function getDestinationStation()
    {
        return $this->destination_station;
    }

    /**
     * @param mixed $destination_station
     */
    public function setDestinationStation($destination_station)
    {
        $this->destination_station = $destination_station;
    }

    /**
     * @return mixed
     */
    public function getDiscountPrice()
    {
        return $this->discount_price;
    }

    /**
     * @param mixed $discount_price
     */
    public function setDiscountPrice($discount_price)
    {
        $this->discount_price = $discount_price;
    }

    /**
     * @return mixed
     */
    public function getEndCrossroadId()
    {
        return $this->end_crossroad_id;
    }

    /**
     * @param mixed $end_crossroad_id
     */
    public function setEndCrossroadId($end_crossroad_id)
    {
        $this->end_crossroad_id = $end_crossroad_id;
    }

    /**
     * @return mixed
     */
    public function getEndHour()
    {
        return $this->end_hour;
    }

    /**
     * @param mixed $end_hour
     */
    public function setEndHour($end_hour)
    {
        $this->end_hour = $end_hour;
    }

    /**
     * @return mixed
     */
    public function getEndId()
    {
        return $this->end_id;
    }

    /**
     * @param mixed $end_id
     */
    public function setEndId($end_id)
    {
        $this->end_id = $end_id;
    }

    /**
     * @return mixed
     */
    public function getExtraJourney()
    {
        return $this->extra_journey;
    }

    /**
     * @param mixed $extra_journey
     */
    public function setExtraJourney($extra_journey)
    {
        $this->extra_journey = $extra_journey;
    }

    /**
     * @return mixed
     */
    public function getIntPrice()
    {
        return $this->int_price;
    }

    /**
     * @param mixed $int_price
     */
    public function setIntPrice($int_price)
    {
        $this->int_price = $int_price;
    }

    /**
     * @return mixed
     */
    public function getJourneyDescription()
    {
        return $this->journey_description;
    }

    /**
     * @param mixed $journey_description
     */
    public function setJourneyDescription($journey_description)
    {
        $this->journey_description = $journey_description;
    }

    /**
     * @return mixed
     */
    public function getJourneyNo()
    {
        return $this->journey_no;
    }

    /**
     * @param mixed $journey_no
     */
    public function setJourneyNo($journey_no)
    {
        $this->journey_no = $journey_no;
    }

    /**
     * @return mixed
     */
    public function getJourneyPath()
    {
        return $this->journey_path;
    }

    /**
     * @param mixed $journey_path
     */
    public function setJourneyPath($journey_path)
    {
        $this->journey_path = $journey_path;
    }

    /**
     * @return mixed
     */
    public function getLinkok()
    {
        return $this->linkok;
    }

    /**
     * @param mixed $linkok
     */
    public function setLinkok($linkok)
    {
        $this->linkok = $linkok;
    }

    /**
     * @return mixed
     */
    public function getMultiType()
    {
        return $this->multi_type;
    }

    /**
     * @param mixed $multi_type
     */
    public function setMultiType($multi_type)
    {
        $this->multi_type = $multi_type;
    }

    /**
     * @return mixed
     */
    public function getOrderNo01()
    {
        return $this->order_no_01;
    }

    /**
     * @param mixed $order_no_01
     */
    public function setOrderNo01($order_no_01)
    {
        $this->order_no_01 = $order_no_01;
    }

    /**
     * @return mixed
     */
    public function getOrderNo02()
    {
        return $this->order_no_02;
    }

    /**
     * @param mixed $order_no_02
     */
    public function setOrderNo02($order_no_02)
    {
        $this->order_no_02 = $order_no_02;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getRemainingSeats()
    {
        return $this->remaining_seats;
    }

    /**
     * @param mixed $remaining_seats
     */
    public function setRemainingSeats($remaining_seats)
    {
        $this->remaining_seats = $remaining_seats;
    }

    /**
     * @return mixed
     */
    public function getSatilable()
    {
        return $this->satilable;
    }

    /**
     * @param mixed $satilable
     */
    public function setSatilable($satilable)
    {
        $this->satilable = $satilable;
    }

    /**
     * @return mixed
     */
    public function getStopHour()
    {
        return $this->stop_hour;
    }

    /**
     * @param mixed $stop_hour
     */
    public function setStopHour($stop_hour)
    {
        $this->stop_hour = $stop_hour;
    }

} 