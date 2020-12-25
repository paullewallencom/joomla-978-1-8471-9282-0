<?php
// ensure a valid entry point
defined(_JEXEC) or die('Restricted Access');

// import the JModel class
jimport('joomla.application.component.view');

/**
 * Foobar View
 */
class MyextensionViewFoobar extends JView
{

    /**
     * Renders the view
     *
     */
    function display()
    {
        // interrogate the model
        $foobar =& $this->get('Foobar');
        $this->assignRef('foobar', $foobar);
        // display the view
        parent::display();
    }
}


?>