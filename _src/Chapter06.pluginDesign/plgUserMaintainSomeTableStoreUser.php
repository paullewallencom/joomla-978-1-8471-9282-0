<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

$mainframe->registerEvent('onAfterStoreUser', 'plgUserMaintainSomeTableStoreUser');

/**
 * Add new rcord to #__some_table when a new user is created
 *
 * @param array User attributes
 * @param boolean True if the user is new
 * @param boolean True if the user was successfully stored
 * @param string Error message
 * @return array Array of three elements: JavaScript action, Button name, CSS class.
 */
function plgUserMaintainSomeTableStoreUser($user, $isnew, $success, $msg)
{
    // if they are a new user and the store was successful
    if ($isnew && $success)
    {
        // add a record to #__some_table
        $db = JFactory::getDBO();
        $query = 'INSERT INTO '.$db->nameQuote('#__some_table')
        .' SET '.$db->nameQuote('userid').' = '.$user['id'];
        $db->setQuery($query);
        $db->query();
    }
}

?>