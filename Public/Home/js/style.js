/*综合*/
$(function () {
	$(".nav li").hover(function() {
		$(this).find("#pop").show();
	}, function() {
		$(this).find("#pop").hide();		
	});
})



/*弹出*/
function pop() {
	$(".pop_bg").fadeIn(500);
	$("#pop2").delay(500).slideDown();
}
$(function () {
	$(".close").click(function() {
		$("#pop2").slideUp();
		$(".pop_bg").delay(500).fadeOut(500);
	});
})






function AutoResizeImage(maxWidth,maxHeight,objImg){
var img = new Image();
img.src = objImg.src;
var hRatio;
var wRatio;
var Ratio = 1;
var w = img.width;
var h = img.height;
wRatio = maxWidth / w;
hRatio = maxHeight / h;
if (maxWidth ==0 && maxHeight==0){
Ratio = 1;
}else if (maxWidth==0){//
if (hRatio<1) Ratio = hRatio;
}else if (maxHeight==0){
if (wRatio<1) Ratio = wRatio;
}else if (wRatio<1 || hRatio<1){
Ratio = (wRatio<=hRatio?wRatio:hRatio);
}
if (Ratio<1){
w = w * Ratio;
h = h * Ratio;
}
objImg.height = h;
objImg.width = w;
}

window.onload=AutoResizeImage();