$(document).ready(function(){
  var prg = $('#program_id').val();
  syll(pin,prg);
  function syll(){
    if(prg!=''){
      show_syllabus(pin,prg);
    } else {
      no_syllabus();
    }
  }
  /* SYLLABUS */
  function show_syllabus(pin,prg) {
    $.ajax({
      type: 'post',
      url: `${u}/syllabus/get_syllabus`,
      dataType: 'json',
      data :{pin:pin, prg:prg},
      success: function(data) {
        var html = '', i, a, header = '',
            description = `<p class="lead">Here you can do the following: </p>
            <ul style="list-style-type: square;">
              <li>Tick the black square on right side of every indicator (or topic) to indicate discussed topics, or </li>
              <li>Hit the purple pencil button on the top right to change topics for this student.</li>
              <li>Click on the pair or ovals at the end of every topics to put their test score. (left = written, right = spoken).</li>
            </ul>`;
        if(prg == 1){
          a = "English for Kids";
          } else if(prg ==2){
            a = "Elementary Student";
          } else if(prg == 3){
            a = "Junior High School";
          } else if(prg == 4){
            a = "Senior Student";
          } else{
            a = "General English";
          }
        header = "<small>Syllabus for </small>"+a;
        for (i = 0; i < data.length; i++) {
          if (data[i].topic == 0 && data[i].ind == 0) { /* section */
            html += `<div class="col-2 syll_section">${data[i].section}</div>
                      <div class="col-10 syll_section">${data[i].indicator}
                    </div>`;
          } else if (data[i].topic != 0 && data[i].ind == 0) { /* topic */
            if(data[i].status == 1){
              html += `<div class="col-2 syll_topic syll_item" data-ind="${data[i].indicator}">
                         <span class="topic_discussed">${data[i].section}.${data[i].topic}</span>
                       </div>
                       <div class="col-7 syll_topic syll_item" data-ind="${data[i].indicator}">
                         <span class="topic_discussed">${data[i].indicator}</span>
                       </div>
                       <div style="padding-right:0px;" class="col-3 syll_topic row">
                        <div data-col="wr" data-id="${data[i].id}" class="col-4 tpc-score" title="written" contentEditable="true">`;
                if(data[i].wr!=0&&data[i].wr!=null){
                  html += `${data[i].wr}`;
                } else {
                  html += ``;
                }
                html += `</div>
                        <div data-col="sp" data-id="${data[i].id}" class="col-4 tpc-score" title="spoken" contentEditable="true">`;
                if(data[i].sp!=0&&data[i].sp!=null){
                  html += `${data[i].sp}`;
                } else {
                  html += ``;
                }
                html += `</div>
                          <div class="col-4"><a href="javascript:void(0);" data-stat="0" data-id="${data[i].id}" data-section="${data[i].section}" data-topic="${data[i].topic}" data-ind="${data[i].ind}" class="btn btn-default btn-sm topic_check">
                           <i class="fa fa-check-square fa-2x"></i>
                         </a></div>
                       </div>`;
            } else {
              html += `<div class="col-2 syll_topic syll_item" data-ind="${data[i].indicator}">
                          ${data[i].section}.${data[i].topic}</div>
                      <div class="col-7 syll_topic syll_item" data-ind="${data[i].indicator}">${data[i].indicator}
                      </div>
                      <div style="padding-right:0px;" class="col-3 syll_topic row">
                        <div data-col="wr" data-id="${data[i].id}" class="col-4 tpc-score" title="written" contentEditable="true">`;
               if(data[i].wr!=0&&data[i].wr!=null){
                 html += `${data[i].wr}`;
               } else {
                 html += ``;
               }
               html += `</div>
               <div data-col="sp" data-id="${data[i].id}" class="col-4 tpc-score" title="spoken" contentEditable="true">`;
               if(data[i].sp!=0&&data[i].sp!=null){
                 html += `${data[i].sp}`;
               } else {
                 html += ``;
               }

               html += `</div><div class="col-4"><a href="javascript:void(0);" data-stat="1" data-id="${data[i].id}" data-section="${data[i].section}" data-topic="${data[i].topic}" data-ind="${data[i].ind}" class="btn btn-default btn-sm topic_check"><i class="fa fa-square fa-2x"></i></a></div>
                      </div>`;
            }
          } else { /* indicator */
            if (data[i].status == 1) {
              html += `<div class="col-2 syll_ind syll_item" data-ind="(${data[i].section}.${data[i].topic}.${data[i].ind})">
                         <span class="topic_discussed">${data[i].section}.${data[i].topic}.${data[i].ind}</span>
                       </div>
                       <div class="col-9 syll_ind syll_item" data-ind="(${data[i].section}.${data[i].topic}.${data[i].ind})">
                         <span class="topic_discussed">${data[i].indicator}</span>
                       </div>
                       <div class="col-1 syll_ind">
                        <a href="javascript:void(0);" data-stat="0" data-id="${data[i].id}" data-section="${data[i].section}" data-topic="${data[i].topic}" data-ind="${data[i].ind}" class="btn btn-default btn-sm topic_check"><i class="fa fa-check-square fa-2x"></i></a>
                       </div>`;
            } else {
              html += `<div class="col-2 syll_ind syll_item" data-ind="(${data[i].section}.${data[i].topic}.${data[i].ind})">
                            ${data[i].section}.${data[i].topic}.${data[i].ind}
                      </div>
                       <div class="col-9 syll_ind syll_item" data-ind="(${data[i].section}.${data[i].topic}.${data[i].ind})"> ${data[i].indicator} </div>
                        <div class="col-1 syll_ind">
                          <a href="javascript:void(0);" data-stat="1" data-id="${data[i].id}" data-section="${data[i].section}" data-topic="${data[i].topic}" data-ind="${data[i].ind}" class="btn btn-default btn-sm topic_check">
                            <i class="fa fa-square fa-2x"></i>
                          </a>
                        </div>`;
            }
          }
        }
        $('#program_id').val(prg);
        $('#syllabus_tab_description').html(description);
        $('#show_syllabus').html(html);
        $('#syllabus_tab_header').html(header);
        $('#syll_edit_button_div').html('<button class="btn btn-sm btn-info edit_syllabus"><i class="fas fa-pencil-alt fa-fw"></i> Edit</button>');
      }
    });
  }
  $('#show_syllabus').on('focusin', '.tpc-score', function(){
    var col = $(this).data('col'),
        id= $(this).data('id'),
        score = $(this).text();
    $(this).on('focusout', function(){
      score2 = $(this).text();
      if(score!=score2){
        $.ajax({
          url : `${u}/syllabus/update_score`,
          type : "post",
          dataType : "json",
          data : {pin:pin, col:col, id:id, score: score2},
          success : function(data){
            show_syllabus(pin,prg);
          }
        });
      }
    });
  });
  $('#show_syllabus').on('click', '.syll_item', function(){
    var ind = $(this).data('ind');
    if($('#course_form').css('display')== 'block'){
      var text = $('#ma').val(),
          appended = text +" "+ind;
      $('#ma').val(appended);
      $('#ma_html').val(appended);
      $('#ma_prev').html($('#ma_html').val());
      $('#ma_prev').fadeIn('fast');
    }
  });
  /* check discussed topics */
  $('#show_syllabus').on('click', '.topic_check', function(){
    var id = $(this).data('id'),
        section = $(this).data('section'),
        topic = $(this).data('topic'),
        ind = $(this).data('ind'),
        status = $(this).data('stat'),
        program = $('#program_id').val();
    if(ind==0){
      $.ajax({
        type : "post",
        url : `${u}/syllabus/check_topic`,
        dataType : "json",
        data : {pin:pin, section:section, topic:topic, status:status},
        success : function(data){
          show_syllabus(pin,program);
        }
      });
    } else {
      $.ajax({
        type: "POST",
        url : `${u}/syllabus/check_ind`,
        dataType : "JSON",
        data : {pin : pin, id : id, status: status},
        success : function(data){
          $.ajax({
            type : "post",
            url : `${u}/syllabus/get_this_topic`,
            dataType : "json",
            data : {pin:pin, section:section, topic:topic, ind:ind, status:status},
            success : function(data){
              if(data.length==0){
                $.ajax({
                  type : "post",
                  url : `${u}/syllabus/check_topic`,
                  dataType : "json",
                  data : {pin:pin, section:section, topic:topic, status:status},
                  success :function(data){
                    show_syllabus(pin, program);
                  }
                });
              } else {

                  $.ajax({
                    type : "post",
                    url : `${u}/syllabus/check_topic_header`,
                    dataType : "json",
                    data : {pin:pin, section: section, topic: topic},
                    success : function(data){
                      show_syllabus(pin, program);
                    }
                  });
              }
            }
          });

        }
      });
    }
  }); /* end check */
  /* change topics */
  $('#syll_edit_button_div').on('click', '.edit_syllabus', function(){
    get_all(pin,prg);
    $('#edit_syllabus_modal').modal('show');
  });
  /* get all topics */
  function get_all(pin,prg){
    $.ajax({
      type : "post",
      url : `${u}/syllabus/get_all`,
      dataType : "json",
      data : {pin:pin, prg:prg},
      success : function(data){
        var html = '', i;
        for(i=0; i<data.length;i++){
          if (data[i].topic == 0 && data[i].ind == 0) {
            if (data[i].assigned == 1){
              html += `<div class="col-2 syll_section">${data[i].section}</div>
                       <div class="col-8 syll_section">${data[i].indicator}</div>
                       <div class="col-2 syll_section">
                         <a href="javascript:void(0);" data-id="${data[i].id}" data-section="${data[i].section}" data-topic="${data[i].topic}" data-ind="${data[i].ind}" data-assignto="0" class="syll_assign btn btn-default btn-sm">
                           <i class="fas fa-check-square fa-2x"></i>
                         </a>
                        </div>`;
            } else {
              html+= `<div class="col-2 syll_section">${data[i].section}</div>
                      <div class="col-8 syll_section">${data[i].indicator}</div>
                      <div class="col-2 syll_section">
                        <a href="javascript:void(0);" data-id="${data[i].id}" data-section="${data[i].section}" data-topic="${data[i].topic}" data-ind="${data[i].ind}" data-assignto="1" class="syll_assign btn btn-default btn-sm">
                          <i class="fas fa-square fa-2x"></i>
                        </a>
                      </div>`;
            }
          } else if (data[i].topic != 0 && data[i].ind == 0) {
            if(data[i].assigned == 1){
              html += `<div class="col-2 syll_topic">${data[i].section}.${data[i].topic}</div>
                       <div class="col-8 syll_topic">${data[i].indicator}</div>
                       <div class="col-2 syll_topic">
                         <a href="javascript:void(0);" data-id="${data[i].id}" data-section="${data[i].section}" data-topic="${data[i].topic}" data-ind="${data[i].ind}" data-assignto="0" class="syll_assign btn btn-default btn-sm">
                           <i class="fas fa-check-square fa-2x"></i>
                         </a>
                       </div>`;
            } else {
              html += `<div class="col-2 syll_topic">${data[i].section}.${data[i].topic}</div>
                       <div class="col-8 syll_topic">${data[i].indicator}</div>
                       <div class="col-2 syll_topic">
                         <a href="javascript:void(0);" data-id="${data[i].id}" data-section="${data[i].section}" data-topic="${data[i].topic}" data-ind="${data[i].ind}" data-assignto="1" class="syll_assign btn btn-default btn-sm">
                           <i class="fas fa-square fa-2x"></i>
                         </a>
                       </div>`;
            }

          } else { /* it is an indicator */
            if (data[i].assigned == 1) {
              html+= `<div class="col-2 syll_ind">${data[i].section}.${data[i].topic}.${data[i].ind}</div>
                      <div class="col-8 syll_ind"><span class="assigned">${data[i].indicator}</span></div>
                      <div class="col-2 syll_ind">
                        <a href="javascript:void(0);" data-id="${data[i].id}" data-section="${data[i].section}" data-topic="${data[i].topic}" data-ind="${data[i].ind}" data-assignto="0" class="btn btn-default btn-sm syll_assign">
                          <i class="fa fa-check-square fa-2x"></i>
                        </a>
                      </div>`;
            } else {
              html+= `<div class="col-2 syll_ind">${data[i].section}.${data[i].topic}.${data[i].ind}</div>
                      <div class="col-8 syll_ind">${data[i].indicator}</div>
                      <div class="col-2 syll_ind">
                        <a href="javascript:void(0);" data-id="${data[i].id}" data-section="${data[i].section}" data-topic="${data[i].topic}" data-ind="${data[i].ind}" data-assignto="1" class="btn btn-default btn-sm syll_assign">
                          <i class="fa fa-square fa-2x"></i>
                        </a>
                      </div>`;
            }
          }

        }
        $('#syllabus_edit_div').html(html);
      }
    });
  }
  /* assign topics keypress handler */
  $('#syllabus_edit_div').on('click', '.syll_assign', function(){
    var  id = $(this).data('id'),
        section = $(this).data('section'),
        topic = $(this).data('topic'),
        ind = $(this).data('ind'),
        program = prg,
        assign = $(this).data('assignto');
    if(topic==0){
      assign_section(pin, section, assign, program);
    } else if(topic != 0&& ind==0){
      assign_topic(pin, section, topic, assign, program);
    } else {
      assign_indicator(pin, id, assign, program);
    }
  });
  function assign_section(pin, section, assign, program){
    $.ajax({
      url: `${u}/syllabus/assign_section`,
      type : "post",
      dataType : "json",
      data : {pin:pin,section:section, assign:assign},
      success : function(data){
        get_all(pin,program);
        show_syllabus(pin,program);
      }
    });
  }
  function assign_topic(pin, section, topic, assign, program){
    $.ajax({
      url: `${u}/syllabus/assign_topic`,
      type : "post",
      dataType : "json",
      data : {pin:pin, section:section, topic:topic, assign:assign},
      success : function(data){
        get_all(pin,program);
        show_syllabus(pin,program);
      }
    });
  }
  function assign_indicator(pin, id, assign, program){
    $.ajax({
      url: `${u}/syllabus/assign_indicator`,
      type : "post",
      dataType : "json",
      data : {pin:pin, id:id, assign:assign},
      success : function(data){
        get_all(pin,program);
        show_syllabus(pin,program);
      }
    });
  }
  /* NO SYLLABUS */
  function no_syllabus(){
    var header='Choose the syllabus',
        msg = `<div class="col-md-4">
                <ul class="list-group">
                  <li class="list-group-item syllabus-level" data-level="1">Elementary - Kids</li>
                  <li class="list-group-item syllabus-level" data-level="2">Elementary</li>
                  <li class="list-group-item syllabus-level" data-level="3">Junior Student</li>
                  <li class="list-group-item syllabus-level" data-level="4">Senior Student</li>
                  <li class="list-group-item syllabus-level" data-level="5">General English</li>
                </ul>
              </div>
              <div class="col-8">
                Syllabus for this student is still empty. Click on one of these on the left side to see what each of them consists of.</em>
              </div>`;
    $('#syllabus_tab_header').html(header);
    $('#show_syllabus').html(msg);
  }
  $('#show_syllabus').on('click','.syllabus-level', function(){
    var level = $(this).data('level'),
        a = '',
        desc = `Select the suitable sections for the student (or you can simply leave all unchecked and customize them later), then click continue.`;
    if(level == 1){
      a = "English for Kids";
    } else if(level ==2){
      a = "Elementary Student";
    } else if(level == 3){
      a = "Junior High School";
    } else if(level == 4){
      a = "Senior Student";
    } else{
      a = "General English";
    }
    header = "Syllabus for "+a;
    $.ajax({
      url : `${u}/syllabus/get_sections`,
      type : "post",
      dataType : "json",
      data : {level:level},
      success : function(data){
        var msg =`<div class="col-4">
                    <ul class="list-group">`, i;
        for (i=0;i<data.length;i++){
          msg += `<li class="list-group-item syllabus_section" data-level="${level}" data-section="${data[i].sections}">${data[i].sections}. ${data[i].indicator} <span class="float-right"><input name="section_${data[i].sections}" id="section_${data[i].sections}" type="checkbox"></span></li>`;
        }
        msg += `</ul>
              </div>
              <div class="col-8">
                <div class="container">
                  <input type="hidden" name="level" id="level" value="${level}">
                  <button class="btn btn-sm btn-success go_back_btn" type="button"><i class="fas fa-angle-double-left fa-fw"></i> Go Back</button>
                  <button class="btn btn-sm btn-primary proceed_btn" id="proceed_btn" type="button">Continue <i class="fas fa-angle-double-right fa-fw"></i></button>
                </div>
                <br>
                <div class="container" id="show_topic">

                </div>
              </div>`;
        $('#show_syllabus').html(msg);
        $('#syllabus_tab_header').html(header);
        $('#syllabus_tab_description').html(desc);
      }
    });
  });
  $('#show_syllabus').on('click', '.syllabus_section', function(){
    $(this).siblings().removeClass('act');
    $(this).addClass('act');
    var level = $(this).data('level'),
        section = $(this).data('section');
    $.ajax({
      url:`${u}/syllabus/get_topics`,
      type : "post",
      dataType : "json",
      data : {level:level,section:section},
      success : function(data){
        var i,
            html = '<ul>';
        for(i=0;i<data.length;i++){
          html += `<li>${data[i].sections}.${data[i].topics} - ${data[i].indicator}</li>`;
        }
        html += '</ul>';
        $('#show_topic').html(html);
      }
    });
  });
  $('#show_syllabus').on('click', '.go_back_btn',function(){
    no_syllabus();
    $('#syllabus_tab_description').html("");
  });
  /* proceed */
  $('#show_syllabus').on('click', '.proceed_btn', function(){
    var level = $('#level').val(),
        program = '';
    if (level==1){
      program = 'Elementary Kids';
    } else if(level == 2){
      program = 'Elementary';
    } else if(level == 3){
      program = 'Junior';
    } else if(level == 4){
      program = 'Senior';
    } else{
      program = 'General English';
    }
    var msg = `<p>You would like to create <strong>${program}</strong> for <strong>${pin}</strong>.<br>Continue?</p>`;
    $('#create_syllabus_confirm').modal('show');
    $('#create_syllabus_msg').html(msg);
    $('#prg_id').val(level);
  });
  $('#btn_create_syllabus').on('click', function(){
    var level = $('#prg_id').val();
    create_syllabus(level);
  });
  function create_syllabus(level){
    $.ajax({
      type : "post",
      url : `${u}/syllabus/create`,
      dataType : "json",
      data : {pin:pin},
      success:function(data){
        $.ajax({
          type : "post",
          url : `${u}/syllabus/insert`,
          dataType : "json",
          data : {pin:pin, level:level},
          success : function(data){
            if(level ==1||level==2||level==4){
              var a = 0,b =0, c =0, d =0, e =0, f =0;
              if($('#section_1').is(':checked')){a =1;}
              if($('#section_2').is(':checked')){b =2;}
              if($('#section_3').is(':checked')){c =3;}
              if($('#section_4').is(':checked')){d =4;}
              if($('#section_5').is(':checked')){e =5;}
              if($('#section_6').is(':checked')){f =6;}
              var sections = [a,b,c,d,e,f];
              var i;
              for (i=0;i<sections.length;i++){
                if(sections[i] != 0){
                  assign_syllabus(pin, sections[i]);
                }
              }
            } else if(level==3){
              var a = 0,b =0, c =0, d =0, e =0, f =0, g=0;
              if($('#section_1').is(':checked')){a =1;}
              if($('#section_2').is(':checked')){b =2;}
              if($('#section_3').is(':checked')){c =3;}
              if($('#section_4').is(':checked')){d =4;}
              if($('#section_5').is(':checked')){e =5;}
              if($('#section_6').is(':checked')){f =6;}
              if($('#section_7').is(':checked')){g =7;}
              var sections = [a,b,c,d,e,f,g];
              var i;
              for (i=0;i<sections.length;i++){
                if(sections[i] != 0){
                  assign_syllabus(pin, sections[i]);

                }
              }
            } else if(level == 5){
              var a = 0,b =0, c =0, d =0, e =0, f =0, g=0, h=0;
              if($('#section_1').is(':checked')){a =1;}
              if($('#section_2').is(':checked')){b =2;}
              if($('#section_3').is(':checked')){c =3;}
              if($('#section_4').is(':checked')){d =4;}
              if($('#section_5').is(':checked')){e =5;}
              if($('#section_6').is(':checked')){f =6;}
              if($('#section_7').is(':checked')){g =7;}
              if($('#section_8').is(':checked')){h =8;}
              var sections = [a,b,c,d,e,f,g,h];
              var i;
              for (i=0;i<sections.length;i++){
                if(sections[i] != 0){
                  assign_syllabus(pin, sections[i]);
                }
              }
            }
            set_program(pin, level);
            $('#create_syllabus_confirm').modal('hide');
          }
        });
      }
    });
  }
  function set_program(pin,level){
    $.ajax({
      url:`${u}/syllabus/set_program`,
      type : "post",
      dataType : "json",
      data : {pin:pin,level:level},
      success : function(data){
        show_syllabus(pin,level);
      }
    });
  }
  function assign_syllabus(pin, sections){
    $.ajax({ /* assign */
      type : "post",
      url : `${u}/syllabus/assign`,
      dataType : "json",
      data : {pin: pin, section:sections},
      success : function(data){
        console.log('section assigned');
      }
    });
  }
});
