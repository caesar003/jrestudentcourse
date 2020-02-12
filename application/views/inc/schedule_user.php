<script>
  $(document).ready(function(){
    show_schedule();
    get_schedules();
    setInterval(function(){ show_schedule(); }, 1000);
    /* schedule */
    $('#see_schedule').on('click',function(){
      var d = $('#schedule_date').val();
      $.ajax({
        type: "POST",
        url : "<?php echo site_url('schedule/date_availability');?>",
        data: {d:d},
        success : function(response){
          if(response == 'false'){
            console.log('table doesnot exist');
            $('#schedule_req').addClass('alert alert-danger');
            $('#schedule_req').fadeIn('fast');
            $('#schedule_req').html('Table for <em>'+d+' </em>isn\'t available yet!');
          } else{
            console.log('table exists!');
            show_schedule();
          }
        }
      });
      //
    });
    function get_schedules(){
          $.ajax({
            type : "ajax",
            url : "<?php echo site_url('schedule/get_schedules');?>",
            dataType : "JSON",
            success : function(data){
              var html = '',
                  i;
              for(i=0;i<data.length;i++){
                html += '<li class="list-group-item"><a class="schedule_list_item" href="javascript:void(0);" data-d="'+data[i].table_name+'">'+data[i].table_name+'</a></li>'
              }
              $('#schedule_list').html(html);
            }
          });
        }
    $('#schedule_list').on('click','.schedule_list_item', function(){
          var d = $(this).data('d');
          show_schedule(d);
          $('#schedule_date').val(d);
        });
    //function show_schedule(){
    function show_schedule(d = $('#schedule_date').val()){
      var dtf = d + " 00:00:00";
              
      $.ajax({
        type: "ajax",
        url: "<?php echo site_url('schedule/get_schedule?d=');?>"+d,
        dataType : "JSON",
        success : function(data){
          var html = '',
              schd_head = '<small>Schedule for</small> '+$.format.date(dtf, "ddd, MMM D, yyyy"),
              stl = "<?php echo site_url('student_single?pin=');?>",
              i;
          for (i=0;i<data.length;i++){
            html += '<tr>'+
                      '<td style="text-align:right;">'+data[i].id+'</td>'+
                      '<td style="text-align:left;">'+data[i].name+'</td>';
            if(data[i]._9p == 'a'){
              html += '<td class="abs""><a href="'+stl+data[i]._9+'">'+data[i]._9+' <span class="req">'+data[i]._9r+'</span></a></td>';
            } else if(data[i]._9p == 'p'){
              html += '<td class="prst"><a href="'+stl+data[i]._9+'">'+data[i]._9+' <span class="req">'+data[i]._9r+'</span></a></td>';
            } else {
              html += '<td><a href="'+stl+data[i]._9+'">'+data[i]._9+' <span class="req">'+data[i]._9r+'</span></a></td>';
            }
            if(data[i]._10p == 'a'){
              html += '<td class="abs""><a href="'+stl+data[i]._10+'">'+data[i]._10+' <span class="req">'+data[i]._10r+'</span></a></td>';
            } else if(data[i]._10p == 'p'){
              html += '<td class="prst"><a href="'+stl+data[i]._+'">'+data[i]._10+' <span class="req">'+data[i]._10r+'</span></a></td>';
            } else {
              html += '<td><a href="'+stl+data[i]._10+'">'+data[i]._10+' <small><stronsg>'+data[i]._10r+'</span></a></td>';
            }
            if(data[i]._11p == 'a'){
              html += '<td class="abs""><a href="'+stl+data[i]._11+'">'+data[i]._11+' <span class="req">'+data[i]._11r+'</span></a></td>';
            } else if(data[i]._11p == 'p'){
              html += '<td class="prst"><a href="'+stl+data[i]._11+'">'+data[i]._11+' <span class="req">'+data[i]._11r+'</span></a></td>';
            } else {
              html += '<td><a href="'+stl+data[i]._11+'">'+data[i]._11+' <span class="req">'+data[i]._11r+'</span></a></td>';
            }
            if(data[i]._12p == 'a'){
              html += '<td class="abs""><a href="'+stl+data[i]._12+'">'+data[i]._12+' <span class="req">'+data[i]._12r+'</span></a></td>';
            } else if(data[i]._12p == 'p'){
              html += '<td class="prst"><a href="'+stl+data[i]._12+'">'+data[i]._12+' <span class="req">'+data[i]._12r+'</span></a></td>';
            } else {
              html += '<td><a href="'+stl+data[i]._12+'">'+data[i]._12+' <span class="req">'+data[i]._12r+'</span></a></td>';
            }
            if(data[i]._13p == 'a'){
              html += '<td class="abs""><a href="'+stl+data[i]._13+'">'+data[i]._13+' <span class="req">'+data[i]._13r+'</span></a></td>';
            } else if(data[i]._13p == 'p'){
              html += '<td class="prst"><a href="'+stl+data[i]._+'">'+data[i]._13+' <span class="req">'+data[i]._13r+'</span></a></td>';
            } else {
              html += '<td><a href="'+stl+data[i]._13+'">'+data[i]._13+' <span class="req">'+data[i]._13r+'</span></a></td>';
            }
            if(data[i]._14p == 'a'){
              html += '<td class="abs""><a href="'+stl+data[i]._14+'">'+data[i]._14+' <span class="req">'+data[i]._14r+'</span></a></td>';
            } else if(data[i]._14p == 'p'){
              html += '<td class="prst"><a href="'+stl+data[i]._14+'">'+data[i]._14+' <span class="req">'+data[i]._14r+'</span></a></td>';
            } else {
              html += '<td><a href="'+stl+data[i]._14+'">'+data[i]._14+' <span class="req">'+data[i]._14r+'</span></a></td>';
            }
            if(data[i]._15p == 'a'){
              html += '<td class="abs""><a href="'+stl+data[i]._15+'">'+data[i]._15+' <span class="req">'+data[i]._15r+'</span></a></td>';                  
            } else if(data[i]._15p == 'p'){
              html += '<td class="prst"><a href="'+stl+data[i]._15+'">'+data[i]._15+' <span class="req">'+data[i]._15r+'</span></a></td>';
            } else {
              html += '<td><a href="'+stl+data[i]._15+'">'+data[i]._15+' <span class="req">'+data[i]._15r+'</span></a></td>';
            }
            if(data[i]._16p == 'a'){
              html += '<td class="abs""><a href="'+stl+data[i]._16+'">'+data[i]._16+' <span class="req">'+data[i]._16r+'</span></a></td>';                  
            } else if(data[i]._16p == 'p'){
              html += '<td class="prst"><a href="'+stl+data[i]._16+'">'+data[i]._16+' <span class="req">'+data[i]._16r+'</span></a></td>';
            } else {
              html += '<td><a href="'+stl+data[i]._16+'">'+data[i]._16+' <span class="req">'+data[i]._16r+'</span></a></td>';
            }
            if(data[i]._17p == 'a'){
              html += '<td class="abs""><a href="'+stl+data[i]._17+'">'+data[i]._17+' <span class="req">'+data[i]._17r+'</span></a></td>';                  
            } else if(data[i]._17p == 'p'){
              html += '<td class="prst"><a href="'+stl+data[i]._17+'">'+data[i]._17+' <span class="req">'+data[i]._17r+'</span></a></td>';
            } else {
              html += '<td><a href="'+stl+data[i]._17+'">'+data[i]._17+' <span class="req">'+data[i]._17r+'</span></a></td>';
            }
            if(data[i]._18p == 'a'){
              html += '<td class="abs""><a href="'+stl+data[i]._18+'">'+data[i]._18+' <span class="req">'+data[i]._18r+'</span></a></td>';                  
            } else if(data[i]._18p == 'p'){
              html += '<td class="prst"><a href="'+stl+data[i]._18+'">'+data[i]._18+' <span class="req">'+data[i]._18r+'</span></a></td>';
            } else {
              html += '<td><a href="'+stl+data[i]._18+'">'+data[i]._18+' <span class="req">'+data[i]._18r+'</span></a></td>';
            }
            if(data[i]._19p == 'a'){
              html += '<td class="abs""><a href="'+stl+data[i]._19+'">'+data[i]._19+' <span class="req">'+data[i]._19r+'</span></a></td>';                  
            } else if(data[i]._19p == 'p'){
              html += '<td class="prst"><a href="'+stl+data[i]._19+'">'+data[i]._19+' <span class="req">'+data[i]._19r+'</span></a></td>';
            } else {
              html += '<td><a href="'+stl+data[i]._19+'">'+data[i]._19+' <span class="req">'+data[i]._19r+'</span></a></td>';
            }
            if(data[i]._20p == 'a'){
              html += '<td class="abs""><a href="'+stl+data[i]._20+'">'+data[i]._20+' <span class="req">'+data[i]._20r+'</span></a></td>';                  
            } else if(data[i]._20p == 'p'){
              html += '<td class="prst"><a href="'+stl+data[i]._20+'">'+data[i]._20+' <span class="req">'+data[i]._20r+'</span></a></td>';
            } else {
              html += '<td><a href="'+stl+data[i]._20+'">'+data[i]._20+' <span class="req">'+data[i]._20r+'</span></a></td>';
            }
            html += '</tr>';
          }
          $('#my_schedule').html(html);
          $('#schedule_header').html(schd_head);
        }
      });
    }
    /* end schedule */
  });
</script>