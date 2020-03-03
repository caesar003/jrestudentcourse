<!doctype html>
<html>
  <head>

  </head>
  <body>
    <button type="button" id="empty">Empty</button>
    <script src="<?php echo base_url('assets/js/jquery-3.4.1.min.js');?>"></script>
    <script>
      $(document).ready(function(){
        $('#empty').on('click', function(){
          $.ajax({
            url : "<?php echo site_url('change_syllabus/get_pin');?>",
            dataType : "json",
            success : function(data){
              var i;
              var level = 1;
              for (i=0; i<data.length;i++){
                console.log(data[i].pin);
                $.ajax({
                  url : "<?php echo site_url('change_syllabus/insert');?>",
                  type : "post",
                  dataType : "json",
                  data : {pin:data[i].pin, level:level},
                  success : function(data){
                    console.log('inserted');
                  }
                }); /*
                $.ajax({
                  url : "<?php echo site_url('change_syllabus/make_empty');?>",
                  type : "post",
                  dataType : "json",
                  data : {pin:data[i].pin},
                  success : function(data){
                    console.log('removed');
                  }
                });*/
              }
            }
          });
        });
      });
    </script>
  </body>
</html>
