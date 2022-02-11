 
/**
 * CustomDialogDataGridControl class description
 * Author: Guy Bami
 * Last changed: 02.05.2015
 */
/**
 * The constructor
 * @param {type} objectFields
 * @returns {CustomDialogDataGridControl}
 */
function CustomDialogDataGridControl(objectFields){
    // fields members: componentId
    this.controlId = objectFields.controlId || "_CustomDialogDataGridControl"; // Unique DOM control id
    this.holderId = objectFields.holderId; // place holder control id
    this.jsonData = objectFields.jsonData || [];
    // text fields
    this.loadingMessage = objectFields.loadingMessage || "loading data. Please wait..";
    this.noDataMessage =  objectFields.noDataMessage || "No data found";
    this.errorMessage = objectFields.errorMessage || "error occured while loading...";
            
    this.entityKeyFieldName = objectFields.entityKeyFieldName || "id";
    this.itemsGridDivId = this.controlId +  "_itemsDataGridDiv";
    this.itemsGridId = this.itemsGridDivId + "_Grid";
    
    this.gridDefaultPageSize = objectFields.gridDefaultPageSize || 20;
    this.gridDefaultClass = objectFields.gridDefaultClass || "dataGridItemsScroll";
    this.layout = objectFields.layout || [];
    this.itemsName = objectFields.itemsName || "DialogItems";
    this.sortColIndex = objectFields.sortColIndex || 1;
    this.sortDirection = objectFields.sortDirection === true;
    this.dialogTitle = objectFields.dialogTitle || "Items dialog";
    this.displayMode = objectFields.displayMode || "EDIT"; // edit or view mode
    this.selectionMode = objectFields.selectionMode || "single",
    this.selectionChangedEvent = objectFields.selectionChangedEvent || function(){};
    this.filterExpression = objectFields.filterExpression || "";
    this.parsed = false;
    //set datagrid field columns
    this.dataColumnFields = [];
    this.dataColumnFields.push(this.entityKeyFieldName);
    for(var i = 0; i < this.layout.length; i++){
        var column = this.layout[i];
        this.dataColumnFields.push(column.field);
    }
    
    // default fields
    this.itemsDataStore = null;
    this.itemsDataGrid = null;
    
    self = this;
    //alert('constructor CustomDialogDataGridControl');
}

CustomDialogDataGridControl.prototype.renderAndParse = function(){
     
    var controlHtml = 
      '<div  data-dojo-type="dijit/Dialog" data-dojo-id="' + this.controlId + '" id="' + this.controlId + '" '
    + '    title="' + this.dialogTitle +' "> '
    + '    <table class="fullWidth">'
    + '       <tr>'
    + '            <td class="toCenter fullWidth">'
    + '                <div class="cssDialogScroll_autoHeight">'
    + '                    <div   id="' + this.itemsGridDivId + '"></div>'
    + '                </div>'
    + '            </td>'
    + '        </tr>'
    + '    </table>'
    + '</div>';
    $("#" + this.holderId).addClass("hideContent");
    $("#" + this.holderId).html(controlHtml);
    
     
    var holderCss = "width:" + ($(window).width() * 0.9) + "px;" 
    	+ "height: " + ($(window).height() * 0.8) + "px;overflow-x:hidden;";
    $("#" + this.itemsGridDivId).attr('style', holderCss);
    //alert(holderCss);
    var self = this;
    if(this.parsed == true){
    	return;
    }
    require(["dojo/parser", "dojo/dom"],
		function (parser, dom) {
            parser.parse(dom.byId(self.holderId)).then(function () {
            	self.parsed = true;
            });
            
	});
    
};
  

CustomDialogDataGridControl.prototype.generateCustomDataGrid = 
	   function() {

	    if (this.jsonData == null) {
	        logError({message : "generateCustomDataGrid>>json data is invalid!"});
	        return;
	    }
	    else if (this.jsonData.length == 1 && this.jsonData[0].jsonErrorMessage != null) {
	        logError({message: "generateCustomDataGrid>> json Data is invalid!" + this.jsonData[0].jsonErrorMessage});
	        return;
	    }

	    // set dimensions and div size
	    var setAutoHeight = getDataGridAutoHeight(this.jsonData.length, this.gridDefaultPageSize);
	    var gridDivId = null;
	    var gridId = null;
	    
	    gridDivId = this.itemsGridDivId;
	    gridId = this.itemsGridId;
	    if (!setAutoHeight)
	        $("#" + gridDivId).attr("class", this.gridDefaultClass);

	    var dataStore = new dojo.data.ItemFileWriteStore({
	        data: {
	            identifier: this.entityKeyFieldName,
	            items: this.jsonData
	        }
	    });

	    function saveDone() {
	        debugMessageToConsole("Done saving data store.", lowLevel);
	    }

	    function saveFailed() {
	        logError({message : "Save failed data store."});
	    }

	    if (dataStore !== null) {
	        // save data store
	        dataStore.save({ onComplete: saveDone, onError: saveFailed });
	        // custom sorting fields
	        dataStore.comparatorMap = {};
	        var sortField = this.layout[this.sortColIndex - 1].field;
	         
	        dataStore.comparatorMap[sortField.toString()] = compareStringIgnoreCase;
	        //destroy old controls
	        if (destroyWidget !== null && typeof destroyWidget === 'function'){
	            destroyWidget(gridId);
	        }
	          
	        // create datagrid
	        var generatedGrid = new dojox.grid.EnhancedGrid({
	            id: gridId,
	            store: dataStore,
	            structure: this.layout,
	            rowSelector: false,
	            autoWidth: false, //getGridAutoWidth(this.jsonData.length),
	            autoHeight: false, //getDataGridAutoHeight(this.jsonData.length, gridDefaultPageSize),
	            loadingMessage: this.loadingMessage,
	            noDataMessage: this.noDataMessage,
	            errorMessage: this.errorMessage,
	            selectionMode: this.selectionMode,
	            query: this.filterExpression,
	            plugins: {
	                indirectSelection: { headerSelector: true, width: "20px", 
	                    styles: "text-align: center;" },
	                pagination: {
	                    pageSizes: ["50", "100", "200", "All"],
	                    description: true,
	                    sizeSwitch: true,
	                    pageStepper: true,
	                    gotoButton: true,
	                    defaultPageSize: this.gridDefaultPageSize,
	                    //page step to be displayed
	                    maxPageStep: 4,
	                    //position of the pagination bar
	                    position: "bottom"
	                },
	                filter: {
	                    // Show the closeFilterbarButton at the filter bar
	                    closeFilterbarButton: true,
	                    // Set the maximum rule count to 5
	                    ruleCount: 5,
	                    // Set the name of the items
	                    itemsName: this.itemsName
	                }
	            }
	        });
	        
	        this.itemsDataStore = dataStore;
	        this.itemsDataGrid = generatedGrid;
	        this.itemsDataGrid.on("SelectionChanged", this.selectionChangedEvent);
	        // add event trigger and parse data
	        if(setSortColumnsIndexes !== 'undefined'){
	            setSortColumnsIndexes(generatedGrid, this.sortColIndex, this.sortDirection);
	    	}
	        if(this.filterExpression != null && this.filterExpression != ""){
	        	//generatedGrid.filter(this.filterExpression);
	        	
	        }
	        generatedGrid.placeAt(gridDivId);
	        generatedGrid.startup();
	    }
};

 

CustomDialogDataGridControl.prototype.getSelectedItems = function() {

    if(this.itemsDataStore != null && this.itemsDataGrid != null){
        var selectedItems = [];
        this.itemsDataStore.fetch( {    
            onItem: function(item) {
            	selectedItems.push(item);
            }
        });
        return selectedItems;
    }
};


CustomDialogDataGridControl.prototype.showDialog = function(){
	
	var dialogControl = dijit.byId(this.controlId);
    if (dialogControl != null) {
    	dialogControl.show();
    }
};


CustomDialogDataGridControl.prototype.hideDialog = function(){
	
	var dialogControl = dijit.byId(this.controlId);
    if (dialogControl != null) {
    	dialogControl.hide();
    }
};

CustomDialogDataGridControl.prototype.refresh = function(){
	this.itemsDataGrid.sort();
};

CustomDialogDataGridControl.prototype.clearSelection = function(){
	this.itemsDataGrid.selection.clear();
};


CustomDialogDataGridControl.prototype.getItemsDataGrid = function() {
    return this.itemsDataGrid;
};

 