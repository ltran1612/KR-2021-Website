<?php
    require_once '../vendor/autoload.php';

    class DatabaseAdapter {
        private $serverName;
        private $userName;
        private $passWord;
        private $dbName;

        function __construct($account) {
            if ($account == null)
                die("No account");

            $this->serverName = $account->serverName;
            $this->userName = $account->userName;
            $this->passWord = $account->passWord;
            $this->dbName = $account->dbName;
        } // end __construct

        private function createConn() {            
            // Create connection
            $conn = new mysqli($this->serverName, $this->userName, $this->passWord, $this->dbName);
    
            return $conn;
        } // end createConn

        public function saveToDatabase($data) { 
            // Create connection
            $conn = $this->createConn();
            
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            } // end if
            
            // set parameters and execute
            $name = $data['name'];
            $affiliation = $data['affiliation'];
    
            //address
            $address_line = $data['address_line'];
            $city_address = $data['city_address'];
            $state_address = $data['state_address'];
            $country_address = $data['country_address'];
            $zip_address = $data['zip_address'];
    
            $address = $address_line . ", " 
                        .($city_address == "" || $city_address == null ? "" : "City: " . $city_address . ', ') 
                        .($state_address == "" || $state_address == null ? "" : "State: " . $state_address . ', ')
                        .$country_address
                        .($zip_address == "" || $zip_address == null ? "" : ", " . "Zip code: ". $zip_address) ;
    
            // other
            $email = $data['email_address'];
            // remove all spaces in phone number
            $phone = str_replace(" ", "", $data['phone_number']);
    
            // change them to uppercase
            $isStudent = strtoupper($data['is_student']);
            $registerPaper = strtoupper($data['register_paper']);
            // paper number
            if ($registerPaper != null && $registerPaper == "YES") {
                $paperNumber = $data['paper_number'];
                $numberPaper = $data['number_paper'];
            } else {
                $paperNumber = null;
                $numberPaper = null;
            } // end else
            
            // workshops
            $workshops = [];
            for ($i = 0; $i < 6; ++$i) {
                $workshops[$i] = $data["workshop".($i+1)];
            } // end for i
            $workshops = json_encode($workshops);
    
            // tutorials
            $tutorials = [];
            for ($i = 0; $i < 8; ++$i) {
                $tutorials[$i] = $data["tutorial".($i+1)];
            } // end for i
            $tutorials = json_encode($tutorials);
    
            // others
            $goNMR = strtoupper($data['participate_nmr']);
            $gender = strtoupper($data['gender']);
            // consent
            $videoConsent = strtoupper($data['video_consent']);
            $videosNotToPublish = $data['videos_not_to_publish'];
    
            // prepare and bind
            $stmt = $conn->prepare("INSERT INTO Participants (Name, Affiliation, Address, Email, Phone, IsStudent, RegisterPaper, NumberPaper, PaperNumber, Workshops, Tutorials, GoNMR, Gender, VideoConsent, VideosNotToPub) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssisssssss", $name, $affiliation, $address, $email, $phone, $isStudent, $registerPaper, $numberPaper, $paperNumber, $workshops, $tutorials, $goNMR, $gender, $videoConsent, $videosNotToPublish);
    
            // execute
            try {
                $stmt->execute();
            } catch (mysqli_sql_exception $exception) {
                $state = $conn->sqlstate;
                if ($state == "23000") {
                    die("Someone has already registered with this email address: " . $email . ". Please register with a different email address");
                } else {
                    // for debug
                    die("$exception");
    
                    // for production
                    die("Something is wrong, please try again");
                } // end else
            } finally {
                // closing connection
                $stmt->close();
                $conn->close();
            } // end finally
        } // end saveToDatabase


        public function isUniqueEmail($email) {
            $conn = $this->createConn();
            $stmt = $conn->prepare("SELECT * FROM Participants WHERE email=?");
            $stmt->bind_param("s", $email);

            try {
                $stmt->execute();
                $result = $stmt->get_result();
                return $result->num_rows == 0;
            } catch(mysqli_sql_exception $ex) {
                die("Something is wrong when checking the email with the database");
            } finally {
                $stmt->close();
                $conn->close();
            } // end finally
        } // end uniqueEmail
    } // end DatabaseAdapter
?>