<?php
/**
 * Some Class which extends JObject
 */
class SomeClass extends JObject
{
    /**
     * Object name
     * @var string
     */
    var $name;

    /**
     * PHP 5 style Constructor
     *
     * @access	protected
     * @param string name
     */
    function __construct($name)
    {
        $this->name = $name;
        parent::__construct();
    }
}
?>