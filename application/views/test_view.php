<?php 
//include 'inc/header.php';
foreach ($student_detail->result() as $row){
  $pin = $row->pin; $name= $row->nick_name;
} 
$test_row = $test_info->row();
$user=$this->session->userdata('username');
if ($test_row->test_name == 'Pre Spoken' || $test_row->test_name == 'Pre Written'){
  $test = $test_row->test_name;
} else {
  $test = $test_row->test;
}
?>
<!DOCTYPE html>
<html lang="en-us">
  <head> 
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fontawesome-5.12.0/css/fontawesome.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fontawesome-5.12.0/css/brands.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fontawesome-5.12.0/css/regular.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fontawesome-5.12.0/css/solid.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/form-upload.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css'?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url().'favicon.ico'?>"> 
  </head>  
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary"> 
      <a class="navbar-brand" href="student">
        <img height="35" width="35" class="rounded-circle" src="<?php echo base_url().'icon.jpg'?>"> <strong>Jolly Roger</strong>
      </a> 
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> 
      </button> 
      <div class="collapse navbar-collapse" id="navbarsExample04"> 
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown"> 
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><!--img id="profile-picture" src="<?php echo base_url().$this->session->userdata('avatar');?>"--><?php echo $user;?></a> 
            <div class="dropdown-menu" aria-labelledby="dropdown04"> 
              <a class="dropdown-item" href="<?php echo site_url('login/logout');?>"><i class="fas fa-sign-out-alt"></i> Sign Out</a> 
              <a class="dropdown-item" href="<?php echo site_url('reset_password');?>"><i class="fas fa-key"></i> Reset Password</a> 
            </div>
          </li>
        </ul> 
      </div>
    </nav>
    <div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a style="text-decoration:none;" href="<?php echo site_url();?>"><i class="fas fa-home fa-fw"></i> Home</a></li>
      <li class="breadcrumb-item"><a style="text-decoration:none;" href="<?php echo site_url('student_single?pin='.$pin);?>"><i class="fas fa-user-circle fa-fw"></i> <?php echo $pin;?> - <?php echo $name;?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-question-circle fa-fw"></i> <?php echo $test;?> Test</li>
    </ol>
  </nav>
</div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 col-lg-3" id="student_info_div"> 
          <h3 class="page-header"><small>Student </small>Information</h3>
          <ul class="list-group" id="student_info"></ul>
        </div>
        <div class="col-md-9 col-lg-9">
          <div class="row container">
            <div class="card border-dark mb-3" style="max-width: 18rem;">
              <div class="card-header"><?php echo $test_row->test;?> test</div>
              <div class="card-body text-dark">
                <ul class="list-group">
                  <li title="Meeting" class="list-group-item"><strong><i class="fas fa-hashtag"></i> </strong> <?php echo $test_row->meeting;?></li>
                  <li title="Teacher" class="list-group-item"><strong><i class="fas fa-user-circle"></i>  </strong><?php echo $test_row->teacher;?></li>
                  <li title="Date and time" class="list-group-item"><strong><i class="fas fa-calendar"></i>  </strong> <?php echo $test_row->course_date;?></li>
                </ul>
              </div>
            </div>
            <div class="card border-dark" style="max-width:24rem;">
              <div class="card-header">Upload here</div>
              <div class="card-body text-dark">
                <form id="imageupload" action="<?php echo site_url('test/uploadSubmit');?>" method="post">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="file_title" id="file_title" placeholder="Title">
                  </div>
                  <div class="form-group">
                    <label for="file_upload">Select file</label>
                    <input type="file" name="file_upload" id="file_upload" data-height="300">
                  </div>
                  <div id="progressbr-container">
                    <div  id="progress-bar-status-show"></div>
                  </div>
                  <br />
                  <input type="hidden" name="meeting" value="<?php echo $test_row->meeting;?>">
                  <input type="hidden" name="pin" value="<?php echo $pin;?>">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
                </form>
              </div>
            </div>
          </div>
          <br>
          <div class="container">
            <h2 class="text-center">Files</h2>
            <div class="row" id="test_files">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- show image -->
    <div class="modal fade" id="view_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content edit">
          <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body" id="modal_body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>Close </button>
          </div>
        </div>
      </div>
    </div>
    <!-- Show image -->
    <?php include 'inc/footer.php';?>
    <?php include 'inc/chat_dialog.php';?>
    <script src="<?php echo base_url('assets/js/jquery-3.4.1.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/file_upload.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-dateformat.js');?>"></script>
    <?php include 'inc/chat-script.php';?>
    <script>
      $(document).ready(function(){
        get_test_files();
        get_student_detail();
        $('#imageupload').submit(function(e) { // form upload
          e.preventDefault();
          if($('#file_upload')[0].files.length == ''){
            console.log('file is empty!');
            alert('Choose file to upload!');
          } else {
            console.log('file is not empty');
            $("#progress-bar-status-show").width('0%'); 
            var file_details    =   document.getElementById("file_upload").files[0]; 
            var extension       =   file_details['name'].split(".");
            var allowed_extension   =   ["png", "jpg", "jpeg"];
            var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
            $(this).ajaxSubmit({ 
              beforeSubmit: function() {
                $("#progress-bar-status-show").width('0%');
              },
              uploadProgress: function (event, position, total, percentComplete){ 
                $("#progress-bar-status-show").width(percentComplete + '%');
                $("#progress-bar-status-show").html('<div id="progress-percent">' + percentComplete +' %</div>'); 
              },
              success:function (){
                console.log('success');
                alert('File Uploaded');
                $("#progress-bar-status-show").width('0%');
                get_test_files();
              },
              resetForm: true 
            }); 
            return false;
          }
        });
        $('#test_files').on('click', '.img_link', function(){
          var file_name = $(this).data('file_name');
          var img = '<img width="100%" src="<?php echo base_url()."assets/students/".$pin."/".$test_row->meeting."/";?>'+file_name+'">';
          $('#view_image').modal('show');
          $('#modal_body').html(img);
        });
        function get_test_files(){
          var pin = '<?php echo $pin;?>';
          var meeting = '<?php echo $test_row->meeting;?>';
          $.ajax({
            type: 'ajax',
            url : '<?php echo site_url('test/test_files')?>?pin='+pin+'&meeting='+meeting,
            dataType : 'json',
            success: function(data){
              var html = ''; var i;
              for (i = 0; i<data.length; i++){
                html += '<div class="card" style="width: 18rem;">'+
                  '<div class="card-body">'+
                  '<h5 class="card-title">'+data[i].title+'</h5>'+
                  '<!--h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6-->'+
                  '<p class="card-text">'+data[i].file_name+'.</p>';
                if (data[i].file_name.indexOf("jpg") > -1 || data[i].file_name.indexOf("png") > -1 || data[i].file_name.indexOf("bmp") > -1 || data[i].file_name.indexOf("gif") > -1 || data[i].file_name.indexOf(".JPG") > -1){
                  html += '<a href="javascript:void(0);" class="img_link" data-file_name="'+data[i].file_name+'"><img width="100%" src="<?php echo base_url()."assets/students/".$pin."/".$test_row->meeting."/";?>'+data[i].file_name+'"></a>';
                } else if(data[i].file_name.indexOf("pdf") > -1){
                  html += '<iframe width="100%" src="<?php echo base_url()."assets/students/".$pin."/".$test_row->meeting."/";?>'+data[i].file_name+'"></iframe>'+
                    '<a class="btn btn-info" href="<?php echo base_url()."assets/students/".$pin."/".$test_row->meeting."/";?>'+data[i].file_name+'"><i class="fas fa-eye"></i> View</a>';
                } else if (data[i].file_name.indexOf("mp4") > -1){
                  html += '<video width="100%" controls>'+
                    '<source src="<?php echo base_url()."assets/students/".$pin."/".$test_row->meeting."/";?>'+data[i].file_name+'" type="video/mp4">'+
                    'Your browser does not support video'+
                    '</video>';
                } else if(data[i].file_name.indexOf("mp3") > -1){
                  html += '<audio width="100%" controls>'+
                    '<source src="<?php echo base_url()."assets/students/".$pin."/".$test_row->meeting."/";?>'+data[i].file_name+'" type="audio/mp3">'+
                    'Your browser does not support audio'+
                    '</audio>';
                } else if(data[i].file_name.indexOf("doc") > -1){
                  html += '<span><i style="color:blue;" class="doc-thumb fas fa-file-word"></i></span><br><br>'+
                    '<a href="<?php echo base_url()."assets/students/".$pin."/".$test_row->meeting."/";?>'+data[i].file_name+'"><i class="fa fa-eye"></i> View</a>';
                }  else if(data[i].file_name.indexOf("xls") > -1){
                  html += '<span><i style="color:green;" class="doc-thumb fa fa-file-excel-o"></i></span><br><br>'+
                    '<a class="btn btn-info" href="<?php echo base_url()."assets/students/".$pin."/".$test_row->meeting."/";?>'+data[i].file_name+'"><i class="fa fa-eye"></i> View</a>';
                } else {
                  html += '<a href="<?php echo base_url()."assets/students/".$pin."/".$test_row->meeting."/";?>'+data[i].file_name+'">'+data[i].file_name+'</a>';
                }

                html +=  '</div>'+
                  '</div>';
              }
              $('#test_files').html(html);
            }
          });
        }
        function get_student_detail() {
          var pin = "<?php echo $pin;?>";
          $.ajax({
            type: 'ajax', 
            url: '<?php echo site_url('student_single/get_student_info?pin=')?>'+pin, 
            dataType : 'json ', 
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
                  }

              $('#student_info').html(html);
            }
          });
        }
      });
  </script>
  </body>
  </html>