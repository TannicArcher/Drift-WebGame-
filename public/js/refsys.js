"undefined"==typeof public&&(public={}),public.refsys={init:function(){$('.dt-content .row [data-action="save-autorcb"]').on("click",function(){public.refsys.autorcb()});var e=$(".dt-content .row #refsysmessage textarea").val();e&&(e=e.replace(/<br \/>/g,"\r\n"),$(".dt-content .row #refsysmessage textarea").val(e)),$(".dt-content .row #refsysmessage").on("submit",function(){public.refsys.hello()})},autorcb:function(){var e=$(".dt-content .row #refsys-autorcb").val()||0;core.ajax({url:"/refsys/autorcb/value/"+e,ident:"autorcb",preloader:'.dt-content .row [data-action="save-autorcb"]',success:function(e){if(e&&e.success)return swal({type:"success",text:e.success})}})},hello:function(){core.ajax({url:"/refsys/hello",ident:"hello",form:".dt-content .row #refsysmessage",preloader:".dt-content .row #refsysmessage button",success:function(e){return e&&e.error?swal(e.error):e&&e.success?swal({type:"success",text:e.success}):void 0}})}},$(document).ready(function(){public.refsys.init()});