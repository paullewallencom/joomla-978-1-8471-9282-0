<?
// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Demonstrates how to implement getInstance
 */
class SomeClass extends JObject
{

    /**
     * A private string attribute.
     * @access private
     * @param string
     */
    var $_foo = null;

    /**
     * Constructor
     *
     * @access private
     * @param string A string
     * @return	SomeClass New object
     */
    function __construct($foo)
    {
        $this->_foo = $foo;
    }

    /**
     * Returns a reference to a global SomeClass object
     *
     * @access public
     * @static
     * @param string A string
     * @return	SomeClass A global SomeClass object
     */
    function &getInstance($foo)
    {
        static $instances;
        $foo = (string)$foo;

        if (!$instances)
        {
            $instances = array();
        }

        if (!$instance[$foo])
        {
            $instances[$foo] = new SomeClass($foo);
        }

        return $instances[$foo];
    }
}

?>