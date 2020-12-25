<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

$mainframe->registerEvent('onGetWebServices', 'plgXMLRPCFoobar');

/**
 * Gets the available XML-RPC functions
 *
 * @return array Array of arrays that define available XML-RPC functions
 */
function plgXMLRPCFoobar()
{
    global $xmlrpcI4, $xmlrpcInt, $xmlrpcBoolean, $xmlrpcDouble, $xmlrpcString, $xmlrpcDateTime, $xmlrpcBase64, $xmlrpcArray, $xmlrpcStruct, $xmlrpcValue;

    return array
     (
        'foobar.getFoobars' => array
        (
            'function' => ' plgXMLRPCFoobarServices::getFoobars',
            'docstring' => 'Gets a list of foobars.',
            'signature' => array(array($xmlrpcArray, $xmlrpcString, $xmlrpcString))
        ),
        'foobar.getFoobar' => array
        (
            'function' => ' plgXMLRPCFoobarServices::getFoobar',
            'docstring' => 'Gets information about a foobar.',
            'signature' => array(array($xmlrpcStruct, $xmlrpcString, $xmlrpcString))
        )
    );
}

?>