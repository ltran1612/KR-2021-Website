<?php
    require_once '../vendor/autoload.php';
    require_once './misc_funcs.php';
    require_once './PostDataWrapper.php';

    /**
     * A class for operations with the database
     */
    class DatabaseAdapter {
        private $serverName;
        private $userName;
        private $passWord;
        private $dbName;

        /**
         * Construct an adapter object
         * 
         * Account object fields:
         * + serverName
         * + userName
         * + passWord
         * + dbName
         */
        function __construct($account) {
            //
            if ($account == null)
                dieBig("Error: The account object to connect to the database is not found");
                
            $this->serverName = $account->serverName;
            $this->userName = $account->userName;
            $this->passWord = $account->passWord;
            $this->dbName = $account->dbName;
        } // end __construct

        /**
         * Create a connection to the database with the account given during the construction
         * 
         * @return mysqli A connection to the database with the account given during construction
         */
        private function createConn() {            
            // Create connection
            try {
                $conn = new mysqli($this->serverName, $this->userName, $this->passWord, $this->dbName);
                return $conn;
            } catch (mysqli_sql_exception $e) {
                dieBig("createConn() Cannot connect to the database");
            } // end if
        } // end createConn

        /**
         * Save the data to the database
         * 
         * $data object fields:
         * + first_name
         * + last_name
         * + affiliation
         * + address_line
         * + city_address
         * + state_address
         * + zip_address
         * + country_address
         * + email_address
         * + phone_number
         * + is_student
         * + register_paper
         * + number_paper
         * + paper_number
         * + workshop1 to workshop6
         * + tutorial1 to tutorial8
         * + participate_nmr
         * + gender
         * + video_consent
         * + videos_not_to_publish
         * 
         * @return bool if the database is saved successfully
         */
        public function saveToDatabase(PostDataWrapper $data) { 
            try {
                // Create connection
                $conn = $this->createConn();
                
                // Check connection
                if ($conn->connect_error) {
                    dieBig("Connection failed: " . $conn->connect_error);
                } // end if
                
                // name
                $firstName = $data->getFirstName();
                $middleName = $data->getMiddleName();
                $lastName = $data->getLastName();

                // affiliation
                $affiliation = $data->getAffiliation();
        
                //address
                $address_line = $data->getAddressLine();
                $city_address = $data->getCity();
                $state_address = $data->getState();
                $country_address = $data->getCountry();
                $zip_address = $data->getZip();
                
                $address = [
                    "address_line" => $address_line,
                    "city_address" => $city_address,
                    "state_address" => $state_address,
                    "country_address" => $country_address,
                    "zip_address" => $zip_address
                ];
                $address = json_encode($address);

        
                // other
                $email = $data->getEmail();
                // phone number
                $phone = $data->getPhone();
        
                // change them to uppercase
                $isStudent = strtoupper($data->getIsStudent());
                $registerPaper = strtoupper($data->getWillRegisterPaper());
                // paper number
                if ($registerPaper != null && $registerPaper == "YES") {
                    $paperNumber = $data->getPaperNumber();
                    $numberPaper = $data->getNumberPaper();
                } else {
                    $paperNumber = null;
                    $numberPaper = null;
                } // end else
                
                // workshops
                $workshops = [];
                for ($i = 0; $i < 6; ++$i) {
                    $workshops[$i] = $data->getWorkshop($i+1);
                } // end for i
                $workshops = json_encode($workshops);
        
                // tutorials
                $tutorials = [];
                for ($i = 0; $i < 8; ++$i) {
                    $tutorials[$i] = $data->getTutorial($i+1);
                } // end for i
                $tutorials = json_encode($tutorials);
        
                // others
                $goNMR = strtoupper($data->getWillGoNMR());
                $gender = strtoupper($data->getGender());
                // consent
                $privateVideoConsent = strtoupper($data->getPrivateVideoConsent());
                $publicVideoConsent = strtoupper($data->getPublicVideoConsent());
                $videosNotToPublish = $data->getVideosNotToPublishPublicly();
        
                // prepare and bind
                $stmt = $conn->prepare("INSERT INTO Participants (FirstName, MiddleName, LastName, Affiliation, Address, Email, Phone, IsStudent, RegisterPaper, NumberPaper, PaperNumber, Workshops, Tutorials, GoNMR, Gender, PrivateVideoConsent, PublicVideoConsent, VideosNotToPublishPublicly) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                if ($stmt == false) {
                    dieBig("prepare() for insertion failed: $conn->error");
                } // end if
                $temp = $stmt->bind_param("sssssssssissssssss", $firstName, $middleName, $lastName, $affiliation, $address, $email, $phone, $isStudent, $registerPaper, $numberPaper, $paperNumber, $workshops, $tutorials, $goNMR, $gender, $privateVideoConsent, $publicVideoConsent, $videosNotToPublish);
                if ($temp == false) {
                    dieBig("bind_param() for insertion failed: $stmt->error");
                } // end if

                // execute
                return $stmt->execute();
            } catch (mysqli_sql_exception $exception) {
                $state = $conn->sqlstate;
                if ($state == "23000") {
                    dieBig("Someone has already registered with this email address: " . $email . ". Please register with a different email address");
                } else {
                    // for debug
                    dieBig($exception);
                } // end else
            } finally {
                // closing connection
                if ($stmt != null)
                    $stmt->close();
                if ($conn != null)
                    $conn->close();
            } // end finally
        } // end saveToDatabase

        /**
         * Check if the email has been registered in the database
         * 
         * @return bool true if the email is unique
         */
        public function isUniqueEmail($email) {
            try {
                // create a connection
                $conn = $this->createConn();
                // Check connection
                if ($conn->connect_error) {
                    dieBig("Connection failed: " . $conn->connect_error);
                } // end if

                $stmt = $conn->prepare("SELECT * FROM Participants WHERE email=?");
                if ($stmt == false) {
                    dieBig("prepare() for select (check unique email) failed: $conn->error");
                } // end if

                $temp = $stmt->bind_param("s", $email);
                if ($temp == false) {
                    dieBig("bind_param for select (check unique email) failed: $stmt->error");
                } // end if

                $temp = $stmt->execute();
                if ($temp == false) {
                    dieBig("execute() for select (check unique email) failed: $stmt->error");
                } // end if
                
                // get the result
                $result = $stmt->get_result();
                if ($result == false) {
                    dieBig("get_result() for select (check unique email) failed: $stmt->error");
                } // end if

                // if there is no row, then the email is not registered, then it's unique.
                return $result->num_rows == 0;
            } catch(mysqli_sql_exception $ex) {
                dieBig($ex);
            } finally {
                // closing connection
                if ($stmt != null)
                    $stmt->close();
                if ($conn != null)
                    $conn->close();
            } // end finally
        } // end uniqueEmail

        /**
         * Get the result from the database
         * 
         * @return object The result object from the statement
         */
        public function getDataFromDatabase($email) {
            try {
                $conn = $this->createConn();
                // Check connection
                if ($conn->connect_error) {
                    dieBig("Connection failed: " . $conn->connect_error);
                } // end if

                $stmt = $conn->prepare("SELECT * FROM Participants WHERE email=?");
                if ($stmt == false) {
                    dieBig("prepare() for select (get data) failed: $conn->error");
                } // end if

                $temp = $stmt->bind_param("s", $email);
                if ($temp == false) {
                    dieBig("bind_param() for select (get data) failed: $stmt->error");
                } // end if

                // execute
                $result = $stmt->execute();
                if ($result == false) {
                    dieBig("execute() for select (get data) failed: $stmt->error");
                } // end if

                $result = $stmt->get_result();
                if ($result == false) {
                    dieBig("get_result() for select (get data) failed: $stmt->error");
                } // end if
                
                $result = $result->fetch_assoc();
                if ($result == false) {
                    dieBig("fetch_assoc() for select (get data) failed: $stmt->error");
                } // end if

                // return the data
                return $result;
            } catch(mysqli_sql_exception $ex) {
                dieBig($ex);
            } finally {
               // closing connection
                if ($stmt != null)
                    $stmt->close();
                if ($conn != null)
                    $conn->close();
            } // end finally
        } // end getDataFromDatabase

        /**
         * update the database
         * 
         * @return bool if the update is done successfully
         */
        public function updateDatabase($email, PostDataWrapper $data) {
            try {
            // Create connection
            $conn = $this->createConn();
            
            // Check connection
            if ($conn->connect_error) {
              dieBig("Connection failed: " . $conn->connect_error);
            } // end if
            
            // workshops
            $workshops = [];
            for ($i = 0; $i < 6; ++$i) {
                $workshops[$i] = $data->getWorkshop($i+1);
            } // end for i
            $workshops = json_encode($workshops);
    
            // tutorials
            $tutorials = [];
            for ($i = 0; $i < 8; ++$i) {
                $tutorials[$i] = $data->getTutorial($i+1);
            } // end for i
            $tutorials = json_encode($tutorials);
    
            // others
            $goNMR = strtoupper($data->getWillGoNMR());

            // consent
            $videosNotToPublish = $data->getVideosNotToPublishPublicly();
    
            // prepare and bind
            $stmt = $conn->prepare("UPDATE Participants SET Workshops=?, Tutorials=?, GoNMR=?, VideosNotToPublishPublicly=? WHERE Email=?");
            if ($stmt === false) {
                dieBig("prepare() for update failed: $conn->error");
            } // end if
            $temp = $stmt->bind_param("sssss", $workshops, $tutorials, $goNMR, $videosNotToPublish, $email);
            if ($temp === false) {
                dieBig("bind_param() for update failed: $stmt->error");
            } // end if
    
            // execute
                $result = $stmt->execute();
                return $result && $stmt->affected_rows >= 1;
            } catch (mysqli_sql_exception $exception) {
                dieBig($exception);
            } finally {
                // closing connection
                if ($stmt != null)
                    $stmt->close();
                if ($conn != null)
                    $conn->close();
            } // end finally
        } // end updateDatabase
    } // end DatabaseAdapter
?>