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
          <h3 class="page-header"><small>Student </small>Information </h3>
          <div class="accordion" id="student_info"></div>
          <br>
          <div style="display:none;" id="cheatsheet_box" class="alert alert-info">
            <button id="cheatsheet_close" class="close" type="button" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
              <hr>
              <span class="cheatsheet_section"> <code># + SPACE + text</code> for headers </span>
<pre># header 1 =>  <h1 style="display:inline;"><small>header 1</small></h1></pre>
<pre>## header 2 =>  <h2 style="display:inline;"><small>header 2</small></h2></pre>
<pre>### header 3 =>  <h3 style="display:inline;"><small>header 3</small></h3></pre>
<pre>#### header 4 =>  <h4 style="display:inline;"><small>header 4</small></h4></pre>
<pre>##### header 5 =>  <h5 style="display:inline;"><small>header 5</small></h5></pre>
<pre>###### header 6 =>  <h6 style="display:inline;"><small>header 6</small></h6></pre>
              <hr>
              <span class="cheatsheet_section">text formatting</span><br>
              <pre>
<code>_italic_</code>          => <em>italic</em>
<code>*italic*</code>          => <em>italic</em>
<code>**bold**</code>          => <strong>bold</strong>
<code>**_bold italic_**</code> => <strong><em>bold italic</em></strong>
<code>_**italic bold**_</code> => <em><strong>italic bold</strong></em>
            </pre>
              <hr>
              <span class="cheatsheet_section"> <code>* + SPACE</code> for bulleted list</span> <br>
<pre>
<code>* item 1</code>
<code>* item 2</code>
<code>* item 3</code>
</pre>
gives us the following,
<ul>
  <li>item 1</li>
  <li>item 2</li>
  <li>item 3</li>
</ul>
              <hr>
              <span class="cheatsheet_section"> number<code>[0-9] +</code> <code>.</code>(period) <code> + SPACE + list item </code> for numbered list</span><br>
<pre>
<code>1. item 1</code>
<code>2. item 2</code>
<code>4. item 3</code>
</pre>
that gives us this:
<ol>
  <li>item 1</li>
  <li>item 2</li>
  <li>item 3</li>
</ol>
              <hr>
              <span class="cheatsheet_section">press <code>ENTER</code> twice to insert a new line</span> <br>
              <h5><code>&#8629; &#8629;</code></h5>
              <hr>

          </div>
        </div><!-- END STUDENT INFO -->
        <div class="col-md-9 col-lg-9">
          <div class="container" id="action_form">
            <!-- NEW COURSE -->
            <form>
              <div class="card" id="course_form">
                <div class="card-header">
                  <h5 class="card-title">
                    <span id="course_header">New Session</span>
                  <button type="button" class="close close_course" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </h5>
                </div>
                <div class="card-body">
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
                        <div class="form-group col-5">
                          <label for="tc">Teacher <sup>&lowast;</sup></label>
                          <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user fa-fw"></i></span></div>
                            <input type="text" name="tc" id="tc" class="form-control" placeholder="Put your name here" required value="<?php echo $this->session->userdata('username');?>">
                          </div>
                        </div>
                        <div class="form-group col-5">
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
                        <div class="form-group col-2">
                          <label for="co">Counter </label>
                          <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-stopwatch fa-fw"></i></span></div>
                            <input type="text" name="co" id="co" class="form-control" placeholder="6" title="Put a number here to track how many topics have been discussed">
                          </div>
                        </div>
                        <div class="form-group col-6" id="ma_div">
                          <label for="ma">Material <sup>&lowast;</sup></label>
                          <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-book fa-fw"></i></span></div>
                            <textarea rows="6" name="ma" id="ma" class="form-control mdhtmlform-md" data-mdhtmlform-group="0" placeholder="(1.1 - 1-3) Greeting..."></textarea>
                          </div>
                          <small class="form-text text-muted">When this window is open, you can click any topics or indicators on the syllabus to automatically insert them here.</small>
                        </div>
                        <div class="form-group col-6">
                          <label for="ev">Evaluation <sup>&lowast;</sup></label>
                          <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-list-ul fa-fw"></i></span>
                            </div>
                            <textarea rows="6" name="ev" id="ev" class="form-control mdhtmlform-md" data-mdhtmlform-group="1" placeholder="He was now able to ..."></textarea>
                          </div>
                          <small class="form-text text-muted"><a id="cheatsheet_button" href="javascript:void(0);">Click here</a> to see the cheatsheet</small>
                        </div>
                        <div class="col-12" id="preview">
                          <div id="ma_prev" class="mdhtmlform-html ta_prev" data-mdhtmlform-group="0"></div>
                          <textarea  style="display:none;" name="ma_html" id="ma_html" class="mdhtmlform-html" data-mdhtmlform-group="0"></textarea>
                          <div id="ev_prev" class="mdhtmlform-html ta_prev" data-mdhtmlform-group="1"></div>
                          <textarea style="display:none;" name="ev_html" id="ev_html" class="mdhtmlform-html" data-mdhtmlform-group="1"></textarea>
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
                              <span class="input-group-text"><i class="fa fa-bullhorn fa-fw"></i> </span>
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
                  <div class="col test_check">
                    <input type="checkbox" name="test" id="test"> <label for="test">  Test</label>
                  </div>
                </div>
                <div class="card-footer">
                  <input type="hidden" name="pin" id="pin" value="<?php echo $pin;?>">
                  <button type="button" class="btn btn-secondary close_course"><i class="fa fa-times"></i> Close</button>
                  <button type="button" type="submit" id="btn_save" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                  <button type="button" type="submit" id="btn_update" class="btn btn-info">
                    <i class="fas fa-check"></i> Update</button>
                  <span class="ffb" id="course_feedback"></span>
                </div>
              </div>
            </form> <!-- END NEW COURSE -->
          </div>
          <br>
          <div class="container">
            <!-- TABS -->
            <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-course-tab" data-toggle="pill" href="#pills-course" role="tab" aria-controls="pills-course" aria-selected="true"><i class="fas fa-folder-open fa-fw"></i> Course</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-syllabus-tab" data-toggle="pill" href="#pills-syllabus" role="tab" aria-controls="pills-syllabus" aria-selected="false"><i class="fas fa-tasks fa-fw"></i> Syllabus</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-test-tab" data-toggle="pill" href="#pills-test" role="tab" aria-controls="pills-test" aria-selected="false"><i class="fas fa-question-circle fa-fw"></i> Tests</a>
              </li>

              <li class="nav-item" id="fsp_tab">
                <a  class="nav-link" id="pills-fsp-tab" data-toggle="pill" href="#pills-fsp" role="tab" aria-controls="pills-fsp" aria-selected="false">FSP</a>
              </li>
              <li class="nav-item" id="new_session_tab">
                <a href="javascript:void(0);" class="nav-link" title="New Session" id="new_session_btn"><i class="fas fa-plus"></i> Add New</a>
              </li>
            </ul><!-- END TABS -->
            <!-- TABS CONTENTS -->
            <div class="tab-content" id="pills-tabContent">
              <!-- COURSE -->
              <div class="table-responsive tab-pane fade show active" id="pills-course" role="tabpanel" aria-labelledby="pills-course-tab">
                <h3><small>Student </small>Course</h3>
                <p>This is the list of recorded session. Hit the little pencil button <a href="javascript:void(0);" id="edit_course_title"><i style="font-size:small;background-color:#9954BB;color:white;padding-right:3px;padding-left:3px;padding-top:2px;padding-bottom:2px;border-radius:20%;" class="fas fa-pencil-alt"></i></a> on the last column of every row to make changes, or plus button <a href="javascript:void(0);" id="add_course_title"><i style="font-size:small;color:white;background-color:black;padding-right:3px;padding-left:3px;padding-top:2px;padding-bottom:2px;border-radius:20%;" class="fas fa-plus"></i></a> above to add a new one.</p>
                <br>
                <table class="table table-bordered table-striped table-sm" id="mycourse">
                  <thead class="bg-dark text-light">
                    <tr>
                      <th title="meeting number"><i class="fa fa-hashtag fa-fw"></i></th>
                      <th title="Date, time"> Date, time</th>
                      <th title="Teacher"> Teacher </th>
                      <th title="Meeting duration"> Duration</th>
                      <th title="Material"> Material</th>
                      <th title="Evaluation"> Evaluation</th>
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
                <h3>
                  <span id="syllabus_tab_header"></span>
                  <div id="syll_edit_button_div" class="float-right"></div>
                </h3>
                <div class="container" id="syllabus_tab_description">
                </div> <br>
                <div class="container row" id="show_syllabus">
                </div>
                <input type="hidden" id="program_id" name="program_id" value="<?php echo $program_id;?>">
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
    </form> <!-- END DELETE COURSE -->
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
    <!-- CONFIRM SYLLABUS -->
    <form>
      <div class="modal fade" id="create_syllabus_confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content add">
            <div class="modal-header">
              <h5 class="modal-title">Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div id="create_syllabus_msg" class="modal-body">

            </div>
            <div class="modal-footer">
              <input type="hidden" name="prg_id" id="prg_id">
              <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times fa-fw"></i> No</button>
              <button type="button" id="btn_create_syllabus" class="btn btn-success"><i class="fa fa-angle-double-right fa-fw"></i> Yeah, proceed!</button>
            </div>
          </div>
        </div>
      </div>
    </form> <!-- END CONFIRM SYLLABUS -->

    <?php include 'inc/chat_dialog.php';?>
    <?php include 'inc/scripts.php';?>
    <script type="text/javascript">
      var pin = "<?php echo $pin;?>",
          baseurl = "<?php echo base_url();?>",
          siteurl = "<?php echo site_url();?>",
          teacher = "<?php echo $this->session->userdata('username');?>",
          user = teacher;
          avatar = "<?php echo $this->session->userdata('avatar');?>",
          sender = "<?php echo $this->session->userdata('id');?>",
          u = siteurl;
    </script>
    <!-- script syllabus -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/syllabus.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/student.js?v=1.0');?>"></script>
    <script src="<?php echo base_url('assets/js/chat.js');?>"></script>
  </body>
</html>
