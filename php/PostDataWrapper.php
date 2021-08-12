<?php
require_once './misc_funcs.php';

class PostDataWrapper {
    private $data;
    function __construct($data) {
        $this->data = prepareData($data);
        // prepare the data
        
    } // end __construct

    function getFirstName() {
        return $this->data['first_name'];
    } // end getFirstName

    function getMiddleName() {
        return $this->data['middle_name'];
    } // end getFirstName

    function getLastName() {
        return $this->data['last_name'];
    } // end getFirstName

    function getFullName() {
        return $this->getFirstName() . ' ' . $this->getMiddleName() . ' ' . $this->getLastName();
    } // end getFullName

    function getAffiliation() {
        return $this->data['affiliation'];
    } // end getFirstName

    function getAddressLine() {
        return $this->data['address_line'];
    } // end getFirstName

    function getCity() {
        return $this->data['city_address'];
    } // end getFirstName

    function getState() {
        return $this->data['state_address'];
    } // end getFirstName

    function getCountry() {
        return $this->data['country_address'];
    } // end getFirstName

    function getZip() {
        return $this->data['zip_address'];
    } // end getFirstName
    
    function getEmail() {
        return $this->data['email_address'];
    } // end getFirstName

    function getPhone() {
        $country_code = str_replace(" ", "", $this->data['phone_number_country_code']);
        $rest_of_phone_number = str_replace(" ", "", $this->data['phone_number_rest']);
        return $country_code . " " . $rest_of_phone_number;
    } // end getFirstName

    function getIsStudent() {
        return $this->data['is_student'];
    } // end getFirstName

    function getWillRegisterPaper() {
        return $this->data['register_paper'];
    } // end getFirstName

    function getNumberPaper() {
        return $this->data['number_paper'];
    } // end getFirstName

    function getPaperNumber() {
        return $this->data['paper_number'];
    } // end getFirstName

    function getWorkshop($number) {
        return $this->data['workshop'.$number];
    } // end getWorkshop

    function getTutorial($number) {
        return $this->data['tutorial'.$number];
    } // end getWorkshop

    function getWillGoNMR() {
        return $this->data['participate_nmr'];
    } // end getWorkshop

    function getGender() {
        return $this->data['gender'];
    } // end getWorkshop

    function getPrivateVideoConsent() {
        return $this->data['private_video_consent'];
    } // end getWorkshop

    function getPublicVideoConsent() {
        return $this->data['public_video_consent'];
    } // end getWorkshop

    function getVideosNotToPublishPublicly() {
        return $this->data['videos_not_to_publish_publicly'];
    } // end getWorkshop
} // end PostDatWrapper
?>

