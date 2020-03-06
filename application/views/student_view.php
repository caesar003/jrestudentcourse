<?php include 'inc/header.php';?>

    <div class="container-fluid">
      <h2>
        <span id="schedule_header">Schedule for today</span>
        <?php if($this->session->userdata('level')== '21'):?>
        <div class="float-right">
          <a title="Switch to user view" href="javascript:void(0);" class="btn btn-secondary tooltip-bottom" id="switch-user"><i class="fas fa-user"></i> Switch View</a>
          <a style="display:none;" title="Switch to admin view" href="javascript:void(0);" class="btn btn-success tooltip-bottom" id="switch-admin"><i class="fas fa-user-shield"></i> Switch View</a>
          <a title="Add new teacher" href="javascript:void(0);" class="btn btn-primary tooltip-bottom" id="new_teacher_button"> <span class="fa fa-user-plus"></span> New Teacher </a>
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
      <table class="table table-sm table-bordered table-striped" id="usr_view" style="display:none;">
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
        <tbody id="adm_user_view">
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
      <?php if($this->session->userdata('level') == '21'): ?>
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
      <?php else: ?>
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
              </div>
            </div>
            <div id="sch_r"></div>
          </div>
        </div>
      </div>
      <?php endif;?>
    </div>
    <hr>
    <div class="container">
      <h3>Other notes : </h3>
      <div class="container" id="teacher_note"></div>
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
                        <div class="col-4"><label for="pn">PIN<sup>&lowast;</sup></label>
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
                          <label for="cn">Name<sup>&lowast;</sup></label>
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
                          <label for="nn">Nick name</label>
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
                          <label for="ad">Address<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="ad" id="ad" placeholder="Adress" required>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pb">Place of Birth</label>
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
                          <label for="db">Date of Birth<sup>&lowast;</sup></label>
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
                          <label for="ph">Phone <sup>&lowast;</sup></label>
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
                          <label for="cnst2">Name<sup>&lowast;</sup></label>
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
                          <label for="nnst2">Nick name</label>
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
                          <label for="adrst2">Address<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="adrst2" id="adrst2" placeholder="Adress" required>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pbst2">Place of Birth</label>
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
                          <label for="dbst2">Date of Birth<sup>&lowast;</sup></label>
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
                          <label for="phst2">Phone <sup>&lowast;</sup></label>
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
                          <label for="cnst3">Name<sup>&lowast;</sup></label>
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
                          <label for="nnst3">Nick name</label>
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
                          <label for="adrst3">Address<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="adrst3" id="adrst3" placeholder="Adress" required>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pbst3">Place of Birth</label>
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
                          <label for="dbst3">Date of Birth<sup>&lowast;</sup></label>
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
                          <label for="phst3">Phone <sup>&lowast;</sup></label>
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
                          <label for="cnst4">Name<sup>&lowast;</sup></label>
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
                          <label for="nnst4">Nick name</label>
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
                          <label for="adrst4">Address<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="adrst4" id="adrst4" placeholder="Adress" required>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pbst4">Place of Birth</label>
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
                          <label for="dbst4">Date of Birth<sup>&lowast;</sup></label>
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
                          <label for="phst4">Phone <sup>&lowast;</sup></label>
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
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pr">Program<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
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
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pd">Program Duration<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(80,83,210);" class="fa fa-hourglass-end fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="pd" placeholder="Duration" id="pd">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="sd">Starting Date</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:rgb(80,170,243);" class="fa fa-flag fa-fw"></i></span>
                          </div>
                          <input type="date" class="form-control" name="sd" id="sd">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="re">Reason</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(80,255,20);" class="fa fa-question-circle fa-fw"></i></span>
                          </div>
                          <textarea class="form-control" name="re" id="re" placeholder="Reason for studying"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="ta">Target</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color: rgb(190,110,27);" class="fa fa-crosshairs fa-fw"></i></span>
                          </div>
                          <textarea class="form-control" name="ta" id="ta" placeholder="Target"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="bg">Background</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(100,120,190);" class="fa fa-graduation-cap fa-fw"></i></span>
                          </div>
                          <textarea class="form-control" name="bg" id="bg" placeholder="Background"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="di">Difficulties</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i style="color:rgb(255,0,255);" class="fa fa-thumbs-down fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="di" id="di" placeholder="Difficulties">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="si">Self Introduction</label>
                        </div>
                        <div class="input-group col">
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
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="wp">Weakness Points</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i style="color:rgb(255,20,60);" class="fas fa-exclamation-triangle fa-fw"></i>
                            </span>
                          </div>
                          <textarea class="form-control" name="wp" id="wp" placeholder="Student's main problems"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="ap">Action Plan</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(0,120,80);" class="fa fa-wrench fa-fw"></i> </span>
                          </div>
                          <textarea class="form-control" name="ap" id="ap" placeholder="Suggestions and recommendation"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="sr">Special Request</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(120, 78,80);" class="fa fa-sticky-note fa-fw"></i> </span>
                          </div>
                          <textarea class="form-control" name="sr" id="sr" placeholder="Special request from student's parents etc."></textarea>
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
              <div class="row" id="courseAndPers">
                <div class="col-lg-5">
                  <fieldset>
                    <legend>Personal Information <a title="click for group study" id="add_one_e" href="javascript:void(0);"><i class="fas fa-plus-circle fa-fw"></i></a></legend>
                    <div class="form-row">
                      <div class="form-group col-12 row">
                        <div class="col-4"><label for="pn_e">PIN<sup>&lowast;</sup></label>
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
                          <label for="cn_e">Name<sup>&lowast;</sup></label>
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
                          <label for="nn_e">Nick name</label>
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
                          <label for="ad_e">Address<sup>&lowast;</sup></label>
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
                          <label for="pb_e">Place of Birth</label>
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
                          <label for="db_e">Date of Birth<sup>&lowast;</sup></label>
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
                          <label for="ph_e">Phone <sup>&lowast;</sup></label>
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
                          <label for="cnst2_e">Name<sup>&lowast;</sup></label>
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
                          <label for="nnst2_e">Nick name</label>
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
                          <label for="adrst2_e">Address<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="adrst2_e" id="adrst2_e" placeholder="Adress" required>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pbst2_e">Place of Birth</label>
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
                          <label for="dbst2_e">Date of Birth<sup>&lowast;</sup></label>
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
                          <label for="phst2_e">Phone <sup>&lowast;</sup></label>
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
                          <label for="cnst3_e">Name<sup>&lowast;</sup></label>
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
                          <label for="nnst3_e">Nick name</label>
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
                          <label for="adrst3_e">Address<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="adrst3_e" id="adrst3_e" placeholder="Adress" required>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pbst3_e">Place of Birth</label>
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
                          <label for="dbst3_e">Date of Birth<sup>&lowast;</sup></label>
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
                          <label for="phst3_e">Phone <sup>&lowast;</sup></label>
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
                          <label for="cnst4_e">Name<sup>&lowast;</sup></label>
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
                          <label for="nnst4_e">Nick name</label>
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
                          <label for="adrst4_e">Address<sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend"> <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="adrst4_e" id="adrst4_e" placeholder="Address" required>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pbst4_e">Place of Birth</label>
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
                          <label for="dbst4_e">Date of Birth<sup>&lowast;</sup></label>
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
                          <label for="phst4_e">Phone <sup>&lowast;</sup></label>
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
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pr2">Program <sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
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
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="pd2">Program Duration <sup>&lowast;</sup></label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                           <span class="input-group-text"><i style="color:rgb(80,83,210);" class="fa fa-hourglass-end fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="pd2" id="pd2" placeholder="Duration">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="sd2">Starting Date</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                             <span class="input-group-text"><i style="color:rgb(80,170,243);" class="fa fa-flag fa-fw"></i></span>
                          </div>
                          <input type="date" class="form-control" name="sd2" id="sd2">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="re2">Reason</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(80,255,20);" class="fa fa-question-circle fa-fw"></i></span>
                          </div>
                          <textarea class="form-control" name="re2" id="re2" placeholder="Reason for studying"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="ta2">Target</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                             <span class="input-group-text"><i style="color: rgb(190,110,27);" class="fa fa-crosshairs fa-fw"></i></span>
                          </div>
                          <textarea class="form-control" name="ta2" id="ta2" placeholder="Target after completion"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="bg2">Background</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(100,120,190);" class="fa fa-graduation-cap fa-fw"></i></span>
                          </div>
                          <textarea class="form-control" name="bg2" id="bg2" placeholder="Background"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="di2">Difficulties</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i style="color:rgb(255,0,255);" class="fa fa-thumbs-down fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="di2" id="di2" placeholder="Difficulties">
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="si2">Self Introduction</label>
                        </div>
                        <div class="input-group col">
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
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="wp2">Weakness Points</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(255,20,60);" class="fas fa-exclamation-triangle fa-fw"></i></span>
                          </div>
                          <textarea class="form-control" name="wp2" id="wp2" placeholder="Student's main problems"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="ap2">Action Plan</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                          <span class="input-group-text"><i style="color:rgb(0,120,80);" class="fa fa-wrench fa-fw"></i> </span>
                          </div>
                          <textarea class="form-control" name="ap2" id="ap2" placeholder="Suggestions and recommendations"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-12 row">
                        <div class="col-4">
                          <label for="sr2">Special Request</label>
                        </div>
                        <div class="input-group col">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(120, 78,80);" class="fa fa-sticky-note fa-fw"></i> </span>
                          </div>
                          <textarea class="form-control" name="sr2" id="sr2" placeholder="Special request from student's parents etc."></textarea>
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
    <form id="add_teacher">
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
              <button type="submit" id="btn_save_teacher" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
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
    <script type="text/javascript">
      var u = "<?php echo site_url();?>",
          baseurl = "<?php echo base_url();?>",
          teacher = "<?php echo $this->session->userdata('username');?>",
          user = teacher;
          avatar = "<?php echo $this->session->userdata('avatar');?>",
          sender = "<?php echo $this->session->userdata('id');?>";
    </script>
    <?php if($this->session->userdata('level') == '21'):?>
    <script type="text/javascript" src="<?php echo base_url('assets/js/adm-schedule.js?v=1.0');?>"></script>
    <?php else: ?>
    <script type="text/javascript" src="<?php echo base_url('assets/js/usr-schedule.js')?>"></script>
    <?php endif;?>
    <?php if($this->session->userdata('level') == '17'):?>
    <script type="text/javascript" src="<?php echo base_url('assets/js/spv.js?v=1.0');?>"></script>
    <?php else: ?>
    <script type="text/javascript" src="<?php echo base_url('assets/js/user.js?v=1.0')?>"></script>
    <?php endif;?>
    <script src="<?php echo base_url('assets/js/chat.js')?>"></script>
    <script>
      $(document).ready(function(){
        get_teacher_note();
        function get_teacher_note(){
          $.ajax({
            type : "ajax",
            url : "<?php echo site_url('after_teaching/get_note') ;?>",
            dataType : "json",
            success : function(data){
              var note = '';
              for(var i=0;i<data.length;i++){
                note += `<p><span class="note_date">${$.format.date(data[i].created_date, "E, MMM/dd/yy, H:mm")}</span> | <span class="note">${data[i].note}</span></p>`;
              }
              $('#teacher_note').html(note);
            }
          });
        }
      });
    </script>
</body>
</html>
