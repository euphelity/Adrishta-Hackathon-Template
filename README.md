## Team Number 34 - I Voted!

The participants are required to fork this repository and create a public Github repository under their own username (Single repository per team). _Clone the repo on your local system and build on top of that_

The following created sections in this README.md need to be duly filled, highlighting the denoted points for the solution/implementation.

**Please feel free to create further sub-sections in this markdown.** The idea is to understand all the particulars of your solution in a singular document.

### Project Overview

A brief description of

- What problem did the team try to solve?
  The voting system tries to solve the problem of offline voting during the stiff situations of Covid. One does not
  need to visit the ballot houses amidst this situation to cast thier precious votes.

- What is the proposed solution?
  The solution is that all the eligible voters can cast their precious votes online.All they need to do is have a valid email id , registration number and password to signup. 
  
### Solution Description

Explain your solution to the problem in detail here.

  A voter can simply sign up to make a new account and then Login to vote.They can only vote if they are a student of SMIT belonging to 1st, 2nd or 3rd year. 
  The person can make their account only using their official E-mail ids given by the collage and entering a valid registration number.
  A non- SMITian can only access the results of the election, restricting them from voting, thus eliminating outside interferance.
  Each voter is allowed to vote only once for each position of the Student Council Election. There is also an administrator page which keeps check on the activation and      deactivation of the election and voting procedure. The admin can enable and disable the election at will. Additionally the administrator cannot see who a voter has voted for. The portal's voting feature gets disabled after a certain alloted period of time.


#### Architecture Diagram

Affix an image of the flow diagram/architecture diagram of the solution

#### Technical Description

**Technologies Used:**
  
  This application was built using majorly HTML5, CSS3, PHP and mySQL. HTML5 and CSS3 were used for developing the front end of the application. The back end development was done using PHP. The reltional database management was done using mySQL in combination with PHP. 
  For maintaining the server and database XAMPP was used. XAMPP is one of the widely used cross-platform web servers, which helps developers to create and test their programs on a local webserver. Specifically phpMyAdmin was used for databse mangement.
  
  **Setup/Installation:**
  
  To run this project, you must have installed a virtual server i.e XAMPP on your PC (for Windows). After Starting Apache and MySQL in XAMPP, follow the following steps.
  1. Extract and copy the main project folder.
  2. Paste the folder in xampp/htdocs
  3. Open a browser and go to URL “http://localhost/phpmyadmin/” and click the databse tab.
  4. Create a database and name it “voting”, then click on the import tab.
  5. Click on browse file and select “voting.sql” file which is inside the “code files” folder and click "go".
  6. With this the application is ready to run!
  
  **Instructions to run:**
  1. Open a browser and go to URL “http://localhost/Adrishta-Hackathon-Template/Application%20Code/code%20files/home1.php”
  2. Click on “Login/SignUp” tab on the navigation bar:
  3. The page will be redirected to a sign-up page. Create an account with valid credentails:
  
    - The Email must be a valid official email ending with "@smt.smu.edu.in".
    - The Registration Number must be belonging to students of 1st, 2nd and 3rd year. 
    - Additionally the registration number must match the registration number present on the email.
    - Example: If email is abc_201800543@smit.smu.edu.in, registration number must ne 201800543.
    - The email and registration number must be unique.
 
  4. To login as a administrator:
  
    a. After creating an account, click on the “Login” option and enter the valid credentails. After that select the checkbox to login as an administrator.
    b. After successfully loggig in the page will be redirected to the admin page.
    c. Click on “Enable” to enable the election/voting process.
    d. Click on “Disable” to disable the election/voting process.
     
  5. To login as a voter:
  
    a. After creating an account, click on the “Login” option and enter the valid credentails to login.
    b. After successfully loggig in the page will be redirected to the home page.
    c. Click on “Vote for Council” to begin voting when the election is enabled.
    d. Click on “View Results” to view the results when the election is disabled.
  

### Screenshots

Affix the relevant screenshots of the developed project here.

### Team Members

List of team member names and email IDs with their contributions:


|Aditi Bansal|aditi_201800488@smit.smu.edu.in| |

|Kumari Ayushi Sinha|kumari_201800539@smit.smu.edu.in|Suggested the UI/UX and Worked on Front end of the website|

|Pratyush Sharma|pratyush_201800543@smit.smu.edu.in|Worked on backend development and database|

### References

For the Front-end:
1. https://codepen.io/Adroit11/pen/VgEBKL

For the Backend:
1. https://www.w3schools.com/php/php_regex.asp
2. https://www.w3schools.com/php/php_sessions.asp
3. https://www.w3schools.com/sql/sql_insert_into_select.asp
