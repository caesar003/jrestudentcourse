$(document).ready(function(){
  var today = $.format.date(new Date(), "yyyy-MM-dd");
    $('#mystudents').dataTable({
      "ajax" :{
        "url": `${u}/student/student_data`,
        "dataSrc":""
      },
      "columns":[
        {
          "data" : {grp:"grp",pin: "pin", complete_name: "complete_name", nick_name:"nick_name", address: "address", place_of_birth: "place_of_birth", date_of_birth: "date_of_birth", phone: "phone",cnst2:"cnst2",nnst2:"nnst2",adrst2:"adrst2",pobst2:"pobst2",dobst2:"dobst2",phst2:"phst2",cnst3:"cnst3",nnst3:"nnst3",adrst3:"adrst3",pobst3:"pobst3",dobst3:"dobst3",phst3:"phst3",cnst4:"cnst4",nnst4:"nnst4",adrst4:"adrst4",pobst4:"pobst4",dobst4:"dobst4",phst4:"phst4",program: "program", program_duration: "program_duration", starting_date: "starting_date", reason: "reason", target: "target", difficulties: "difficulties", bground: "bground", self_introduction: "self_introduction", weakness_point: "weakness_point", action_plan: "action_plan", fsp: "fsp"},
          "render" : function(data,meta,row){
            return `<a style="color:black;text-decoration:none;" href="${u}/student_single?pin=${data.pin}">${data.pin}</a> <a title="Edit" href="javascript:void(0);" class="item_edit tooltip-bottom" data-grp="${data.grp}" data-pn="${data.pin}" data-cn="${data.complete_name}"data-nn="${data.nick_name}" data-ad="${data.address}" data-pb="${data.place_of_birth}"data-db="${($.format.date(data.date_of_birth, "yyyy-MM-dd"))}"data-ph="${data.phone}"data-cnst2="${data.cnst2}"data-nnst2="${data.nnst2}"data-adrst2="${data.adrst2}"data-pobst2="${data.pobst2}"data-dobst2="${($.format.date(data.dobst2, "yyyy-MM-dd"))}"data-phst2="${data.phst2}"data-cnst3="${data.cnst3}"data-nnst3="${data.nnst3}"data-adrst3="${data.adrst3}"data-pobst3="${data.pobst3}"data-dobst3="${($.format.date(data.dobst3, "yyyy-MM-dd"))}"data-phst3="${data.phst3}"data-cnst4="${data.cnst4}"data-nnst4="${data.nnst4}"data-adrst4="${data.adrst4}"data-pobst4="${data.pobst4}"data-dobst4="${($.format.date(data.dobst4, "yyyy-MM-dd"))}"data-phst4="${data.phst4}"data-pr="${data.program}"data-pd="${data.program_duration}"data-sd="${($.format.date(data.starting_date, "yyyy-MM-dd"))}" data-re="${data.reason}"data-ta="${data.target}"data-di="${data.difficulties}"data-bg="${data.bground}"data-si="${data.self_introduction}"data-wp="${data.weakness_point}"data-ap="${data.action_plan}"data-fsp="${data.fsp}"><i style="font-size:14px;" class="fas fa-user-edit fa-fw"></i></a>`;
          }
        },
        {
          "data" : {pin:"pin", grp:"grp", complete_name:"complete_name", cnst2:"cnst2", cnst3:"cnst3", cnst4:"cnst4"},
          "render":function(data,type,row){
            if(data.grp!=''){
             if(data.cnst2!=''&&data.cnst3!=''&&data.cnst4!=''){
               return `<a href="${u}/student_single?pin=${data.pin}" class="tooltip-bottom" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3} - ${data.cnst4}"> ${data.grp} </a>`;
              } else if(data.cnst2!=''&&data.cnst3!=''){
                return `<a href="${u}/student_single?pin=${data.pin}" class="tootip-bottom" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}"> ${data.grp} </a>`;

              } else{
                return `<a href="${u}/student_single?pin=${data.pin}" title="${data.complete_name} - ${data.cnst2}" class="tooltip-bottom"> ${data.grp} </a>`;
              }
            } else {
              if(data.cnst2!=''){
                if(data.cnst3!=''){
                  if(data.cnst4!=''){
                    return `<a href="${u}/student_single?pin=${data.pin}" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}-${data.cnst4}">${data.complete_name}</a>`;
                  } else {
                    return `<a href="${u}/student_single?pin=${data.pin}" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}">${data.complete_name}</a>`;
                  }
                } else{
                  return `<a href="${u}/student_single?pin=${data.pin}" title="${data.complete_name} - ${data.cnst2}">${data.complete_name}</a>`;
                }
              } else {
                return `<a href="${u}/student_single?pin=${data.pin}">${data.complete_name}</a>`;
              }
            }
          }
        },
        {
         "data" : {pin:"pin", complete_name:"complete_name", cnst2:"cnst4", cnst3:"cnst3", cnst4:"cnst4", nick_name:"nick_name", nnst2:"nnst2", nnst3:"nnst3", nnst4:"nnst4"},
          "render" :function(data,type,row){
            if(data.cnst2!=''){
              if(data.cnst3!=''){
                if(data.cnst4!=''){
                  return `<a href="${u}/student_single?pin=${data.pin}"> ${data.nick_name} -${data.nick_name} - ${data.nnst2} - ${data.cnst3} - ${data.cnst4} </a>`;
                } else {
                  return `<a href="${u}/student_single?pin=${data.pin}"> ${data.nick_name} - ${data.nnst2}- ${data.nnst3} </a>`;
                }
              }else {
                return `<a href="${u}/student_single?pin=${data.pin}"> ${data.nick_name} - ${data.nnst2} </a>`;
              }
            } else {
              return `<a href="${u}/student_single?pin=${data.pin}">${data.nick_name}</a>`;
            }
          }
        },
        {
          "data" : {pin:"pin",address:"address",adrst2:"adrst2",adrst3:"adrst3",adrst4:"adrst4"},
          "render":function(data,type,row){
            if(data.adrst2==''){
              return `<a href="${u}/student_single?pin=${data.pin}">${data.address}</a>`;
            } else{
              if(data.adrst3==''){
                return `<a href="${u}/student_single?pin=${data.pin}" title="${data.address} || ${data.adrst2}">${data.address.substr(0,15)}.....</a>`;
              } else {
                if (data.adrst4==''){
                  return `<a href="${u}/student_single?pin=${data.pin}" title="${data.address} || ${data.adrst2} || ${data.adrst3}">${data.address.substr(0,15)}.....</a>`;
                } else {
                  return `<a href="${u}/student_single?pin=${data.pin}" title="${data.address} || ${data.adrst2} || ${ data.adrst3} || ${data.adrst4}">${data.address.substr(0,15)}.....</a>`;
                }
              }
            }
          }
        },
        {
          "data" :{pin:"pin",cnst2:"cnst2",cnst3:"cnst3",cnst4:"cnst4",date_of_birth:"date_of_birth",dobst2:"dobst2",dobst3:"dobst3",dobst4:"dobst4",},
          "render" : function (data, type, row){
            if(data.cnst2==''){
              return `<a href="${u}/student_single?pin=${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")}`;
            } else {
              if(data.cnst3==''){
                return `<a href="${u}/student_single?pin=${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")}`;
              } else {
                if(data.cnst4==''){
                  return `<a href="${u}/student_single?pin=${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")} - ${$.format.date(data.dobst3, "MMM/dd/yyyy")}`;
                } else {
                  return `<a href="${u}/student_single?pin=${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")} - ${$.format.date(data.dobst3, "MMM/dd/yyyy")} - ${$.format.date(data.dobst4, "MMM/dd/yyyy")}` ;
                }
              }
            }
          }
        },
        {
          "data" : {pin:"pin",phone:"phone",phst2:"phst2",phst3:"phst3",phst4:"phst4"},
          "render": function(data,type,row){
            if(data.phst2==''){
              return `<a href="${u}/student_single?pin=${data.pin}">${data.phone}`;
            } else{
              if(data.phst3==''){
                return `<a href="${u}/student_single?pin=${data.pin}">${data.phone} - ${data.phst2}`;
              } else {
                if(data.phst4==''){
                  return `<a href="${u}/student_single?pin=${data.pin}">${data.phone} - ${data.phst2} - ${data.phst3}`;
                } else {
                  return `<a href="${u}/student_single?pin=${data.pin}">${data.phone} - ${data.phst2} - ${data.phst3} -${data.phst4}`;
                }
              }
            }
          }
        },
        {
          "data" : {pin:"pin", program:"program"},
          "render" : function(data, meta, row){
            return `<a href="${u}/student_single?pin=${data.pin}">${data.program}</a>`
          }
        },
        {
          "data" : {pin:"pin", starting_date:"starting_date"},
          "render" : function (data, type, row){
            return `<a href="${u}/student_single?pin=${data.pin}">${$.format.date(data.starting_date, "MMM/dd/yyyy")}</a>`;
          }
        },
        {
          "data" : {pin:"pin", bground:"bground"},
          "render" : function (data, type, row, meta){
            if(data.length>20){
              return `<a href="${u}/student_single?pin=${data.pin}" title="${data.bground}">${data.bground.substr(0,15)}...</a>`;
            } else {
              return `<a href="${u}/student_single?pin=${data.pin}">${data.bground}</a>`
            }
          }
        }
      ]
    });
  $('#myaft').dataTable({
    "ajax" : {
      "url" : `${u}/student/after_teaching_data`,
      "dataSrc" : ""
    },
  "columns" :
    [
      {
          "data" : "pin",
          "render" : function(data, meta, row){
            return `<a href="${u}/student_single?pin=${data}">${data}</a>`
          }
      },

      {
          "data" : {pin:"pin",grp:"grp",complete_name:"complete_name",cnst2:"cnst2",cnst3:"cnst3",cnst4:"cnst4"},
          "render":function(data,type,row){
            if(data.grp!=''){
             if(data.cnst2!=''&&data.cnst3!=''&&data.cnst4!=''){
                return `<a href="${u}/student_single?pin=${data.pin}" class="tooltip-bottom" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3} - ${data.cnst4}">${data.grp}</a>`;
              } else if(data.cnst2!=''&&data.cnst3!=''){
                return `<a href="${u}/student_single?pin=${data.pin}" class="tootip-bottom" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}">${data.grp}</a>`;
              } else{
                return `<a title="${data.complete_name} - ${data.cnst2}" class="tooltip-bottom" href="${u}/student_single?pin=${data.pin}"> ${data.grp}</a>`;
              }
            } else {
              if(data.cnst2!=''){
                if(data.cnst3!=''){
                  if(data.cnst4!=''){
                    return `<a href="${u}/student_single?pin=${data.pin}" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}-${data.cnst4}">${data.complete_name}</a>`;
                  } else {
                    return `<a href="${u}/student_single?pin=${data.pin}" title="${data.complete_name} - ${data.cnst2} - ${data.cnst3}">${data.complete_name}</a>`;
                  }
                } else{
                  return `<a href="${u}/student_single?pin=${data.pin}" title="${data.complete_name} - ${data.cnst2}">${data.complete_name}</a>`;
                }
              } else {
                return `<a href="${u}/student_single?pin=${data.pin}">${data.complete_name}</a>`;
              }
            }
          }
        },
       {
         "data" : {pin:"pin", complete_name:"complete_name", cnst2:"cnst4", cnst3:"cnst3", cnst4:"cnst4", nick_name:"nick_name", nnst2:"nnst2", nnst3:"nnst3", nnst4:"nnst4"},
          "render" :function(data,type,row){
            if(data.cnst2!=''){
              if(data.cnst3!=''){
                if(data.cnst4!=''){
                  return `<a href="${u}/student_single?pin=${data.pin}"> ${data.nick_name} -${data.nick_name} - ${data.nnst2} - ${data.cnst3} - ${data.cnst4} </a>`;
                } else {
                  return `<a href="${u}/student_single?pin=${data.pin}"> ${data.nick_name} - ${data.nnst2}- ${data.nnst3} </a>`;
                }
              }else {
                return `<a href="${u}/student_single?pin=${data.pin}"> ${data.nick_name} - ${data.nnst2} </a>`;
              }
            } else {
              return `<a href="${u}/student_single?pin=${data.pin}">${data.nick_name}</a>`;
            }
          }
       },

      {
          "data" : {pin:"pin",address:"address",adrst2:"adrst2",adrst3:"adrst3",adrst4:"adrst4"},
          "render":function(data,type,row){
            if(data.adrst2==''){
              return `<a href="${u}/student_single?pin=${data.pin}">${data.address}</a>`;
            } else{
              if(data.adrst3==''){
                return `<a href="${u}/student_single?pin=${data.pin}" title="${data.address} || ${data.adrst2}">${data.address.substr(0,15)}.....</a>`;
              } else {
                if (data.adrst4==''){
                  return `<a href="${u}/student_single?pin=${data.pin}" title="${data.address} || ${data.adrst2} || ${data.adrst3}">${data.address.substr(0,15)}.....</a>`;
                } else {
                  return `<a href="${u}/student_single?pin=${data.pin}" title="${data.address} || ${data.adrst2} || ${ data.adrst3} || ${data.adrst4}">${data.address.substr(0,15)}.....</a>`;
                }
              }
            }
          }
        },
      {
          "data" :{pin:"pin",cnst2:"cnst2",cnst3:"cnst3",cnst4:"cnst4",date_of_birth:"date_of_birth",dobst2:"dobst2",dobst3:"dobst3",dobst4:"dobst4",},
          "render" : function (data, type, row){

            if(data.cnst2==''){
              return `<a href="${u}/student_single?pin=${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")}`;
            } else {
              if(data.cnst3==''){
                return `<a href="${u}/student_single?pin=${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")}`;
              } else {
                if(data.cnst4==''){
                  return `<a href="${u}/student_single?pin=${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")} - ${$.format.date(data.dobst3, "MMM/dd/yyyy")}`;
                } else {
                  return `<a href="${u}/student_single?pin=${data.pin}">${$.format.date(data.date_of_birth, "MMM/dd/yyyy")} - ${$.format.date(data.dobst2, "MMM/dd/yyyy")} - ${$.format.date(data.dobst3, "MMM/dd/yyyy")} - ${$.format.date(data.dobst4, "MMM/dd/yyyy")}` ;
                }
              }
            }
          }
        },

      {
          "data" : {pin:"pin",phone:"phone",phst2:"phst2",phst3:"phst3",phst4:"phst4"},
          "render": function(data,type,row){
            if(data.phst2==''){
              return `<a href="${u}/student_single?pin=${data.pin}">${data.phone}`;
            } else{
              if(data.phst3==''){
                return `<a href="${u}/student_single?pin=${data.pin}">${data.phone} - ${data.phst2}`;
              } else {
                if(data.phst4==''){
                  return `<a href="${u}/student_single?pin=${data.pin}">${data.phone} - ${data.phst2} - ${data.phst3}`;
                } else {
                  return `<a href="${u}/student_single?pin=${data.pin}">${data.phone} - ${data.phst2} - ${data.phst3} -${data.phst4}`;
                }
              }
            }
          }
        },

      {
          "data" : {pin:"pin", program:"program"},
          "render" : function(data, meta, row){
            return `<a href="${u}/student_single?pin=${data.pin}">${data.program}</a>`
          }
        },

      {
          "data" : {pin:"pin", starting_date:"starting_date"},
          "render" : function (data, type, row){
            return `<a href="${u}/student_single?pin=${data.pin}">${$.format.date(data.starting_date, "MMM/dd/yyyy")}</a>`;
          }
        },
      {
          "data" : {pin:"pin", bground:"bground"},
          "render" : function (data, type, row, meta){
            if(data.length>20){
              return `<a href="${u}/student_single?pin=${data.pin}" title="${data.bground}">${data.bground.substr(0,15)}...</a>`;
            } else {
              return `<a href="${u}/student_single?pin=${data.pin}">${data.bground}</a>`
            }

          }
        }

      ]
  });
  $('#new_student_button').on('click', function(){
    $('#nsm').modal('show');
    $('[name="starting_date"]').val(today);
    $('#add_one').on('click',function(){
      $('#group_name,#student2').fadeIn('slow');
      $('#remove_three').on('click', function(){
        $('#group_name,#student2,#student3,#student4').fadeOut('slow');
         $('#cnst2,#nnst2,#adrst2,#pbst2,#dbst2,#phst2,#cnst3,#nnst3,#adrst3,#pbst3,#dbst3,#phst3,#cnst4,#nnst4,#adrst4,#pbst4,#dbst4,#phst4').val("");
      });
      $('#add_two').on('click',function(){
        $('#student3').fadeIn('slow');
        $('#remove_two').on('click', function(){
          $('#student3,#student4').fadeOut('slow');
        });
        $('#add_three').on('click', function(){
          $('#student4').fadeIn('slow');
          $('#remove_one').on('click', function(){
            $('#student4').fadeOut('slow');
          });
        });
      })
    });
  });
  $('input, select, textarea').on('focus', function(){
    $(this).css('background-color', 'white');
    $('#nsf, #esf').removeClass("alert alert-danger");
    $('#nsf, #esf').html("");
  });
  $('#save_student_btn').on('click',function(){
    var bck = 'background-color',
        clr ='#fbe2e6',
        grp = $('#grp').val(),
        pn=$('#pn').val(),
        cn=$('#cn').val(),
        nn=$('#nn').val(),
        ad=$('#ad').val(),
        pb=$('#pb').val(),
        db=$('#db').val(),
        ph=$('#ph').val(),
        cn2=$('#cnst2').val(),
        nn2=$('#nnst2').val(),
        ad2=$('#adrst2').val(),
        pb2=$('#pbst2').val(),
        db2=$('#dbst2').val(),
        ph2=$('#phst2').val(),
        cn3=$('#cnst3').val(),
        nn3=$('#nnst3').val(),
        ad3=$('#adrst3').val(),
        pb3=$('#pbst3').val(),
        db3=$('#dbst3').val(),
        ph3=$('#phst3').val(),
        cn4=$('#cnst4').val(),
        nn4=$('#nnst4').val(),
        ad4=$('#adrst4').val(),
        pb4=$('#pbst4').val(),
        db4=$('#dbst4').val(),
        ph4=$('#phst4').val(),
        pr=$('#pr').val(),
        pd=$('#pd').val(),
        sd=$('#sd').val(),
        re=$('#re').val(),
        ta=$('#ta').val(),
        di=$('#di').val(),
        bg=$('#bg').val(),
        si=$('#si').val(),
        wp=$('#wp').val(),
        ap=$('#ap').val();
    if (pn==''|| cn==''||ad==''||db==''||ph==''||pr==''||pd==''){
      $('#nsf').addClass('alert alert-danger');
      $('#nsf').html('Please fill out all required fields');
      if (pn=='') {$('#pn').css(bck, clr);}
      if (cn=='') {$('#cn').css(bck, clr);}
      if(ad==''){$('#ad').css(bck, clr);}
      if (db==''){$('#db').css(bck, clr);}
      if (ph==''){$('#ph').css(bck, clr);}
      if(pr==''){$('#pr').css(bck, clr);}
      if (pd=='') {
        $('#pd').css(bck, clr);
      }
    }else{
      if (isNaN(pn)){
        $('#nsf').addClass('alert alert-danger');
        $('#nsf').html('pin can only consist of number');
        $('#pn').css(bck, clr);
      }else{
        if (isNaN(ph)){
          $('#nsf').addClass('alert alert-danger');
          $('#nsf').html('phone can only consist of number');
          $('#ph').css(bck, clr);
        }else{
          if (isNaN(pd)){
            $('#nsf').addClass('alert alert-danger');
            $('#nsf').html('Program duration only consist of number');
            $('#pd').css(bck, clr);
          } else {
            if ($('#student2').css('display')==='block'){
              if(cn2 == ''||ad2==''||db2==''||ph2==''){
                $('#nsf').addClass('alert alert-danger');
                $('#nsf').html('Please fill out all required fields');
                if(cn2==''){$('#cnst2').css(bck,clr);}
                if(ad2==''){$('#adrst2').css(bck,clr);}
                if(db2==''){$('#dbst2').css(bck,clr);}
                if(ph2==''){$('#phst2').css(bck,clr);}
              } else {
                if(isNaN(ph2)){
                  $('#nsf').addClass('alert alert-danger');
                  $('#nsf').html('Phone must only be numbers');
                  $('#phst2').css(bck,clr);
                } else {
                  if($('#student3').css('display')==='block'){
                    if(cn3 == ''||ad3==''||db3==''||ph3==''){
                      $('#nsf').addClass('alert alert-danger');
                      $('#nsf').html('Please fill out all required fields');
                      if(cn3==''){$('#cnst3').css(bck,clr);}
                      if(ad3==''){$('#adrst3').css(bck,clr);}
                      if(db3==''){$('#dbst3').css(bck,clr);}
                      if(ph3==''){$('#phst3').css(bck,clr);}
                    } else {
                      if(isNaN(ph3)){
                        $('#nsf').addClass('alert alert-danger');
                        $('#nsf').html('Phone must only be numbers');
                        $('#phst3').css(bck,clr);
                      } else{
                        if($('#student4').css('display')==='block'){
                          if(cn4 == ''||ad4==''||db4==''||ph4==''){
                            $('#nsf').addClass('alert alert-danger');
                            $('#nsf').html('Please fill out all required fields');
                            if(cn4==''){$('#cnst4').css(bck,clr);}
                            if(ad4==''){$('#adrst4').css(bck,clr);}
                            if(db4==''){$('#dbst4').css(bck,clr);}
                            if(ph4==''){$('#phst4').css(bck,clr);}
                          } else {
                            if(isNaN(ph4)){
                              $('#nsf').addClass('alert alert-danger');
                              $('#nsf').html('Phone must only be numbers');
                              $('#phst4').css(bck,clr);
                            } else{
                              check_pin(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap);
                              }
                          }
                        } else {
                          cn4=nn4=ad4=pb4=db4=ph4='';
                          check_pin(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap);
                        }
                      }
                    }
                  } else{
                    cn3=nn3=ad3=pb3=db3=ph3=cn4=nn4=ad4=pb4=db4=ph4='';
                    check_pin(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap);
                  }
                }
              }
            } else{
              cn2=nn2=ad2=pb2=db2=ph2=cn3=nn3=ad3=pb3=db3=ph3=cn4=nn4=ad4=pb4=db4=ph4='';
              check_pin(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap);
            }
          }
        }
      }
    }
    return false;
  });
  function check_pin(grp, pn, cn, nn, ad, pb, db, ph, cn2, nn2, ad2, pb2, db2, ph2, cn3, nn3, ad3, pb3, db3, ph3, cn4, nn4, ad4, pb4, db4, ph4, pr, pd, sd, re, ta, di, bg, si, wp, ap){
    var bck = 'background-color',
        clr ='#fbe2e6';
    $.ajax({
      url: `${u}/student/pin_availability`,
      type: 'post',
      data:{pin:pn},
      success: function(response){
        if (response=='true' ){
          $('#nsf').addClass('alert alert-danger');
          $('#nsf').html('pin is already used');
          $('#pn').css(bck, clr);
        }else{
         submit_student(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap);
        }
      }
    });
  }
  function submit_student(grp,pn,cn,nn,ad,pb,db,ph,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap){
    $.ajax({
      type : "POST",
      url : `${u}/student/save`,
      dataType : "JSON",
      data:{grp:grp,pn:pn,cn:cn,nn:nn,ad:ad,pb:pb,db:db,ph:ph,cn2:cn2,nn2:nn2,ad2:ad2,pb2:pb2,db2:db2,ph2:ph2,cn3:cn3,nn3:nn3,ad3:ad3,pb3:pb3,db3:db3,ph3:ph3,cn4:cn4,nn4:nn4,ad4:ad4,pb4:pb4,db4:db4,ph4:ph4,pr:pr,pd:pd,sd:sd,re:re,ta:ta,di:di,bg:bg,si:si,we:wp,ap:ap},
      success: function(data){
        $('[name="pn"]').val("");
        $('[name="cn"]').val("");
        $('[name="nn"]').val("");
        $('[name="ad"]').val("");
        $('[name="pb"]').val("");
        $('[name="db"]').val("");
        $('[name="ph"]').val("");
        $('[name="pr"]').val("");
        $('[name="pd"]').val("");
        $('[name="sd"]').val(today);
        $('[name="re"]').val("");
        $('[name="ta"]').val("");
        $('[name="di"]').val("");
        $('[name="bg"]').val("");
        $('[name="si"]').val("");
        $('[name="wp"]').val("");
        $('[name="ap"]').val("");
        $('#nsm').modal('hide');
        $('#mystudents').DataTable().ajax.reload();
      }
    });
  }
  $('#show_data').on('click','.item_edit',function(){
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
      $('#group_name_e,#student2_e,#student3_e,#student4_e').css('display', 'none');
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
    var bck = 'background-color',clr = '#fbe2e6', pn=$('#pn_e').val(), cn=$('#cn_e').val(), nn=$('#nn_e').val(), ad=$('#ad_e').val(), pb=$('#pb_e').val(), db=$('#db_e').val(), ph=$('#ph_e').val(), grp=$('#grp_e').val(), cn2=$('#cnst2_e').val(), nn2=$('#nnst2_e').val(), ad2=$('#adrst2_e').val(), pb2=$('#pbst2_e').val(), db2=$('#dbst2_e').val(), ph2=$('#phst2_e').val(), cn3=$('#cnst3_e').val(), nn3=$('#nnst3_e').val(), ad3=$('#adrst3_e').val(), pb3=$('#pbst3_e').val(), db3=$('#dbst3_e').val(), ph3=$('#phst3_e').val(), cn4=$('#cnst4_e').val(), nn4=$('#nnst4_e').val(), ad4=$('#adrst4_e').val(), pb4=$('#pbst4_e').val(), db4=$('#dbst4_e').val(), ph4=$('#phst4_e').val(),  pr=$('#pr2').val(), pd=$('#pd2').val(), sd=$('#sd2').val(), re=$('#re2').val(), ta=$('#ta2').val(), di=$('#di2').val(), bg=$('#bg2').val(), si=$('#si2').val(), wp=$('#wp2').val(), ap=$('#ap2').val(), fsp='';
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
                          update_student(pn,cn,nn,ad,pb,db,ph,grp,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap,fsp);
                        }
                      }
                    } else {
                      cn4 = nn4 = pb4 = ad4 = ph4 = db4 = '';
                     update_student(pn,cn,nn,ad,pb,db,ph,grp,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap,fsp);
                    }
                  }
                }
              } else {
                cn3=nn3=pb3=ad3=ph3=db3=cn4=nn4=pb4=ad4=ph4=db4='';
               update_student(pn,cn,nn,ad,pb,db,ph,grp,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap,fsp);
              }
            }
          }
        } else {
          cn2=nn2=pb2=ad2=ph2=db2=cn3=nn3=pb3=ad3=ph3=db3=cn4=nn4=pb4=ad4=ph4=db4='';
         update_student(pn,cn,nn,ad,pb,db,ph,grp,cn2,nn2,ad2,pb2,db2,ph2,cn3,nn3,ad3,pb3,db3,ph3,cn4,nn4,ad4,pb4,db4,ph4,pr,pd,sd,re,ta,di,bg,si,wp,ap,fsp);
        }
      }
    }
  }
});
  function update_student(pn, cn, nn, ad, pb, db, ph, grp,cn2, nn2, ad2, pb2, db2, ph2, cn3, nn3, ad3, pb3, db3,ph3, cn4, nn4, ad4, pb4, db4, ph4, pr, pd, sd, re, ta, di, bg, si, wp, ap, fsp)
  {
    $.ajax({
      type : "post",
      url: `${u}/student/update`,
      dataType : "json",
      data : {pn:pn,cn:cn,nn:nn,ad:ad,pb:pb,db:db,ph:ph,grp,cn2:cn2,nn2:nn2,ad2:ad2,pb2:pb2,db2:db2,ph2:ph2,cn3:cn3,nn3:nn3,ad3:ad3,pb3:pb3,db3:db3,ph3:ph3,cn4:cn4,nn4:nn4,ad4:ad4,pb4:pb4,db4:db4,ph4:ph4,pr:pr,pd:pd,sd:sd,re:re,ta:ta,di:di,bg:bg,si:si,wp:wp,ap:ap,fsp:fsp},
      success : function(data){
        $('#esm').modal('hide');
        $('#mystudents').DataTable().ajax.reload();
      }
    });
  }
});
