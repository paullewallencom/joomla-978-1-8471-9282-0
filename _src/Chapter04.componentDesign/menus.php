<?php
// ensure a valid entry point
defined(_JEXEC) or die('Restricted Access');

/**
 * Renders a Menus Selection List
 *
 */
class JElementMenus extends JElement
{
   /**
    * Element type
    *
    * @access    protected
    * @var        string
    */
    var    $_name = 'Menus';

    /**
     * Gets an HTML rendered string of the element
     *
     * @param string Name of the form element
     * @param string Value
     * @param JSimpleXMLElement XML node in which the element is defined
     * @param string Control set name, normally params
     */
    function fetchElement($name, $value, &$node, $control_name)
    {
        // get the CSS Style from the XML node class attribute
        $class = $node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="inputbox"';

        // prepare an array for the options
        $groups = array();
        foreach ($node->children() as $group)
        {
            // create new Group, <OPTGROUP> signifies a group
            $text = $group->data();
            $groups[] = JHTML::_('select.optgroup', JText::_($text));
            
            foreach ($group->children() as $option)
            {
                // add an option to the group
                $val = $option->attributes('value');
                $text = $option->data();
                $groups[] = JHTML::_('select.option', $val, JText::_($text));
            }
            
        }

        // create the HTML list and return it (this sorts out the selected option for us)
        return JHTMLSelect::genericList($groups, ''.$control_name.'['.$name.']', $class, 'value', 'text', $value, $control_name.$name);
    }
}

?>