$(document).ready(()=>{

    let questions = $("form > p");
    let inputs = $("input[type='radio']");

    // loop thru all inputs
    for (let i = 0; i < inputs.length; i++){
        let input = inputs.eq(i);
        console.log(input);

        // if (input.prop("checked")){
        //     input.prev().addClass("answered");
        // }


    }

    $('input').on("click", (event) => {

        let target = $(event.target);

        console.log(target);
        if (target.prop("checked")){
            target.toggleClass("answered");
        } 
    });


});