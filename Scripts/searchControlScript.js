
// Custom class used to asynchronous search data

// Declare asynchronous search class.

// The constructor
var AsyncSearchControl = function (searchTextLabelId, searchCriteriaSelectId, searchBtnId,
    searchTextId, hoderDivId, searchLabelId,
    itemsGridDivId, menuItemLabels, menuItemValues,
    useAdditionalFields, serviceURL, parseWidgetsOnLoad, 
    fetchAllDataOnload, searchDataFunc) {

    this.searchTextLabelId = searchTextLabelId;
    this.searchCriteriaSelectId = searchCriteriaSelectId;
    this.searchBtnId = searchBtnId;
    this.searchTextId = searchTextId;
    this.hoderDivId = hoderDivId;
    this.searchLabelId = searchLabelId;
    this.itemsGridDivId = itemsGridDivId;
    this.menuItemLabels = menuItemLabels;
    this.menuItemValues = menuItemValues;
    this.useAdditionalFields = useAdditionalFields;
    this.serviceURL = serviceURL;
    this.parseWidgetsOnLoad = parseWidgetsOnLoad;
    this.fetchAllDataOnload = fetchAllDataOnload;
    this.searchDataFunc = searchDataFunc;
}

//initialize object for the class
AsyncSearchControl.prototype.initialize = function () {
    var asyncSearchControl = this; // copy the object reference and use it in inner functions 

    require(["dojo/dom",
            "dojo/parser", "dijit/registry",
            "dijit/Menu", "dijit/MenuItem", "dijit/MenuSeparator",
            "dijit/form/ComboButton", "dijit/form/ComboBox",
            "dijit/form/Select",
            "dijit/form/TextBox", "dijit/form/Button",
            "dojo/dom-construct", "dojo/on", "dojo/query", "dojo/keys",
             "dojo/store/Memory", "dojo/domReady!"],
        function (dom, parser, registry, Menu, MenuItem, MenuSeparator,
            ComboButton, ComboBox, Select, TextBox, Button,
            domConstruct, on, query, keys, Memory) {
                // set wigets ids
                var buttonComboButton = null;
                var menu = new dijit.Menu({ style: "display: none;" });
                var separatorAdded = false;
                var buttonComboButtonId = asyncSearchControl.searchTextLabelId + "_field";

                for (i = 0; i < asyncSearchControl.menuItemLabels.length; i++) {
                    if (i >= 2 && asyncSearchControl.useAdditionalFields) {
                        var menuItemSeparator = new dijit.MenuSeparator({});
                        menu.addChild(menuItemSeparator);
                    }
                    var menuItem = new dijit.MenuItem({
                        label: asyncSearchControl.menuItemLabels[i],
                        onClick: function () {
                            //change control label
                            buttonComboButton.set('label', this.label);
                        }
                    });
                    menu.addChild(menuItem);
                }

                buttonComboButton = new dijit.form.ComboButton({
                    id: buttonComboButtonId,
                    label: asyncSearchControl.menuItemLabels[0],
                    dropDown: menu
                });
                // add combobutton to the control
                if(dom.byId(asyncSearchControl.searchTextLabelId) != null)
                    dom.byId(asyncSearchControl.searchTextLabelId).appendChild(buttonComboButton.domNode);
                // create search button
                var searchTextLabel = $('#' + asyncSearchControl.searchLabelId).text();
                var searchButton = new dijit.form.Button({
                    label: searchTextLabel,
                    onClick: function () {
                        asyncSearchControl.searchDataEvent();
                    }
                }, asyncSearchControl.searchBtnId);

                debugMessageToConsole("asyncSearchControl.searchBtnId: " +
                    asyncSearchControl.searchBtnId, lowLevel);
                if (asyncSearchControl.parseWidgetsOnLoad) {
                    // now parse control widgets div
                    parser.parse(dom.byId("controlSearchDiv")).then(function () {
                        ///debugMessageToConsole('parsing complete postback call...', 1);
                        asyncSearchControl.registerKeyPressed();
                    });
                }
            });
}

// some amination 
AsyncSearchControl.prototype.basicFadeoutSetup = function() {
    // Function linked to the button to trigger the fade.
    dojo.style(this.hoderDivId, "display", "");
    var fadeArgs = {
        node: "controlSearchDiv",
        duration: 1000
    };
    dojo.fadeIn(fadeArgs).play();
}

// search data event handler
AsyncSearchControl.prototype.searchDataEvent = function () {
    var patternText = dijit.byId(this.searchTextId);
    var searchColumnValue = "";
    var filterValue = "";
    var serviceUrlWithParams = this.serviceURL;
    var buttonComboButtonId = this.searchTextLabelId + "_field";

    var buttonCombo = dijit.byId(buttonComboButtonId);
    for (i = 0; i < this.menuItemLabels.length; i++) {
        if (buttonCombo != null && buttonCombo.label == this.menuItemLabels[i]) {
            //logMessageToConsole('field: ' + buttonCombo.label, 2);
            searchColumnValue = this.menuItemValues[i];
            break;
        }
    }
    // select criteria value
    var searchCriteria = dijit.byId(this.searchCriteriaSelectId);
    filterValue = searchCriteria.get('value');
    debugMessageToConsole("this.itemsGridDivId: " + this.itemsGridDivId, lowLevel);
    // add params to URL
    serviceUrlWithParams = this.serviceURL + "filter=" + filterValue
    + "&searchColumn=" + searchColumnValue 
    + "&pattern=" + patternText.get('value');
    this.searchDataFunc(this.itemsGridDivId, serviceUrlWithParams);
}

    
// register key pressed event   
AsyncSearchControl.prototype.registerKeyPressed = function() {
    var asyncSearchControl = this;
    debugMessageToConsole("id text: " + this.searchTextId, lowLevel);
    $('#' + this.searchTextId).bind("keypress", function (e) {
        if (e.keyCode == 13) {
            debugMessageToConsole(" key pressed fired... ", lowLevel);
            asyncSearchControl.searchDataEvent();
            return false;
        }
    });
}


AsyncSearchControl.prototype.displayControl = function () {
    //debugMessageToConsole("displayControl postback call highLevel");
    //dojo.style(this.hoderDivId, "display", "");
    $('#' + this.hoderDivId).attr('style', '');
}

AsyncSearchControl.prototype.loadAllData = function() {
    var serviceUrlWithoutParams = this.serviceURL + "filter=&searchColumn=&pattern=";
    debugMessageToConsole("this.itemsGridDivId: " + this.itemsGridDivId, lowLevel);
    this.searchDataFunc(this.itemsGridDivId, serviceUrlWithoutParams);
}


AsyncSearchControl.prototype.loadControl = function () {
    var asyncSearchControl = this;
    require(["dojo/ready"], function (ready) {
        //dojo.ready(asyncSearchControl.displayControl);
        asyncSearchControl.displayControl();
        // fetch all data by default. We can customize this loading also
        if (asyncSearchControl.fetchAllDataOnload)
            asyncSearchControl.loadAllData();
    });
}