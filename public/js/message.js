"undefined"==typeof public&&(public={}),public.message={option:{refreshTime:3,refreshCnt:1,refreshTimeDialogs:20,refreshTimeFriends:60},init:function(){if($('.dt-content .row [data-section="message-dialogs"] [data-group].active').length){history.pushState("",document.title,"/message");var t=$('.dt-content .row [data-section="message-dialogs"] [data-group].active').attr("data-group");public.message.list({group:t,action:"first"})}$('.dt-content .row [data-section="message-dialogs"]').on("click","[data-group]",function(){if(!$(this).hasClass("active")){$('.dt-content .row [data-section="message-dialogs"] [data-group].active').removeClass("active"),$(this).addClass("active"),$(window).width()<=767&&$('.quick-menu.d-md-none.active[data-toggle="msidebar-content"]').click();var t=$(this).attr("data-group");public.message.list({group:t,action:"first"})}}),$('.dt-content .row [data-section="message-friends"]').on("click",".dt-contact",function(){var e=!1,s=$(this).find(".dt-contact__info .dt-contact__title").html();$('.dt-content .row [data-section="message-dialogs"] [data-group]').each(function(){var t=$(this).find(".dt-contact__info .dt-contact__title .login").html();if(s==t){$('.dt-content .row [data-section="message-dialogs"] [data-group].active').removeClass("active"),$(this).addClass("active");var a=$(this).attr("data-group");return e=!0,$('.dt-content .compose-mail-box a[data-dismiss="compose"]').click(),$('.dt-content .row [role="tablist"] [aria-controls="tab-messages"]').click(),public.message.list({group:a,action:"first"}),!1}}),e||($('.dt-content .compose-mail-box input[name="login"]').val(s),$('.dt-content .row [data-open="compose"]').click(),$('.dt-content .compose-mail-box textarea[name="text"]').focus())}),$('[data-section="message-block"]').on("click",'[data-target="#message-abuse"]',function(){var t=$('.dt-content .row [data-section="message-dialogs"] [data-group].active .dt-contact__info .dt-contact__title').html();$("#message-abuse form .login").html(t)}),$("#form-message-claim").on("submit",function(){var t=$('.dt-content .row [data-section="message-dialogs"] [data-group].active').attr("data-group");public.message.claim({group:t})}),$('[data-section="message-block"]').on("click",'[data-action="blocked"]',function(){var t=$('.dt-content .row [data-section="message-dialogs"] [data-group].active').attr("data-group");public.message.blocked({group:t})}),$('[data-section="message-block"]').on("click",".new-message-view",function(){core.main.scrollInside($('[data-section="message-list"]').closest(".chat-scroll"),500),$('[data-section="message-block"] .new-message-view').slideUp(500)}),$('[data-section="message-block"]').on("click",'[data-section="message-list"] .dt-chat__item.history',function(){var t=$('.dt-content .row [data-section="message-dialogs"] [data-group].active').attr("data-group");public.message.list({group:t,action:"history",preloader:'[data-section="message-list"] .dt-chat__item.history'})}),$("#form-message-first").on("submit",function(){public.message.send({first:1,form:"#form-message-first"})}),$('[data-section="message-block"]').on("click","#form-message-new button",function(){public.message.send({form:"#form-message-new"})}),core.timeout.set(function(){public.message.dialogs()},1e3*public.message.option.refreshTimeDialogs,"message-dialogs"),core.timeout.set(function(){public.message.friends()},1e3*public.message.option.refreshTimeFriends,"message-friends")},claim:function(t){core.ajax({url:"/message/claim/group/"+t.group,ident:"claim",preloader:"#form-message-claim button",form:"#form-message-claim",success:function(t){return t&&t.error?swal({type:"error",text:t.error}):t&&t.success?($('#message-abuse [data-dismiss="modal"]').click(),$("#message-abuse textarea").val(""),swal({type:"success",text:t.success})):void 0}})},blocked:function(a){core.ajax({url:"/message/blocked/group/"+a.group,ident:"blocked",success:function(t){if(t&&t.error)return swal({type:"error",text:t.error});public.message.list({group:a.group,action:"first"})}})},friends:function(){core.ajax({url:"/message/friends",ident:"friends",success:function(t){if(t){var a="";for(var e in t)a+='\t\t\t\t\t\t\t<div class="dt-contact">\t\t\t\t\t\t\t\t<div class="dt-avatar-status mr-3">\t\t\t\t\t\t\t\t\t<img class="dt-avatar chat-avatar" src="'+(t[e].avatar?"/media/images/avatar/sm/"+t[e].avatar:"/public/account/assets/images/avatars/avatar-none.png")+'">\t\t\t\t\t\t\t\t\t<div class="dot-shape '+(t[e].online?"bg-success":"bg-primary")+' dot-shape-lg"></div>\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t<div class="dt-contact__info">\t\t\t\t\t\t\t\t\t<h4 class="dt-contact__title">'+t[e].login+'</h4>\t\t\t\t\t\t\t\t\t<p class="dt-contact__desc">'+(t[e].online?"online":"offline")+"</p>\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t";$('[data-section="message-friends"]').html(a)}},complete:function(){core.timeout.set(function(){public.message.friends()},1e3*public.message.option.refreshTimeFriends,"message-friends")}})},dialogs:function(s){s=s||{},core.ajax({url:"/message/dialogs",ident:"dialogs",success:function(t){if(t){s.group||(s.group=$('.dt-content .row [data-section="message-dialogs"] [data-group].active').attr("data-group"));var a="";for(var e in t)a+='\t\t\t\t\t\t\t<div class="dt-contact" data-group="'+t[e].group+'">\t\t\t\t\t\t\t\t<div class="dt-avatar-status mr-3">\t\t\t\t\t\t\t\t\t<img class="dt-avatar chat-avatar" src="'+("0"==t[e].group?"/public/account/assets/images/logo-symbol.png":t[e].avatar?"/media/images/avatar/sm/"+t[e].avatar:"/public/account/assets/images/avatars/avatar-none.png")+'">\t\t\t\t\t\t\t\t\t<div class="dot-shape '+(t[e].online?"bg-success":"bg-primary")+' dot-shape-lg"></div>\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t<div class="dt-contact__info">\t\t\t\t\t\t\t\t\t<h4 class="dt-contact__title">\t\t\t\t\t\t\t\t\t\t<span class="login">'+t[e].login+"</span>\t\t\t\t\t\t\t\t\t\t"+(t[e].new?'<span class="chat-new-message">new</span>':"")+'\t\t\t\t\t\t\t\t\t</h4>\t\t\t\t\t\t\t\t\t<p class="dt-contact__desc">'+(t[e].online?"online":"offline")+"</p>\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t";if($('[data-section="message-dialogs"]').html(a),s.group)$('.dt-content .row [data-section="message-dialogs"] [data-group="'+s.group+'"]').addClass("active"),$('.dt-content .row [data-section="message-dialogs"] [data-group].active .dt-avatar-status .dot-shape.bg-success').length?($('.dt-content .row [data-section="message-block"] .dt-module__header .dt-avatar-status .dot-shape').removeClass("bg-primary").addClass("bg-success"),$('.dt-content .row [data-section="message-block"] .dt-module__header .dt-avatar-info .d-inline-block').html(lang.online)):($('.dt-content .row [data-section="message-block"] .dt-module__header .dt-avatar-status .dot-shape').removeClass("bg-success").addClass("bg-primary"),$('.dt-content .row [data-section="message-block"] .dt-module__header .dt-avatar-info .d-inline-block').html(lang.offline))}},complete:function(){core.timeout.set(function(){public.message.dialogs()},1e3*public.message.option.refreshTimeDialogs,"message-dialogs")}})},list:function(o){switch(o.action){case"first":core.timeout.clear("message-new"),o.preloader='[data-section="message-block"]';break;case"new":core.timeout.clear("message-new");var t=$('[data-section="message-list"] .dt-chat__item[data-datetime]:last').attr("data-datetime");break;case"history":var a=$('[data-section="message-list"] .dt-chat__item[data-datetime]:first').attr("data-datetime")}core.ajax({url:"/message/list/group/"+o.group+"/action/"+o.action+"/first-datetime/"+(a||0)+"/last-datetime/"+(t||0),ident:"list"+o.action,preloader:o.preloader||!1,success:function(t){if(t)switch(o.action){case"first":var a="";a='\t\t\t\t\t\t\t<div class="dt-module__header">\t\t\t\t\t\t\t\t<div class="dt-avatar-wrapper">\t\t\t\t\t\t\t\t\t<div class="dt-avatar-status mr-2">\t\t\t\t\t\t\t\t\t\t<img class="dt-avatar size-45 chat-avatar" src="'+(t.user.system?"/public/account/assets/images/logo-symbol.png":t.user.avatar?"/media/images/avatar/sm/"+t.user.avatar:"/public/account/assets/images/avatars/avatar-none.png")+'">',t.user.online?a+='<div class="dot-shape bg-success dot-shape-lg"></div>':a+='<div class="dot-shape bg-primary dot-shape-lg"></div>',a+='\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t<span class="dt-avatar-info">\t\t\t\t\t\t\t\t\t\t<a href="'+(t.user.system?"javascript:void(0)":"/profile/"+t.user.login)+'" '+(t.user.system?"":'target="_blank"')+' class="dt-avatar-name fw-500">'+t.user.login+'</a>\t\t\t\t\t\t\t\t\t\t<span class="d-inline-block">'+(t.user.online?lang.online:lang.offline)+"</span>\t\t\t\t\t\t\t\t\t</span>\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t",t.user.system||(a+='\t\t\t\t\t\t\t\t\t<div class="dropdown ml-auto">\t\t\t\t\t\t\t\t\t\t<a class="dropdown-toggle no-arrow chat-menu" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars mr-2"></i><span class="fw-500">'+lang.menu+'</span></a>\t\t\t\t\t\t\t\t\t\t<div class="dropdown-menu dropdown-menu-right chat-dropdown">\t\t\t\t\t\t\t\t\t\t\t<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#message-abuse"><i class="fas fa-comment-alt-times"></i> '+lang.claim+'</a>\t\t\t\t\t\t\t\t\t\t\t<a class="dropdown-item" href="javascript:void(0)" data-action="blocked"><i class="fas fa-trash-alt"></i> '+(t["blocked-my"]?lang.unlock:lang.lock)+"</a>\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t"),a+='\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t<div class="dt-module__content ps-custom-scrollbar chat-scroll">\t\t\t\t\t\t\t\t<div class="dt-module__content-inner">\t\t\t\t\t\t\t\t\t<div class="dt-chat__conversation" data-section="message-list">\t\t\t\t\t\t',0<parseInt(t.left)&&(a+='<div class="dt-chat__item history">'+lang.more+"</div>"),t.list&&(a+=public.message.formText(t.list)),a+="\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t","0"!=o.group&&(t["blocked-my"]?a+='\t\t\t\t\t\t\t\t\t<form onsubmit="return false" id="form-message-new" class="add-comment-box ban-message">\t\t\t\t\t\t\t\t\t\t'+lang["you-block"]+"\t\t\t\t\t\t\t\t\t</form>\t\t\t\t\t\t\t\t":t["blocked-foreign"]?a+='\t\t\t\t\t\t\t\t\t<form onsubmit="return false" id="form-message-new" class="add-comment-box ban-message">\t\t\t\t\t\t\t\t\t\t'+lang["your-block"]+"\t\t\t\t\t\t\t\t\t</form>\t\t\t\t\t\t\t\t":a+='\t\t\t\t\t\t\t\t\t<form onsubmit="return false" id="form-message-new" class="add-comment-box">\t\t\t\t\t\t\t\t\t\t<input type="hidden" name="group" value="'+o.group+'">\t\t\t\t\t\t\t\t\t\t<div class="media">\t\t\t\t\t\t\t\t\t\t\t<img class="dt-avatar mr-2" src="'+(t.personal.avatar?"/media/images/avatar/sm/"+t.personal.avatar:"/public/account/assets/images/avatars/avatar-none.png")+'">\t\t\t\t\t\t\t\t\t\t\t<div class="media-body">\t\t\t\t\t\t\t\t\t\t\t\t<textarea name="text" class="form-control border-0 shadow-none bg-focus" rows="1" placeholder="'+lang["enter-text"]+'" minlength="3" maxlength="255"></textarea>\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t<button class="btn btn-primary chat-btn" type="button"><i class="fas fa-paper-plane"></i> '+lang.sended+"</button>\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t</form>\t\t\t\t\t\t\t\t"),a+='<div class="new-message-view">'+lang["new-message"]+"</div>",$('[data-section="message-block"]').html(a),$(".ps-custom-scrollbar").each(function(){new PerfectScrollbar(this,{wheelPropagation:!0,useBothWheelAxes:!0})}),core.main.scrollInside($('[data-section="message-list"]').closest(".chat-scroll"),500),$('[data-section="message-block"] .dt-module__content.chat-scroll').off("scroll").on("scroll",function(){var t=$('[data-section="message-list"]').closest(".chat-scroll");t.height()+t.scrollTop()+100>=t.prop("scrollHeight")&&$('[data-section="message-block"] .new-message-view').slideUp(500),0==t.scrollTop()&&$('[data-section="message-list"] .dt-chat__item.history').length&&public.message.list({group:o.group,action:"history",preloader:'[data-section="message-list"] .dt-chat__item.history'})}),$('.dt-content .row [data-section="message-dialogs"] [data-group="'+o.group+'"] .chat-new-message').fadeOut(500,function(){$(this).remove()}),$("#form-message-new textarea").focus(),t["blocked-my"]||t["blocked-foreign"]||core.timeout.set(function(){public.message.list({group:o.group,action:"new",preloader:!1})},1e3*public.message.option.refreshTime,"message-new");break;case"new":if(public.message.option.refreshTime=3,public.message.option.refreshCnt=1,t.list)(e=$('[data-section="message-list"]').closest(".chat-scroll")).height()+e.scrollTop()>=e.prop("scrollHeight")?(o.volume="off",setTimeout(function(){core.main.scrollInside(e,500)},100)):$('[data-section="message-block"] .new-message-view').slideDown(500),$('[data-section="message-list"]').append(public.message.formText(t.list)),"off"!=o.volume&&parseInt(t.sound)&&parseInt(t["sound-message"])&&$("#message-audio")[0].play();break;case"history":if(t.list){var e,s=(e=$('[data-section="message-list"]').closest(".chat-scroll")).prop("scrollHeight");$('[data-section="message-list"] .dt-chat__item.history').remove(),$('[data-section="message-list"]').prepend(public.message.formText(t.list)),0<parseInt(t.left)&&$('[data-section="message-list"]').prepend('<div class="dt-chat__item history">'+lang.more+"</div>"),e.scrollTop(e.prop("scrollHeight")-s)}}else"new"==o.action?(++public.message.option.refreshCnt,20<=public.message.option.refreshCnt?public.message.option.refreshTime=12:15<=public.message.option.refreshCnt?public.message.option.refreshTime=9:10<=public.message.option.refreshCnt?public.message.option.refreshTime=7:3<=public.message.option.refreshCnt&&(public.message.option.refreshTime=5)):"history"==o.action&&$('[data-section="message-list"] .dt-chat__item.history').remove()},complete:function(){"new"==o.action&&core.timeout.set(function(){public.message.list({group:o.group,action:"new",preloader:!1})},1e3*public.message.option.refreshTime,"message-new")}})},formText:function(t){var a="";for(var e in t)a+='\t\t\t\t<div class="dt-chat__item'+(t[e].reply?" reply":"")+'" data-datetime="'+t[e].datetime+'">\t\t\t\t\t<div>\t\t\t\t\t\t<div class="dt-chat__message-wrapper">\t\t\t\t\t\t\t<div class="dt-chat__message">\t\t\t\t\t\t\t\t'+t[e].text+'\t\t\t\t\t\t\t</div>\t\t\t\t\t\t</div>\t\t\t\t\t\t<div class="dt-avatar-wrapper mb-2 mt-1 d-flex">\t\t\t\t\t\t\t<div class="dt-avatar-status">\t\t\t\t\t\t\t\t<img class="dt-avatar chat-avatar" src="'+(void 0===t[e]["users-id-from"]?"/public/account/assets/images/logo-symbol.png":t[e]["from-avatar"]?"/media/images/avatar/sm/"+t[e]["from-avatar"]:"/public/account/assets/images/avatars/avatar-none.png")+'">\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t<span class="dt-avatar-info">\t\t\t\t\t\t\t\t<span class="text-dark fw-500">'+t[e].login+'</span>\t\t\t\t\t\t\t\t<span class="chat-time d-inline-block">'+t[e]["datetime-display"]+"</span>\t\t\t\t\t\t\t</span>\t\t\t\t\t\t</div>\t\t\t\t\t</div>\t\t\t\t</div>\t\t\t";return a},send:function(s){core.timeout.clear("message-new");var t=$('.dt-content .row [data-section="message-dialogs"] [data-group].active').attr("data-group"),a=$('[data-section="message-list"] .dt-chat__item[data-datetime]:last').attr("data-datetime");core.ajax({url:"/message/send/first/"+(s.first||0)+"/last-datetime/"+(a||0),ident:"send",preloader:s.form+" button",form:s.form,success:function(t){if(t&&t.error)return swal({type:"error",text:t.error});if(t&&t.balance)for(var a in t.balance)$('[data-balance="'+a+'"]').html(core.main.num(t.balance[a],2,"."));if(s.first)$('.dt-content .compose-mail-box input[name="login"], .dt-content .compose-mail-box textarea[name="text"]').val(""),$('.compose-mail-box [data-dismiss="compose"]').click(),$('.dt-content .row [role="tablist"] [aria-controls="tab-messages"]').click(),public.message.dialogs({group:t.group}),public.message.list({group:t.group,action:"first"});else{if(t.list){var e=$('[data-section="message-list"]').closest(".chat-scroll");setTimeout(function(){core.main.scrollInside(e,500)},100),$('[data-section="message-list"]').append(public.message.formText(t.list))}$(s.form+' textarea[name="text"]').val("")}public.message.friends()},complete:function(){!s.first&&t&&(public.message.option.refreshTime=3,public.message.option.refreshCnt=1,core.timeout.set(function(){public.message.list({group:t,action:"new",preloader:!1})},1e3*public.message.option.refreshTime,"message-new"))}})}},$(document).ready(function(){public.message.init()});