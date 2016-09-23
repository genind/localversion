Cufon('#first-menu .content ul li', { fontFamily: 'PFBeauSansPro', hover: true });
Cufon('.news_part .news_zag, .raspisanie .naprav_header, .naprav .naprav_header', { fontFamily: 'PFBeauSansPro', hover: true });
Cufon('.left .tree li a.noitem', { fontFamily: 'PFBeauSansPro', hover: true });
Cufon('.left .tree li a.l1', { fontFamily: 'PFBeauSansPro', hover: true });

Cufon('.right h1, .onecolumn h1', { fontFamily: 'PFBeauSansPro', hover: true });
Cufon('.left ul.left-menu li a.lb', { fontFamily: 'PFBeauSansPro', hover: true });



//Cufon('.filter ul li a', { fontFamily: 'PFBeauSansPro', hover: true });
/*$(document).ajaxSuccess(function() {
	Cufon.refresh();
});*/
Cufon('.right #pages li a', { fontFamily: 'PFBeauSansPro', hover: true });
jQuery(document).ready(function(){


	$('#second-menu .content ul li.level1').hover(function() {
		if(!$(this).hasClass('current')){
		$('.third-menu').stop().hide();
		$(this).find('a.title').addClass('hover');
		$(this).find('.third-menu').show();
		}
	}, function() {
		$(this).find('a.title').removeClass('hover');
		$('.third-menu').stop().css("height", "auto").hide();
		$('#second-menu .content ul li.current .third-menu').show();
	});

	
		$('#second-menu1 .content ul li.level1').hover(function() {
		if(!$(this).hasClass('current')){
		$('.third-menu1').stop().hide();
		$(this).find('a.title').addClass('hover');
		$(this).find('.third-menu1').show();
		}
	}, function() {
		$(this).find('a.title').removeClass('hover');
		$('.third-menu1').stop().css("height", "auto").hide();
		$('#second-menu1 .content ul li.current .third-menu').show();
	});
	/*$("a[rel^='prettyPhoto']").prettyPhoto({showtitle: false});*/
	/*$('#catalog-list li a.title').click(function(){
		if(!$(this).parent().hasClass('current')){
		$('#catalog-list li.current ul').slideUp();	
		$(this).parent().find('ul').slideDown();
        $('#catalog-list li').removeClass('current');
		$(this).parent().addClass('current');
		}
		return false;
	});*/


	/*$(function(){if($.browser.safari)return;$('<style>.jqueryPlaceholder{color:#a9a9a9!important;}</style>').appendTo('head');$('input[placeholder]').each(function(){if($(this).val()==''||$(this).val()==$(this).attr('placeholder')){$(this).addClass('jqueryPlaceholder').val($(this).attr('placeholder'))}$(this).focus(function(){if($(this).val()==$(this).attr('placeholder')){$(this).removeClass('jqueryPlaceholder').val('')}});$(this).blur(function(){if($(this).val()==''){$(this).addClass('jqueryPlaceholder').val($(this).attr('placeholder'))}})});$('textarea[placeholder]').each(function(){if(this.value==''||this.value==$(this).attr('placeholder')){$(this).addClass('jqueryPlaceholder');this.value=$(this).attr('placeholder')};$(this).focus(function(){if(this.value==$(this).attr('placeholder')){$(this).removeClass('jqueryPlaceholder');this.value=''}});$(this).blur(function(){if(this.value==''){$(this).addClass('jqueryPlaceholder');this.value=$(this).attr('placeholder')}})});$('form').each(function(){$(this).submit(function(){$(this).find("input").each(function(){if($(this).val()==$(this).attr('placeholder'))$(this).val('')});$(this).find("textarea").each(function(){if(this.value==$(this).attr('placeholder'))this.value=''})})})});
	function preload(images) {
	    if (typeof document.body == "undefined") return;
	    try {
	        var div = document.createElement("div");
	        var s = div.style;
	        s.position = "absolute";
	        s.top = s.left = 0;
	        s.visibility = "hidden";
	        document.body.appendChild(div);
	        div.innerHTML = "<img src=\"" + images.join("\" /><img src=\"") + "\" />";
	    } catch(e) {
	        // Error. Do nothing.
	    }
	}
	
	$("a[rel^='help']").prettyPhoto({
							custom_markup: $('.show').html(),
							social_tools: '',
							changepicturecallback: function(){},
							markup: '<div class="pp_pic_holder" style=""> \
															<div class="pp_content" style="background: transparent;"> \
																<div class="pp_loaderIcon"></div> \
																<div class="pp_fade"> \
																	<div id="pp_full_res"></div> \
										<a class="pp_close" style="right:40px;top:45px;" href="#">Close</a> \
																</div> \
															</div> \
														\
												</div> \
												<div class="pp_overlay"></div>',
						});	*/
	
});