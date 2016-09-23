<script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script>

<div id="event-calendar-main" >
<table>
  <thead>
    <tr>
		<td class="arrLeft">Л</td>
		<td colspan="5"></td>
		<td class="arrRight">Ы</td>
	</tr>
    <tr colspan="8" class="calendar-name-day-wrap">
		<td class="calendar-name-day">ѕн</td>
		<td class="calendar-name-day">¬т</td>
		<td class="calendar-name-day">—р</td>
		<td class="calendar-name-day">„т</td>
		<td class="calendar-name-day">ѕт</td>
		<td class="calendar-name-day">—б</td>
		<td class="calendar-name-day">¬с</td>
	</tr>
  <tbody>
  </tbody>
</table>
<div class="event-box">
<div class="name">
</div>
<div class="description">
</div>
</div>
</div>
<script>
var calendar_events = [ 
<?foreach($arResult["ITEMS"] as $arItem):?>
		<?$descr = str_replace(  array("\r","\n"),"",htmlspecialcharsEx($arItem["PREVIEW_TEXT"]) );?>
		<?$date = ParseDateTime( $arItem["PROPERTIES"]["DATE"]["VALUE"] , "DD.MM.YYYY HH:MI:SS" );?>
		<?echo("{year:'".$date["YYYY"]."',month:'".$date["MM"]."',day:'".$date["DD"]."',name:'".$arItem["NAME"]."',link:'".$arItem["PROPERTIES"]["LINK"]["VALUE"]."',description:'".$descr."'},\n")?>
<?endforeach;?>
	];
function event_calendar_main(id, year, month) {
var Dlast = new Date(year,month+1,0).getDate(),
    D = new Date(year,month,Dlast),
	DlastPrev = new Date(year,month,0).getDate(),
    DNlast = new Date(D.getFullYear(),D.getMonth(),Dlast).getDay(),
    DNfirst = new Date(D.getFullYear(),D.getMonth(),1).getDay(),
    calendar = '',
    months=["январь","‘евраль","ћарт","јпрель","ћай","»юнь","»юль","јвгуст","—ент€брь","ќкт€брь","Ќо€брь","ƒекабрь"];

var i = 0 , PCN ="prevM";
if (DNfirst == 1) i = DlastPrev-6;
if (DNfirst == 0) i = DlastPrev-5; 
if (DNfirst > 1 ) i = DlastPrev+2-DNfirst;

for (var week=1 ; week<=6 ; week++){
	calendar += '<tr class="week' + week + '">';
	for (var DofW=1 ; DofW<=7 ; DofW++){
		calendar += '<td class="day' + i +' '+ PCN +'">' + i + '</td>';
		if( i == DlastPrev && week == 1 ){ i=0; PCN="curM"; }
		if( i == Dlast && week > 1 ){ i=0; PCN="nextM"; }
		i=i+1;
	}
	calendar += '</tr>'
}


document.querySelector('#'+id+' tbody').innerHTML = calendar;
document.querySelector('#'+id+' thead td:nth-child(2)').innerHTML = months[D.getMonth()] +' '+ D.getFullYear();
document.querySelector('#'+id+' thead td:nth-child(2)').className = "calendar-top";
document.querySelector('#'+id+' thead td:nth-child(2)').dataset.month = D.getMonth();
document.querySelector('#'+id+' thead td:nth-child(2)').dataset.year = D.getFullYear();
// метки дл€ текущей даты
if( year==new Date().getFullYear() && month==new Date().getMonth()){
	var cell = document.querySelector('#'+id+' td.day'+ new Date().getDate() + '.curM').className += " today";
}
// метки дл€ дат с событи€ми
for ( i=0 ; i<calendar_events.length ; i++)
	{
		if( year == calendar_events[i].year && month == calendar_events[i].month ){
			document.querySelector('#'+id+' td.day'+ calendar_events[i].day + '.curM').className += " event i"+i;
			document.querySelector('#'+id+' td.day'+ calendar_events[i].day + '.curM').title = calendar_events[i].name;
			var date = document.querySelector('#'+id+' td.day'+ calendar_events[i].day + '.curM').innerHTML;
			date = "<a href='" + calendar_events[i].link + "' target='_blank'>" + date + "</a>";
			document.querySelector('#'+id+' td.day'+ calendar_events[i].day + '.curM').innerHTML = date;
		}
	}
// описание событи€
/*var events = document.querySelectorAll('#event-calendar-main .event');
for( i=0 ; i<events.length ; i++){
	events[i].onmouseenter = function() {
											var start = this.className.indexOf("i")+1;
											var i = Number(this.className.substring(start,start+1));
											document.querySelector('#event-calendar-main .name').innerHTML = calendar_events[i].name;
											document.querySelector('#event-calendar-main .description').innerHTML = calendar_events[i].description;
										}
}*/
}
// инициализаци€ календар€
event_calendar_main("event-calendar-main", new Date().getFullYear(), new Date().getMonth());

// переключатель минус мес€ц
document.querySelector('#event-calendar-main .arrLeft').onclick = function() {
  event_calendar_main("event-calendar-main", document.querySelector('#event-calendar-main thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#event-calendar-main thead td:nth-child(2)').dataset.month)-1);
}

// переключатель плюс мес€ц
document.querySelector('#event-calendar-main .arrRight').onclick = function() {
  event_calendar_main("event-calendar-main", document.querySelector('#event-calendar-main thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#event-calendar-main thead td:nth-child(2)').dataset.month)+1);
}

</script>
