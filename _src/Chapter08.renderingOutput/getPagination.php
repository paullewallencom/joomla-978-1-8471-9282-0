<?php

// should be implemented as a method in a JModel sub class

/**
 * Get a pagination object
 *
 * @access public
 * @return JPagination
 */
function getPagination()
{
    if (empty($this->_pagination))
    {
        // import the pagination library
        jimport('joomla.html.pagination'); 
        // prepare the pagination values
        $total = $this->getTotal();
        $limitstart = $this->getState('limitstart');
        $limit = $this->getState('limit');

        // create the pagination object
        $this->_pagination = new JPagination($total, $limitstart, $limit);
    }

    return $this->_pagination;
}

?>