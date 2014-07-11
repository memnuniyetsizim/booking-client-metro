<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 03/07/14
 * Time: 02:04
 */

namespace MetroClient\Type;


/**
 * Class BusResult
 * @package MetroClient\Type
 */
class BusResult {
    /**
     * seat types
     */
    const ALONE_SEAT = 0;
    const DOOR_SEAT = 1;
    const TABLE_SEAT = 2;
    const NORMAL_SEAT = 3;
    const WC_SEAT = 4;
    const UNKNOWN_SEAT = 5;

    /**
     * gender types
     */
    const GENDER_EMPTY = 0;
    const GENDER_MAN = 1;
    const GENDER_WOMAN = 2;
    const GENDER_LOCKED = 3;
    const GENDER_QUOTA_GET_ON = 4;
    const GENDER_QUOTA_GET_OFF = 5;

    /**
     * @var
     */
    protected $column;
    /**
     * @var
     */
    protected $floor;
    /**
     * Empty = 0, Man = 1, Woman = 2, Locked = 3, QuotaGetOn = 4, QuotaGetOff = 5
     */
    protected $gender;
    /**
     * @var
     */
    protected $is_sold;
    /**
     * @var
     */
    protected $row;
    /**
     * @var
     */
    protected $seat_no;
    /**
     * Alone = 0, Door = 1, Table = 2, Seat = 3, WC = 5, UNKNOWN
     */
    protected $seat_type;

    function __construct($bus_schema)
    {
        $this->setColumn($bus_schema->colNum);
        $this->setFloor($bus_schema->floorNum);
        $this->setGender($bus_schema->gender);
        $this->setIsSold($bus_schema->isSold);
        $this->setRow($bus_schema->rowNum);
        $this->setSeatNo($bus_schema->seatNum);
        $this->setSeatType($bus_schema->seatType);
    }

    /**
     * @return mixed
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * @param mixed $column
     */
    public function setColumn($column)
    {
        $this->column = $column;
    }

    /**
     * @return mixed
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * @param mixed $floor
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getIsSold()
    {
        return $this->is_sold;
    }

    /**
     * @param mixed $is_sold
     */
    public function setIsSold($is_sold)
    {
        $this->is_sold = $is_sold;
    }

    /**
     * @return mixed
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * @param mixed $row
     */
    public function setRow($row)
    {
        $this->row = $row;
    }

    /**
     * @return mixed
     */
    public function getSeatNo()
    {
        return $this->seat_no;
    }

    /**
     * @param mixed $seat_no
     */
    public function setSeatNo($seat_no)
    {
        $this->seat_no = $seat_no;
    }

    /**
     * @return mixed
     */
    public function getSeatType()
    {
        return $this->seat_type;
    }

    /**
     * @param mixed $seat_type
     */
    public function setSeatType($seat_type)
    {
        $this->seat_type = $seat_type;
    }

}