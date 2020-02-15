<?php include 'inc/header.php';
    foreach ($students->result() as $row){
      $pin=$row->pin;
      $name=$row->nick_name;
      $program=$row->program;
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
            </ul><!-- END TABS -->
            <!-- TABS CONTENTS -->
            <div class="tab-content" id="pills-tabContent">
              <!-- COURSE -->
              <div class="table-responsive tab-pane fade show active" id="pills-course" role="tabpanel" aria-labelledby="pills-course-tab">
                <h3><small>Student </small>Course</h3>
                <p>This is the list of recorded session. Hit the little pencil button <a href="javascript:void(0);" id="edit_course_title"><i style="font-size:small;background-color:#9954BB;color:white;padding-right:3px;padding-left:3px;padding-top:2px;padding-bottom:2px;border-radius:20%;" class="fas fa-pencil-alt"></i></a> on the last column of every row to make changes, or plus button <a href="javascript:void(0);" id="add_course_title"><i style="font-size:small;color:white;background-color:black;padding-right:3px;padding-left:3px;padding-top:2px;padding-bottom:2px;border-radius:20%;" class="fas fa-plus"></i></a> at the top of the Student Information to add a new one.</p>
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
                  <div class="float-right">
                    <a title="Change syllabus" href="#edit_syllabus_modal" data-toggle="modal" data-target="#edit_syllabus_modal" class="btn btn-secondary tooltip-bottom" id="syllabus_edit"><i class="fa fa-pencil-alt"></i> Edit Syllabus</a>
                  </div>
                </h3>
                <p>Tick the square on the rightmost of every indicator to indicate discussed topics, or hit the pencil icon on the top right to change the materials.</p>
                <div class="row" id="show_syllabus"></div>
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
              <div id="after_teaching_div"></div>
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
              <input type="hidden" name="m_d" id="m_d">
              <input type="hidden" name="t_d" id="t_d">
              <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
              <button type="button" id="btn_delete_session" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
            </div>
          </div>
        </div>
      </div>
    </form> <!-- END COURSE STUDENT -->
    <!-- EDIT STUDENT FORM -->
    <form>
      <div class="modal fade" id="edit_student_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
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
                        <label for="pn2">PIN<sup>&lowast;</sup></label> 
                        <div class="input-group"> 
                          <div class="input-group-prepend"> 
                          <span style="color:green;" class="input-group-text"><i class="fas fa-barcode fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="pn2" id="pn2" placeholder="PIN" required readonly> 
                        </div>
                      </div>
                      <div class="form-group col-9">
                        <label for="cn2">Name<sup>&lowast;</sup></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i  style="color:red;" class="fa fa-user-circle fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" id="cn2" placeholder="Name" name="cn2">
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label for="nn2">Nickname</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                           <span class="input-group-text"><i style="color:rgb(70,0,90);" class="fas fa-user-circle fa-fw"></i> </span>
                          </div>
                          <input type="text" class="form-control" name="nn2" id="nn2" placeholder="Alias">
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label for="ad2">Address<sup>&lowast;</sup></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:blue;"  class="fa fa-home fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="ad2" id="ad2" placeholder="Address">
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label for="pb2">Place of Birth</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:grey;" class="fa fa-map-marker fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="pb2" id="pb2" placeholder="Place of Birth">
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label for="db2">Date of Birth<sup>&lowast;</sup></label>
                        <div class="input-group"> 
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(120,50,255);" class="fas fa-birthday-cake fa-fw"></i></span>
                          </div>
                          <input type="date" class="form-control" name="db2" id="db2">
                        </div>
                      </div>
                      <div class="form-group col"> 
                        <label for="ph2">Phone<sup>&lowast;</sup></label> 
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
                        <label for="pr2">Program <sup>&lowast;</sup></label> 
                        <div class="input-group"> 
                          <div class="input-group-prepend"> 
                             <span  style="color:rgb(200,100,255);" class="input-group-text"><i class="fa fa-list-ul fa-fw"></i></span> 
                          </div>
                          <select class="form-control" name="pr2" id="pr2" required> 
                            
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
                        <label for="pd2">Program Duration <sup>&lowast;</sup></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(80,83,210);" class="fa fa-hourglass-end fa-fw"></i></span> 
                          </div>
                          <input type="text" class="form-control" name="pd2" id="pd2" placeholder="Duration">
                        </div>
                      </div>
                      <div class="form-group col-4">
                        <label for="sd2">Starting Date</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color:rgb(80,170,243);" class="fa fa-flag fa-fw"></i></span> 
                          </div>
                          <input type="date" class="form-control" name="sd2" id="sd2"> 
                        </div>
                      </div>
                      <div class="form-group col-4">
                        <label for="re2">Reason</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                           <span class="input-group-text"><i style="color:rgb(80,255,20);" class="fa fa-question-circle fa-fw"></i></span> 
                          </div>
                          <textarea class="form-control" name="re2" id="re2" placeholder="Reason for studying"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-4">
                        <label for="ta2">Target</label> 
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i style="color: rgb(190,110,27);" class="fa fa-crosshairs fa-fw"></i></span> 
                          </div>
                          <textarea class="form-control" name="ta2" id="ta2" placeholder="Target after completion"></textarea> 
                        </div>
                      </div>
                      <div class="form-group col-4">
                        <label for="bg2">Background</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                             <span class="input-group-text"><i style="color:rgb(100,120,190);" class="fa fa-graduation-cap fa-fw"></i></span>
                          </div>
                          <textarea class="form-control" name="bg2" id="bg2" placeholder="Background"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label for="di2">Difficulties</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                             <span class="input-group-text">
                              <i style="color:rgb(255,0,255);" class="fa fa-thumbs-down fa-fw"></i></span>
                          </div>
                          <input type="text" class="form-control" name="di2" id="di2" placeholder="Difficulties">
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label for="si2">Self Introduction</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                           <span class="input-group-text"><i style="color:rgb(70,210,155);" class="fa fa-info-circle fa-fw"></i></span> 
                          </div>
                          <select class="form-control" name="si2" id="si2"> 
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
                        <label for="wp2">Weakness Points</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                             <span class="input-group-text"> 
                              <i style="color:rgb(255,20,60);" class="fas fa-exclamation-triangle fa-fw"></i> 
                            </span> 
                          </div>
                          <textarea class="form-control" name="wp2" id="wp2" placeholder="Student's main problems"></textarea>
                        </div>
                      </div>
                      <div class="form-group col-6"> 
                        <label for="ap2">Action Plan</label> 
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
              <span class="ffb" id="edit_student_feedback"></span>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times"></i> Close </button> 
              <button type="button" type="submit" id="btn_update_student" class="btn btn-primary"> <i class="fa fa-check"></i> Update</button> 
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- END EDIT STUDENT FORM -->
    <?php include 'inc/chat_dialog.php';?>
    <?php include 'inc/scripts.php';?>
    <?php include 'inc/chat-script.php';?>
    <script type = "text/javascript" >
      $(document).ready(function() {
        get_student_detail();
        show_syllabus();
        get_all_syllabus();
        function get_student_detail() {
          var pin = "<?php echo $pin;?>";
          $.ajax({
            type: 'post', 
            url: '<?php echo site_url('student_single/get_student_info');?>', 
            dataType : 'json', 
            data :{pin:pin},
            success: function(data) { 
              var html = '', 
                  syllabus = '', 
                  edit_student_button= '', 
                  after_teaching_button = '<input type="checkbox" name="after_teaching" id="after_teaching"', 
                  i; 
              for (i = 0; i < data.length;i++) {
                html += '<li class="list-group-item tooltip-bottom" title="Pin number">' + 
                          '<i style="color:green;" class="fas fa-barcode fa-fw fa-lg"></i>' + data[i].pin + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-right" title="Complete name">' + 
                          '<i style="color:red;" class="fa fa-user-circle fa-fw fa-lg"></i>' + data[i].complete_name + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-right" title="Nick name">' + 
                          '<i style="color:rgb(70,0,90);" class="fa fa-user-circle fa-fw fa-lg"></i>' + data[i].nick_name + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Address">' + 
                          '<i style="color:blue;" class="fa fa-home fa-fw fa-lg"></i>' + data[i].address + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Place of birth">' + '<i style="color:grey;" class="fa fa-map-marker fa-fw fa-lg"></i>' + data[i].place_of_birth + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Date or birth">' + '<i style="color:rgb(120,50,255);" class="fa fa-gift fa-fw fa-lg"></i>' + ($.format.date(data[i].date_of_birth, "MMM,dd yyyy")) + 
                        '</li>' + 
                        '<li class="list-group-item tooltip-bottom" title="Phone,click to call">' + 
                        '<i style="color:navy;" class="fa fa-phone-square fa-fw fa-lg"></i><a style="text-decoration:none;" target="_blank" href="https://wa.me/' + data[i].phone + '">' + data[i].phone + '</a>' + 
                        '</li>' + 
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
             
                edit_student_button += '<a title="Edit" href="javascript:void(0);"'+ 
                ' class="btn btn-info student_info_edit tooltip-bottom" '+ 
              
                'data-pin="'+data[i].pin+
                '" data-cmn="'+data[i].complete_name+
                '" data-ncn="'+data[i].nick_name+
                '" data-adr="'+data[i].address+
                '" data-pob="'+data[i].place_of_birth+
                '" data-dob="'+($.format.date(data[i].date_of_birth, "yyyy-MM-dd"))+
                '" data-pho="'+data[i].phone+'" data-prg="'+data[i].program+
                '" data-prd="'+data[i].program_duration+
                '" data-std="'+($.format.date(data[i].starting_date, "yyyy-MM-dd"))+
                '" data-rea="'+data[i].reason+'" data-trg="'+data[i].target+
                '" data-dff="'+data[i].difficulties+
                '" data-bgr="'+data[i].bground+
                '" data-sin="'+data[i].self_introduction+
                '" data-wep="'+data[i].weakness_point+
                '" data-acp="'+data[i].action_plan+'" data-fsp="'+data[i].fsp+'"><i class="fas fa-user-edit fa-fw"></i></a>';
                if (data[i].fsp == 'yes'){
                  $('#fsp_tab').css('display','block');
                  get_fsp();
                 
                }
                syllabus += '<small>Syllabus for </small>' + data[i].program;
                if (data[i].after_teaching == 'yes') {
                  after_teaching_button += '';
                } else {
                  after_teaching_button += 'checked disabled';
                }
                after_teaching_button += '> <label for="after_teaching">Remove from after teaching list.</label>';
              }
              $('#edit_student_span').html(edit_student_button);
              $('#student_info').html(html);
              $('#syllabus_tab_header').html(syllabus);
              $('#after_teaching_div').html(after_teaching_button);
            }
          });
        }
        
        $('#student_info_div').on('click', '.student_info_edit', function(){
          var a=$(this).data('pin'),  b=$(this).data('cmn'), c=$(this).data('ncn'), d=$(this).data('adr'), e=$(this).data('pob'), f=$(this).data('dob'), g=$(this).data('pho'), h=$(this).data('prg'), i=$(this).data('prd'), j=$(this).data('std'), k=$(this).data('rea'), l=$(this).data('trg'), m=$(this).data('dff'), n=$(this).data('bgrr'), o=$(this).data('sin'), p=$(this).data('wep'),  q=$(this).data('acp'), fsp = $(this).data('fsp'), fsp_button = '<input type="checkbox" name="fsp" id="fsp"' ;
          $('#edit_student_modal').modal('show');
          $('[name="pn2"]').val(a);
          $('[name="cn2"]').val(b);
          $('[name="nn2"]').val(c);
          $('[name="ad2"]').val(d);
          $('[name="pb2"]').val(e);
          $('[name="db2"]').val(f);
          $('[name="ph2"]').val(g);
          $('[name="pr2"]').val(h);
          $('[name="pd2"]').val(i);
          $('[name="sd2"]').val(j);
          $('[name="re2"]').val(k);
          $('[name="ta2"]').val(l); 
          $('[name="di2"]').val(m);
          $('[name="bg2"]').val(n);
          $('[name="si2"]').val(o);
          $('[name="wp2"]').val(p);
          $('[name="ap2"]').val(q);
          if (fsp == 'yes'){
            fsp_button += 'checked disabled> <label for="fsp">Final Speaking Performance</label>';
          } else {
            fsp_button += '> <label for="fsp">Final Speaking Performance</label>';
          }
          $('#fsp_button').html(fsp_button);
        });
        $('#btn_update_student').on('click',function(){
          var bcg = 'background-color', clr = '#fbe2e6', pn=$('#pn2').val(), cn=$('#cn2').val(),   nn=$('#nn2').val(), ad=$('#ad2').val(), pb=$('#pb2').val(), db=$('#db2').val(), ph=$('#ph2').val(), pr=$('#pr2').val(), pd=$('#pd2').val(),  sd=$('#sd2').val(), re=$('#re2').val(), ta=$('#ta2').val(), di=$('#di2').val(), bg=$('#bg2').val(), si=$('#si2').val(), wp=$('#wp2').val(), ap=$('#ap2').val(), fsp = '';
          if ($('#fsp').is(':checked')){
            fsp = 'yes';
          } else {
            fsp ='';
          };
          if (pn=='' || cn=='' || ad=='' || db=='' || ph=='' || pr=='' || pd==''){ 
            $('#edit_student_feedback').addClass('alert alert-danger'); 
            $('#edit_student_feedback').html('Please fill out all required fields');
          
            if (cn=='') {
              $('#cn2').css(bcg,clr);
            }
            if (ad=='') {
              $('#ad2').css(bcg,clr);
            }
            if (db=='') {
              $('#db2').css(bcg,clr);
            }
            if (ph=='') {
              $('#ph2').css(bcg,clr);
            }
            if (pd=='') {
              $('#pd2').css(bcg,clr);
            }
          } else{
              if (isNaN(ph)){
                $('#edit_student_feedback').addClass('alert alert-danger'); 
                $('#edit_student_feedback').html('phone can only consist of number'); 
                $('#ph2').css(bcg,clr);
              }else{ 
                if (isNaN(pd)){
                  $('#edit_student_feedback').addClass('alert alert-danger');
                  $('#edit_student_feedback').html('Program duration only consist of number'); 
                  $('#pd2').css(bcg,clr);
                }else{
                  $.ajax({
                    type : "POST", 
                    url : "<?php echo site_url('student/update')?>",
                    dataType : "JSON",
                    data :{pin:pn, complete_name:cn, nick_name:nn, address:ad, place_of_birth:pb, date_of_birth:db, phone:ph, program:pr, program_duration:pd, starting_date:sd, reason:re, target:ta, difficulties:di, bground:bg, self_introduction:si, weakness_point:wp, action_plan:ap},
                    success: function(data){
                      $('#edit_student_modal').modal('hide');
                      if(fsp == 'yes'){
                        $.ajax({
                          type : "POST",
                          url : "<?php echo site_url('student/set_fsp')?>",
                          dataType : "JSON",
                          data : {pin:pn},
                          success : function(data){
                            $.ajax({
                              type: "POST",
                              url : "<?php echo site_url('student/fsp_table');?>",
                              dataType : "JSON",
                              data : {pin:pn},
                              success : function (data){
                                console.log('fsp table for '+pn+' created');
                                $('#mycourse').DataTable().ajax.reload();
                                $('#my_tests').DataTable().ajax.reload();
                                get_student_detail();
                                show_syllabus();
                              }
                            });
                          }
                        });
                      } else {
                        $('#mycourse').DataTable().ajax.reload();
                        $('#my_tests').DataTable().ajax.reload();
                        get_student_detail();
                        show_syllabus();
                      }
                    }
                  });
                }
              }
          }
          return false;
        });
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
        /* get syllabus */
        function show_syllabus() {
          var pin = "<?php echo $pin;?>";
          $.ajax({
            type: 'post',
            url: '<?php echo site_url('student_single/get_syllabus')?>',
            dataType: 'json',
            data :{pin:pin},
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
                            '<a href="javascript:void(0);" data-stat="0" data-id="'+data[i].id+'" class="btn btn-default btn-sm syll_check"><i class="fa fa-check-square fa-2x"></i></a>'+
                            '</div>';
                  } else {
                    html += '<div class="col-2 syll_ind">' + 
                              data[i].section + '.' + data[i].topic + '.' + data[i].ind + 
                            '</div>' + 
                            '<div class="col-8 syll_ind">' + 
                              data[i].indicator + 
                            '</div>' + 
                            '<div class="col-2 syll_ind">'+
                            '<a href="javascript:void(0);" data-stat="1" data-id="'+data[i].id+'" class="btn btn-default btn-sm syll_check"><i class="fa fa-square fa-2x"></i></a>'+
                            '</div>';
                  }
                }
              }
              $('#show_syllabus').html(html);
            }
          });
        }
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
                  html += '<td>'+data[i].comment+'</td>'+
                          '<td><a class="fsp_item_edit btn btn-warning btn-sm" href="javascript:void(0);" data-id="'+data[i].id+'" data-fsp_result="'+data[i].fsp_result+'" data-material="'+data[i].material+'" data-comment="'+data[i].comment+'"><i class="fas fa-pencil-alt fa-fw"></i></a></td>'+
                        '</tr>';
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
                        //set_aft(p, after_teaching);
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
              console.log("Test created");
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
              after_teaching = '',
              bgc = 'background-color',
              clr = 'pink';
          if(tn!=''){if(tn!='Remedial'){test=tnu+" "+tn;}else{test=tnu+" "+tn+" of "+otn+" "+ot;}}else{test='';}
          if($('#after_teaching').is(':checked')){
            after_teaching='no';
          }else{
            after_teaching='yes';
          }
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
                              update_course(p,m,cd,tc,du,ma,ev,w,s,test,tnu,tn,otn,ot,after_teaching);
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
                                  update_course(p,m,cd,tc,du,ma,ev,w,s,test,tnu,tn,otn,ot,after_teaching);
                                }
                              }
                            });
                          }
                        }
                      }
                    }
                  }
                } else {
                  update_course(p,m,cd,tc,du,ma,ev,w,s,test,tnu,tn,otn,ot,after_teaching);
                }
              }
            }
          }
          return false;
        });
        function update_course(p,m,cd,tc,du,ma,ev,w,s,test,tnu,tn,otn,ot,after_teaching){
          $.ajax({
            type:"POST",
            url:"<?php echo site_url('student_single/update_course')?>",
            dataType:"JSON",
            data:{p:p,m:m,cd:cd,tc:tc,du:du,ma:ma,ev:ev,w:w,s:s,test:test,tnu:tnu,tn:tn,otn:otn,ot:ot},
            success:function(data){
              $('#edit_session_modal').modal('hide');
              $('#mycourse').DataTable().ajax.reload();
              set_aft(p,after_teaching);
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
          /*$.ajax({
            url : "<?php echo site_url('student_single/delete_course'); ?>",
            type : "post",
            dataType : "json",
            data : {pin:pin, m:m_d},
            success: function(data){
              $('#mycourse').DataTables().ajax.reload();
              $('#mytests').DataTables().ajax.reload();
              $('#delete_session_modal').modal('hide');
            }
          });*/
        });
        function delete_test(pin,m_d){
          console.log('test deleted');
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
          console.log('course deleted');
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
        /* edit syllabus */
        function get_all_syllabus(){
          var pin = "<?php echo $pin;?>";
          $.ajax({
            type: "POST",
            url : "<?php echo site_url('student_single/get_all_syllabus') ;?>",
            dataType : "JSON",
            data : {pin: pin},
            success : function(data){
              var html = '', i;
              for(i=0; i<data.length;i++){
                if (data[i].topic == 0 && data[i].ind == 0) {
                  if (data[i].assign == 1){
                     html += '<div class="col-2 syll_section">' + 
                            data[i].section + 
                          '</div>' + 
                          '<div class="col-8 syll_section">' +data[i].indicator+'</div>'+
                    '<div class="col-2 syll_section">'+
                      '<a href="javascript:void(0);" data-id="'+data[i].id+'" data-section="'+data[i].section+'" data-topic="'+data[i].topic+'" data-ind="'+data[i].ind+'" data-assign="0" class="syll_assign btn btn-default btn-sm"><i class="fas fa-check-square fa-2x"></i>'+
                      '</a>'+
                      '</div>';
                  } else {
                     html += '<div class="col-2 syll_section">' + 
                            data[i].section + 
                          '</div>' + 
                          '<div class="col-8 syll_section">' +data[i].indicator+'</div>'+
                    '<div class="col-2 syll_section">'+
                      '<a href="javascript:void(0);" data-id="'+data[i].id+'" data-section="'+data[i].section+'" data-topic="'+data[i].topic+'" data-ind="'+data[i].ind+'" data-assign="1" class="syll_assign btn btn-default btn-sm"><i class="fas fa-square fa-2x"></i>'+
                      '</a>'+
                      '</div>';
                  }
                 
                } else if (data[i].topic != 0 && data[i].ind == 0) {
                  if(data[i].assign == 1){
                    html += '<div class="col-2 syll_topic">' + 
                            data[i].section + '.' + data[i].topic + 
                          '</div>' + 
                          '<div class="col-8 syll_topic">' + 
                            data[i].indicator + 
                          '</div>'+
                    '<div class="col-2 syll_topic">'+
                      '<a href="javascript:void(0);" data-id="'+data[i].id+'" data-section="'+data[i].section+'" data-topic="'+data[i].topic+'" data-ind="'+data[i].ind+'" data-assign="0" class="syll_assign btn btn-default btn-sm"><i class="fas fa-check-square fa-2x"></i>'+
                      '</a>'+
                      '</div>';
                  } else {
                    html += '<div class="col-2 syll_topic">' + 
                            data[i].section + '.' + data[i].topic + 
                          '</div>' + 
                          '<div class="col-8 syll_topic">' + 
                            data[i].indicator + 
                          '</div>'+
                    '<div class="col-2 syll_topic"><a href="javascript:void(0);" data-id="'+data[i].id+'" data-section="'+data[i].section+'" data-topic="'+data[i].topic+'" data-ind="'+data[i].ind+'" data-assign="1" class="syll_assign btn btn-default btn-sm"><i class="fas fa-square fa-2x"></i></a></div>';
                  }
                  
                } else {
                  if (data[i].assign == 1) { 
                    html += '<div class="col-2 syll_ind">' + 
                              data[i].section + '.' + data[i].topic + '.' + data[i].ind + 
                            '</div>' + 
                            '<div class="col-8 syll_ind">'+
                              '<span class="assigned">' + data[i].indicator + '</span>'+
                            '</div>' + 
                            '<div class="col-2 syll_ind">'+
                            '<a href="javascript:void(0);" data-id="'+data[i].id+'" data-section="'+data[i].section+'" data-topic="'+data[i].topic+'" data-ind="'+data[i].ind+'" data-assign="0" class="btn btn-default btn-sm syll_assign"><i class="fa fa-check-square fa-2x"></i></a>'+
                            '</div>';
                  } else {
                    html += '<div class="col-2 syll_ind">' + 
                              data[i].section + '.' + data[i].topic + '.' + data[i].ind + 
                            '</div>' + 
                            '<div class="col-8 syll_ind">' + 
                              data[i].indicator + 
                            '</div>' + 
                            '<div class="col-2 syll_ind">'+
                            '<a href="javascript:void(0);" data-id="'+data[i].id+'" data-section="'+data[i].section+'" data-topic="'+data[i].topic+'" data-ind="'+data[i].ind+'" data-assign="1" class="btn btn-default btn-sm syll_assign"><i class="fa fa-square fa-2x"></i></a>'+
                            '</div>';
                  }
                }
                
              }
              $('#syllabus_edit_div').html(html);
            }
          });
        }
        $('#syllabus_edit_div').on('click', '.syll_assign', function(){
          var id = $(this).data('id'),
              section = $(this).data('section'),
              topic = $(this).data('topic'),
              ind = $(this).data('ind'),
              assign= $(this).data('assign'),
              pin = "<?php echo $pin;?>";
          if(topic == 0){
            $.ajax({
              type : "post",
              url : "<?php echo site_url('student_single/assign_syllabus_section') ;?>",
              dataType : "JSON",
              data : {section : section, assign: assign, pin: pin},
              success : function(data){
                get_all_syllabus();
                show_syllabus();
              }
            });
          } else if (ind==0 && topic!=0){
            $.ajax({
              type : "post",
              url : "<?php echo site_url('student_single/assign_syllabus_topic') ;?>",
              dataType : "JSON",
              data : {section: section, topic: topic, assign: assign, pin : pin},
              success : function(data){
                console.log('topic '+section+'.'+topic+' assigned to '+assign);
                get_all_syllabus();
                show_syllabus();
              }
            });
          } else {
            $.ajax({
              type : "POST",
              url : "<?php echo site_url('student_single/assign_syllabus') ;?>",
              dataType : "JSON",
              data : {id:id, assign:assign, pin: pin},
              success : function(data){
                get_all_syllabus();
                show_syllabus();
              }
            });
          }
        });   
        $('#show_syllabus').on('click', '.syll_check', function(){
          var id = $(this).data('id'),
              stat = $(this).data('stat'),
              pin = "<?php echo $pin;?>";
          console.log('pin is '+pin+', id is ' +id+ 'and status is '+ stat);
          $.ajax({
            type: "POST",
            url : "<?php echo site_url('student_single/check_syllabus');?>",
            dataType : "JSON",
            data : {id : id, stat: stat, pin : pin},
            success : function(data){
              console.log('Updated');
              show_syllabus();
            }
          })
        });
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
            console.log("topic ="+ topic +", comment =" +comment+ "result = "+fsp_result);
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
            console.log('topic empty');
            $('#nff').addClass('alert alert-danger'); 
            $('#nff').html('Topic can\'t be empty!');
            $('#fsp_topic').css('background-color', 'pink');
          } else {
            console.log(pin + " "+ id+"  " + topic + " "+ fsp_result + " " + comment);
            $.ajax({
              type : "POST",
              url : "<?php echo site_url('student_single/update_fsp');?>",
              dataType: "JSON",
              data : {
                pin: pin, id: id, topic: topic, fsp_result: fsp_result, comment: comment
              },
              success: function(data){
                console.log('updated');
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