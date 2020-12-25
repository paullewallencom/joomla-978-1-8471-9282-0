<?
// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Demonstrates how to implement getInstance dynamically
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
     * Returns a reference to the global SomeClass object
     *
     * @access public
     * @static
     * param string A string
     * @return mixed A SomeClass object, false on failure
     */
    function &getInstance($foo)
    {
        static $instances;

        // prepare static array
        if (!$instances)
        {
            $instances = array();
        }

        $bar = (string)$foo;
        $class = 'SomeClass'.$foo;
        $file = strtolower($foo).'.php';

        if (empty($instances[$foo]))
        {
            if (!class_exists($class))
            {
                // class does not exists so we need to find it
                jimport('joomla.filesystem.file');
                if(JFile::exists(JPATH_COMPONENT.DS.$file))
                {
                    // file found, let’s include it
                    require_once JPATH_COMPONENT.DS.$file;

                    if (!class_exists($class))
                    {
                        // file doesn’t contain the class!
                        JError::raiseError(0, 'Class '.$class.' not found.');
                        return false;
                    }
                }
                else
                {
                    // file where the class should be, not found
                    JError::raiseError('ERROR_CODE', 'File '.$file.' not found.' );
                    return false;
                }
            }
            $instances[$foo] = new $class();
        }

        return $instances[$foo];
    }

}

?>