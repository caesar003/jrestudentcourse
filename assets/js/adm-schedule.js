$(document).ready(function(){
  get_schedules();
  get_schedule();
  function get_schedules(){
    var d = $('#schedule_date').val();
    $.ajax({
      type : "ajax",
      url : `${u}/schedule/get_schedules`,
      dataType : "JSON",
      success : function(data){
        var html = '',i;
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
  $('#add_schedule').on('click', function(){
    var d = $('#schedule_date').val();
    if(d==''){
      $('#nscf').addClass("alert alert-danger");
      $('#nscf').fadeIn('fast');
      $('#nscf').html('Pick a date!');
      $('#nscf').fadeOut(3000);
    } else {
      $.ajax({
        type : "POST",
        url : `${u}/schedule/date_availability`,
        data : {d:d},
        success : function(response){
          if (response == 'true'){
            $('#nscf').removeClass('alert alert-success');
            $('#nscf').addClass("alert alert-danger");
            $('#nscf').fadeIn('fast');
            $('#nscf').html('Table for <strong>'+d+'</strong> already exists!');
            $('#nscf').fadeOut(3000);
          } else {
            $.ajax({
              type: "POST",
              url : `${u}/schedule/add_schedule`,
              dataType : "JSON",
              data : {d:d},
              success : function(data){
                $.ajax({
                  type : "POST",
                  url : `${u}/schedule/create_schedule`,
                  dataType : "JSON",
                  data: {d:d},
                  success: function(data){
                    $.ajax({
                      type : "POST",
                      url : `${u}/schedule/insert_teachers`,
                      dataType : "JSON",
                      data: {d:d},
                      success: function(data){
                        get_schedule();
                        get_schedules();
                        $('#nscf').removeClass('alert alert-danger');
                        $('#nscf').addClass("alert alert-success");
                        $('#nscf').fadeIn('fast');
                        $('#nscf').html('Table <strong>'+d+'</strong> created!');
                        $('#nscf').fadeOut(3000);

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
      url: `${u}/schedule/get_schedule?d=${d}`,
      dataType : "JSON",
      success : function(data){
        var html = '',
            schd_head = '<small>Schedule for</small> '+$.format.date(dtf, "ddd, MMM D, yyyy"),
            i,
            c=0;
        for (i=0;i<data.length;i++){
          c = c+1;
          html += `<tr>
                      <td rowspan="2" style="text-align:right;"><div>${c}</div></td>
                      <td rowspan="2" style="text-align:left;"><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="name">${data[i].name}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_9">${data[i]._9}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_9r">${data[i]._9r}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_9p">${data[i]._9p}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_10">${data[i]._10}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_10r">${data[i]._10r}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_10p">${data[i]._10p}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_11">${data[i]._11}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_11r">${data[i]._11r}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_11p">${data[i]._11p}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_12">${data[i]._12}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_12r">${data[i]._12r}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_12p">${data[i]._12p}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_13">${data[i]._13}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_13r">${data[i]._13r}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_13p">${data[i]._13p}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_14">${data[i]._14}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_14r">${data[i]._14r}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_14p">${data[i]._14p}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_15">${data[i]._15}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_15r">${data[i]._15r}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_15p">${data[i]._15p}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_16">${data[i]._16}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_16r">${data[i]._16r}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_16p">${data[i]._16p}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_17">${data[i]._17}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_17r">${data[i]._17r}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_17p">${data[i]._17p}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_18">${data[i]._18}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_18r">${data[i]._18r}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_18p">${data[i]._18p}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_19">${data[i]._19}</div></td>
                      <td><div contentEditable="true" class="edit"  data-id="${data[i].id}" data-col="_19r">${data[i]._19r}</div></td>
                      <td><div contentEditable="true" class="edit"  data-id="${data[i].id}" data-col="_19p">${data[i]._19p}</div></td>
                      <td><div contentEditable="true" class="edit"  data-id="${data[i].id}" data-col="_20">${data[i]._20}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_20r">${data[i]._20r}</div></td>
                      <td><div contentEditable="true" class="edit" data-id="${data[i].id}" data-col="_20p">${data[i]._20p}</div></td>
                      <td><a data-id="${data[i].id}" class="btn-sm teacher_delete" href="javascript:void(0);"><i style="color:red;" class="fas fa-trash"></i></a></td>
                      </tr><tr>
                        <td colspan="3">${data[i]._9n}</td>
                        <td colspan="3">${data[i]._10n}</td>
                        <td colspan="3">${data[i]._11n}</td>
                        <td colspan="3">${data[i]._12n}</td>
                        <td colspan="3">${data[i]._13n}</td>
                        <td colspan="3">${data[i]._14n}</td>
                        <td colspan="3">${data[i]._15n}</td>
                        <td colspan="3">${data[i]._16n}</td>
                        <td colspan="3">${data[i]._17n}</td>
                        <td colspan="3">${data[i]._18n}</td>
                        <td colspan="3">${data[i]._19n}</td>
                        <td colspan="3">${data[i]._20n}</td>
                      `;
        }

        $('#my_schedule').html(html);
        $('#schedule_header').html(schd_head);
        get_schedules();
        $.ajax({
          type : "POST",
          url : `${u}/schedule/get_note`,
          dataType : "JSON",
          data : {d:d},
          success: function(data){
            var html = '', i;
            for(i=0;i<data.length;i++){
              html += data[i].note;
            }
            $('#note').html(html);
          }
        });
      }
    });
  }

  $('#my_schedule').on('focusin','.edit', function(){
    $(this).addClass('editMode');
    var id= $(this).data('id'),
        col = $(this).data('col'),
        str = $(this).text(),
        d = $('#schedule_date').val(),
        name = '',
        nick_name = '';
    $(this).on('focusout',function(){
      $(this).removeClass('editMode');
      var str2 = $(this).text();
      /*
      * first just see if string is changed, by comparing the one at the focusin
      * and the one that left
      * if it is changed, check whether it is a pin column or non pin column,
      * if it is a pin column, assign the name,
      * if it is not the pin column, there is no name,
      * if the pin actually contain pin, take the name,
      * if it is not pin, make it empty,
      *
      */
      if(str != str2){
        if(col.indexOf("p")==-1&&col.indexOf("r")==-1){
          name = col+"n";
          if(!isNaN(str2)){
            $.ajax({
              url : `${u}/schedule/get_nick_name`,
              type : "post",
              dataType : "json",
              data : {str:str2},
              success : function(data){
                if(data!=''){
                  nick_name = data[0].nick_name;
                  $.ajax({
                    url : `${u}/schedule/set_nick_name`,
                    type : "post",
                    dataType : "json",
                    data : {id:id, nick_name:nick_name, col:name, d:d},
                    success : function(data){
                      console.log('nick name set');
                      update_schedule(id,col,str2,d);
                    }
                  });
                }
              }
            });
          } else {
            nick_name = '';
            $.ajax({
              url : `${u}/schedule/set_nick_name`,
              type : "post",
              dataType : "json",
              data : {id:id, nick_name:nick_name, col:name, d:d},
              success : function(data){
                console.log('nick name set');
                update_schedule(id,col,str2,d);
              }
            });
          }
        }
      }
    });
  });
  function update_schedule(id,col,str2,d){
    $.ajax({
      type : "post",
      url : `${u}/schedule/update`,
      dataType : "json",
      data : {id:id, col:col, str:str2, d:d},
      success : function(data){
        $('#nscf').removeClass('alert alert-danger');
        $('#nscf').addClass('alert alert-success');
        $('#nscf').html('Change saved!');
        $('#nscf').fadeIn('fast');
        $('#nscf').fadeOut(1000);
        get_schedule();
      }
    });
  }
  $('#note').on('focusin', function(){
    $(this).addClass('editMode');
    var str = $(this).text(),
        d = $('#schedule_date').val();
    $('#str').val(str);

  });
  $('#note').on('focusout',function(){
    $(this).removeClass('editMode');
    var str = $('#str').val(),
        str2 = $(this).text(),
        d = $('#schedule_date').val();
    if (str != str2){
      $.ajax({
        type : "post",
        url : `${u}/schedule/update_note`,
        dataType : "json",
        data : {d:d, str:str2},
        success :function(data){
          get_schedule();
        }
      });
    }
  });
  $('#new_teacher_button').on('click', function(){
    $('#new_teacher_modal').modal('show');
  });
  $('#add_teacher').on('submit', function(e){
    e.preventDefault();
    var name = $('#teacher_name').val(),
        d = $('#schedule_date').val();
    if (name == ''){
      $('#ntf').addClass('alert alert-danger');
      $('#ntf').html('It can\'t be empty');
    } else {
      $.ajax({
        url: `${u}/schedule/add_teacher`,
        method : "POST",
        dataType : "JSON",
        data : {name : name, d: d},
        success : function(data){
          $('#new_teacher_modal').modal('hide');
          $('#teacher_name').val("");
          $('#nscf').removeClass('alert alert-danger');
          $('#nscf').addClass('alert alert-success');
          $('#nscf').fadeIn('fast');
          $('#nscf').html('Teacher added!');
          $('#nscf').fadeOut(5000);
          get_schedule();
        }
      });
    }
  });
  $('#my_schedule').on('click','.teacher_delete', function(){
    var id = $(this).data('id');
    $('#id').val(id);
    $('#delete_teacher_modal').modal('show');
  });
  $('#btn_delete_teacher').on('click', function(){
    var id = $('#id').val(),
        d = $('#schedule_date').val();
    $.ajax({
      type : "POST",
      url : `${u}/schedule/delete_teacher`,
      dataType : "JSON",
      data : {id:id, d:d},
      success: function(data){
        $('#delete_teacher_modal').modal('hide');
        $('#nscf').removeClass('alert alert-success');
        $('#nscf').addClass('alert alert-danger');
        $('#nscf').fadeIn('fast');
        $('#nscf').html('Teacher removed!');
        $('#nscf').fadeOut(5000);
        get_schedule();
      }
    });
  });
});
