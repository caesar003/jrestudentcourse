<?php include 'inc/header.php';
    foreach ($students->result() as $row){
      $pin=$row->pin;
      $name=$row->nick_name;
      $program=$row->program;
      $program_id=$row->program_id;
    }
?>
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo site_url();?>"><i class="fas fa-home fa-fw"></i> Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-circle fa-fw"></i><?php echo $name;?> - <?php echo $pin;?> </li>
        </ol>
      </nav>
    </div>    
    <div class="container-fluid">
      <div class="row">
        <!-- STUDENT INFO -->
        <div class="col-md-3 col-lg-3" id="student_info_div">
          <span><a id="new_session_btn" title="New Session" class="btn btn-secondary tooltip-right" href="javascript:void(0);"><span class="fa fa-plus"></span></a></span>
          <span id="edit_student_span"></span>
          <h3 class="page-header"><small>Student </small>Information </h3>
          <ul class="list-group" id="student_info"></ul>
        </div><!-- END STUDENT INFO -->
        <div class="col-md-9 col-lg-9">
          <div class="container">
            <!-- TABS -->
            <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-course-tab" data-toggle="pill" href="#pills-course" role="tab" aria-controls="pills-course" aria-selected="true">Course</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-syllabus-tab" data-toggle="pill" href="#pills-syllabus" role="tab" aria-controls="pills-syllabus" aria-selected="false">Syllabus</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-test-tab" data-toggle="pill" href="#pills-test" role="tab" aria-controls="pills-test" aria-selected="false">Tests</a>
              </li>
              <li class="nav-item" id="fsp_tab">
                <a class="nav-link" id="pills-fsp-tab" data-toggle="pill" href="#pills-fsp" role="tab" aria-controls="pills-fsp" aria-selected="false">FSP</a>
              </li>
            </ul><!-- END TABS --> <!-- this is a comment -->
            <!-- TABS CONTENTS -->
            <div class="tab-content" id="pills-tabContent">
              <!-- COURSE -->
              <div class="table-responsive tab-pane fade show active" id="pills-course" role="tabpanel" aria-labelledby="pills-course-tab">
                <h3><small>Student </small>Course</h3>
                <p>This is the list of recorded session. Hit the little pencil button <a href="javascript:void(0);" id="edit_course_title"><i style="font-size:small;background-color:#9954BB;color:white;padding-right:3px;padding-left:3px;padding-top:2px;padding-bottom:2px;border-radius:20%;" class="fas fa-pencil-alt"></i></a> on the last column of every row to make changes, or plus button <a href="javascript:void(0);" id="add_course_title"><i style="font-size:small;color:white;background-color:black;padding-right:3px;padding-left:3px;padding-top:2px;padding-bottom:2px;border-radius:20%;" class="fas fa-plus"></i></a> at the top of the Student Information to add a new one.</p>
                <br>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Note: </h5>
                    <p class="card-text" id="teacher_note"></p>
                    
                  </div>
                </div>
                <br>
                <table class="table table-bordered table-striped table-sm" id="mycourse">
                  <thead class="bg-dark text-light">
                    <tr>
                      <th title="meeting number"><i class="fa fa-hashtag fa-fw"></i></th>
                      <th title="Date, time"><i class="fa fa-calendar fa-fw"></i> Date, time</th>
                      <th title="Teacher"><i class="fa fa-user-circle fa-fw"></i></th>
                      <th title="Meeting duration"><i class="fas fa-clock fa-fw"></i> Duration</th>
                      <th title="Material"><i class="fa fa-book fa-fw"></i> Material</th>
                      <th title="Evaluation"><i class="fa fa-list-ul fa-fw"></i> Evaluation</th>
                      <th title="Writing assessment"><i class="fas fa-pencil-alt fa-fw"></i></th>
                      <th title="Speaking assessment"><i class="fa fa-bullhorn fa-fw"></i></th>
                      <th style="text-align: right;"><i class="fas fa-wrench fa-fw"></i></th>
                    </tr>
                  </thead>
                  <tbody id="show_course"></tbody>
                </table>
              </div> <!-- END COURSE -->
              <!-- SYLLABUS -->
              <div class="tab-pane fade" id="pills-syllabus" role="tabpanel" aria-labelledby="pills-syllabus-tab">
                <!--do something here -->
                <h3>
                  <span id="syllabus_tab_header"></span>
                </h3>
                
                <div class="row" id="show_syllabus">
                  
                </div>
              </div> <!-- END SYLLABUS -->
              <!-- TEST -->
              <div class="table-responsive tab-pane fade" id="pills-test" role="tabpanel" aria-labelledby="pills-test-tab">
                <h3><small>Student </small>Tests</h3>
                <p>Test conducted appear below. Click on them to see or upload files of the individual test.</p>
                <table width="100%" class="display table table-bordered table-striped table-sm" id="my_tests">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Date</th>
                      <th>Teacher</th>
                      <th>Duration</th>
                      <th>Material</th>
                      <th>Evaluation</th>
                      <th>Test</th>
                      <!--th style="text-align: right;">Actions</th-->
                    </tr>
                  </thead>
                  <tbody id="show_alltest"></tbody>
                </table>
              </div> <!-- END TEST -->
              <!-- FSP -->
              <div class="tab-pane fade" id="pills-fsp" role="tabpanel" aria-labelledby="pills-fsp-tab">
                <h3>Final Speaking Performance
                  <div class="float-right">
                    <a title="Add New Topic" href="#new_fsp_modal" data-toggle="modal" data-target="#new_fsp_modal" class="btn btn-secondary tooltip-bottom" id="fsp_add_topic"><i class="fa fa-plus"></i> New Topic</a>
                  </div>
                </h3>
                <table width="100%" class="display table table-bordered table-striped table-sm" id="my_fsp">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Topic</th>
                      <th>Good</th>
                      <th>Average</th>
                      <th>Need Improvement</th>
                      <th>Comment</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="fsp_data">
                  </tbody>
                </table>
              </div>
            </div> <!-- END TABS CONTENTS-->
          </div>
        </div>
      </div>
    </div>
    <?php include 'inc/footer.php';?>
    <!-- EDIT SYLLABUS -->
    <form>
      <div class="modal fade" id="edit_syllabus_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content add">
            <div class="modal-header">
              <h5 class="modal-title">Edit Syllabus</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body row" id="syllabus_edit_div">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close </button>
            </div>
          </div>
        </div>
      </div>
    </form> <!-- END EDIT SYLLABUS -->
    <!-- NEW  FSP ITEM -->
    <form>
      <div class="modal fade" id="new_fsp_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content add">
            <div class="modal-header">
              <h5 class="modal-title">Add Topic</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="fsp_topic">Topic</label>
                  <input type="text" class="form-control" name="fsp_topic" id="fsp_topic" placeholder="Topic">
                </div>
                <div class="form-group">
                  <label for="comment">Comment</label>
                  <textarea name="fsp_comment" id="fsp_comment" class="form-control" placeholder="Comment"></textarea>
                </div>   
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="fsp_result" id="good" value="good">
                  <label class="form-check-label" for="good">
                    Good
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="fsp_result" id="average" value="average">
                  <label class="form-check-label" for="average">
                    Average
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="fsp_result" id="need_improvement" value="need_improvement">
                  <label class="form-check-label" for="need_improvement">
                    Need improvement
                  </label>
                </div>              
            </div>
            <div class="modal-footer">
              <input type="hidden" name="pin_fsp" id="pin_fsp" value="<?php echo $pin;?>">
              <span class="ffb" id="nff"></span>
              <button type="reset" class="btn btn-info"><i class="fas fa-undo"></i> Reset</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close </button>
              <button type="button" type="submit" id="btn_save_fsp" class="btn btn-primary"><i class="fa fa-check"></i> Save </button>
            </div>
          </div>
        </div>
      </div>
    </form> <!-- END NEW FSP ITEM -->
    <!-- EDIT FSP ITEM -->
    <form>
      <div class="modal fade" id="edit_fsp_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content add">
            <div class="modal-header">
              <h5 class="modal-title">Add Topic</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="fsp_topic_edit">Topic</label>
                  <input type="text" class="form-control" name="fsp_topic_edit" id="fsp_topic_edit" placeholder="Topic">
                </div>
                <div class="form-group">
                  <label for="comment">Comment</label>
                  <textarea name="fsp_comment_edit" id="fsp_comment_edit" class="form-control" placeholder="Comment"></textarea>
                </div>   
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="fsp_result_edit" id="good_edit" value="good">
                  <label class="form-check-label" for="good_edit">
                    Good
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="fsp_result_edit" id="average_edit" value="average">
                  <label class="form-check-label" for="average_edit">
                    Average
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="fsp_result_edit" id="need_improvement_edit" value="need_improvement">
                  <label class="form-check-label" for="need_improvement_edit">
                    Need improvement
                  </label>
                </div>              
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_edit" id="id_edit">
              <span class="ffb" id="eff"></span>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              <button type="button" type="submit" id="btn_update_fsp" class="btn btn-primary"><i class="fa fa-check"></i>Save </button>
            </div>
          </div>
        </div>
      </div>
    </form> <!-- END EDIT FSP ITEM -->
       <!-- NEW COURSE -->
    <form>
      <div class="modal fade" id="new_session_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content add">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Session</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col" id="course_div">
                  <div class="form-row">
                    <div class="form-group col-6">
                      <label for="me">Meeting <sup>&lowast;</sup></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-hashtag fa-fw"></i></span>
                        </div>
                        <input class="form-control" type="text" name="me" id="me" placeholder="Meeting">
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="cd">Date <sup>&lowast;</sup></label>
                      <div class="input-group" id="course_date_div">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar fa-fw"></i></span>
                        </div>
                        <input type="datetime-local" name="cd" id="cd" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="tc">Teacher <sup>&lowast;</sup></label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user fa-fw"></i></span></div>
                        <input type="text" name="tc" id="tc" class="form-control" placeholder="Put your name here" required value="<?php echo $this->session->userdata('username');?>">
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="du">Duration <sup>&lowast;</sup></label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-clock fa-fw"></i></span></div>
                        <select class="form-control" name="du" id="du">
                          <option value="">How long?</option>
                          <option value="60">60 minutes</option>
                          <option value="55">55 minutes</option>
                          <option value="50">50 minutes</option>
                          <option value="45">45 minutes</option>
                          <option value="40">40 minutes</option>
                          <option value="35">35 minutes</option>
                          <option value="30">30 minutes</option>
                          <option value="25">25 minutes</option>
                          <option value="20">20 minutes</option>
                          <option value="<20">&lt;20 minutes</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="ma">Material <sup>&lowast;</sup></label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-book fa-fw"></i></span></div>
                        <textarea name="ma" id="ma" class="form-control" placeholder="(1.1 - 1-3) Greeting..."></textarea>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="ev">Evaluation <sup>&lowast;</sup></label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-list-ul fa-fw"></i></span>
                        </div>
                        <textarea name="ev" id="ev" class="form-control" placeholder="He was now able to ..."></textarea>
                      </div>
                    </div>
                    <div class="form-group col">
                      <label for="wr">Writing </label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-pencil-alt fa-fw"></i></span>
                        </div>
                        <input type="text" name="wr" id="wr" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col">
                      <label for="sp">Speaking</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-bullhorn fa-fw"></i></span>
                        </div>
                        <input type="text" name="sp" id="sp" class="form-control">
                      </div>
                    </div>
                  </div>             
                </div> <!-- end course div -->
                <div id="test_div"> <!-- test div -->
                  <div class="form-group">
                    <label for="tnu">#</label>
                    <div class="input-group">
                      <select name="tnu" id="tnu" class="form-control">
                        <option value="">Choose</option>
                        <option value="1st">1<sup>st</sup></option>
                        <option value="2nd">2<sup>nd</sup></option>
                        <option value="3rd">3<sup>rd</sup></option>
                        <option value="4th">4<sup>th</sup></option>
                        <option value="5th">5<sup>th</sup></option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tn">Test</label>
                    <div class="input-group">
                      <select name="tn" id="tn" class="form-control">
                        <option value="">Choose</option>
                        <option value="Pre Written">Pre Written</option>
                        <option value="Pre Spoken">Pre Spoken</option>
                        <option value="Written">Written</option>
                        <option value="Spoken">Spoken</option>
                        <option value="Remedial">Remedial</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="otn">of</label>
                    <div class="input-group">
                      <select name="otn" id="otn" class="form-control" disabled>
                        <option value="">Choose</option>
                        <option value="1st">1<sup>st</sup></option>
                        <option value="2nd">2<sup>nd</sup></option>
                        <option value="3rd">3<sup>rd</sup></option>
                        <option value="4th">4<sup>th</sup></option>
                        <option value="5th">5<sup>th</sup></option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ot">Test</label>
                      <select name="ot" id="ot" class="form-control" disabled>
                        <option value="">Choose</option>
                        <option value="written">Written</option>
                        <option value="spoken">Spoken</option>
                      </select>
                  </div>
                </div>
              </div>
              <div class="test_check"><input type="checkbox" name="test" id="test"><label for="test">  Test</label></div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="pin" id="pin" value="<?php echo $pin;?>">
              <span class="ffb" id="nsef"></span>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close </button>
              <button type="button" type="submit" id="btn_save" class="btn btn-primary"><i class="fa fa-check"></i>Save </button>
            </div>
          </div>
        </div>
      </div>
    </form> <!-- END NEW COURSE -->
        <!-- EDIT COURSE -->
    <form id="edit_session">
      <div class="modal fade" id="edit_session_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content edit">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Recorded</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" id="edit_session_body">
              <div class="row">
                <div id="edit_course_div">
                  <div class="form-row">
                    <div class="form-group col-6">
                      <label for="me2">Meeting <sup>&lowast;</sup></label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-hashtag fa-fw" aria-hidden="true"></i></span>
                        </div>
                        <input class="form-control" type="text" name="me2" id="me2" placeholder="Meeting" readonly>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="cd2">Date <sup>&lowast;</sup></label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar fa-fw"></i></span></div>
                        <input type="datetime-local" name="cd2" id="cd2" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="tc2">Teacher <sup>&lowast;</sup></label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user fa-fw"></i></span></div>
                        <input type="text" name="tc2" id="tc2" class="form-control" placeholder="Put your name here" required>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="du2">Duration <sup>&lowast;</sup></label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-clock fa-fw"></i></span>
                        </div>
                        <select class="form-control" name="du2" id="du2" required>
                          <option value="">How long?</option>
                          <option value="60">60 minutes</option>
                          <option value="55">55 minutes</option>
                          <option value="50">50 minutes</option>
                          <option value="45">45 minutes</option>
                          <option value="40">40 minutes</option>
                          <option value="35">35 minutes</option>
                          <option value="30">30 minutes</option>
                          <option value="25">25 minutes</option>
                          <option value="20">20 minutes</option>
                          <option value="<20">&lt;20 minutes</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="ma2">Material <sup>&lowast;</sup></label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-book fa-fw"></i></span>
                        </div>
                        <textarea name="ma2" id="ma2" class="form-control" required></textarea>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="ev2">Evaluation <sup>&lowast;</sup></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-list-ul fa-fw"></i></span></div>
                        <textarea name="ev2" id="ev2" class="form-control" required></textarea>
                      </div>
                    </div>
                    <div class="form-group col">
                      <label for="wr2">Writing</label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-pencil-alt fa-fw"></i></span></div>
                        <input type="text" name="wr2" id="wr2" class="form-control">
                      </div>
                    </div>
                    <div class="form-group col">
                      <label for="sp2">Speaking</label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-bullhorn fa-fw"></i></span>
                        </div>
                        <input type="text" name="sp2" id="sp2" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <div id="edit_test_div">
                  <div class="form-group">
                    <label for="tnu2">#</label>
                    <div class="input-group">
                      <select name="tnu2" id="tnu2" class="form-control">
                        <option value="">Choose</option>
                        <option value="1st">1<sup>st</sup></option>
                        <option value="2nd">2<sup>nd</sup></option>
                        <option value="3rd">3<sup>rd</sup></option>
                        <option value="4th">4<sup>th</sup></option>
                        <option value="5th">5<sup>th</sup></option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tn2">Test</label>
                    <div class="input-group">
                      <select name="tn2" id="tn2" class="form-control">
                        <option value="">Choose</option>
                        <option value="Pre Written">Pre Written</option>
                        <option value="Pre Spoken">Pre Spoken</option>
                        <option value="Written">Written</option>
                        <option value="Spoken">Spoken</option>
                        <option value="Remedial">Remedial</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="otn2">of</label>
                    <div class="input-group">
                      <select class="form-control" name="otn2" id="otn2" disabled>
                        <option value="">Choose</option>
                        <option value="1st">1<sup>st</sup></option>
                        <option value="2nd">2<sup>nd</sup></option>
                        <option value="3rd">3<sup>rd</sup></option>
                        <option value="4th">4<sup>th</sup></option>
                        <option value="5th">5<sup>th</sup></option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ot2">Test</label>
                    <div class="input-group">
                      <select class="form-control" name="ot2" id="ot2" disabled>
                        <option value="">Choose</option>
                        <option value="written">Written</option>
                        <option value="spoken">Spoken</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div id="test_check_edit"></div>
            </div>
            <div class="modal-footer">
              <span class="ffb" id="esef"></span>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close </button>
              <button type="button" type="submit" id="btn_update" class="btn btn-primary"><i class="fa fa-check"></i>Update</button>
            </div>
          </div>
        </div>
      </div>
    </form><!-- EDIT COURSE-->
     <!-- DELETE  COURSE -->
    <form>
      <div class="modal fade" id="delete_session_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content add">
            <div class="modal-header">
              <h5 class="modal-title">Delete this session?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Please execute with care! Once it's done, it's gone! <br> And there is no coming back. &#128512;  
            </div>
            <div class="modal-footer">
              <input type="hidden" name="m_d" id="m_d">
              <input type="hidden" name="t_d" id="t_d">
              <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times fa-fw"></i> just take me back.</button>
              <button type="button" id="btn_delete_session" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i> Yeah, get rid of it!</button>
            </div>
          </div>
        </div>
      </div>
    </form> <!-- END COURSE STUDENT -->
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

    <?php include 'inc/chat_dialog.php';?>
    <?php include 'inc/scripts.php';?>
    <?php include 'inc/chat-script.php';?>
    <script type="text/javascript">/* script syllabus */
      $(document).ready(function(){
        syll();
        function syll(){
          var pin = "<?php echo $pin;?>",
              prg = "<?php echo $program_id;?>";
          if(prg!=''){
            show_syllabus(pin,prg);
          } else {
            no_syllabus();
          }
        } 
        // show syllabus 
        function show_syllabus(pin,prg) {
          $.ajax({
            type: 'post',
            url: '<?php echo site_url('syllabus/get_syllabus')?>',
            dataType: 'json',
            data :{pin:pin, prg:prg},
            success: function(data) {
              var html = '', i;
              for (i = 0; i < data.length; i++) {
                if (data[i].topic == 0 && data[i].ind == 0) {
                  html += '<div class="col-2 syll_section">' + 
                            data[i].section + 
                          '</div>' + 
                          '<div class="col-10 syll_section">' +
                            data[i].indicator+ 
                          '</div>';
                } else if (data[i].topic != 0 && data[i].ind == 0) { 
                  html += '<div class="col-2 syll_topic">' + 
                            data[i].section + '.' + data[i].topic + 
                          '</div>' + 
                          '<div class="col-10 syll_topic">' + 
                            data[i].indicator + 
                          '</div>';
                } else { 
                  if (data[i].status == 1) { 
                    html += '<div class="col-2 syll_ind"><span class="topic_discussed">' + 
                              data[i].section + '.' + data[i].topic + '.' + data[i].ind + 
                            '</span></div>' + 
                            '<div class="col-8 syll_ind">'+
                              '<span class="topic_discussed">' + data[i].indicator + '</span>'+
                            '</div>' + 
                            '<div class="col-2 syll_ind">'+
                            '<a href="javascript:void(0);" data-stat="0" data-id="'+data[i].id+'" class="btn btn-default btn-sm topic_check"><i class="fa fa-check-square fa-2x"></i></a>'+
                            '</div>';
                  } else {
                    html += '<div class="col-2 syll_ind">' + 
                              data[i].section + '.' + data[i].topic + '.' + data[i].ind + 
                            '</div>' + 
                            '<div class="col-8 syll_ind">' + 
                              data[i].indicator + 
                            '</div>' + 
                            '<div class="col-2 syll_ind">'+
                            '<a href="javascript:void(0);" data-stat="1" data-id="'+data[i].id+'" class="btn btn-default btn-sm topic_check"><i class="fa fa-square fa-2x"></i></a>'+
                            '</div>';
                  }
                }
              }
              $('#show_syllabus').html(html);
            }
          });
        }
        /* check discussed topics */
        $('#show_syllabus').on('click', '.topic_check', function(){
          var id = $(this).data('id'),
              stat = $(this).data('stat'),
              pin = "<?php echo $pin;?>";
          $.ajax({
            type: "POST",
            url : "<?php echo site_url('syllabus/check');?>",
            dataType : "JSON",
            data : {id : id, stat: stat, pin : pin},
            success : function(data){
              //show_syllabus();
            }
          })
        });
        function no_syllabus(){
          var header='Choose the syllabus',
              msg = `<div class="col-4">
                      <ul class="list-group">
                        <li class="list-group-item syllabus-level" data-level="1">Elementary - Kids</li>
                        <li class="list-group-item syllabus-level" data-level="2">Elementary</li>
                        <li class="list-group-item syllabus-level" data-level="3">Junior Student</li>
                        <li class="list-group-item syllabus-level" data-level="4">Senior Student</li>
                        <li class="list-group-item syllabus-level" data-level="5">General English</li>
                      </ul>
                    </div>
                    <div class="col-8">
                      Syllabus for this student is still empty. Click one of these on the left side to see what are under them.</em>
                    </div>`;
          $('#syllabus_tab_header').html(header);
          $('#show_syllabus').html(msg);
        }
        $('#show_syllabus').on('click','.syllabus-level', function(){
          var level = $(this).data('level'),
              a = '';
          if(level == 1){
            a = "English fo Kids";
          } else if(level ==2){
            a = "Elementary Student";
          } else if(level == 3){
            a = "Junior High School";
          } else if(level == 4){
            a = "Senior Student";
          } else{
            a = "General English";
          }
          header = "Syllabus for "+a;
          $.ajax({
            url : "<?php echo site_url('syllabus/get_sections');?>",
            type : "post",
            dataType : "json",
            data : {level:level},
            success : function(data){
              var msg =`<div class="col-4">
                          <ul class="list-group">`, i;
              for (i=0;i<data.length;i++){
                msg += `<li class="list-group-item syllabus_section" data-level="${level}" data-section="${data[i].sections}">${data[i].sections}. ${data[i].indicator} <span class="float-right"><input name="section_${data[i].sections}" id="section_${data[i].sections}" type="checkbox"></span></li>`;
              }
              msg += `</ul> 
                    </div>
                    <div class="col-8">
                      <div class="container">
                        <input type="hidden" name="level" id="level" value="${level}">
                        <button class="btn btn-sm btn-success go_back_btn" type="button">Go Back</button> 
                        <button class="btn btn-sm btn-primary proceed_btn" id="proceed_btn" type="button">Continue</button>
                      </div>
                      <br>
                      <div class="container" id="show_topic">
                        Click on each item to see what are under them, and tick the little checkbox to continue. (Or you can simply leave 'em all unchecked and customize them at anytime you wish.)
                      </div>
                    </div>`;
              $('#show_syllabus').html(msg);
              $('#syllabus_tab_header').html(header);
            }
          });
        });
        $('#show_syllabus').on('click', '.syllabus_section', function(){
          $(this).siblings().removeClass('act');
          $(this).addClass('act');
          var level = $(this).data('level'),
              section = $(this).data('section');
          $.ajax({
            url:"<?php echo site_url('syllabus/get_topics');?>",
            type : "post",
            dataType : "json",
            data : {level:level,section:section},
            success : function(data){
              var i, 
                  html = '<ul>';
              for(i=0;i<data.length;i++){
                html += '<li>'+data[i].sections+'.'+data[i].topics+' - '+data[i].indicator+'</li>';
              }
              html += '</ul>';
              $('#show_topic').html(html);
            }
          });
        });
        
        $('#show_syllabus').on('click', '.proceed_btn', function(){
          /* 1 el = 6
             2 kid = 6 
             3 junior 7
             4 sen = 6
             5 general = 8 
           */
          var level = $('#level').val(),
              pin = "<?php echo $pin;?>";
          if(level ==1||level==2||level==4){
            var a = '',b ='', c ='', d ='', e ='', f ='';
            if($('#section_1').is(':checked')){a =1;}
            if($('#section_2').is(':checked')){b =2;}
            if($('#section_3').is(':checked')){c =3;}
            if($('#section_4').is(':checked')){d =4;}
            if($('#section_5').is(':checked')){e =5;}
            if($('#section_6').is(':checked')){f =6;}
            $.ajax({
              type : "post",
              url : "<?php echo site_url('syllabus/insert');?>",
              dataType : "<?php echo site_url();?>",
              data : {pin:pin, level:level},
              success : function(data){
                console.log('syllabus inserted');
              }
            });
            $.ajax({
              type : "post",
              url : "<?php echo site_url('syllabus/set_program');?>",
              dataType : "json",
              data : {pin:pin, level:level},
              success : function(data){
                console.log('program set');
              }
            });
            $.ajax({
              type : "post",
              url : "<?php echo site_url('syllabus/assign');?>",
              dataType : "json",
              data : {pin: pin, section:section},
              success : function(data){
                console.log('section assigned');
              }
            });
            var sections = [a,b,c,d,e,f];
            var i;
            for (i=0;i<sections.length;i++){
              if(sections[i] != 0){
                console.log(sections[i]);
                // set program into students table
                // set insert appropriate data sets to syllabus table
                // assign the chosen sections
              }
            }
          }/* else if(level==3){
            
          } else if(level==5){
            
          } */
        });
       
        $('#show_syllabus').on('click', '.go_back_btn',function(){
          console.log('go back');
          no_syllabus();
        });
        $('#show_syllabus').on('click','.syllabus-section', function(){
          $(this).siblings().removeClass('highlighted');
          $(this).addClass('highlighted');
          var level = $(this).data('level');
          var section = $(this).data('section');
          $.ajax({
            url:"<?php echo site_url('syllabus/get_topics');?>",
            type : "post",
            dataType : "json",
            data : {level:level,section:section},
            success :function(data){
              var i, html ="";
              for (i=0;i<data.length;i++){
                html += data[i].sections+'.'+data[i].topics+' - '+data[i].indicator+'<br>';
              }
              $('#topics').html(html);
            }
          });
        });        
      });
    </script>
    <script type = "text/javascript" >
      $(document).ready(function() {
        get_student_detail();
        function get_student_detail(){
          var pin = "<?php echo $pin;?>";
          $.ajax({
            type : 'post',
            url : '<?php echo site_url('student_single/get_student_info');?>',
            dataType : 'json',
            data : {pin:pin},
            success : function(data){
              var html = '',
                  edit_student_button= '',
                  teacher_note='',
                  i;
              for(i=0;i<data.length;i++){
                edit_student_button += '<a title="Edit" href="javascript:void(0);" '+
                  'class="btn btn-info tooltip-bottom student_info_edit"'+
                  'data-grp="'+data[i].grp+'" '+
                  'data-pn="'+data[i].pin+'" '+
                  'data-cn="'+data[i].complete_name+'" '+
                  'data-nn="'+data[i].nick_name+'" '+
                  'data-ad="'+data[i].address+'" '+
                  'data-pb="'+data[i].place_of_birth+'" '+
                  'data-db="'+($.format.date(data[i].date_of_birth, "yyyy-MM-dd"))+'" '+
                  'data-ph="'+data[i].phone+'"'+
                 'data-cnst2="'+data[i].cnst2+'"'+
                 'data-nnst2="'+data[i].nnst2+'"'+
                  'data-adrst2="'+data[i].adrst2+'"'+
                  'data-pobst2="'+data[i].pobst2+'"'+
                  'data-dobst2="'+($.format.date(data[i].dobst2, "yyyy-MM-dd"))+'"'+
                  'data-phst2="'+data[i].phst2+'"'+
                  'data-cnst3="'+data[i].cnst3+'"'+
                  'data-nnst3="'+data[i].nnst3+'"'+
                  'data-adrst3="'+data[i].adrst3+'"'+
                  'data-pobst3="'+data[i].pobst3+'"'+
                  'data-dobst3="'+($.format.date(data[i].dobst3, "yyyy-MM-dd"))+'"'+
                  'data-phst3="'+data[i].phst3+'"'+
                  'data-cnst4="'+data[i].cnst4+'"'+
                  'data-nnst4="'+data[i].nnst4+'"'+
                  'data-adrst4="'+data[i].adrst4+'"'+
                  'data-pobst4="'+data[i].pobst4+'"'+
                  'data-dobst4="'+($.format.date(data[i].dobst4, "yyyy-MM-dd"))+'"'+
                  'data-phst4="'+data[i].phst4+'"'+
                  'data-pr="'+data[i].program+'"'+
                  'data-pd="'+data[i].program_duration+'"'+
                  'data-sd="'+($.format.date(data[i].starting_date, "yyyy-MM-dd"))+'"'+
                  'data-re="'+data[i].reason+'"'+
                  'data-ta="'+data[i].target+'" '+
                  'data-di="'+data[i].difficulties+'"'+
                  'data-bg="'+data[i].bground+'"'+
                  'data-si="'+data[i].self_introduction+'" '+
                  'data-wp="'+data[i].weakness_point+'"'+
                  'data-ap="'+data[i].action_plan+'" '+
                  'data-fsp="'+data[i].fsp+'"><i class="fas fa-user-edit fa-fw"></i></a>'; 
                html += '<li style="background-color:black;color:white;" class="list-group-item">PERSONAL INFORMATION</li>';
                if(data[i].grp!=''){
                  html += '<li class="list-group-item tooltip-bottom" title="Group study" style="background-color:gray;color:white;">'+data[i].grp+'</li>';
                } else {
                  html += '';
                } 
                html += '<li class="list-group-item tooltip-bottom" title="Pin number">' + 
                          '<i style="color:green;" class="fas fa-barcode fa-fw fa-lg"></i> ' + data[i].pin + 
                        '</li>' +
                        '<li class="list-group-item tooltip-right" title="Name">'+
                          '<i style="color:red;" class="fa fa-user-circle fa-fw fa-lg"></i> ' + data[i].complete_name+' - '+ data[i].nick_name +
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Address">' + 
                          '<i style="color:blue;" class="fa fa-home fa-fw fa-lg"></i> ' + data[i].address + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Place, date or birth">' + '<i style="color:rgb(120,50,255);" class="fa fa-gift fa-fw fa-lg"></i> '+ data[i].place_of_birth +', '+ ($.format.date(data[i].date_of_birth,  "MMM, dd yyyy")) + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Phone, click to call">' + 
                        '<i style="color:navy;" class="fa fa-phone-square fa-fw fa-lg"></i><a style="text-decoration:none;" target="_blank" href="https://wa.me/' + data[i].phone + '"> ' + data[i].phone + '</a>' + 
                        '</li>';
                if(data[i].cnst2!==''){
                  html += '<li class="list-group-item student_header">Student Two</li>'+
                        '<li class="list-group-item tooltip-right" title="Complete name">'+
                          '<i style="color:red;" class="fa fa-user-circle fa-fw fa-lg"></i> '+ data[i].cnst2 +' - '+ data[i].nnst2 +  
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Address">' + 
                          '<i style="color:blue;" class="fa fa-home fa-fw fa-lg"></i> ' + data[i].adrst2 + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Place, dates of birth">' + '<i style="color:grey;" class="fa fa-map-marker fa-fw fa-lg"></i> ' + data[i].pobst2 +', '+ ($.format.date(data[i].dobst2, "MMM, dd yyyy")) +
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Phone,click to call">' + 
                        '<i style="color:navy;" class="fa fa-phone-square fa-fw fa-lg"></i><a style="text-decoration:none;" target="_blank" href="https://wa.me/' + data[i].phst2 + '">' + data[i].phst2 + '</a>' + 
                        '</li>';
                }
                if(data[i].cnst3!==''){
                  html += '<li class="list-group-item student_header">Student Three</li>'+
                        '<li class="list-group-item tooltip-right" title="Nick name">' + 
                          '<i style="color:rgb(70,0,90);" class="fa fa-user-circle fa-fw fa-lg"></i> ' +  data[i].cnst3 +' - '+ data[i].nnst3 + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Address">' + 
                          '<i style="color:blue;" class="fa fa-home fa-fw fa-lg"></i> ' + data[i].adrst3 + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Date or birth">' + '<i style="color:rgb(120,50,255);" class="fa fa-gift fa-fw fa-lg"></i> ' + data[i].pobst3+', '+ ($.format.date(data[i].dobst3, "MMM, dd yyyy")) + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Phone,click to call">' + 
                        '<i style="color:navy;" class="fa fa-phone-square fa-fw fa-lg"></i><a style="text-decoration:none;" target="_blank" href="https://wa.me/' + data[i].phst3 + '">' + data[i].phst3 + '</a>' + 
                        '</li>';
                }
                if(data[i].cnst4!==''){
                  html += '<li class="list-group-item student_header">Student Four</li>'+
                        '<li class="list-group-item tooltip-right" title="Nick name"> ' + 
                          '<i style="color:rgb(70,0,90);" class="fa fa-user-circle fa-fw fa-lg"></i> '  + data[i].cnst4 +' - '+ data[i].nnst4 + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Address">' + 
                          '<i style="color:blue;" class="fa fa-home fa-fw fa-lg"></i> ' + data[i].adrst4 + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Date or birth">' + 
                        '<i style="color:rgb(120,50,255);" class="fa fa-gift fa-fw fa-lg"></i> ' + 
                        data[i].pobst4 +', '+($.format.date(data[i].dobst4, "MMM,dd yyyy")) + 
                        
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Phone,click to call">' + 
                        '<i style="color:navy;" class="fa fa-phone-square fa-fw fa-lg"></i> <a style="text-decoration:none;" target="_blank" href="https://wa.me/' + data[i].phst4+'">' + data[i].phst4 + '</a>' + 
                        '</li>';
                }
                html += '<li style="background-color:black;color:white;" class="list-group-item">COURSE DETAIL</li>'+
                        '<li class="list-group-item tooltip-bottom" title="Study Program">' + 
                          '<i style="color:rgb(162,255,20);" class="fa fa-list-ul fa-fw fa-lg"></i>' + data[i].program + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Program Duration">' + 
                          '<i style="color:rgb(80,83,210);" class="fa fa-hourglass-end fa-fw fa-lg"></i>' + data[i].program_duration + 
                        ' meetings</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Starting date">' + 
                          '<i style="color:rgb(80,170,243);" class="fa fa-flag fa-fw fa-lg"></i>' + ($.format.date(data[i].starting_date, "MMM,dd yyyy")) + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Reason for studying">' + '<i style="color:rgb(80,255,20);" class="fa fa-question-circle fa-fw fa-lg"></i>' + data[i].reason + '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Target at the completion">' + 
                          '<i style="color: rgb(190,110,27);" class="fa fa-crosshairs fa-fw fa-lg"></i>' + data[i].target + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Difficulties">' + 
                          '<i style="color:rgb(255,0,255);" class="fa fa-thumbs-down fa-fw fa-lg"></i>' + data[i].difficulties + '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Background">' + 
                          '<i style="color:rgb(100,120,190);" class="fa fa-graduation-cap fa-fw fa-lg"></i>' + data[i].bground + '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Self Introduction">' + 
                          '<i style="color:rgb(70,210,155);" class="fa fa-info-circle fa-fw fa-lg"></i>' + data[i].self_introduction + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Weakness Points">' + 
                          '<i style="color:rgb(255,20,60);" class="fa fa-exclamation-triangle fa-fw fa-lg"></i>' + data[i].weakness_point + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Action Plan">' + 
                          '<i style="color:rgb(0,120,80);" class="fa fa-wrench fa-fw fa-lg"></i>' + data[i].action_plan + 
                        '</li>';
                teacher_note += data[i].note;
                if (data[i].fsp == 'yes'){
                  $('#fsp_tab').css('display','block');
                  get_fsp();
                 
                }
              }
              $('#student_info').html(html);
              $('#edit_student_span').html(edit_student_button);
              $('#teacher_note').html(teacher_note);
            }
          });
        }
        $('#edit_student_span').on('click','.student_info_edit', function(){
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
            $('#group_name_e, #student2_e, #student3_e, #student4_e').css('display', 'none');
          } else {
            if(cnst3==''){ 
              $('#group_name_e,#student2_e').css('display', 'block');
              $('#student3_e,#student4_e').css('display', 'none');
            } else {
              if(cnst4 == ''){ 
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
          var bck = 'background-color', clr = '#fbe2e6', pn=$('#pn_e').val(), cn=$('#cn_e').val(), nn=$('#nn_e').val(), ad=$('#ad_e').val(), pb=$('#pb_e').val(), db=$('#db_e').val(), ph=$('#ph_e').val(), grp=$('#grp_e').val(), cn2=$('#cnst2_e').val(), nn2=$('#nnst2_e').val(), ad2=$('#adrst2_e').val(), pb2=$('#pbst2_e').val(), db2=$('#dbst2_e').val(), ph2=$('#phst2_e').val(), cn3=$('#cnst3_e').val(), nn3=$('#nnst3_e').val(), ad3=$('#adrst3_e').val(), pb3=$('#pbst3_e').val(), db3=$('#dbst3_e').val(), ph3=$('#phst3_e').val(), cn4=$('#cnst4_e').val(), nn4=$('#nnst4_e').val(), ad4=$('#adrst4_e').val(), pb4=$('#pbst4_e').val(), db4=$('#dbst4_e').val(), ph4=$('#phst4_e').val(), pr=$('#pr2').val(), pd=$('#pd2').val(), sd=$('#sd2').val(), re=$('#re2').val(), ta=$('#ta2').val(), di=$('#di2').val(), bg=$('#bg2').val(), si=$('#si2').val(), wp=$('#wp2').val(), ap=$('#ap2').val(), fsp='';
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
                                  update_student(pn, cn, nn, ad, pb, db, ph, grp, cn2, nn2, ad2, pb2, db2, ph2, cn3, nn3, ad3, pb3, db3, ph3, cn4, nn4, ad4, pb4, db4, ph4, pr, pd, sd, re, ta, di, bg, si, wp, ap, fsp);
                                }
                              }
                            } else { 
                              cn4 = nn4 = pb4 = ad4 = ph4 = db4 = '';
                             update_student(pn, cn, nn, ad, pb, db, ph, grp, cn2, nn2, ad2, pb2, db2, ph2, cn3, nn3, ad3, pb3, db3, ph3, cn4, nn4, ad4, pb4, db4, ph4, pr, pd, sd, re, ta, di, bg, si, wp, ap, fsp);
                            } 
                          }
                        }
                      } else { 
                        cn3=nn3=pb3=ad3=ph3=db3=cn4=nn4=pb4=ad4=ph4=db4='';
                       update_student(pn, cn, nn, ad,pb, db, ph, grp, cn2, nn2, ad2, pb2, db2, ph2, cn3, nn3, ad3, pb3, db3, ph3, cn4, nn4, ad4, pb4, db4, ph4, pr, pd, sd, re, ta, di, bg, si, wp, ap, fsp);
                      }
                    }
                  }
                } else { 
                  cn2 = nn2 = pb2 = ad2 = ph2 = db2 = cn3 = nn3 = pb3 = ad3 = ph3 = db3 = cn4 = nn4 = pb4 = ad4= ph4= db4='';
                 update_student(pn, cn, nn, ad, pb, db, ph, grp, cn2, nn2, ad2, pb2, db2, ph2, cn3, nn3, ad3, pb3, db3, ph3, cn4, nn4, ad4, pb4, db4, ph4, pr, pd, sd,re, ta, di, bg, si, wp, ap, fsp);
                }
              }
            }
          }
        });
        function update_student(pn, cn, nn, ad, pb, db, ph, grp, cn2, nn2, ad2, pb2, db2, ph2, cn3, nn3, ad3, pb3, db3, ph3, cn4, nn4, ad4, pb4, db4, ph4, pr, pd, sd, re, ta, di, bg, si, wp, ap, fsp) {
          $.ajax({
            type : "post",
            url: "<?php echo site_url('student/update');?>",
            dataType : "json",
            data : {pn:pn,cn:cn,nn:nn,ad:ad,pb:pb,db:db,ph:ph,grp,cn2:cn2,nn2:nn2,ad2:ad2,pb2:pb2,db2:db2,ph2:ph2,cn3:cn3,nn3:nn3,ad3:ad3,pb3:pb3,db3:db3,ph3:ph3,cn4:cn4,nn4:nn4,ad4:ad4,pb4:pb4,db4:db4,ph4:ph4,pr:pr,pd:pd,sd:sd,re:re,ta:ta,di:di,bg:bg,si:si,wp:wp,ap:ap,fsp:fsp},
            success : function(data){
              $('#esm').modal('hide');
              $('#mystudents').DataTable().ajax.reload();
              get_student_detail();
            }
          });   
        }
        /* get course */
        $('#mycourse').DataTable({
          responsive : true,
          "ajax" :{
            "url" : "<?php echo site_url('student_single/get_course?pin=').$pin;?>",
            "dataSrc" :""
          },
          "columns": [
            {"data" : "meeting"},
            {
              "data" : "course_date",
              "render" : function (data, type, row){
                return $.format.date(data, "E, MMM/dd/yy, H:mm");
              }
            },
            {"data" : "teacher"},
            {
              "data" : "duration",
              "render" : function (data, type, row, meta){
                return data+' minutes';
              }
            },
            {"data" : "material"},
            {"data" : "evaluation"},
            {"data" : "w"},
            {"data" : "s"},
            {
              "data" : {meeting:"meeting", course_date: "course_date", teacher: "teacher", duration: "duration", material: "material", w:"w", s: "s", test:"test", test_number: "test_number", test_name: "test_name", of_test_number: "of_test_number", of_test: "of_test" },
              "render" : function(data, type, row, meta){
                return '<a title="Edit" href="javascript:void(0);" class="btn btn-info btn-sm item_edit tooltip-right" data-m="'+data.meeting+'" data-cd="'+data.course_date+'" data-tc="'+data.teacher+'" data-du="'+data.duration+'" data-ma="'+data.material+'" data-ev="'+data.evaluation+'" data-w="'+data.w+'" data-s="'+data.s+'" data-test="'+data.test+'" data-tnu="'+data.test_number+'" data-tn="'+data.test_name+'" data-otn="'+data.of_test_number+'" data-ot="'+data.of_test+'"><i class="fas fa-pencil-alt fa-fw"></i></a> <a href="javascript:void(0);" title="delete" class="btn btn-danger btn-sm item_delete tooltip-bottom" data-m="'+data.meeting+'" data-test="'+data.test+'"><i class="fas fa-trash fa-fw"></i></a>';
              }
            }
          ]
        });
        /* get tests */
        $('#my_tests').DataTable({
          responsive: true,
          "ajax" :{
            "url": "<?php echo site_url('student_single/get_tests?pin='.$pin);?>",
            "dataSrc" :""
          },
          "columns" :[
            {
              "data" : "meeting",
              "render" : function (data,type, row,meta){
                return '<a target="_blank" href="test?pin=<?php echo $pin;?>&meeting='+data+'">'+data+'</a>';
              }
            },
            {
              "data" : {course_date :"course_date", meeting: "meeting"},
              "render" : function (data, type, row){
                return '<a target="_blank" href="test?pin=<?php echo $pin;?>&meeting='+data.meeting+'">'+$.format.date(data.course_date, "E, MMM/dd/yy, H:mm")+'</a>';
              }
            },
            {
              "data" : {teacher: "teacher", meeting: "meeting"},
              "render" : function (data, type, row, meta){
                return '<a target="_blank" href="test?pin=<?php echo $pin;?>&meeting='+data.meeting+'">'+data.teacher+'</a>';
              }
            },
            {
              "data" : {duration:"duration", meeting: "meeting"},
              "render" : function (data, type, row, meta){
                return '<a target="_blank" href="test?pin=<?php echo $pin;?>&meeting='+data.meeting+'">'+data.duration+' minutes</a>';
              }
            },
            {
              "data" : {material:"material", meeting:"meeting"},
              "render" : function (data, type, row, meta){
                return '<a target="_blank" href="test?pin=<?php echo $pin;?>&meeting='+data.meeting+'">'+data.material+'</a>';
              }
            },
            {
              "data" : {evaluation:"evaluation", meeting:"meeting"},
              "render" : function (data, type, row, meta){
                return '<a target="_blank" href="test?pin=<?php echo $pin;?>&meeting='+data.meeting+'">'+data.evaluation+'</a>';
              }
            },
            {
              "data" : {test:"test",test_name:"test_name", meeting: "meeting"},
              "render" : function (data, type, row, meta){
                if(data.test_name == "Pre Spoken" || data.test_name == "Pre Written"){
                  return '<a target="_blank" href="test?pin=<?php echo $pin;?>&meeting='+data.meeting+'">'+data.test_name+'</a>';
                } else {
                  return '<a target="_blank" href="test?pin=<?php echo $pin;?>&meeting='+data.meeting+'">'+data.test+'</a>';
                }
              }
            },
          ]
        });
        /* get fsp */
        function get_fsp(){
          var pin ="<?php echo $pin;?>";
          $.ajax({
            url : "<?php echo site_url('student_single/get_fsp');?>",
            type : "post",
            dataType : "JSON",
            data :{pin:pin},
            success : function(data){
              var html = '', i;
              for (i=0;i<data.length;i++){
                html += '<tr>'+
                          '<td>'+data[i].id+'</td>'+
                          '<td>'+data[i].material+'</td>';
                if (data[i].fsp_result == 'good'){
                 html +=  '<td><i style="color:blue;" class="fas fa-check-square fa-2x"></i></td>';
                } else {
                  html += '<td></td>';
                }
                if (data[i].fsp_result == 'average'){
                 html +=  '<td><i style="color:blue;" class="fas fa-check-square fa-2x"></i></td>';
                } else {
                  html += '<td></td>';
                }
                if (data[i].fsp_result == 'need_improvement'){
                 html +=  '<td><i style="color:blue;" class="fas fa-check-square fa-2x"></i></td>';
                } else {
                  html += '<td></td>';
                }
                  html += `<td>${data[i].comment}</td>
                            <td>
                              <a class="fsp_item_edit btn btn-warning btn-sm" href="javascript:void(0);" 
                                data-id="${data[i].id}"
                                data-fsp_result="${data[i].fsp_result}"
                                data-material="${data[i].material}"
                                data-comment="${data[i].comment}">
                                <i class="fas fa-pencil-alt fa-fw"></i>
                              </a>
                            </td>
                          </tr>`;
              }
              $('#fsp_data').html(html);
            }
          });
        }
        /* form event handler */
        $('select, input, textarea').on('focus', function(){
          $(this).css('background-color', 'white');
          $('#nsef, #esef, #edit_student_feedback').removeClass("alert alert-danger");
          $('#nsef, #esef, #edit_student_feedback').html("");
        });
        $('#edit_course_title').on('click', function(){
           $('.item_edit').fadeOut('fast');$('.item_edit').fadeIn('fast');
        });
        $('#add_course_title').on('click', function(){
            $('#new_session_btn').fadeOut('100');
            $('#new_session_btn').fadeIn('200');
            $('#new_session_btn').fadeOut('100');
            $('#new_session_btn').fadeIn('200');
        });
        $('#new_session_btn').on('click', function(){
          var d = new Date(), /* variable declaration */
              teacher = "<?php echo $this->session->userdata('username');?>",
              curr_time = ($.format.date(d, "yyyy-MM-dd\THH:mm"));
          $('#new_session_modal').modal('show'); /* opens the modal window */
          $('[name="cd"]').val(curr_time); /* assigns values to the corresponding fields */
          $('[name="tc"]').val(teacher);
          
          $('#test').on('click', function(){ /* test button checkbox */
            if ($(this).is(':checked')){
              $('#course_div').removeClass('col');
              $('#course_div').addClass('col-7');
              $('#test_div').addClass('col-5');
              $('#test_div').fadeIn('slow');
              $('select[name="tn"]').on('change', function(){ /* test name */
                var test=$(this).val();
                if(test == 'Remedial'){
                  $('select[name="otn"], select[name="ot"]').removeAttr('disabled');
                } else {
                  $('select[name="otn"], select[name="ot"]').attr('disabled', 'disabled');
                  $('select[name="otn"], select[name="ot"]').val('');
                }
              });
            } else { /* the field just hidden */
              $('#course_div').removeClass('col-7');
              $('#course_div').addClass('col');
              $('#test_div').removeClass('col-5');
              $('#test_div').fadeOut('fast');
            }
          });        
        });             
        /* save course */
        $('#btn_save').on('click', function(){
        var p="<?php echo $pin;?>",
            m=$('#me').val(),
            cd=$('#cd').val(),
            tc=$('#tc').val(),
            du=$('#du').val(), 
            ma=$('#ma').val(),
            ev=$('#ev').val(), 
            w = $('#wr').val(),
            s=$('#sp').val(),
            test = '', 
            tnu = $('#tnu').val(), 
            tn = $('#tn').val(), 
            otn = $('#otn').val(), 
            ot = $('#ot').val(), 
            after_teaching = 'yes', 
            bgc = 'background-color', 
            clr = 'pink';
        if (m==''||cd==''||tc==''||du==''||ma==''||ev==''){
          if(m==''){$('#me').css(bgc,clr);}
          if(cd==''){$('#cd').css(bgc,clr);}
          if(tc==''){$('#tc').css(bgc,clr);}
          if(du==''){$('#du').css(bgc,clr);}
          if(ma==''){$('#ma').css(bgc,clr);}
          if(ev==''){$('#ev').css(bgc,clr);}
          $('#nsef').addClass('alert alert-danger');
          $('#nsef').html("Please fill out all required fields!");
        }else{
          if(isNaN(m)){$('#me').css(bgc,clr);$('#nsef').addClass('alert alert-danger');$('#nsef').html("Meeting field must only be numbers!");
          }else{
            if(isNaN(w)){$('#wr').css(bgc,clr);$('#nsef').addClass('alert alert-danger'); $('#nsef').html("Assessment must only be numbers!");
            }else{
              if(isNaN(s)){$('#sp').css(bgc,clr);$('#nsef').addClass('alert alert-danger');$('#nsef').html("Assessment must only be numbers!");
              }else{
                $.ajax({
                  type: "post",
                  url: "<?php echo site_url('student_single/meeting_avail')?>",
                  data: {p: p, m: m},
                  success: function (response){
                    if (response == 'true'){
                      $('#me').css(bgc,clr);
                      $('#nsef').addClass('alert alert-danger');
                      $('#nsef').html('Meeting with this number has already been conducted before!');
                    } else {
                      if ($('#test').is(':checked')){
                        if(tnu == ''){
                          $('#nsef').addClass('alert alert-danger');
                          $('#nsef').html("Please complete test details!");
                          $('#tnu').css(bgc,clr);
                        } else { 
                          if (tn == ''){
                            $('#nsef').addClass('alert alert-danger');
                            $('#nsef').html("Please complete test details!");
                            $('#tn').css(bgc,clr);
                          } else { 
                            if (tn != 'Remedial'){
                              test = tnu+" "+tn;
                              $.ajax({
                                type: "post",
                                url:"<?php echo site_url('student_single/test_avail'); ?>",
                                data:{p :p, test: test},
                                success : function (response){
                                  if(response=='true'){
                                    $('#nsef').addClass('alert alert-danger');
                                    $('#nsef').html('<em>'+test+'</em> has been conducted before!');
                                    $('#tnu, #tn').css(bgc,clr);
                                  } else {
                                    submit_course(p, m, cd, tc, du, ma, ev, w, s, test, tnu, tn, otn, ot, after_teaching);
                                    create_test_table(p, m);
                                  }
                                }
                              })
                            } else { 
                              if (otn == ''){
                                $('#nsef').addClass('alert alert-danger');
                                $('#nsef').html('Please complete the test details!');
                                $('#otn').css(bgc,clr);
                              } else {
                                if (ot == ''){
                                  $('#nsef').addClass('alert alert-danger');
                                  $('#nsef').html('Please complete the test details!');
                                  $('#ot').css(bgc,clr);
                                } else {
                                  test = tnu+" "+tn+" of "+otn+" "+ot;
                                  $.ajax({
                                    type : 'post',
                                    url : "<?php echo site_url('student_single/test_avail');?>",
                                    data: {p: p, test : test},
                                    success : function(response){
                                      if(response == 'true'){
                                        $('#nsef').addClass('alert alert-danger');
                                        $('#nsef').html('<em>'+test+'</em> has been conducted before!');
                                        $('#tnu, #tn, #otn, #ot').css(bgc,clr);
                                      } else {
                                        submit_course(p, m, cd, tc, du, ma, ev, w, s, test, tnu, tn, otn, ot, after_teaching);
                                        create_test_table(p, m);
             
                                      }
                                    }
                                  });
                                }
                              }
                            }
                          }
                        }
                      } else {
                        submit_course(p, m, cd, tc, du, ma, ev, w, s, test, tnu, tn, otn, ot, after_teaching);
                      }
                    }
                  }
                });
              }
            }
          }
        }
      });
        function submit_course(a,b,c,d,e,f,g,h,i,j,k,l,m,n, after_teaching){
          $.ajax({
            type: "POST",
            url: "<?php echo site_url('student_single/save_course')?>",
            dataType: "JSON",
            data: {p : a, m: b, cd: c, tc: d,du: e, ma: f,ev: g,w: h,s: i,test: j, tnu: k,tn : l,otn : m, ot : n},
            success: function(data) {
              $('[name="me"]').val("");
              $('[name="tc"]').val("");
              $('[name="du"]').val("");
              $('[name="ma"]').val("");
              $('[name="ev"]').val("");
              $('[name="wr"]').val("");
              $('[name="sp"]').val("");
              $('[name="test"]').val("");
              $('[name="tnu"]').val("");
              $('[name="tn"]').val("");
              $('[name="otn"]').val("");
              $('[name="ot"]').val(""); 
              $('#new_session_modal').modal('hide');           
              $('#mycourse').DataTable().ajax.reload();
              set_aft(a, after_teaching);            
            }
          });
        }
        function create_test_table(a,b){
          $.ajax({
            type: "POST",
            url : "<?php echo site_url('student_single/create_test');?>",
            dataType : "JSON",
            data : {pin: a, meeting: b},
            success : function(data){
              $('#my_tests').DataTable().ajax.reload();
            }
          });
        }
        function set_aft(a,b){
          $.ajax({
            type: "POST",
            url : "<?php echo site_url('student_single/set_aft')?>",
            dataType : "JSON",
            data : {pin: a, after_teaching: b},
            success : function(data){
              get_student_detail();
            }
          })
        }
        /* edit course */
        $('#show_course').on('click', '.item_edit', function(){
          var b=$(this).data('m'),
              c=($.format.date($(this).data('cd'), "yyyy-MM-dd\THH:mm")),
              d=$(this).data('tc'),
              e=$(this).data('du'),
              f=$(this).data('ma'),
              g=$(this).data('ev'),
              w=$(this).data('w'),
              s=$(this).data('s'),
              j=$(this).data('test'),
              k=$(this).data('tnu'),
              l=$(this).data('tn'),
              m=$(this).data('otn'),
              n=$(this).data('ot'),
              o='';        
          $('#edit_session_modal').modal('show');
          $('[name="me2"]').val(b);
          $('[name="cd2"]').val(c);
          $('[name="tc2"]').val(d);
          $('[name="du2"]').val(e);
          $('[name="ma2"]').val(f);
          $('[name="ev2"]').val(g);
          $('[name="wr2"]').val(w);
          $('[name="sp2"]').val(s);
          $('[name="tnu2"]').val(k);
          $('[name="tn2"]').val(l);
          $('[name="otn2"]').val(m);
          $('[name="ot2"]').val(n);
          if(j==''){
            o+='<input name="test_edit" id="test_edit" type="checkbox"> <label for="test_edit"> Test</label>';
            $('#edit_course_div').removeClass('col-7');
            $('#edit_course_div').addClass('col');
            $('#edit_test_div').css('display', 'none');
          }else{
            o+='<input name="test_edit" id="test_edit" type="checkbox" checked> <label for="test_edit"> Test</label>';
            $('#edit_course_div').removeClass('col');
            $('#edit_course_div').addClass('col-7');
            $('#edit_test_div').addClass('col-5');
            $('#edit_test_div').css('display', 'block');
            if(l== 'Remedial'){
              $('select[name="otn2"], select[name="ot2"]').removeAttr('disabled');
            }
          }
          $('#test_check_edit').html(o);
          $('#test_edit').on('click', function(){ /* test button checkbox */
            if ($(this).is(':checked')){
              $('#edit_course_div').removeClass('col');
              $('#edit_course_div').addClass('col-7');
              $('#edit_test_div').addClass('col-5');
              $('#edit_test_div').fadeIn('slow');
              
            } else { /* the field just hidden */
              $('#edit_course_div').removeClass('col-7');
              $('#edit_course_div').addClass('col');
              $('#edit_test_div').removeClass('col-5');
              $('#edit_test_div').fadeOut('fast');
            }
          }); 
        });
        $('select[name="tn2"]').on('change', function(){ /* test name */
          var test=$(this).val();
          if(test == 'Remedial'){
            $('select[name="otn2"], select[name="ot2"]').removeAttr('disabled');
          } else {
            $('select[name="otn2"], select[name="ot2"]').attr('disabled', 'disabled');
            $('select[name="otn2"], select[name="ot2"]').val('');
          }
        });
        $('#btn_update').on('click', function() {
          var p = "<?php echo $pin;?>", 
              m = $('#me2').val(),
              cd = $('#cd2').val(),
              tc = $('#tc2').val(),
              du = $('#du2').val(),
              ma = $('#ma2').val(),
              ev = $('#ev2').val(),
              w = $('#wr2').val(),
              s = $('#sp2').val(),
              test = '',
              tnu = $('#tnu2').val(),
              tn = $('#tn2').val(),
              otn = $('#otn2').val(),
              ot = $('#ot2').val(),
              
              bgc = 'background-color',
              clr = 'pink';
          if(tn!=''){if(tn!='Remedial'){test=tnu+" "+tn;}else{test=tnu+" "+tn+" of "+otn+" "+ot;}}else{test='';}
          
          if(cd==''||tc==''||du==''||ma==''||ev==''){
            if(tc==''){$('#tc2').css(bgc,clr);}
            if(cd==''){$('#cd2').css(bgc,clr);}
            if(du==''){$('#du2').css(bgc,clr);}
            if(ma==''){$('#ma2').css(bgc,clr);}
            if(ev==''){$('#ev2').css(bgc,clr);}
            $('#esef').addClass("alert alert-danger");
            $('#esef').html("Please fill out all required fields");
          }else{
            if(isNaN(w)||isNaN(s)) {
              $('#esef').addClass("alert alert-danger");
              $('#esef').html("Assessment can only be number");
              if(isNaN(w)){$('#wr2').css(bgc,clr);}
              if(isNaN(s)){$('#sp2').css(bgc,clr);}
            }else{
              if(isNaN(du)){
                $('#esef').addClass("alert alert-danger");
                $('#esef').html("Meeting duration can only be numbers");
                $('#du2').css(bgc,clr);
              }else{
                if($('#test_edit').is(':checked')){
                  if(tnu == ''){ 
                    $('#tnu2').css(bgc,clr);
                    $('#esef').addClass("alert alert-danger");
                    $('#esef').html("Please complete test details");
                  } else { 
                    if(tn == ''){
                      $('#esef').addClass("alert alert-danger");
                      $('#esef').html("Please complete test details");
                      $('#tn2').css(bgc,clr);
                    } else { 
                      if(tn != 'Remedial'){
                        test = tnu+' '+tn;
                        $.ajax({
                          url : "<?php echo site_url('student_single/test_edit_avail') ;?>",
                          type : "post",
                          dataType : "json",
                          data : {pin:p, test:test},
                          success : function(data){
                            if(data !='' && data[0].meeting !=m){
                              $('#tnu2,#tn2').css(bgc,clr);
                              $('#esef').addClass("alert alert-danger");
                              $('#esef').html("This test has been conducted in meeting "+data[0].meeting);
                            } else {
                              create_test_table(p,m);
                              update_course(p,m,cd,tc,du,ma,ev,w,s,test,tnu,tn,otn,ot);
                            }
                          }
                        });
                      } else { 
                        if (otn == ''){
                          $('#otn2').css(bgc,clr);
                          $('#esef').addClass("alert alert-danger");
                          $('#esef').html("Please complete test details");
                        } else {
                          if(ot == ''){
                            $('#ot2').css(bgc,clr);
                            $('#esef').addClass("alert alert-danger");
                            $('#esef').html("Please complete test details");
                          } else{
                            test = tnu+' '+ tn+' of '+ otn+' '+ ot;
                            $.ajax({
                              type : "post",
                              url : "<?php echo site_url('student_single/test_edit_avail');?>",
                              dataType : "json",
                              data : {pin:p, test:test},
                              success : function(data){
                                if(data !='' && data[0].meeting !=m){
                                  $('#tnu2,#tn2,#otn2,#ot2').css(bgc,clr);
                                  $('#esef').addClass("alert alert-danger");
                                  $('#esef').html("This remedial has been conducted in meeting "+data[0].meeting);
                                } else {
                                  create_test_table(p,m);
                                  update_course(p,m,cd,tc,du,ma,ev,w,s,test,tnu,tn,otn,ot);
                                }
                              }
                            });
                          }
                        }
                      }
                    }
                  }
                } else {
                  update_course(p,m,cd,tc,du,ma,ev,w,s,test,tnu,tn,otn,ot);
                }
              }
            }
          }
          return false;
        });
        function update_course(p,m,cd,tc,du,ma,ev,w,s,test,tnu,tn,otn,ot){
          $.ajax({
            type:"POST",
            url:"<?php echo site_url('student_single/update_course')?>",
            dataType:"JSON",
            data:{p:p,m:m,cd:cd,tc:tc,du:du,ma:ma,ev:ev,w:w,s:s,test:test,tnu:tnu,tn:tn,otn:otn,ot:ot},
            success:function(data){
              $('#edit_session_modal').modal('hide');
              $('#mycourse').DataTable().ajax.reload();
              
            }
          });
        }
        $('#show_course').on('click', '.item_delete', function(){
          var m_d = $(this).data('m'), t_d = $(this).data('test');
          $('#delete_session_modal').modal('show');
          $('#m_d').val(m_d);
          $('#t_d').val(t_d);
        });
        $('#btn_delete_session').on('click',function(){
          var pin = "<?php echo $pin;?>", m_d = $('#m_d').val(), t_d = $('#t_d').val();
          if(t_d!=''){
            // delete test and course
            delete_test(pin,m_d);
            delete_course(pin,m_d);
            $('#mycourse').DataTable().ajax.reload();
            $('#mytests').DataTable().ajax.reload();
          } else {
            // delete course
            delete_course(pin,m_d);
            $('#mycourse').DataTable().ajax.reload();
            $('#mytests').DataTable().ajax.reload();
          }
          $('#delete_session_modal').modal('hide');
        });
        function delete_test(pin,m_d){
          $.ajax({
            type:"post",
            url:"<?php echo site_url('student_single/delete_test');?>",
            dataType : "json",
            data: {pin:pin, m:m_d},
            success : function(data){
              console.log('test deleted');
            }
          });
        }
        function delete_course(pin,m_d){
          $.ajax({
            type:"post",
            url:"<?php echo site_url('student_single/delete_course');?>",
            dataType : "json",
            data: {pin:pin, m:m_d},
            success : function(data){
              console.log('course deleted');
            }
          });
        }
        /* edit fsp */
        $('#btn_save_fsp').on('click', function(){
          var pin = "<?php echo $pin;?>",
              topic = $('#fsp_topic').val(),
              comment = $('#fsp_comment').val(),
              fsp_result = '';
          if ($('input[name="fsp_result"]').is(':checked')){
            fsp_result = $('input[name="fsp_result"]:checked').val();
          }
          if (topic == ''){
            $('#nff').addClass('alert alert-danger'); 
            $('#nff').html('Topic can\'t be empty!');
            $('#fsp_topic').css('background-color', 'pink');
          } else {
           $.ajax({
              type : "POST",
              url : "<?php echo site_url('student_single/add_fsp');?>",
              dataType : "JSON",
              data : {pin:pin, topic: topic, fsp_result : fsp_result, comment: comment},
              success : function(data){
                $('#fsp_topic').val("");
                $('#fsp_comment').val("");
                $('input[name="fsp_result"]').prop("checked", false);
                $('#new_fsp_modal').modal('hide');
                get_fsp();
              }
            }); 
          }
        });
        $('#my_fsp').on('click', '.fsp_item_edit',function(){
          var topic = $(this).data('material'),
              comment =$(this).data('comment'),
              fsp_result = $(this).data('fsp_result'),
              id = $(this).data('id');
          
          $('#edit_fsp_modal').modal('show');
          $('#fsp_topic_edit').val(topic);
          $('#fsp_comment_edit').val(comment);
          $('#id_edit').val(id);
          if (fsp_result == 'good'){
            $('#good_edit').prop('checked', true);
          } else if (fsp_result == 'average'){
            $('#average_edit').prop('checked', true);
          } else if (fsp_result == 'need_improvement'){
            $('#need_improvement_edit').prop('checked', true);
          }
        });
        $('#btn_update_fsp').on('click', function(){
          var pin = "<?php echo $pin;?>",
              id = $('#id_edit').val(),
              topic = $('#fsp_topic_edit').val(),
              fsp_result = '',
              comment = $('#fsp_comment_edit').val();
          if ($('input[name="fsp_result_edit"]').is(':checked')){
                fsp_result = $('input[name="fsp_result_edit"]:checked').val();
          }
          if(topic == ''){
            $('#nff').addClass('alert alert-danger'); 
            $('#nff').html('Topic can\'t be empty!');
            $('#fsp_topic').css('background-color', 'pink');
          } else {
            $.ajax({
              type : "POST",
              url : "<?php echo site_url('student_single/update_fsp');?>",
              dataType: "JSON",
              data : {
                pin: pin, id: id, topic: topic, fsp_result: fsp_result, comment: comment
              },
              success: function(data){
                $('#edit_fsp_modal').modal('hide');
                get_fsp();
              }
            });
          }   
        });
      }); 
    </script>
  </body>
</html>