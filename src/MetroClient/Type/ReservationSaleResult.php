<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 03/07/14
 * Time: 10:54
 */

namespace MetroClient\Type;


/**
 * Class ReservationSaleResult
 * @package MetroClient\Type
 */
class ReservationSaleResult {
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