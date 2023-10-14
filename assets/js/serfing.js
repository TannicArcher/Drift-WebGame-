function getHTTPRequest()
{
    var req = false;
    try {
        req = new XMLHttpRequest();
    } catch(err) {
        try {
            req = new ActiveXObject("MsXML2.XMLHTTP");
        } catch(err) {
            try {
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch(err) {
                req = false;
            }
        }
    }
    return req;
}

function startClock() {
    if (vtime == stattime) 
    {
        document.getElementById('blockwait').style.display = 'none';
        document.getElementById('blocktimer').style.display = '';
    }
    if (vtime >= 0) 
    {
        document.querySelector('#timer').innerHTML = vtime;
        vtime --;
        tm = setTimeout("startClock(0)", 1000);
    } 
    else 
    {
        if (tm)
            clearTimeout(tm);
        nextstep(0, cnt);
    }
}
function vernum(vnum) {
    nextstep(vnum, cnt);
    return false;
}

function nextstep(num, cnt)
{
    var myReq = getHTTPRequest();
    var params = "num="+num+"&cnt="+cnt;
    function setstate()
    {
        if ((myReq.readyState == 4)&&(myReq.status == 200)) 
        {

            var resvalue = myReq.responseText;

            if (resvalue != '') 
            {
                if (resvalue.substr(0, 2) == 'OK') 
                {
                    vars = resvalue.split(";");
                    document.getElementById("check").innerHTML = '<div class="blocksuccess">Спасибо за посещение!<br /><span>Плата за просмотр зачислена</span></div>';
                    if ((vars[2] != '0')&&(vars[2].length > 1)) 
                    {
                        setTimeout("top.location = '"+vars[2]+"'", 500);  
                    }
                } 
                else
                {
                    if (resvalue == '0')
                        document.getElementById("check").innerHTML = '<div class="blockerror">Действие не произведено</div>';
                    else
                        document.getElementById("check").innerHTML = resvalue;
                }
                
            }
        } 
        else 
        {
            document.getElementById("check").innerHTML = "<span class='loading' title='Подождите пожалуйста...'></span>";
        }
    }
    myReq.open("POST", "/serfing/endview", true);
    myReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    myReq.setRequestHeader("Content-lenght", params.length);
    myReq.onreadystatechange = setstate;
    myReq.send(params);
    return false;
}

