jQuery.fn.initMenu = function() {  
    return this.each(function(){
        var theMenu = $(this).get(0);
        $('.sub_tree', this).hide();
        $('li.expand > .sub_tree', this).show();
        $('li.expand > .sub_tree', this).prev().addClass('active');
		$('li.expand > .sub_tree', this).parent().addClass('act');
		$('li > .sub_tree', this).prev().addClass('active');
        $('li a.l1', this).click(
            function(e) {
                
                e.stopImmediatePropagation();
                var theElement = $(this).siblings();
                var parent = this.parentNode.parentNode;
                
                if($(parent).hasClass('noaccordion')) {
                    
                    if(theElement[0] === undefined) {
                        window.location.href = this.href;
                    }
                    $(theElement).slideToggle(200, function() {
                        if ($(this).is(':visible')) {
                            $(this).siblings().addClass('active');
							$(this).parent().addClass('act');
                        }
                        else {
                            $(this).siblings().removeClass('active');
							$(this).parent().removeClass('act');
                        }    
                    });
                }
                else {
                    
                    if(theElement.hasClass('sub_tree') && theElement.is(':visible')) {
                        if($(parent).hasClass('collapsible')) {
                            $('.sub_tree:visible', parent).first().slideUp(200, 
                                function() {
                                    $(this).prev().removeClass('active');
                                    $(this).parent().removeClass('act');
                                }
                            );
                        }                   
                    }
                    
                    if(theElement.hasClass('sub_tree') /*&& theElement.is(':visible')*/) {         
                        $('.sub_tree:visible', parent).each(function() {
                            
                            
                            $(this).last().slideUp(200, function() {                            
                                $(this).siblings().removeClass('active');
                                $(this).parent().removeClass('act');
                            });                            
                        });

                        //console.log(this);
                        if (!$(this).parent().find('ul').hasClass('active')) {
                            theElement.slideDown(200, function() {
                                $(this).siblings().addClass('active');
                                $(this).parent().addClass('act');
                            });
                        } else {
                            $(this).parent().find('ul').removeClass('active')
                        }
                        
                    }
            }
            return false;
        }
    );
});
};

$(document).ready(function() {$('.tree').initMenu();});