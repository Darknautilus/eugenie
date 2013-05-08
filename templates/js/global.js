
/*
 * Permet de changer de page
 */
History.Adapter.bind(window, "statechange", function() {
	var state = History.getState();
	$("#content").slideUp("slow", function() {
		pageCall("#content",state.url);
		$("#content").show("slow");
	});
});

$(document).ready(function() {
	$(".side-menu a").click(function() {
		var History = window.History;
		var link = $(this);
		var curURL = document.URL;
		History.pushState({'path':curURL},'',link.attr("href"));
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
	if(headerImage != undefined) {
		photo.fadeOut("slow",function() {
			photo.css("background-image","url('"+headerImage+"')");
			photo.fadeIn("slow");
		});
	}
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

// Fonction qui permet de calculer le nombre de caract�res d'un textarea
function countAreaChars(areaName,counter,limit)
{
	if (areaName.value.length>limit)
	areaName.value=areaName.value.substring(0,limit);
	else
	counter.value = limit - areaName.value.length;
}

// Pour le changement d'image dans l'intro
$(document).ready(function() {
	$(".imageIntro").click(function() {
		if($(this).attr("position") == 1) {
			$(this).fadeOut("slow", function() {
				$(this).css("background-image","url('"+$(this).attr("alt_image")+"')");
				$(this).css("background-size","150%");
				$(this).css("-webkit-animation","deplacement 30s linear infinite");
				$(this).css("animation","deplacement 30s linear infinite");
				$(this).attr("position", 2);
				$(this).fadeIn("slow");
			});
		}
		else {
			$(this).fadeOut("slow", function() {
				$(this).css("background-image","url('"+$(this).attr("main_image")+"')");
				$(this).css("background-size","100%");
				$(this).css("-webkit-animation","none");
				$(this).css("animation","none");
				$(this).attr("position", 1);
				$(this).fadeIn("slow");
			});
		}
	});
});
