Hotwire
=======

Hotwire User List

The User list was put together using PHP Codeigniter and Angular.js. Both frameworks provide a suitable MVC model to structure the code. 
PHP handles account and login management
Angular is used to make the actual contact page more dynamic and realtime.  

## Relevant Code: ##
### PHP ###
#### Controllers ####
* Signup - new accounts
* Login - existing accounts
* Users - user list

#### Models: ####
* Login-model - reads/writes to a single SQL table membership

#### Views: ####
* user_view - Contact Manager
* Login_view - login page
* signup_view - New Account Sign up page

### Javascript ###
js/main.js - javascript code for the main page

### CSS ###
application/css/style.css

### To run the script, ###
- [ ] download and unzip to a local apache installation, 
- [ ] Run the database scripts the file 'Database Script.sql' in phpmyadmin 
- [ ] Create new accounts and test. 
- [ ] To configure SMTP email settings : Choose from the pre-filled Gmail, Office365 or other mail-server in 'application/config/email.php'. Comment out the one you dont need.
- [ ] The 'To' email has been pre-configured to zrosenberg@hotwiremail.com. Add your Gmail, office365 or other mail-server to the 'From' and 'Reply to' fields in 'application/controllers/users.php - function sendmail()' to correctly receive and send emails. 
- [ ] Run localhost/hotwire and you are good to go. 