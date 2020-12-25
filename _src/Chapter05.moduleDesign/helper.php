<?php
// ensure a valid entry point
defined(_JEXEC) or die('Restricted Access');

/**
 * My Extension Module Helper
 *
 * @static
 */
class modMyExtensionHelper
{

    /**
     * Gets an array of items
     *
     * @param JParameter Module parameters
     * @return mixed Array of items, false on failure
     */
    function &getItems(&$params)
    {
        static $instances;

        if (!isset($instances))
        {
            $instances = array();
        }

        $category = $params->get('category', 0);

        if (empty($instances[$category]))
        {
            $db =& JFactory::getDBO();
            $query = modMyExtensionHelper::_buildQuery($category);

            $db->setQuery($query);
            @$instances[$category] = $db->loadObjectList();
        }

        return $instances[$category];
    }

    /**
     * Gets an SQL query string
     *
     * @param JParameter Module parameters
     * @return string SQL query
     */
    function _buildQuery($category)
    {
        $db =& JFactory::getDBO();

        return 'SELECT * FROM '.$db->nameQuote('#__some_table').
        ' WHERE '.$db->nameQuote('category').' = '.$category.
        ' AND '.$db->nameQuote('published').' = 1';
    }
}

?>