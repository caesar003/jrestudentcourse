<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How to guide || JRE Online Student Course</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url().'favicon.ico'?>">
    <style>
      .toc-item{
        cursor:pointer;
      }
      .toc-item:hover{
        background-color: beige;
        color:gray;
      }
      .highlighted {
        background-color: beige;
        color:gray;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-4">
          <h1>Table of Content</h1>
          <ul class="list-group" id="table-of-content">
            <li id="overview" class="list-group-item toc-item" data-content="overview">Overview</li>
            <li class="list-group-item toc-item" data-content="new-student">New Student</li>
            <li class="list-group-item toc-item" data-content="edit-student">Edit Student</li>
            <li class="list-group-item toc-item" data-content="course-list">Course</li>
            <li class="list-group-item toc-item" data-content="new-session">New Session</li>
            <li class="list-group-item toc-item" data-content="edit-session">Edit session</li>
            <li class="list-group-item toc-item" data-content="syllabus">Syllabus</li>
            <li class="list-group-item toc-item" data-content="test">Test</li>
            <li class="list-group-item toc-item" data-content="fsp">Final Speaking Performance</li>
            <?php if($this->session->userdata('level')==17):?>
            <li class="list-group-item toc-item" data-content="after-teaching">After Teaching</li>
          <?php endif;?>
            <li class="list-group-item toc-item" data-content="live-chat">Live Chat</li>
          </li>
        </div>
        <div class="col-8" id="main-content">
        </div>
      </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.4.1.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        var u = "<?php echo base_url();?>";
        $('#main-content').load(u+'others/howto/overview.php');
        $('#overview').addClass('highlighted');
        $('#table-of-content').on('click', '.toc-item', function(){
          $(this).siblings().removeClass('highlighted');
          $(this).addClass('highlighted');
          var content = $(this).data('content');
          $('#main-content').load(u+'others/howto/'+content+'.php');
        });
      });
    </script>
  </body>
</html>
