    <script type="text/javascript">
      $(document).ready(function(){ 
        
        setInterval(function(){ get_notif(); }, 20000);
        get_notif();
        show_chat();
        $('#chat_button').hover( function(){
          $('#chat_button_icon').css('color', 'rgba(100, 126, 255, 0.69)');
        }, function(){
          $('#chat_button_icon').css('color', 'rgba(0, 126, 255, 0.69)');
        });
        $('#scroll_chat_content').on('click', function(){
          scroll_chat();
        });
        $('#show_chat').on('click', '.image_chat', function(){
          var image = $(this).data('image');
          var html ='<img width="100%" src="<?php echo base_url().'assets/images/'?>'+image+'">';
          $('#image_chat_modal').modal('show');
          $('#chat_modal_body').html(html);
        });
        $('#file').on('change', function(e){
          var selected_file = e.target.files[0].name;
          $('#filename').html(selected_file);
          console.log(selected_file);
        });
        $('#chat_button').on('click', function(){
          $('#chat_button').fadeOut('slow');
          $('#chat_window').fadeIn(2000);
          scroll_chat();
          show_chat();
          unset_unread();
        });
        $('#close_chat_window').on('click', function(){
          $('#chat_window').fadeOut('fast');
          $('#chat_button').fadeIn(2000);
        });
        $('#btn_upload').on('click',function(){
          $('#chat_form').submit();
        });
        $('#chat_form').submit(function(e){
          e.preventDefault();
          var selected_file=$('#file').val();
          var message = $('#message').val();
          if (selected_file == '') {
            if(message != ''){
              send_message();
              set_unread();
            }
          } else {
            $.ajax({
              url:'<?php echo base_url();?>index.php/chat/do_upload',
              type:"post",
              data:new FormData(this),
              processData:false,
              contentType:false,
              cache:false,
              success: function(data){
                $('[name="file"]').val("");
                $('#filename').html("");
                show_chat();
                scroll_chat();
                set_unread();
              }
            });
          }
        });
        function get_notif(){
          var sender="<?php echo $this->session->userdata('id');?>";
          $.ajax({
            type:'ajax',
            url:'<?php echo site_url('chat/get_notif?sender=')?>'+sender,
            dataType:'JSON',
            success:function(data){
              var html='';
              var i;
              for(i=0;i<data.length;i++){
                if(data[i].unread_message=='yes'){
                  html+='<i style="color:red;" class="fa fa-asterisk"></i>';
                  if ($('#chat_window').css('display')==='block'){ show_chat(); scroll_chat(); unset_unread(); } } } $('#show_notification').html(html); } }); } function set_unread(){ var sender = "<?php echo $this->session->userdata('id');?>"; $.ajax({ type: 'ajax', url : '<?php echo site_url('chat/set_unread')?>', dataType :"JSON", data: {sender:sender}, success: function(data){ console.log('set_unread'); } }); } function unset_unread(){ var sender="<?php echo $this->session->userdata('id');?>"; $.ajax({ type:'ajax', url:'<?php echo site_url('chat/remove_notif?sender=')?>'+sender, dataType:'JSON', success:function(data){ console.log('unset_unread') } }); } function send_message(){ var sender= $('#sender').val(), html = '', message = $('#message').val(); html += '<div class="d-flex justify-content-end mb-4">'+ '<div class="msg_container_send">'+ '<span class="message_sender"><?php echo $this->session->userdata('username');?> </span>'+ '<br>'+ message+ '<span class="msg_time_send">'+ ($.format.date(new Date(),"MMM d, HH:mm "))+ '</span>'+ '</div>'+ '<div class="img_cont_msg">'+ '<img src="<?php echo base_url().$this->session->userdata('avatar');?>"class="rounded-circle user_img_msg">'+ '</div>'+ '</div>'; $('#show_chat').append(html); scroll_chat(); $.ajax({ type: "POST", url: '<?php echo base_url();?>index.php/chat/send_message', data: {sender:sender, message: message}, success: function(data){ $('[name="message"]').val(""); console.log("sender is "+sender+" and message is "+message+"."); } }); } function scroll_chat(){ var objDiv=$("#show_chat"); var h=objDiv.get(0).scrollHeight; objDiv.animate({ scrollTop:h },"slow"); } function show_chat(){ var sender='<?php echo $this->session->userdata('id');?>', today=$.format.date(new Date(),"MMddyyyy"), path = "<?php echo base_url().'assets/images/'?>", baseurl = "<?php echo base_url();?>"; $.ajax({ type:'ajax', url:'<?php echo site_url('chat/show_chat')?>', dataType:'json', data:{sender:sender,today:today}, success:function(data){ var html=''; var i;for(i=0;i<data.length;i++){ if(data[i].sender==sender){ html += '<div class="d-flex justify-content-end mb-4">'+ '<div class="msg_container_send">'+ '<span class="message_sender">' +data[i].user_name+ '</span>'+ '<br>'; if(data[i].atch != ''){  if (data[i].atch.indexOf("jpg") > -1 || data[i].atch.indexOf("png") > -1 || data[i].atch.indexOf("gif") > -1 || data[i].atch.indexOf("bmp") > -1 ){  html += '<a class="image_chat" data-image="'+data[i].atch+'" href="javascript:void(0);"><img width="100%" src="'+path+''+data[i].atch+'"></a>'+ '<br>'+ data[i].message; } else if(data[i].atch.indexOf("mp4") > -1 || data[i].atch.indexOf("flv") > -1 || data[i].atch.indexOf("avi") > -1 ){  html += '<video width="100%" controls>'+ '<source src="'+path+''+data[i].atch+'" type="video/mp4">'+ 'Your browser does not support video'+ '</video>'+ '<span class="media-caption">'+data[i].atch+'</span>'+ '<br>' +data[i].message; } else if (data[i].atch.indexOf(".mp3") > -1){  html += '<audio controls>'+ '<source src="'+path+''+data[i].atch+'" type="audio/mp3">'+ 'Your browser does not support video'+ '</audio>'+ '<span class="media-caption">'+data[i].atch+'</span>'+ '<br>' +data[i].message; } else if (data[i].atch.indexOf(".exe") > -1){  html += '<span class="doc_chat">'+ '<a href="'+path+''+data[i].atch+'"><i style="color:#5e8bc3;" class="fa fa-file-windows"></i> '+data[i].atch+'</a>'+ '</span>'+ data[i].message; } else if (data[i].atch.indexOf(".zip") > -1 || data[i].atch.indexOf(".rar") > -1 ){  html += '<span class="doc_chat">'+ '<a href="'+path+''+data[i].atch+'"><i style="color:#5e8bc3;" class="fa fa-file-archive-o"></i> '+data[i].atch+'</a>'+ '</span>'+ data[i].message; } else if(data[i].atch.indexOf(".pdf") > -1){  html += '<span class="doc_chat">'+ '<a href="'+path+''+data[i].atch+'"><i style="color:rgb(255, 0, 0);" class="fa fa-file-pdf-o"></i> '+data[i].atch+'</a>'+ '</span>'+ data[i].message; } else if(data[i].atch.indexOf(".doc") > -1){ html += '<span class="doc_chat">'+ '<a href="'+path+''+data[i].atch+'"><i style="color:rgb(0, 0, 255);" class="fa fa-file-word-o"></i> '+data[i].atch+'</a>'+ '</span>'+ data[i].message; } else if (data[i].atch.indexOf(".xls") > -1){  html += '<span class="doc_chat">'+ '<a target="_blank" href="'+path+''+data[i].atch+'"><i style="color:rgb(0, 255, 0);" class="fa fa-file-excel-o"></i> '+data[i].atch+'</a>'+ '</span>'+ data[i].message; } else { html += '<span class="doc_chat">'+ '<a target="_blank" href="'+path+''+data[i].atch+'"><i style="color:rgb(0, 0, 0);" class="fa fa-question-circle"></i> '+data[i].atch+'</a>'+ '</span>'+ data[i].message; } } else {  html += data[i].message; } html += '<span class="msg_time_send">'+ ($.format.date(data[i].sent_date,"MMM d, HH:mm"))+ '</span>'+ '</div>'+ '<div class="img_cont_msg">'+ '<img src="'+baseurl+''+data[i].avatar+'" class="rounded-circle user_img_msg">'+ '</div>'+ '</div>'; } else {  html += '<div class="d-flex justify-content-start mb-4">'+ '<div class="img_cont_msg">'+ '<img src="'+baseurl+''+data[i].avatar+'" class="rounded-circle user_img_msg">'+ '</div>'+ '<div class="msg_container">'+ '<span class="received_message_sender">' +data[i].user_name+ '</span>'+ '<br>'; if (data[i].atch != ''){ if (data[i].atch.indexOf("jpg") > -1 || data[i].atch.indexOf("png") > -1 || data[i].atch.indexOf("gif") > -1 || data[i].atch.indexOf("bmp") > -1 ){  html += '<a class="image_chat" data-image="'+data[i].atch+'" href="javascript:void(0);"><img width="100%" src="'+path+''+data[i].atch+'"></a>'+ '<br>'+ data[i].message; } else if(data[i].atch.indexOf("mp4") > -1 || data[i].atch.indexOf("flv") > -1 || data[i].atch.indexOf("avi") > -1 ){  html += '<video width="100%" controls>'+ '<source src="'+path+''+data[i].atch+'" type="video/mp4">'+ 'Your browser does not support video'+ '</video>'+ '<span class="media-caption">'+data[i].atch+'</span>'+ '<br>' +data[i].message; } else if (data[i].atch.indexOf(".mp3") > -1){ html += '<audio controls>'+ '<source src="'+path+''+data[i].atch+'" type="audio/mp3">'+ 'Your browser does not support video'+ '</audio>'+ '<span class="media-caption">'+data[i].atch+'</span>'+ '<br>' +data[i].message; } else if (data[i].atch.indexOf(".exe") > -1){ html += '<span class="doc_chat">'+ '<a href="'+path+''+data[i].atch+'"><i style="color:#5e8bc3;" class="fa fa-file-windows"></i> '+data[i].atch+'</a>'+ '</span>'+ data[i].message; } else if (data[i].atch.indexOf(".zip") > -1 || data[i].atch.indexOf(".rar") > -1 ){  html += '<span class="doc_chat">'+ '<a href="'+path+''+data[i].atch+'"><i style="color:#5e8bc3;" class="fa fa-file-archive-o"></i> '+data[i].atch+'</a>'+ '</span>'+ data[i].message; } else if(data[i].atch.indexOf(".pdf") > -1){ html += '<span class="doc_chat">'+ '<a href="'+path+''+data[i].atch+'"><i style="color:rgb(255, 0, 0);" class="fa fa-file-pdf-o"></i> '+data[i].atch+'</a>'+ '</span>'+ data[i].message; } else if(data[i].atch.indexOf(".doc") > -1){  html += '<span class="doc_chat">'+ '<a href="'+path+''+data[i].atch+'"><i style="color:rgb(0, 0, 255);" class="fa fa-file-word-o"></i> '+data[i].atch+'</a>'+ '</span>'+ data[i].message; } else if (data[i].atch.indexOf(".xls") > -1){  html += '<span class="doc_chat">'+ '<a target="_blank" href="'+path+''+data[i].atch+'"><i style="color:rgb(0, 255, 0);" class="fa fa-file-excel-o"></i> '+data[i].atch+'</a>'+ '</span>'+ data[i].message; } else {  html += '<span class="doc_chat">'+ '<a target="_blank" href="'+path+''+data[i].atch+'"><i style="color:rgb(0, 0, 0);" class="fa fa-question-circle"></i> '+data[i].atch+'</a>'+ '</span>'+ data[i].message; } } else {  html += data[i].message; } html += '<span class="msg_time_send">'+ ($.format.date(data[i].sent_date,"MMM d, HH:mm"))+ '</span>'+ '</div>'+   '</div>'; } } $('#show_chat').html(html); } }); } }); </script>
