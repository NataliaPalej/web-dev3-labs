$(document).ready(function(){
    // Example 1
    $("h1").text("HELLO WORLD!");

    // Example 2
    //$(":button").remove();
    //let price = $("<p>From $399.99</p>");
    //$(".vacation").after(price);
    
    // Example 3
    $(":button").click(function(){
        $(":button").remove();
        let price = $("<p>From $399.99</p>");
        $(".vacation").after(price);
    })
    
});

