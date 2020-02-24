
<!DOCTYPE html>
<html lang="en-us">
  <head>
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
  </head>
  <body>
    <div class="container">
      <h2>hello</h2>
      <button id="btn_1" class="btn btn-success btn-xl">Click me</button>
    </div>
    
    <?php include 'inc/scripts.php';?>
    <script>
      $(document).ready(function(){
        $('#btn_1').on('click', function(){
          
         $.ajax({
            type : "post",
            url : "<?php echo site_url('update/get_pin');?>",
            dataType : "json",
            success : function(data){
              var i;
              for (i=0;i<data.length;i++){
                console.log(data[i].pin);
                $.ajax({
                  type : "post",
                  url : "<?php echo site_url('update/add_col');?>",
                  dataType : "json",
                  data : {pin :data[i].pin },
                  success : function(data){
                    console.log(' updated');
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