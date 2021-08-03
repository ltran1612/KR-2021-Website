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

    function determineValue($value, $placeholder) {
        return $value == null || $value == "" ? $placeholder : $value;
    } // end determineValue

    function getDBAccount() {
        return json_decode(file_get_contents('../odjfka/1929/vvv/db_account.json'));
    } // end getDBAccount
?>