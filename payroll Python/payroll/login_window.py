from tkinter import *


def login():
    username = username_entry.get()
    password = password_entry.get()

    if username == "admin" and password == "password":
        login_window.destroy()
        from payroll3 import system
        return
    else:
        message_label.config(text="INVALID USERNAME OR PASSWORD.")

# Create login window
login_window = Tk()
login_window.title("Login")
login_window.geometry("400x200+500+200")
login_window.configure(bg="#C9C0BB")

# Add logo image
logo_image = PhotoImage(file="lucas.png")
logo_image_resized = logo_image.subsample(5, 5)  
logo_label = Label(login_window, image=logo_image_resized, bg="#ffc0cb")
logo_label.place(x=10, y=5)

# Add login form elements
Label(login_window, text="Username:", bg="#C9C0BB", fg="White", font=("Helvetica", 12, "bold")).place(x=160, y=25, width=100, height=20)
Label(login_window, text="Password:" ,bg="#C9C0BB", fg="White", font=("Helvetica", 12, "bold")).place(x=160, y=50, width=100, height=20)
username_entry = Entry(login_window)
password_entry = Entry(login_window, show="*")
username_entry.place(x=260, y=25, width=100, height=20)
password_entry.place(x=260, y=50, width=100, height=20)

# Add login button
login_button = Button(login_window, text="Login", command=login)
login_button.place(x=240, y=100, width=100, height=20)

# Add message label
message_label = Label(login_window, text="", bg="#C9C0BB", fg="Red")
message_label.place(x=180, y=130, width=200, height=20)

login_window.mainloop()