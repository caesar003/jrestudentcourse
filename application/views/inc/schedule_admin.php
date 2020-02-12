<script>
      $(document).ready(function(){
        $('#see_schedule').on('click',function(){
          get_schedule();
        });
        get_schedules();
        get_schedule();
        function get_schedules(){
          var d = $('#schedule_date').val();
          $.ajax({
            type : "ajax",
            url : "<?php echo site_url('schedule/get_schedules');?>",
            dataType : "JSON",
            success : function(data){
              var html = '',
                  i;
              for(i=0;i<data.length;i++){
                if(data[i].table_name == d){
                  html += '<li class="list-group-item curr"><a class="schedule_list_item  curr_a" href="javascript:void(0);" data-d="'+data[i].table_name+'">'+data[i].table_name+'</a></li>'
                } else {
                  html += '<li class="list-group-item"><a class="schedule_list_item" href="javascript:void(0);" data-d="'+data[i].table_name+'">'+data[i].table_name+'</a></li>'
                }
              }
              $('#schedule_list').html(html);
            }
          });
        }
        $('#add_schedule_date').on('click',function(){
          $('#new_schedule_feedback').fadeOut('slow');
          $('#new_schedule_feedback').removeClass("alert alert-danger alert-success");
          $('#new_schedule_feedback').html('');
        });
        $('#add_schedule').on('click', function(){
          var d = $('#add_schedule_date').val();
          console.log(d);
          if(d==''){
            console.log('Date Empty');
            $('#new_schedule_feedback').addClass("alert alert-danger");
            $('#new_schedule_feedback').fadeIn('fast');
            $('#new_schedule_feedback').html('Pick a date!');
          } else {
            $.ajax({
              type : "POST",
              url : "<?php echo site_url('schedule/date_availability');?>",
              data : {d:d},
              success : function(response){
                if (response == 'true'){
                  console.log('Table exists');
                  $('#new_schedule_feedback').addClass("alert alert-danger");
                  $('#new_schedule_feedback').fadeIn('fast');
                  $('#new_schedule_feedback').html('Table for <strong>'+d+'</strong> already exists!');
                  //$('#new_schedule_feedback').fadeOut('50000');
                } else {
                  console.log('table is available')
                  $.ajax({
                    type: "POST",
                    url : "<?php echo site_url('schedule/add_schedule');?>",
                    dataType : "JSON",
                    data : {d:d},
                    success : function(data){
                      console.log(d+' added to the list!');
                      $.ajax({
                        type : "POST",
                        url : "<?php echo site_url('schedule/create_schedule'); ?>",
                        dataType : "JSON",
                        data: {d:d},
                        success: function(data){
                          console.log('Schedule for '+d+' created!');
                          $.ajax({
                            type : "POST",
                            url : "<?php echo site_url('schedule/insert_teachers'); ?>",
                            dataType : "JSON",
                            data: {d:d},
                            success: function(data){
                              console.log('Teachers inserted!');
                              get_schedule();
                              get_schedules();
                              $('#new_schedule_feedback').addClass("alert alert-success");
                              $('#new_schedule_feedback').fadeIn('fast');
                              $('#new_schedule_feedback').html('Table <strong>'+d+'</strong> created!');
                            }
                          });
                        }
                      });
                    }
                  }); 
                }
              }
            });
          }          
        });
        $('#schedule_list').on('click','.schedule_list_item', function(){
          var d = $(this).data('d');
          get_schedule(d);
          $('#schedule_date').val(d);
        });
        function get_schedule(d = $('#schedule_date').val()){
          var dtf = d + " 00:00:00";
              
          $.ajax({
            type: "ajax",
            url: "<?php echo site_url('schedule/get_schedule?d=');?>"+d,
            dataType : "JSON",
            success : function(data){
              var html = '',
                  schd_head = '<small>Schedule for</small> '+$.format.date(dtf, "ddd, MMM D, yyyy"),
                  i;
              for (i=0;i<data.length;i++){
                html += '<tr>'+
                          '<td style="text-align:right;"><div>'+data[i].id+'</div></td>'+
                          '<td style="text-align:left;"><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="name">'+data[i].name+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_9">'+data[i]._9+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_9r">'+data[i]._9r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_9p">'+data[i]._9p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_10">'+data[i]._10+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_10r">'+data[i]._10r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_10p">'+data[i]._10p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_11">'+data[i]._11+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_11r">'+data[i]._11r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_11p">'+data[i]._11p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_12">'+data[i]._12+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_12r">'+data[i]._12r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_12p">'+data[i]._12p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_13">'+data[i]._13+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_13r">'+data[i]._13r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_13p">'+data[i]._13p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_14">'+data[i]._14+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_14r">'+data[i]._14r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_14p">'+data[i]._14p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_15">'+data[i]._15+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_15r">'+data[i]._15r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_15p">'+data[i]._15p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_16">'+data[i]._16+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_16r">'+data[i]._16r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_16p">'+data[i]._16p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_17">'+data[i]._17+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_17r">'+data[i]._17r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_17p">'+data[i]._17p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_18">'+data[i]._18+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_18r">'+data[i]._18r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_18p">'+data[i]._18p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_19">'+data[i]._19+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_19r">'+data[i]._19r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_19p">'+data[i]._19p+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_20">'+data[i]._20+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_20r">'+data[i]._20r+'</div></td>'+
                          '<td><div contentEditable="true" class="edit" data-id="'+data[i].id+'" data-col="_20p">'+data[i]._20p+'</div></td>'+
                          '<td><a data-id="'+data[i].id+'" class="btn-sm teacher_delete" href="javascript:void(0);"><i style="color:red;" class="fas fa-trash"></i></a></td>'
                        '</tr>'+
                  '<tr>';
              }
              $('#my_schedule').html(html);
              $('#schedule_header').html(schd_head);
              get_schedules();
            }
          });
        }
        $('#my_schedule').on('click','.teacher_delete', function(){
          var id = $(this).data('id');
          $('#id').val(id);
          $('#delete_teacher_modal').modal('show');
        });
        $('#btn_delete_teacher').on('click', function(){
          var id = $('#id').val(),
              d = $('#schedule_date').val();
          console.log(id);
          console.log(d);
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('schedule/delete_teacher');?>",
            dataType : "JSON",
            data : {id:id, d:d},
            success: function(data){
              console.log('Teacher deleted!');
              $('#delete_teacher_modal').modal('hide');
              get_schedule();
            }
          });
        });
        
        $('#my_schedule').on('focusin', '.edit', function(){
          $(this).addClass('editMode');
        });
        
        $('#my_schedule').on('focusout', '.editMode', function(){
          $(this).removeClass('editMode');
          var id= $(this).data('id'),
              col = $(this).data('col'),
              str = $(this).text(),
              d = $('#schedule_date').val();
          
            console.log('text is not empty');
            $.ajax({
              type : "POST",
              url : "<?php echo site_url('schedule/update') ;?>",
              dataType : "JSON",
              data : {id: id, col: col, str:str, d: d},
              success : function(data){
                console.log('updated');
              }
            });
          
        });
        $('#new_teacher_button').on('click', function(){
          $('#new_teacher_modal').modal('show');
        });
        $('#btn_save_teacher').on('click', function(){
          var name = $('#teacher_name').val(),
              d = $('#schedule_date').val();
          if (name == ''){
            $('#ntf').addClass('alert alert-danger');
            $('#ntf').html('It can\'t be empty');
          } else {            
            $.ajax({
              url: "<?php echo site_url('schedule/add_teacher');?>",
              method : "POST",
              dataType : "JSON",
              data : {name : name, d: d},
              success : function(data){
                $('#new_teacher_modal').modal('hide');
                $('#teacher_name').val("");
                get_schedule();
              }
            });
          }
          
        });
      });
    </script>