<?php
    /**
     * Echo input safely by ensuring all applicable characters are html entities
     */
    function safeEcho($value) {
        echo htmlentities($value);
    } // end myEcho

    /**
     * Return a string by ensuring all applicable characters are html entities
     */
    function safeString($value) {
        return htmlentities($value);
    } // end safeString

    /**
     * Return a string by ensuring all applicable characters are html entities and turn it into a string with spaces to put in GET method
     */
    function safeUrlEncodeValue($value) {
        return urlencode($value);
    } // end safeEncodeValue

    /**
     * Prepare the data
     * 
     * Steps:
     * 1) Trim the values;
     */
    function prepareData($data) {
        // trim the values
        foreach ($data as $key => $value) {
            $data[$key] = trim($value);
        } // end foreach   

        return $data;
    } // end prepareData

    /**
     * Check if the value is null or empty, if so, return a placeholder value, else return the value
     */
    function determineValue($value, $placeholder) {
        return $value == null || $value == "" ? $placeholder : $value;
    } // end determineValue

    /**
     * return the Database account json object
     */
    function getDBAccount() {
        return json_decode(file_get_contents('../odjfka/1929/vvv/db_account.json'));
    } // end getDBAccount

    /**
     * Die with h4 tag.
     */
    function dieBig($message) {
        die("<h4>".safeString($message)."</h4>");
    } // end dieBig

    /*
        Get full address from 
    */
    function getFullAddress(PostDataWrapper $data) {
        $address_line = $data->getAddressLine();
        $city = $data->getCity();
        $state = $data->getState();
        $zip = $data->getZip();
        $country = $data->getCountry();

        return $address_line . ", "
        . (determineValue($city, "") == "" ? "" : "City: $city, ")
        . (determineValue($state, "") == "" ? "" : "State: $state, ")
        . (determineValue($zip, "") == "" ? "" : "Zip: $zip, ")
        . "Country: $country"
        ;
    } // end getFullAddress
?>