<?php

namespace System\Xml;

class XMLSerializer {

public static function generateValidXmlFromObj(stdClass $obj, $node_block='nodes', $node_name='node') : string {
    $arr = get_object_vars($obj);
    return self::generateValidXmlFromArray($arr, $node_block, $node_name);
}

public static function generateValidXmlFromArray($array, $node_block='nodes', $node_name='node') : string {
    $xml = '<?xml version="1.0" encoding="UTF-8" ?>';

    $xml .= '<' . $node_block . '>';
    $xml .= self::generateXmlFromArray($array, $node_name);
    $xml .= '</' . $node_block . '>';

    return $xml;
}

private static function generateXmlFromArray($array, $node_name) : string {
    $xml = '';

    if (is_array($array) || is_object($array)) {
        foreach ($array as $key=>$value) {
            if (is_numeric($key)) {
                $key = $node_name;
            }

            $xml .= '<' . $key . '>' . self::generateXmlFromArray($value, $node_name) . '</' . $key . '>';
        }
    } else {
        $xml = htmlspecialchars($array, ENT_QUOTES);
    }

    return $xml;
}

}