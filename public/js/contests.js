"undefined"==typeof public&&(public={}),public.contests={init:function(){var t=$("section.section[data-auth]").attr("data-auth");t&&$("section.section .container .row .col-md-9").each(function(){$(this).find(".table-novi table tbody tr td[data-login]").each(function(){if($(this).attr("data-login")==t)return $(this).closest(".col-md-9").find('[data-prop="position"]').html($(this).attr("data-position")),!1})}),$('section.section .container .row [data-toggle="modal"][data-target="#contest-result-modal"]').on("click",function(){var t=$(this).attr("data-id"),o=$(this).attr("data-title"),a="";if(global["contest-result"][t])for(var n in global["contest-result"][t])a+="\t\t\t\t\t\t<tr>\t\t\t\t\t\t\t<td>"+global["contest-result"][t][n].position+"</td>\t\t\t\t\t\t\t<td>"+global["contest-result"][t][n].login+"</td>\t\t\t\t\t\t\t<td>"+global["contest-result"][t][n].amount+"</td>\t\t\t\t\t\t\t<td>"+global["contest-result"][t][n].prize+"</td>\t\t\t\t\t\t</tr>\t\t\t\t\t";$("#contest-result-modal .modal-title").html(o),$("#contest-result-modal table tbody").html(a)})}},$(document).ready(function(){public.contests.init()});