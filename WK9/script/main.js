var rootURL = 'http://localhost/WK9/api/wines';
var currentWine;

// When DOM is ready
$(document).ready(function(){
    // Set listener for onClick event of the list
    $(document).on("click", "#wineList a", function(){findById(this.id);})
    // Insert New Wine
    $(document).on("click", "#btnAdd", function(){newWine();})
    // Save Wine
    $(document).on("click", "#btnSave", function(){addWine();})

    // Reset the form to empty fields
    $('#wineId').val("");
    $('#name').val("");
    $('#grapes').val("");
    $('#country').val("");
    $('#region').val("");
    $('#year').val("");
    console.log("Trying to fetch the images")
    $('#pic').attr('src', "");
    $('#description').val("");

    //alert("Loaded DOM");
    // Call findAll method
    findAll();
});

// Call GET method of rest API with the URL
var findAll=function(){
    $.ajax({
        type: 'GET',
        url: rootURL,
        dataType: 'json',
        success: renderList
    });
};

// Call GET method for one wine 
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

var newWine=function () {
    console.log("New Wine Function - Empty Fields")
	$('#btnDelete').hide();
	currentWine = {};
    // Display empty form
	renderDetails(currentWine);
};

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

// Render details for all wines
console.log("Trying to parse wine to the list");
var renderList = function(data){
    var list = data.wine;
 //   alert("Loaded rendeer");
    $('#wineList li').remove();
    $.each(list, function(index, wine){
        $('#wineList').append('<li><a href = "#" id=" ' + wine.id + '">' + wine.name + '</a></li>');
		console.log("renderList method loaded");
    });
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