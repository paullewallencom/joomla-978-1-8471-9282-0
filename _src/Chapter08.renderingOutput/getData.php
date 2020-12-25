<?php

// should be implemented as a method in a JModel sub class

/**
 * Get itemized data
 *
 * @access public
 * @return array
 */
 function getData()
{
    if (empty($this->_data))
    {
        $query = $this->_buildQuery();
        $limitstart = $this->getState('limitstart');
        $limit = $this->getState('limit');
        $this->_data = $this->_getList($query, $limitstart, $limit);
    } 
    
    return $this->_data;
}

?>