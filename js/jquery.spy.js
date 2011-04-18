$.fn.simpleSpy = function (limit, interval,data) {
    limit = limit || 4;
    interval = interval || 4000;
    //console.log(interval);
	
    function getSpyItem($source) {
        var $items = $source.find('> li');
        
        if ($items.length <= 1) {
            // do an hit to get some more
            $source.load(data);
        } else if ($items.length == 0) {
            return false;
        }
        
        // grab the first item, and remove it from the $source
        return $items.filter(':first').remove();
    }
    
    return this.each(function () {
        // 1. setup
            // capture a cache of all the list items
            // chomp the list down to limit li elements
        var $list = $(this),
            running = true,
            //height = $list.find('> li:first').height();
            height = "100px";
            
        // TODO create the $source element....
        var $source = $('<ul />').hide().appendTo('body');
                    
        //$list.wrap('<div class="news" />').parent().css({ height : height * limit });
        $list.parent().css({ height : height * limit });
        
        $list.find('> li').filter(':gt(' + (limit - 1) + ')').appendTo($source);

        $list.bind('stop', function () {
            running = false;
        }).bind('start', function () {
            running = true;
        });

        // 2. effect
        function spy() {
            if (running) {
                var $item = getSpyItem($source);

                if ($item != false) {
                    // insert a new item with opacity and height of zero
                    var $insert = $item.css({
                        height : 0,
                        opacity : 0,
                        //display : 'none'
                    }).prependTo($list);

                    // fade the LAST item out
                    $list.find('> li:last').animate({ opacity : 0}, 1000, function () {
                        // increase the height of the NEW first item
                        $insert.animate({ height : height }, 1000).animate({ opacity : 1 }, 1000);

                        // AND at the same time - decrease the height of the LAST item
                        // $(this).animate({ height : 0 }, 1000, function () {
                            // finally fade the first item in (and we can remove the last)
                            $(this).remove();
                        // });
                    });             
                }                
            }
            
            setTimeout(spy, interval);
        }
        
        spy();
    });
};
