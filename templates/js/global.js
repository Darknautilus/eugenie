
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
				$(this).attr("title", "Voir la carte");
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
				$(this).attr("title", "Voir le salon");
				$(this).fadeIn("slow");
			});
		}
	});
});


$(document).ready(function() {
	$(".formGestionComm").submit(function(e) {
		var form = $(this);
		$.ajax({
			type: form.attr("method"),
	        url: form.attr("action"),
	        data: form.serialize(),
	        dataType: "json",
	        success: function(data){
			    if(data.result) {
					form.parent().parent().remove();
			     }
			     else {
			    	 var message;
			    	 if(data.action == "approve") {
			    		 message = "Erreur d'acceptation";
			         }
			         else {
			        	 message = "Erreur de suppression";
			         }
			    	 form.parent().find(".alert").remove();
			    	 form.parent().prepend("<p class=\"alert alert-danger alert-block\">"+message+"</p>");
			     }
	        }
		});
		return false;
	});
});
