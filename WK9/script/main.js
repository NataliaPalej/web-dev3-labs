// Rot URL foe RESTful api
var rootURL = 'http://localhost/WK9/api/wines';
var currentWine;



// CRUD METHODS
var serach=function(searchKey){
    if(searchKey == ''){
        finalAll();
    } else {
        findByName(searchKey);
    }
}

// Call GET method of rest API with the URL
var findAll=function(){
    $.ajax({
        type: 'GET',
        url: rootURL,
        dataType: 'json',
        success: renderList
    });
};

// Call GET method by ID
var findById=function(id){
    console.log("Find by ID method selected");
    console.log("findById: " + id);
    
    $.ajax({
        type: 'GET',
        url: rootURL + '/' + id,
        dataType: "json",
        success: function(data){
            $('#btnDelete').show();
            console.log("findById successs" + data.name);
            currentWine = data;
            renderDetails(currentWine);
        }
    });
};

// Call GET method by NAME
var findByName=function(searchKey){
    console.log("findByName() loading for " + searchKey);
    $.ajax({
        type: 'GET',
        url: rootURL + '/' + searchKey,
        dataType: "json",
        success: function(data){
            $('#btnDelete').show();
            console.log("findById() succeeded: " + data.name);
            currentWine = data;
            renderDetails(currentWine);
        }
    });
};

var newWine=function () {
    console.log("New Wine Function - Empty Fields")
	$('#btnDelete').hide();
	currentWine = {};
    // Display empty form as current wine is currently blank
	renderDetails(currentWine);
};

// Adds new wine, uses formToJSON to parse into JSON
var addWine=function (){
    console.log("addWine function called");
    $.ajax({
        type: 'POST',
        contentType: 'application/json',
        url: rootURL,
        dataType: "json",
        data: formToJSON(),
        success: function(data, textStatus, jqXHR){
            console.log("Wine created successfully");
            $('#btnDelete').show();
            $('#wineId').val(data.id);
            findAll();
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log("addWine error: " + textStatus);
        }
    })
}

// Delete selected wine (passes ID)
var deleteWine=function(){
    console.log("Delete Wine method called.");
    console.log("Wine to delete: " + rootURL + "/" + $('wineId').val())

    $.ajax({
        type: 'DELETE',
        contentType: 'application/json',
        url: rootURL + '/' + $('#wineId').val(),
        success: function(data, textStatus, jqXHR) {
            console.log("Wine " + $('#wineId').val + "successfully deleted.");
            alert("Wine " + $('#wineId').val + "successfully deleted.");
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log("deleteWine() error: " + textStatus);
            alert("deleteWine() error: " + textStatus);
            findAll();
        }
    });
};

// Update wine by its ID
var updateWine=function(){
    console.log("updateWine() loaded");
    $.ajax({
        type: 'PUT',
        contentType: "json",
        url: rootURL + '/' + $('#wineId'.val()),
        data: formToJSON(),
        success: function(data, tesxtStatus, jqXHR) {
            console.log("Wine updated successfully " + $('#wineId'.val()));
            alert("Wine updated successfully " + $('#wineId'.val()));  
            findAll();
        },
        error: function(jqXHR, tesxtStatus, errorThrown) {
            console.log("updateWine() error: " + textStatus);
        }
    });
};

// Render details for all wines
var renderList = function(data){
    console.log("renderList() loading...");
    var list = data.wine;
    //$('#wineList li').remove();
    //$.each(list, function(index, wine){
    //    $('#wineList').append('<li><a href = "#" id=" ' + wine.id + '">' + wine.name + '</a></li>');
	$.each(list, function(index, wine){
        $('#table_body').append('<tr><td>'+wine.name+'</td><td>'+wine.grapes+'</td><td>'+wine.country+'</td><td>'+wine.year+'</td></tr>');
        console.log("renderList method loaded in a table format"); 
    });
    $('#table_id').dataTable();
};

// Render details for particular wine
var renderDetails=function(wine){
    console.log("renderDetails functin selected");
    $('#wineId').val(wine.id);
    $('#name').val(wine.name);
    $('#grapes').val(wine.grapes);
    $('#country').val(wine.country);
    $('#region').val(wine.region);
    $('#year').val(wine.year);
    console.log("Trying to fetch the images")
    $('#pic').attr('src', 'pics/' + wine.picture);
    $('#description').val(wine.description);
};

// Serialize all the form fields into JSON format
var formToJSON = function() {
    var wineId = $('#wineId').val();
    return JSON.stringify({
        "id": wineId == "" ? null : wineId,
        "name" : $('#name').val(),
        "grapes" : $('#grapes').val(),
        "country" : $('#country').val(),
        "region" : $('#region').val(),
        "year" : $('#year').val(),
        "picture" : $('#picture').val(),
        "description" : $('#description').val(),
    });
};

// When DOM is ready
$(document).ready(function(){
    // Nothing to delete in initial state 
    $('btnDelete').hide();

    // Button Search
    $('#btnSearch').click(function(){
        serarch($('#serachKey').val());
        return false;
    });

    // Trigger search when pressing 'Return' on search key input field
	$('#searchKey').keypress(function(e){
		if(e.which == 13) {
			search($('#searchKey').val());
			e.preventDefault();
			return false;
	    }
	});

    // Find By ID
    $('#wineList a').on("click",function() {
		findById($(this).data('identity'));
	});
    $(document).on("click", '#wineList a', function(){findById(this.id);});

    // Insert New Wine
    $('#btnAdd').click(function(){
        newWine();
        return false;
    });

    // Save Wine
    $('#btnSave').click(function(){
        if ($('#wineId'.val() == '')){
            addWine();
        } else {
            updateWine();        
        }   
        return false;
    });

    // Delete Wine
    $('#btnDelete').click(function(){
        deleteWine();
        return false;
    });

    // Replace broken images with generic wine bottle
    //$("img").error(function(){
    //    $(this).attr("src", "pics/generic.jpg");
    //});


    // Reset the form to empty fields
    $('#wineId').val("");
    $('#name').val("");
    $('#grapes').val("");
    $('#country').val("");
    $('#region').val("");
    $('#year').val("");
    $('#pic').attr('src', "");
    $('#description').val("");
    // Call findAll method
    findAll();
});
