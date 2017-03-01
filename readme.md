## About The Project << User Management System >>
User Management System, records the info of all the users that register. After registering they can edit their details.
An admin can edit details of employees and delete employees.


##Things to note before Trying to use it

- Make sure Vagrant is installed locally and works.. In case you get an error and it tells you to change enable hardware virtualization technology (VT-x) , then just enable it from BIOS.  
- Clone Repo --> https://github.com/tier5/UserManagementSystem.git
- Then Do --> vagrant up
- Then Do --> vagrant ssh
- Then Do --> cd /var/www/html/scripts
- Then Do --> sudo ./after_launch_script ( Make sure local mysql password should be toor )
- Then Local Environment Can be Seen at --> http://localhost:27015 
- Incase it doesnot work for you or shows some errors then just run these two commands from your local project directory given below
- First Do --> sudo chmod -R 777 storage/
- Then Do --> sudo chmod -R 777 bootstrap/
