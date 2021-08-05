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
        return $this->data['phone_number'];
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

    function getVideoConsentDuringConference() {
        return $this->data['video_consent'];
    } // end getWorkshop

    function getVideosNotToPublish() {
        return $this->data['videos_not_to_publish'];
    } // end getWorkshop
} // end PostDatWrapper
?>

