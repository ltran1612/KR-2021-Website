<?php
    require_once './misc_funcs.php';
    class DatabaseDataWrapper {
        private $data;
        function __construct($data) {
            if ($data === null) {
                dieBig('$data is null in DatabaseDataWrapper');
            } // end if

            $this->data = $data;
        } // end $data

        function getFirstName() {
            return $this->data['FirstName'];
        } // end getFirstName
    
        function getMiddleName() {
            return $this->data['MiddleName'];
        } // end getFirstName
    
        function getLastName() {
            return $this->data['LastName'];
        } // end getFirstName
    
        function getFullName() {
            return $this->getFirstName() . ' ' . $this->getMiddleName() . ' ' . $this->getLastName();
        } // end getFullName
    
        function getAffiliation() {
            return $this->data['Affiliation'];
        } // end getFirstName
    
        function getAddressLine() {
            return $this->data['Address'];
        } // end getFirstName
        
        function getEmail() {
            return $this->data['Email'];
        } // end getFirstName
    
        function getPhone() {
            return $this->data['Phone'];
        } // end getFirstName
    
        function getIsStudent() {
            return $this->data['IsStudent'];
        } // end getFirstName
    
        function getWillRegisterPaper() {
            return $this->data['RegisterPaper'];
        } // end getFirstName
    
        function getNumberPaper() {
            return $this->data['NumberPaper'];
        } // end getFirstName
    
        function getPaperNumber() {
            return $this->data['PaperNumber'];
        } // end getFirstName
    
        function getWorkshops() {
            return $this->data['Workshops'];
        } // end getWorkshop
    
        function getTutorials() {
            return $this->data['Tutorials'];
        } // end getWorkshop
    
        function getWillGoNMR() {
            return $this->data['GoNMR'];
        } // end getWorkshop
    
        function getGender() {
            return $this->data['Gender'];
        } // end getWorkshop
    
        function getPrivateVideoConsent() {
            return $this->data['PrivateVideoConsent'];
        } // end getWorkshop
    
        function getPublicVideoConsent() {
            return $this->data['PublicVideoConsent'];
        } // end getWorkshop
    
        function getVideosNotToPublishPublicly() {
            return $this->data['VideosNotToPublishPublicly'];
        } // end getWorkshop
    } // end class DatabaseDataWrapper
?>