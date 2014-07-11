<?php
/**
 * Project: booking-client-metro
 * Author: Mehmet Ali Ergut ( memnuniyetsizim )
 * Date: 02/07/14
 * Time: 06:33
 */

namespace MetroClient\Type;


/**
 * Class DestinationResult
 * @package MetroClient\Type
 */
class DestinationResult {
    /**
     * @var
     */
    protected $branch_code;
    /**
     * @var
     */
    protected $branch_name;
    /**
     * @var
     */
    protected $city;

    /**
     * @param $destination
     */
    function __construct($destination)
    {
        $this->setBranchCode($destination->BRANCHCODE);
        $this->setBranchName($destination->BRANCHNAME);
        $this->setCity($destination->CITY);
    }

    /**
     * @return mixed
     */
    public function getBranchCode()
    {
        return $this->branch_code;
    }

    /**
     * @param mixed $branch_code
     */
    public function setBranchCode($branch_code)
    {
        $this->branch_code = $branch_code;
    }

    /**
     * @return mixed
     */
    public function getBranchName()
    {
        return $this->branch_name;
    }

    /**
     * @param mixed $branch_name
     */
    public function setBranchName($branch_name)
    {
        $this->branch_name = $branch_name;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

} 