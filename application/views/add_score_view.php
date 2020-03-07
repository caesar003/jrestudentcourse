<!doctype html>
<html lang="en-us">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>title</title>
  </head>
  <body>
    <button type="button" id="button_modify">Click me</button>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.4.1.min.js');?>"></script>
    <script>
      $(document).ready(function(){
        console.log('okay');
        $('#button_modify').on('click', function(){
          console.log('clicked');
          $.ajax({
            url : "<?php echo site_url('add_score/get_pin');?>",
            type : "post",
            dataType : "json",
            success : function(data){
              var i;
              for (i=0;i<data.length;i++){
                $.ajax({
                  url : "<?php echo site_url('add_score/add_column')?>",
                  type : "post",
                  dataType : "json",
                  data : {pin:data[i].pin},
                  success : function(x){
                    console.log(" updated");
                  }
                });
              }
            }
          });
        });
      });
    </script>
  </body>
</html>
