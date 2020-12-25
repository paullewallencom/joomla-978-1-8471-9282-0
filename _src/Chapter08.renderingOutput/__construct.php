<?php

// should be implemented as a method in a JModel sub class

/**
 * Constructor
 *
 */
function __construct()
{
    global $mainframe; 
    parent::__construct(); 
    // Get the pagination request variables 
    $limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'));
    $limitstart = $mainframe->getUserStateFromRequest($option.'limitstart', 'limitstart', 0); 
    // set the state pagination variables
    $this->setState('limit', $limit);
    $this->setState('limitstart', $limitstart);
}


?>