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
                    TOTAL_HOURS_WORKED,
                    DATE_FORMAT(sh.START_DATE, '%M %d %Y') AS START_DATE,
                    DATE_FORMAT(sh.END_DATE, '%M %d %Y') AS END_DATE,
                    sh.SALARY_RATE,
                    sh.SALARY_RATE * TOTAL_HOURS_WORKED AS TOTAL_SALARY 
                    FROM employee
                    LEFT JOIN attendance ON employee.EMPLOYEE_ID = attendance.EMPLOYEE_ID
                    LEFT JOIN salary_history sh ON employee.EMPLOYEE_ID = sh.EMPLOYEE_ID
                    WHERE attendance.DATE BETWEEN '$from' AND '$to' AND sh.START_DATE BETWEEN '$from' AND '$to'
                    GROUP BY employee.EMPLOYEE_ID, attendance.DATE;";
            $result = $this->conn->query($sql);

            return $result->fetch_all(MYSQLI_ASSOC);
        }

    }
?>