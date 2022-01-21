<?php

namespace App\Parser;

class Parser
{
    public function parse($string, $template = '')
    {
        $i = 0;

        $styleArray = [];

        while (isset($string[$i])) {

            $key = $this->getKey($i, $string);

            ++$i;

            $css = $this->getCss($i, $string);

            $splittedCSS = $this->splitCSS($css);


            $styleArray[trim($key)] = $splittedCSS;

            $key = $css = '';

            $i++;
        }

        $templateS = $this->parseTemplate($template, $styleArray);

        return $templateS;
    }

    public function parseTemplate($template, $formattedCssArr)
    {
        $foramttedTemplate = $template;
        foreach ($formattedCssArr as $el => $cssArr) {
            if(trim($el) == '*' ||trim($el) == 'body') continue;
            $onlyClassOrIdname = trim($el);
            $appendText = '';
            if (trim($el)[0] == '.') {
                $appendText = 'class';
                $onlyClassOrIdname = trim(str_replace('.', '', $el));
            }
            if (trim($el)[0] == '#') {
                $appendText = 'id';
                $onlyClassOrIdname = trim(str_replace('#', '', $el));
            }
            $style = '';
            foreach ($cssArr as $styles) {
                foreach($styles as $property => $value){
                    $style.= $property.':'.$value.';';
                }
            }
            if($onlyClassOrIdname != '*' && $onlyClassOrIdname != 'body'){
                $search = $appendText.'="'.$onlyClassOrIdname.'"';
                $foramttedTemplate = str_replace($search, $search . ' style="' . $style . '"', $foramttedTemplate);
            }
        }
        return $foramttedTemplate;
    }


    function splitCSS($css)
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


    function getKey(&$position, &$string)
    {
        $key = '';
        while ($string[$position] != '{') {
            $key .= $string[$position];
            ++$position;
        }
        return $key;
    }

    function getCSS(&$position, $string)
    {
        $css = '';
        while ($string[$position] != '}') {
            $css .= $string[$position];
            ++$position;
        }
        return $css;
    }
}
