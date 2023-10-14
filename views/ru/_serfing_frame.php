<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
   <link rel="stylesheet" href="/assets/styles/style-serf.css" type="text/css" />
   <link rel="stylesheet" href="/assets/styles/frame.css" />
   <script type="text/javascript" src="/assets/js/serfing.js"></script>
   <script type="text/javascript" language="JavaScript">
       var vtime = stattime = "<?=$_SESSION['view']['timer']; ?>"; 
       var cnt = "<?=$key; ?>";
   </script>
  </head>
  <body>
   <table class="table_gl" border="0" cellspacing="0" cellpadding="0" style="min-height: 125px;">
    <tr>
     <td style="width: 100%;text-align:center;padding: 35px;" rowspan="2">
      <div id="blockverify">

        
       <div id="blockwait">
        Подождите, сайт загружается...
       </div>
       <div id="blocktimer" style="display: none;">

        <form class="clockalert" name="frm" method="post" action="" onsubmit="return false;">

          

          <div id="check">Дождитесь окончания таймера:<div class="timer notranslate" id="timer"></div></div>

        </form>

       </div>
      </div>

     </td>
    </tr>
   </table>
  </body>
  </html>