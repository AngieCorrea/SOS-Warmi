$(document).ready(function() {
    
    //var html1 = "hola";
    
	$(".tab_content").hide();
	$("ul.tabs li:first").addClass("active").show();
    //$(".tab_content:first").html(html1);
	$(".tab_content:first").show();

	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide();

		var activeTab = $(this).find("a").attr("href");
        //$(activeTab).html(html1);
		$(activeTab).show();
	});
    
});