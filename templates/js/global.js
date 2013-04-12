
/*
 * Permet de changer de page
 */
window.onpopstate = function(e) {
	if(e.state) {
		pageCall("#content",document.location);
	}
};

$(document).ready(function() {
	$(".side-menu a").click(function() {
		var link = $(this);
		var curURL = document.URL;
		$("#content").slideUp("slow", function() {
			history.pushState({'path':curURL},'',link.attr("href"));
			pageCall("#content",link.attr("href"));
			$("#content").show("slow");
		});
		return false;
	});
});

function pageCall(block, targetURL) {
	$.ajax({
		type:"get",
		url:targetURL,
		dataType:"html",
		success:function(ret) {
			$(block).html(ret);
			updateHeader();
		}
	});
}

function updateHeader() {
	var headerImage = $("#header_image_url").html();
	var title = $("#page_title").html();
	var photo = $("#photo-slideshow");
	if(headerImage != undefined)
		photo.css("background-image","url('"+headerImage+"')");
	$("title").html(title);
}

$(document).ready(function() {
	updateHeader();
});

/*$(document).ready(function () {
    var firstLink = $(".side-menu > li:first-child > a");
    var menuLink = $(".side-menu > li > a");
    var firstLoadedHtml = firstLink.attr("href");

    $("#sectionContainer").hide().load(firstLoadedHtml).fadeIn("fast");
    firstLink.addClass("active");   

    menuLink.click(function(e) {

        e.preventDefault();
        e.stopImmediatePropagation();

        var newLoadedHtml = $(this).attr("href");

        $.history.pushState(null, newLoadedHtml, newLoadedHtml);

        $("#sectionContainer")
            .hide()
            .load(newLoadedHtml, function(responseText) {
                document.title = $(responseText).filter("title").text();
            })
            .fadeIn("fast");
    });

    $.history.Adapter.bind(window, "statechange", function() {
        menuLink.removeClass("active");
        $("a[href='" + $.History.getState().title + "']").addClass("active");
        $('#sectionContainer').load(document.location.href, function(responseText) {
            document.title = $(responseText).filter("title").text();
        }); 
    });
});*/

