<?php
// ensure a valid entry point
defined(_JEXEC) or die('Restricted Access');

/**
 * Builds route for My Extension.
 *
 * @access public
 * @param array Query associative array
 * @return array SEF URI segments
 */
function myextensionBuildRoute(&$query)
{
    $segments = array();

    if (isset($query['category']))
    {
        $segments[] = $query['category'];
        unset($query['category']);

        if (isset($query['item']))
        {
            $segments[] = $query['item'];
            unset($query['item']);
        }
    }

    return $segments;
}

/**
 * Decodes SEF URI segments for My Extension.
 *
 * @access public
 * @param array SEF URI segments array
 * @return array Query associative array
 */
function myextensionParseRoute($segments)
{
    $query = array();

    if (isset($segments[0]))
    {
        $query['category'] = $segments[0];

        if (isset($segments[1]))
        {
            $query['item'] = $segments[1];
        }
    }

    return $query;
}

?>