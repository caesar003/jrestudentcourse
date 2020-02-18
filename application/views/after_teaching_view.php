<?php include 'inc/header.php';?>
    <div class="container">
      <h2>After Teaching List</h2>
      <div class="row">
        <div class="col-md-3">
          <ul class="list-group" id="aft_list"></ul>
        </div>
        <div class="col-md-9">
          <h3>Student Information</h3>
          <div class="container-fluid" id="stdinfo">
          
          </div>
          <h3>Last five sessions</h3>
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
                l += '<li class="list-group-item aft_list_item" data-grp="'+data[i].grp+'" data-pn="'+data[i].pin+'" data-cn="'+data[i].complete_name+'" data-nn="'+data[i].nick_name+'" data-ad="'+data[i].address+'" data-pb="'+data[i].place_of_birth+'" data-db="'+($.format.date(data[i].date_of_birth, "yyyy-MM-dd"))+'" data-ph="'+data[i].phone+'"data-cnst2="'+data[i].cnst2+'"data-nnst2="'+data[i].nnst2+'"data-adrst2="'+data[i].adrst2+'"data-pobst2="'+data[i].pobst2+'"data-dobst2="'+($.format.date(data[i].dobst2, "yyyy-MM-dd"))+'"data-phst2="'+data[i].phst2+'"data-cnst3="'+data[i].cnst3+'"data-nnst3="'+data[i].nnst3+'"data-adrst3="'+data[i].adrst3+'"data-pobst3="'+data[i].pobst3+'"data-dobst3="'+($.format.date(data[i].dobst3, "yyyy-MM-dd"))+'"data-phst3="'+data[i].phst3+ '"data-cnst4="'+data[i].cnst4+'"data-nnst4="'+data[i].nnst4+'"data-adrst4="'+data[i].adrst4+'"data-pobst4="'+data[i].pobst4+'"data-dobst4="'+($.format.date(data[i].dobst4, "yyyy-MM-dd"))+'"data-phst4="'+data[i].phst4+ '"data-pr="'+data[i].program+'"data-pd="'+data[i].program_duration+'"data-sd="'+($.format.date(data[i].starting_date, "yyyy-MM-dd"))+'"data-re="'+data[i].reason+'"data-ta="'+data[i].target+'" data-di="'+data[i].difficulties+'"data-bg="'+data[i].bground+'"data-si="'+data[i].self_introduction+'" data-wp="'+data[i].weakness_point+'"data-ap="'+data[i].action_plan+'" data-fsp="'+data[i].fsp+'">'+data[i].pin+' - '+data[i].nick_name+'</li>';
              }
              $('#aft_list').html(l);
            }
          });
        }
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
              stdinfo='<span class="student_detail_header">Personal Information </span><br>' ;
          console.log('group is'+grp);
          console.log(cnst2);
          if(grp!=''){
            stdinfo += '<span class="student_detail_item"> Group: '+grp+'</span><br>';
          }
          stdinfo += '<span class="student_detail_item">Pin: '+ pn+'</span><br>' +
            '<span class="student_detail_item"> Name: '+ cn+' - '+nn+'</span><br>' +
            '<span class="student_detail_item"> Address: '+ad+'</span><br>'+
            '<span class="student_detail_item"> PDOB: '+pb+', '+db+'</span><br>' +
            '<span class="student_detail_item"> Phone: '+ ph+'</span> <br>';
          if(cnst2!=''){
            // one student 
            stdinfo +=  '<span class="student_detail_header">Student two </span><br>'+
              '<span class="student_detail_item"> Name : '+ cnst2 +'</span><br>'+
              '<span class="student_detail_item"> Aka: ' +nnst2 +'</span><br>' +
              '<span class="student_detail_item"> Address: ' +adrst2 +'</span><br>'+
              '<span class="student_detail_item"> Place of Birth: ' +pobst2+'</span><br>' +
              '<span class="student_detail_item"> Date of birth: '+ dobst2 +'</span><br>' +
              '<span class="student_detail_item"> Phone: '+phst2+'</span><br>';
          } 
          if(cnst3!=''){
            // two students
            stdinfo += '<span class="student_detail_item"> Name: ' + cnst3+'</span><br>' +
              '<span class="student_detail_item"> Aka: '+ nnst3+'</span><br>'+
              '<span class="student_detail_item"> Address: ' + adrst3 +'</span><br>'+
              '<span class="student_detail_item"> Place of birth: '+'</span>'+
              '<span class="student_detail_item"> Place of birth: '+ pobst3+'</span><br>'+
              '<span class="student_detail_item"> Date of birth: ' + dobst3+'</span><br>'+
              '<span class="student_detail_item"> Phone :' + phst3+'</span><br>';
          }
          if(cnst4!=''){
            // four students 
            stdinfo += '<span class="student_detail_item"> Name: '+ cnst4+'</span><br>' +
              '<span class="student_detail_item"> Aka: '+ nnst4+'</span><br>'+
              '<span class="student_detail_item"> Address: ' + adrst4 +'</span><br>' +
              '<span class="student_detail_item"> PDOB: '+ pobst4+'</span>'+
              '<span class="student_detail_item"> Date of birth: ' + dobst4+'</span><br>' +
              '<span class="student_detail_item"> Phone: '+ phst4 +'</span><br>';
          }
          stdinfo += '<span class="student_detail_header">Course Detail</span><br>'+
            '<span class="student_detail_item"> Program: '+ pr+'</span><br>'+
            '<span class="student_detail_item"> Program duration: ' + pd+'</span><br>' +
            '<span class="student_detail_item"> Started on '+ sd+'</span><br>'+
            '<span class="student_detail_item"> Reason: ' + re+'</span><br>'+
            '<span class="student_detail_item"> Target: ' + ta+'</span><br>'+
            '<span class="student_detail_item"> Difficulties: ' + di+'</span><br>' +
            '<span class="student_detail_item"> Background: '+ bg+'</span><br>' +
            '<span class="student_detail_item"> Self Introduction'+ si+'</span><br>' +
            '<span class="student_detail_item"> Weakness points: '+ wp + ap+'</span><br>';
          if(fsp=='yes'){
            stdinfo += '<span class="student_detail_item"> FSP : true </span><br>';
          }
            
          
          $.ajax({
            url : "<?php echo site_url('after_teaching/get_course');?>",
            type : "post",
            dataType : "json",
            data : {pin:pn},
            success : function(data){
              var i, 
                  crsm='<table class="table table-sm table-striped table-bordered">'+
                          '<thead>'+
                          '<tr>'+
                          '<th title="meeting number"><i class="fa fa-hashtag fa-fw"></i></th>'+
                          '<th title="Date, time"><i class="fa fa-calendar fa-fw"></i> Date, time</th>'+
                          '<th title="Teacher"><i class="fa fa-user-circle fa-fw"></i></th>'+
                          '<th title="Meeting duration"><i class="fas fa-clock fa-fw"></i> Duration</th>'+
                          '<th title="Material"><i class="fa fa-book fa-fw"></i> Material</th>'+
                          '<th title="Evaluation"><i class="fa fa-list-ul fa-fw"></i> Evaluation</th>'+
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
              
              $('#stdinfo').html(stdinfo);
              $('#course_summary').html(crsm);
            }
          });
        });
      });
    </script>
  </body>
</hml>