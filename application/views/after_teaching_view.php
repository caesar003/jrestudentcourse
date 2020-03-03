<?php include 'inc/header.php';?>
    <div class="container">
      <h2>After Teaching List</h2>
      <div class="row">
        <div class="col-md-3">
          <ul class="list-group" id="aft_list"></ul>
        </div>
        <div class="col-md-9" id="main_content">
          <div class="container">
            <h3>Note here</h3>
            <div class="container" id="note">

            </div>
            <div class="container">
              <form id="note_form" autocomplete="off">
                <label for="note_input">New note</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i style="color: crimson;" class="fas fa-sticky-note fa-fw"></i></span>
                  </div>
                  <input type="text" class="form-control" name="note_input" id="note_input" placeholder="Write something here...">
                  <div class="input-group-append">
                    <span id="submit_note" class="input-group-text"><i class="fas fa-check"></i></span>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <br>
          <div class="container-fluid">
            <h3 id="aft_header">Choose one from the list on left.
            </h3>
            <br>
            <div class="accordion" id="stdinfo">
            </div>
          </div>
          <br>
          <div class="container-fluid" id="course_summary">
          </div>
        </div>
      </div>
    </div>
<?php include 'inc/footer.php';?>
<?php include 'inc/chat_dialog.php';?>
<?php include 'inc/scripts.php';?>
    <script type="text/javascript">
      var u = "<?php echo site_url();?>",
      baseurl = "<?php echo base_url();?>",
      teacher = "<?php echo $this->session->userdata('username');?>",
      user = teacher;
      avatar = "<?php echo $this->session->userdata('avatar');?>",
      sender = "<?php echo $this->session->userdata('id');?>";
    </script>
    <script src="<?php echo base_url('assets/js/after-teaching.js')?>"></script>
    <script src="<?php echo base_url('assets/js/chat.js');?>"></script>
  </body>
</html>
