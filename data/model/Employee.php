<?php 
    class Employee {
        private $connection;

        public function __construct($connection)
        {
            $this->connection = $connection;
        }

        public function saveEmployee($request)
        {
            $firstName = $request['firstName'];
            $middleName = $request['middleName'];
            $lastName = $request['lastName'];
            $birthday = $request['birthday'];
            $gender = $request['gender'];
            $salary = $request['salary'];
            $contactNumber = $request['contactNumber'];
            $emailAddress = $request['emailAddress'];
            $street = $request['street'];
            $barangay = $request['barangay'];
            $municipality = $request['municipality'];
            $province = $request['province'];

            $sql = "INSERT INTO employee(FIRST_NAME, MIDDLE_NAME, LAST_NAME, BIRTHDAY, GENDER, SALARY_RATE, CONTACT_NUMBER, EMAIL, STREET, BARANGAY, MUNICIPALITY, PROVINCE)
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?);";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("ssssssssssss", $firstName, $middleName, $lastName, $birthday, $gender, $salary, $contactNumber, $emailAddress, $street, $barangay, $municipality, $province);
            
            $result = '';
            
            if ($stmt->execute() === TRUE) {
                $result = "Successfully Save";
            } else {
                $result = "Error: <br>" . $this->connection->error;
            }

            $this->connection->close();

            return $result;
        }

        public function getEmployee()
        {
            $sql = "SELECT *, CONCAT(FIRST_NAME,' ',LAST_NAME) AS FULL_NAME 
                    FROM employee";
            $result = $this->connection->query($sql);
            $data = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        public function getEmployeeById($employeeId)
        {
            $sql = "SELECT *, CONCAT(FIRST_NAME,' ',LAST_NAME) AS FULL_NAME
                    FROM employee
                    WHERE employee.EMPLOYEE_ID = '$employeeId'";
            $result = $this->connection->query($sql);
            $data = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        public function updateEmployee($request)
        {
            $employeeId = $request['employeeId'];
            $firstName = $request['firstName'];
            $middleName = $request['middleName'];
            $lastName = $request['lastName'];
            $birthday = $request['birthday'];
            $gender = $request['gender'];
            $salary = $request['salary'];
            $contactNumber = $request['contactNumber'];
            $emailAddress = $request['emailAddress'];
            $street = $request['street'];
            $barangay = $request['barangay'];
            $municipality = $request['municipality'];
            $province = $request['province'];

            $sql = "UPDATE employee
                    SET FIRST_NAME = '$firstName', MIDDLE_NAME = '$middleName', LAST_NAME = '$lastName', GENDER = '$gender', SALARY_RATE = '$salary', CONTACT_NUMBER = '$contactNumber', EMAIL = '$emailAddress', BIRTHDAY = '$birthday', STREET = '$street', BARANGAY = '$barangay', MUNICIPALITY = '$municipality', PROVINCE = '$province'
                    WHERE EMPLOYEE_ID = '$employeeId'";
            $result = $this->connection->query($sql);
            $data = [];
            if ($result === TRUE) {
                $data = "Successfully Update";
            } else {
                $data = "Error: <br>" . $this->connection->error;
            }
            
            return $data;
        }

        public function deleteEmployee($employeeId)
        {
            $sql = "DELETE FROM employee
                    WHERE EMPLOYEE_ID = '$employeeId'";
            $result = $this->connection->query($sql);
            $data = [];
            if ($result === TRUE) {
                $data = "Successfully Delete";
            } else {
                $data = "Error: <br>" . $this->connection->error;
            }
            return $data;
        }
    }
?>