"undefined"==typeof public&&(public={}),public.account={init:function(){var a=Chart.helpers.color,e={responsive:!0,legend:{display:!1},layout:{padding:0},scales:{xAxes:[{display:!1}],yAxes:[{display:!1}]}};if($("#index-taxi-chart").length){var t=document.getElementById("index-taxi-chart").getContext("2d"),o='"Oswald", sans-serif';Chart.defaults.global.defaultFontFamily=o,(n=$.extend({},e)).tooltips={mode:"index",axis:"y",titleFontColor:"#fff",bodyFontColor:"#fff",titleFontSize:12,bodyFontSize:12,callbacks:{label:function(a,e){return e.datasets[a.datasetIndex].label+": "+e.datasets[a.datasetIndex].data[a.index]+" "+lang.rub}}},n.legend={display:!1},n.scales={xAxes:[{gridLines:{display:!0},display:!0,ticks:{fontColor:"#868686",fontSize:10}}],yAxes:[{gridLines:{display:!0,color:"#ededed",zeroLineColor:"#fff"},display:!0,ticks:{fontColor:"#868686",fontSize:10,suggestedMin:0,suggestedMax:.005}}]},(i=t.createLinearGradient(0,0,230,0)).addColorStop(0,a("#d61f1f").alpha(.8).rgbString()),i.addColorStop(1,a("#f19d26").alpha(.7).rgbString()),new Chart(t,{type:"line",data:{labels:global.taxigraph.labels,datasets:[{data:global.taxigraph.data,label:lang["speed-hour"],borderWidth:0,pointRadius:2,backgroundColor:i}]},options:n})}if($("#index-carsharing-chart").length){var n;t=document.getElementById("index-carsharing-chart").getContext("2d"),o='"Oswald", sans-serif';Chart.defaults.global.defaultFontFamily=o,(n=$.extend({},e)).tooltips={mode:"index",axis:"y",titleFontColor:"#fff",bodyFontColor:"#fff",titleFontSize:12,bodyFontSize:12,callbacks:{label:function(a,e){return e.datasets[a.datasetIndex].label+": "+e.datasets[a.datasetIndex].data[a.index]+" "+lang.rub}}},n.legend={display:!1},n.scales={xAxes:[{gridLines:{display:!0},display:!0,ticks:{fontColor:"#868686",fontSize:10}}],yAxes:[{gridLines:{display:!0,color:"#ededed",zeroLineColor:"#fff"},display:!0,ticks:{fontColor:"#868686",fontSize:10}}]},(i=t.createLinearGradient(0,0,230,0)).addColorStop(0,a("#d61f1f").alpha(.8).rgbString()),i.addColorStop(1,a("#f19d26").alpha(.7).rgbString()),new Chart(t,{type:"line",data:{labels:global.carsharinggraph.labels,datasets:[{data:global.carsharinggraph.data,label:lang["speed-hour"],borderWidth:0,pointRadius:2,backgroundColor:i}]},options:n})}if($("#index-pie-chart").length){document.getElementById("index-pie-chart").getContext("2d");var i,r=$.extend({},e);(i=t.createLinearGradient(0,0,230,0)).addColorStop(0,a("#d61f1f").alpha(.9).rgbString()),i.addColorStop(1,a("#f19d26").alpha(.9).rgbString());var l=t.createLinearGradient(0,0,230,0);l.addColorStop(0,a("#4c0606").alpha(.7).rgbString()),l.addColorStop(1,a("#250201").alpha(.5).rgbString());var d=t.createLinearGradient(0,0,230,0);d.addColorStop(0,a("#d61f1f").alpha(1).rgbString()),d.addColorStop(1,a("#d61f1f").alpha(.5).rgbString());var s=t.createLinearGradient(0,0,230,0);s.addColorStop(0,a("#4c4c4c").alpha(.9).rgbString()),s.addColorStop(1,a("#000000").alpha(.9).rgbString());var c=t.createLinearGradient(0,0,230,0);c.addColorStop(0,a("#FF9800").alpha(.9).rgbString()),c.addColorStop(1,a("#FF9800").alpha(.5).rgbString());var f=t.createLinearGradient(0,0,230,0);f.addColorStop(0,a("#357db7").alpha(.9).rgbString()),f.addColorStop(1,a("#357db7").alpha(.5).rgbString()),r.tooltips={titleFontColor:"#fff",bodyFontColor:"#fff",titleFontSize:12,bodyFontSize:12}}$('[data-action="confirm-email"]').on("click",function(){var a=$(this).attr("data-email");return swal({title:lang["confirm-email"],text:lang["confirm-email-mod"],input:"text",inputAttributes:{maxlength:130,autocomplete:"off",placeholder:lang["enter-email"]},inputValue:a,showCancelButton:!0,confirmButtonText:lang.send,cancelButtonText:lang.close,onOpen:function(){swal.getConfirmButton().focus()}}).then(function(a){a.value&&public.account.confirmEmail(a.value)})})},confirmEmail:function(a){$("form#confirmemailhide").length||$("body").append('<form id="confirmemailhide" style="display:none"><input type="hidden" name="email" value=""></form>'),$('form#confirmemailhide input[name="email"]').val(a||""),core.ajax({url:"/users/confirm-email",ident:"confirm-email",form:"#confirmemailhide",success:function(a){return a&&a.error?swal({type:"error",text:a.error}):a&&a.success?($('[data-section="confirm-email-block"]').slideUp(),swal({type:"success",text:a.success})):void 0}})}},$(document).ready(function(){public.account.init()});