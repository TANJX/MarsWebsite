<?php
include 'Parsedown.php';
class NoteExtension extends Parsedown
{

    function __construct()
    {
        $this->InlineTypes['^'][]= 'GreenBackground';
        $this->InlineTypes['%'][]= 'YellowBackground';
        $this->InlineTypes['&'][]= 'ExampleCont';
        $this->InlineTypes['&'][]= 'Example';
        $this->InlineTypes['$'][]= 'Important';
        $this->InlineTypes['!'][]= 'OrangeText';

        $this->BlockTypes['/'][] = 'QuickTable'; 

        $this->inlineMarkerList .= '^';
        $this->inlineMarkerList .= '%';
        $this->inlineMarkerList .= '&';
        $this->inlineMarkerList .= '$';
        $this->blockMarkerList .= '&';

    }

    protected function inlineOrangeText($excerpt)
    {
        if (preg_match('/^\!(.*?)\!/', $excerpt['text'], $matches))
        {
            return array(

                // How many characters to advance the Parsedown's
                // cursor after being done processing this tag.
                'extent' => strlen($matches[0]), 
                'element' => array(
                    'name' => 'span',
                    'text' => $matches[1],
                    'attributes' => array(
                        'class' => 'orange-text',
                    ),
                    'handler' => array(
                        'function' => 'lineElements',
                        'argument' => $matches[1],
                        'destination' => 'elements',
                    )
                ),

            );
        }
    }

    protected function inlineGreenBackground($excerpt)
    {
        if (preg_match('/^\^(.*?)$/', $excerpt['text'], $matches))
        {
            return array(

                // How many characters to advance the Parsedown's
                // cursor after being done processing this tag.
                'extent' => strlen($matches[0]), 
                'element' => array(
                    'name' => 'span',
                    'text' => $matches[1],
                    'attributes' => array(
                        'class' => 'green-bg',
                    ),
                    'handler' => array(
                        'function' => 'lineElements',
                        'argument' => $matches[1],
                        'destination' => 'elements',
                    )
                ),

            );
        }
    }

    protected function inlineYellowBackground($excerpt)
    {
        if (preg_match('/^\%(.*?)$/', $excerpt['text'], $matches))
        {
            return array(

                // How many characters to advance the Parsedown's
                // cursor after being done processing this tag.
                'extent' => strlen($matches[0]), 
                'element' => array(
                    'name' => 'span',
                    'text' => $matches[1],
                    'attributes' => array(
                        'class' => 'yellow-bg',
                    ),
                    'handler' => array(
                        'function' => 'lineElements',
                        'argument' => $matches[1],
                        'destination' => 'elements',
                    )
                ),

            );
        }
    }

    protected function inlineExample($excerpt)
    {
        if (preg_match('/^&(.*?)$/', $excerpt['text'], $matches))
        {
            return array(

                // How many characters to advance the Parsedown's
                // cursor after being done processing this tag.
                'extent' => strlen($matches[0]), 
                'element' => array(
                    'name' => 'span',
                    'text' => $matches[1],
                    'attributes' => array(
                        'class' => 'example',
                    ),
                    'handler' => array(
                        'function' => 'lineElements',
                        'argument' => $matches[1],
                        'destination' => 'elements',
                    )
                ),

            );
        }
    }

    protected function inlineImportant($excerpt)
    {
        if (preg_match('/^\$(.*?)$/', $excerpt['text'], $matches))
        {
            return array(

                // How many characters to advance the Parsedown's
                // cursor after being done processing this tag.
                'extent' => strlen($matches[0]), 
                'element' => array(
                    'name' => 'span',
                    'text' => $matches[1],
                    'attributes' => array(
                        'class' => 'important',
                    ),
                    'handler' => array(
                        'function' => 'lineElements',
                        'argument' => $matches[1],
                        'destination' => 'elements',
                    )
                ),

            );
        }
    }


    protected function inlineExampleCont($excerpt)
    {
        if (preg_match('/^&&(.*?)$/', $excerpt['text'], $matches))
        {
            return array(

                // How many characters to advance the Parsedown's
                // cursor after being done processing this tag.
                'extent' => strlen($matches[0]), 
                'element' => array(
                    'name' => 'span',
                    'text' => $matches[1],
                    'attributes' => array(
                        'class' => 'example-cont',
                    ),
                    'handler' => array(
                        'function' => 'lineElements',
                        'argument' => $matches[1],
                        'destination' => 'elements',
                    )
                ),

            );
        }
    }

    function lineTable($line) {
        $parts = explode("/", $line['body']);
        foreach ($parts as $index => $part) {
            if(($index === 0 || $index === count($parts)-1) && $part === '') {
                continue;
            }
            $Element = array(
                'name' => 'td',
                'handler' => array(
                    'function' => 'lineElements',
                    'argument' => $part,
                    'destination' => 'elements',
                )
            );
            $Elements []= $Element;
        }
        return array(
            'name' => 'tr',
            'elements' => $Elements,
        );

    }

    protected function blockQuickTable($line, $block)
    {
        if (preg_match('/^\//', $line['text'], $matches))
        {
            $block = array(
                'element' => array(
                    'name' => 'table',
                    'elements' => array(),
                ),
            );
            $block['element']['elements'] []= array(
                'name' => 'tbody',
                'elements' => array(),
            );
            $block['element']['elements'][0]['elements'] []= $this->lineTable($line);
            return $block;
        }
    } 

    /**
     * Appending the word `continue` to the function name will cause this function to be
     * called to process any following lines, until $block['complete'] is set to be 'true'.
     */
    protected function blockQuickTableContinue($line, $block)
    {
        if (isset($block['complete']))
        {
            return;
        }

        // A blank newline has occurred.
        if (isset($block['interrupted']))
        {
            $block['complete'] = true;
            return;
        }

        // if (preg_match('/\//', $line['text']))
        // {
        //     $block['element']['elements'][0]['elements'] []= $this->lineTable($line);
        //     $block['complete'] = true;
        //     return $block;
        // }
        
        $block['element']['elements'][0]['elements'] []= $this->lineTable($line);
        return $block;
    }

    /**
     * Appending the word `complete` to the function name will cause this function to be
     * called when the block is marked as *complete* (see the previous method).
     */
    protected function blockQuickTableComplete($block)
    {
        return $block;
    }

}