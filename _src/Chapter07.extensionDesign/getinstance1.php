<?
// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Demonstrates the singleton pattern in Joomla!
 */
class SomeClass extends JObject
{
    /**
     * Constructor
     *
     * @access private
     * @return	SomeClass New object
     */
    function __construct() { }

    /**
     * Returns a reference to the global SomeClass object
     *
     * @access public
     * @static
     * @return	SomeClass The SomeClass object
     */
    function &getInstance()
    {
        static $instance;

        if (!$instance)
        {
            $instance = new SomeClass();
        }

        return $instance;
    }
}

?>