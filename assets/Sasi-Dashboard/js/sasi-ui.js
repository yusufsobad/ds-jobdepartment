function scroll(){
    $.fn.infiniteScrollUp = function() {
        var self = this;
        var kids = self.children();
        kids.children('td, th').wrapInner('<div class="dummy"/>')
        setInterval(function() {
            var first = kids.eq(0),
                clone = first.clone().appendTo(self);
            first.find(".dummy").slideUp(1000, function() {
                kids = kids.not(first.remove()).add(clone);
            });
        }, 30000);
        return this;
    };
    $(function(){
        $('.table-scroll').infiniteScrollUp();
    });
    
    $(function(){
        $('.table1-scroll').infiniteScrollUp();
    });
}




