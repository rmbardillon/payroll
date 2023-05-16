#pip install tkcalendar
import dataclasses
from datetime import datetime
import re
from shelve import DbfilenameShelf
import sqlite3
from tkinter import *
from tkinter import ttk
from tkinter import messagebox
from tkinter.ttk import Combobox, Treeview
from tkcalendar import Calendar, DateEntry
from login_window import login_window

# Open login window
login_window.mainloop()


class system:
    def __init__(self, master):
        self.master = master
        self.master.title("Luca's Pizzeria Payroll System")
        self.master.geometry("1100x700+125+0")
        nt_tree = ttk.Treeview(root)
        self.master.configure(bg="#87AFC7")
        
        title = Label(self.master, text="L  U  C  A  '  S    P  I  Z  Z  E  R  I  A ", bg="#4682B4", fg="White",font=("Arial Rounded MT Bold", 24, "bold"))
        title.place(x=0, y=0, width=1100, height=50)
        title1 = Label(self.master, text="S t a .  C r u z ,  L a g u n a  P h i l i p p i n e s ", bg="#4682B4", fg="White",font=("Arial Rounded MT Bold", 10, "bold"))
        title1.place(x=0, y=40, width=1100, height=15)
        
        self.notebook = ttk.Notebook(master)
        self.notebook.place(x=0, y=55, width=1100, height=600)
        
        
        self.employee_frame = Frame(self.notebook)
        self.employee_frame.configure(bg="#B6B6B4")
        
        self.attendance_frame = Frame (self.notebook)
        self.attendance_frame.configure(bg="#98AFC7")
        
        self.salary_frame = Frame(self.notebook)
        self.salary_frame.configure(bg="#6D7B8D")
        
        self.notebook.add(self.employee_frame, text="EMPLOYEE INFORMATION")
        self.notebook.add(self.attendance_frame, text="ATTENDANCE MANAGEMENT")
        self.notebook.add(self.salary_frame, text="SALARY GENERATOR")
        
        logout_btn = Button(root, text="LOG OUT", cursor='hand2', font=("Arial", 12, 'bold'),command=END)
        logout_btn.place(x=920, y=2, width=150, height=50)
        
        #=====EMPLOYEE TAB=====
            #variablesforemployeeentries
        self.var_idno=StringVar()
        self.var_lname=StringVar()
        self.var_fname=StringVar()
        self.var_mname=StringVar()
        self.var_bdate=StringVar()
        self.var_gender=StringVar()
        self.var_cn=StringVar()
        self.var_email=StringVar()
        self.var_province=StringVar()
        self.var_municipality=StringVar()
        self.var_baranggay=StringVar()
        self.var_street=StringVar()
        self.var_employee_search1=StringVar()

            
            #widgets
        self.frame_one = Frame(self.employee_frame, bd=4, relief=RAISED, bg="#FFF5EE")
        self.frame_one.place(x=5,y=5, width=1085, height=50) 
        
        self.frame_two = Frame(self.employee_frame, bd=2, relief=RAISED, bg="#95B9C7")
        self.frame_two.place(x=5,y=55, width=1085, height=100)     
        
        self.frame_three = Frame(self.employee_frame, bd=2, relief=RAISED, bg="#95B9C7")
        self.frame_three.place(x=5,y=155, width=1085, height=60)  
        
        self.frame_four = Frame(self.employee_frame, bd=2, relief=RAISED, bg="#FEF0E3")
        self.frame_four.place(x=5,y=215, width=1085, height=50)     
        
        self.frame_five = Frame(self.employee_frame, bd=2, relief=RAISED, bg="#FFF5EE")
        self.frame_five.place(x=5,y=270, width=1085, height=300) 

            #labels
        self.label_empid = Label(self.employee_frame,text="Employee ID: ",font=("Arial",12,"bold"),bg="#FFF5EE",fg="Black")
        self.label_empid.place(x=20, y=20)
        self.label_lname = Label(self.employee_frame,text="Last Name: ",font=("Arial",12,"bold"),bg="#95B9C7",fg="Black")
        self.label_lname.place(x=20, y=65)
        self.label_fname = Label(self.employee_frame,text="First Name: ",font=("Arial",12,"bold"),bg="#95B9C7",fg="Black")
        self.label_fname.place(x=370, y=65)
        self.label_mname = Label(self.employee_frame,text="Middle Name: ",font=("Arial",12,"bold"),bg="#95B9C7",fg="Black")
        self.label_mname.place(x=730, y=65)
        self.label_bdate = Label(self.employee_frame,text="Birthdate: ",font=("Arial",12,"bold"),bg="#95B9C7",fg="Black")
        self.label_bdate.place(x=20, y=115)
        self.label_gender = Label(self.employee_frame,text="Gender: ",font=("Arial",12,"bold"),bg="#95B9C7",fg="Black")
        self.label_gender.place(x=240, y=115)
        self.label_cn = Label(self.employee_frame,text="Contact No: ",font=("Arial",12,"bold"),bg="#95B9C7",fg="Black")
        self.label_cn.place(x=420, y=115)
        self.label_email = Label(self.employee_frame,text="Email: ",font=("Arial",12,"bold"),bg="#95B9C7",fg="Black")
        self.label_email.place(x=770, y=115)
        self.label_province = Label(self.employee_frame,text="Province: ",font=("Arial",12,"bold"),bg="#95B9C7",fg="Black")
        self.label_province.place(x=20, y=165)
        self.label_municipality = Label(self.employee_frame,text="Municipality: ",font=("Arial",12,"bold"),bg="#95B9C7",fg="Black")
        self.label_municipality.place(x=290, y=165)
        self.label_baranggay = Label(self.employee_frame,text="Baranggay: ",font=("Arial",12,"bold"),bg="#95B9C7",fg="Black")
        self.label_baranggay.place(x=580, y=165)
        self.label_street = Label(self.employee_frame,text="Street: ",font=("Arial",12,"bold"),bg="#95B9C7",fg="Black")
        self.label_street.place(x=860, y=165)
        
            #entries
        self.entry_empid = Entry(self.employee_frame, bd=2, relief=SUNKEN, bg='White', font=("Arial", 12,"bold"),textvariable=self.var_idno, fg="Black")
        self.entry_empid.place(x=140, y=18, width= 900, height=25)
        self.entry_empid.configure(state="readonly")
        
        self.entry_lname = Entry(self.employee_frame, bd=2, relief=SUNKEN, bg='White', font=("Arial", 12,"bold"),textvariable=self.var_lname, fg="Black")
        self.entry_lname.place(x=120, y=65, width=230, height=25)
        
        self.entry_fname = Entry(self.employee_frame, bd=2, relief=SUNKEN, bg='White', font=("Arial", 12,"bold"),textvariable=self.var_fname, fg="Black")
        self.entry_fname.place(x=470, y=65, width=230, height=25)
        
        self.entry_mname = Entry(self.employee_frame, bd=2, relief=SUNKEN, bg='White', font=("Arial", 12,"bold"),textvariable=self.var_mname, fg="Black")
        self.entry_mname.place(x=840, y=65, width=230, height=25)
        
        self.dataentry_bdate = DateEntry(self.employee_frame, bd=2, relief=SUNKEN, bg='White',font=("Arial", 12,"bold"),textvariable=self.var_bdate, fg="Black")
        self.dataentry_bdate.place(x=110, y=115, width=100, height=25)
        self.dataentry_bdate.configure(state="readonly")
        
        values = ["Male", "Female"]
        self.combobox_gender = Combobox(self.employee_frame, values=values,textvariable=self.var_gender, font=("Arial", 12,"bold"))
        self.combobox_gender.place(x=310, y=115, width=80, height=25)
        self.combobox_gender.configure(state="readonly")
        
        self.entry_cn = Entry(self.employee_frame, bd=2, relief=SUNKEN,bg='White', font=("Arial", 12,"bold"), textvariable=self.var_cn,fg="Black")
        self.entry_cn.place(x=525, y=115, width= 200, height=25)
        
        self.entry_email = Entry(self.employee_frame, bd=2, relief=SUNKEN,bg='White', font=("Arial", 12,"bold"),textvariable=self.var_email, fg="Black")
        self.entry_email.place(x=830, y=115, width= 230, height=25)
        
        self.province_entry = Entry(self.employee_frame, bd=2, relief=SUNKEN,bg='White', font=("Arial", 12,"bold"),textvariable=self.var_province, fg="Black")
        self.province_entry.place(x=110, y=165, width= 160, height=25)
        
        self.municipality_entry = Entry(self.employee_frame, bd=2, relief=SUNKEN,bg='White', font=("Arial", 12,"bold"),textvariable=self.var_municipality, fg="Black")
        self.municipality_entry.place(x=400, y=165, width= 160, height=25)
        
        self.baranggay_entry = Entry(self.employee_frame, bd=2, relief=SUNKEN,bg='White', font=("Arial", 12,"bold"),textvariable=self.var_baranggay, fg="Black")
        self.baranggay_entry.place(x=680, y=165, width= 160, height=25)
        
        self.street_entry = Entry(self.employee_frame, bd=2, relief=SUNKEN,bg='White', font=("Arial", 12,"bold"),textvariable=self.var_street, fg="Black")
        self.street_entry.place(x=920, y=165, width= 150, height=25)
        
        self.search_bar1 = Entry(self.employee_frame, bd=2, relief=SUNKEN,bg='White', font=("Arial", 12,"bold"),textvariable=self.var_employee_search1, fg="Black")
        self.search_bar1.place(x=150, y=275, width= 920, height=30)
        
            #buttons
        self.save1_button = Button(self.employee_frame, text="SAVE", font=("Arial", 12, 'bold'), command=self.save_insert_employee_data,bg='GREEN',fg='White')
        self.save1_button.config(borderwidth=6, highlightthickness=3)
        self.save1_button.place(x=480, y=220, width=120, height=40)
        
        self.reset1_button = Button(self.employee_frame, text="RESET", font=("Arial", 12, 'bold'), command=self.reset_employee)
        self.reset1_button .config(borderwidth=6, highlightthickness=3)
        self.reset1_button.place(x=880, y=220, width=120, height=40)
        
        self.delete1_button = Button(self.employee_frame, text="DELETE", font=("Arial", 12, 'bold'), command=self.delete_employee_data,bg='RED',fg='White')
        self.delete1_button.config(borderwidth=6, highlightthickness=3)
        self.delete1_button.place(x=760, y=220, width=120, height=40)
        
        self.refresh1_button = Button(self.employee_frame, text="REFRESH", font=("Arial", 12, 'bold'), command=self.refresh_data)
        self.refresh1_button.config(borderwidth=6, highlightthickness=3)
        self.refresh1_button.place(x=100, y=220, width=120, height=40)
        
        self.update1_button = Button(self.employee_frame, text="UPDATE", font=("Arial", 12, 'bold'), command="NONE",bg='#FF6347',fg='White')
        self.update1_button.config(borderwidth=6, highlightthickness=3)
        self.update1_button.place(x=220, y=220, width=120, height=40)
        
        self.search1_button = Button(self.employee_frame, text="SEARCH", font=("Arial", 12, 'bold'), command=self.search_dataemployee,bg='#1B8A6B',fg='White')
        self.search1_button.config(borderwidth=6, highlightthickness=3)
        self.search1_button.place(x=20, y=275, width=120, height=30)
        
            #TREEVIEW
        self.tree1 = ttk.Treeview(self.employee_frame)
        self.tree1.place(x=10, y=310, width=1070, height=250)
        
        scrollbar = ttk.Scrollbar(self.tree1, orient="vertical", command=self.tree1.yview)
        scrollbar.pack(side="right", fill="y")
        self.tree1.configure(yscrollcommand=scrollbar.set)
        
        self.tree1["columns"] = ('emp','ln','fn','mn','bd','gr','cn','em','pr','mun','brgy','strt')

        self.tree1.column('emp', width=30)
        self.tree1.column('ln', width=50)
        self.tree1.column('fn', width=50)
        self.tree1.column('mn', width=50)
        self.tree1.column('bd', width=50)
        self.tree1.column('gr', width=50)
        self.tree1.column('cn', width=70)
        self.tree1.column('em', width=70)
        self.tree1.column('pr', width=50)
        self.tree1.column('mun', width=50)
        self.tree1.column('brgy', width=50)
        self.tree1.column('strt', width=50)
        
        
        self.tree1.heading('emp', text="ID")
        self.tree1.heading('ln', text="Last Name")
        self.tree1.heading('fn', text="First Name")
        self.tree1.heading('mn', text="Middle Name")
        self.tree1.heading('bd', text="Birthdate")
        self.tree1.heading('gr',text="Gender")
        self.tree1.heading('cn', text="Contact")
        self.tree1.heading('em', text="Email")
        self.tree1.heading('pr', text="Province")
        self.tree1.heading('mun', text="Municipality")
        self.tree1.heading('brgy', text="Barangay")
        self.tree1.heading('strt', text="Street")
        self.tree1['show'] = 'headings'
        
        #Attendance Tab
                #Attendancevariables
        self.var_employee_id = StringVar()
        self.var_SEARCH2 =StringVar()
        
                 #Attendancewidgets
        self.frame_Aone = Frame(self.attendance_frame, bd=4, relief=RAISED, bg="#FFF5EE")
        self.frame_Aone.place(x=5,y=5, width=1085, height=50)
        
        self.frame_Atwo = Frame(self.attendance_frame, bd=2, relief=RAISED, bg="#838996")
        self.frame_Atwo.place(x=5,y=55, width=1085, height=60) 
        
        self.frame_Athree = Frame(self.attendance_frame, bd=2, relief=RAISED, bg="#737CA1")
        self.frame_Athree.place(x=5,y=160, width=1085, height=400)
        
                #Attendancelabels
        self.employee_id = Label(self.attendance_frame,text="Employee ID: ",font=("Arial",12,"bold"),bg="#FFF5EE",fg="Black")
        self.employee_id.place(x=20, y=15)
        
            #AttendanceEntries
        self.employee_id_entry = Entry(self.attendance_frame, bd=2, relief=SUNKEN, bg='White', font=("Arial", 12,"bold"),textvariable=self.var_employee_id, fg="Black")
        self.employee_id_entry.place(x=140, y=15, width= 920, height=25)
        
        self.SEARCH2_entry = Entry(self.attendance_frame, bd=2, relief=SUNKEN, bg='White', font=("Arial", 12,"bold"),textvariable=self.var_SEARCH2, fg="Black")
        self.SEARCH2_entry.place(x=163, y=118, width= 800, height=40)
        
            #AttendanceButtons
        self.timein_button = Button(self.attendance_frame, text="TIME IN", font=("Arial", 12, 'bold'), command=self.time_in_attendance,bg='GREEN',fg='White')
        self.timein_button.config(borderwidth=6, highlightthickness=3)
        self.timein_button.place(x=390, y=65, width=150, height=40)      
        
        self.timeout_button = Button(self.attendance_frame, text="TIME OUT", font=("Arial", 12, 'bold'), command=self.time_out_attendance,bg='GREEN',fg='White')
        self.timeout_button.config(borderwidth=6, highlightthickness=3)
        self.timeout_button.place(x=550, y=65, width=150, height=40) 
        
        self.search_button = Button(self.attendance_frame, text="SEARCH", font=("Arial", 12, 'bold'), command=self.search_attendance_record,bg='GREEN',fg='White')
        self.search_button.config(borderwidth=6, highlightthickness=3)
        self.search_button.place(x=10, y=118, width=150, height=40)
        
        self.show_button = Button(self.attendance_frame, text="SHOW ALL", font=("Arial", 12, 'bold'), command=self.show_attendance_data,bg='GREEN',fg='White')
        self.show_button.config(borderwidth=6, highlightthickness=3)
        self.show_button.place(x=970, y=118, width=100, height=40)
        
        
        
            #AttendanceTreeview
        
        self.tree2 = ttk.Treeview(self.attendance_frame)
        self.tree2.place(x=15, y=170, width=1065, height=380)
        
        scrollbar = ttk.Scrollbar(self.tree2, orient="vertical", command=self.tree2.yview)
        scrollbar.pack(side="right", fill="y")
        self.tree2.configure(yscrollcommand=scrollbar.set)
        
        self.tree2["columns"] = ('emp','emna','dt','tmin','tmou')

        self.tree2.column('emp', width=30)
        self.tree2.column('emna', width=100)
        self.tree2.column('dt', width=80)
        self.tree2.column('tmin', width=80)
        self.tree2.column('tmou', width=80)
        
        self.tree2.heading('emp', text="ID")
        self.tree2.heading('emna', text="Employee Name")
        self.tree2.heading('dt', text="Date")
        self.tree2.heading('tmin', text="Time In")
        self.tree2.heading('tmou', text="Time Out")
        self.tree2['show'] = 'headings'
        
        #Salary Tab
                    #salaryvariables
        self.var_id_salary = StringVar()
        self.var_SEARCH3 = StringVar()
        
                    #widgets
        self.frame_Sone = Frame(self.salary_frame, bd=4, relief=RAISED, bg="#FFF5EE")
        self.frame_Sone.place(x=5,y=5, width=700, height=50)
        
        self.frame_Stwo = Frame(self.salary_frame, bd=2, relief=RAISED, bg="#838996")
        self.frame_Stwo.place(x=5,y=55, width=700, height=60) 
        
        self.frame_Sthree = Frame(self.salary_frame, bd=2, relief=RAISED, bg="#737CA1")
        self.frame_Sthree.place(x=5,y=160, width=700, height=400)
        
        
                #Salary Labels
        self.employee_id = Label(self.salary_frame,text="Employee ID: ",font=("Arial",12,"bold"),bg="#FFF5EE",fg="Black")
        self.employee_id.place(x=20, y=15)  
         
                #salary entries
        self.id_entry = Entry(self.salary_frame, bd=2, relief=SUNKEN, bg='White', font=("Arial", 12,"bold"),textvariable=self.var_id_salary, fg="Black")
        self.id_entry.place(x=140, y=15, width= 500, height=30)
        
        self.SEARCH3_entry = Entry(self.salary_frame, bd=2, relief=SUNKEN, bg='White', font=("Arial", 12,"bold"),textvariable=self.var_SEARCH3, fg="Black")
        self.SEARCH3_entry.place(x=163, y=118, width= 500, height=40)
        
                #salary buttons
        self.generate_button = Button(self.salary_frame, text="GENERATE", font=("Arial", 12, 'bold'), command=self.generate_salary,bg='GREEN',fg='White')
        self.generate_button.config(borderwidth=6, highlightthickness=3)
        self.generate_button.place(x=290, y=65, width=150, height=40)      
        
        self.show_all_button = Button(self.salary_frame, text="Show All", font=("Arial", 12, 'bold'), command=self.time_out_attendance,bg='GREEN',fg='White')
        self.show_all_button.config(borderwidth=6, highlightthickness=3)
        self.show_all_button.place(x=100, y=510, width=500, height=40) 
        
        self.search2_button = Button(self.salary_frame, text="SEARCH", font=("Arial", 12, 'bold'), command=self.search_attendance_record,bg='GREEN',fg='White')
        self.search2_button.config(borderwidth=6, highlightthickness=3)
        self.search2_button.place(x=10, y=118, width=150, height=40)
        
        
                #SalaryTreeview
        
        self.tree3 = ttk.Treeview(self.salary_frame)
        self.tree3.place(x=15, y=170, width=680, height=340)
        
        scrollbar = ttk.Scrollbar(self.tree3, orient="vertical", command=self.tree3.yview)
        scrollbar.pack(side="right", fill="y")
        self.tree3.configure(yscrollcommand=scrollbar.set)
        
        self.tree3["columns"] = ('emp','emna','sly')

        self.tree3.column('emp', width=30)
        self.tree3.column('emna', width=100)
        self.tree3.column('sly', width=80)
        
        
        self.tree3.heading('emp', text="ID")
        self.tree3.heading('emna', text="Employee Name")
        self.tree3.heading('sly', text="Salary")
        self.tree3['show'] = 'headings'
        
        
         
    #connection check
        self.employee_check_connection()  
        self.attendance_check_connection()     
        self.salary_check_connection() 
         
    #employee query
        self.var_idno.get()
        self.var_lname.get()
        self.var_fname.get()
        self.var_mname.get()
        self.var_bdate.get()
        self.var_gender.get()
        self.var_cn.get()
        self.var_email.get()
        self.var_province.get()
        self.var_municipality.get()
        self.var_baranggay.get()
        self.var_street.get()
        self.var_employee_search1.get()
        
    
    def save_insert_employee_data(self):
        if (
            self.var_lname.get() == '' or
            self.var_fname.get() == '' or
            self.var_mname.get() == '' or
            self.var_bdate.get() == '' or
            self.var_gender.get() == '' or
            self.var_cn.get() == '' or
            self.var_email.get() == '' or
            self.var_province.get() == '' or
            self.var_municipality.get() == '' or
            self.var_baranggay.get() == '' or
            self.var_street.get() == ''
        ):
            messagebox.showerror("ERROR", 'ALL FIELDS ARE REQUIRED')
            return

        employee_id = self.entry_empid.get().strip()
        last_name = self.entry_lname.get().strip()
        first_name = self.entry_fname.get().strip()
        middle_name = self.entry_mname.get().strip()
        birth_date = self.dataentry_bdate.get().strip()
        gender = self.combobox_gender.get().strip()
        contact = self.entry_cn.get().strip()
        email = self.entry_email.get().strip()
        province = self.province_entry.get().strip()
        municipality = self.municipality_entry.get().strip()
        barangay = self.baranggay_entry.get().strip()
        street = self.street_entry.get().strip()

        # Check if a record with the same data already exists
        conn = sqlite3.connect('database.db')
        c = conn.cursor()
        c.execute("SELECT * FROM employee WHERE employee_id=?",(self.var_idno.get(),))
        existing_record = c.fetchone()
        if existing_record:
            messagebox.showerror("Error", "Employee data already exists!")

        def validate_email(email):
            pattern = r'^[\w\.-]+@[\w\.-]+\.\w+$'
            if not re.match(pattern, email):
                return False
            return True

        def validate_contact_number(contact_number):
            pattern = r'^\d{11}$'
            if not re.match(pattern, contact_number):
                return False
            return True

        def validate_gender(gender):
            valid_genders = ['Male', 'Female']
            if gender not in valid_genders:
                return False
            return True

        def validate_lastname(last_name):
            pattern = r'^[A-Za-z\s]+$'
            if not re.match(pattern, last_name):
                return False
            return True
        def validate_firstname(first_name):
            pattern = r'^[A-Za-z\s]+$'
            if not re.match(pattern, first_name):
                return False
            return True
        def validate_middlename(middle_name):
            pattern = r'^[A-Za-z\s]+$'
            if not re.match(pattern, middle_name):
                return False
            return True

        def validate_province(province):
            pattern = r'^[A-Za-z0-9\s]+$'
            if not re.match(pattern, province):
                return False
            return True  
        
        def validate_municipality(municipality):
            pattern = r'^[A-Za-z0-9\s]+$'
            if not re.match(pattern, municipality):
                return False
            return True 
        
        def validate_baranggay(baranggay):
            pattern = r'^[A-Za-z0-9\s]+$'
            if not re.match(pattern, baranggay):
                return False
            return True   
        
        def validate_street(street):
            pattern = r'^[A-Za-z0-9\s]+$'
            if not re.match(pattern, street):
                return False
            return True 
        if existing_record:
            messagebox.showerror("Error", "Employee data already exists!")
        elif not validate_email(email):
            messagebox.showerror("Error", "Invalid email!")
            return
        elif not validate_contact_number(contact):
            messagebox.showerror("Error", "Invalid contact number!")
            return
        elif not validate_gender(gender):
            messagebox.showerror("Error", "Invalid gender!")
            return
        elif not validate_lastname(last_name):
            messagebox.showerror("Error", "Invalid last name!")
            return
        elif not validate_firstname(first_name):
            messagebox.showerror("Error", "Invalid first name!")
            return
        elif not validate_middlename(middle_name):
            messagebox.showerror("Error", "Invalid middle name!")
            return
        elif not validate_province(province):
            messagebox.showerror("Error", "Invalid province!")
            return
        elif not validate_municipality(municipality):
            messagebox.showerror("Error", "Invalid municipality!")
            return
        elif not validate_baranggay(barangay):
            messagebox.showerror("Error", "Invalid barangay!")
            return
        elif not validate_street(street):
            messagebox.showerror("Error", "Invalid street!")
            return
        else:
            try:
            # Insert the employee data into the database
                c.execute(
                    "INSERT INTO employee (last_name, first_name, middle_name, birth_date, gender, contact_no, email, province, municipality, baranggay, street) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
                    (last_name, first_name, middle_name, birth_date, gender, contact, email, province, municipality, barangay, street
                    
                    )
                    )
                messagebox.showinfo("Success", "Employee data saved successfully!")
            except sqlite3.IntegrityError:
                messagebox.showerror("Error", "Employee data already exists!")
                return
                
        self.tree1.insert('', 'end', values=(
        self.var_idno.get(),
        self.var_lname.get(),
        self.var_fname.get(),
        self.var_mname.get(),
        self.var_bdate.get(),
        self.var_gender.get(),
        self.var_cn.get(),
        self.var_email.get(),
        self.var_province.get(),
        self.var_municipality.get(),
        self.var_baranggay.get(),
        self.var_street.get()
            )
        )

                
        conn.commit()
        conn.close()
        
    def reset_employee(self):
        
        self.var_lname.set('')
        self.var_fname.set('')
        self.var_mname.set('')
        self.var_bdate.set('')
        self.var_gender.set('')
        self.var_cn.set('')
        self.var_email.set('')
        self.var_province.set('')
        self.var_municipality.set('')
        self.var_baranggay.set('')
        self.var_street.set('')

        # Clear all entry fields
        self.entry_lname.delete(0, END)
        self.entry_fname.delete(0, END)
        self.entry_mname.delete(0, END)
        self.dataentry_bdate.delete(0, END)
        self.combobox_gender.delete(0, END)
        self.entry_cn.delete(0, END)
        self.entry_email.delete(0, END)
        self.province_entry.delete(0, END)
        self.municipality_entry.delete(0, END)
        self.baranggay_entry.delete(0, END)
        self.street_entry.delete(0, END)
    
    def search_dataemployee(self):

        keyword = self.var_employee_search1.get()
        conn = sqlite3.connect('database.db')
        c = conn.cursor()
        c.execute("SELECT  employee_id, last_name, first_name, middle_name, birth_date, gender, contact_no, email, province, municipality, baranggay, street FROM employee WHERE employee_id LIKE ?", ('%' + keyword + '%',))
        rows = c.fetchall()
        self.tree1.delete(*self.tree1.get_children())
        for row in rows:
            self.tree1.insert("", END, values=row)
        conn.close()
    
    def refresh_data(self):
        
        self.tree1.delete(*self.tree1.get_children())
        
        conn = sqlite3.connect('database.db')
        c = conn.cursor()
        c.execute("SELECT employee_id, last_name, first_name, middle_name, birth_date, gender, contact_no, email, province, municipality, baranggay, street FROM employee")
        employees = c.fetchall()
        conn.close()

        for employee in employees:
            self.tree1.insert("", END, values=employee)
            
    def delete_employee_data(employee_id):
        conn = sqlite3.connect('database.db')
        c = conn.cursor()

        try:
                # Enable foreign key constraints (if not already enabled)
            c.execute("PRAGMA foreign_keys = ON")

                # Delete employee data (cascading delete will delete associated attendance and salary data)
            c.execute("DELETE FROM employee WHERE employee_id = ?", (employee_id,))

            conn.commit()
            messagebox.showinfo("Success", "Employee data deleted successfully!")
        except sqlite3.Error as e:
            conn.rollback()
            messagebox.showerror("Error", "Failed to delete employee data:\n" + str(e))

        conn.close()
    
    
                #AttendanceQuery
        
    def time_in_attendance(self):
        # Get the employee ID from the entry box
        employee_id = self.var_employee_id.get()

        # Connect to the database and retrieve the employee name based on the employee ID
        conn = sqlite3.connect('database.db')
        c = conn.cursor()
        c.execute("SELECT first_name, middle_name, last_name FROM employee WHERE employee_id=?", (employee_id,))
        result = c.fetchone()

        # If the employee ID is valid, fill in the employee name entry box
        if result:
            name = result[0] + ' ' + result[1] + ' ' + result[2]
            now = datetime.now()
            current_time = now.strftime("%H:%M:%S")
            entry_date = datetime.now().strftime("%Y-%m-%d")

            try:
                # Insert time in data into the attendance table
                c.execute("INSERT INTO attendance (employee_id, employee_name, date, timein) VALUES (?, ?, ?, ?)",
                        (employee_id, name, entry_date, current_time))
                
                self.tree2.insert('', 'end', values=(
                        self.employee_id_entry.get(), 
                        name,
                        entry_date,
                        current_time
                        
            ))
                conn.commit()
                messagebox.showinfo("Success", "Time in recorded successfully!")
                return

            except sqlite3.Error as e:
                conn.rollback()
                messagebox.showerror("Error", "Failed to record time in:\n" + str(e))
                return

        conn.close()
        
    def time_out_attendance(self):
        # Get the selected item from the treeview
        selected_item = self.tree2.focus()
        
        if selected_item:
            # Retrieve the attendance ID from the selected item
            attendance_id = self.tree2.item(selected_item)['values'][0]

            # Get the current time
            updated_time = datetime.now().strftime("%H:%M:%S")

            # Connect to the database and update the time in the attendance table
            conn = sqlite3.connect('database.db')
            c = conn.cursor()

            try:
                c.execute("UPDATE attendance SET timeout=? WHERE employee_id=?", (updated_time, attendance_id))
                conn.commit()
                messagebox.showinfo("Success", "Time Out recorded successfully!")
            except sqlite3.Error as e:
                conn.rollback()
                messagebox.showerror("Error", "Failed to record Time Out:\n" + str(e))

            # Update the treeview to reflect the updated time out
            self.tree2.set(selected_item, column="#5", value=updated_time)

            conn.close()
        else:
            messagebox.showerror("Error", "No item selected.")
            return
            
    def search_attendance_record(self):

        keyword = self.var_SEARCH2.get()
        conn = sqlite3.connect('database.db')
        c = conn.cursor()
        c.execute("SELECT  employee_id, employee_name, date, timein, timeout FROM attendance WHERE employee_id LIKE ?", ('%' + keyword + '%',))
        rows = c.fetchall()
        self.tree2.delete(*self.tree2.get_children())
        for row in rows:
            self.tree2.insert("", END, values=row)
        conn.close()
        
    def show_attendance_data(self):
        
        self.tree2.delete(*self.tree1.get_children())
        
        conn = sqlite3.connect('database.db')
        c = conn.cursor()
        c.execute("SELECT employee_id, employee_name, date, timein, timeout FROM attendance")
        employees = c.fetchall()
        conn.close()

        for employee in employees:
            self.tree2.insert("", END, values=employee)
            
            
    #Salaryquery
    
    def generate_salary(self):
        # Get the employee ID from the entry box
        employee_id = self.var_id_salary.get()

        # Connect to the database and retrieve the employee name and attendance details based on the employee ID
        conn = sqlite3.connect('database.db')
        c = conn.cursor()
        c.execute("SELECT employee_name FROM attendance WHERE employee_id=?", (employee_id,))
        result = c.fetchone()

        # If the employee ID is valid, fill in the employee name entry box
        if result:
            name = result[0]

            try:
                # Calculate the total hours worked by subtracting timein from timeout
                c.execute("""
                    SELECT timein, timeout, (julianday(timeout) - julianday(timein)) * 54 AS total_hours_worked
                    FROM attendance
                    WHERE employee_id=?
                """, (employee_id,))
                attendance_data = c.fetchall()

                # Insert salary data into the salary table
                for data in attendance_data:
                    total_hours_worked = data
                    c.execute("INSERT INTO salary (employee_id, employee_name,total) VALUES (?, ?, ?)",
                            (employee_id, name, total_hours_worked))

                conn.commit()
                messagebox.showinfo("Success", "Salary generated successfully!")
                return
            except sqlite3.Error as e:
                conn.rollback()
                messagebox.showerror("Error", "Failed to generate salary:\n" + str(e))
                return
        else:
            messagebox.showerror("Error", "Invalid employee ID.")
            return

        conn.close()


        
    
            

                
        
        
        
        
        
        
    
        
        

       

    
    #connectio_to_datatabase.db
    def employee_check_connection(self):
        try:
            conn = sqlite3.connect('database.db')
            cursor = conn.cursor()
            cursor.execute("SELECT * from employee")
            rows=cursor.fetchall()
            print(rows)
        except Exception as ex:
            messagebox.showerror("ERROR", f'ERROR DUE TO: {str(ex)}')
            
    def attendance_check_connection(self):
        try:
            conn = sqlite3.connect('database.db')
            cursor = conn.cursor()
            cursor.execute("SELECT * from attendance")
            rows=cursor.fetchall()
            print(rows)
        except Exception as ex:
            messagebox.showerror("ERROR", f'ERROR DUE TO: {str(ex)}')
            
    def salary_check_connection(self):
        try:
            conn = sqlite3.connect('database.db')
            cursor = conn.cursor()
            cursor.execute("SELECT * from salary")
            rows=cursor.fetchall()
            print(rows)
        except Exception as ex:
            messagebox.showerror("ERROR", f'ERROR DUE TO: {str(ex)}')
        
        
root = Tk()
app = system(root)
root.mainloop()
