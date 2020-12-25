<?php

// should be implemented as a method in a JModel sub class

/**
* Get number of items
 *
 * @access public
 * @return integer
 */
function getTotal()
{
     if (empty($this->_total))
    {
        $query = $this->_buildQuery();
        $this->_total = $this->_getListCount($query);
    }
 
    return $this->_total;
}

?>