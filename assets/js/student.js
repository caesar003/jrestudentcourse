$(document).ready(function() {
  get_student_detail();
  $('#cheatsheet_button').on('click', function(){
    $('#cheatsheet_box').toggle('fast');
    $('#cheatsheet_close').on('click', function(){
      $('#cheatsheet_box').fadeOut('slow');
    });
  });
  function get_student_detail(){
    $.ajax({
      type : 'post',
      url : `${u}/student_single/get_student_info`,
      dataType : 'json',
      data : {pin:pin},
      success : function(data){
        var html = '',
            edit_student_button= '',
            i;
        for(i=0;i<data.length;i++){
          edit_student_button += `<a title="Edit student and course detail" href="javascript:void(0);" class="btn btn-info btn-sm tooltip-bottom student_info_edit" data-grp="${data[i].grp}" data-pn="${data[i].pin}" data-cn="${data[i].complete_name}" data-nn="${data[i].nick_name}" data-ad="${data[i].address}" data-pb="${data[i].place_of_birth}" data-db="${$.format.date(data[i].date_of_birth, "yyyy-MM-dd")}" data-ph="${data[i].phone}" data-cnst2="${data[i].cnst2}" data-nnst2="${data[i].nnst2}" data-adrst2="${data[i].adrst2}" data-pobst2="${data[i].pobst2}" data-dobst2="${($.format.date(data[i].dobst2, "yyyy-MM-dd"))}" data-phst2="${data[i].phst2}" data-cnst3="${data[i].cnst3}" data-nnst3="${data[i].nnst3}" data-adrst3="${data[i].adrst3}" data-pobst3="${data[i].pobst3}" data-dobst3="${($.format.date(data[i].dobst3, "yyyy-MM-dd"))}" data-phst3="${data[i].phst3}" data-cnst4="${data[i].cnst4}" data-nnst4="${data[i].nnst4}" data-adrst4="${data[i].adrst4}" data-pobst4="${data[i].pobst4}" data-dobst4="${($.format.date(data[i].dobst4, "yyyy-MM-dd"))}" data-phst4="${data[i].phst4}" data-pr="${data[i].program}" data-pd="${data[i].program_duration}" data-sd="${($.format.date(data[i].starting_date, "yyyy-MM-dd"))}" data-re="${data[i].reason}" data-ta="${data[i].target}" data-di="${data[i].difficulties}" data-bg="${data[i].bground}" data-si="${data[i].self_introduction}" data-wp="${data[i].weakness_point}" data-ap="${data[i].action_plan}" data-fsp="${data[i].fsp}"><i class="fas fa-user-edit fa-fw"></i></a>`;
         html += `  <div class="card">
                      <div class="card-header" id="heading_student">
                        <h2 class="mb-0">
                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_student" aria-expanded="true" aria-controls="collapse_student">
                            PERSONAL INFORMATION
                          </button>
                        <span class="float-right" id="edit_student_span"></span>
                        </h2>
                      </div>

                      <div id="collapse_student" class="collapse show" aria-labelledby="heading_student" data-parent="#student_info">
                        <div class="card-body">`;
          if(data[i].grp!=''){
            html += `<li class="list-group-item tooltip-bottom" title="Group study" style="background-color:gray;color:white;">${data[i].grp}</li>`;
          } else {
            html += ``;
          }
          html +=   `<span class="student_info_item"> PIN :</span>${data[i].pin}<br>
                        <span class="student_info_item"> Name:</span>  ${data[i].complete_name}, ${data[i].nick_name}<br>
                        <span class="student_info_item">   Address:</span>${data[i].address} <br>
                        <span class="student_info_item">   PDoB:</span>${data[i].place_of_birth}, ${($.format.date(data[i].date_of_birth, "yyyy-MM-dd"))} <br>
                        <span class="student_info_item">   Phone:</span> ${data[i].phone}<br>
                        </div>
                      </div>
                    </div>`;
          if(data[i].cnst2 !=''){
            html += `<div class="card">
                  <div class="card-header" id="heading_student2">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_student2" aria-expanded="true" aria-controls="collapse_student2">
                      STUDENT 2
                      </button>
                    </h2>
                  </div>
                  <div id="collapse_student2" class="collapse" aria-labelledby="heading_student2" data-parent="#student_info">
                    <div class="card-body">
                      <span class="student_info_item"> Name :</span> ${data[i].cnst2 }, ${data[i].nnst2 }<br>
                      <span class="student_info_item"> Address:</span> ${data[i].adrst2 }<br>
                      <span class="student_info_item"> PDoB:</span> ${data[i].pobst2}, ${($.format.date(data[i].dobst2, "yyyy-MM-dd"))}<br>
                      <span class="student_info_item"> Phone:</span> ${data[i].phst2}<br>
                    </div>
                  </div>
                </div>` ;
          }
          if(data[i].cnst3 !=''){
            html += `<div class="card">
                  <div class="card-header" id="heading_student3">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_student3" aria-expanded="true" aria-controls="collapse_student3">
                      STUDENT 3
                      </button>
                    </h2>
                  </div>
                  <div id="collapse_student3" class="collapse" aria-labelledby="heading_student3" data-parent="#student_info">
                    <div class="card-body">
                      <span class="student_info_item"> Name :</span> ${data[i].cnst3}, ${data[i].nnst3 }<br>
                      <span class="student_info_item"> Address:</span> ${data[i].adrst3 }<br>
                      <span class="student_info_item"> PDoB:</span> ${data[i].pobst3}, ${($.format.date(data[i].dobst3, "yyyy-MM-dd"))}<br>
                      <span class="student_info_item"> Phone:</span> ${data[i].phst3}<br>
                    </div>
                  </div>
                </div>` ;
          }
           if(data[i].cnst4 !=''){
            html += `<div class="card">
                  <div class="card-header" id="heading_student4">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_student4" aria-expanded="true" aria-controls="collapse_student4">
                      STUDENT 4
                      </button>
                    </h2>
                  </div>
                  <div id="collapse_student4" class="collapse" aria-labelledby="heading_student4" data-parent="#student_info">
                    <div class="card-body">
                      <span class="student_info_item"> Name :</span> ${data[i].cnst3}, ${data[i].nnst3}<br>
                      <span class="student_info_item"> Address:</span> ${data[i].adrst3}<br>
                      <span class="student_info_item"> PDoB:</span> ${data[i].pobst3}, ${($.format.date(data[i].dobst3, "yyyy-MM-dd"))}<br>
                      <span class="student_info_item"> Phone:</span> ${data[i].phst3}<br>
                    </div>
                  </div>
                </div>`;
          }
          html += `<div class="card">
                      <div class="card-header" id="heading_course_detail">
                        <h2 class="mb-0">
                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_course_detail" aria-expanded="true" aria-controls="collapse_course_detail">
                            COURSE DETAIL
                          </button>
                        </h2>
                      </div>

                      <div id="collapse_course_detail" class="collapse" aria-labelledby="heading_course_detail" data-parent="#student_info">
                        <div class="card-body">
                    <span class="student_info_item"> Program:</span>${data[i].program}<br>
                    <span class="student_info_item"> Program duration: </span>${data[i].program_duration}<br>
                    <span class="student_info_item"> Started on:</span>${($.format.date(data[i].starting_date, "MMM,dd yyyy"))} <br>
                    <span class="student_info_item"> Reason:</span> ${data[i].reason}<br>
                    <span class="student_info_item"> Target:</span> ${data[i].target}<br>
                    <span class="student_info_item"> Difficulties:</span> ${data[i].difficulties}<br>
                    <span class="student_info_item"> Background:</span> ${data[i].bground}<br>
                    <span class="student_info_item"> Self Introduction:</span> ${data[i].self_introduction}<br>
                    <span class="student_info_item"> Weakness points: </span>  ${data[i].action_plan}<br>
                    <span class="student_info_item"> Action Plan: </span> ${data[i].action_plan}

                        </div>
                      </div>
                    </div>`;

          if (data[i].fsp == 'yes'){
            $('#fsp_tab').css('display','block');
            get_fsp();

          }
        }
        $('#student_info').html(html);
        $('#edit_student_span').html(edit_student_button);
      }
    });
  }
  $('#student_info').on('click','.student_info_edit',function(){
    var grp=$(this).data('grp'),
        pn=$(this).data('pn'),
        cn=$(this).data('cn'),
        nn=$(this).data('nn'),
        ad=$(this).data('ad'),
        pb=$(this).data('pb'),
        db=$(this).data('db'),
        ph=$(this).data('ph'),
        cnst2=$(this).data('cnst2'),
        nnst2=$(this).data('nnst2'),
        adrst2=$(this).data('adrst2'),
        pobst2=$(this).data('pobst2'),
        dobst2=$(this).data('dobst2'),
        phst2=$(this).data('phst2'),
        cnst3=$(this).data('cnst3'),
        nnst3=$(this).data('nnst3'),
        adrst3=$(this).data('adrst3'),
        pobst3=$(this).data('pobst3'),
        dobst3=$(this).data('dobst3'),
        phst3=$(this).data('phst3'),
        cnst4=$(this).data('cnst4'),
        nnst4=$(this).data('nnst4'),
        adrst4=$(this).data('adrst4'),
        pobst4=$(this).data('pobst4'),
        dobst4=$(this).data('dobst4'),
        phst4=$(this).data('phst4'),
        pr=$(this).data('pr'),
        pd=$(this).data('pd'),
        sd=$(this).data('sd'),
        re=$(this).data('re'),
        ta=$(this).data('ta'),
        di=$(this).data('di'),
        bg=$(this).data('bg'),
        si=$(this).data('si'),
        wp=$(this).data('wp'),
        ap=$(this).data('ap'),
        fsp = $(this).data('fsp'),
        fsp_button = '<input type="checkbox" name="fsp" id="fsp"' ;

    $('#esm').modal('show');
    $('[name="pn_e"]').val(pn);
    $('[name="cn_e"]').val(cn);
    $('[name="nn_e"]').val(nn);
    $('[name="ad_e"]').val(ad);
    $('[name="pb_e"]').val(pb);
    $('[name="db_e"]').val(db);
    $('[name="ph_e"]').val(ph);
    $('[name="grp_e"]').val(grp);
    $('[name="cnst2_e"]').val(cnst2);
    $('[name="nnst2_e"]').val(nnst2);
    $('[name="adrst2_e"]').val(adrst2);
    $('[name="pbst2_e"]').val(pobst2);
    $('[name="dbst2_e"]').val(dobst2);
    $('[name="phst2_e"]').val(phst2);
    $('[name="cnst3_e"]').val(cnst3);
    $('[name="nnst3_e"]').val(nnst3);
    $('[name="adrst3_e"]').val(adrst3);
    $('[name="pbst3_e"]').val(pobst3);
    $('[name="dbst3_e"]').val(dobst3);
    $('[name="phst3_e"]').val(phst3);
    $('[name="cnst4_e"]').val(cnst4);
    $('[name="nnst4_e"]').val(nnst4);
    $('[name="adrst4_e"]').val(adrst4);
    $('[name="pbst4_e"]').val(pobst4);
    $('[name="dbst4_e"]').val(dobst4);
    $('[name="phst4_e"]').val(phst4);
    $('[name="pr2"]').val(pr);
    $('[name="pd2"]').val(pd);
    $('[name="sd2"]').val(sd);
    $('[name="re2"]').val(re);
    $('[name="ta2"]').val(ta);
    $('[name="di2"]').val(di);
    $('[name="bg2"]').val(bg);
    $('[name="si2"]').val(si);
    $('[name="wp2"]').val(wp);
    $('[name="ap2"]').val(ap);
    if(cnst2==''){
      $('#group_name_e, #student2_e, #student3_e, #student4_e').css('display', 'none');
    } else {
      if(cnst3==''){
        $('#group_name_e,#student2_e').css('display', 'block');
        $('#student3_e,#student4_e').css('display', 'none');
      } else {
        if(cnst4 == ''){
          $('#group_name_e,#student2_e,#student3_e').css('display', 'block');
          $('#student4_e').css('display','none');
        } else{
          $('#group_name_e,#student2_e,#student3_e,#student4_e').css('display', 'block');
        }
      }
    }
    $('#add_one_e').on('click',function(){
      $('#group_name_e,#student2_e').fadeIn('slow');
      $('#group_name_e,#student2_e').css('display', 'block');
    });
    $('#add_two_e').on('click', function(){
      $('#student3_e').fadeIn('slow');
      $('#student3_e').css('display','block');
    });
    $('#remove_three_e').on('click',function(){
      $('#group_name_e,#student2_e,#student3_e,#student4_e').fadeOut('fast');
    });
    $('#add_three_e').on('click', function(){
      $('#student4_e').fadeIn('slow');
      $('#student4_e').css('display', 'block');
    });
    $('#remove_two_e').on('click', function(){
      $('#student3_e,#student4_e').fadeOut('fast');
    });
    $('#remove_one_e').on('click', function(){
      $('#student4_e').fadeOut('fast');
    });
    if (fsp == 'yes'){
      fsp_button += 'checked disabled> <label for="fsp">Final Speaking Performance</label>';
    } else {
      fsp_button += '> <label for="fsp">Final Speaking Performance</label>';
    }
    $('#fsp_button').html(fsp_button);
  });
  $('#update_student_btn').on('click', function(){
    var bck = 'background-color', clr = '#fbe2e6', pn=$('#pn_e').val(), cn=$('#cn_e').val(), nn=$('#nn_e').val(), ad=$('#ad_e').val(), pb=$('#pb_e').val(), db=$('#db_e').val(), ph=$('#ph_e').val(), grp=$('#grp_e').val(), cn2=$('#cnst2_e').val(), nn2=$('#nnst2_e').val(), ad2=$('#adrst2_e').val(), pb2=$('#pbst2_e').val(), db2=$('#dbst2_e').val(), ph2=$('#phst2_e').val(), cn3=$('#cnst3_e').val(), nn3=$('#nnst3_e').val(), ad3=$('#adrst3_e').val(), pb3=$('#pbst3_e').val(), db3=$('#dbst3_e').val(), ph3=$('#phst3_e').val(), cn4=$('#cnst4_e').val(), nn4=$('#nnst4_e').val(), ad4=$('#adrst4_e').val(), pb4=$('#pbst4_e').val(), db4=$('#dbst4_e').val(), ph4=$('#phst4_e').val(), pr=$('#pr2').val(), pd=$('#pd2').val(), sd=$('#sd2').val(), re=$('#re2').val(), ta=$('#ta2').val(), di=$('#di2').val(), bg=$('#bg2').val(), si=$('#si2').val(), wp=$('#wp2').val(), ap=$('#ap2').val(), fsp='';
    if ($('#fsp').is(':checked')){fsp='yes';}else{fsp='';}
    if(cn==''|| ad==''|| db==''|| ph==''|| pr==''|| pd==''){
      $('#esf').addClass('alert alert-danger');
      $('#esf').html('Please fill out all required fields');
      if(cn==''){$('#cn_e').css(bck, clr);}
      if(ad==''){$('#ad_e').css(bck, clr);}
      if(db==''){$('#db_e').css(bck, clr);}
      if(ph==''){$('#ph_e').css(bck, clr);}
      if(pr==''){$('#pr_e').css(bck, clr);}
      if(pd==''){$('#pd_e').css(bck, clr);}
    } else {
      if(isNaN(ph)){
        $('#esf').addClass('alert alert-danger');
        $('#esf').html('Phone must only be number!');
        $('#ph_e').css(bck, clr);
      } else {
        if(isNaN(pd)){
          $('#esf').addClass('alert alert-danger');
          $('#esf').html('Program duration must only be number!');
          $('#pd_e').css(bck, clr);
        } else {
          if($('#student2_e').css('display')==='block'){
            if(cn2==''||ad2==''||db2==''||ph2==''){
              $('#esf').addClass('alert alert-danger');
              $('#esf').html('Please fill out all required fields!');
              if(cn2==''){
                $('#cnst2_e').css(bck,clr);
              }
              if(ad2==''){
                $('#adrst2_e').css(bck,clr);
              }
              if(db2==''){
                $('#dbst2_e').css(bck,clr);
              }
              if(ph2==''){
                $('#phst2_e').css(bck,clr);
              }
            } else{
              if(isNaN(ph2)){
                $('#esf').addClass('alert alert-danger');
                $('#esf').html('Phone must only be number!');
                $('#phst2_e').css(bck,clr);
              } else{
                if($('#student3_e').css('display')==='block'){
                  if(cn3==''||ad3==''||db3==''||ph3==''){
                    $('#esf').addClass('alert alert-danger');
                    $('#esf').html('Please fill out all required fields!');
                    if(cn3==''){
                      $('#cnst3_e').css(bck,clr);
                    }
                    if(ad3==''){
                      $('#adrst3_e').css(bck,clr);
                    }
                    if(db3==''){
                      $('#dbst3_e').css(bck,clr);
                    }
                    if(ph3==''){
                      $('#phst3_e').css(bck,clr);
                    }
                  } else{
                    if(isNaN(ph3)){
                      $('#esf').addClass('alert alert-danger');
                      $('#esf').html('Phone must only be number!');
                      $('#phst3_e').css(bck,clr);
                    } else{
                      if($('#student4_e').css('display')==='block'){
                        if(cn4==''||ad4==''||db4==""||ph4==''){
                          $('#esf').addClass('alert alert-danger');
                          $('#esf').html('Please fill out all required fields!');
                          if(cn4==''){
                            $('#cnst4_e').css(bck,clr);
                          }
                          if(ad4==''){
                            $('#adrst4_e').css(bck,clr);
                          }
                          if(db4==''){
                            $('#dbst4_e').css(bck,clr);
                          }
                          if(ph4==''){
                            $('#phst4_e').css(bck,clr);
                          }
                        } else {
                          if(isNaN(ph4)){
                            $('#esf').addClass('alert alert-danger');
                            $('#esf').html('Phone must only be number!');
                            $('#phst4_e').css(bck,clr);
                          } else {
                            update_student(pn, cn, nn, ad, pb, db, ph, grp, cn2, nn2, ad2, pb2, db2, ph2, cn3, nn3, ad3, pb3, db3, ph3, cn4, nn4, ad4, pb4, db4, ph4, pr, pd, sd, re, ta, di, bg, si, wp, ap, fsp);
                          }
                        }
                      } else {
                        cn4 = nn4 = pb4 = ad4 = ph4 = db4 = '';
                       update_student(pn, cn, nn, ad, pb, db, ph, grp, cn2, nn2, ad2, pb2, db2, ph2, cn3, nn3, ad3, pb3, db3, ph3, cn4, nn4, ad4, pb4, db4, ph4, pr, pd, sd, re, ta, di, bg, si, wp, ap, fsp);
                      }
                    }
                  }
                } else {
                  cn3=nn3=pb3=ad3=ph3=db3=cn4=nn4=pb4=ad4=ph4=db4='';
                 update_student(pn, cn, nn, ad,pb, db, ph, grp, cn2, nn2, ad2, pb2, db2, ph2, cn3, nn3, ad3, pb3, db3, ph3, cn4, nn4, ad4, pb4, db4, ph4, pr, pd, sd, re, ta, di, bg, si, wp, ap, fsp);
                }
              }
            }
          } else {
            cn2 = nn2 = pb2 = ad2 = ph2 = db2 = cn3 = nn3 = pb3 = ad3 = ph3 = db3 = cn4 = nn4 = pb4 = ad4= ph4= db4='';
           update_student(pn, cn, nn, ad, pb, db, ph, grp, cn2, nn2, ad2, pb2, db2, ph2, cn3, nn3, ad3, pb3, db3, ph3, cn4, nn4, ad4, pb4, db4, ph4, pr, pd, sd,re, ta, di, bg, si, wp, ap, fsp);
          }
        }
      }
    }
  });
  function update_student(pn, cn, nn, ad, pb, db, ph, grp, cn2, nn2, ad2, pb2, db2, ph2, cn3, nn3, ad3, pb3, db3, ph3, cn4, nn4, ad4, pb4, db4, ph4, pr, pd, sd, re, ta, di, bg, si, wp, ap, fsp) {
    $.ajax({
      type : "post",
      url: `${u}/student/update`,
      dataType : "json",
      data : {pn:pn,cn:cn,nn:nn,ad:ad,pb:pb,db:db,ph:ph,grp,cn2:cn2,nn2:nn2,ad2:ad2,pb2:pb2,db2:db2,ph2:ph2,cn3:cn3,nn3:nn3,ad3:ad3,pb3:pb3,db3:db3,ph3:ph3,cn4:cn4,nn4:nn4,ad4:ad4,pb4:pb4,db4:db4,ph4:ph4,pr:pr,pd:pd,sd:sd,re:re,ta:ta,di:di,bg:bg,si:si,wp:wp,ap:ap,fsp:fsp},
      success : function(data){
        $('#esm').modal('hide');
        $('#mystudents').DataTable().ajax.reload();
        get_student_detail();
      }
    });
  }
  /* get course */
  $('#mycourse').DataTable({
    responsive : true,
    "ajax" :{
      "url" : `${u}/student_single/get_course?pin=${pin}`,
      "dataSrc" :""
    },
    "columns": [
      {"data" : "meeting"},
      {
        "data" : "course_date",
        "render" : function (data, type, row){
          return $.format.date(data, "E, MMM/dd/yy, H:mm");
        }
      },
      {"data" : "teacher"},
      {
        "data" : "duration",
        "render" : function (data, type, row, meta){
          return data+' minutes';
        }
      },
      {
        "data" : {material:"material", co:"co"},
        "render" : function(data,type,row){
          if(data.co==null||data.co==0){
            return data.material;
          } else {
            return `${data.material}<br><br><span class="badge badge-pill badge-warning">${data.co}</span>`;
          }

        }
      },
      {"data" : "evaluation"},
      {"data" : "w"},
      {"data" : "s"},
      {
        "data" : {meeting:"meeting", course_date: "course_date", teacher: "teacher", duration: "duration", material: "material", co:"co", evaluation:"evaluation", w:"w", s: "s", test:"test", test_number: "test_number", test_name: "test_name", of_test_number: "of_test_number", of_test: "of_test" },
        "render" : function(data, type, row, meta){
         return `<a title="Edit" href="javascript:void(0);" class="btn btn-info btn-sm item_edit tooltip-right" data-m="${data.meeting}" data-cd="${data.course_date}" data-tc="${data.teacher}" data-du="${data.duration}" data-ma="${data.material}" data-co="${data.co}" data-ev="${data.evaluation}" data-w="${data.w}" data-s="${data.s}" data-test="${data.test}" data-tnu="${data.test_number}" data-tn="${data.test_name}" data-otn="${data.of_test_number}" data-ot="${data.of_test}"><i class="fas fa-pencil-alt fa-fw"></i></a> <a href="javascript:void(0);" title="delete" class="btn btn-danger btn-sm item_delete tooltip-bottom" data-m="${data.meeting}" data-test="${data.test}"><i class="fas fa-trash fa-fw"></i></a>`;
        }
      }
    ]
  });
  /* get tests */
  $('#my_tests').DataTable({
    responsive: true,
    "ajax" :{
      "url": `${u}/student_single/get_tests?pin=${pin}`,
      "dataSrc" :""
    },
     "columns" :[
      {
        "data" : "meeting",
        "render" : function (data,type, row,meta){
          return `<a target="_blank" href="test?pin=${pin}&meeting=${data}">${data}</a>`;
        }
      },
      {
        "data" : {course_date :"course_date", meeting: "meeting"},
        "render" : function (data, type, row){
          return `<a target="_blank" href="test?pin=${pin}&meeting=${data.meeting}">${$.format.date(data.course_date, "E, MMM/dd/yy, H:mm")}</a>`;
        }
      },
      {
        "data" : {teacher: "teacher", meeting: "meeting"},
        "render" : function (data, type, row, meta){
          return `<a target="_blank" href="test?pin=${pin}&meeting=${data.meeting}">${data.teacher}</a>`;
        }
      },
      {
        "data" : {duration:"duration", meeting: "meeting"},
        "render" : function (data, type, row, meta){
          return `<a target="_blank" href="test?pin=${pin}&meeting=${data.meeting}">${data.duration} minutes</a>`;
        }
      },
      {
        "data" : {material:"material", meeting:"meeting"},
        "render" : function (data, type, row, meta){
          return `<a target="_blank" href="test?pin=${pin}&meeting=${data.meeting}">${data.material}</a>`;
        }
      },
      {
        "data" : {evaluation:"evaluation", meeting:"meeting"},
        "render" : function (data, type, row, meta){
          return `<a target="_blank" href="test?pin=${pin}&meeting=${data.meeting}">${data.evaluation}</a>`;
        }
      },
      {
        "data" : {test:"test",test_name:"test_name", meeting: "meeting"},
        "render" : function (data, type, row, meta){
          if(data.test_name == "Pre Spoken" || data.test_name == "Pre Written"){
            return `<a target="_blank" href="test?pin=${pin}&meeting=${data.meeting}">${data.test_name}</a>`;
          } else {
            return `<a target="_blank" href="test?pin=${pin}&meeting=${data.meeting}">${data.test}</a>`;
          }
        }
      },
    ]
  });
  /* get fsp */
  function get_fsp(){
    $.ajax({
      url : `${u}/student_single/get_fsp`,
      type : "post",
      dataType : "JSON",
      data :{pin:pin},
      success : function(data){
        var html = '', i;
        for (i=0;i<data.length;i++){
          html += '<tr>'+
                    '<td>'+data[i].id+'</td>'+
                    '<td>'+data[i].material+'</td>';
          if (data[i].fsp_result == 'good'){
           html +=  '<td><i style="color:blue;" class="fas fa-check-square fa-2x"></i></td>';
          } else {
            html += '<td></td>';
          }
          if (data[i].fsp_result == 'average'){
           html +=  '<td><i style="color:blue;" class="fas fa-check-square fa-2x"></i></td>';
          } else {
            html += '<td></td>';
          }
          if (data[i].fsp_result == 'need_improvement'){
           html +=  '<td><i style="color:blue;" class="fas fa-check-square fa-2x"></i></td>';
          } else {
            html += '<td></td>';
          }
            html += `<td>${data[i].comment}</td>
                      <td>
                        <a class="fsp_item_edit btn btn-warning btn-sm" href="javascript:void(0);"
                          data-id="${data[i].id}"
                          data-fsp_result="${data[i].fsp_result}"
                          data-material="${data[i].material}"
                          data-comment="${data[i].comment}">
                          <i class="fas fa-pencil-alt fa-fw"></i>
                        </a>
                      </td>
                    </tr>`;
        }
        $('#fsp_data').html(html);
      }
    });
  }
  /* form event handler */
  $('select, input, textarea').on('focus', function(){
    $(this).css('background-color', 'white');
    $('#course_feedback, #course_feedback, #edit_student_feedback').removeClass("alert alert-danger");
    $('#course_feedback, #course_feedback, #edit_student_feedback').html("");
  });
  $('#edit_course_title').on('click', function(){
     $('.item_edit').fadeOut('fast');$('.item_edit').fadeIn('fast');
  });
  $('#add_course_title').on('click', function(){
      $('#new_session_btn').fadeOut('100');
      $('#new_session_btn').fadeIn('200');
      $('#new_session_btn').fadeOut('100');
      $('#new_session_btn').fadeIn('200');
  });
  /* NEW SESSION */
  $('#ma').on('focus', function(){
    $('#ma_prev').fadeIn('slow');
    $('#ev_prev').fadeOut('fast');
    $(this).on('blur', function(){
      $('#ma_prev').fadeOut('fast');
    });
  });
  $('#ev').on('focus', function(){
    $('#ev_prev').fadeIn('slow');
    $('#ma_prev').fadeOut('fast');
    $(this).on('blur', function(){
      $('#ev_prev').fadeOut('fast');
    });
  });
  $('#new_session_btn').on('click', function(){
    var d = new Date(), /* variable declaration */
        curr_time = ($.format.date(d, "yyyy-MM-dd\THH:mm")),
        header = "New Session";
    $('#course_header').html(header); /* assigns values to the corresponding fields */
    $('#btn_update').hide();
    $('#btn_save').show();
    $('#course_form').toggle('fast');
    $('[name="cd"]').val(curr_time);
    $('[name="tc"]').val(teacher);
   /* and reset the rest */
    $.ajax({
      type : "post",
      url : `${u}/student_single/get_meeting`,
      data : {pin:pin},
      dataType : "json",
      success : function(data){
        if(data==''){
          $('#me').val(1);
        } else {
          var n = Number(data[0].meeting);
          var n = n + 1;
          $('#me').val(n);
        }
      }
    });

    $('#me').removeAttr('disabled');
    $('#du').val("");
    $('#ma').val("");
    $('#ma_prev').html("");
    $('#ma_html').val("");
    $('#ev').val("");
    $('#ev_prev').html("");
    $('#ev_html').val("");
    $('#co').val("");
    $('#wr').val("");
    $('#sp').val("");
    /*
    * just in case it is checked before,
    * (like by editing session or previous submission)
    */
    $('#test').removeAttr('checked');
    $('#course_div').removeClass('col-7');
    $('#course_div').addClass('col');
    $('#test_div').css('display', 'none');

    $('#test').on('click', function(){ /* test button checkbox */
      if ($(this).is(':checked')){
        $('#course_div').removeClass('col');
        $('#course_div').addClass('col-7');
        $('#test_div').addClass('col-5');
        $('#test_div').fadeIn('slow');
        $('select[name="tn"]').on('change', function(){ /* test name */
          var test=$(this).val();
          if(test == 'Remedial'){
            $('select[name="otn"], select[name="ot"]').removeAttr('disabled');
          } else {
            $('select[name="otn"], select[name="ot"]').attr('disabled', 'disabled');
            $('select[name="otn"], select[name="ot"]').val('');
          }
        });
      } else { /* the field just hidden */
        $('#course_div').removeClass('col-7');
        $('#course_div').addClass('col');
        $('#test_div').removeClass('col-5');
        $('#test_div').fadeOut('fast');
      }
    });
    $('#course_form').on('click', '.close_course',function(){
      $('#course_form').fadeOut('slow');
    });
  });
  /* save course */
  $('#btn_save').on('click', function(){
    var p = pin, /* variable declaration */
        m = $('#me').val(),
        cd = $('#cd').val(),
        tc = $('#tc').val(),
        du = $('#du').val(),
        ma = $('textarea.mdhtmlform-html').val();
        co = $('#co').val(),
        //ev = $('#ev').val(),
        ev = $('#ev_html').val(),
        w = $('#wr').val(),
        s = $('#sp').val(),
        test = '',
        tnu = $('#tnu').val(),
        tn = $('#tn').val(),
        otn = $('#otn').val(),
        ot = $('#ot').val(),
        after_teaching = 'yes',
        bgc = 'background-color',
        clr = 'pink';
    /* check if one or more required fields are empty */
    if (m==''||cd==''||tc==''||du==''||ma==''||ev==''){
      if(m==''){$('#me').css(bgc,clr);}
      if(cd==''){$('#cd').css(bgc,clr);}
      if(tc==''){$('#tc').css(bgc,clr);}
      if(du==''){$('#du').css(bgc,clr);}
      if(ma==''){$('#ma').css(bgc,clr);}
      if(ev==''){$('#ev').css(bgc,clr);}
      $('#course_feedback').addClass('alert alert-danger');
      $('#course_feedback').html("Please fill out all required fields!");
    }else{
      if(isNaN(m)){ /* check meeting number */
        $('#me').css(bgc,clr);$('#course_feedback').addClass('alert alert-danger');$('#course_feedback').html("Meeting field must only be numbers!");
      }else{
        if(isNaN(w)){ /* check assessment */
          $('#wr').css(bgc,clr);$('#course_feedback').addClass('alert alert-danger'); $('#course_feedback').html("Assessment must only be numbers!");
        }else{
          if(isNaN(s)){
            $('#sp').css(bgc,clr);$('#course_feedback').addClass('alert alert-danger');$('#course_feedback').html("Assessment must only be numbers!");
          }else{
            $.ajax({
              /* check meeting availability */
              type: "post",
              url: `${u}/student_single/meeting_avail`,
              data: {p: p, m: m},
              success: function (response){
                if (response == 'true'){
                  $('#me').css(bgc,clr);
                  $('#course_feedback').addClass('alert alert-danger');
                  $('#course_feedback').html('Meeting with this number has already been conducted before!');
                } else {
                  /* meeting is available, now check the test  */
                  if ($('#test').is(':checked')){
                    if(tnu == ''){
                      $('#course_feedback').addClass('alert alert-danger');
                      $('#course_feedback').html("Please complete test details!");
                      $('#tnu').css(bgc,clr);
                    } else {
                      if (tn == ''){
                        $('#course_feedback').addClass('alert alert-danger');
                        $('#course_feedback').html("Please complete test details!");
                        $('#tn').css(bgc,clr);
                      } else {
                        if (tn != 'Remedial'){
                          test = tnu+" "+tn;
                          $.ajax({
                            type: "post",
                            url:`${u}/student_single/test_avail`,
                            data:{p :p, test: test},
                            success : function (response){
                              if(response=='true'){
                                $('#course_feedback').addClass('alert alert-danger');
                                $('#course_feedback').html('<em>'+test+'</em> has been conducted before!');
                                $('#tnu, #tn').css(bgc,clr);
                              } else {
                                submit_course(p, m, cd, tc, du, ma, co, ev, w, s, test, tnu, tn, otn, ot, after_teaching);
                                create_test_table(p, m);
                              }
                            }
                          })
                        } else { /* test is remedial */
                          if (otn == ''){
                            $('#course_feedback').addClass('alert alert-danger');
                            $('#course_feedback').html('Please complete the test details!');
                            $('#otn').css(bgc,clr);
                          } else {
                            if (ot == ''){
                              $('#course_feedback').addClass('alert alert-danger');
                              $('#course_feedback').html('Please complete the test details!');
                              $('#ot').css(bgc,clr);
                            } else {
                              test = tnu+" "+tn+" of "+otn+" "+ot;
                              $.ajax({
                                type : 'post',
                                url : `${u}/student_single/test_avail`,
                                data: {p: p, test : test},
                                success : function(response){
                                  if(response == 'true'){
                                    $('#course_feedback').addClass('alert alert-danger');
                                    $('#course_feedback').html('<em>'+test+'</em> has been conducted before!');
                                    $('#tnu, #tn, #otn, #ot').css(bgc,clr);
                                  } else {
                                    submit_course(p, m, cd, tc, du, ma, co, ev, w, s, test, tnu, tn, otn, ot, after_teaching);
                                    create_test_table(p, m);
                                  }
                                }
                              });
                            }
                          }
                        }
                      }
                    }
                  /* there is no test */
                  } else {
                    test = tnu = tn = otn = ot = '';
                    submit_course(p, m, cd, tc, du, ma, co, ev, w, s, test, tnu, tn, otn, ot, after_teaching);
                  }
                }
              }
            });
          }
        }
      }
    }
  });
  function submit_course(p, m, cd, tc, du, ma, co, ev, w, s, test, tnu, tn, otn, ot, after_teaching){
    $.ajax({
      type: "POST",
      url: `${u}/student_single/save_course`,
      dataType: "JSON",
      data: {p : p, m: m, cd: cd, tc: tc,du: du, ma: ma,co:co, ev: ev,w: w,s: s,test: test, tnu: tnu,tn : tn,otn : otn, ot : ot},
      success: function(data) {
        $('[name="me"]').val("");
        $('[name="tc"]').val("");
        $('[name="du"]').val("");
        $('[name="ma"]').val("");
        $('[name="co"]').val("");
        $('[name="ev"]').val("");
        $('[name="wr"]').val("");
        $('[name="sp"]').val("");
        $('[name="test"]').val("");
        $('[name="tnu"]').val("");
        $('[name="tn"]').val("");
        $('[name="otn"]').val("");
        $('[name="ot"]').val("");
        $('#course_form').fadeOut('slow');
        $('#mycourse').DataTable().ajax.reload();
        set_aft(p, after_teaching);
      }
    });
  }
  function create_test_table(a,b){
    $.ajax({
      type: "POST",
      url : `${u}/student_single/create_test`,
      dataType : "JSON",
      data : {pin: a, meeting: b},
      success : function(data){
        $('#my_tests').DataTable().ajax.reload();
      }
    });
  }
  function set_aft(a,b){
    $.ajax({
      type: "POST",
      url : `${u}/student_single/set_aft`,
      dataType : "JSON",
      data : {pin: a, after_teaching: b},
      success : function(data){
        get_student_detail();
      }
    })
  }
  /* edit course */
  function repl(html){
    html = html.replace(/<br>|<br \/>/gm,"\n\n");
    html = html.replace(/<p>/gm, "\n");
    html = html.replace(/<\/p>/gm, "\n");
    html = html.replace(/<em>|<i>/gm, "_");
    html = html.replace(/<\/em>|<\/i>/gm,"_");
    html = html.replace(/<b>|<strong>/gm, "**");
    html = html.replace(/<\/b>|<\/strong>/gm, "**");
    html = html.replace(/<code>/gm,"`");
    html = html.replace(/<\/code>/gm,"`");
    html = html.replace(/<h6>/gm,"######");
    html = html.replace(/<h5>/gm,"#####");
    html = html.replace(/<h4>/gm,"####");
    html = html.replace(/<h3>/gm,"###");
    html = html.replace(/<h2>/gm,"##");
    html = html.replace(/<h1>/gm,"#");
    html = html.replace(/<\/h6>|<\/h5>|<\/h4>|<\/h3>|<\/h2>|<\/h1>|/gm,"");
    html = html.replace(/<(ul|ol)\b[^>]*>([\s\S]*?)<\/\1>/gi, function(str, listType, innerHTML) {
       var lis = innerHTML.split('</li>');
       lis.splice(lis.length - 1, 1);

       for(i = 0, len = lis.length; i < len; i++) {
         if(lis[i]) {
           var prefix = (listType === 'ol') ? (i + 1) + ". " : "* ";
           lis[i] = lis[i].replace(/\s*<li[^>]*>([\s\S]*)/i, function(str, innerHTML) {

             innerHTML = innerHTML.replace(/^\s+/, '');
             innerHTML = innerHTML.replace(/\n\n/g, '\n\n    ');
             // indent nested lists
             innerHTML = innerHTML.replace(/\n([ ]*)+(\*|\d+\.) /g, '\n$1    $2 ');
             return prefix + innerHTML;
           });
         }
       }
       return lis.join('\n');
     });
     return html.replace(/[ \t]+\n|\s+$/g, '');
  }
  $('#show_course').on('click', '.item_edit', function(){
    var me =$(this).data('m'),
        cd =($.format.date($(this).data('cd'), "yyyy-MM-dd\THH:mm")),
        tc =$(this).data('tc'),
        du =$(this).data('du'),
        ma =repl($(this).data('ma')),
        co = $(this).data('co'),
        ev = repl($(this).data('ev')),
        w = $(this).data('w'),
        s = $(this).data('s'),
        j = $(this).data('test'),
        tnu = $(this).data('tnu'),
        tn = $(this).data('tn'),
        otn = $(this).data('otn'),
        ot = $(this).data('ot'),
        o='',
        header = "Edit Recorded Session";
    $('#btn_save').hide();
    $('#course_header').html(header);
    $('#btn_update').show();
    $('#course_form').fadeIn('slow');
    $('#me').attr('disabled','disabled');
    $('[name="me"]').val(me);
    $('[name="cd"]').val(cd);
    $('[name="tc"]').val(tc);
    $('[name="du"]').val(du);
    $('[name="ma"]').val(ma);
    $('#ma_prev').html($(this).data('ma')),
    $('#ma_html').val($(this).data('ma')),
    $('#ma_prev').show();
    $('#ev_prev').html($(this).data('ev')),
    $('#ev_html').val($(this).data('ev')),
    $('[name="co"]').val(co);
    $('[name="ev"]').val(ev);
    $('[name="wr"]').val(w);
    $('[name="sp"]').val(s);
    $('[name="tnu"]').val(tnu);
    $('[name="tn"]').val(tn);
    $('[name="otn"]').val(otn);
    $('[name="ot"]').val(ot);
    if(tn!=''){
      $('#test').attr('checked','checked');
      $('#course_div').removeClass('col');
      $('#course_div').addClass('col-7');
      $('#test_div').addClass('col-5');
      $('#test_div').css('display', 'block');
      if(tn=='Remedial'){
        $('select[name="otn"], select[name="ot"]').removeAttr('disabled');
      }
    } else {
      $('#test').removeAttr('checked','checked');
      $('#course_div').removeClass('col-7');
      $('#course_div').addClass('col');
      $('#test_div').css('display', 'none');
    }
    $('#test').on('click', function(){ /* test button checkbox */
      if ($(this).is(':checked')){
        $('#course_div').removeClass('col');
        $('#course_div').addClass('col-7');
        $('#test_div').addClass('col-5');
        $('#test_div').fadeIn('slow');
        $('select[name="tn"]').on('change', function(){ /* test name */
          var test=$(this).val();
          if(test == 'Remedial'){
            $('select[name="otn"], select[name="ot"]').removeAttr('disabled');
          } else {
            $('select[name="otn"], select[name="ot"]').attr('disabled', 'disabled');
            $('select[name="otn"], select[name="ot"]').val('');
          }
        });
      } else { /* the field just hidden */
        $('#course_div').removeClass('col-7');
        $('#course_div').addClass('col');
        $('#test_div').removeClass('col-5');
        $('#test_div').fadeOut('fast');
      }
    });
    $('#course_form').on('click', '.close_course', function(){
      $('#course_form').fadeOut('slow');
    });
  });
  $('select[name="tn"]').on('change', function(){ /* test name */
    var test=$(this).val();
    if(test == 'Remedial'){
      $('select[name="otn"], select[name="ot"]').removeAttr('disabled');
    } else {
      $('select[name="otn"], select[name="ot"]').attr('disabled', 'disabled');
    }
  });
  $('#btn_update').on('click', function() {
    /* variable declaration */
    var p = pin,
        m = $('#me').val(),
        cd = $('#cd').val(),
        tc = $('#tc').val(),
        du = $('#du').val(),
        ma = $('textarea.mdhtmlform-html').val(),
        co = $('#co').val(),
        ev = $('#ev_html').val(),
        w = $('#wr').val(),
        s = $('#sp').val(),
        test = '',
        tnu = $('#tnu').val(),
        tn = $('#tn').val(),
        otn = $('#otn').val(),
        ot = $('#ot').val(),
        bgc = 'background-color',
        clr = 'pink';
    /* if test name is not empty */
    if(tn!=''){
      if(tn!='Remedial'){ /* test name is not remedial */
        test=tnu+" "+tn;
      } else {
        test=tnu+" "+tn+" of "+otn+" "+ot;
      }
    } else { /* test name empty `test = nothing` */
      test='';
    }

    /* if one or more required fields are empty */
    if(cd==''||tc==''||du==''||ma==''||ev==''){
      if(tc==''){$('#tc').css(bgc,clr);}
      if(cd==''){$('#cd').css(bgc,clr);}
      if(du==''){$('#du').css(bgc,clr);}
      if(ma==''){$('#ma').css(bgc,clr);}
      if(ev==''){$('#ev').css(bgc,clr);}
      $('#course_feedback').addClass("alert alert-danger");
      $('#course_feedback').html("Please fill out all required fields");
    } else {
      if(isNaN(w)||isNaN(s)){ /* assessment is empty */
        $('#course_feedback').addClass("alert alert-danger");
        $('#course_feedback').html("Assessment can only be number");
        if(isNaN(w)){$('#wr').css(bgc,clr);}
        if(isNaN(s)){$('#sp').css(bgc,clr);}
      }else{
        /*
        * meeting duration is not number although it is not necessary
        * as duration comes from select input
        */
        if(isNaN(du)){
          $('#course_feedback').addClass("alert alert-danger");
          $('#course_feedback').html("Meeting duration can only be numbers");
          $('#du').css(bgc,clr);
        }else{
          if($('#test').is(':checked')){
            if(tnu == ''){ /* test number empty */
              $('#tnu').css(bgc,clr);
              $('#course_feedback').addClass("alert alert-danger");
              $('#course_feedback').html("Please complete test details");
            } else {
              if(tn == ''){ /* test name empty */
                $('#course_feedback').addClass("alert alert-danger");
                $('#course_feedback').html("Please complete test details");
                $('#tn').css(bgc,clr);
              } else {
                if(tn != 'Remedial'){
                  /*
                  * define test name, and check the database if test
                  * with the same name is conducted before
                  */
                  test = tnu+' '+tn;
                  $.ajax({
                    url : `${u}/student_single/test_edit_avail`,
                    type : "post",
                    dataType : "json",
                    data : {pin:p, test:test},
                    success : function(data){
                      /*
                      * if the test with the exact same name exists,
                      * and meeting number is not identical with the current one,
                      * throw an error
                      */
                      if(data !='' && data[0].meeting !=m){
                        $('#tnu, #tn').css(bgc,clr);
                        $('#course_feedback').addClass("alert alert-danger");
                        $('#course_feedback').html("This test has been conducted in meeting "+data[0].meeting);
                      } else {
                        /*
                        * finishes here create test table, submit the form
                        */
                        create_test_table(p,m);
                        update_course(p,m,cd,tc,du,ma,co,ev,w,s,test,tnu,tn,otn,ot);
                      }
                    }
                  });
                /* test = remedial */
                } else {
                  if (otn == ''){ /* more detail about remedial is empty */
                    $('#otn').css(bgc,clr);
                    $('#course_feedback').addClass("alert alert-danger");
                    $('#course_feedback').html("Please complete test details");
                  } else {
                    if(ot == ''){
                      $('#ot').css(bgc,clr);
                      $('#course_feedback').addClass("alert alert-danger");
                      $('#course_feedback').html("Please complete test details");
                    } else{
                      /*
                      * all filled out, do the same as above. Check the
                      * database with similar test name
                      */
                      test = tnu+' '+ tn+' of '+ otn+' '+ ot;
                      $.ajax({
                        type : "post",
                        url : `${u}/student_single/test_edit_avail`,
                        dataType : "json",
                        data : {pin:p, test:test},
                        success : function(data){
                          if(data !='' && data[0].meeting !=m){
                            $('#tnu,#tn,#otn,#ot').css(bgc,clr);
                            $('#course_feedback').addClass("alert alert-danger");
                            $('#course_feedback').html("This remedial has been conducted in meeting "+data[0].meeting);
                          } else {
                            create_test_table(p,m);
                            update_course(p, m, cd, tc, du, ma, co, ev, w, s, test, tnu, tn, otn, ot);
                          }
                        }
                      });
                    }
                  }
                }
              }
            }
          /* test is not checked */
          } else {
            test = tnu = tn = otn = ot = '';
            update_course(p, m, cd, tc, du, ma, co, ev, w, s, test, tnu, tn, otn, ot);
          }
        }
      }
    }
    return false;
  });
  function update_course(p,m,cd,tc,du,ma,co, ev,w,s,test,tnu,tn,otn,ot){
    $.ajax({
      type:"POST",
      url:`${u}/student_single/update_course`,
      dataType:"JSON",
      data:{p:p,m:m,cd:cd,tc:tc,du:du,ma:ma,co:co,ev:ev,w:w,s:s,test:test,tnu:tnu,tn:tn,otn:otn,ot:ot},
      success:function(data){
        $('#course_form').fadeOut('slow');
        $('#mycourse').DataTable().ajax.reload();
        $('#mytests').DataTable().ajax.reload();
      }
    });
  }
  $('#show_course').on('click', '.item_delete', function(){
    var m_d = $(this).data('m'), t_d = $(this).data('test');
    $('#delete_session_modal').modal('show');
    $('#m_d').val(m_d);
    $('#t_d').val(t_d);
  });
  $('#btn_delete_session').on('click',function(){
    var m_d = $('#m_d').val(), t_d = $('#t_d').val();
    if(t_d!=''){
      // delete test and course
      delete_test(pin,m_d);
      delete_course(pin,m_d);
      $('#mycourse').DataTable().ajax.reload();
      $('#mytests').DataTable().ajax.reload();
    } else {
      // delete course
      delete_course(pin,m_d);
      $('#mycourse').DataTable().ajax.reload();
      $('#mytests').DataTable().ajax.reload();
    }
    $('#delete_session_modal').modal('hide');
  });
  function delete_test(pin,m_d){
    $.ajax({
      type:"post",
      url:`${u}/student_single/delete_test`,
      dataType : "json",
      data: {pin:pin, m:m_d},
      success : function(data){
        console.log('test deleted');
      }
    });
  }
  function delete_course(pin,m_d){
    $.ajax({
      type:"post",
      url:`${u}/student_single/delete_course`,
      dataType : "json",
      data: {pin:pin, m:m_d},
      success : function(data){
        console.log('course deleted');
      }
    });
  }
  /* edit fsp */
  $('#btn_save_fsp').on('click', function(){
    var topic = $('#fsp_topic').val(),
        comment = $('#fsp_comment').val(),
        fsp_result = '';
    if ($('input[name="fsp_result"]').is(':checked')){
      fsp_result = $('input[name="fsp_result"]:checked').val();
    }
    if (topic == ''){
      $('#nff').addClass('alert alert-danger');
      $('#nff').html('Topic can\'t be empty!');
      $('#fsp_topic').css('background-color', 'pink');
    } else {
     $.ajax({
        type : "POST",
        url : `${u}/student_single/add_fsp`,
        dataType : "JSON",
        data : {pin:pin, topic: topic, fsp_result : fsp_result, comment: comment},
        success : function(data){
          $('#fsp_topic').val("");
          $('#fsp_comment').val("");
          $('input[name="fsp_result"]').prop("checked", false);
          $('#new_fsp_modal').modal('hide');
          get_fsp();
        }
      });
    }
  });
  $('#my_fsp').on('click', '.fsp_item_edit',function(){
    var topic = $(this).data('material'),
        comment =$(this).data('comment'),
        fsp_result = $(this).data('fsp_result'),
        id = $(this).data('id');

    $('#edit_fsp_modal').modal('show');
    $('#fsp_topic_edit').val(topic);
    $('#fsp_comment_edit').val(comment);
    $('#id_edit').val(id);
    if (fsp_result == 'good'){
      $('#good_edit').prop('checked', true);
    } else if (fsp_result == 'average'){
      $('#average_edit').prop('checked', true);
    } else if (fsp_result == 'need_improvement'){
      $('#need_improvement_edit').prop('checked', true);
    }
  });
  $('#btn_update_fsp').on('click', function(){
    var id = $('#id_edit').val(),
        topic = $('#fsp_topic_edit').val(),
        fsp_result = '',
        comment = $('#fsp_comment_edit').val();
    if ($('input[name="fsp_result_edit"]').is(':checked')){
          fsp_result = $('input[name="fsp_result_edit"]:checked').val();
    }
    if(topic == ''){
      $('#nff').addClass('alert alert-danger');
      $('#nff').html('Topic can\'t be empty!');
      $('#fsp_topic').css('background-color', 'pink');
    } else {
      $.ajax({
        type : "POST",
        url : `${u}/student_single/update_fsp`,
        dataType: "JSON",
        data : {
          pin: pin, id: id, topic: topic, fsp_result: fsp_result, comment: comment
        },
        success: function(data){
          $('#edit_fsp_modal').modal('hide');
          get_fsp();
        }
      });
    }
  });
});
