<?php include 'inc/header.php';?> 
    <div class="container-fluid">
      <h2>
        <span id="schedule_header">Schedule for today</span>
        <?php if($this->session->userdata('level')== '21'):?>
        <div class="float-right">
          <a title="Add new student" href="javascript:void(0);" class="btn btn-primary tooltip-bottom" id="new_teacher_button"> <span class="fa fa-user-plus"></span> New Teacher </a> 
        </div><?php endif;?>
      </h2>
      <br>
      <?php if ($this->session->userdata('level') == '21'):?>
      <table class="table table-sm table-bordered table-striped" id="myschedule">
        <thead>            
          <tr>
            <th>#</th>
            <th>Teacher</th>
            <th colspan="3">9</th>
            <th colspan="3">10</th>
            <th colspan="3">11</th>
            <th colspan="3">12</th>
            <th colspan="3">13</th>
            <th colspan="3">14</th>
            <th colspan="3">15</th>
            <th colspan="3">16</th>
            <th colspan="3">17</th>
            <th colspan="3">18</th>
            <th colspan="3">19</th>
            <th colspan="4">20</th>
          </tr>
        </thead>
        <tbody id="my_schedule">
        </tbody>
      </table>
            <?php else:?>
      <table class="table table-sm table-bordered table-striped" id="myschedule">
        <thead>
           <tr>
            <th>#</th>
            <th>Teacher</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
            <th>12</th>
            <th>13</th>
            <th>14</th>
            <th>15</th>
            <th>16</th>
            <th>17</th>
            <th>18</th>
            <th>19</th>
            <th>20</th>
          </tr>
        </thead>
        <tbody id="my_schedule">
        </tbody>
      </table>
            <?php endif;?>
    </div>
    <div class="container"> 
      <?php if($this->session->userdata('level') == '21'): /* admin */?>
      <!-- SCHEDULE ADMIN -->
      <div class="row">
        <div class="card col-5">
          <div class="card-body">
            <input type="hidden" name="str" id="str">
            <h5 class="card-title">Note:</h5>
            <p contenteditable="true" class="card-text" id="note"></p>
          </div>
        </div>
        <div class="col-4">
          <!--input type="hidden" id="schedule_date" class="form-control" value="<?php echo Date("Y-m-d");?>"-->
          
          <div class="input-group mb-3 schedule-form">
            <div class="input-group-prepend"><span class="input-group-text">Create for:</span>
            </div>
            <input id="schedule_date" name="schedule_date" class="form-control" type="date" aria-label="add schedule date" value="<?php echo Date("Y-m-d"); ?>">
            <div class="input-group-append">
              <button title="Add" id="add_schedule" class="input-group-text btn btn-primary"><i class="fa fa-calendar-plus"></i></button>
            </div>
          </div>
          <div id="nscf"></div>
        </div>
        <div class="col-3" id="schedule_list_div">
          <ul class="list-group" id="schedule_list">
          </ul>
        </div>
      </div>  <!-- END SCHEDULE ADMIN -->
      <?php else: /* user */?> 
      <div class="container-fluid">
        <div class="row">
          <div class="card col-7">
            <div class="card-body">
              <h5 class="card-title">Note:</h5>
              <p class="card-text" id="note"></p>
            </div>          
          </div>
          <div class="col-5">
            <div class="input-group mb-3 schedule-form"> 
              <div class="input-group-prepend"><span class="input-group-text">See another day's:</span>
                </div>
                <input id="schedule_date" name="schedule_date" class="form-control" type="date" aria-label="see schedule" value="<?php echo Date("Y-m-d"); ?>">
                <div class="input-group-append">
                <!--button title="see" id="see_schedule" class="input-group-text btn btn-primary"><i class="fa fa-eye"></i></button-->
              </div>
            </div>
            <div id="sch_r"></div>
          </div>
        </div>
      </div> 
      <?php endif;?>
    </div>
    <hr>
    <div class="container-fluid" id="student_list"> 
      <div class="row">
        <div class="col-12">
          <div class="col-md-12">
            <h1 class="page-header">Student <small>List</small> 
              <div class="float-right">       
                <a title="Add new student" href="javascript:void(0);" class="btn btn-secondary tooltip-bottom" id="new_student_button">
                  <span class="fa fa-user-plus"></span> New Student
                </a>
              </div>
            </h1>
          </div>
          <table class="table table-striped table-bordered" id="mystudents">
            <thead> 
              <tr>
                <th>Pin</th>
                <th>Name</th>
                <th>Aka</th>
                <th>Address</th>
                <th>Birthday</th>
                <th>Phone</th>
                <th>Program</th>
                <th>Start on</th>
                <th>Background</th>
                <!--th style="text-align: right;">Actions</th--> 
              </tr>
            </thead>
            <tbody id="show_data">
            </tbody> 
          </table>
        </div>
      </div>
    </div> 
    <hr>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="col-md-12"> <h1>After Teaching <small>List</small></h1> 
          </div>
          <table class="table table-striped table-bordered" id="myaft">
            <thead>
              <tr>
                <th> Pin </th>
                <th> Name </th>
                <th> Nick name</th>
                <th> Address </th>
                <th> Date of birth </th>
                <th> Phone </th>
                <th> Program </th>
                <th> Starting Date </th>
                <th> Background </th>
                <!--th style="text-align: right;">Actions</th-->
              </tr>
            </thead>
            <tbody id="show_after_teaching"> </tbody>
          </table>
        </div>
      </div>
    </div> <!-- SCHEDULE LIST -->
    <?php include 'inc/footer.php';?>
    <?php include 'inc/chat_dialog.php';?>
    <form>
      <div class="modal fade" id="nsm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
        <div style="max-width: 90%;" class="modal-dialog modal-lg" role="document"> 
          <div class="modal-content add"> 
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Student</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> 
            </div>
            <div class="modal-body"> 
              <div class="row"> 
                <div class="col-lg-5">
                  <fieldset>
                    <legend>Personal Information <a title="click for group study" id="add_one" href="javascript:void(0);"><i class="fas fa-plus-circle fa-fw"></i></a></legend>
                    <div class="form-row">
                      <div class="form-group col-12 row">
                        <div class="col-4"><label for="pn" class="pers_info">PIN<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col"> 
                          <div class="input-group-prepend">
                            <span style="color:green;" class="input-group-text"><i class="fas fa-barcode fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="pn" id="pn" placeholder="PIN"> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="cn" class="pers_info">Name<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i  style="color:red;" class="fa fa-user-circle fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="cn" id="cn" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="nn" class="pers_info">Nick name</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text"><i style="color:rgb(70,0,90);" class="fas fa-user-circle fa-fw"></i> </span> 
                          </div>
                          <input type="text" class="form-control" name="nn" id="nn" placeholder="Alias">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="ad" class="pers_info">Address<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="ad" id="ad" placeholder="Adress" required> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pb" class="pers_info">Place of Birth</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:grey;" class="fa fa-map-marker fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="pb" id="pb" placeholder="Place of Birth">
                        </div>
                      </div>
                      <div class="form-group col-12 row ">
                        <div class="col-4">
                          <label class="pers_info" for="db">Date of Birth<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(120,50,255);" class="fas fa-birthday-cake fa-fw"></i></span>
                          </div>
                          <input type="date" class="form-control" name="db" id="db" required> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label class="pers_info" for="ph">Phone <sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:navy;" class="fa fa-phone-square fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="ph" id="ph" placeholder="62877" value="62"> 
                        </div>
                      </div>
                    </div>
                    <div class="form-row" id="group_name">
                      <h4>Group Name</h4>
                      <div class="form-group col-12 row">
                        <div class="input-group col-12"> 
                          <div class="input-group-prepend">
                            <span style="color:green;" class="input-group-text"><i class="fas fa-user-friends fa-fw"></i></span> 
                          </div>
                          <input class="form-control" type="text" name="grp" id="grp" placeholder="Group name">
                        </div>
                      </div>
                    </div>
                    <!-- STUDENT 2 -->
                    <div class="form-row" id="student2">
                      <h4>Student 2 <a id="add_two" href="javascript:void(0);"><i class="fas fa-plus-circle fa-fw"></i></a> <a href="javascript:void(0);" id="remove_three"><i style="color:rgb(255,0,0);" class="fas fa-times-circle fa-fw"></i></a></h4> 
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="cnst2" class="pers_info">Name<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i  style="color:red;" class="fa fa-user-circle fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="cnst2" id="cnst2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="nnst2" class="pers_info">Nick name</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text"><i style="color:rgb(70,0,90);" class="fas fa-user-circle fa-fw"></i> </span> 
                          </div>
                          <input type="text" class="form-control" name="nnst2" id="nnst2" placeholder="Alias">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="adrst2" class="pers_info">Address<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="adrst2" id="adrst2" placeholder="Adress" required> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pbst2" class="pers_info">Place of Birth</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:grey;" class="fa fa-map-marker fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="pbst2" id="pbst2" placeholder="Place of Birth">
                        </div>
                      </div>
                      <div class="form-group col-12 row ">
                        <div class="col-4">
                          <label class="pers_info" for="dbst2">Date of Birth<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(120,50,255);" class="fas fa-birthday-cake fa-fw"></i></span>
                          </div>
                          <input type="date" class="form-control" name="dbst2" id="dbst2" required> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label class="pers_info" for="phst2">Phone <sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:navy;" class="fa fa-phone-square fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="phst2" id="phst2" placeholder="62877" value="62"> 
                        </div>
                      </div>
                    </div><!-- END STUDENT 2 -->
                    <!-- STUDENT 3 -->
                    <div class="form-row" id="student3">
                      <h4>Student 3 <a id="add_three" href="javascript:void(0);"><i class="fas fa-plus-circle fa-fw"></i></a> <a href="javascript:void(0);" id="remove_two"><i style="color:rgb(255,0,0);" class="fas fa-times-circle fa-fw"></i></a></h4> 
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="cnst3" class="pers_info">Name<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i  style="color:red;" class="fa fa-user-circle fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="cnst3" id="cnst3" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="nnst3" class="pers_info">Nick name</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text"><i style="color:rgb(70,0,90);" class="fas fa-user-circle fa-fw"></i> </span> 
                          </div>
                          <input type="text" class="form-control" name="nnst3" id="nnst3" placeholder="Alias">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="adrst3" class="pers_info">Address<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="adrst3" id="adrst3" placeholder="Adress" required> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pbst3" class="pers_info">Place of Birth</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:grey;" class="fa fa-map-marker fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="pbst3" id="pbst3" placeholder="Place of Birth">
                        </div>
                      </div>
                      <div class="form-group col-12 row ">
                        <div class="col-4">
                          <label class="pers_info" for="dbst3">Date of Birth<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(120,50,255);" class="fas fa-birthday-cake fa-fw"></i></span>
                          </div>
                          <input type="date" class="form-control" name="dbst3" id="dbst3" required> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label class="pers_info" for="phst3">Phone <sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:navy;" class="fa fa-phone-square fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="phst3" id="phst3" placeholder="62877" value="62"> 
                        </div>
                      </div>
                    </div><!-- END STUDENT 3 -->
                    <!-- STUDENT 4 -->
                    <div class="form-row" id="student4">
                      <h4>Student 4 <a href="javascript:void(0);" id="remove_one"><i style="color:rgb(255,0,0);" class="fas fa-times-circle fa-fw"></i></a></h4> 
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="cnst4" class="pers_info">Name<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i  style="color:red;" class="fa fa-user-circle fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="cnst4" id="cnst4" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="nnst4" class="pers_info">Nick name</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text"><i style="color:rgb(70,0,90);" class="fas fa-user-circle fa-fw"></i> </span> 
                          </div>
                          <input type="text" class="form-control" name="nnst4" id="nnst4" placeholder="Alias">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="adrst4" class="pers_info">Address<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="adrst4" id="adrst4" placeholder="Adress" required> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pbst4" class="pers_info">Place of Birth</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:grey;" class="fa fa-map-marker fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="pbst4" id="pbst4" placeholder="Place of Birth">
                        </div>
                      </div>
                      <div class="form-group col-12 row ">
                        <div class="col-4">
                          <label class="pers_info" for="dbst4">Date of Birth<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(120,50,255);" class="fas fa-birthday-cake fa-fw"></i></span>
                          </div>
                          <input type="date" class="form-control" name="dbst4" id="dbst4" required> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label class="pers_info" for="phst4">Phone <sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:navy;" class="fa fa-phone-square fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="phst4" id="phst4" placeholder="62877" value="62"> 
                        </div>
                      </div>
                    </div><!-- END STUDENT 4 -->  
                  </fieldset>
                </div>
                <div class="col-lg-7"> 
                  <fieldset>
                    <legend>Course Detail</legend>
                    <div class="form-row"> 
                      <div class="form-group col-5"> 
                        <label>Program<sup>&lowast;</sup></label> 
                        <div class="input-group"> 
                          <div class="input-group-prepend"> 
                            <span  style="color:rgb(200,100,255);" class="input-group-text"><i class="fa fa-list-ul fa-fw"></i></span> 
                          </div>
                          <select class="form-control" name="pr" id="pr" required> 
                            <option value="">Choose Program</option> 
                            <option value="Confidence Elementary - Kids">Confidence Elementary - Kids</option> 
                            <option value="Confidence Elementary">Confidence Elementary</option> 
                            <option value="Confidence Junior Student">Confidence Junior</option> 
                            <option value="Confidence Senior Student">Confidence Senior</option> 
                            <option value="Confidence General">Confidence General</option> 
                            <option value="Believe">Believe</option>
                            <option value="Express">Express</option>
                            <option value="Intensive">Intensive</option>
                            <option value="TOEFL Prep">TOEFL Prep</option>
                            <option value="IELTS Prep">IELTS Prep</option>
                            <option value="Pre-Confidence">Pre Confidence</option> <option value="Monthly">Monthly</option>
                          </select> 
                        </div>
                      </div>
                      <div class="form-group col-3"> <label>Program Duration<sup>&lowast;</sup></label> 
                        <div class="input-group"> 
                          <div class="input-group-prepend"> 
                            <span class="input-group-text"><i style="color:rgb(80,83,210);" class="fa fa-hourglass-end fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="pd" placeholder="Duration" id="pd"> 
                        </div>
                      </div>
                      <div class="form-group col-4"> 
                        <label>Starting Date</label> 
                        <div class="input-group"> 
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:rgb(80,170,243);" class="fa fa-flag fa-fw"></i></span> 
                          </div>
                          <input type="date" class="form-control" name="sd" id="sd"> 
                        </div>
                      </div>
                      <div class="form-group col-4"> 
                        <label>Reason</label> 
                        <div class="input-group"> 
                          <div class="input-group-prepend"> 
                            <span class="input-group-text"><i style="color:rgb(80,255,20);" class="fa fa-question-circle fa-fw"></i></span> 
                          </div>
                          <textarea class="form-control" name="re" id="re" placeholder="Reason for studying"></textarea> 
                      </div>
                      </div>
                      <div class="form-group col-4"> 
                        <label>Target</label> 
                        <div class="input-group"> 
                          <div class="input-group-prepend"> 
                            <span class="input-group-text"><i style="color: rgb(190,110,27);" class="fa fa-crosshairs fa-fw"></i></span> 
                          </div>
                          <textarea class="form-control" name="ta" id="ta" placeholder="Target"></textarea> 
                        </div>
                      </div>
                      <div class="form-group col-4"> 
                        <label>Background</label> 
                        <div class="input-group"> 
                          <div class="input-group-prepend"> 
                            <span class="input-group-text"><i style="color:rgb(100,120,190);" class="fa fa-graduation-cap fa-fw"></i></span> 
                          </div>
                          <textarea class="form-control" name="bg" id="bg" placeholder="Background"></textarea> 
                        </div>
                      </div>
                      <div class="form-group col-6"> 
                        <label>Difficulties</label> 
                        <div class="input-group"> 
                          <div class="input-group-prepend"> 
                            <span class="input-group-text">
                              <i style="color:rgb(255,0,255);" class="fa fa-thumbs-down fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="di" id="di" placeholder="Difficulties"> 
                        </div>
                      </div>
                      <div class="form-group col-6"> 
                        <label>Self Introduction</label> 
                        <div class="input-group"> 
                          <div class="input-group-prepend"> 
                            <span class="input-group-text"><i style="color:rgb(70,210,155);" class="fa fa-info-circle fa-fw"></i></span> 
                          </div>
                          <select class="form-control" name="si" id="si">
                            <option value="">Choose one</option>
                            <option value="Poor">Poor</option> 
                            <option value="Below Average">Below Average</option> 
                            <option value="Average">Average</option> 
                            <option value="Good">Good</option> 
                            <option value="Excellent">Excellent</option> 
                          </select> 
                        </div>
                      </div>
                      <div class="form-group col-6"> 
                        <label>Weakness Points</label> 
                        <div class="input-group"> 
                          <div class="input-group-prepend"> 
                            <span class="input-group-text"> 
                              <i style="color:rgb(255,20,60);" class="fas fa-exclamation-triangle fa-fw"></i> 
                            </span> 
                          </div>
                          <textarea class="form-control" name="wp" id="wp" placeholder="Student's main problems"></textarea> 
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label>Action Plan</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(0,120,80);" class="fa fa-wrench fa-fw"></i> </span>
                          </div>
                          <textarea class="form-control" name="ap" id="ap" placeholder="Suggestions and recommendation"></textarea> 
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </div>
              </div>
            </div>
            <div class="modal-footer row">
              <span class="ffb" id="nsf"></span>
              <button type="button" class="btn-close btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              <button type="button" type="submit" id="save_student_btn" class="btn-submit btn btn-primary"><i class="fa fa-check"></i> Save</button> 
            </div>
          </div>
        </div>
      </div>
    </form> <!-- END NEW STUDENT -->
    <!-- EDIT STUDENT -->
    <form>
      <div class="modal fade" id="esm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
        <div style="max-width: 90%;" class="modal-dialog modal-lg" role="document"> 
          <div class="modal-content edit"> 
            <div class="modal-header"> 
              <h5 class="modal-title" id="exampleModalLabel">Edit Student Information</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> 
            </div>
            <div class="modal-body"> 
              <div class="row"> 
                <div class="col-lg-5">
                  <fieldset>
                    <legend>Personal Information <a title="click for group study" id="add_one_e" href="javascript:void(0);"><i class="fas fa-plus-circle fa-fw"></i></a></legend>
                    <div class="form-row">
                      <div class="form-group col-12 row">
                        <div class="col-4"><label for="pn_e" class="pers_info">PIN<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col"> 
                          <div class="input-group-prepend">
                            <span style="color:green;" class="input-group-text"><i class="fas fa-barcode fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="pn_e" id="pn_e" disabled> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="cn_e" class="pers_info">Name<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i  style="color:red;" class="fa fa-user-circle fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="cn_e" id="cn_e" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="nn_e" class="pers_info">Nick name</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text"><i style="color:rgb(70,0,90);" class="fas fa-user-circle fa-fw"></i> </span> 
                          </div>
                          <input type="text" class="form-control" name="nn_e" id="nn_e" placeholder="Alias">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="ad_e" class="pers_info">Address<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                            <i style="color:blue;"  class="fa fa-home fa-fw"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control" name="ad_e" id="ad_e" placeholder="Adress" required> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pb_e" class="pers_info">Place of Birth</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:grey;" class="fa fa-map-marker fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="pb_e" id="pb_e" placeholder="Place of Birth">
                        </div>
                      </div>
                      <div class="form-group col-12 row ">
                        <div class="col-4">
                          <label class="pers_info" for="db_e">Date of Birth<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(120,50,255);" class="fas fa-birthday-cake fa-fw"></i></span>
                          </div>
                          <input type="date" class="form-control" name="db_e" id="db_e" required> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label class="pers_info" for="ph_e">Phone <sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:navy;" class="fa fa-phone-square fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="ph_e" id="ph_e" placeholder="62877" value="62"> 
                        </div>
                      </div>
                    </div>
                    <div class="form-row" id="group_name_e">
                      <h4>Group Name</h4>
                      <div class="form-group col-12 row">
                        <div class="input-group col-12"> 
                          <div class="input-group-prepend">
                            <span style="color:green;" class="input-group-text"><i class="fas fa-user-friends fa-fw"></i></span> 
                          </div>
                          <input class="form-control" type="text" name="grp_e" id="grp_e" placeholder="Group name">
                        </div>
                      </div>
                    </div>
                    <!-- STUDENT 2 -->
                    <div class="form-row" id="student2_e">
                      <h4>Student 2 <a id="add_two_e" href="javascript:void(0);"><i class="fas fa-plus-circle fa-fw"></i></a> <a href="javascript:void(0);" id="remove_three_e"><i style="color:rgb(255,0,0);" class="fas fa-times-circle fa-fw"></i></a></h4> 
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="cnst2_e" class="pers_info">Name<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i  style="color:red;" class="fa fa-user-circle fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="cnst2_e" id="cnst2_e" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="nnst2_e" class="pers_info">Nick name</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text"><i style="color:rgb(70,0,90);" class="fas fa-user-circle fa-fw"></i> </span> 
                          </div>
                          <input type="text" class="form-control" name="nnst2_e" id="nnst2_e" placeholder="Alias">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="adrst2_e" class="pers_info">Address<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="adrst2_e" id="adrst2_e" placeholder="Adress" required> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pbst2_e" class="pers_info">Place of Birth</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:grey;" class="fa fa-map-marker fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="pbst2_e" id="pbst2_e" placeholder="Place of Birth">
                        </div>
                      </div>
                      <div class="form-group col-12 row ">
                        <div class="col-4">
                          <label class="pers_info" for="dbst2_e">Date of Birth<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(120,50,255);" class="fas fa-birthday-cake fa-fw"></i></span>
                          </div>
                          <input type="date" class="form-control" name="dbst2_e" id="dbst2_e" required> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label class="pers_info" for="phst2_e">Phone <sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:navy;" class="fa fa-phone-square fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="phst2_e" id="phst2_e" placeholder="62877" value="62"> 
                        </div>
                      </div>
                    </div><!-- END STUDENT 2 -->
                    <!-- STUDENT 3 -->
                    <div class="form-row" id="student3_e">
                      <h4>Student 3 <a id="add_three_e" href="javascript:void(0);"><i class="fas fa-plus-circle fa-fw"></i></a> <a href="javascript:void(0);" id="remove_two_e"><i style="color:rgb(255,0,0);" class="fas fa-times-circle fa-fw"></i></a></h4> 
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="cnst3_e" class="pers_info">Name<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i  style="color:red;" class="fa fa-user-circle fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="cnst3_e" id="cnst3_e" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="nnst3_e" class="pers_info">Nick name</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text"><i style="color:rgb(70,0,90);" class="fas fa-user-circle fa-fw"></i> </span> 
                          </div>
                          <input type="text" class="form-control" name="nnst3_e" id="nnst3_e" placeholder="Alias">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="adrst3_e" class="pers_info">Address<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="adrst3_e" id="adrst3_e" placeholder="Adress" required> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pbst3_e" class="pers_info">Place of Birth</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:grey;" class="fa fa-map-marker fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="pbst3_e" id="pbst3_e" placeholder="Place of Birth">
                        </div>
                      </div>
                      <div class="form-group col-12 row ">
                        <div class="col-4">
                          <label class="pers_info" for="dbst3_e">Date of Birth<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(120,50,255);" class="fas fa-birthday-cake fa-fw"></i></span>
                          </div>
                          <input type="date" class="form-control" name="dbst3_e" id="dbst3_e" required> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label class="pers_info" for="phst3_e">Phone <sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:navy;" class="fa fa-phone-square fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="phst3_e" id="phst3_e" placeholder="62877" value="62"> 
                        </div>
                      </div>
                    </div><!-- END STUDENT 3 -->
                    <!-- STUDENT 4 -->
                    <div class="form-row" id="student4_e">
                      <h4>Student 4 <a href="javascript:void(0);" id="remove_one_e"><i style="color:rgb(255,0,0);" class="fas fa-times-circle fa-fw"></i></a></h4> 
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="cnst4_e" class="pers_info">Name<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i  style="color:red;" class="fa fa-user-circle fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="cnst4_e" id="cnst4_e" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="nnst4_e" class="pers_info">Nick name</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text"><i style="color:rgb(70,0,90);" class="fas fa-user-circle fa-fw"></i> </span> 
                          </div>
                          <input type="text" class="form-control" name="nnst4_e" id="nnst4_e" placeholder="Alias">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="adrst4_e" class="pers_info">Address<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="adrst4_e" id="adrst4_e" placeholder="Address" required> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pbst4_e" class="pers_info">Place of Birth</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:grey;" class="fa fa-map-marker fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="pbst4_e" id="pbst4_e" placeholder="Place of Birth">
                        </div>
                      </div>
                      <div class="form-group col-12 row ">
                        <div class="col-4">
                          <label class="pers_info" for="dbst4_e">Date of Birth<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(120,50,255);" class="fas fa-birthday-cake fa-fw"></i></span>
                          </div>
                          <input type="date" class="form-control" name="dbst4_e" id="dbst4_e" required> 
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label class="pers_info" for="phst4_e">Phone <sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:navy;" class="fa fa-phone-square fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="phst4_e" id="phst4_e" placeholder="62877" value="62"> 
                        </div>
                      </div>
                    </div><!-- END STUDENT 4 -->  
                  </fieldset>
                </div>
                <div class="col-lg-7"> 
                  <fieldset>
                    <legend>Course Detail</legend>
                    <div class="form-row"> 
                      <div class="form-group col-5"> 
                        <label>Program <sup>&lowast;</sup></label> 
                        <div class="input-group"> 
                          <div class="input-group-prepend"> 
                            <span  style="color:rgb(200,100,255);" class="input-group-text"><i class="fa fa-list-ul fa-fw"></i></span> 
                          </div>
                          <select class="form-control" name="pr2" id="pr2"> 
                            <option value="">Choose Program</option> 
                            <option value="Confidence Elementary - Kids">Confidence Elementary - Kids</option> 
                            <option value="Confidence Elementary">Confidence Elementary</option> 
                            <option value="Confidence Junior Student">Confidence Junior</option> 
                            <option value="Confidence Senior Student">Confidence Senior</option> 
                            <option value="Confidence General">Confidence General</option> 
                            <option value="Believe">Believe</option>
                             <option value="Express">Express</option>
                            <option value="Intensive">Intensive</option>
                            <option value="TOEFL Prep">TOEFL Prep</option>
                            <option value="IELTS Prep">IELTS Prep</option>
                            <option value="Pre-Confidence">Pre Confidence</option> 
                            <option value="Monthly">Monthly</option> 
                          </select> 
                        </div>
                      </div>
                      <div class="form-group col-3">
                        <label>Program Duration <sup>&lowast;</sup></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                           <span class="input-group-text"><i style="color:rgb(80,83,210);" class="fa fa-hourglass-end fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="pd2" id="pd2" placeholder="Duration">
                        </div>
                      </div>
                      <div class="form-group col-4">
                        <label>Starting Date</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                             <span class="input-group-text"><i style="color:rgb(80,170,243);" class="fa fa-flag fa-fw"></i></span> 
                          </div>
                          <input type="date" class="form-control" name="sd2" id="sd2"> 
                        </div>
                      </div>
                      <div class="form-group col-4">
                        <label>Reason</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(80,255,20);" class="fa fa-question-circle fa-fw"></i></span> 
                          </div>
                          <textarea class="form-control" name="re2" id="re2" placeholder="Reason for studying"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-4">
                        <label>Target</label> 
                        <div class="input-group">
                          <div class="input-group-prepend">
                             <span class="input-group-text"><i style="color: rgb(190,110,27);" class="fa fa-crosshairs fa-fw"></i></span> 
                          </div>
                          <textarea class="form-control" name="ta2" id="ta2" placeholder="Target after completion"></textarea> 
                        </div>
                      </div>
                      <div class="form-group col-4">
                        <label>Background</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(100,120,190);" class="fa fa-graduation-cap fa-fw"></i></span> 
                          </div>
                          <textarea class="form-control" name="bg2" id="bg2" placeholder="Background"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label>Difficulties</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i style="color:rgb(255,0,255);" class="fa fa-thumbs-down fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="di2" id="di2" placeholder="Difficulties">
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label>Self Introduction</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(70,210,155);" class="fa fa-info-circle fa-fw"></i></span> 
                          </div>
                          <select class="form-control" name="si2" id="si2"> 
                            <option value="">Choose one</option>
                            <option value="Poor">Poor</option>
                            <option value="Below Average">Below Average</option>
                            <option value="Average" selected>Average</option>
                            <option value="Good">Good</option>
                            <option value="Excellent">Excellent</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label>Weakness Points</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(255,20,60);" class="fas fa-exclamation-triangle fa-fw"></i></span>
                          </div>
                          <textarea class="form-control" name="wp2" id="wp2" placeholder="Student's main problems"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-6"> 
                        <label>Action Plan</label> 
                        <div class="input-group"> 
                          <div class="input-group-prepend"> 
                          <span class="input-group-text"><i style="color:rgb(0,120,80);" class="fa fa-wrench fa-fw"></i> </span>
                          </div>
                          <textarea class="form-control" name="ap2" id="ap2" placeholder="Suggestions and recommendations"></textarea> 
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </div>
              </div>
              <div id="fsp_button"></div>
            </div>
            <div class="modal-footer"> 
              <span class="ffb" id="esf"></span>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times"></i> Close </button> 
              <button type="button" type="submit" id="update_student_btn" class="btn btn-primary"> <i class="fa fa-check"></i> Update</button> 
            </div>
          </div>
        </div>
      </div>
    </form>
    <?php if($this->session->userdata('level') == '17'):?>
    <!-- DELETE  STUDENT -->
    <form>
      <div class="modal fade" id="delete_student_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content add">
            <div class="modal-header">
              <h5 class="modal-title">Delete Student</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Excecute with care! Once it is done, it is gone!            
            </div>
            <div class="modal-footer">
              <input type="hidden" name="pin_delete" id="pin_delete">
              <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
              <button type="button" id="btn_delete_student" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
            </div>
          </div>
        </div>
      </div>
    </form> <!-- END DELETE STUDENT -->
    <?php endif;?>
    <!-- END EDIT STUDENT FORM -->
    <?php if($this->session->userdata('level') == '21'):?>
    <!-- NEW  TEACHER -->
    <form>
      <div class="modal fade" id="new_teacher_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content add">
            <div class="modal-header">
              <h5 class="modal-title">Add Teacher</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="teacher_name">Name</label>
                  <input type="text" class="form-control" name="teacher_name" id="teacher_name" placeholder="Teacher name">
                </div>            
            </div>
            <div class="modal-footer">
              <span class="ffb" id="ntf"></span>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
              <button type="button" type="submit" id="btn_save_teacher" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
            </div>
          </div>
        </div>
      </div>
    </form> <!-- END NEW TEACHER -->
    <!-- DELETE  TEACHER -->
    <form>
      <div class="modal fade" id="delete_teacher_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content add">
            <div class="modal-header">
              <h5 class="modal-title">Delete Teacher?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Please execute with care! Once it is done, it's gone!   
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id" id="id">
              <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
              <button type="button" id="btn_delete_teacher" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
            </div>
          </div>
        </div>
      </div>
    </form> <!-- END DELETE TEACHER -->
    <?php endif;?>
    <?php include 'inc/scripts.php';?> 
    <?php include 'inc/chat-script.php';?>
    <?php if($this->session->userdata('level') == '21'):/* schedule admin */?>
    <script>
      $(document).ready(function(){
        get_schedules();
        get_schedule();
        function get_schedules(){
          var d = $('#schedule_date').val();
          $.ajax({
            type : "ajax",
            url : "<?php echo site_url('schedule/get_schedules');?>",
            dataType : "JSON",
            success : function(data){
              var html = '',i;
              for(i=0;i<data.length;i++){
                if(data[i].table_name == d){
                  html += '<li class="list-group-item curr"><a class="schedule_list_item  curr_a" href="javascript:void(0);" data-d="'+data[i].table_name+'">'+data[i].table_name+'</a></li>'
                } else {
                  html += '<li class="list-group-item"><a class="schedule_list_item" href="javascript:void(0);" data-d="'+data[i].table_name+'">'+data[i].table_name+'</a></li>'
                }
              }
              $('#schedule_list').html(html);
            }
          });
        }
        $('#add_schedule').on('click', function(){
          var d = $('#schedule_date').val();
          if(d==''){
            $('#nscf').addClass("alert alert-danger");
            $('#nscf').fadeIn('fast');
            $('#nscf').html('Pick a date!');
            $('#nscf').fadeOut(3000);
          } else {
            $.ajax({
              type : "POST",
              url : "<?php echo site_url('schedule/date_availability');?>",
              data : {d:d},
              success : function(response){
                if (response == 'true'){
                  $('#nscf').removeClass('alert alert-success');
                  $('#nscf').addClass("alert alert-danger");
                  $('#nscf').fadeIn('fast');
                  $('#nscf').html('Table for <strong>'+d+'</strong> already exists!');
                  $('#nscf').fadeOut(3000);
                } else {
                  $.ajax({
                    type: "POST",
                    url : "<?php echo site_url('schedule/add_schedule');?>",
                    dataType : "JSON",
                    data : {d:d},
                    success : function(data){
                      $.ajax({
                        type : "POST",
                        url : "<?php echo site_url('schedule/create_schedule'); ?>",
                        dataType : "JSON",
                        data: {d:d},
                        success: function(data){
                          $.ajax({
                            type : "POST",
                            url : "<?php echo site_url('schedule/insert_teachers'); ?>",
                            dataType : "JSON",
                            data: {d:d},
                            success: function(data){
                              get_schedule();
                              get_schedules();
                              $('#nscf').removeClass('alert alert-danger');
                              $('#nscf').addClass("alert alert-success");
                              $('#nscf').fadeIn('fast');
                              $('#nscf').html('Table <strong>'+d+'</strong> created!');
                              $('#nscf').fadeOut(3000);
                              
                            }
                          });
                        }
                      });
                    }
                  }); 
                }
              }
            });
          }          
        });
        $('#schedule_list').on('click','.schedule_list_item', function(){
          var d = $(this).data('d');
          get_schedule(d);
          $('#schedule_date').val(d);
        });
        function get_schedule(d = $('#schedule_date').val()){
          var dtf = d + " 00:00:00";
          $.ajax({
            type: "ajax",
            url: "<?php echo site_url('schedule/get_schedule?d=');?>"+d,
            dataType : "JSON",
            success : function(data){
              var html = '',
                  schd_head = '<small>Schedule for</small> '+$.format.date(dtf, "ddd, MMM D, yyyy"),
                  i,
                  c=0;
              for (i=0;i<data.length;i++){
                c = c+1;
                html += '<tr>'+
                          '<td style="text-align:right;"><div>'+c+'</div></td>'+
                          '<td style="text-align:left;"><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="name">'+data[i].name+'</div></td>'+
                          '<td><div contentEditable="true" class="edit"  data-id="'+data[i].id+'" data-col="_9">'+data[i]._9+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_9r">'+data[i]._9r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_9p">'+data[i]._9p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_10">'+data[i]._10+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_10r">'+data[i]._10r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit"  data-id="'+data[i].id+'" data-col="_10p">'+data[i]._10p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_11">'+data[i]._11+'</div></td>'+
                          '<td><div contentEditable="true" class="edit"  data-id="'+data[i].id+'" data-col="_11r">'+data[i]._11r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_11p">'+data[i]._11p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_12">'+data[i]._12+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_12r">'+data[i]._12r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_12p">'+data[i]._12p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_13">'+data[i]._13+'</div></td>'+
                          '<td><div contentEditable="true" class="edit"  data-id="'+data[i].id+'" data-col="_13r">'+data[i]._13r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit"  data-id="'+data[i].id+'" data-col="_13p">'+data[i]._13p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit"  data-id="'+data[i].id+'" data-col="_14">'+data[i]._14+'</div></td>'+
                          '<td><div contentEditable="true" class="edit"  data-id="'+data[i].id+'" data-col="_14r">'+data[i]._14r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit"  data-id="'+data[i].id+'" data-col="_14p">'+data[i]._14p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit"  data-id="'+data[i].id+'" data-col="_15">'+data[i]._15+'</div></td>'+
                          '<td><div contentEditable="true" class="edit"  data-id="'+data[i].id+'" data-col="_15r">'+data[i]._15r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit"  data-id="'+data[i].id+'" data-col="_15p">'+data[i]._15p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_16">'+data[i]._16+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_16r">'+data[i]._16r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_16p">'+data[i]._16p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_17">'+data[i]._17+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_17r">'+data[i]._17r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_17p">'+data[i]._17p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_18">'+data[i]._18+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_18r">'+data[i]._18r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_18p">'+data[i]._18p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_19">'+data[i]._19+'</div></td>'+
                          '<td><div contentEditable="true" class="edit"  data-id="'+data[i].id+'" data-col="_19r">'+data[i]._19r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit"  data-id="'+data[i].id+'" data-col="_19p">'+data[i]._19p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit"  data-id="'+data[i].id+'" data-col="_20">'+data[i]._20+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_20r">'+data[i]._20r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_20p">'+data[i]._20p+'</div></td>'+
                          '<td><a data-id="'+data[i].id+'" class="btn-sm teacher_delete" href="javascript:void(0);"><i style="color:red;" class="fas fa-trash"></i></a></td>'
                        '</tr>'+
                  '<tr>';
              }
              $('#my_schedule').html(html);
              $('#schedule_header').html(schd_head);
              get_schedules();
              $.ajax({
                type : "POST",
                url : "<?php echo site_url('schedule/get_note') ;?>",
                dataType : "JSON",
                data : {d:d},
                success: function(data){
                  var html = '', i;
                  for(i=0;i<data.length;i++){
                    html += data[i].note;
                  }
                  $('#note').html(html);
                }
              });
            }
          });
        }
        $('#my_schedule').on('focusin','.edit', function(){
          $(this).addClass('editMode');
          var id= $(this).data('id'),
              col = $(this).data('col'),
              str = $(this).text(),
              d = $('#schedule_date').val();
          $(this).on('focusout',function(){
            $(this).removeClass('editMode');
            var str2 = $(this).text();
            if (str != str2){
              $.ajax({
                type : "POST",
                url : "<?php echo site_url('schedule/update') ;?>",
                dataType : "JSON",
                data : {id: id, col: col, str:str2, d: d},
                success : function(data){
                  $('#nscf').removeClass('alert alert-danger');
                  $('#nscf').addClass('alert alert-success');
                  $('#nscf').html('Change saved!');
                  $('#nscf').fadeIn('fast');
                  $('#nscf').fadeOut(1000);
                }
              });
            }
          });
        });
        $('#note').on('focusin', function(){
          $(this).addClass('editMode');
          var str = $(this).text(),
              d = $('#schedule_date').val();
          $('#str').val(str);
         
        });
        $('#note').on('focusout',function(){
          $(this).removeClass('editMode');
          var str = $('#str').val(),
              str2 = $(this).text(),
              d = $('#schedule_date').val();
          if (str != str2){
            $.ajax({
              type : "post",
              url : "<?php echo site_url('schedule/update_note') ;?>",
              dataType : "json",
              data : {d:d, str:str2},
              success :function(data){
                get_schedule();
              }
            });
          }
        });
        $('#new_teacher_button').on('click', function(){
          $('#new_teacher_modal').modal('show');
        }); 
        $('#btn_save_teacher').on('click', function(){
          var name = $('#teacher_name').val(),
              d = $('#schedule_date').val();
          if (name == ''){
            $('#ntf').addClass('alert alert-danger');
            $('#ntf').html('It can\'t be empty');
          } else {            
            $.ajax({
              url: "<?php echo site_url('schedule/add_teacher');?>",
              method : "POST",
              dataType : "JSON",
              data : {name : name, d: d},
              success : function(data){
                $('#new_teacher_modal').modal('hide');
                $('#teacher_name').val("");
                $('#nscf').removeClass('alert alert-danger');
                $('#nscf').addClass('alert alert-success');
                $('#nscf').fadeIn('fast');
                $('#nscf').html('Teacher added!');
                $('#nscf').fadeOut(5000);
                get_schedule();
              }
            });
          }
        });
        $('#my_schedule').on('click','.teacher_delete', function(){
          var id = $(this).data('id');
          $('#id').val(id);
          $('#delete_teacher_modal').modal('show');
        });
        $('#btn_delete_teacher').on('click', function(){
          var id = $('#id').val(),
              d = $('#schedule_date').val();
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('schedule/delete_teacher');?>",
            dataType : "JSON",
            data : {id:id, d:d},
            success: function(data){
              $('#delete_teacher_modal').modal('hide');
              $('#nscf').removeClass('alert alert-success');
              $('#nscf').addClass('alert alert-danger');
              $('#nscf').fadeIn('fast');
              $('#nscf').html('Teacher removed!');
              $('#nscf').fadeOut(5000);
              get_schedule();
            }
          });
        });
      });
    </script>
    <?php else: /* schedule user */?>
    <script>
      $(document).ready(function(){
        show_schedule();
        setInterval(function(){
          show_schedule();
        }, 20000);
        $('#schedule_date').on('change', function(){
          var d = $(this).val();
          $.ajax({
            type: "POST",
            url : "<?php echo site_url('schedule/date_availability');?>",
            data: {d:d},
            success : function(response){
              if(response == 'false'){
                $('#sch_r').addClass('alert alert-danger');
                $('#sch_r').fadeIn('fast');
                $('#sch_r').html('Table for <em>'+d+' </em>isn\'t available yet!');
                $('#sch_r').fadeOut(5000);
              } else{
                show_schedule();
              }
            }
          });
        });
        function show_schedule(d = $('#schedule_date').val()){
          var dtf = d + " 00:00:00";
          $.ajax({
            type: "ajax",
            url: "<?php echo site_url('schedule/get_schedule?d=');?>"+d,
            dataType : "JSON",
            success : function(data){
              var html = '',
                  schd_head = '<small>Schedule for</small> '+$.format.date(dtf, "ddd, MMM D, yyyy"),
                  stl = "<?php echo site_url('student_single?pin=');?>",
                  i,
                  c=0;
              for (i=0;i<data.length;i++){
                c = c+1;
                html += '<tr>'+
                          '<td style="text-align:right;">'+c+'</td>'+
                          '<td style="text-align:left;">'+data[i].name+'</td>';
                if(isNaN(data[i]._9)){
                    html += '<td class="tc_break">'+data[i]._9+'</td>';
                } else if(data[i]._9p == 'a'){
                  html += '<td class="abs""><a href="'+stl+data[i]._9+'">'+data[i]._9+' <span class="req">'+data[i]._9r+'</span></a></td>';
                } else if(data[i]._9p == 'p'){
                  html += '<td class="prst"><a href="'+stl+data[i]._9+'">'+data[i]._9+' <span class="req">'+data[i]._9r+'</span></a></td>';
                } else {
                  html += '<td><a href="'+stl+data[i]._9+'">'+data[i]._9+' <span class="req">'+data[i]._9r+'</span></a></td>';
                }
                if(isNaN(data[i]._10)){
                     html += '<td class="tc_break">'+data[i]._10+'</td>';
                } else if(data[i]._10p == 'a'){
                  html += '<td class="abs""><a href="'+stl+data[i]._10+'">'+data[i]._10+' <span class="req">'+data[i]._10r+'</span></a></td>';
                } else if(data[i]._10p == 'p'){
                  html += '<td class="prst"><a href="'+stl+data[i]._10+'">'+data[i]._10+' <span class="req">'+data[i]._10r+'</span></a></td>';
                } else {
                  html += '<td><a href="'+stl+data[i]._10+'">'+data[i]._10+' <small><stronsg>'+data[i]._10r+'</span></a></td>';
                }
                if(isNaN(data[i]._11)){
                     html += '<td class="tc_break">'+data[i]._11+'</td>';
                } else if(data[i]._11p == 'a'){
                  html += '<td class="abs""><a href="'+stl+data[i]._11+'">'+data[i]._11+' <span class="req">'+data[i]._11r+'</span></a></td>';
                } else if(data[i]._11p == 'p'){
                  html += '<td class="prst"><a href="'+stl+data[i]._11+'">'+data[i]._11+' <span class="req">'+data[i]._11r+'</span></a></td>';
                } else {
                  html += '<td><a href="'+stl+data[i]._11+'">'+data[i]._11+' <span class="req">'+data[i]._11r+'</span></a></td>';
                }
               if(isNaN(data[i]._12)){
                     html += '<td class="tc_break">'+data[i]._12+'</td>';
                } else if(data[i]._12p == 'a'){
                  html += '<td class="abs""><a href="'+stl+data[i]._12+'">'+data[i]._12+' <span class="req">'+data[i]._12r+'</span></a></td>';
                } else if(data[i]._12p == 'p'){
                  html += '<td class="prst"><a href="'+stl+data[i]._12+'">'+data[i]._12+' <span class="req">'+data[i]._12r+'</span></a></td>';
                } else {
                  html += '<td><a href="'+stl+data[i]._12+'">'+data[i]._12+' <span class="req">'+data[i]._12r+'</span></a></td>';
                }
                if(isNaN(data[i]._13)){
                     html += '<td class="tc_break">'+data[i]._13+'</td>';
                } else if(data[i]._13p == 'a'){
                  html += '<td class="abs""><a href="'+stl+data[i]._13+'">'+data[i]._13+' <span class="req">'+data[i]._13r+'</span></a></td>';
                } else if(data[i]._13p == 'p'){
                  html += '<td class="prst"><a href="'+stl+data[i]._13+'">'+data[i]._13+' <span class="req">'+data[i]._13r+'</span></a></td>';
                } else {
                  html += '<td><a href="'+stl+data[i]._13+'">'+data[i]._13+' <span class="req">'+data[i]._13r+'</span></a></td>';
                }
                if(isNaN(data[i]._14)){
                     html += '<td class="tc_break">'+data[i]._14+'</td>';
                } else if(data[i]._14p == 'a'){
                  html += '<td class="abs""><a href="'+stl+data[i]._14+'">'+data[i]._14+' <span class="req">'+data[i]._14r+'</span></a></td>';
                } else if(data[i]._14p == 'p'){
                  html += '<td class="prst"><a href="'+stl+data[i]._14+'">'+data[i]._14+' <span class="req">'+data[i]._14r+'</span></a></td>';
                } else {
                  html += '<td><a href="'+stl+data[i]._14+'">'+data[i]._14+' <span class="req">'+data[i]._14r+'</span></a></td>';
                }
                if(isNaN(data[i]._15)){
                     html += '<td class="tc_break">'+data[i]._15+'</td>';
                } else if(data[i]._15p == 'a'){
                  html += '<td class="abs""><a href="'+stl+data[i]._15+'">'+data[i]._15+' <span class="req">'+data[i]._15r+'</span></a></td>';                  
                } else if(data[i]._15p == 'p'){
                  html += '<td class="prst"><a href="'+stl+data[i]._15+'">'+data[i]._15+' <span class="req">'+data[i]._15r+'</span></a></td>';
                } else {
                  html += '<td><a href="'+stl+data[i]._15+'">'+data[i]._15+' <span class="req">'+data[i]._15r+'</span></a></td>';
                }
                if(isNaN(data[i]._16)){
                     html += '<td class="tc_break">'+data[i]._16+'</td>';
                } else if(data[i]._16p == 'a'){
                  html += '<td class="abs""><a href="'+stl+data[i]._16+'">'+data[i]._16+' <span class="req">'+data[i]._16r+'</span></a></td>';                  
                } else if(data[i]._16p == 'p'){
                  html += '<td class="prst"><a href="'+stl+data[i]._16+'">'+data[i]._16+' <span class="req">'+data[i]._16r+'</span></a></td>';
                } else {
                  html += '<td><a href="'+stl+data[i]._16+'">'+data[i]._16+' <span class="req">'+data[i]._16r+'</span></a></td>';
                }
                if(isNaN(data[i]._17)){
                     html += '<td class="tc_break">'+data[i]._17+'</td>';
                } else if(data[i]._17p == 'a'){
                  html += '<td class="abs""><a href="'+stl+data[i]._17+'">'+data[i]._17+' <span class="req">'+data[i]._17r+'</span></a></td>';                  
                } else if(data[i]._17p == 'p'){
                  html += '<td class="prst"><a href="'+stl+data[i]._17+'">'+data[i]._17+' <span class="req">'+data[i]._17r+'</span></a></td>';
                } else {
                  html += '<td><a href="'+stl+data[i]._17+'">'+data[i]._17+' <span class="req">'+data[i]._17r+'</span></a></td>';
                }
                if(isNaN(data[i]._18)){
                     html += '<td class="tc_break">'+data[i]._18+'</td>';
                } else if(data[i]._18p == 'a'){
                  html += '<td class="abs""><a href="'+stl+data[i]._18+'">'+data[i]._18+' <span class="req">'+data[i]._18r+'</span></a></td>';                  
                } else if(data[i]._18p == 'p'){
                  html += '<td class="prst"><a href="'+stl+data[i]._18+'">'+data[i]._18+' <span class="req">'+data[i]._18r+'</span></a></td>';
                } else {
                  html += '<td><a href="'+stl+data[i]._18+'">'+data[i]._18+' <span class="req">'+data[i]._18r+'</span></a></td>';
                }
                if(isNaN(data[i]._19)){
                     html += '<td class="tc_break">'+data[i]._19+'</td>';
                } else if(data[i]._19p == 'a'){
                  html += '<td class="abs""><a href="'+stl+data[i]._19+'">'+data[i]._19+' <span class="req">'+data[i]._19r+'</span></a></td>';                  
                } else if(data[i]._19p == 'p'){
                  html += '<td class="prst"><a href="'+stl+data[i]._19+'">'+data[i]._19+' <span class="req">'+data[i]._19r+'</span></a></td>';
                } else {
                  html += '<td><a href="'+stl+data[i]._19+'">'+data[i]._19+' <span class="req">'+data[i]._19r+'</span></a></td>';
                }
                if(isNaN(data[i]._20)){
                     html += '<td class="tc_break">'+data[i]._20+'</td>';
                } else if(data[i]._20p == 'a'){
                  html += '<td class="abs""><a href="'+stl+data[i]._20+'">'+data[i]._20+' <span class="req">'+data[i]._20r+'</span></a></td>';                  
                } else if(data[i]._20p == 'p'){
                  html += '<td class="prst"><a href="'+stl+data[i]._20+'">'+data[i]._20+' <span class="req">'+data[i]._20r+'</span></a></td>';
                } else {
                  html += '<td><a href="'+stl+data[i]._20+'">'+data[i]._20+' <span class="req">'+data[i]._20r+'</span></a></td>';
                }
                html += '</tr>';
              }
              $('#my_schedule').html(html);
              $('#schedule_header').html(schd_head);
              $.ajax({
                type : "POST",
                url : "<?php echo site_url('schedule/get_note') ;?>",
                dataType : "JSON",
                data : {d:d},
                success: function(data){
                  var html = '', i;
                  for(i=0;i<data.length;i++){
                    html += data[i].note;
                  }
                  $('#note').html(html);
                }
              });
            }
          });
        }
      });
    </script> <!-- end schedule user -->
    <?php endif;?>
    <?php if($this->session->userdata('level') == '17'): /* script spv*/?> 
    <script type="text/javascript">
      $(document).ready(function(){
        var today = $.format.date(new Date(), "yyyy-MM-dd");
        $('#mystudents').dataTable({
            "ajax" :{
              "url":"<?php echo site_url('student/student_data');?>",
              "dataSrc":""
            },
            "columns":[
              {
                "data" : {grp:"grp",pin: "pin", complete_name: "complete_name", nick_name:"nick_name", address: "address", place_of_birth: "place_of_birth", date_of_birth: "date_of_birth", phone: "phone",cnst2:"cnst2",nnst2:"nnst2",adrst2:"adrst2",pobst2:"pobst2",dobst2:"dobst2",phst2:"phst2",cnst3:"cnst3",nnst3:"nnst3",adrst3:"adrst3",pobst3:"pobst3",dobst3:"dobst3",phst3:"phst3",cnst4:"cnst4",nnst4:"nnst4",adrst4:"adrst4",pobst4:"pobst4",dobst4:"dobst4",phst4:"phst4",program: "program", program_duration: "program_duration", starting_date: "starting_date", reason: "reason", target: "target", difficulties: "difficulties", bground: "bground", self_introduction: "self_introduction", weakness_point: "weakness_point", action_plan: "action_plan", fsp: "fsp"},
                "render" : function(data,meta,row){
                  return `<a style="color:black;text-decoration:none;" href="<?php echo site_url('student_single?pin=') ;?>${data.pin}">${data.pin}</a> <a title="Edit" href="javascript:void(0);" class="item_edit tooltip-bottom" data-grp="${data.grp}" data-pn="${data.pin}" data-cn="${data.complete_name}"data-nn="${data.nick_name}" data-ad="${data.address}" data-pb="${data.place_of_birth}"data-db="${($.format.date(data.date_of_birth, "yyyy-MM-dd"))}"data-ph="${data.phone}"data-cnst2="${data.cnst2}"data-nnst2="${data.nnst2}"data-adrst2="${data.adrst2}"data-pobst2="${data.pobst2}"data-dobst2="${($.format.date(data.dobst2, "yyyy-MM-dd"))}"data-phst2="${data.phst2}"data-cnst3="${data.cnst3}"data-nnst3="${data.nnst3}"data-adrst3="${data.adrst3}"data-pobst3="${data.pobst3}"data-dobst3="${($.format.date(data.dobst3, "yyyy-MM-dd"))}"data-phst3="${data.phst3}"data-cnst4="${data.cnst4}"data-nnst4="${data.nnst4}"data-adrst4="${data.adrst4}"data-pobst4="${data.pobst4}"data-dobst4="${($.format.date(data.dobst4, "yyyy-MM-dd"))}"data-phst4="${data.phst4}"data-pr="${data.program}"data-pd="${data.program_duration}"data-sd="${($.format.date(data.starting_date, "yyyy-MM-dd"))}" data-re="${data.reason}"data-ta="${data.target}"data-di="${data.difficulties}"data-bg="${data.bground}"data-si="${data.self_introduction}"data-wp="${data.weakness_point}"data-ap="${data.action_plan}"data-fsp="${data.fsp}"><i style="font-size:14px;" class="fas fa-user-edit fa-fw"></i></a>
<a href="javascript:void(0);" data-pin="${data.pin}" class="item_delete"><i style="color:red;" class="fas fa-trash fa-fw"></i> </a>`;
                }
              }, /* pin */
              {
                "data" : {pin:"pin", grp:"grp", complete_name:"complete_name", cnst2:"cnst2", cnst3:"cnst3", cnst4:"cnst4"},
                "render":function(data,type,row){
                  if(data.grp!=''){ /* group name not empty*/
                   if(data.cnst2!=''&&data.cnst3!=''&&data.cnst4!=''){ 
                     /* 
                     either there are four, three or two students,
                     display their group name and display names as title on hover
                     */
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" class="tooltip-bottom" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3} - ${data.cnst4}"> ${data.grp} </a>`;
                     
                    } else if(data.cnst2!=''&&data.cnst3!=''){ 
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" class="tootip-bottom" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}"> ${data.grp} </a>`;
                      
                    } else{
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.complete_name} - ${data.cnst2}" class="tooltip-bottom"> ${data.grp} </a>`;
                    }
                  } else { /* group name empty */
                    if(data.cnst2!=''){/* first check if student two exist, */
                      if(data.cnst3!=''){ /* if it does, check if there are third student */
                        if(data.cnst4!=''){ /* then check the fourth one */
                          return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}-${data.cnst4}">${data.complete_name}</a>`;
                        } else { /* there are only three */
                          return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}">${data.complete_name}</a>`;
                        }
                      } else{ /* no third student */
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.complete_name} - ${data.cnst2}">${data.complete_name}</a>`;
                      }
                    } else { // only one student, show complete name.
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.complete_name}</a>`;
                    }
                  }
                }
              }, /* end complete name */
              { /* nick name */
               "data" : {pin:"pin", complete_name:"complete_name", cnst2:"cnst4", cnst3:"cnst3", cnst4:"cnst4", nick_name:"nick_name", nnst2:"nnst2", nnst3:"nnst3", nnst4:"nnst4"},
                "render" :function(data,type,row){
                  if(data.cnst2!=''){
                    if(data.cnst3!=''){
                      if(data.cnst4!=''){ /* four students */
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}"> ${data.nick_name} -${data.nick_name} - ${data.nnst2} - ${data.cnst3} - ${data.cnst4} </a>`;
                      } else { /* three students */
                        return `<a href="<?php echo site_url('student_single?pin='); ?>${data.pin}"> ${data.nick_name} - ${data.nnst2}- ${data.nnst3} </a>`;
                      }
                    }else { /* two students */
                      return `<a href="<?php echo site_url('student_single?pin=')?>${data.pin}"> ${data.nick_name} - ${data.nnst2} </a>`;
                    }
                  } else { /* only one student */
                    return `<a href="<?php echo site_url('student_single?pin=')?>${data.pin}">${data.nick_name}</a>`;
                  }
                }
              }, /* nick name */
              {
                "data" : {pin:"pin",address:"address",adrst2:"adrst2",adrst3:"adrst3",adrst4:"adrst4"},
                "render":function(data,type,row){
                  // here
                  if(data.adrst2==''){
                    return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.address}</a>`;
                  } else{
                    if(data.adrst3==''){
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.address} || ${data.adrst2}">${data.address.substr(0,15)}.....</a>`;
                    } else {
                      if (data.adrst4==''){
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.address} || ${data.adrst2} || ${data.adrst3}">${data.address.substr(0,15)}.....</a>`;
                      } else {
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.address} || ${data.adrst2} || ${ data.adrst3} || ${data.adrst4}">${data.address.substr(0,15)}.....</a>`;
                      }
                    }
                  }
                }
              }, /* address */
              {
                "data" :{pin:"pin",cnst2:"cnst2",cnst3:"cnst3",cnst4:"cnst4",date_of_birth:"date_of_birth",dobst2:"dobst2",dobst3:"dobst3",dobst4:"dobst4",},
                "render" : function (data, type, row){
                  if(data.cnst2==''){
                    return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")}`;
                  } else {
                    if(data.cnst3==''){
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")}`;
                    } else {
                      if(data.cnst4==''){
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")} - ${$.format.date(data.dobst3, "MMM/dd/yyyy")}`;
                      } else {
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")} - ${$.format.date(data.dobst3, "MMM/dd/yyyy")} - ${$.format.date(data.dobst4, "MMM/dd/yyyy")}` ;
                      }
                    }
                  }
                }
              }, /* date of birth */
              {
                "data" : {pin:"pin",phone:"phone",phst2:"phst2",phst3:"phst3",phst4:"phst4"},
                "render": function(data,type,row){
                  if(data.phst2==''){
                    return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.phone}`;
                  } else{
                    if(data.phst3==''){
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.phone} - ${data.phst2}`;
                    } else {
                      if(data.phst4==''){
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.phone} - ${data.phst2} - ${data.phst3}`;
                      } else {
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.phone} - ${data.phst2} - ${data.phst3} -${data.phst4}`;
                      }
                    }
                  }
                }
              }, /* phone */
              {
                "data" : {pin:"pin", program:"program"},
                "render" : function(data, meta, row){
                  return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.program}</a>`
                }
              }, /* program */
              {
                "data" : {pin:"pin", starting_date:"starting_date"},
                "render" : function (data, type, row){
                  //return `<a href="<?php echo site_url('student_single?pin=');?>${$.format.date(data, "MMM/dd/yyyy")}`;
                  return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.starting_date, "MMM/dd/yyyy")}</a>`;
                }
              }, /* starting date */
              {
                "data" : {pin:"pin", bground:"bground"},
                "render" : function (data, type, row, meta){
                  if(data.length>20){
                    return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.bground}">${data.bground.substr(0,15)}...</a>`;
                  } else {
                    return `<a href="<?php echo site_url('student_single?pin='); ?>${data.pin}">${data.bground}</a>`
                  }
                }
              }
            ]
          });
        $('#show_data').on('click', '.item_delete', function(){
             var pin = $(this).data('pin');
             $('#pin_delete').val(pin);
             $('#delete_student_modal').modal('show');
          });
        $('#btn_delete_student').on('click', function(){
             var pin = $('#pin_delete').val();
             $.ajax({
                type: "post",
                url: "<?php echo site_url('student/delete_student');?>",
                dataType : "json",
                data : {pin: pin},
                success : function(data){
                    
                    $('#mystudents').DataTable().ajax.reload();
                    $('#myaft').DataTable().ajax.reload();
                    $('#delete_student_modal').modal('hide');
                }
             });
          });
         $('#myaft').dataTable({
          "ajax" : {
            "url" :"<?php echo site_url('student/after_teaching_data')?>",
            "dataSrc" : ""
          },
        "columns" : 
          [
            {
                "data" : "pin",
                "render" : function(data, meta, row){
                  return `<a href="<?php echo site_url('student_single?pin=');?>${data}">${data}</a>`
                }
            }, /* pin */
     
            {
                "data" : {pin:"pin",grp:"grp",complete_name:"complete_name",cnst2:"cnst2",cnst3:"cnst3",cnst4:"cnst4"},
                "render":function(data,type,row){
                  if(data.grp!=''){
                   if(data.cnst2!=''&&data.cnst3!=''&&data.cnst4!=''){
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" class="tooltip-bottom" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3} - ${data.cnst4}">${data.grp}</a>`;
                    } else if(data.cnst2!=''&&data.cnst3!=''){
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" class="tootip-bottom" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}">${data.grp}</a>`;
                    } else{
                      return `<a title="${data.complete_name} - ${data.cnst2}" class="tooltip-bottom" href="<?php echo site_url('student_single?pin=');?>${data.pin}"> ${data.grp}</a>`;
                    }
                  } else {
                    if(data.cnst2!=''){
                      if(data.cnst3!=''){
                        if(data.cnst4!=''){
                          return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}-${data.cnst4}">${data.complete_name}</a>`;
                        } else {
                          return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}">${data.complete_name}</a>`;
                        }
                      } else{
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.complete_name} - ${data.cnst2}">${data.complete_name}</a>`;
                      }
                    } else {
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.complete_name}</a>`;
                    }
                  }
                }
              }, /* complete name */
             { /* nick name */
               "data" : {pin:"pin", complete_name:"complete_name", cnst2:"cnst4", cnst3:"cnst3", cnst4:"cnst4", nick_name:"nick_name", nnst2:"nnst2", nnst3:"nnst3", nnst4:"nnst4"},
                "render" :function(data,type,row){
                  if(data.cnst2!=''){
                    if(data.cnst3!=''){
                      if(data.cnst4!=''){ /* four students */
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}"> ${data.nick_name} -${data.nick_name} - ${data.nnst2} - ${data.cnst3} - ${data.cnst4} </a>`;
                      } else { /* three students */
                        return `<a href="<?php echo site_url('student_single?pin='); ?>${data.pin}"> ${data.nick_name} - ${data.nnst2}- ${data.nnst3} </a>`;
                      }
                    }else { /* two students */
                      return `<a href="<?php echo site_url('student_single?pin=')?>${data.pin}"> ${data.nick_name} - ${data.nnst2} </a>`;
                    }
                  } else { /* only one student */
                    return `<a href="<?php echo site_url('student_single?pin=')?>${data.pin}">${data.nick_name}</a>`;
                  }
                }
              }, /* nick name */
           
            {
                "data" : {pin:"pin",address:"address",adrst2:"adrst2",adrst3:"adrst3",adrst4:"adrst4"},
                "render":function(data,type,row){
                  // here
                  if(data.adrst2==''){
                    return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.address}</a>`;
                  } else{
                    if(data.adrst3==''){
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.address} || ${data.adrst2}">${data.address.substr(0,15)}.....</a>`;
                    } else {
                      if (data.adrst4==''){
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.address} || ${data.adrst2} || ${data.adrst3}">${data.address.substr(0,15)}.....</a>`;
                      } else {
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.address} || ${data.adrst2} || ${ data.adrst3} || ${data.adrst4}">${data.address.substr(0,15)}.....</a>`;
                      }
                    }
                  }
                }
              }, /* address */
            {
                "data" :{pin:"pin",cnst2:"cnst2",cnst3:"cnst3",cnst4:"cnst4",date_of_birth:"date_of_birth",dobst2:"dobst2",dobst3:"dobst3",dobst4:"dobst4",},
                "render" : function (data, type, row){
                 // here
                  if(data.cnst2==''){
                    return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")}`;
                  } else {
                    if(data.cnst3==''){
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")}`;
                    } else {
                      if(data.cnst4==''){
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")} - ${$.format.date(data.dobst3, "MMM/dd/yyyy")}`;
                      } else {
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")} - ${$.format.date(data.dobst3, "MMM/dd/yyyy")} - ${$.format.date(data.dobst4, "MMM/dd/yyyy")}` ;
                      }
                    }
                  }
                }
              }, /* date of birth */
          
            {
                "data" : {pin:"pin",phone:"phone",phst2:"phst2",phst3:"phst3",phst4:"phst4"},
                "render": function(data,type,row){
                  // here
                  if(data.phst2==''){
                    return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.phone}`;
                  } else{
                    if(data.phst3==''){
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.phone} - ${data.phst2}`;
                    } else {
                      if(data.phst4==''){
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.phone} - ${data.phst2} - ${data.phst3}`;
                      } else {
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.phone} - ${data.phst2} - ${data.phst3} -${data.phst4}`;
                      }
                    }
                  }
                }
              }, /* phone */
         
            {
                "data" : {pin:"pin", program:"program"},
                "render" : function(data, meta, row){
                  return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.program}</a>`
                }
              }, /* program */
           
            {
                "data" : {pin:"pin", starting_date:"starting_date"},
                "render" : function (data, type, row){
                  return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.starting_date, "MMM/dd/yyyy")}</a>`;
                }
              }, /* starting date */
            {
                "data" : {pin:"pin", bground:"bground"},
                "render" : function (data, type, row, meta){
                  if(data.length>20){
                    return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.bground}">${data.bground.substr(0,15)}...</a>`;
                  } else {
                    return `<a href="<?php echo site_url('student_single?pin='); ?>${data.pin}">${data.bground}</a>`
                  }
                
                }
              }
          
            ]  
        });
        $('#new_student_button').on('click', function(){
          $('#nsm').modal('show');
          $('[name="starting_date"]').val(today);
          $('#add_one').on('click',function(){
            $('#group_name,#student2').fadeIn('slow');
            $('#remove_three').on('click', function(){
              $('#group_name,#student2,#student3,#student4').fadeOut('slow');
               $('#cnst2,#nnst2,#adrst2,#pbst2,#dbst2,#phst2,#cnst3,#nnst3,#adrst3,#pbst3,#dbst3,#phst3,#cnst4,#nnst4,#adrst4,#pbst4,#dbst4,#phst4').val("");
            });
            $('#add_two').on('click',function(){
              $('#student3').fadeIn('slow');
              $('#remove_two').on('click', function(){
                $('#student3,#student4').fadeOut('slow');
              });
              $('#add_three').on('click', function(){
                $('#student4').fadeIn('slow');
                $('#remove_one').on('click', function(){
                  $('#student4').fadeOut('slow');
                });
              });
            })
          });
        });
        $('input, select, textarea').on('focus', function(){
          $(this).css('background-color', 'white');
          $('#nsf, #esf').removeClass("alert alert-danger");
          $('#nsf, #esf').html("");
        });
        $('#save_student_btn').on('click',function(){
          var bck = 'background-color',
              clr ='#fbe2e6',
              grp = $('#grp').val(),
              pn=$('#pn').val(),
              cn=$('#cn').val(),
              nn=$('#nn').val(),
              ad=$('#ad').val(),
              pb=$('#pb').val(),
              db=$('#db').val(),
              ph=$('#ph').val(),
              cn2=$('#cnst2').val(),
              nn2=$('#nnst2').val(),
              ad2=$('#adrst2').val(),
              pb2=$('#pbst2').val(),
              db2=$('#dbst2').val(),
              ph2=$('#phst2').val(),
              cn3=$('#cnst3').val(),
              nn3=$('#nnst3').val(),
              ad3=$('#adrst3').val(),
              pb3=$('#pbst3').val(),
              db3=$('#dbst3').val(),
              ph3=$('#phst3').val(),
              cn4=$('#cnst4').val(),
              nn4=$('#nnst4').val(),
              ad4=$('#adrst4').val(),
              pb4=$('#pbst4').val(),
              db4=$('#dbst4').val(),
              ph4=$('#phst4').val(),
              pr=$('#pr').val(),
              pd=$('#pd').val(),
              sd=$('#sd').val(),
              re=$('#re').val(),
              ta=$('#ta').val(),
              di=$('#di').val(),
              bg=$('#bg').val(),
              si=$('#si').val(),
              wp=$('#wp').val(),
              ap=$('#ap').val();
          if (pn==''|| cn==''||ad==''||db==''||ph==''||pr==''||pd==''){
            $('#nsf').addClass('alert alert-danger'); 
            $('#nsf').html('Please fill out all required fields'); 
            if (pn=='') {$('#pn').css(bck, clr);}
            if (cn=='') {$('#cn').css(bck, clr);}
            if(ad==''){$('#ad').css(bck, clr);}
            if (db==''){$('#db').css(bck, clr);}
            if (ph==''){$('#ph').css(bck, clr);}
            if(pr==''){$('#pr').css(bck, clr);}
            if (pd=='') {
              $('#pd').css(bck, clr);
            }
          }else{
            if (isNaN(pn)){
              $('#nsf').addClass('alert alert-danger'); 
              $('#nsf').html('pin can only consist of number'); 
              $('#pn').css(bck, clr);
            }else{
              if (isNaN(ph)){
                $('#nsf').addClass('alert alert-danger'); 
                $('#nsf').html('phone can only consist of number'); 
                $('#ph').css(bck, clr);
              }else{
                if (isNaN(pd)){
                  $('#nsf').addClass('alert alert-danger');
                  $('#nsf').html('Program duration only consist of number'); 
                  $('#pd').css(bck, clr);
                } else {
                  if ($('#student2').css('display')==='block'){
                    if(cn2 == ''||ad2==''||db2==''||ph2==''){ 
                      $('#nsf').addClass('alert alert-danger');
                      $('#nsf').html('Please fill out all required fields');
                      if(cn2==''){$('#cnst2').css(bck,clr);}
                      if(ad2==''){$('#adrst2').css(bck,clr);}
                      if(db2==''){$('#dbst2').css(bck,clr);}
                      if(ph2==''){$('#phst2').css(bck,clr);}
                    } else {
                      if(isNaN(ph2)){
                        $('#nsf').addClass('alert alert-danger');
                        $('#nsf').html('Phone must only be numbers');
                        $('#phst2').css(bck,clr);
                      } else {
                        if($('#student3').css('display')==='block'){
                          if(cn3 == ''||ad3==''||db3==''||ph3==''){
                            $('#nsf').addClass('alert alert-danger');
                            $('#nsf').html('Please fill out all required fields');
                            if(cn3==''){$('#cnst3').css(bck,clr);}
                            if(ad3==''){$('#adrst3').css(bck,clr);}
                            if(db3==''){$('#dbst3').css(bck,clr);}
                            if(ph3==''){$('#phst3').css(bck,clr);}
                          } else {
                            if(isNaN(ph3)){
                              $('#nsf').addClass('alert alert-danger');
                              $('#nsf').html('Phone must only be numbers');
                              $('#phst3').css(bck,clr);
                            } else{
                              if($('#student4').css('display')==='block'){
                                if(cn4 == ''||ad4==''||db4==''||ph4==''){
                                  $('#nsf').addClass('alert alert-danger');
                                  $('#nsf').html('Please fill out all required fields');
                                  if(cn4==''){$('#cnst4').css(bck,clr);}
                                  if(ad4==''){$('#adrst4').css(bck,clr);}
                                  if(db4==''){$('#dbst4').css(bck,clr);}
                                  if(ph4==''){$('#phst4').css(bck,clr);}
                                } else {
                                  if(isNaN(ph4)){
                                    $('#nsf').addClass('alert alert-danger');
                                    $('#nsf').html('Phone must only be numbers');
                                    $('#phst4').css(bck,clr);
                                  } else{
                                    check_pin(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap);
                                    }
                                }
                              } else {
                                cn4=nn4=ad4=pb4=db4=ph4='';
                                check_pin(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap);
                              }
                            }
                          }
                        } else{
                          cn3=nn3=ad3=pb3=db3=ph3=cn4=nn4=ad4=pb4=db4=ph4='';
                          check_pin(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap);
                        }
                      }
                    }
                  } else{
                    cn2=nn2=ad2=pb2=db2=ph2=cn3=nn3=ad3=pb3=db3=ph3=cn4=nn4=ad4=pb4=db4=ph4='';
                    check_pin(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap);
                  }
                }
              }
            }
          }
          return false;
        });
        function check_pin(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap){
          var bck = 'background-color',
              clr ='#fbe2e6';
          $.ajax({
            url: '<?php echo  site_url('student/pin_availability')?>', 
            type: 'post', 
            data:{pin:pn}, 
            success: function(response){
              if (response=='true' ){
                $('#nsf').addClass('alert alert-danger'); 
                $('#nsf').html('pin is already used');
                $('#pn').css(bck, clr);
              }else{
               submit_student(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap);
              }
            }
          });
        }
        function submit_student(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap){
          $.ajax({
            type : "POST", 
            url : "<?php echo site_url('student/save')?>", 
            dataType : "JSON", 
            data:{grp:grp,pn:pn,cn:cn,nn:nn,ad:ad,pb:pb,db:db,ph:ph,cn2:cn2,nn2:nn2,ad2:ad2,pb2:pb2,db2:db2,ph2:ph2,cn3:cn3,nn3:nn3,ad3:ad3,pb3:pb3,db3:db3,ph3:ph3,cn4:cn4,nn4:nn4,ad4:ad4,pb4:pb4,db4:db4,ph4:ph4,pr:pr,pd:pd,sd:sd,re:re,ta:ta,di:di,bg:bg,si:si,we:wp,ap:ap},
            success: function(data){
              $('[name="pn"]').val(""); 
              $('[name="cn"]').val(""); 
              $('[name="nn"]').val(""); 
              $('[name="ad"]').val(""); 
              $('[name="pb"]').val(""); 
              $('[name="db"]').val(""); 
              $('[name="ph"]').val(""); 
              $('[name="pr"]').val(""); 
              $('[name="pd"]').val(""); 
              $('[name="sd"]').val(today);
              $('[name="re"]').val(""); 
              $('[name="ta"]').val(""); 
              $('[name="di"]').val(""); 
              $('[name="bg"]').val(""); 
              $('[name="si"]').val("");
              $('[name="wp"]').val("");
              $('[name="ap"]').val(""); 
              $('#nsm').modal('hide');
              $('#mystudents').DataTable().ajax.reload();
            }
          });
        }
        $('#show_data').on('click','.item_edit',function(){
          var grp=$(this).data('grp'),
              pn=$(this).data('pn'),
              cn=$(this).data('cn'),
              nn=$(this).data('nn'),
              ad=$(this).data('ad'),
              pb=$(this).data('pb'),
              db=$(this).data('db'),
              ph=$(this).data('ph'),
              cnst2=$(this).data('cnst2'),
              nnst2=$(this).data('nnst2'),
              adrst2=$(this).data('adrst2'),
              pobst2=$(this).data('pobst2'),
              dobst2=$(this).data('dobst2'),
              phst2=$(this).data('phst2'),
              cnst3=$(this).data('cnst3'),
              nnst3=$(this).data('nnst3'),
              adrst3=$(this).data('adrst3'),
              pobst3=$(this).data('pobst3'),
              dobst3=$(this).data('dobst3'),
              phst3=$(this).data('phst3'),
              cnst4=$(this).data('cnst4'),
              nnst4=$(this).data('nnst4'),
              adrst4=$(this).data('adrst4'),
              pobst4=$(this).data('pobst4'),
              dobst4=$(this).data('dobst4'),
              phst4=$(this).data('phst4'),
              pr=$(this).data('pr'),
              pd=$(this).data('pd'),
              sd=$(this).data('sd'),
              re=$(this).data('re'),
              ta=$(this).data('ta'), 
              di=$(this).data('di'),
              bg=$(this).data('bg'),
              si=$(this).data('si'),
              wp=$(this).data('wp'),
              ap=$(this).data('ap'),
              fsp = $(this).data('fsp'),
              fsp_button = '<input type="checkbox" name="fsp" id="fsp"' ;
          $('#esm').modal('show');
          $('[name="pn_e"]').val(pn);
          $('[name="cn_e"]').val(cn);
          $('[name="nn_e"]').val(nn);
          $('[name="ad_e"]').val(ad);
          $('[name="pb_e"]').val(pb);
          $('[name="db_e"]').val(db);
          $('[name="ph_e"]').val(ph);
          $('[name="grp_e"]').val(grp);
          $('[name="cnst2_e"]').val(cnst2);
          $('[name="nnst2_e"]').val(nnst2);
          $('[name="adrst2_e"]').val(adrst2);
          $('[name="pbst2_e"]').val(pobst2);
          $('[name="dbst2_e"]').val(dobst2);
          $('[name="phst2_e"]').val(phst2);
          $('[name="cnst3_e"]').val(cnst3);
          $('[name="nnst3_e"]').val(nnst3);
          $('[name="adrst3_e"]').val(adrst3);
          $('[name="pbst3_e"]').val(pobst3);
          $('[name="dbst3_e"]').val(dobst3);
          $('[name="phst3_e"]').val(phst3);
          $('[name="cnst4_e"]').val(cnst4);
          $('[name="nnst4_e"]').val(nnst4);
          $('[name="adrst4_e"]').val(adrst4);
          $('[name="pbst4_e"]').val(pobst4);
          $('[name="dbst4_e"]').val(dobst4);
          $('[name="phst4_e"]').val(phst4);
          $('[name="pr2"]').val(pr);
          $('[name="pd2"]').val(pd);
          $('[name="sd2"]').val(sd);
          $('[name="re2"]').val(re);
          $('[name="ta2"]').val(ta);
          $('[name="di2"]').val(di);
          $('[name="bg2"]').val(bg);
          $('[name="si2"]').val(si);
          $('[name="wp2"]').val(wp);
          $('[name="ap2"]').val(ap);
          if(cnst2==''){
            $('#group_name_e,#student2_e,#student3_e,#student4_e').css('display', 'none');
          } else {
            if(cnst3==''){ /*two students*/
              $('#group_name_e,#student2_e').css('display', 'block');
              $('#student3_e,#student4_e').css('display', 'none');
            } else {
              if(cnst4 == ''){ /*three students*/
                $('#group_name_e,#student2_e,#student3_e').css('display', 'block');
                $('#student4_e').css('display','none');       
              } else{
                $('#group_name_e,#student2_e,#student3_e,#student4_e').css('display', 'block'); 
              }
            }
          }
          $('#add_one_e').on('click',function(){
            $('#group_name_e,#student2_e').fadeIn('slow');
            $('#group_name_e,#student2_e').css('display', 'block'); 
          });
          $('#add_two_e').on('click', function(){
            $('#student3_e').fadeIn('slow');
            $('#student3_e').css('display','block');
          });
          $('#remove_three_e').on('click',function(){
            $('#group_name_e,#student2_e,#student3_e,#student4_e').fadeOut('fast');
          });
          $('#add_three_e').on('click', function(){
            $('#student4_e').fadeIn('slow');
            $('#student4_e').css('display', 'block');
          });
          $('#remove_two_e').on('click', function(){
            $('#student3_e,#student4_e').fadeOut('fast');
          });
          $('#remove_one_e').on('click', function(){
            $('#student4_e').fadeOut('fast');
          });
          if (fsp == 'yes'){
            fsp_button += 'checked disabled> <label for="fsp">Final Speaking Performance</label>';
          } else {
            fsp_button += '> <label for="fsp">Final Speaking Performance</label>';
          }
          $('#fsp_button').html(fsp_button);
        });
        $('#update_student_btn').on('click', function(){
        var bck = 'background-color',clr = '#fbe2e6',
            pn=$('#pn_e').val(),
            cn=$('#cn_e').val(),nn=$('#nn_e').val(),ad=$('#ad_e').val(),pb=$('#pb_e').val(),db=$('#db_e').val(),ph=$('#ph_e').val(),
            grp=$('#grp_e').val(),
            
            cn2=$('#cnst2_e').val(),nn2=$('#nnst2_e').val(),ad2=$('#adrst2_e').val(),pb2=$('#pbst2_e').val(),          db2=$('#dbst2_e').val(),ph2=$('#phst2_e').val(),
            cn3=$('#cnst3_e').val(),nn3=$('#nnst3_e').val(),
          ad3=$('#adrst3_e').val(),pb3=$('#pbst3_e').val(),
          db3=$('#dbst3_e').val(),ph3=$('#phst3_e').val(),
          cn4=$('#cnst4_e').val(),nn4=$('#nnst4_e').val(),
          ad4=$('#adrst4_e').val(),pb4=$('#pbst4_e').val(),
          db4=$('#dbst4_e').val(),ph4=$('#phst4_e').val(),
          pr=$('#pr2').val(),pd=$('#pd2').val(),
          sd=$('#sd2').val(),re=$('#re2').val(),
          ta=$('#ta2').val(),di=$('#di2').val(),
          bg=$('#bg2').val(),si=$('#si2').val(),
          wp=$('#wp2').val(),ap=$('#ap2').val(),
            fsp='';
        if ($('#fsp').is(':checked')){fsp='yes';}else{fsp='';}
        if(cn==''|| ad==''|| db==''|| ph==''|| pr==''|| pd==''){ 
          $('#esf').addClass('alert alert-danger');
          $('#esf').html('Please fill out all required fields');
          if(cn==''){$('#cn_e').css(bck, clr);}
          if(ad==''){$('#ad_e').css(bck, clr);}
          if(db==''){$('#db_e').css(bck, clr);}
          if(ph==''){$('#ph_e').css(bck, clr);}
          if(pr==''){$('#pr_e').css(bck, clr);}
          if(pd==''){$('#pd_e').css(bck, clr);}
        } else { 
          if(isNaN(ph)){ 
            $('#esf').addClass('alert alert-danger');
            $('#esf').html('Phone must only be number!');
            $('#ph_e').css(bck, clr);
          } else { 
            if(isNaN(pd)){ 
              $('#esf').addClass('alert alert-danger');
              $('#esf').html('Program duration must only be number!');
              $('#pd_e').css(bck, clr);
            } else { 
              if($('#student2_e').css('display')==='block'){ 
                if(cn2==''||ad2==''||db2==''||ph2==''){
                  $('#esf').addClass('alert alert-danger');
                  $('#esf').html('Please fill out all required fields!');
                  if(cn2==''){
                    $('#cnst2_e').css(bck,clr);
                  }
                  if(ad2==''){
                    $('#adrst2_e').css(bck,clr);
                  }
                  if(db2==''){
                    $('#dbst2_e').css(bck,clr);
                  }
                  if(ph2==''){
                    $('#phst2_e').css(bck,clr);
                  }
                } else{ 
                  if(isNaN(ph2)){
                    $('#esf').addClass('alert alert-danger');
                    $('#esf').html('Phone must only be number!');
                    $('#phst2_e').css(bck,clr);
                  } else{ 
                    if($('#student3_e').css('display')==='block'){
                      if(cn3==''||ad3==''||db3==''||ph3==''){ 
                        $('#esf').addClass('alert alert-danger');
                        $('#esf').html('Please fill out all required fields!');
                        if(cn3==''){
                          $('#cnst3_e').css(bck,clr);
                        }
                        if(ad3==''){
                          $('#adrst3_e').css(bck,clr);
                        }
                        if(db3==''){
                          $('#dbst3_e').css(bck,clr);
                        }
                        if(ph3==''){
                          $('#phst3_e').css(bck,clr);
                        }
                      } else{ 
                        if(isNaN(ph3)){
                          $('#esf').addClass('alert alert-danger');
                          $('#esf').html('Phone must only be number!');
                          $('#phst3_e').css(bck,clr);
                        } else{ 
                          if($('#student4_e').css('display')==='block'){ 
                            if(cn4==''||ad4==''||db4==""||ph4==''){ 
                              $('#esf').addClass('alert alert-danger');
                              $('#esf').html('Please fill out all required fields!');
                              if(cn4==''){
                                $('#cnst4_e').css(bck,clr);
                              }
                              if(ad4==''){
                                $('#adrst4_e').css(bck,clr);
                              }
                              if(db4==''){
                                $('#dbst4_e').css(bck,clr);
                              }
                              if(ph4==''){
                                $('#phst4_e').css(bck,clr);
                              }
                            } else { 
                              if(isNaN(ph4)){ 
                                $('#esf').addClass('alert alert-danger');
                                $('#esf').html('Phone must only be number!');
                                $('#phst4_e').css(bck,clr);
                              } else { 
                                update_student(pn,cn,nn,ad,pb,db,ph,grp,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap,fsp);
                              }
                            }
                          } else { 
                            cn4 = nn4 = pb4 = ad4 = ph4 = db4 = '';
                           update_student(pn,cn,nn,ad,pb,db,ph,grp,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap,fsp);
                          } 
                        }
                      }
                    } else { 
                      cn3=nn3=pb3=ad3=ph3=db3=cn4=nn4=pb4=ad4=ph4=db4='';
                     update_student(pn,cn,nn,ad,pb,db,ph,grp,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap,fsp);
                    }
                  }
                }
              } else { 
                cn2=nn2=pb2=ad2=ph2=db2=cn3=nn3=pb3=ad3=ph3=db3=cn4=nn4=pb4=ad4=ph4=db4='';
               update_student(pn,cn,nn,ad,pb,db,ph,grp,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap,fsp);
              }
            }
          }
        }
      });
        function update_student(pn, cn, nn, ad, pb, db, ph, grp,cn2,nn2,ad2,pb2,db2,ph2, cn3, nn3, ad3, pb3, db3, ph3, cn4, nn4, ad4, pb4, db4, ph4, pr, pd, sd,re,ta,di,bg,si,wp,ap,fsp) {
          $.ajax({
            type : "post",
            url: "<?php echo site_url('student/update');?>",
            dataType : "json",
            data : {pn:pn,cn:cn,nn:nn,ad:ad,pb:pb,db:db,ph:ph,grp,cn2:cn2,nn2:nn2,ad2:ad2,pb2:pb2,db2:db2,ph2:ph2,cn3:cn3,nn3:nn3,ad3:ad3,pb3:pb3,db3:db3,ph3:ph3,cn4:cn4,nn4:nn4,ad4:ad4,pb4:pb4,db4:db4,ph4:ph4,pr:pr,pd:pd,sd:sd,re:re,ta:ta,di:di,bg:bg,si:si,wp:wp,ap:ap,fsp:fsp},
            success : function(data){
              $('#esm').modal('hide');
              $('#mystudents').DataTable().ajax.reload();
            }
          });
        }
      }); 
    </script> 
    <?php else: /* script user */?>
    <script type="text/javascript">
      $(document).ready(function(){
        var today = $.format.date(new Date(), "yyyy-MM-dd");
        $('#mystudents').dataTable({
            "ajax" :{
              "url":"<?php echo site_url('student/student_data');?>",
              "dataSrc":""
            },
            "columns":[
              {
                "data" : {grp:"grp",pin: "pin", complete_name: "complete_name", nick_name:"nick_name", address: "address", place_of_birth: "place_of_birth", date_of_birth: "date_of_birth", phone: "phone",cnst2:"cnst2",nnst2:"nnst2",adrst2:"adrst2",pobst2:"pobst2",dobst2:"dobst2",phst2:"phst2",cnst3:"cnst3",nnst3:"nnst3",adrst3:"adrst3",pobst3:"pobst3",dobst3:"dobst3",phst3:"phst3",cnst4:"cnst4",nnst4:"nnst4",adrst4:"adrst4",pobst4:"pobst4",dobst4:"dobst4",phst4:"phst4",program: "program", program_duration: "program_duration", starting_date: "starting_date", reason: "reason", target: "target", difficulties: "difficulties", bground: "bground", self_introduction: "self_introduction", weakness_point: "weakness_point", action_plan: "action_plan", fsp: "fsp"},
                "render" : function(data,meta,row){
                  return `<a style="color:black;text-decoration:none;" href="<?php echo site_url('student_single?pin=') ;?>${data.pin}">${data.pin}</a> <a title="Edit" href="javascript:void(0);" class="item_edit tooltip-bottom" data-grp="${data.grp}" data-pn="${data.pin}" data-cn="${data.complete_name}"data-nn="${data.nick_name}" data-ad="${data.address}" data-pb="${data.place_of_birth}"data-db="${($.format.date(data.date_of_birth, "yyyy-MM-dd"))}"data-ph="${data.phone}"data-cnst2="${data.cnst2}"data-nnst2="${data.nnst2}"data-adrst2="${data.adrst2}"data-pobst2="${data.pobst2}"data-dobst2="${($.format.date(data.dobst2, "yyyy-MM-dd"))}"data-phst2="${data.phst2}"data-cnst3="${data.cnst3}"data-nnst3="${data.nnst3}"data-adrst3="${data.adrst3}"data-pobst3="${data.pobst3}"data-dobst3="${($.format.date(data.dobst3, "yyyy-MM-dd"))}"data-phst3="${data.phst3}"data-cnst4="${data.cnst4}"data-nnst4="${data.nnst4}"data-adrst4="${data.adrst4}"data-pobst4="${data.pobst4}"data-dobst4="${($.format.date(data.dobst4, "yyyy-MM-dd"))}"data-phst4="${data.phst4}"data-pr="${data.program}"data-pd="${data.program_duration}"data-sd="${($.format.date(data.starting_date, "yyyy-MM-dd"))}" data-re="${data.reason}"data-ta="${data.target}"data-di="${data.difficulties}"data-bg="${data.bground}"data-si="${data.self_introduction}"data-wp="${data.weakness_point}"data-ap="${data.action_plan}"data-fsp="${data.fsp}"><i style="font-size:14px;" class="fas fa-user-edit fa-fw"></i></a>`;
                }
              }, /* pin */
              {
                "data" : {pin:"pin", grp:"grp", complete_name:"complete_name", cnst2:"cnst2", cnst3:"cnst3", cnst4:"cnst4"},
                "render":function(data,type,row){
                  if(data.grp!=''){ /* group name not empty*/
                   if(data.cnst2!=''&&data.cnst3!=''&&data.cnst4!=''){ 
                     /* 
                     either there are four, three or two students,
                     display their group name and display names as title on hover
                     */
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" class="tooltip-bottom" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3} - ${data.cnst4}"> ${data.grp} </a>`;
                     
                    } else if(data.cnst2!=''&&data.cnst3!=''){ 
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" class="tootip-bottom" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}"> ${data.grp} </a>`;
                      
                    } else{
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.complete_name} - ${data.cnst2}" class="tooltip-bottom"> ${data.grp} </a>`;
                    }
                  } else { /* group name empty */
                    if(data.cnst2!=''){/* first check if student two exist, */
                      if(data.cnst3!=''){ /* if it does, check if there are third student */
                        if(data.cnst4!=''){ /* then check the fourth one */
                          return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}-${data.cnst4}">${data.complete_name}</a>`;
                        } else { /* there are only three */
                          return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}">${data.complete_name}</a>`;
                        }
                      } else{ /* no third student */
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.complete_name} - ${data.cnst2}">${data.complete_name}</a>`;
                      }
                    } else { // only one student, show complete name.
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.complete_name}</a>`;
                    }
                  }
                }
              }, /* end complete name */
              { /* nick name */
               "data" : {pin:"pin", complete_name:"complete_name", cnst2:"cnst4", cnst3:"cnst3", cnst4:"cnst4", nick_name:"nick_name", nnst2:"nnst2", nnst3:"nnst3", nnst4:"nnst4"},
                "render" :function(data,type,row){
                  if(data.cnst2!=''){
                    if(data.cnst3!=''){
                      if(data.cnst4!=''){ /* four students */
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}"> ${data.nick_name} -${data.nick_name} - ${data.nnst2} - ${data.cnst3} - ${data.cnst4} </a>`;
                      } else { /* three students */
                        return `<a href="<?php echo site_url('student_single?pin='); ?>${data.pin}"> ${data.nick_name} - ${data.nnst2}- ${data.nnst3} </a>`;
                      }
                    }else { /* two students */
                      return `<a href="<?php echo site_url('student_single?pin=')?>${data.pin}"> ${data.nick_name} - ${data.nnst2} </a>`;
                    }
                  } else { /* only one student */
                    return `<a href="<?php echo site_url('student_single?pin=')?>${data.pin}">${data.nick_name}</a>`;
                  }
                }
              }, /* nick name */
              {
                "data" : {pin:"pin",address:"address",adrst2:"adrst2",adrst3:"adrst3",adrst4:"adrst4"},
                "render":function(data,type,row){
                  // here
                  if(data.adrst2==''){
                    return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.address}</a>`;
                  } else{
                    if(data.adrst3==''){
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.address} || ${data.adrst2}">${data.address.substr(0,15)}.....</a>`;
                    } else {
                      if (data.adrst4==''){
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.address} || ${data.adrst2} || ${data.adrst3}">${data.address.substr(0,15)}.....</a>`;
                      } else {
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.address} || ${data.adrst2} || ${ data.adrst3} || ${data.adrst4}">${data.address.substr(0,15)}.....</a>`;
                      }
                    }
                  }
                }
              }, /* address */
              {
                "data" :{pin:"pin",cnst2:"cnst2",cnst3:"cnst3",cnst4:"cnst4",date_of_birth:"date_of_birth",dobst2:"dobst2",dobst3:"dobst3",dobst4:"dobst4",},
                "render" : function (data, type, row){
                  if(data.cnst2==''){
                    return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")}`;
                  } else {
                    if(data.cnst3==''){
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")}`;
                    } else {
                      if(data.cnst4==''){
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")} - ${$.format.date(data.dobst3, "MMM/dd/yyyy")}`;
                      } else {
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")} - ${$.format.date(data.dobst3, "MMM/dd/yyyy")} - ${$.format.date(data.dobst4, "MMM/dd/yyyy")}` ;
                      }
                    }
                  }
                }
              }, /* date of birth */
              {
                "data" : {pin:"pin",phone:"phone",phst2:"phst2",phst3:"phst3",phst4:"phst4"},
                "render": function(data,type,row){
                  if(data.phst2==''){
                    return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.phone}`;
                  } else{
                    if(data.phst3==''){
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.phone} - ${data.phst2}`;
                    } else {
                      if(data.phst4==''){
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.phone} - ${data.phst2} - ${data.phst3}`;
                      } else {
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.phone} - ${data.phst2} - ${data.phst3} -${data.phst4}`;
                      }
                    }
                  }
                }
              }, /* phone */
              {
                "data" : {pin:"pin", program:"program"},
                "render" : function(data, meta, row){
                  return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.program}</a>`
                }
              }, /* program */
              {
                "data" : {pin:"pin", starting_date:"starting_date"},
                "render" : function (data, type, row){
                  //return `<a href="<?php echo site_url('student_single?pin=');?>${$.format.date(data, "MMM/dd/yyyy")}`;
                  return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.starting_date, "MMM/dd/yyyy")}</a>`;
                }
              }, /* starting date */
              {
                "data" : {pin:"pin", bground:"bground"},
                "render" : function (data, type, row, meta){
                  if(data.length>20){
                    return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.bground}">${data.bground.substr(0,15)}...</a>`;
                  } else {
                    return `<a href="<?php echo site_url('student_single?pin='); ?>${data.pin}">${data.bground}</a>`
                  }
                }
              }
            ]
          });
        $('#myaft').dataTable({
          "ajax" : {
            "url" :"<?php echo site_url('student/after_teaching_data')?>",
            "dataSrc" : ""
          },
        "columns" : 
          [
            {
                "data" : "pin",
                "render" : function(data, meta, row){
                  return `<a href="<?php echo site_url('student_single?pin=');?>${data}">${data}</a>`
                }
            }, /* pin */
     
            {
                "data" : {pin:"pin",grp:"grp",complete_name:"complete_name",cnst2:"cnst2",cnst3:"cnst3",cnst4:"cnst4"},
                "render":function(data,type,row){
                  if(data.grp!=''){
                   if(data.cnst2!=''&&data.cnst3!=''&&data.cnst4!=''){
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" class="tooltip-bottom" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3} - ${data.cnst4}">${data.grp}</a>`;
                    } else if(data.cnst2!=''&&data.cnst3!=''){
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" class="tootip-bottom" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}">${data.grp}</a>`;
                    } else{
                      return `<a title="${data.complete_name} - ${data.cnst2}" class="tooltip-bottom" href="<?php echo site_url('student_single?pin=');?>${data.pin}"> ${data.grp}</a>`;
                    }
                  } else {
                    if(data.cnst2!=''){
                      if(data.cnst3!=''){
                        if(data.cnst4!=''){
                          return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}-${data.cnst4}">${data.complete_name}</a>`;
                        } else {
                          return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}">${data.complete_name}</a>`;
                        }
                      } else{
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.complete_name} - ${data.cnst2}">${data.complete_name}</a>`;
                      }
                    } else {
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.complete_name}</a>`;
                    }
                  }
                }
              }, /* complete name */
             { /* nick name */
               "data" : {pin:"pin", complete_name:"complete_name", cnst2:"cnst4", cnst3:"cnst3", cnst4:"cnst4", nick_name:"nick_name", nnst2:"nnst2", nnst3:"nnst3", nnst4:"nnst4"},
                "render" :function(data,type,row){
                  if(data.cnst2!=''){
                    if(data.cnst3!=''){
                      if(data.cnst4!=''){ /* four students */
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}"> ${data.nick_name} -${data.nick_name} - ${data.nnst2} - ${data.cnst3} - ${data.cnst4} </a>`;
                      } else { /* three students */
                        return `<a href="<?php echo site_url('student_single?pin='); ?>${data.pin}"> ${data.nick_name} - ${data.nnst2}- ${data.nnst3} </a>`;
                      }
                    }else { /* two students */
                      return `<a href="<?php echo site_url('student_single?pin=')?>${data.pin}"> ${data.nick_name} - ${data.nnst2} </a>`;
                    }
                  } else { /* only one student */
                    return `<a href="<?php echo site_url('student_single?pin=')?>${data.pin}">${data.nick_name}</a>`;
                  }
                }
              }, /* nick name */
           
            {
                "data" : {pin:"pin",address:"address",adrst2:"adrst2",adrst3:"adrst3",adrst4:"adrst4"},
                "render":function(data,type,row){
                  // here
                  if(data.adrst2==''){
                    return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.address}</a>`;
                  } else{
                    if(data.adrst3==''){
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.address} || ${data.adrst2}">${data.address.substr(0,15)}.....</a>`;
                    } else {
                      if (data.adrst4==''){
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.address} || ${data.adrst2} || ${data.adrst3}">${data.address.substr(0,15)}.....</a>`;
                      } else {
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.address} || ${data.adrst2} || ${ data.adrst3} || ${data.adrst4}">${data.address.substr(0,15)}.....</a>`;
                      }
                    }
                  }
                }
              }, /* address */
            {
                "data" :{pin:"pin",cnst2:"cnst2",cnst3:"cnst3",cnst4:"cnst4",date_of_birth:"date_of_birth",dobst2:"dobst2",dobst3:"dobst3",dobst4:"dobst4",},
                "render" : function (data, type, row){
                 // here
                  if(data.cnst2==''){
                    return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")}`;
                  } else {
                    if(data.cnst3==''){
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")}`;
                    } else {
                      if(data.cnst4==''){
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")} - ${$.format.date(data.dobst3, "MMM/dd/yyyy")}`;
                      } else {
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")} - ${$.format.date(data.dobst3, "MMM/dd/yyyy")} - ${$.format.date(data.dobst4, "MMM/dd/yyyy")}` ;
                      }
                    }
                  }
                }
              }, /* date of birth */
          
            {
                "data" : {pin:"pin",phone:"phone",phst2:"phst2",phst3:"phst3",phst4:"phst4"},
                "render": function(data,type,row){
                  // here
                  if(data.phst2==''){
                    return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.phone}`;
                  } else{
                    if(data.phst3==''){
                      return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.phone} - ${data.phst2}`;
                    } else {
                      if(data.phst4==''){
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.phone} - ${data.phst2} - ${data.phst3}`;
                      } else {
                        return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.phone} - ${data.phst2} - ${data.phst3} -${data.phst4}`;
                      }
                    }
                  }
                }
              }, /* phone */
         
            {
                "data" : {pin:"pin", program:"program"},
                "render" : function(data, meta, row){
                  return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${data.program}</a>`
                }
              }, /* program */
           
            {
                "data" : {pin:"pin", starting_date:"starting_date"},
                "render" : function (data, type, row){
                  return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}">${$.format.date(data.starting_date, "MMM/dd/yyyy")}</a>`;
                }
              }, /* starting date */
            {
                "data" : {pin:"pin", bground:"bground"},
                "render" : function (data, type, row, meta){
                  if(data.length>20){
                    return `<a href="<?php echo site_url('student_single?pin=');?>${data.pin}" title="${data.bground}">${data.bground.substr(0,15)}...</a>`;
                  } else {
                    return `<a href="<?php echo site_url('student_single?pin='); ?>${data.pin}">${data.bground}</a>`
                  }
                
                }
              }
          
            ]  
        });
        $('#new_student_button').on('click', function(){
          $('#nsm').modal('show');
          $('[name="starting_date"]').val(today);
          $('#add_one').on('click',function(){
            $('#group_name,#student2').fadeIn('slow');
            $('#remove_three').on('click', function(){
              $('#group_name,#student2,#student3,#student4').fadeOut('slow');
               $('#cnst2,#nnst2,#adrst2,#pbst2,#dbst2,#phst2,#cnst3,#nnst3,#adrst3,#pbst3,#dbst3,#phst3,#cnst4,#nnst4,#adrst4,#pbst4,#dbst4,#phst4').val("");
            });
            $('#add_two').on('click',function(){
              $('#student3').fadeIn('slow');
              $('#remove_two').on('click', function(){
                $('#student3,#student4').fadeOut('slow');
              });
              $('#add_three').on('click', function(){
                $('#student4').fadeIn('slow');
                $('#remove_one').on('click', function(){
                  $('#student4').fadeOut('slow');
                });
              });
            })
          });
        });
        $('input, select, textarea').on('focus', function(){
          $(this).css('background-color', 'white');
          $('#nsf, #esf').removeClass("alert alert-danger");
          $('#nsf, #esf').html("");
        });
        $('#save_student_btn').on('click',function(){
          var bck = 'background-color',
              clr ='#fbe2e6',
              grp = $('#grp').val(),
              pn=$('#pn').val(),
              cn=$('#cn').val(),
              nn=$('#nn').val(),
              ad=$('#ad').val(),
              pb=$('#pb').val(),
              db=$('#db').val(),
              ph=$('#ph').val(),
              cn2=$('#cnst2').val(),
              nn2=$('#nnst2').val(),
              ad2=$('#adrst2').val(),
              pb2=$('#pbst2').val(),
              db2=$('#dbst2').val(),
              ph2=$('#phst2').val(),
              cn3=$('#cnst3').val(),
              nn3=$('#nnst3').val(),
              ad3=$('#adrst3').val(),
              pb3=$('#pbst3').val(),
              db3=$('#dbst3').val(),
              ph3=$('#phst3').val(),
              cn4=$('#cnst4').val(),
              nn4=$('#nnst4').val(),
              ad4=$('#adrst4').val(),
              pb4=$('#pbst4').val(),
              db4=$('#dbst4').val(),
              ph4=$('#phst4').val(),
              pr=$('#pr').val(),
              pd=$('#pd').val(),
              sd=$('#sd').val(),
              re=$('#re').val(),
              ta=$('#ta').val(),
              di=$('#di').val(),
              bg=$('#bg').val(),
              si=$('#si').val(),
              wp=$('#wp').val(),
              ap=$('#ap').val();
          if (pn==''|| cn==''||ad==''||db==''||ph==''||pr==''||pd==''){
            $('#nsf').addClass('alert alert-danger'); 
            $('#nsf').html('Please fill out all required fields'); 
            if (pn=='') {$('#pn').css(bck, clr);}
            if (cn=='') {$('#cn').css(bck, clr);}
            if(ad==''){$('#ad').css(bck, clr);}
            if (db==''){$('#db').css(bck, clr);}
            if (ph==''){$('#ph').css(bck, clr);}
            if(pr==''){$('#pr').css(bck, clr);}
            if (pd=='') {
              $('#pd').css(bck, clr);
            }
          }else{
            if (isNaN(pn)){
              $('#nsf').addClass('alert alert-danger'); 
              $('#nsf').html('pin can only consist of number'); 
              $('#pn').css(bck, clr);
            }else{
              if (isNaN(ph)){
                $('#nsf').addClass('alert alert-danger'); 
                $('#nsf').html('phone can only consist of number'); 
                $('#ph').css(bck, clr);
              }else{
                if (isNaN(pd)){
                  $('#nsf').addClass('alert alert-danger');
                  $('#nsf').html('Program duration only consist of number'); 
                  $('#pd').css(bck, clr);
                } else {
                  if ($('#student2').css('display')==='block'){
                    if(cn2 == ''||ad2==''||db2==''||ph2==''){ 
                      $('#nsf').addClass('alert alert-danger');
                      $('#nsf').html('Please fill out all required fields');
                      if(cn2==''){$('#cnst2').css(bck,clr);}
                      if(ad2==''){$('#adrst2').css(bck,clr);}
                      if(db2==''){$('#dbst2').css(bck,clr);}
                      if(ph2==''){$('#phst2').css(bck,clr);}
                    } else {
                      if(isNaN(ph2)){
                        $('#nsf').addClass('alert alert-danger');
                        $('#nsf').html('Phone must only be numbers');
                        $('#phst2').css(bck,clr);
                      } else {
                        if($('#student3').css('display')==='block'){
                          if(cn3 == ''||ad3==''||db3==''||ph3==''){
                            $('#nsf').addClass('alert alert-danger');
                            $('#nsf').html('Please fill out all required fields');
                            if(cn3==''){$('#cnst3').css(bck,clr);}
                            if(ad3==''){$('#adrst3').css(bck,clr);}
                            if(db3==''){$('#dbst3').css(bck,clr);}
                            if(ph3==''){$('#phst3').css(bck,clr);}
                          } else {
                            if(isNaN(ph3)){
                              $('#nsf').addClass('alert alert-danger');
                              $('#nsf').html('Phone must only be numbers');
                              $('#phst3').css(bck,clr);
                            } else{
                              if($('#student4').css('display')==='block'){
                                if(cn4 == ''||ad4==''||db4==''||ph4==''){
                                  $('#nsf').addClass('alert alert-danger');
                                  $('#nsf').html('Please fill out all required fields');
                                  if(cn4==''){$('#cnst4').css(bck,clr);}
                                  if(ad4==''){$('#adrst4').css(bck,clr);}
                                  if(db4==''){$('#dbst4').css(bck,clr);}
                                  if(ph4==''){$('#phst4').css(bck,clr);}
                                } else {
                                  if(isNaN(ph4)){
                                    $('#nsf').addClass('alert alert-danger');
                                    $('#nsf').html('Phone must only be numbers');
                                    $('#phst4').css(bck,clr);
                                  } else{
                                    check_pin(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap);
                                    }
                                }
                              } else {
                                cn4=nn4=ad4=pb4=db4=ph4='';
                                check_pin(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap);
                              }
                            }
                          }
                        } else{
                          cn3=nn3=ad3=pb3=db3=ph3=cn4=nn4=ad4=pb4=db4=ph4='';
                          check_pin(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap);
                        }
                      }
                    }
                  } else{
                    cn2=nn2=ad2=pb2=db2=ph2=cn3=nn3=ad3=pb3=db3=ph3=cn4=nn4=ad4=pb4=db4=ph4='';
                    check_pin(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap);
                  }
                }
              }
            }
          }
          return false;
        });
        function check_pin(grp, pn, cn, nn, ad, pb, db, ph, cn2, nn2, ad2, pb2, db2, ph2, cn3, nn3, ad3, pb3, db3, ph3, cn4, nn4, ad4, pb4, db4, ph4, pr, pd, sd, re, ta, di, bg, si, wp, ap){
          var bck = 'background-color',
              clr ='#fbe2e6';
          $.ajax({
            url: '<?php echo  site_url('student/pin_availability')?>', 
            type: 'post', 
            data:{pin:pn}, 
            success: function(response){
              if (response=='true' ){
                $('#nsf').addClass('alert alert-danger'); 
                $('#nsf').html('pin is already used');
                $('#pn').css(bck, clr);
              }else{
               submit_student(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap);
              }
            }
          });
        }
        function submit_student(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap){
          $.ajax({
            type : "POST", 
            url : "<?php echo site_url('student/save')?>", 
            dataType : "JSON", 
            data:{grp:grp,pn:pn,cn:cn,nn:nn,ad:ad,pb:pb,db:db,ph:ph,cn2:cn2,nn2:nn2,ad2:ad2,pb2:pb2,db2:db2,ph2:ph2,cn3:cn3,nn3:nn3,ad3:ad3,pb3:pb3,db3:db3,ph3:ph3,cn4:cn4,nn4:nn4,ad4:ad4,pb4:pb4,db4:db4,ph4:ph4,pr:pr,pd:pd,sd:sd,re:re,ta:ta,di:di,bg:bg,si:si,we:wp,ap:ap},
            success: function(data){
              $('[name="pn"]').val(""); 
              $('[name="cn"]').val(""); 
              $('[name="nn"]').val(""); 
              $('[name="ad"]').val(""); 
              $('[name="pb"]').val(""); 
              $('[name="db"]').val(""); 
              $('[name="ph"]').val(""); 
              $('[name="pr"]').val(""); 
              $('[name="pd"]').val(""); 
              $('[name="sd"]').val(today);
              $('[name="re"]').val(""); 
              $('[name="ta"]').val(""); 
              $('[name="di"]').val(""); 
              $('[name="bg"]').val(""); 
              $('[name="si"]').val("");
              $('[name="wp"]').val("");
              $('[name="ap"]').val(""); 
              $('#nsm').modal('hide');
              $('#mystudents').DataTable().ajax.reload();
            }
          });
        }
        $('#show_data').on('click','.item_edit',function(){
          var grp=$(this).data('grp'),
              pn=$(this).data('pn'),
              cn=$(this).data('cn'),
              nn=$(this).data('nn'),
              ad=$(this).data('ad'),
              pb=$(this).data('pb'),
              db=$(this).data('db'),
              ph=$(this).data('ph'),
              cnst2=$(this).data('cnst2'),
              nnst2=$(this).data('nnst2'),
              adrst2=$(this).data('adrst2'),
              pobst2=$(this).data('pobst2'),
              dobst2=$(this).data('dobst2'),
              phst2=$(this).data('phst2'),
              cnst3=$(this).data('cnst3'),
              nnst3=$(this).data('nnst3'),
              adrst3=$(this).data('adrst3'),
              pobst3=$(this).data('pobst3'),
              dobst3=$(this).data('dobst3'),
              phst3=$(this).data('phst3'),
              cnst4=$(this).data('cnst4'),
              nnst4=$(this).data('nnst4'),
              adrst4=$(this).data('adrst4'),
              pobst4=$(this).data('pobst4'),
              dobst4=$(this).data('dobst4'),
              phst4=$(this).data('phst4'),
              pr=$(this).data('pr'),
              pd=$(this).data('pd'),
              sd=$(this).data('sd'),
              re=$(this).data('re'),
              ta=$(this).data('ta'), 
              di=$(this).data('di'),
              bg=$(this).data('bg'),
              si=$(this).data('si'),
              wp=$(this).data('wp'),
              ap=$(this).data('ap'),
              fsp = $(this).data('fsp'),
              fsp_button = '<input type="checkbox" name="fsp" id="fsp"' ;
          $('#esm').modal('show');
          $('[name="pn_e"]').val(pn);
          $('[name="cn_e"]').val(cn);
          $('[name="nn_e"]').val(nn);
          $('[name="ad_e"]').val(ad);
          $('[name="pb_e"]').val(pb);
          $('[name="db_e"]').val(db);
          $('[name="ph_e"]').val(ph);
          $('[name="grp_e"]').val(grp);
          $('[name="cnst2_e"]').val(cnst2);
          $('[name="nnst2_e"]').val(nnst2);
          $('[name="adrst2_e"]').val(adrst2);
          $('[name="pbst2_e"]').val(pobst2);
          $('[name="dbst2_e"]').val(dobst2);
          $('[name="phst2_e"]').val(phst2);
          $('[name="cnst3_e"]').val(cnst3);
          $('[name="nnst3_e"]').val(nnst3);
          $('[name="adrst3_e"]').val(adrst3);
          $('[name="pbst3_e"]').val(pobst3);
          $('[name="dbst3_e"]').val(dobst3);
          $('[name="phst3_e"]').val(phst3);
          $('[name="cnst4_e"]').val(cnst4);
          $('[name="nnst4_e"]').val(nnst4);
          $('[name="adrst4_e"]').val(adrst4);
          $('[name="pbst4_e"]').val(pobst4);
          $('[name="dbst4_e"]').val(dobst4);
          $('[name="phst4_e"]').val(phst4);
          $('[name="pr2"]').val(pr);
          $('[name="pd2"]').val(pd);
          $('[name="sd2"]').val(sd);
          $('[name="re2"]').val(re);
          $('[name="ta2"]').val(ta);
          $('[name="di2"]').val(di);
          $('[name="bg2"]').val(bg);
          $('[name="si2"]').val(si);
          $('[name="wp2"]').val(wp);
          $('[name="ap2"]').val(ap);
          if(cnst2==''){
            $('#group_name_e,#student2_e,#student3_e,#student4_e').css('display', 'none');
          } else {
            if(cnst3==''){ /*two students*/
              $('#group_name_e,#student2_e').css('display', 'block');
              $('#student3_e,#student4_e').css('display', 'none');
            } else {
              if(cnst4 == ''){ /*three students*/
                $('#group_name_e,#student2_e,#student3_e').css('display', 'block');
                $('#student4_e').css('display','none');       
              } else{
                $('#group_name_e,#student2_e,#student3_e,#student4_e').css('display', 'block'); 
              }
            }
          }
          $('#add_one_e').on('click',function(){
            $('#group_name_e,#student2_e').fadeIn('slow');
            $('#group_name_e,#student2_e').css('display', 'block'); 
          });
          $('#add_two_e').on('click', function(){
            $('#student3_e').fadeIn('slow');
            $('#student3_e').css('display','block');
          });
          $('#remove_three_e').on('click',function(){
            $('#group_name_e,#student2_e,#student3_e,#student4_e').fadeOut('fast');
          });
          $('#add_three_e').on('click', function(){
            $('#student4_e').fadeIn('slow');
            $('#student4_e').css('display', 'block');
          });
          $('#remove_two_e').on('click', function(){
            $('#student3_e,#student4_e').fadeOut('fast');
          });
          $('#remove_one_e').on('click', function(){
            $('#student4_e').fadeOut('fast');
          });
          if (fsp == 'yes'){
            fsp_button += 'checked disabled> <label for="fsp">Final Speaking Performance</label>';
          } else {
            fsp_button += '> <label for="fsp">Final Speaking Performance</label>';
          }
          $('#fsp_button').html(fsp_button);
        });
        $('#update_student_btn').on('click', function(){
          var bck = 'background-color',clr = '#fbe2e6', pn=$('#pn_e').val(), cn=$('#cn_e').val(), nn=$('#nn_e').val(), ad=$('#ad_e').val(), pb=$('#pb_e').val(), db=$('#db_e').val(), ph=$('#ph_e').val(), grp=$('#grp_e').val(), cn2=$('#cnst2_e').val(), nn2=$('#nnst2_e').val(), ad2=$('#adrst2_e').val(), pb2=$('#pbst2_e').val(), db2=$('#dbst2_e').val(), ph2=$('#phst2_e').val(), cn3=$('#cnst3_e').val(), nn3=$('#nnst3_e').val(), ad3=$('#adrst3_e').val(), pb3=$('#pbst3_e').val(), db3=$('#dbst3_e').val(), ph3=$('#phst3_e').val(), cn4=$('#cnst4_e').val(), nn4=$('#nnst4_e').val(), ad4=$('#adrst4_e').val(), pb4=$('#pbst4_e').val(), db4=$('#dbst4_e').val(), ph4=$('#phst4_e').val(),  pr=$('#pr2').val(), pd=$('#pd2').val(), sd=$('#sd2').val(), re=$('#re2').val(), ta=$('#ta2').val(), di=$('#di2').val(), bg=$('#bg2').val(), si=$('#si2').val(), wp=$('#wp2').val(), ap=$('#ap2').val(), fsp='';
          if ($('#fsp').is(':checked')){fsp='yes';}else{fsp='';}
          if(cn==''|| ad==''|| db==''|| ph==''|| pr==''|| pd==''){ 
            $('#esf').addClass('alert alert-danger');
            $('#esf').html('Please fill out all required fields');
            if(cn==''){$('#cn_e').css(bck, clr);}
            if(ad==''){$('#ad_e').css(bck, clr);}
            if(db==''){$('#db_e').css(bck, clr);}
            if(ph==''){$('#ph_e').css(bck, clr);}
            if(pr==''){$('#pr_e').css(bck, clr);}
            if(pd==''){$('#pd_e').css(bck, clr);}
          } else { 
            if(isNaN(ph)){ 
            $('#esf').addClass('alert alert-danger');
            $('#esf').html('Phone must only be number!');
            $('#ph_e').css(bck, clr);
          } else { 
            if(isNaN(pd)){ 
              $('#esf').addClass('alert alert-danger');
              $('#esf').html('Program duration must only be number!');
              $('#pd_e').css(bck, clr);
            } else { 
              if($('#student2_e').css('display')==='block'){ 
                if(cn2==''||ad2==''||db2==''||ph2==''){
                  $('#esf').addClass('alert alert-danger');
                  $('#esf').html('Please fill out all required fields!');
                  if(cn2==''){
                    $('#cnst2_e').css(bck,clr);
                  }
                  if(ad2==''){
                    $('#adrst2_e').css(bck,clr);
                  }
                  if(db2==''){
                    $('#dbst2_e').css(bck,clr); 
                  }
                  if(ph2==''){
                    $('#phst2_e').css(bck,clr);
                  }
                } else{ 
                  if(isNaN(ph2)){
                    $('#esf').addClass('alert alert-danger');
                    $('#esf').html('Phone must only be number!');
                    $('#phst2_e').css(bck,clr);
                  } else{ 
                    if($('#student3_e').css('display')==='block'){
                      if(cn3==''||ad3==''||db3==''||ph3==''){ 
                        $('#esf').addClass('alert alert-danger');
                        $('#esf').html('Please fill out all required fields!');
                        if(cn3==''){
                          $('#cnst3_e').css(bck,clr);
                        }
                        if(ad3==''){
                          $('#adrst3_e').css(bck,clr);
                        }
                        if(db3==''){
                          $('#dbst3_e').css(bck,clr);
                        }
                        if(ph3==''){
                          $('#phst3_e').css(bck,clr);
                        }
                      } else{ 
                        if(isNaN(ph3)){
                          $('#esf').addClass('alert alert-danger');
                          $('#esf').html('Phone must only be number!');
                          $('#phst3_e').css(bck,clr);
                        } else{ 
                          if($('#student4_e').css('display')==='block'){ 
                            if(cn4==''||ad4==''||db4==""||ph4==''){ 
                              $('#esf').addClass('alert alert-danger');
                              $('#esf').html('Please fill out all required fields!');
                              if(cn4==''){
                                $('#cnst4_e').css(bck,clr);
                              }
                              if(ad4==''){
                                $('#adrst4_e').css(bck,clr);
                              }
                              if(db4==''){
                                $('#dbst4_e').css(bck,clr);
                              }
                              if(ph4==''){
                                $('#phst4_e').css(bck,clr);
                              }
                            } else { 
                              if(isNaN(ph4)){ 
                                $('#esf').addClass('alert alert-danger');
                                $('#esf').html('Phone must only be number!');
                                $('#phst4_e').css(bck,clr);
                              } else { 
                                update_student(pn,cn,nn,ad,pb,db,ph,grp,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap,fsp);
                              }
                            }
                          } else { 
                            cn4 = nn4 = pb4 = ad4 = ph4 = db4 = '';
                           update_student(pn,cn,nn,ad,pb,db,ph,grp,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap,fsp);
                          } 
                        }
                      }
                    } else { 
                      cn3=nn3=pb3=ad3=ph3=db3=cn4=nn4=pb4=ad4=ph4=db4='';
                     update_student(pn,cn,nn,ad,pb,db,ph,grp,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap,fsp);
                    }
                  }
                }
              } else { 
                cn2=nn2=pb2=ad2=ph2=db2=cn3=nn3=pb3=ad3=ph3=db3=cn4=nn4=pb4=ad4=ph4=db4='';
               update_student(pn,cn,nn,ad,pb,db,ph,grp,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap,fsp);
              }
            }
          }
        }
      });
        function update_student(pn, cn, nn, ad, pb, db, ph, grp,cn2, nn2, ad2, pb2, db2, ph2, cn3, nn3, ad3, pb3, db3,ph3, cn4, nn4, ad4, pb4, db4, ph4, pr, pd, sd, re, ta, di, bg, si, wp, ap, fsp)
        {
          $.ajax({
            type : "post",
            url: "<?php echo site_url('student/update');?>",
            dataType : "json",
            data : {pn:pn,cn:cn,nn:nn,ad:ad,pb:pb,db:db,ph:ph,grp,cn2:cn2,nn2:nn2,ad2:ad2,pb2:pb2,db2:db2,ph2:ph2,cn3:cn3,nn3:nn3,ad3:ad3,pb3:pb3,db3:db3,ph3:ph3,cn4:cn4,nn4:nn4,ad4:ad4,pb4:pb4,db4:db4,ph4:ph4,pr:pr,pd:pd,sd:sd,re:re,ta:ta,di:di,bg:bg,si:si,wp:wp,ap:ap,fsp:fsp},
            success : function(data){
              $('#esm').modal('hide');
              $('#mystudents').DataTable().ajax.reload();
            }
          });  
        }
      }); 
    </script> 
    <?php endif;?>
</body> 
</html>
