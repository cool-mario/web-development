$(document).ready(function(){


    // $("tr td+td+td").addClass("on");


    let level = 1;

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

        // if one of them is not on, win is false
        if (!allTD.hasClass("on")){
            // WIN!!!!
            $("#winText").toggleClass("hidden");
            

        }
    });

    // extra credit stuff




    // reset
    $("#reset").click(() => {
        reset();
        
    });

    function reset(){
        $("td").removeClass("on"); // delete all the on blocks
        if (level == 2){
            level2();
        } else if (level == 3){
            level3()
        }
    }

    function level1(){
        reset();
        for (let i = 1; i < 4; i++){
            $("tr").eq(i).children().eq(2).addClass("on");
        }
    }

    function level2(){
        reset();
        $("td").eq(7).addClass("on");
        $("td").eq(11).addClass("on");
        $("td").eq(13).addClass("on");
        $("td").eq(17).addClass("on");
    }

    function level3(){
        reset();
        $("td").eq(1).addClass("on");
    }



  });
