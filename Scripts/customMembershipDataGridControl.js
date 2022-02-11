 
/**
 * CustomMembershipDataGridControl class description
 * Author: Guy Bami
 * Last changed: 07.02.2015
 */
 
var EntityGUI = 0;

/**
 * The constructor
 * @param {type} objectFields
 * @returns {CustomMembershipDataGridControl}
 */
function CustomMembershipDataGridControl(objectFields){
    // fields members: componentId
    this.controlId = objectFields.controlId || "_CustomDataGridControl"; // Unique DOM control id
    this.holderId = objectFields.holderId; // place holder id
    
    this.insertEntitiesImgId = objectFields.controlId  + "_insertEntitiesImg";
    this.removeEntitiesImgId = objectFields.controlId + "_removeEntitesImg";
    
    // text fields
    this.entitiesDivHeaderText = objectFields.entitiesDivHeaderText ||  "Members of Groups";
    this.availableEntitiesDivHeaderText = objectFields.availableEntitiesDivHeaderText ||  "Available Members";
    this.loadingMessage = objectFields.loadingMessage || "loading data. Please wait..";
    this.noDataMessage =  objectFields.noDataMessage || " ";//"no Data found";
    this.errorMessage = objectFields.errorMessage || "error occured while loading...";
            
    this.entityKeyFieldName = objectFields.entityKeyFieldName || "id";
    this.entitiesGridDivId = this.controlId +  "_entitiesDataGridDiv";
    this.entitiesGridId = this.entitiesGridDivId + "_Grid";
    this.availableEntitiesGridDivId = this.controlId +  "_availableEntitiesDiv";
    this.availableEntitiesGridId = this.availableEntitiesGridDivId + "_Grid";
    // added 03.10.15
    this.controlBtnsColDivId = this.controlId + "_controlBtnsColDiv";
    this.availableEntitiesColDivId = this.controlId + "_availableEntitiesColDiv";
    
    this.gridDefaultPageSize = objectFields.gridDefaultPageSize || 20;
    this.gridDefaultClass = objectFields.gridDefaultClass || "dataGridItemsScroll";
    this.layout = objectFields.layout || [];
    this.itemsName = objectFields.itemsName || "Entities";
    this.sortColIndex = objectFields.sortColIndex || 1;
    this.sortDirection = objectFields.sortDirection === true;
    
    this.insertEntityImg = objectFields.insertEntityImg || "../../Images/Buttons/insertItem_icon.gif";
    this.removeEntityImg = objectFields.removeEntityImg || "../../Images/Buttons/removeItem_icon.gif";
    
    this.insertEntityImgTooltip = objectFields.insertEntityImgTooltip || "Assign entities to group";
    this.removeEntityImgTooltip = objectFields.removeEntityImgTooltip || "Remove entities from group";

    this.displayMode = objectFields.displayMode || "EDIT"; // edit or view mode
    
    //set datagrid field columns
    this.dataColumnFields = [];
    this.dataColumnFields.push(this.entityKeyFieldName);
    for(var i = 0; i < this.layout.length; i++){
        var column = this.layout[i];
        this.dataColumnFields.push(column.field);
    }
    
    // default fields
    this.availableEntitiesDataStore = null;
    this.entitiesDataStore = null;
    this.availableEntitiesDataGrid = null;
    this.entitiesDataGrid = null;
    
    classReference = this;
}

CustomMembershipDataGridControl.prototype.render = function(){
    var availableEntitiesDivCss = "";
    var controlBtnsDivCss = "";

    var controlHtml = '<table class="fullWidth" cellpadding="0" cellspacing="0">'
            + '<tr>'
                + '<td align="center">'
                    + '<table class="fullWidth" cellpadding="0" cellspacing="0">'
                        + '<tr>'
                            + '<td class="toLeft">'
                                + '<fieldset class="toLeft fieldSet">'
                                    + '<legend class="legendTitle toLeft">'
                                        + '<span>' + this.entitiesDivHeaderText + '</span>'
                                    + '</legend>'
                                    + '<div class="dataGridItemsScroll" id="' + this.entitiesGridDivId +'">'
                                    + '</div>'
                                + '</fieldset>'
                            + '</td>';
    if (this.displayMode == "EDIT") {
        controlBtnsDivCss = "";
    }
    else {
        // VIEW mode
        controlBtnsDivCss = "hideContent";
        availableEntitiesDivCss = "hideContent";
    }
            controlHtml += ('<td align="center" id="' + this.controlBtnsColDivId + '" class="' + controlBtnsDivCss + '" >'
                            + '<table cellpadding="3" class="hideBorder fullWidth">'
                                + '<tr>'
                                    + '<td class="toMiddle toCenter">'
                                        + '<img class="imgPointer" id="' + this.insertEntitiesImgId + '" src="' + this.insertEntityImg + '" title="' + this.insertEntityImgTooltip + '"/>'
                                    + '</td>'
                                + '</tr>'
                                + '<tr>'
                                    + '<td class="toMiddle toCenter">'
                                        + '<img class="imgPointer" id="' + this.removeEntitiesImgId + '" src="' + this.removeEntityImg + '" title="' + this.removeEntityImgTooltip + '" />'
                                    + '</td>'
                                + '</tr>'
                            + '</table>'
                        + '</td>');
    		
            controlHtml += ('<td id="' + this.availableEntitiesColDivId + '"  class="toLeft ' + availableEntitiesDivCss + ' ">'
                                + '<fieldset class="toLeft fieldSet">'
                                    + '<legend class="legendTitle toLeft">'
                                        + '<span> ' + this.availableEntitiesDivHeaderText + ' </span>'
                                    + '</legend>'
                                    + '<div class="dataGridItemsScroll" id="'+ this.availableEntitiesGridDivId +'">'
                                    + '</div>' 
                                + '</fieldset>'
                            + '</td>'
                        + '</tr>'
                    + '</table>'
                + '</td>'
            + '</tr>'
        + '</table>');
    $("#" + this.holderId).html(controlHtml);
    // action click of buttons
    var eventData = { control : this};  // data to pass to onclick event
    $("#" + this.insertEntitiesImgId).on("click", eventData, CustomMembershipDataGridControl.prototype.insertEntitiesToGroup);
    $("#" + this.removeEntitiesImgId).on("click", eventData, CustomMembershipDataGridControl.prototype.removeEntitiesFormGroup);

};
  
CustomMembershipDataGridControl.prototype.generateCustomDataGrid = 
            function(jsonData, dataGridType) {
    
    if (jsonData == null || jsonData == null) {
        logError({message : "jsonData is invalid!"});
        return;
    }
    else if (jsonData.length == 1 && jsonData[0].jsonErrorMessage != null) {
        logError({message: "jsonData is invalid!" + jsonData[0].jsonErrorMessage});
        return;
    }

    // set dimensions and div size
    var setAutoHeight = getDataGridAutoHeight(jsonData.length, this.gridDefaultPageSize);
    
    var gridDivId = null;
    var gridId = null;
    if(dataGridType === "entitiesDataGrid"){
        gridDivId = this.entitiesGridDivId;
        gridId = this.entitiesGridId;
    }
    else{
        gridDivId = this.availableEntitiesGridDivId;
        gridId = this.availableEntitiesGridId;
    }
    if (!setAutoHeight)
        $("#" + gridDivId).attr("class", this.gridDefaultClass);

    var dataStore = new dojo.data.ItemFileWriteStore({
        data: {
            identifier: this.entityKeyFieldName,
            items: jsonData
        }
    });

    function saveDone() {
        debugMessageToConsole("Done saving data store.", lowLevel);
    }

    function saveFailed() {
        logError({ message: "Save failed data store." });
    }

    if (dataStore !== null) {
        // save data store
        dataStore.save({ onComplete: saveDone, onError: saveFailed });
        // custom sorting fields
        dataStore.comparatorMap = {};
        //dataStore.comparatorMap["field"] = compareString;
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
            autoWidth: false, //getGridAutoWidth(jsonData.length),
            autoHeight: false, //getDataGridAutoHeight(jsonData.length, gridDefaultPageSize),
            loadingMessage: this.loadingMessage,
            noDataMessage: this.noDataMessage,
            errorMessage: this.errorMessage,
            plugins: {
                indirectSelection: { headerSelector: true, width: "20px", 
                    styles: "text-align: center;" },
                pagination: {
                    pageSizes: ["50", "100", "All"],
                    description: true,
                    sizeSwitch: true,
                    pageStepper: true,
                    gotoButton: true,
                    defaultPageSize: this.gridDefaultPageSize,
                    //page step to be displayed
                    maxPageStep: 3,
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
        
        if(dataGridType == "entitiesDataGrid"){
            this.entitiesDataStore = dataStore;
            this.entitiesDataGrid = generatedGrid;
        }
        else{
            this.availableEntitiesDataStore = dataStore;
            this.availableEntitiesDataGrid = generatedGrid;
        }

        // add event trigger and parse data
        if(setSortColumnsIndexes !== 'undefined'){
            setSortColumnsIndexes(generatedGrid, this.sortColIndex, this.sortDirection);
    	}
        generatedGrid.placeAt(gridDivId);
        generatedGrid.startup();
    }
   
};

 

CustomMembershipDataGridControl.prototype.removeSelectedItems = function(){
    
    if(this.entitiesDataStore !== null && this.entitiesDataGrid !== null){
        var selectedItems = this.entitiesDataGrid.selection.getSelected();
        if(selectedItems !== null){
            for(var i = 0; i < selectedItems.length; i++){
                this.entitiesDataStore.deleteItem(selectedItems[i]);
            }
        }
        
    }
};

 
CustomMembershipDataGridControl.prototype.insertEntitiesToGroup = function(event) {
    
	// get event data passed
	var classReference = event.data.control;
	
	if(classReference == null){
		logError({ message: "reference event.data is null"});
        return;
    }
	//alert('key:' + classReference.entityKeyFieldName);
    if(classReference.availableEntitiesDataStore != null && classReference.availableEntitiesDataGrid != null){
        var selectedItems = classReference.availableEntitiesDataGrid.selection.getSelected();
        if(selectedItems != null && classReference.entitiesDataStore != null){
            for(var i = 0; i < selectedItems.length; i++){
                
                // remove from available grid
                var item = selectedItems[i];
                classReference.availableEntitiesDataStore.deleteItem(item);
                // add entity  
                var itemToAdd = { };
                for(var j = 0; j < classReference.dataColumnFields.length; j++){
                    itemToAdd[classReference.dataColumnFields[j]] = item[classReference.dataColumnFields[j]];
                }
                EntityGUI++;
                //alert("EntityGUI: " + EntityGUI);
                itemToAdd[classReference.entityKeyFieldName] =
                	item[classReference.entityKeyFieldName] + "_" + EntityGUI;
                classReference.entitiesDataStore.newItem(itemToAdd);
            }
        }
        
    }
};


/**
 * removes Entities form dataGrid
 * @returns {void}
 */
CustomMembershipDataGridControl.prototype.removeEntitiesFormGroup = function(event) {

	// get event data passed
	var classReference = event.data.control;
	if(classReference == null){
        logError({ message: "reference event.data is null"});
        return;
    }
    if(classReference.entitiesDataStore != null && classReference.entitiesDataGrid != null){
        var selectedItems = classReference.entitiesDataGrid.selection.getSelected();
        if(selectedItems != null){
            for(var i = 0; i < selectedItems.length; i++){
                // remove from entities datagrid
                var item = selectedItems[i];
                classReference.entitiesDataStore.deleteItem(item);
                // add available entities datagrid
                var itemToAdd = { };
                for(var j = 0; j < classReference.dataColumnFields.length; j++){
                    itemToAdd[classReference.dataColumnFields[j]] = item[classReference.dataColumnFields[j]];
                }
                EntityGUI++;
                itemToAdd[classReference.entityKeyFieldName] =
                	item[classReference.entityKeyFieldName] + "_" + EntityGUI;
                classReference.availableEntitiesDataStore.newItem(itemToAdd);
            }
        }
    }     
};


CustomMembershipDataGridControl.prototype.getEntitiesItemValues = function() {

    if(this.entitiesDataStore != null && this.entitiesDataGrid != null){
        var entitiesItems = [];
        this.entitiesDataStore.fetch( {    
            onItem: function(item) {
               entitiesItems.push(item);
            }
            
        });
        return entitiesItems;
    }
};


CustomMembershipDataGridControl.prototype.switchToEditMode = function () {

    $("#" + this.availableEntitiesColDivId).removeClass("hideContent");
    $("#" + this.controlBtnsColDivId).removeClass("hideContent");
    // refresh
    var grid = dijit.byId(this.availableEntitiesGridId);
    if (grid != null) {
        var store = grid.store;
        grid.setStore(store);
    }
}

CustomMembershipDataGridControl.prototype.switchToViewMode = function () {

    $("#" + this.availableEntitiesColDivId).addClass("hideContent");
    $("#" + this.controlBtnsColDivId).addClass("hideContent");

}




 