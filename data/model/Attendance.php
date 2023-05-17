<?php 
    class Attendance {
        private $connection;

        public function __construct($connection)
        {
            $this->connection = $connection;
        }

        public function getAllPresentEmployees()
        {
            $sql = "SELECT *, CONCAT(FIRST_NAME,' ',LAST_NAME) AS FULL_NAME, DATE_FORMAT(TIME_IN, '%h:%i %p') AS TIME_IN, DATE_FORMAT(TIME_OUT, '%h:%i %p') AS TIME_OUT
                    FROM attendance
                    LEFT JOIN employee ON attendance.EMPLOYEE_ID = employee.EMPLOYEE_ID
                    WHERE DATE = CURDATE()";
            $result = $this->connection->query($sql);
            $data = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }
    }
?>