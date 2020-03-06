# Jolly Roger Education Student Course

It is built using Codeigniter php framework along with bootstrap 4 and jquery javascript plugin.
There are actually two main focus of this application, the first one is student management and the other is course recording.

## Student management
### View Student
### After Teaching List
### New Student
### Update Student
### Delete Student
Similar with after teaching list, it is only accessible for some users as it has potential damage to the system regarding data loss.
## Course recording
### Schedule
This function is available as read, write, update and delete for admin (in this case front officer), and as read only for other teachers.

This is organized in `Schedule.php` class on the `application/controllers/` directory
### View Session
Using Jquery datatable plugin which gives rich functionality including sorting, pagination and search. It is just simple configuration
### New Session
The form utilize bootstrap grid form.
### Update Session
Basically works the same as new session above
### Delete Session
Nothing fancy here, just send a request to remove the selected record to the database.
### Syllabus
The data structure of this is quite complex.
#### No syllabus function
##### Get Level
By default, program_id column on the student table is set to null, which would fire this function, it gives the user options to choose the appropriate topic for the student. It shows teachers five possible options of levels they are Elementary Kids, Elementary, Junior Student, Senior Student and General English. It shows us something like this.
##### Get Sections
Any clicks on above options would sent back sections on corresponding level, there are three for kids.
##### Get Topics
Works the same as above topics, any chosen section would display topics under each sections.
##### Create
The continue button gives
```
$(document).ready(function(){
  console.log('okay');
});
```
#### Show syllabus
After the process above
##### Change syllabus
##### score on syllabus
### Test
## Group Chat
It is actually written by me which the original code taken from Codeigniter documentation. It is a simple jquery ajax request to send the text and display it back with setInterval function which makes it dynamically reloaded as new messages submitted by other users.
