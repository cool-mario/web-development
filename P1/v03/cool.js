$(document).ready(()=>{

    let questions = $("form > p");
    let inputs = $("input[type='radio']");
    let labels = $("form > div > label");

    // loop thru all inputs
    // for (let i = 0; i < inputs.length; i++){
    //     let input = inputs.eq(i);
        // console.log(input);

        // if (input.prop("checked")){
        //     input.prev().addClass("answered");
        // }


    // }

    $('input').on("click", (event) => {

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

    $("input").on("change", (event) => {
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


});