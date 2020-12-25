<?php

// import JArrayHelper
jimport('joomla.utilities.array');

// import JFile
jimport('joomla.filesystem.file');

// read a CSV file
if (false === ($data = JFile::read($CSV_FilePath)))
{
    // handle failed to read CSV file
}

// convert CSV data into an array of lines
$data = explode("\n", $data);

// iterate over each line
for($i = 0, $c = count($data); $i < $c; $i ++)
{
    // split the values
    $temp = explode(',', $data[$i]);

    // cast all the values to integers (always rounds down)
    JArrayHelper::toInteger($temp);

    // set the named values
    $temp['id'] = $temp[0];
    $temp ['value'] = $temp[1];

    // remove keys 0 and 1
    unset($temp[0], $temp[1]);

    // convert the array to an object
    $data[$i] = JArrayHelper::toObject($temp);
}

// sort objects
JArrayHelper::sortObjects($data, 'id', -1);

// get total
$total = array_sum(JArrayHelper::getColumn($data, 'value'));

?>