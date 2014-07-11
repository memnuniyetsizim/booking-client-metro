<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 03/07/14
 * Time: 09:31
 */

namespace MetroClient\Type;


/**
 * Class ReservationSaveResult
 * @package MetroClient\Type
 */
class ReservationSaveResult {
    /**
     * @var boolean
     */
    protected $is_sale;

    /**
     * @param $result
     */
    function __construct($result)
    {
        $this->is_sale = $result;
    }

    /**
     * @return mixed
     */
    public function getIsSaled()
    {
        return $this->is_sale;
    }

    /**
     * @param $is_sale
     */
    public function setIsSaled($is_sale)
    {
        $this->is_sale = $is_sale;
    }
} 