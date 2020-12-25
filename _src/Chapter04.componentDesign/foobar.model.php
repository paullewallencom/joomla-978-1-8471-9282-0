<?php
// ensure a valid entry point
defined(_JEXEC) or die('Restricted Access');

// import the JModel class
jimport('joomla.application.component.model');

/**
 * Foobar Model
 */
class MyextensionModelFoobar extends JModel
{
    /**
     * Foobar ID
     * 
     * @var int
     */
    var $_id;


    /**
     * Foobar data
     * 
     * @var object
     */
    var $_foobar;

    /**
     * Constructor, builds object and determines the foobar ID
     * 
     */
    function __construct()
    {
        parent::__construct();

        // get the cid array from the default request hash
        $cid = JRequest::getVar('cid', false, 'DEFAULT', 'array');
        if($cid)
        {
            $id = $cid[0];
        }
        else
        {
            $id = JRequest::getInt('id', 0);
        }
        $this->setId($id);
    }

    /**
     * Resets the foobar ID and data
     * 
     * @param int foobar ID
     */
    function setId($id=0)
    {
        $this->_id = $id;
        $this->_foobar = null;
    }

    /**
     * Gets foobar data
     * 
     * @return object
     */
    function getFoobar()
    {
        // if foobar is not already loaded load it now
        if (!$this->_foobar)
        {
            $db =& $this->getDBO();
            $query = "SELECT * FROM ".$db->nameQuote('#__myextension_foobar')
            ." WHERE ".$db->nameQuote('id')." = ".$this->_id;
            $db->setQuery($query);
            $this->_foobar = $db->loadObject();
        }
        // return the foobar data
        return $this->_foobar;
    }

    /**
     * Save a foobar
     * 
     * @param mixed object or associative array of data to save
     * @return Boolean true on success
     */
    function save($data)
    {
        // get the table
        $table =& $this->getTable('Foobar');
        // save the data
        if (!$table->save($data))
        {
            // an error occurred, update the model error message
            $this->setError($table->getError());
            return false;
        }
        return true;
    }

    /**
     * Increments the hit counter
     * 
     */
    function hit()
    {
        // 
        $db =& JFactory::getDBO();
        $db->setQuery('UPDATE '.$db->nameQuote('#__myextension_foobar').' '
        .'SET '.$db->nameQuote('hits').' = '.$db->nameQuote('hits').' + 1 '
        .'WHERE id = '.$this->_id);
        $db->query();
    }

}

?>