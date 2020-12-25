<?php

// should be implemented methods in a JModel sub class

/**
 * Builds a query to get data from #__sometable
 *
 * @return string SQL query
 */
function _buildQuery()
{
    return ' SELECT * '
        . ' FROM #__sometable '
	. $this->_buildQueryWhere()
        . $this->_buildQueryOrderBy();
}

/**
 * Builds the ORDER part of a query
 *
 * @return string Part of an SQL query
 */
function _buildQueryOrderBy()
{
    global $mainframe, $option;

    // Array of allowable order fields
    $orders = array('name', 'published', 'id'); 
    // get the order field and direction
    $filter_order = $mainframe->getUserStateFromRequest($option.'filter_order', 'filter_order', 'published');
    $filter_order_Dir = strtoupper($mainframe->getUserStateFromRequest($option.'filter_order_Dir', 'filter_order_Dir', 'ASC')); 

    // validate the order direction, must be ASC or DESC
    if ($filter_order_Dir != 'ASC' && $filter_order_Dir != 'DESC')
    {
        $filter_order_Dir = 'ASC';
    }

    // if order column is unknown use the default
    if (!in_array($filter_order, $orders))
    {
        $filter_order = 'published';
    }

    // return the ORDER BY clause        
    return ' ORDER BY '.$filter_order.' '.$filter_order_Dir;
}

/**
 * Builds the WHERE part of a query
 *
 * @return string Part of an SQL query
 */
function _buildFAQWhere()
{
    global $mainframe, $option; 

    // get the filter values
    $filter_state = $mainframe->getUserStateFromRequest($option.'filter_state', 'filter_state');
    $filter_catid = $mainframe->getUserStateFromRequest($option.'filter_catid', 'filter_catid');
    $filter_search = $mainframe->getUserStateFromRequest($option.'filter_search', 'filter_search'); 

    // prepare the WHERE clause
    $where = array(); 
    // Determine published state
    if ( $filter_state == 'P' )
    {
        $where[] = 'published = 1';
    }
    elseif
    ($filter_state == 'U')
    {
        $where[] = 'published = 0';
    } 

    // Determine category ID
    if ($filter_catid = (int)$filter_catid)
    {
        $where[] = 'catid = '.$filter_catid;
    }

    // Determine search terms
    if ($filter_search = trim($filter_search))
    {
        $filter_search = JString::strtolower($filter_search);
        $db =& $this->_db;
        $filter_search = $db->getEscaped($filter_search);
        $where[] = 'LOWER(name) LIKE "%'.$filter_search.'%"';
    }

    // return the WHERE clause
    return (count($where)) ? ' WHERE '.implode(' AND ', $where) : '';
}

?>