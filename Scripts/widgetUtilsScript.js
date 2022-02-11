
// custom string comparator

function compareStringIgnoreCase(a, b) {
    //console.log('sorting called with a: ' + a + ' and b: ' + b);
    if (a == null)
        return -1;
    else if (b == null)
        return 1;
    if (a.toLowerCase() < b.toLowerCase()) {
        return -1
    }
    else if (a.toLowerCase() > b.toLowerCase()) {
        return 1;
    }
    else {
        return 0;
    }
}

function isSortable(col) {
    if (Math.abs(col) == 3) 
        return false;
    return true;
}

function registerKeyEvents(searchTextId) {

    require(["dojo/html", "dojo/dom", "dojo/on"],
    function (html, dom, on) {
        on(dom.byId(searchTextId), "keypress", function (event) {
            switch (event.keyCode) {
                case keys.UP_ARROW:
                    event.preventDefault();
                    //preventing the default behavior in case your browser
                    // uses autosuggest when you hit the down or up arrow.
                    console.log("up arrow has been pressed");
                    break;
                case keys.DOWN_ARROW:
                    event.preventDefault();
                    //preventing the default behavior in case your browser
                    // uses autosuggest when you hit the down or up arrow.
                    console.debug("down arrow has been pressed");
                    break;
                case keys.ENTER:
                    //event.preventDefault();
                    console.log("enter has been pressed");
                    
                default:
                    console.debug("some other key: " + event.keyCode);
            }
        });
    });
    
}