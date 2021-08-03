<?php
    function safeEcho($value) {
        echo htmlentities($value);
    } // end myEcho

    function safeString($value) {
        return htmlentities($value);
    } // end safeString

    function safeUrlEncodeValue($value) {
        return urlencode(safeString($value));
    } // end safeEncodeValue

    function prepareData($data) {
        // trim the values
        foreach ($data as $key => $value) {
            $data[$key] = trim($value);
        } // end foreach   
    } // end prepareData
?>