<?php

namespace App\Parser;

class Parser
{
    public function parse($css)
    {
        $i = 0;

        $data = [];

        while (isset($string[$i])) {

            $key = $this->getKey($i, $css);

            ++$i;

            $styles = $this->getCss($i, $css);


            $splittedCSS = $this->splitCSS($styles);


            $data[trim($key)] = $splittedCSS;

            $key = $styles = '';

            $i++;
        }

        return $data;
    }

    public function splitCSS($css)
    {
        $style = [];
        foreach (explode(';', trim($css)) as $singleCssStyle) {
            if ($singleCssStyle) {
                $styleKeyValuePair = explode(':', $singleCssStyle);
                $style[] = [trim($styleKeyValuePair[0]) => trim($styleKeyValuePair[1])];
            }
        }
        return $style;
    }

    public function getKey($position, $string)
    {
        $key = '';
        while ($string[$position] != '{') {
            $key .= $string[$position];
            ++$position;
        }
        return $key;
    }

    public function getCSS($position, $string)
    {
        $css = '';
        while ($string[$position] != '}') {
            $css .= $string[$position];
            ++$position;
        }
        return $css;
    }
}
