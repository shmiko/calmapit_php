// JavaScript Document
// This file is (c) 2005-2006 qlock.com. Unauthorized copying is prohibited.
(function(){var IE=document.all ? true : false;var startDate=new Date();var baseTime=startDate.getTime();var dayOfWeek=new Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");var local=document.location.href.substr(0,20)=="http://www.qlock.com";var dstList1=new Array([1,7,4,5,7,10],[5,7,3,5,7,10],[5,7,3,5,7,9],[5,7,3,1,7,10],[5,7,3,5,6,10],[1,0,4,1,0,10],[5,5,3,1,7,10],[1,7,4,1,7,10],[1,5,4,1,7,9],[4,5,4,4,1,9],[2,7,3,1,7,11],[5,7,10,5,7,3],[4,7,2,1,7,11],[1,7,10,3,7,3],[2,7,10,3,7,2],[2,7,10,2,7,3],[2,7,9,3,7,4],[1,7,10,5,7,2],[1,7,4,1,7,9]);var dstList2=new Array([1,7,4,5,7,10],[5,7,3,5,7,10],[5,7,3,5,7,9],[5,7,3,1,7,10],[5,7,3,5,6,10],[5,5,3,3,7,9],[1,7,4,1,7,10],[1,5,4,1,7,9],[4,5,4,4,1,9],[2,7,3,1,7,11],[5,7,10,5,7,3],[5,7,9,3,7,3],[5,7,12,3,6,3],[2,7,10,3,7,2],[2,7,10,2,7,3],[2,6,3,1,7,11],[2,7,9,3,7,4],[3,7,10,2,7,3],[1,7,10,2,7,3],[1,7,4,1,7,9]);if(!document.getElementById('qlock1')){qlocks=new Array();}function noselect(){return false;}function noevent(event){if(IE){window.event.cancelBubble=true;window.event.returnValue=false;}else{event.preventDefault();}}function getDSTDay(year, num, dow, mth){mth--;if(dow==0){adow=1;dt=new Date();}else{dow-=3;dt=new Date(year,mth,1);fdow=(dt.getUTCDay()+5)% 7;adow=(dow-fdow)+1;if(adow <=0)adow+=7;}if(num==5){dt=new Date(year,mth,(3*7)+adow);t=dt.getTime();for(var i=3;i<6;i++){dt=new Date(t);if(dt.getMonth()!=mth)break;t+=1000*60*60*24*7;}num=i;}dt.setUTCFullYear(year,mth,((num-1)*7)+adow);dt.setUTCHours(0,0,1);return dt;}function fixDigit(str){var s=new String(str);if(s.length < 2)return "0"+s;else return s;}function getTime(gmtOffset){var date=new Date();offset=gmtOffset*60*60*1000;diff=date.getTime()-startDate.getTime();date.setTime(diff+baseTime+offset);return date;}function formatTime(date){var time;var hour=date.getUTCHours();var min=fixDigit(date.getUTCMinutes());var sec=fixDigit(date.getUTCSeconds());var del=sec&1 ? "<font color=\"#aaaaaa\">:</font>" : ":";if(hour > 12)time=(hour-12)+del+min+" pm";else if(hour==12)time=12+del+min+" pm";else if(hour==0)time=12+del+min+" am";else time=hour+del+min+" am";return dayOfWeek[date.getUTCDay()]+" "+time;}function findChild(elem, className){if(elem.className==className)return elem;var i;for(i=0;i < elem.childNodes.length;i++){var e=findChild(elem.childNodes[i], className);if(e)return e;}return null;}function setCity(id,name){obj=document.getElementById(id);city=findChild(obj,"city");city.getElementsByTagName("P")[0].innerHTML=name;}function setTime(id,time,off,dst){obj=document.getElementById(id);l=findChild(obj,"time");l.getElementsByTagName("P")[0].innerHTML=time;if(off==0)gmt="GMT";else if(off > 0)gmt="GMT+"+off;else gmt="GMT "+off;l=findChild(obj,"gmt");l.getElementsByTagName("P")[0].innerHTML=gmt;l=findChild(obj,"dst");l.getElementsByTagName("P")[0].innerHTML=dst?"DST":"";}function updateTime(id,gmt,dstWeek1,dstDOW1,dstMonth1,dstWeek2,dstDOW2,dstMonth2){var time=getTime(gmt);dstON=false;if(dstWeek1 > 0){year=time.getFullYear();var start=getDSTDay(year+(dstMonth1>dstMonth2 ?-1 : 0),dstWeek1,dstDOW1,dstMonth1);var end=getDSTDay(year,dstWeek2,dstDOW2,dstMonth2);dstON=(time >=start)&&(time < end);}if(dstON){time=new Date(time.getTime()+(1000*60*60));}setTime(id,formatTime(time),gmt,dstON);}function setBGColor(id,clr){obj=document.getElementById(id);city=findChild(obj,"city");city.style.backgroundColor=clr;obj.style.borderColor=clr;}function setTextColor(id,clr){obj=document.getElementById(id);city=findChild(obj,"city");city.getElementsByTagName("P")[0].style.color=clr;}function update(){updateTime(this.id, this.gmt_offset, this.dst_week1, this.dst_dow1, this.dst_month1, this.dst_week2, this.dst_dow2, this.dst_month2);setCity(this.id,this.city_name);setBGColor(this.id,this.bg_color);setTextColor(this.id,this.text_color);}document.write('\ <style type="text/css">\ <!--\ .skin3{\ border: 1px solid #000000;\ margin: 0;\ padding: 0;');if(!local)document.write('cursor: pointer;');document.write('\ width: 120px;\ font-family: Verdana, Arial, Helvetica, sans-serif;\ vertical-align: middle;\ text-align: center;\ color: #000000;\}\ .skin3 p{\ margin: 0;\ padding: 0;\ font-size: 100%;\ margin: 0px;\}\ .skin3 .city{\ background-color: #ffffff;\ border-bottom: 1px solid #888888;\ vertical-align: middle;\ font-weight: bold;\ font-size: 80%;\ padding: 0.1em 0em;\}\ .skin3 .middle{\ background-image: url(http://www.qlock.com/live/lines.gif);\ background-repeat: repeat-x;\ font-weight: bold;\ padding-top: 1em;\ white-space: nowrap;\ position:relative;\ text-align: left;\}\ .skin3 .time{\ position:relative;\ text-align: center;\ font-size: 90%;\ top:-0.2em;\}\ .skin3 .dst p{\ font-size: 55%;\ color: #448844;\ left: 0.5em;\ top: 0.2em;\ position:absolute;\}\ .skin3 .gmt p{\ font-size: 55%;\ color: #884444;\ right: 0.5em;\ top: 0.2em;\ position:absolute;\}\-->\ </style>\ ');qlock_id='qlock'+(qlocks.length+1);if(typeof qlock_aff_id !="undefined"){document.write('\ <div onmousedown="return false;" onclick="window.open(\'http://www.qlock.com/time/?aid='+qlock_aff_id+'\',\'_blank\');" class="skin3" id="'+qlock_id+'" title="www.qlock.com">\ <div class="city"><p>city</p></div>\ <div class="middle">\ <div class="dst"><p>dst</p></div>\ <div class="gmt"><p>gmt</p></div>\ <div class="time"><p>time</p></div>\ </div>\ </div>\ ');}else if(!local){document.write('\ <div onmousedown="return false;" onclick="window.open(\'http://www.qlock.com/time/\',\'_blank\');" class="skin3" id="'+qlock_id+'" title="www.qlock.com">\ <div class="city"><p>city</p></div>\ <div class="middle">\ <div class="dst"><p>dst</p></div>\ <div class="gmt"><p>gmt</p></div>\ <div class="time"><p>time</p></div>\ </div>\ </div>\ ');}else{document.write('\ <div class="skin3" id="'+qlock_id+'">\ <div class="city"><p>city</p></div>\ <div class="middle">\ <div class="dst"><p>dst</p></div>\ <div class="gmt"><p>gmt</p></div>\ <div class="time"><p>time</p></div>\ </div>\ </div>\ ');}function Qlock(){this.city_name=qlock_city_name;this.gmt_offset=qlock_gmt_offset;this.id=qlock_id;if(typeof qlock_dst_week1 !="undefined"){this.dst_week1=qlock_dst_week1;this.dst_dow1=qlock_dst_dow1;this.dst_month1=qlock_dst_month1;this.dst_week2=qlock_dst_week2;this.dst_dow2=qlock_dst_dow2;this.dst_month2=qlock_dst_month2;}else{if(typeof qlock_dst_index !="undefined"){if(qlock_dst_index >=0){this.dst_week1=dstList1[qlock_dst_index][0];this.dst_dow1=dstList1[qlock_dst_index][1];this.dst_month1=dstList1[qlock_dst_index][2];this.dst_week2=dstList1[qlock_dst_index][3];this.dst_dow2=dstList1[qlock_dst_index][4];this.dst_month2=dstList1[qlock_dst_index][5];qlock_dst_index=0;}}if(typeof qlock_dst_index2 !="undefined"){if(qlock_dst_index2 >=0){this.dst_week1=dstList2[qlock_dst_index2][0];this.dst_dow1=dstList2[qlock_dst_index2][1];this.dst_month1=dstList2[qlock_dst_index2][2];this.dst_week2=dstList2[qlock_dst_index2][3];this.dst_dow2=dstList2[qlock_dst_index2][4];this.dst_month2=dstList2[qlock_dst_index2][5];qlock_dst_index2=0;}}}if(typeof qlock_bg_color !="undefined")this.bg_color=qlock_bg_color;else this.bg_color="white";if(typeof qlock_text_color !="undefined")this.text_color=qlock_text_color;else this.text_color="black";this.update=update;}function updateAll(){for(i=0;i<qlocks.length;i++){qlocks[i].update();}setTimeout(updateAll,1000);}qlocks[qlocks.length]=new Qlock();updateAll();})()