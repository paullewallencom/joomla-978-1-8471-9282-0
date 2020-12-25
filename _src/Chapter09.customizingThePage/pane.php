<?

$pane =& JPane::getInstance('Tabs');
echo $pane->startPane('myPane');
{
    echo $pane->startPanel('Panel 1', 'panel1');
    echo "This is Panel 1";
    echo $pane->endPanel();

    echo $pane->startPanel('Panel 2', 'panel2');
    echo "This is Panel 2";
    echo $pane->endPanel();
}
echo $pane->endPane();

?>