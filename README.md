# Jolly Roger Education Student Course

It is built using Codeigniter php framework along with bootstrap 4 and jquery javascript plugin.
There are actually two main focus of this application, the first one is student management and the other is course recording.

## Student management
### View Student
`application/controllers/Student.php`

```
  function get_student(){
    $data = $this->student_single_model->get_student();
    echo json_encode($data);
  }
```

`application/models/Student_model.php`
```
  function get_student(){
    $query = $this->db->get('students');
    return $query->result();
  }
```
Utilizing datatable jquery plugin,
``` student table
  $('#someId').DataTable({

  });
```
### After Teaching List
It is exactly the same as above function, the difference is at the controller and model.

```

```
### New Student
The function resides on the `application/controllers/Student.php`

The jquery part seems a little scary, but in fact it just nested conditional which just takes care one thing at once.
``` user.js or spv.js
  $('#save_student_btn').on('click', function(){
    var group = $('#grp').val(),
        // continue
        action_plan = $('#ap').val();

    // Check for required fields
    if(required_fields_are_empty){
      // send error to the user.
    } else { // all fields required are, check their validity
      if(phone_number_isnot_number){

      } else {
        if(program_duration_is_not_number){

        }
      }
    }
  });
```
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
``` javascript
  $.ajax({
    type : "post",
    url : "<?php echo site_url('student_single/delete_session');?>",
    dataType : "json",
    data : {pin:pin, meeting: meeting},
    success : function(data){
      console.log('session deleted');
      $('#my_course').DataTable().ajax.reload();
    }
  });
```
Controller,

```php
  function delete_session(){
    $data = $this->student_single_model->delete_session();
    echo json_encode($data);
  }
```

Model,
```
  function delete_session(){
    $pin = $this->input->post('pin');
    $meeting = $this->input->post('meeting');
    $student_table = "s_".$pin;
    
    $this->db->where('pin', $pin);
    $query = $this->db->delete($student_table);
    return $query;
  }
```
### Syllabus
The data structure of this is quite complex.

This is how the table arranged

syllabus master

|id| sections | topics | inds | indicator |
------|------
|1|1|0|0|INTRODUCTION|

It took me quite loong to finally figure out how to arrange them easily,
my main purpose was something easy to write and easy to operate for the user,
besides, it also must be easy if we need to make some changes. 

This is how it is delivered to the client,

1. it matches the program_id on the student table, 
i don't really know what to say here. all looked blur. 
if we actually can say 
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
