<?php include 'inc/header.php';?>
    <div class="container">
      <h2>After Teaching List</h2>
      <div class="row">
        <div class="col-md-3">
          <ul class="list-group" id="aft_list"></ul>
        </div>
        <div class="col-md-9" id="main_content">
          <div class="container-fluid">
            <h3 id="aft_header">Choose one from the list on left.
            </h3>
            <br>
            <div class="accordion" id="stdinfo">
            </div>
          </div>
          <br>
          <div class="card col-7" id="note">
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
<?php include 'inc/chat-script.php';?>

    <script>
      $(document).ready(function(){
        get_list();
        function get_list(){
          $.ajax({
            url : "<?php echo site_url('after_teaching/get_list'); ?>",
            type : "ajax",
            dataType : "json",
            success : function(data){
              var i,l="";
              for (i=0;i<data.length;i++){
                l += '<li class="list-group-item aft_list_item" data-grp="'+data[i].grp+'" data-pn="'+data[i].pin+'" data-cn="'+data[i].complete_name+'" data-nn="'+data[i].nick_name+'" data-ad="'+data[i].address+'" data-pb="'+data[i].place_of_birth+'" data-db="'+($.format.date(data[i].date_of_birth, "yyyy-MM-dd"))+'" data-ph="'+data[i].phone+'"data-cnst2="'+data[i].cnst2+'"data-nnst2="'+data[i].nnst2+'"data-adrst2="'+data[i].adrst2+'"data-pobst2="'+data[i].pobst2+'"data-dobst2="'+($.format.date(data[i].dobst2, "yyyy-MM-dd"))+'"data-phst2="'+data[i].phst2+'"data-cnst3="'+data[i].cnst3+'"data-nnst3="'+data[i].nnst3+'"data-adrst3="'+data[i].adrst3+'"data-pobst3="'+data[i].pobst3+'"data-dobst3="'+($.format.date(data[i].dobst3, "yyyy-MM-dd"))+'"data-phst3="'+data[i].phst3+ '"data-cnst4="'+data[i].cnst4+'"data-nnst4="'+data[i].nnst4+'"data-adrst4="'+data[i].adrst4+'"data-pobst4="'+data[i].pobst4+'"data-dobst4="'+($.format.date(data[i].dobst4, "yyyy-MM-dd"))+'"data-phst4="'+data[i].phst4+ '"data-pr="'+data[i].program+'"data-pd="'+data[i].program_duration+'"data-sd="'+($.format.date(data[i].starting_date, "yyyy-MM-dd"))+'"data-re="'+data[i].reason+'"data-ta="'+data[i].target+'" data-di="'+data[i].difficulties+'"data-bg="'+data[i].bground+'"data-si="'+data[i].self_introduction+'" data-wp="'+data[i].weakness_point+'"data-ap="'+data[i].action_plan+'" data-fsp="'+data[i].fsp+'" data-note="'+data[i].note+'">'+data[i].pin+' - '+data[i].nick_name+'</li>';
              }
              $('#aft_list').html(l);
            }
          });
        }
        /* item selected */
        $('#aft_list').on('click', '.aft_list_item', function(){
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
              note= $(this).data('note'),
              teacher_note= '<div class="card-body">'+
                            '<h5 class="card-title">Note: </h5>'+
                            '<p data-pin="'+pn+'" contenteditable="true" class="p_note card-text">'+note+'</p>'+
                          '</div>',
              aft_header = '',
              stdinfo='<div class="card">'+
                        '<div class="card-header" id="heading_personal_detail">'+
                          '<h2 class="mb-0">'+
                            '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_personal_detail" aria-expanded="true" aria-controls="collapse_personal_detail">'+
                            'Personal Information '+
                            '</button>'+
                          '</h2>'+
                        '</div>'+
                        '<div id="collapse_personal_detail" class="collapse show" aria-labelledby="heading_personal_detail" data-parent="#stdinfo">'+
                          '<div class="card-body">';
          if(grp!=''){stdinfo += '<span class="group_name"> Group: '+grp+'</span><br>';}
          
          stdinfo +=        '<span class="student_info_item">Pin:</span> '+ pn+'<br>' +
                            '<span class="student_info_item"> Name:</span> '+ cn+' - '+nn+'<br>' +
                            '<span class="student_info_item"> Address:</span> '+ad+'<br>'+
                            '<span class="student_info_item"> PDoB:</span> '+pb+', '+db+'<br>' +
                            '<span class="student_info_item"> Phone:</span> '+ ph+' <br>'+
                          '</div>'+
                        '</div>'+
                      '</div>' ;
          if(cnst2!=''){
            stdinfo += '<div class="card">'+
                        '<div class="card-header" id="heading_'+pn+'st2">'+
                          '<h2 class="mb-0">'+
                            '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+pn+'st2" aria-expanded="true" aria-controls="collapse_'+pn+'st2">'+
                            'Student 2 '+
                            '</button>'+
                          '</h2>'+
                        '</div>'+
                        '<div id="collapse_'+pn+'st2" class="collapse" aria-labelledby="heading_'+pn+'st2" data-parent="#stdinfo">'+
                          '<div class="card-body">'+
                            '<span class="student_info_item"> Name :</span> '+ cnst2 +', '+nnst2 +'<br>'+
                            '<span class="student_info_item"> Address:</span> ' +adrst2 +'<br>'+
                            '<span class="student_info_item"> PDoB:</span> ' +pobst2+', '+dobst2 +'<br>' +
                            '<span class="student_info_item"> Phone:</span> '+phst2+'<br>'+
                          '</div>'+
                        '</div>'+
                      '</div>' ;
          } 
          if(cnst3!=''){
            stdinfo += '<div class="card">'+
                        '<div class="card-header" id="heading_'+pn+'st3">'+
                          '<h2 class="mb-0">'+
                            '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+pn+'st3" aria-expanded="true" aria-controls="collapse_'+pn+'st3">'+
                            'Student 3 '+
                            '</button>'+
                          '</h2>'+
                        '</div>'+
                        '<div id="collapse_'+pn+'st3" class="collapse" aria-labelledby="heading_'+pn+'st3" data-parent="#stdinfo">'+
                          '<div class="card-body">'+
                            '<span class="student_info_item"> Name:</span> ' + cnst3+', '+ nnst3+'<br>' +
                            '<span class="student_info_item"> Address:</span> ' + adrst3 +'<br>'+
                            '<span class="student_info_item"> PDoB: </span>'+ pobst3+', '+ dobst3+'<br>'+
                            '<span class="student_info_item"> Phone :</span>' + phst3+'<br>'+
                          '</div>'+
                        '</div>'+
                      '</div>' ;
          }
          if(cnst4!=''){
            stdinfo += '<div class="card">'+
                        '<div class="card-header" id="heading_'+pn+'st4">'+
                          '<h2 class="mb-0">'+
                            '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+pn+'st4" aria-expanded="true" aria-controls="collapse_'+pn+'st4">'+
                            'Student 4 '+
                            '</button>'+
                          '</h2>'+
                        '</div>'+
                        '<div id="collapse_'+pn+'st4" class="collapse" aria-labelledby="heading_'+pn+'st4" data-parent="#stdinfo">'+
                          '<div class="card-body">'+
                            '<span class="student_info_item"> Name:</span> '+ cnst4+' - '+ nnst4+'<br>' +
                            '<span class="student_info_item"> Address:</span> ' + adrst4 +'<br>' +
                            '<span class="student_info_item"> PDOB:</span> '+ pobst4+', '+ dobst4+''+
                            '<span class="student_info_item"> Phone:</span> '+ phst4 +'<br>'+
                          '</div>'+
                        '</div>'+
                      '</div>' ;
          }
          stdinfo += '<div class="card">'+
                        '<div class="card-header" id="heading_'+pn+'_course_detail">'+
                          '<h2 class="mb-0">'+
                            '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'+pn+'_course_detail" aria-expanded="true" aria-controls="collapse_'+pn+'_course_detail">'+
                            'Course Detail '+
                            '</button>'+
                          '</h2>'+
                        '</div>'+
                        '<div id="collapse_'+pn+'_course_detail" class="collapse" aria-labelledby="heading_'+pn+'_course_detail" data-parent="#stdinfo">'+
                          '<span class="student_info_item"> Program:</span> '+ pr+'<br>'+
                          '<span class="student_info_item"> Program duration: </span>' + pd+'<br>' +
                          '<span class="student_info_item"> Started on:</span> '+ sd+'<br>'+
                          '<span class="student_info_item"> Reason:</span> ' + re+'<br>'+
                          '<span class="student_info_item"> Target:</span> ' + ta+'<br>'+
                          '<span class="student_info_item"> Difficulties:</span> ' + di+'<br>' +
                          '<span class="student_info_item"> Background:</span> '+ bg+'<br>' +
                          '<span class="student_info_item"> Self Introduction:</span> '+ si+'<br>' +
                          '<span class="student_info_item"> Weakness points: </span>'+ wp + ap+'<br>';
          if(fsp=='yes'){
            stdinfo += ' FSP : true <br>';
          }
          stdinfo += '    </div>'+
                        '</div>'+
                      '</div>' ;
          aft_header += 'Student Information'+
              '<div class="float-right">'+
              '<a title="Visit student page" href="<?php echo site_url('student_single?pin=');?>'+pn+'" class="btn btn-info tooltip-bottom"> <span class="fa fa-eye"></span> See more </a>'+' '+
                '<a title="Remove this student" data-pin="'+pn+'"href="javascript:void(0);" class="btn btn-success tooltip-bottom remove_aft_button"> <span class="fa fa-trash"></span> Remove </a>'+
              '</div> ';
          
          $.ajax({
            url : "<?php echo site_url('after_teaching/get_course');?>",
            type : "post",
            dataType : "json",
            data : {pin:pn},
            success : function(data){
              var i, 
                  crsm='<h3>Last five sessions</h3>'+
                  '<table class="table table-sm table-striped table-bordered">'+
                          '<thead>'+
                          '<tr>'+
                          '<th title="meeting number"><i class="fa fa-hashtag fa-fw"></i></th>'+
                          '<th title="Date, time" Date, time</th>'+
                          '<th title="Teacher">Teacher</th>'+
                          '<th title="Meeting duration"> Duration</th>'+
                          '<th title="Material"> Material</th>'+
                          '<th title="Evaluation"> Evaluation</th>'+
                          '<th title="Writing assessment"><i class="fas fa-pencil-alt fa-fw"></i></th>'+
                          '<th title="Speaking assessment"><i class="fa fa-bullhorn fa-fw"></i></th>'+
                          '</tr>'+
                         '</thead>'+
                         '<tbody>';
              for(i=0;i<data.length;i++){
                crsm += '<tr>'+
                          '<td>'+data[i].meeting+'</td>'+
                          '<td>'+data[i].course_date+'</td>'+
                          '<td>'+data[i].teacher+'</td>'+
                          '<td>'+data[i].duration+'</td>'+
                          '<td>'+data[i].material+'</td>'+
                          '<td>'+data[i].evaluation+'</td>'+
                          '<td>'+data[i].w+'</td>'+
                          '<td>'+data[i].s+'</td>'+
                        '</tr>';
              }
              crsm += '</tbody>'+
                '</table>';
              $('#main_content').fadeIn();
              $('#note').html(teacher_note);
              $('#stdinfo').html(stdinfo);
              $('#course_summary').html(crsm);
              $('#aft_header').html(aft_header);
            }
          });
        });
        /* note update */
        $('#note').on('focusout','.p_note', function(){
          var pin = $(this).data('pin'),
              str = $(this).text();
          $.ajax({
            type:"post",
            url : "<?php echo site_url('after_teaching/update_note');?>",
            dataType : "json",
            data : {pin:pin, str:str},
            success: function(data){
              console.log('note updated');
            }
          });
        });
        /* note update */
        /* delete student */
        $('#aft_header').on('click', '.remove_aft_button',function(){
          var pin = $(this).data('pin');
          console.log(pin);
          $.ajax({
            url:"<?php echo site_url('after_teaching/remove');?>",
            type : "post",
            dataType : "json",
            data : {pin:pin},
            success : function(data){
              console.log('removed');
              get_list();
              $('#main_content').fadeOut();
            }
          });
        });
      });
    </script>
  </body>
</hml>