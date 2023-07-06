$(document).ready(()=>{

    let labels = $("form > div > label");
    let testInputs = $('div:not(.pretest) input'); // wierdest css selector I have to date!! (selects all inputs that are in divs that don't have the class "pretest")

    // HIDE ALL TEST QUESTIONS
    $("div.pretest").nextAll().hide();

    // loop thru all inputs
    // for (let i = 0; i < inputs.length; i++){
    //     let input = inputs.eq(i);
        // console.log(input);

        // if (input.prop("checked")){
        //     input.prev().addClass("answered");
        // }


    // }

    testInputs.on("click", (event) => {

        let target = $(event.target);

        if (target.prop("checked")){
            // adds class to div
            target.parent().addClass("answered");

            // add the selected class for highlighting
            target.next().addClass("selected");

            // loop thru all inputs and update their color
            // add class to text that the user chose
            for (let i = 0; i < labels.length; i++){
                let label = labels.eq(i);
                if (!label.prev().prop("checked")){ // if it's not checked, remove the class
                    label.removeClass("selected");
                }
            }
        } 
    });

    testInputs.on("change", (event) => {
        let target = $(event.target);
        // adds class to div so it's now answered
        target.parent().addClass("answered");
        console.log(target.val());

    });

    // for the drop downs
    $("select").on("change", (event) => {
        let target = $(event.target);
        // adds class to div
        if (target.val() == "---"){ // "---" is the default option, so if that is selected than the user has not answered
            target.parent().removeClass("answered");
            target.removeClass("selected");
        } else {
            target.parent().addClass("answered");
            target.addClass("selected");
        }

    });


    $("#pretestButton").on("click", (event) => {
        $("div.pretest").hide(1000);
        $("div.pretest").nextAll().show(1000);
    });

    // reveals the pretest again in case the user did something wrong there. otherwise they just submit the form
    $("input[type=submit]").on("click", (event) => {
        $("div.pretest").show();

    });


});