<?php include 'inc/header.php';?>
    <div class="container">
      <h2>After Teaching List</h2>
      <div class="row">
        <div class="col-md-3">
          <div class="accordion" id="first_div">
          </div>
        </div>
        <div class="col-md-3">
          <div class="accordion" id="second_div">
          </div>
        </div>
        <div class="col-md-3">
          <div class="accordion" id="third_div">
          </div>
        </div>
        <div class="col-md-3">
          <div class="accordion" id="fourth_div">
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
        get_aft();
        function get_aft(){
          $.ajax({
            url:"<?php echo site_url('after_teaching/get_list'); ?>",
            type : "ajax",
            dataType : "json",
            success : function(data){
              var i,h1='',h2='',h3='',h4='';
              if(data.length>40){
                // first
                for (i=0;i<10;i++){
                  h1 += '<div class="card">'+
                            '<div class="card-header" id="heading_'+data[i].pin+'">'+
                              '<h2 class="mb-0">'+
                                '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+data[i].pin+'" aria-expanded="true" aria-controls="collapse_'+data[i].pin+'">'+
                                  data[i].pin+ ' - '+data[i].nick_name+
                                '</button>'+
                              '</h2>'+
                            '</div>'+
                            '<div id="collapse_'+data[i].pin+'" class="collapse" aria-labelledby="heading_'+data[i].pin+'" data-parent="#first_div">'+
                              '<div class="card-body">'+
                                data[i].pin+ 
                              '</div>'+
                            '</div>'+
                          '</div>';
                }
                // second
                for (i=10;i<20;i++){
                  h2 += '<div class="card">'+
                            '<div class="card-header" id="heading_'+data[i].pin+'">'+
                              '<h2 class="mb-0">'+
                                '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+data[i].pin+'" aria-expanded="true" aria-controls="collapse_'+data[i].pin+'">'+
                                  data[i].pin+ ' - '+data[i].nick_name+
                                '</button>'+
                              '</h2>'+
                            '</div>'+
                            '<div id="collapse_'+data[i].pin+'" class="collapse" aria-labelledby="heading_'+data[i].pin+'" data-parent="#second_div">'+
                              '<div class="card-body">'+
                                data[i].pin+ 
                              '</div>'+
                            '</div>'+
                          '</div>';
                }
                
                // third
                for (i=20;i<30;i++){
                  h3 += '<div class="card">'+
                            '<div class="card-header" id="heading_'+data[i].pin+'">'+
                              '<h2 class="mb-0">'+
                                '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+data[i].pin+'" aria-expanded="true" aria-controls="collapse_'+data[i].pin+'">'+
                                  data[i].pin+ ' - '+data[i].nick_name+
                                '</button>'+
                              '</h2>'+
                            '</div>'+
                            '<div id="collapse_'+data[i].pin+'" class="collapse" aria-labelledby="heading_'+data[i].pin+'" data-parent="#third_div">'+
                              '<div class="card-body">'+
                                data[i].pin+ 
                              '</div>'+
                            '</div>'+
                          '</div>';
                }
                // fouth
                for (i=30;i<40;i++){
                  h4 += '<div class="card">'+
                            '<div class="card-header" id="heading_'+data[i].pin+'">'+
                              '<h2 class="mb-0">'+
                                '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+data[i].pin+'" aria-expanded="true" aria-controls="collapse_'+data[i].pin+'">'+
                                  data[i].pin+ ' - '+data[i].nick_name+
                                '</button>'+
                              '</h2>'+
                            '</div>'+
                            '<div id="collapse_'+data[i].pin+'" class="collapse" aria-labelledby="heading_'+data[i].pin+'" data-parent="#fourht_div">'+
                              '<div class="card-body">'+
                                data[i].pin+ 
                              '</div>'+
                            '</div>'+
                          '</div>';
                }
              } else {
                if(data.length>30&&data.length<=40){
                  // first
                  for (i=0;i<10;i++){
                    h1 += '<div class="card">'+
                              '<div class="card-header" id="heading_'+data[i].pin+'">'+
                                '<h2 class="mb-0">'+
                                  '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+data[i].pin+'" aria-expanded="true" aria-controls="collapse_'+data[i].pin+'">'+
                                    data[i].pin+ ' - '+data[i].nick_name+
                                  '</button>'+
                                '</h2>'+
                              '</div>'+
                              '<div id="collapse_'+data[i].pin+'" class="collapse" aria-labelledby="heading_'+data[i].pin+'" data-parent="#first_div">'+
                                '<div class="card-body">'+
                                  data[i].pin+ 
                                '</div>'+
                              '</div>'+
                            '</div>';
                  }
                  // second
                  for (i=10;i<20;i++){
                    h2 += '<div class="card">'+
                              '<div class="card-header" id="heading_'+data[i].pin+'">'+
                                '<h2 class="mb-0">'+
                                  '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+data[i].pin+'" aria-expanded="true" aria-controls="collapse_'+data[i].pin+'">'+
                                    data[i].pin+ ' - '+data[i].nick_name+
                                  '</button>'+
                                '</h2>'+
                              '</div>'+
                              '<div id="collapse_'+data[i].pin+'" class="collapse" aria-labelledby="heading_'+data[i].pin+'" data-parent="#second_div">'+
                                '<div class="card-body">'+
                                  data[i].pin+ 
                                '</div>'+
                              '</div>'+
                            '</div>';
                  }

                  // third
                  for (i=20;i<30;i++){
                    h3 += '<div class="card">'+
                              '<div class="card-header" id="heading_'+data[i].pin+'">'+
                                '<h2 class="mb-0">'+
                                  '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+data[i].pin+'" aria-expanded="true" aria-controls="collapse_'+data[i].pin+'">'+
                                    data[i].pin+ ' - '+data[i].nick_name+
                                  '</button>'+
                                '</h2>'+
                              '</div>'+
                              '<div id="collapse_'+data[i].pin+'" class="collapse" aria-labelledby="heading_'+data[i].pin+'" data-parent="#third_div">'+
                                '<div class="card-body">'+
                                  data[i].pin+ 
                                '</div>'+
                              '</div>'+
                            '</div>';
                  }
                  // fouth
                  for (i=30;i<data.length;i++){
                    h4 += '<div class="card">'+
                              '<div class="card-header" id="heading_'+data[i].pin+'">'+
                                '<h2 class="mb-0">'+
                                  '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+data[i].pin+'" aria-expanded="true" aria-controls="collapse_'+data[i].pin+'">'+
                                    data[i].pin+ ' - '+data[i].nick_name+
                                  '</button>'+
                                '</h2>'+
                              '</div>'+
                              '<div id="collapse_'+data[i].pin+'" class="collapse" aria-labelledby="heading_'+data[i].pin+'" data-parent="#fourht_div">'+
                                '<div class="card-body">'+
                                  data[i].pin+ 
                                '</div>'+
                              '</div>'+
                            '</div>';
                  }
                } else {
                  if(data.length>20&&data.length<=30){
                    for (i=0;i<10;i++){
                      h1 += '<div class="card">'+
                                '<div class="card-header" id="heading_'+data[i].pin+'">'+
                                  '<h2 class="mb-0">'+
                                    '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+data[i].pin+'" aria-expanded="true" aria-controls="collapse_'+data[i].pin+'">'+
                                      data[i].pin+ ' - '+data[i].nick_name+
                                    '</button>'+
                                  '</h2>'+
                                '</div>'+
                                '<div id="collapse_'+data[i].pin+'" class="collapse" aria-labelledby="heading_'+data[i].pin+'" data-parent="#first_div">'+
                                  '<div class="card-body">'+
                                    data[i].pin+ 
                                  '</div>'+
                                '</div>'+
                              '</div>';
                    }
                    // second
                    for (i=10;i<20;i++){
                      h2 += '<div class="card">'+
                                '<div class="card-header" id="heading_'+data[i].pin+'">'+
                                  '<h2 class="mb-0">'+
                                    '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+data[i].pin+'" aria-expanded="true" aria-controls="collapse_'+data[i].pin+'">'+
                                      data[i].pin+ ' - '+data[i].nick_name+
                                    '</button>'+
                                  '</h2>'+
                                '</div>'+
                                '<div id="collapse_'+data[i].pin+'" class="collapse" aria-labelledby="heading_'+data[i].pin+'" data-parent="#second_div">'+
                                  '<div class="card-body">'+
                                    data[i].pin+ 
                                  '</div>'+
                                '</div>'+
                              '</div>';
                    }
                    // third
                    for (i=20;i<data.length;i++){
                      h3 += '<div class="card">'+
                                '<div class="card-header" id="heading_'+data[i].pin+'">'+
                                  '<h2 class="mb-0">'+
                                    '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+data[i].pin+'" aria-expanded="true" aria-controls="collapse_'+data[i].pin+'">'+
                                      data[i].pin+ ' - '+data[i].nick_name+
                                    '</button>'+
                                  '</h2>'+
                                '</div>'+
                                '<div id="collapse_'+data[i].pin+'" class="collapse" aria-labelledby="heading_'+data[i].pin+'" data-parent="#third_div">'+
                                  '<div class="card-body">'+
                                    data[i].pin+ 
                                  '</div>'+
                                '</div>'+
                              '</div>';
                    }
                  } else {
                    if(data.length>10&&data.length<=20){
                      for (i=0;i<10;i++){
                        h1 += '<div class="card">'+
                                  '<div class="card-header" id="heading_'+data[i].pin+'">'+
                                    '<h2 class="mb-0">'+
                                      '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+data[i].pin+'" aria-expanded="true" aria-controls="collapse_'+data[i].pin+'">'+
                                        data[i].pin+ ' - '+data[i].nick_name+
                                      '</button>'+
                                    '</h2>'+
                                  '</div>'+
                                  '<div id="collapse_'+data[i].pin+'" class="collapse" aria-labelledby="heading_'+data[i].pin+'" data-parent="#first_div">'+
                                    '<div class="card-body">'+
                                      data[i].pin+ 
                                    '</div>'+
                                  '</div>'+
                                '</div>';
                      }
                      // second
                      for (i=10;i<data.length;i++){
                        h2 += '<div class="card">'+
                                  '<div class="card-header" id="heading_'+data[i].pin+'">'+
                                    '<h2 class="mb-0">'+
                                      '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+data[i].pin+'" aria-expanded="true" aria-controls="collapse_'+data[i].pin+'">'+
                                        data[i].pin+ ' - '+data[i].nick_name+
                                      '</button>'+
                                    '</h2>'+
                                  '</div>'+
                                  '<div id="collapse_'+data[i].pin+'" class="collapse" aria-labelledby="heading_'+data[i].pin+'" data-parent="#second_div">'+
                                    '<div class="card-body">'+
                                      data[i].pin+ 
                                    '</div>'+
                                  '</div>'+
                                '</div>';
                      }
                    } else if(data.length<=10){
                      for (i=0;i<data.length;i++){
                        h1 += '<div class="card">'+
                                  '<div class="card-header" id="heading_'+data[i].pin+'">'+
                                    '<h2 class="mb-0">'+
                                      '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+data[i].pin+'" aria-expanded="true" aria-controls="collapse_'+data[i].pin+'">'+
                                        data[i].pin+ ' - '+data[i].nick_name+
                                      '</button>'+
                                    '</h2>'+
                                  '</div>'+
                                  '<div id="collapse_'+data[i].pin+'" class="collapse" aria-labelledby="heading_'+data[i].pin+'" data-parent="#first_div">'+
                                    '<div class="card-body">'+
                                      data[i].pin+ 
                                    '</div>'+
                                  '</div>'+
                                '</div>';
                      }
                    }
                  }
                }
              }
              // pur the things you want to display on the selected id here.
              $('#first_div').html( h1);
              $('#second_div').html(h2);
              $('#third_div').html(h3);
              $('#fourth_div').html(h4);
            }
          });
        }
      });
      /*var i,html="";
              if(data.length>=10){
                for (i=0;i<10;i++){
                  html += '<div class="card">'+
                            '<div class="card-header" id="heading_'+data[i].pin+'">'+
                              '<h2 class="mb-0">'+
                                '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+data[i].pin+'" aria-expanded="true" aria-controls="collapse_'+data[i].pin+'">'+
                                  data[i].pin+ ' - '+data[i].nick_name+
                                '</button>'+
                              '</h2>'+
                            '</div>'+
                            '<div id="collapse_'+data[i].pin+'" class="collapse" aria-labelledby="heading_'+data[i].pin+'" data-parent="#first_div">'+
                              '<div class="card-body">'+
                                data[i].pin+ 
                              '</div>'+
                            '</div>'+
                          '</div>';
                }
              } else {
                for (i=0;i<data.length;i++){
                  html += '<div class="card">'+
                            '<div class="card-header" id="heading_'+data[i].pin+'">'+
                              '<h2 class="mb-0">'+
                                '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+data[i].pin+'" aria-expanded="true" aria-controls="collapse_'+data[i].pin+'">'+
                                  data[i].pin+ ' - '+data[i].nick_name+
                                '</button>'+
                              '</h2>'+
                            '</div>'+
                            '<div id="collapse_'+data[i].pin+'" class="collapse" aria-labelledby="heading_'+data[i].pin+'" data-parent="#first_div">'+
                              '<div class="card-body">'+
                                data[i].pin+
                              '</div>'+
                            '</div>'+
                          '</div>';
                }
              }
              $('#first_div').html(html); */
     /* $(document).ready(function(){
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
      }); */
    </script>
  </body>
</hml>