import sqlite3

conn = sqlite3.connect('database.db')
c = conn.cursor()
c.execute('''CREATE TABLE employee (
            `employee_id` INTEGER PRIMARY KEY AUTOINCREMENT,
            `last_name` VARCHAR(50) UNIQUE,
            `first_name` VARCHAR(50) UNIQUE,
            `middle_name` VARCHAR(50) UNIQUE,
            `birth_date` VARCHAR(10) UNIQUE,
            `gender` VARCHAR(10),
            `contact_no` VARCHAR(20) UNIQUE,
            `email` VARCHAR(100) UNIQUE,
            `province` VARCHAR(100),
            `municipality` VARCHAR(100),
            `baranggay` VARCHAR(100),
            `street` VARCHAR(100)
            
            );''')

c.execute('''CREATE TABLE attendance (
            'id' PRIMARY KEY,
            `employee_id`,
            `employee_name` VARCHAR(100),
            `date` VARCHAR(20),
            `timein` VARCHAR(10),
            'timeout' VARCHAR(10),
            'total_work_hours' VARCHAR(10),
            FOREIGN KEY (employee_id) REFERENCES employee(employee_id)
            );''')

c.execute('''CREATE TABLE salary (
            'id' PRIMARY KEY,
            `employee_id`,
            `employee_name` VARCHAR(100),
            `total` VARCHAR(20),
            FOREIGN KEY (employee_id) REFERENCES employee(employee_id)
            );''')


conn.commit()
conn.close()
