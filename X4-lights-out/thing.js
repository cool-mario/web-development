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
        let topIndex = target.parent().index();
        let topRow = $("tr").eq(topIndex-1);
        topRow.find("td").eq(index).toggleClass("on");

        let bottom = target.parent().index();
        let bottomRow = $("tr").eq(bottom+1);
        bottomRow.find("td").eq(index).toggleClass("on");

        let table = $("table");
        // loop thru lights
        for ()

    });


  });