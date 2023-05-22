<?php 
    class Report {
        private $conn;

        public function __construct($connection)
        {
            $this->conn = $connection;
        }

        public function getAllEmployeesSalaryReport($from, $to)
        {
            $sql = "SELECT CONCAT(FIRST_NAME,' ',LAST_NAME) AS FULL_NAME, 
                    SUM(TOTAL_HOURS_WORKED) AS TOTAL_HOURS_WORKED, 
                    SALARY_RATE, 
                    SALARY_RATE * SUM(TOTAL_HOURS_WORKED) AS TOTAL_SALARY 
                    FROM employee
                    LEFT JOIN attendance ON employee.EMPLOYEE_ID = attendance.EMPLOYEE_ID
                    WHERE DATE BETWEEN '$from' AND '$to'
                    GROUP BY employee.EMPLOYEE_ID;";
            $result = $this->conn->query($sql);

            return $result->fetch_all(MYSQLI_ASSOC);
        }

    }
?>