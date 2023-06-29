$(document).ready(function(){


    // $("tr td+td+td").addClass("on");

    // when square is clicked turn it on
    $("td").on ("click", (event) => {
        let target = $(event.target);
		target.toggleClass("on"); // the one you clicked

        let index = target.index(); // get the index of the td in tr


        let right = target.next();
        right.toggleClass("on");

        let left = target.prev();
        left.toggleClass("on");

        // probably overcomplicated it lol
        let top = target.parent().prev().children().eq(index);
        top.toggleClass("on");


        let bottom = target.parent().next().children().eq(index);
        bottom.toggleClass("on");

        // let bottom = target.parent().index();
        // let bottomRow = $("tr").eq(bottom+1);
        // bottomRow.find("td").eq(index).toggleClass("on");



        let allTD = $("td");
        // let win = true;

        // if one of them is not on, win is false
        if (!allTD.hasClass("on")){
            $("#winText").toggleClass("hidden");
        }

      

    });


  });