$(document).ready(function(){


    let level = 1;
    setLevel();

    // when square is clicked turn it on
    $("td").on ("click", (event) => {
        let target = $(event.target);
		target.toggleClass("on"); // the one you clicked

        let index = target.index(); // get the index of the td in tr


        let right = target.next();
        right.toggleClass("on");

        let left = target.prev();
        left.toggleClass("on");

        // go to the parent, go to the previous row, go into its children, and go to the same index
        let top = target.parent().prev().children().eq(index);
        top.toggleClass("on");


        let bottom = target.parent().next().children().eq(index);
        bottom.toggleClass("on");

        // over complicated version
        // let bottom = target.parent().index();
        // let bottomRow = $("tr").eq(bottom+1);
        // bottomRow.find("td").eq(index).toggleClass("on");

        // $("tr").eq(target.parent().index()+1).find("td").eq(index).toggleClass("on");


        let allTD = $("td");

        // if one of them is not on, win is false
        if (!allTD.hasClass("on")){
            // WIN!!!!
            $("#winText").toggleClass("hidden");
            level++;
            $("#level").text("Level: " + level);
            // change to new level
            setLevel();

        } else {
            $("#winText").addClass("hidden");
        }
    });

    // extra credit stuff here

    // reset BUTTON
    $("button#reset").click(() => {
        $("#winText").addClass("hidden");
        level = 1; // go back to level 1
        $("#level").text("Level: " + level);
        clear();
        setLevel();
    });

    function clear(){
        $("td").removeClass("on"); // make everything empty
    }
    // change to new level
    function setLevel(){
        if (level == 1){
            level1();
        } else if (level == 2){
            level2();
        } else if (level == 3){
            level3();
        } else if (level == 4){
            level4();
        } else if (level == 5){
            level5();
        }
    }

    function level1(){
        $("td").eq(0).addClass("on");
        $("td").eq(6).addClass("on");
        $("td").eq(12).addClass("on");
        $("td").eq(18).addClass("on");
        $("td").eq(24).addClass("on");
    }

    function level2(){
        for (let i = 1; i < 4; i++){
            $("tr").eq(i).children().eq(2).addClass("on");
        }
    }

    function level3(){
        $("td").eq(7).addClass("on");
        $("td").eq(11).addClass("on");
        $("td").eq(13).addClass("on");
        $("td").eq(17).addClass("on");
    }

    function level4(){
        for (let i = 0; i < 3; i++){
            $("td").eq(i).addClass("on");
        }
    }

    function level5(){
        $("td").eq(8).addClass("on"); // 5 levels!
    }



  });