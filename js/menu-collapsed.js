jQuery.fn.initMenu = function() {  
    return this.each(function(){
        var theMenu = $(this).get(0);
        $('.sub_tree', this).hide();
        $('li.expand > .sub_tree', this).show();
        $('li.expand > .sub_tree', this).prev().addClass('active');
		$('li.expand > .sub_tree', this).parent().addClass('act');
		$('li > .sub_tree', this).prev().addClass('active');
        $('.bullit', this).click(
            function(e) {
                
                e.stopImmediatePropagation();
				var theElement = $(this.parentNode.parentNode.parentNode).next('.sub_tree');         
                var Sub_Trees_parents = $(this.parentNode.parentNode.parentNode.parentNode).siblings();

				$(Sub_Trees_parents).each(function(){
					var CurrSub_Tree = $(this).children('ul.sub_tree');
					$(CurrSub_Tree).removeClass('active');
					$(this).removeClass('act');
					$(CurrSub_Tree).slideUp(200);
				});				

				$(theElement).slideToggle(200, function() {
						if ($(theElement).is(':visible')) {
                            $(theElement).addClass('active');
							$(theElement).parent().addClass('act');
                        }
                        else {
                            $(theElement).removeClass('active');
							$(theElement).parent().removeClass('act');
                        }    
                });
				

				
			
            return false;
        }
    );
});
};

$(document).ready(function() {$('.tree').initMenu();});