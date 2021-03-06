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
                <th style="text-align: right;">Actions</th> 
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
                <th style="text-align: right;">Actions</th>
              </tr>
            </thead>
            <tbody id="show_after_teaching"> </tbody>
          </table>
        </div>
      </div>
    </div>
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
                    <legend>Personal Information</legend>        
                    <div class="form-row"> 
                      <div class="form-group col-4"> 
                        <label>PIN<sup>&lowast;</sup></label> 
                        <div class="input-group"> 
                          <div class="input-group-prepend"> <span style="color:green;" class="input-group-text"><i class="fas fa-barcode fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="pn" id="pn" placeholder="PIN"> 
                        </div>
                      </div>
                      <div class="form-group col-8">
                        <label>Name<sup>&lowast;</sup></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i  style="color:red;" class="fa fa-user-circle fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="cn" id="cn" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group col-4">
                        <label>Nick name</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> 
                            <span class="input-group-text"><i style="color:rgb(70,0,90);" class="fas fa-user-circle fa-fw"></i> </span> 
                          </div>
                          <input type="text" class="form-control" name="nn" id="nn" placeholder="Alias">
                        </div>
                      </div>
                      <div class="form-group col-8">
                        <label>Address<sup>&lowast;</sup></label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="ad" id="ad" placeholder="Adress" required> 
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label>Place of Birth</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:grey;" class="fa fa-map-marker fa-fw"></i></span>
                          </div>
                          <!--input type="text" class="form-control" name="pb" id="pb" placeholder="Place of Birth"-->
                          <select class="form-control" name="pb" id="pb">
                            <option>Choose</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label>Date of Birth<sup>&lowast;</sup></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(120,50,255);" class="fas fa-birthday-cake fa-fw"></i></span>
                          </div>
                          <input type="date" class="form-control" name="db" id="db" required> 
                        </div>
                      </div>
                      <div class="form-group col">
                        <label>Phone <sup>&lowast;</sup></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:navy;" class="fa fa-phone-square fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="ph" id="ph" placeholder="62877" value="62"> 
                        </div>
                        <small class="form-text text-muted">Make sure you write the number in international format with no whitespace.</small>
                      </div>
                    </div>
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
                    <legend>Personal Information</legend>
                    <div class="form-row"> 
                      <div class="form-group col-3"> 
                        <label>PIN<sup>&lowast;</sup></label> 
                        <div class="input-group"> 
                           <div class="input-group-prepend"> <span style="color:green;" class="input-group-text"><i class="fas fa-barcode fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="pn2" id="pn2" placeholder="PIN" readonly> 
                        </div>
                      </div>
                      <div class="form-group col-9">
                        <label>Name<sup>&lowast;</sup></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                           <span class="input-group-text"><i  style="color:red;" class="fa fa-user-circle fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" id="cn2" placeholder="Name" name="cn2">
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label>Nickname</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(70,0,90);" class="fas fa-user-circle fa-fw"></i> </span>
                          </div>
                          <input type="text" class="form-control" name="nn2" id="nn2" placeholder="Alias">
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label>Address<sup>&lowast;</sup></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="ad2" id="ad2" placeholder="Address">
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label>Place of Birth</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                           <span class="input-group-text"><i style="color:grey;" class="fa fa-map-marker fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="pb2" id="pb2" placeholder="Place of Birth">
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label>Date of Birth<sup>&lowast;</sup></label>
                        <div class="input-group"> 
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(120,50,255);" class="fas fa-birthday-cake fa-fw"></i></span>
                          </div>
                          <input type="date" class="form-control" name="db2" id="db2">
                        </div>
                      </div>
                      <div class="form-group col"> 
                        <label>Phone<sup>&lowast;</sup></label> 
                        <div class="input-group"> 
                          <div class="input-group-prepend"> 
                           <span class="input-group-text"><i style="color:navy;" class="fa fa-phone-square fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="ph2" id="ph2" placeholder="62877"> 
                        </div>
                        <small class="form-text text-muted">Make sure to write the number in international format with no whitespace.</small>
                      </div>
                    </div>    
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
                Are you sure? Once executed, it will be permanently gone!            
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
              <h5 class="modal-title">Delete Teacher</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Are you sure? Once executed, it will be permanently gone!            
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
    <?php if($this->session->userdata('level') == '21'):?>
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
              var html = '',
                  i;
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
                  i;
              for (i=0;i<data.length;i++){
                html += '<tr>'+
                          '<td style="text-align:right;"><div>'+data[i].id+'</div></td>'+
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
          console.log(d);
        });
        $('#note').on('focusout',function(){
          $(this).removeClass('editMode');
          var str = $('#str').val();
          var str2 = $(this).text();
          var d = $('#schedule_date').val();
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
              i;
          for (i=0;i<data.length;i++){
            html += '<tr>'+
                      '<td style="text-align:right;">'+data[i].id+'</td>'+
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
</script>
    <?php endif;?>
    <?php if($this->session->userdata('level') == '17'):?>
     <script type="text/javascript">
      $(document).ready(function(){
        var today = $.format.date(new Date(), "yyyy-MM-dd");   
        get_cities();
        function get_cities(){
          $.ajax({
            url: "<?php echo site_url('student/get_cities') ?>",
            type : "ajax",
            dataType : "json",
            success : function(data){
              var html = '', i;
              for(i=0;i<data.length;i++){
                html += '<option value="'+data[i].city+'">'+data[i].city+'</option>'
              }
              $('#pb').html(html);
            }
          });
        }
          $('#mystudents').dataTable({
            "ajax" :{
              "url":"<?php echo site_url('student/student_data');?>",
              "dataSrc":""
            },
            "columns":[
              {"data" : "pin"},
              {"data" : "complete_name"},
              {"data" : "nick_name"},
              {"data" : "address"},
              {
                "data" : "starting_date",
                "render" : function (data, type, row){
                  return $.format.date(data, "MMM/dd/yyyy");
                }
              },
              {"data" : "phone"},
              {"data" : "program"},
              {
                "data" : "starting_date",
                "render" : function (data, type, row){
                  return $.format.date(data, "MMM/dd/yyyy");
                }
              },
              {"data" : "bground",
                "render" : function (data, type, row, meta){
                  return type === 'display' && data.length>20 ?
                    '<span title="'+data+'">'+data.substr(0,15)+'...</span>':data;
                }
              },
              {
                "data" : {pin: "pin", complete_name: "complete_name", nick_name:"nick_name", address: "address", place_of_birth: "place_of_birth", date_of_birth: "date_of_birth", phone: "phone", program: "program", program_duration: "program_duration", starting_date: "starting_date", reason: "reason", target: "target", difficulties: "difficulties", bground: "bground", self_introduction: "self_introduction", weakness_point: "weakness_point", action_plan: "action_plan", fsp: "fsp"},
                "render" : function(data, type, row, meta){
                  return '<a class="btn btn-success btn-sm" href="<?php echo site_url('student_single?pin=');?>'+data.pin+'&name='+data.nick_name+'"><i class="fas fa-eye fa-fw"></i></a> <a title="Edit" href="javascript:void(0);" class="btn btn-info btn-sm item_edit tooltip-bottom" data-pn="'+data.pin+'" data-cn="'+data.complete_name+'" data-nn="'+data.nick_name+'" data-ad="'+data.address+'" data-pb="'+data.place_of_birth+'" data-db="'+($.format.date(data.date_of_birth, "yyyy-MM-dd"))+'" data-ph="'+data.phone+'" data-pr="'+data.program+'" data-pd="'+data.program_duration+'" data-sd="'+($.format.date(data.starting_date, "yyyy-MM-dd"))+'" data-re="'+data.reason+'" data-ta="'+data.target+'" data-di="'+data.difficulties+'" data-bg="'+data.bground+'" data-si="'+data.self_introduction+'" data-wp="'+data.weakness_point+'" data-ap="'+data.action_plan+'" data-fsp="'+data.fsp+'"><i class="fas fa-user-edit fa-fw"></i></a> <a href="javascript:void(0);" data-pin="'+data.pin+'" class="btn btn-sm btn-danger item_delete"><i class="fas fa-trash fa-fw"></i> </a>';
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
             console.log(pin);
           // get test
           // for each test ->meeting number
           // from that meeting number, whe know the students test tables
           // remove test tables using array
           // check if student has fsp
           // if he has, delete it, if not
             $.ajax({
                type: "post",
                url: "<?php echo site_url('student/delete_student');?>",
                dataType : "json",
                data : {pin: pin},
                success : function(data){
                    console.log('student deleted');
                    $('#mystudents').DataTable().ajax.reload();
                    $('#myaft').DataTable().ajax.reload();
                    $('#delete_student_modal').modal('hide');
                   /* $.ajax({
                       type : "post",
                       url : "<?php echo site_url('student/delete_table');?>",
                       dataType : "json",
                       success : function(data){
                         console.log('table deleted');
                         $.ajax({
                           type : "post",
                           url : "<?php echo site_url('student/del_dir_contents');?>",
                           data : {pin:pin},
                           success : function(response){
                             console.log('deleted');
                             if(response== 'true'){
                             // it is not implemented yet
                               $.ajax({
                                 type : "post",
                                 data : {pin:pin},
                                 url : "<?php echo site_url('student/del_dir');?>",
                               });
                             } else {
                               console.log('error');
                             }
                           }
                         }); 
                       }
                    }); */
                }
             });
          }); 
      $('#myaft').DataTable({
          "ajax" : {
            "url" :"<?php echo site_url('student/after_teaching_data')?>",
            "dataSrc" : ""
          },
        "columns" : 
          [
              {"data" : "pin"},
              {"data" : "complete_name"},
              {"data" : "nick_name"},
              {"data" : "address"},
              {
                "data" : "starting_date",
                "render" : function (data, type, row){
                  return $.format.date(data, "MMM/dd/yyyy");
                }
              },
              {"data" : "phone"},
              {"data" : "program"},
              {
                "data" : "starting_date",
                "render" : function (data, type, row){
                  return $.format.date(data, "MMM/dd/yyyy");
                }
              },
              {"data" : "bground",
                "render" : function (data, type, row, meta){
                  return type === 'display' && data.length>30 ?
                    '<span title="'+data+'">'+data.substr(0,28)+'...</span>':data;
                }
              },
              {
                "data" : {pin: "pin", complete_name: "complete_name", nick_name:"nick_name", address: "address", place_of_birth: "place_of_birth", date_of_birth: "date_of_birth", phone: "phone", program: "program", program_duration: "program_duration", starting_date: "starting_date", reason: "reason", target: "target", difficulties: "difficulties", bground: "bground", self_introduction: "self_introduction", weakness_point: "weakness_point", action_plan: "action_plan"},
                "render" : function(data, type, row, meta){
                  return '<a class="btn btn-success btn-sm" href="<?php echo site_url('student_single?pin=');?>'+data.pin+'&name='+data.nick_name+'"><i class="fas fa-eye fa-fw"></i></a>';
                }
              }
            ]  
        });
        $('#new_student_button').on('click', function(){
          $('#nsm').modal('show');
          $('[name="starting_date"]').val(today);
        });
        $('input, select, textarea').on('focus', function(){
          $(this).css('background-color', 'white');
          $('#nsf, #esf').removeClass("alert alert-danger");
          $('#nsf, #esf').html("");
        });
        
        $('#save_student_btn').on('click',function(){
          var bck = 'background-color',
              clr ='#fbe2e6',
              a=$('#pn').val(),
              b=$('#cn').val(),
              c=$('#nn').val(),
              d=$('#ad').val(),
              e=$('#pb').val(),
              f=$('#db').val(),
              g=$('#ph').val(),
              h=$('#pr').val(),
              i=$('#pd').val(),
              j=$('#sd').val(),
              k=$('#re').val(),
              l=$('#ta').val(),
              m=$('#di').val(),
              n=$('#bg').val(),
              o=$('#si').val(),
              p=$('#wp').val(),
              q=$('#ap').val();
          if (a==''|| b==''||d==''||f=='' ||g==''||h==''||i==''){
            $('#nsf').addClass('alert alert-danger'); $('#nsf').html('Please fill out all required fields'); 
            if (a=='') {$('#pn').css(bck, clr);}if (b=='') {$('#cn').css(bck, clr);}if(d==''){ $('#ad').css(bck, clr);}
            if (f=='') {$('#db').css(bck, clr);}if (g=='') { $('#ph').css(bck, clr);}if(h==''){ $('#pr').css(bck, clr);}if (i=='') {$('#pd').css(bck, clr);
            }
          }else{
            if (isNaN(a)){
              $('#nsf').addClass('alert alert-danger'); 
              $('#nsf').html('pin can only consist of number'); 
              $('#pn').css(bck, clr);
            }else{
              if (isNaN(g)){
                $('#nsf').addClass('alert alert-danger'); 
                $('#nsf').html('phone can only consist of number'); 
                $('#ph').css(bck, clr);
              }else{
                if (isNaN(i)){
                  $('#nsf').addClass('alert alert-danger');
                  $('#nsf').html('Program duration only consist of number'); 
                  $('#pd').css(bck, clr);
                }else{
                  $.ajax({
                    url: '<?php echo site_url('student/pin_availability')?>', 
                    type: 'post', 
                    data:{pin:a}, 
                    success: function(response){
                      if (response=='true' ){
                        $('#nsf').addClass('alert alert-danger'); 
                        $('#nsf').html('pin is already used');
                        $('#pn').css(bck, clr);            
                      }else{
                        $.ajax({
                          type : "POST", 
                          url : "<?php echo site_url('student/save')?>", 
                          dataType : "JSON", 
                          data:{pin:a,complete_name:b,nick_name:c,address:d,place_of_birth:e,date_of_birth:f,phone:g,program:h,program_duration:i,starting_date:j,reason:k,target:l,difficulties:m,bground:n,self_introduction:o,weakness_point:p,action_plan:q},
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
                    }
                  });
                }
              }
            }
          }
          return false;
        });
        $('#show_data').on('click','.item_edit',function(){
          var a=$(this).data('pn'), b=$(this).data('cn'), c=$(this).data('nn'),d=$(this).data('ad'), e=$(this).data('pb'), f=$(this).data('db'), g=$(this).data('ph'), h=$(this).data('pr'), i=$(this).data('pd'), j=$(this).data('sd'), k=$(this).data('re'), l=$(this).data('ta'), m=$(this).data('di'), n=$(this).data('bg'), o=$(this).data('si'), p=$(this).data('wp'), q=$(this).data('ap'), fsp = $(this).data('fsp'), fsp_button = '<input type="checkbox" name="fsp" id="fsp"' ;
          $('#esm').modal('show'); $('[name="pn2"]').val(a); $('[name="cn2"]').val(b); $('[name="nn2"]').val(c); $('[name="ad2"]').val(d); $('[name="pb2"]').val(e); $('[name="db2"]').val(f); $('[name="ph2"]').val(g); $('[name="pr2"]').val(h); $('[name="pd2"]').val(i); $('[name="sd2"]').val(j); $('[name="re2"]').val(k); $('[name="ta2"]').val(l); $('[name="di2"]').val(m); $('[name="bg2"]').val(n); $('[name="si2"]').val(o); $('[name="wp2"]').val(p); $('[name="ap2"]').val(q);
          if (fsp == 'yes'){ fsp_button += 'checked disabled> <label for="fsp">Final Speaking Performance</label>';
          } else { fsp_button += '> <label for="fsp">Final Speaking Performance</label>'; }
          $('#fsp_button').html(fsp_button);
        });
        $('#update_student_btn').on('click',function(){
          var bck = 'background-color',clr='#fbe2e6',a=$('#pn2').val(),b=$('#cn2').val(),c=$('#nn2').val(),d=$('#ad2').val(),e=$('#pb2').val(),f=$('#db2').val(), g=$('#ph2').val(),h=$('#pr2').val(),i=$('#pd2').val(),j=$('#sd2').val(),k=$('#re2').val(),l=$('#ta2').val(),m=$('#di2').val(),n=$('#bg2').val(),  o=$('#si2').val(),p=$('#wp2').val(),action_plan=$('#ap2').val(),fsp='';
          if ($('#fsp').is(':checked')){fsp='yes';}else{fsp='';}
          if (a==''||b==''||d==''|| f=='' || g=='' || h=='' || i==''){
            $('#esf').addClass('alert alert-danger'); 
            $('#esf').html('Please fill out all required fields');
            if(b==''){$('#cn2').css(bck,clr);}
            if(d==''){$('#ad2').css(bck,clr);}
            if(f==''){$('#db2').css(bck,clr);}
            if(g==''){$('#ph2').css(bck,clr);}
            if(i==''){$('#pd2').css(bck,clr);}
          } else{ 
              if (isNaN(g)){$('#esf').addClass('alert alert-danger');$('#esf').html('phone can only consist of number');$('#ph2').css(bck, clr);
              }else{ 
                if (isNaN(i)){$('#esf').addClass('alert alert-danger');$('#esf').html('Program duration only consist of number');$('#pd2').css(bck, clr);
                }else{
                  $.ajax({
                    type : "POST", 
                    url : "<?php echo site_url('student/update')?>",
                    dataType : "JSON",
                    data :{pin:a,complete_name:b,nick_name:c,address:d,place_of_birth:e,date_of_birth:f,phone:g, program:h, program_duration:i,starting_date:j, reason:k,target:l,difficulties:m,bground:n,self_introduction:o, weakness_point:p,action_plan:action_plan},
                    success: function(data){ $('#esm').modal('hide'); $('#mystudents').DataTable().ajax.reload(); }
                  });
                  console.log('fsp is '+fsp);
                  if(fsp == 'yes'){ $.ajax({ type : "POST", url : "<?php echo site_url('student/set_fsp')?>", dataType : "JSON", data : {pin:a}, success : function(data){ console.log('fsp set'); }});
                    $.ajax({ type: "POST", url : "<?php echo site_url('student/fsp_table');?>", dataType : "JSON", data : {pin:a}, success : function (data){ console.log('fsp table for '+a+' created') } });
                  }
                }
              }
          }
          return false;
        });
      }); 
    </script> 
    <?php else:?>
    <script type="text/javascript">
      $(document).ready(function(){
        var today = $.format.date(new Date(), "yyyy-MM-dd");
        get_cities();
        function get_cities(){
          $.ajax({
            url: "<?php echo site_url('student/get_cities') ?>",
            type : "ajax",
            dataType : "json",
            success : function(data){
              var html = '', i;
              for(i=0;i<data.length;i++){
                html += '<option value="'+data[i].city+'">'+data[i].city+'</option>'
              }
              $('#pb').html(html);
            }
          });
        }
      $('#mystudents').dataTable({
            "ajax" :{
              "url":"<?php echo site_url('student/student_data');?>",
              "dataSrc":""
            },
            "columns":[
              {"data" : "pin"},
              {"data" : "complete_name"},
              {"data" : "nick_name"},
              {"data" : "address"},
              {
                "data" : "starting_date",
                "render" : function (data, type, row){
                  return $.format.date(data, "MMM/dd/yyyy");
                }
              },
              {"data" : "phone"},
              {"data" : "program"},
              {
                "data" : "starting_date",
                "render" : function (data, type, row){
                  return $.format.date(data, "MMM/dd/yyyy");
                }
              },
              {"data" : "bground",
                "render" : function (data, type, row, meta){
                  return type === 'display' && data.length>20 ?
                    '<span title="'+data+'">'+data.substr(0,15)+'...</span>':data;
                }
              },
              {
                "data" : {pin: "pin", complete_name: "complete_name", nick_name:"nick_name", address: "address", place_of_birth: "place_of_birth", date_of_birth: "date_of_birth", phone: "phone", program: "program", program_duration: "program_duration", starting_date: "starting_date", reason: "reason", target: "target", difficulties: "difficulties", bground: "bground", self_introduction: "self_introduction", weakness_point: "weakness_point", action_plan: "action_plan", fsp: "fsp"},
                "render" : function(data, type, row, meta){
                  return '<a class="btn btn-success btn-sm" href="<?php echo site_url('student_single?pin=');?>'+data.pin+'&name='+data.nick_name+'"><i class="fas fa-eye fa-fw"></i></a> <a title="Edit" href="javascript:void(0);" class="btn btn-info btn-sm item_edit tooltip-bottom" data-pn="'+data.pin+'" data-cn="'+data.complete_name+'" data-nn="'+data.nick_name+'" data-ad="'+data.address+'" data-pb="'+data.place_of_birth+'" data-db="'+($.format.date(data.date_of_birth, "yyyy-MM-dd"))+'" data-ph="'+data.phone+'" data-pr="'+data.program+'" data-pd="'+data.program_duration+'" data-sd="'+($.format.date(data.starting_date, "yyyy-MM-dd"))+'" data-re="'+data.reason+'" data-ta="'+data.target+'" data-di="'+data.difficulties+'" data-bg="'+data.bground+'" data-si="'+data.self_introduction+'" data-wp="'+data.weakness_point+'" data-ap="'+data.action_plan+'" data-fsp="'+data.fsp+'"><i class="fas fa-user-edit fa-fw"></i></a>';
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
              {"data" : "pin"},
              {"data" : "complete_name"},
              {"data" : "nick_name"},
              {"data" : "address"},
              {
                "data" : "starting_date",
                "render" : function (data, type, row){
                  return $.format.date(data, "MMM/dd/yyyy");
                }
              },
              {"data" : "phone"},
              {"data" : "program"},
              {
                "data" : "starting_date",
                "render" : function (data, type, row){
                  return $.format.date(data, "MMM/dd/yyyy");
                }
              },
              {"data" : "bground",
                "render" : function (data, type, row, meta){
                  return type === 'display' && data.length>30 ?
                    '<span title="'+data+'">'+data.substr(0,28)+'...</span>':data;
                }
              },
              {
                "data" : {pin: "pin", complete_name: "complete_name", nick_name:"nick_name", address: "address", place_of_birth: "place_of_birth", date_of_birth: "date_of_birth", phone: "phone", program: "program", program_duration: "program_duration", starting_date: "starting_date", reason: "reason", target: "target", difficulties: "difficulties", bground: "bground", self_introduction: "self_introduction", weakness_point: "weakness_point", action_plan: "action_plan"},
                "render" : function(data, type, row, meta){
                  return '<a class="btn btn-success btn-sm" href="<?php echo site_url('student_single?pin=');?>'+data.pin+'&name='+data.nick_name+'"><i class="fas fa-eye fa-fw"></i></a>';
                }
              }
            ]  
        });
        $('#new_student_button').on('click', function(){
          $('#nsm').modal('show');
          $('[name="starting_date"]').val(today);
        });
        $('input, select, textarea').on('focus', function(){
          $(this).css('background-color', 'white');
          $('#nsf, #esf').removeClass("alert alert-danger");
          $('#nsf, #esf').html("");
        });
      $('#save_student_btn').on('click',function(){
          var bck = 'background-color',
              clr ='#fbe2e6',
              a=$('#pn').val(),
              b=$('#cn').val(),
              c=$('#nn').val(),
              d=$('#ad').val(),
              e=$('#pb').val(),
              f=$('#db').val(),
              g=$('#ph').val(),
              h=$('#pr').val(),
              i=$('#pd').val(),
              j=$('#sd').val(),
              k=$('#re').val(),
              l=$('#ta').val(),
              m=$('#di').val(),
              n=$('#bg').val(),
              o=$('#si').val(),
              p=$('#wp').val(),
              q=$('#ap').val();
          if (a==''|| b==''||d==''||f=='' ||g==''||h==''||i==''){
            $('#nsf').addClass('alert alert-danger'); $('#nsf').html('Please fill out all required fields'); 
            if (a=='') {$('#pn').css(bck, clr);}if (b=='') {$('#cn').css(bck, clr);}if(d==''){ $('#ad').css(bck, clr);}
            if (f=='') {$('#db').css(bck, clr);}if (g=='') { $('#ph').css(bck, clr);}if(h==''){ $('#pr').css(bck, clr);}if (i=='') {$('#pd').css(bck, clr);
            }
          }else{
            if (isNaN(a)){
              $('#nsf').addClass('alert alert-danger'); 
              $('#nsf').html('pin can only consist of number'); 
              $('#pn').css(bck, clr);
            }else{
              if (isNaN(g)){
                $('#nsf').addClass('alert alert-danger'); 
                $('#nsf').html('phone can only consist of number'); 
                $('#ph').css(bck, clr);
              }else{
                if (isNaN(i)){
                  $('#nsf').addClass('alert alert-danger');
                  $('#nsf').html('Program duration only consist of number'); 
                  $('#pd').css(bck, clr);
                }else{
                  $.ajax({
                    url: '<?php echo site_url('student/pin_availability')?>', 
                    type: 'post', 
                    data:{pin:a}, 
                    success: function(response){
                      if (response=='true' ){
                        $('#nsf').addClass('alert alert-danger'); 
                        $('#nsf').html('pin is already used');
                        $('#pn').css(bck, clr);            
                      }else{
                        $.ajax({
                          type : "POST", 
                          url : "<?php echo site_url('student/save')?>", 
                          dataType : "JSON", 
                          data:{pin:a,complete_name:b,nick_name:c,address:d,place_of_birth:e,date_of_birth:f,phone:g,program:h,program_duration:i,starting_date:j,reason:k,target:l,difficulties:m,bground:n,self_introduction:o,weakness_point:p,action_plan:q},
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
                    }
                  });
                }
              }
            }
          }
          return false;
        });
        $('#show_data').on('click','.item_edit',function(){
          var a=$(this).data('pn'), b=$(this).data('cn'), c=$(this).data('nn'),d=$(this).data('ad'), e=$(this).data('pb'), f=$(this).data('db'), g=$(this).data('ph'), h=$(this).data('pr'), i=$(this).data('pd'), j=$(this).data('sd'), k=$(this).data('re'), l=$(this).data('ta'), m=$(this).data('di'), n=$(this).data('bg'), o=$(this).data('si'), p=$(this).data('wp'), q=$(this).data('ap'), fsp = $(this).data('fsp'), fsp_button = '<input type="checkbox" name="fsp" id="fsp"' ;
          $('#esm').modal('show'); $('[name="pn2"]').val(a); $('[name="cn2"]').val(b); $('[name="nn2"]').val(c); $('[name="ad2"]').val(d); $('[name="pb2"]').val(e); $('[name="db2"]').val(f); $('[name="ph2"]').val(g); $('[name="pr2"]').val(h); $('[name="pd2"]').val(i); $('[name="sd2"]').val(j); $('[name="re2"]').val(k); $('[name="ta2"]').val(l); $('[name="di2"]').val(m); $('[name="bg2"]').val(n); $('[name="si2"]').val(o); $('[name="wp2"]').val(p); $('[name="ap2"]').val(q);
          if (fsp == 'yes'){ fsp_button += 'checked disabled> <label for="fsp">Final Speaking Performance</label>';
          } else { fsp_button += '> <label for="fsp">Final Speaking Performance</label>'; }
          $('#fsp_button').html(fsp_button);
        });
        $('#update_student_btn').on('click',function(){

          var bck = 'background-color',clr='#fbe2e6',a=$('#pn2').val(),b=$('#cn2').val(),c=$('#nn2').val(),d=$('#ad2').val(),e=$('#pb2').val(),f=$('#db2').val(), g=$('#ph2').val(),h=$('#pr2').val(),i=$('#pd2').val(),j=$('#sd2').val(),k=$('#re2').val(),l=$('#ta2').val(),m=$('#di2').val(),n=$('#bg2').val(),  o=$('#si2').val(),p=$('#wp2').val(),action_plan=$('#ap2').val(),fsp='';
          if ($('#fsp').is(':checked')){fsp='yes';}else{fsp='';}
          if (a==''||b==''||d==''|| f=='' || g=='' || h=='' || i==''){
            $('#esf').addClass('alert alert-danger'); 
            $('#esf').html('Please fill out all required fields');
            if(b==''){$('#cn2').css(bck,clr);}
            if(d==''){$('#ad2').css(bck,clr);}
            if(f==''){$('#db2').css(bck,clr);}
            if(g==''){$('#ph2').css(bck,clr);}
            if(i==''){$('#pd2').css(bck,clr);}
          } else{ 
              if (isNaN(g)){$('#esf').addClass('alert alert-danger');$('#esf').html('phone can only consist of number');$('#ph2').css(bck, clr);
              }else{ 
                if (isNaN(i)){$('#esf').addClass('alert alert-danger');$('#esf').html('Program duration only consist of number');$('#pd2').css(bck, clr);
                }else{
                  $.ajax({
                    type : "POST", 
                    url : "<?php echo site_url('student/update')?>",
                    dataType : "JSON",
                    data :{pin:a,complete_name:b,nick_name:c,address:d,place_of_birth:e,date_of_birth:f,phone:g, program:h, program_duration:i,starting_date:j, reason:k,target:l,difficulties:m,bground:n,self_introduction:o, weakness_point:p,action_plan:action_plan},
                    success: function(data){ $('#esm').modal('hide'); $('#mystudents').DataTable().ajax.reload(); }
                  });
                  console.log('fsp is '+fsp);
                  if(fsp == 'yes'){ $.ajax({ type : "POST", url : "<?php echo site_url('student/set_fsp')?>", dataType : "JSON", data : {pin:a}, success : function(data){ console.log('fsp set'); }});
                    $.ajax({ type: "POST", url : "<?php echo site_url('student/fsp_table');?>", dataType : "JSON", data : {pin:a}, success : function (data){ console.log('fsp table for '+a+' created') } });
                  }
                }
              }
          }
          return false;
        });
      }); 
    </script> 
    <?php endif;?>
   
</body> 
</html>
