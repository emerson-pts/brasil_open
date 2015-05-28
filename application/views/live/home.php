<section id="1" class="container breve">

  <h3><a href="javascript:openLSHDWindow(2015,'6','0533','1','en','http://www.atpworldtour.com/Tennis/Tournaments/Sao-Paulo.aspx')">Brasil Open 2015 ao vivo</a></h3>

</section>

<script language="JavaScript1.1">
<!--
// Open a window of the desired size in the center of the screen.

function openLSHDWindow(year, wkno, eventid, tour, lang, ref_file, width, height, hasScrollBars) {
	// ADD NAME FIELD and make sure it get's focus!!!
	var theWidth = width;
	var theHeight = height;
	var scrollBars = "scrollbars";
	if (hasScrollBars == false) scrollBars = "scrollbars=0";
	if ((theWidth == "")||(theWidth == null)) theWidth =1042;
	if ((theHeight == "")||(theHeight == null)) theHeight =631;
	var theLeft = (screen.availWidth - theWidth)/2;
	var theTop = (screen.availHeight - theHeight)/2;
	var strCheckRef = escape(ref_file);

	var lsURL = "http://www.protennislive.com/lshd/main.html?year="+year+"&wkno="+wkno+"&eventid="+eventid+"&tour="+tour+"&lang="+lang+"&ref="+strCheckRef;

	var popupWin = window.open(lsURL, '_' + Math.round(Math.random() * 1000000),'top='+theTop+',left='+theLeft+',menubar=0,toolbar=0,location=0,directories=0,status=0,'+scrollBars+',width='+theWidth+', height='+theHeight);
}
//-->
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#page-live").addClass("active");
		$("#page-live-mobile").addClass("active");
	});
</script>