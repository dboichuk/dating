<?php
class PremiumMember extends Member {

    private $_inDoorInterests;
    private $_outDoorInterests;

    /** get in-door interests
     * @return string array
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /** set in-door interests
     * @param string array
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /** return out door interest
     * @return string array
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /** set out door interests
     * @param string array
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }



}
