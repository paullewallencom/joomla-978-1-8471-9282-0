<?php
// ensure a valid entry point
defined(_JEXEC) or die('Restricted Access');

/**
 * #__myextenstion_foobars table handler
 * 
 */
class TableFoobar extends JTable
{
    /** @var int Primary key */
    var $id = null;
    /** @var string Content */
    var $content = null;
    /** @var int Checked out owner */
    var $checked_out = null;
    /** @var string Checked out time */
    var $checked_out_time = null;
    /** @var string Parameters */
    var $params = null;
    /** @var int Order position */
    var $ordering = null;
    /** @var int Number of views */
    var $hits = null;

    /**
     * Constructor
     *
     * @param database Database object
     */
    function __construct( &$db )
    {
        parent::__construct('#__myextension_foobars', 'id', $db);
    }

    /**
     * Validation
     *
     * @return boolean True if buffer is valid
     */
    function check()
    {
        if(!$this->content)
        {
            $this->setError(JText::_('Your Foobar must contain some content'));
            return false;
        }

        return true;
    }

}

?>