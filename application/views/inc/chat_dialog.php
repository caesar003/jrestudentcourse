<span id="chat_button">
  <i id="chat_button_icon" style="color:rgba(0, 126, 255, 0.69);" class="fas fa-comment-alt fa-5x"></i>
    <span id="show_notification"><i style="color:red;" class="fa fa-asterisk fa-fw"></i></span>
</span>         
        <div class="card" id="chat_window">
            <div class="card-header" id="chat_window_header">
              Chat
              <span id="scroll_chat_content"><i class="fa fa-chevron-down"></i></span>
              <span id="close_chat_window"><i class="fa fa-times"></i>
  			 </span>
            </div>
            <div class="card-body" id="show_chat">
            </div>
            <div class="card-footer" id="chat_window_footer">
              <form autocomplete="off" id="chat_form">
                <input type="hidden" name="sender" id="sender" value="<?php echo $this->session->userdata('id');?>">
                <input type="file" name="file" id="file">
                <span id="filename"></span>
                <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="atch_btn">
                        <label id="atch_label" for="file"><i class="fa fa-paperclip"></i></label>
                      </span>
                  </div>
                  <input type="text" name="message" id="message" class="form-control" placeholder="Type something ...">
                    <div class="input-group-append">
                      <span class="input-group-text" id="btn_upload">
                        <i class="fa fa-location-arrow"></i>
                      </span>
                    </div>
                </div>    
              </form> 
            </div>
          </div>
<!-- EDIT STUDENT FORM -->
    <form>
      <div class="modal fade" id="image_chat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
        <div class="modal-dialog modal-lg" role="document"> 
          <div class="modal-content edit"> 
            <div class="modal-header"> 
              <h5 class="modal-title" id="exampleModalLabel">Picture</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> 
            </div>
            <div class="modal-body" id="chat_modal_body"> 
              
            </div>
            
          </div>
        </div>
      </div>
    </form>
    <!-- END EDIT STUDENT FORM -->