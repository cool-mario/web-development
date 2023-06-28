$(document).ready(()=>{
    // remove oldclassfrom1997
    $("ul").removeClass("oldclassfrom1997");

    //add class songerrors to longsongs and irrationalsongs
    $("#irrationalsongs").addClass("songerrors");
    $("#longsongs").addClass("songerrors");

    // remove the h4 elements in id futuremovies. 
    $("#futuremovies h4").remove();
    $("#futuremovies").append($("#futuremovies p"));
    
    // moved header element to top of body with prepend
    $("body").prepend($("header"));

    // added class "meta_irony" to the "Ironic" list item
    $("#irrationalsongs ul li+li+li+li").addClass("meta_irony");

    // made text boxes "required" using prop
    $("input[type=text]").prop("required",true);

    // select the dogs div text, and make it smaller (10px)
    $("#dogs li").eq(-3).css("font-size","10px");


    // extra credit
    // remove the inline css in the divs
    $("#futuremovies, #deadmovies").removeAttr("style");

    // remove the h4 elements with the repeat class
    $("#deadmovies h4.repeat").remove();

    // add a class to both divs that refer to movies
    $("#futuremovies, #deadmovies").addClass("movieerrors");

});
