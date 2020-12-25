<?php
// ensure a valid entry point
defined(_JEXEC) or die('Restricted Access');

/**
 * Some Component installation script
 *
 * @return boolean false on fail
 */
function com_install()
{
    $return = true;
    echo '<pre>';
    // do some task
    echo JText::_('Doing Something').': ';
    if (dosomething())
    {
        echo JText::_('Success');
    }
    else
    {
        echo JText::_('Fail');
    }
    echo '</pre>';
    
    if ($return)
    {
        echo '<p style="text-align: center;">'
            ."\n"
            . JText::_('Thank you for installing Some Component')
            ."\n</p>";
        return true;
    }

    return $return;
}

?>