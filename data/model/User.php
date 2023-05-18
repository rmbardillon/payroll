<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    class User {
        private $connection;

        public function __construct($connection)
        {
            $this->connection = $connection;
        }

        public function login($request)
        {
            $username = $request['username'];
            $password = $request['password'];

            $sql = "SELECT * FROM administrator WHERE username = '$username' AND password = '$password'";
            $result = $this->connection->query($sql);
            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                $_SESSION['user'] = $row;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function addAdmin($request)
        {
            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $email = $request['email'];
            $username = $request['username'];
            $password = $request['password'];

            $sql = "INSERT INTO administrator(FIRST_NAME, LAST_NAME, EMAIL, USERNAME, PASSWORD) VALUES (?,?,?,?,?)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("sssss", $first_name, $last_name, $email, $username, $password);
            
            $result = '';
            
            if ($stmt->execute() === TRUE) {
                $result = "Successfully Save";
            } else {
                $result = "Error: <br>" . $this->connection->error;
            }

            $this->connection->close();

            return $result;
        }

        public function getAllAdmin()
        {
            $sql = "SELECT * FROM administrator";
            $result = $this->connection->query($sql);
            $data = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        public function getById($user_id)
        {
            $sql = "SELECT * FROM administrator WHERE ADMINISTRATOR_ID = '$user_id'";
            $result = $this->connection->query($sql);
            $data = [];
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
            }
            return $data;
        }

        public function deleteAdmin($user_id)
        {
            $sql = "DELETE FROM administrator WHERE ADMINISTRATOR_ID = '$user_id'";
            $stmt = $this->connection->prepare($sql);

            $result = '';
            
            if ($stmt->execute() === TRUE) {
                $result = "Successfully Deleted";
            } else {
                $result = "Error: <br>" . $this->connection->error;
            }

            $this->connection->close();

            return $result;
        }

        public function update_password($request)
        {
            $user_id = $request['user_id'];
            $password = $request['password'];

            $sql = "UPDATE administrator SET PASSWORD = '$password' WHERE ADMINISTRATOR_ID = '$user_id'";
            $stmt = $this->connection->prepare($sql);

            $result = '';
            
            if ($stmt->execute() === TRUE) {
                $result = "Successfully Updated";
            } else {
                $result = "Error: <br>" . $this->connection->error;
            }

            $this->connection->close();

            return $result;
        }

        public function update($request)
        {
            $user_id = $request['user_id'];
            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $email = $request['email'];

            $sql = "UPDATE administrator SET FIRST_NAME = '$first_name', LAST_NAME = '$last_name', EMAIL = '$email' WHERE ADMINISTRATOR_ID = '$user_id'";
            $stmt = $this->connection->prepare($sql);

            $result = '';
            
            if ($stmt->execute() === TRUE) {
                $result = "Successfully Updated";
            } else {
                $result = "Error: <br>" . $this->connection->error;
            }

            $this->connection->close();

            return $result;
        }

        function generatePassword($length = 8) {
            $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $lowercase = 'abcdefghijklmnopqrstuvwxyz';
            $numbers = '0123456789';
            $symbols = '!@#$%^&*()-_';

            $password = '';
            $password .= $uppercase[rand(0, strlen($uppercase) - 1)];
            $password .= $lowercase[rand(0, strlen($lowercase) - 1)];
            $password .= $numbers[rand(0, strlen($numbers) - 1)];
            $password .= $symbols[rand(0, strlen($symbols) - 1)];

            $remainingLength = $length - 4;

            for ($i = 0; $i < $remainingLength; $i++) {
                $characters = $uppercase . $lowercase . $numbers . $symbols;
                $password .= $characters[rand(0, strlen($characters) - 1)];
            }

            // Shuffle the password characters randomly
            $password = str_shuffle($password);

            return $password;
        }

        public function email($senderName, $subject, $senderEmail, $receiverName, $receiverEmail, $message) {
            require '../../libs/plugins/phpmailer/src/Exception.php';
            require '../../libs/plugins/phpmailer/src/PHPMailer.php';
            require '../../libs/plugins/phpmailer/src/SMTP.php';

            $mail = new PHPMailer(true);
            // $mail->SMTPDebug = 3;
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "lucaspizzastacruz@gmail.com";
            $mail->Password = "eqzjrsiqwntkwlho";
            $mail->SMTPSecure = "tls";
            $mail->Port = "587";
            $mail->From = $senderEmail;
            $mail->FromName = $senderName;
            $mail->addAddress($receiverEmail, $receiverName);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->AltBody = "This is the plain text version of email content";
            if (!$mail->send()) {
                echo "Email failed";
                exit();
            }
        }

        public function sendEmail($email)
        {
            $password = $this->generatePassword();
            $message = "Your new password is: $password";
            $this->email("Lucas Pizza", "Reset Password", "lucaspizza@gmail.com", "Administrator", $email, $message);
            $this->resetPassword($email, $password);
        }

        public function resetPassword($email, $password)
        {
            $sql = "UPDATE administrator SET PASSWORD = '$password' WHERE EMAIL = '$email'";
            $stmt = $this->connection->prepare($sql);

            $result = '';
            
            if ($stmt->execute() === TRUE) {
                $result = "Successfully Updated";
            } else {
                $result = "Error: <br>" . $this->connection->error;
            }

            $this->connection->close();

            return $result;
        }
    }
?>