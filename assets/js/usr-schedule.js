$(document).ready(function(){
  show_schedule();
  setInterval(function(){
    show_schedule();
  }, 20000);
  $('#schedule_date').on('change', function(){
    var d = $(this).val();
    $.ajax({
      type: "POST",
      url : `${u}/schedule/date_availability`,
      data: {d:d},
      success : function(response){
        if(response == 'false'){
          $('#sch_r').addClass('alert alert-danger');
          $('#sch_r').fadeIn('fast');
          $('#sch_r').html('Table for <em>'+d+' </em>isn\'t available yet!');
          $('#sch_r').fadeOut(5000);
        } else{
          show_schedule();
        }
      }
    });
  });
  function show_schedule(d = $('#schedule_date').val()){
    var dtf = d + " 00:00:00";
    $.ajax({
      type: "ajax",
      url: `${u}/schedule/get_schedule?d=${d}`,
      dataType : "JSON",
      success : function(data){
        var html = ``,
            schd_head = `<small>Schedule for</small> ${$.format.date(dtf, "ddd, MMM D, yyyy")}`,
            stl = `${u}/student_single?pin=`,
            i,
            c=0;
        for (i=0;i<data.length;i++){
          c = c+1;
          html += `<tr>
                      <td rowspan="2" style="text-align:right;">${c}</td>
                      <td rowspan="2" style="text-align:left;">${data[i].name}</td>`;

          if(isNaN(data[i]._9)){
              html += `<td class="tc_break">${data[i]._9}</td>`;

          } else if(data[i]._9p == `a`){
            html += `<td class="abs""><a href="${stl+data[i]._9}">${data[i]._9} <span class="req">${data[i]._9r}</span></a></td>`;

          } else if(data[i]._9p == `p`){
            html += `<td class="prst"><a href="${stl+data[i]._9}">${data[i]._9} <span class="req">${data[i]._9r}</span></a></td>`;

          } else {
            html += `<td><a href="${stl+data[i]._9}">${data[i]._9} <span class="req">${data[i]._9r}</span></a></td>`;
          }

          if(isNaN(data[i]._10)){
               html += `<td class="tc_break">${data[i]._10}</td>`;
          } else if(data[i]._10p == `a`){
            html += `<td class="abs""><a href="${stl+data[i]._10}">${data[i]._10} <span class="req">${data[i]._10r}</span></a></td>`;
          } else if(data[i]._10p == `p`){
            html += `<td class="prst"><a href="${stl+data[i]._10}">${data[i]._10} <span class="req">${data[i]._10r}</span></a></td>`;
          } else {
            html += `<td><a href="${stl+data[i]._10}">${data[i]._10} <small><stronsg>${data[i]._10r}</span></a></td>`;
          }

          if(isNaN(data[i]._11)){
               html += `<td class="tc_break">${data[i]._11}</td>`;
          } else if(data[i]._11p == `a`){
            html += `<td class="abs""><a href="${stl+data[i]._11}">${data[i]._11} <span class="req">${data[i]._11r}</span></a></td>`;
          } else if(data[i]._11p == `p`){
            html += `<td class="prst"><a href="${stl+data[i]._11}">${data[i]._11} <span class="req">${data[i]._11r}</span></a></td>`;
          } else {
            html += `<td><a href="${stl+data[i]._11}">${data[i]._11} <span class="req">${data[i]._11r}</span></a></td>`;
          }
         if(isNaN(data[i]._12)){
               html += `<td class="tc_break">${data[i]._12}</td>`;
          } else if(data[i]._12p == `a`){
            html += `<td class="abs""><a href="${stl+data[i]._12}">${data[i]._12} <span class="req">${data[i]._12r}</span></a></td>`;
          } else if(data[i]._12p == `p`){
            html += `<td class="prst"><a href="${stl+data[i]._12}">${data[i]._12} <span class="req">${data[i]._12r}</span></a></td>`;
          } else {
            html += `<td><a href="${stl+data[i]._12}">${data[i]._12} <span class="req">${data[i]._12r}</span></a></td>`;
          }
          if(isNaN(data[i]._13)){
               html += `<td class="tc_break">${data[i]._13}</td>`;
          } else if(data[i]._13p == `a`){
            html += `<td class="abs""><a href="${stl+data[i]._13}">${data[i]._13} <span class="req">${data[i]._13r}</span></a></td>`;
          } else if(data[i]._13p == `p`){
            html += `<td class="prst"><a href="${stl+data[i]._13}">${data[i]._13} <span class="req">${data[i]._13r}</span></a></td>`;
          } else {
            html += `<td><a href="${stl+data[i]._13}">${data[i]._13} <span class="req">${data[i]._13r}</span></a></td>`;
          }
          if(isNaN(data[i]._14)){
               html += `<td class="tc_break">${data[i]._14}</td>`;
          } else if(data[i]._14p == `a`){
            html += `<td class="abs""><a href="${stl+data[i]._14}">${data[i]._14} <span class="req">${data[i]._14r}</span></a></td>`;
          } else if(data[i]._14p == `p`){
            html += `<td class="prst"><a href="${stl+data[i]._14}">${data[i]._14} <span class="req">${data[i]._14r}</span></a></td>`;
          } else {
            html += `<td><a href="${stl+data[i]._14}">${data[i]._14} <span class="req">${data[i]._14r}</span></a></td>`;
          }
          if(isNaN(data[i]._15)){
               html += `<td class="tc_break">${data[i]._15}</td>`;
          } else if(data[i]._15p == `a`){
            html += `<td class="abs""><a href="${stl+data[i]._15}">${data[i]._15} <span class="req">${data[i]._15r}</span></a></td>`;
          } else if(data[i]._15p == `p`){
            html += `<td class="prst"><a href="${stl+data[i]._15}">${data[i]._15} <span class="req">${data[i]._15r}</span></a></td>`;
          } else {
            html += `<td><a href="${stl+data[i]._15}">${data[i]._15} <span class="req">${data[i]._15r}</span></a></td>`;
          }
          if(isNaN(data[i]._16)){
               html += `<td class="tc_break">${data[i]._16}</td>`;
          } else if(data[i]._16p == `a`){
            html += `<td class="abs""><a href="${stl+data[i]._16}">${data[i]._16} <span class="req">${data[i]._16r}</span></a></td>`;
          } else if(data[i]._16p == `p`){
            html += `<td class="prst"><a href="${stl+data[i]._16}">${data[i]._16} <span class="req">${data[i]._16r}</span></a></td>`;
          } else {
            html += `<td><a href="${stl+data[i]._16}">${data[i]._16} <span class="req">${data[i]._16r}</span></a></td>`;
          }
          if(isNaN(data[i]._17)){
               html += `<td class="tc_break">${data[i]._17}</td>`;
          } else if(data[i]._17p == `a`){
            html += `<td class="abs""><a href="${stl+data[i]._17}">${data[i]._17} <span class="req">${data[i]._17r}</span></a></td>`;
          } else if(data[i]._17p == `p`){
            html += `<td class="prst"><a href="${stl+data[i]._17}">${data[i]._17} <span class="req">${data[i]._17r}</span></a></td>`;
          } else {
            html += `<td><a href="${stl+data[i]._17}">${data[i]._17} <span class="req">${data[i]._17r}</span></a></td>`;
          }
          if(isNaN(data[i]._18)){
               html += `<td class="tc_break">${data[i]._18}</td>`;
          } else if(data[i]._18p == `a`){
            html += `<td class="abs""><a href="${stl+data[i]._18}">${data[i]._18} <span class="req">${data[i]._18r}</span></a></td>`;
          } else if(data[i]._18p == `p`){
            html += `<td class="prst"><a href="${stl+data[i]._18}">${data[i]._18} <span class="req">${data[i]._18r}</span></a></td>`;
          } else {
            html += `<td><a href="${stl+data[i]._18}">${data[i]._18} <span class="req">${data[i]._18r}</span></a></td>`;
          }
          if(isNaN(data[i]._19)){
               html += `<td class="tc_break">${data[i]._19}</td>`;
          } else if(data[i]._19p == `a`){
            html += `<td class="abs""><a href="${stl+data[i]._19}">${data[i]._19} <span class="req">${data[i]._19r}</span></a></td>`;
          } else if(data[i]._19p == `p`){
            html += `<td class="prst"><a href="${stl+data[i]._19}">${data[i]._19} <span class="req">${data[i]._19r}</span></a></td>`;
          } else {
            html += `<td><a href="${stl+data[i]._19}">${data[i]._19} <span class="req">${data[i]._19r}</span></a></td>`;
          }
          if(isNaN(data[i]._20)){
               html += `<td class="tc_break">${data[i]._20}</td>`;
          } else if(data[i]._20p == `a`){
            html += `<td class="abs""><a href="${stl+data[i]._20}">${data[i]._20} <span class="req">${data[i]._20r}</span></a></td>`;
          } else if(data[i]._20p == `p`){
            html += `<td class="prst"><a href="${stl+data[i]._20}">${data[i]._20} <span class="req">${data[i]._20r}</span></a></td>`;
          } else {
            html += `<td><a href="${stl+data[i]._20}">${data[i]._20} <span class="req">${data[i]._20r}</span></a></td>`;
          }
          html += `</tr><tr>
            <td>${data[i]._9n}</td>
            <td>${data[i]._10n}</td>
            <td>${data[i]._11n}</td>
            <td>${data[i]._12n}</td>
            <td>${data[i]._13n}</td>
            <td>${data[i]._14n}</td>
            <td>${data[i]._15n}</td>
            <td>${data[i]._16n}</td>
            <td>${data[i]._17n}</td>
            <td>${data[i]._18n}</td>
            <td>${data[i]._19n}</td>
            <td>${data[i]._20n}</td>`;
        }
        $('#my_schedule').html(html);
        $('#schedule_header').html(schd_head);
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
});
