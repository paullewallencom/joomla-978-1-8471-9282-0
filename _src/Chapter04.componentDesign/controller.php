<?php
// ensure a valid entry point
defined(_JEXEC) or die('Restricted Access');

// import the JModel class
jimport('joomla.application.component.controller');

/**
 * MyExtension Controller
 *
 */
class MyextensionController extends JController
{

    /**
     * Constructor
     *
     */
    function __construct()
    {
        // execute parents constructor
        parent::__construct();
        // use the same models as the back-end
        $path = JPATH_COMPONENT_ADMINISTRATOR.DS.'models';
        $this->addModelPath($path);

        // use the same views as the back-end
        $path = JPATH_COMPONENT_ADMINISTRATOR.DS.'views'
        $this->addViewPath($path);
    }

    /**
     * Display
     *
     */
    function display()
    {
        // get the Foobar model and increment the counter
        $modelFoobar =& $this->getModel('Foobar');
        $modelFoobar->hit();
        // display foobar
        parent::display();
    }

    /**
     * Save a Foobar and redirect
     *
     */
    function save()
    {
        // get the data to be saved ($_POST hash)
        $data = JRequest::get('POST');

        // get the model
        $model = $this->getModel('Foobar');

        // bind the array to the model and save it.
        if ($model->save($data))
        {
            $message = JText::_('Foobar Saved');
        }
        else
        {
            $message = JText::_('Foobar Save Failed');
            $message .= ' ['.$model->getError().']';
        }

        $this->setRedirect('index.php?option=com_foobar', $message);
    }

    /**
     * Gets a reference to a subclass of the controller.
     *
     * @static
     * @param string entity name
     * @param string controller prefix
     * @return MyextensionController extension controller
     */
    function &getInstance($entity, $prefix='MyExtensionController')
    {
        // use a static array to store controller instances
        static $instances;
	
        if (!$instances)
        {
            $instances = array();
        }

        // determine subclass name
        $class = $prefix.ucfirst($entity);

        // check if we already instantiated this controller
        if (!isset($instances[$class]))
        {
            // check if we need to find the controller class
            if (!class_exists( $class ))
            {
                jimport('joomla.filesystem.file');
                $path = JPATH_COMPONENT.DS.'controllers',strtolower($entity).'.php';

                // search for the file in the controllers path
                if (JFile::exists($path)
                {
                    // include the class file
                    require_once $path;

                    if (!class_exists( $class ))
                    {
                        // class file dose not include the class
                        return JError::raiseWarning('SOME_ERROR', JText::_('Invalid controller'));
                    }
                }
                else
                {
                    // class file not found
                    return JError::raiseWarning('SOME_ERROR', JText::_('Unknown controller'));
                }
            }

            // create controller instance
            $instances[$class] = new $class();
        }

        // return a reference to the controller
        return $instances[$class];
    }

}

?>