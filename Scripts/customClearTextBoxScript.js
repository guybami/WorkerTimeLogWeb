
// custom widget script
// Author: Guy Bami
// Last changes: 01.07.2013




require(["dijit/form/TextBox"
    , "dijit/form/NumberTextBox"
    , "dojo/parser"
    , "dojo/ready"],
    function (TextBox, NumberTextBox, parser, ready) {
        // parse content
        //if(document.getElementById("textBoxHolder") != null)
          //  parser.parse("textBoxHolder");
}); 

function createCustomTextBox() {

    var controlId = "";
    // Provide our new class
    define("xcsSearch.form.ClearTextBox");

    // Declare our new class
    dojo.declare("xcsSearch.form.ClearTextBox", [dijit.form.TextBox], {

        // Fire the change event for every text change
        intermediateChanges: true,
        titleText: "Delete search",
        // PostCreate method
        // Fires *after* nodes are created, before rendered to screen
        postCreate: function () {
            // Do what the previous does with this method
            this.inherited(arguments);
            // Add widget class to the domNode
            dojo.addClass(this.domNode, "xcsSearchClearBox");
            // Create the "X" link
            this.clearLink = dojo.create("a", {
                className: "xcsSearchClear",
                innerHTML: ""
            }, this.domNode, "first");
            // Fix the width
            var startWidth = dojo.style(this.domNode, "width"),
						pad = dojo.style(this.domNode, "paddingRight");
            dojo.style(this.domNode, "width", (startWidth - pad) + "px");
            dojo.attr(this.domNode, "title", this.titleText); // set
            // Add click event to focus node
            this.connect(this.clearLink, "onclick", function () {
                // Clear the value
                this.set("value", "");
                // Focus on the node, not the link
                this.textbox.focus();
            });
            // Add intermediate change for self so that "X" hides when no value
            this.connect(this, "onChange", "checkValue");
            // Check value right away, hide link if necessary
            this.checkValue();
            //this.parseWidget();
        },

        checkValue: function (value) {
            alert(this.id);
            dojo[(value != "" && value != undefined ? "remove" : "add") + "Class"](this.clearLink, "dijitHidden");
        },

        parseWidget: function () {
           // dojo.parser.parse(this.id);            
        }

    });
    //dojo.parser.parse(controlId);

}



jQuery.fn.clearable = function () {

    $('.morelink').on('click', function () {
        var $this = $(this);
        if ($this.hasClass('less')) {
            $this.removeClass('less');
            $this.html(config.moreText);
        } else {
            $this.addClass('less');
            $this.html(config.lessText);
        }
        $this.parent().prev().toggle();
        $this.prev().toggle();
        return false;
    });

    return this.each(function () {
        $(this).css({ 'border-width': '1px', 'outline': 'none' })
		.wrap('<div id="sq" class="divclearable"></div>')
		.parent()
		.attr('class', $(this).attr('class') + ' divclearable')
		.append('<a class="clearlink" href="javascript:"></a>');

        $('.clearlink')
		.attr('title', 'Click to clear this textbox')
		.click(function () {
		    $(this).prev().val('').focus();
		});
    });
}