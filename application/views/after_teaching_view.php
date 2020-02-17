<?php include 'inc/header.php';?>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          
        </div>
        <div class="col-md-8">
          <div id="my_aft">
          
          </div>
        </div>
      </div>
    </div>
<?php include 'inc/footer.php';?>
<?php include 'inc/chat_dialog.php';?>
<?php include 'inc/scripts.php';?>
<?php include 'inc/chat-script.php';?>


    <script>
      $(document).ready(function(){
        function get_after_teaching(){
          $.ajax({
            url:"<?php echo site_url('after_teaching/get_list');?>",
            type : "ajax",
            dataType : "json",
            success : function(data){
              console.log('fetched');
            }
          });
        }
        $('#my_aft').on('click', '.someclass', function(){
          var pin = $(this).data('pin');
          $.ajax({
            url: "<?php echo site_url('after_teaching/get_course');?>",
            type : "post",
            dataType : "json",
            data : {pin:pin},
            success : function(data){
              $('#some_modal').modal('show');
              // display the content here
            }
          });
        });
        $('#remove_aft_btn').on('click', function(){
          var pin = $('#pin').val();
          $.ajax({
            url : "<?php echo site_url('after_teaching/delete_student');?>",
            type : "post",
            dataType : "json",
            data : {pin:pin},
            success : function(data){
              $('#some_modal').modal('hide');
              get_after_teaching();
            }
          });
        });
      });
    </script>
  </body>
</hml>