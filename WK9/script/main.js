var rootURL = 'http://localhost/WK9/api/wines';
var currentWine;

// When DOM is ready
$(document).ready(function(){
    alert("Loaded DOM");
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

console.log("Trying to parse wine to the list");
var renderList = function(data){
    var list = data.wine;
    alert("Loaded rendeer");
    $('#wineList li').remove();
    $.each(list, function(index, wine){
        $('#wineList').append('<li><a href = "#" id=" ' + wine.id + '">' + wine.name + '</a></li>');
    });
};
