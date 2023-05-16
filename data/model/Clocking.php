<?php 
    date_default_timezone_set('Asia/Manila');
    class Clocking {
        private $connection;

        public function __construct($connection)
        {
            $this->connection = $connection;
        }

        public function isEmployeeTimedIn($employeeNumber)
        {
            $date = date("Y-m-d");
            $sql = "SELECT * FROM attendance WHERE EMPLOYEE_ID = ? AND DATE = ?;";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("ss", $employeeNumber, $date);
            $stmt->execute();
            $check = $stmt->get_result();
            $stmt->close();

            return $check;
        }

        public function timeIn($employeeNumber)
        {
            $check = $this->isEmployeeTimedIn($employeeNumber);
            $row = $check->fetch_assoc();
            if(empty($row))
            {
                $date = date("Y-m-d");
                $timeIn = date('Y-m-d H:i:s');
                $sql = "INSERT INTO attendance(EMPLOYEE_ID, DATE, TIME_IN)
                        VALUES(?,?,?);";
                $stmt = $this->connection->prepare($sql);
                $stmt->bind_param("sss", $employeeNumber, $date, $timeIn);
                
                $result = '';
                
                if ($stmt->execute() === TRUE) {
                    $result = "Successfully Saved";
                } else {
                    $result = "Error: <br>" . $this->connection->error;
                }

                $this->connection->close();

                return $result;
            }
            else
            {
                $result = "Employee is already timed in";
                return $result;
            }
            
        }

        public function timeOut($employeeNumber)
        {
            $check = $this->isEmployeeTimedIn($employeeNumber);
            $row = $check->fetch_assoc();
            
            if(!empty($row))
            {
                // Compute total hours worked
                $timeIn = strtotime($row['TIME_IN']);
                $timeOut = strtotime(date('Y-m-d H:i:s'));
                $totalHours = ($timeOut - $timeIn) / 3600;
                $totalHours = round($totalHours, 2);
                $date = date("Y-m-d");
                $timeOut = date('Y-m-d H:i:s');
                $sql = "UPDATE attendance SET TIME_OUT = ?, TOTAL_HOURS_WORKED = ? WHERE EMPLOYEE_ID = ? AND DATE = ?;";
                $stmt = $this->connection->prepare($sql);
                $stmt->bind_param("ssss", $timeOut, $totalHours, $employeeNumber, $date);
                
                $result = '';
                
                if ($stmt->execute() === TRUE) {
                    $result = "Successfully Saved";
                } else {
                    $result = "Error: <br>" . $this->connection->error;
                }

                $this->connection->close();

                return $result;
            }
            else
            {
                $result = "Employee does not timed In";
                return $result;
            }
            
        }
    }
?>