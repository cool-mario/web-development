// kettle object

let kettle = {

    temp : 64,
    boil : function(){
        this.temp = 212; // change temp to 212
    }

}

// kettle.temp                64
// kettle.boil()              undefined
// kettle.temp                212

class Kettle {
    constructor(filled){
        this.filled = filled; // the one without "this" is the same as the parameter
    }
}

let teapot = new Kettle(false);

// here is the console://///////////////////////////////////////////
/*
teapot
    Kettle {filled: false}

teapot.filled
    false

let coffeepot = new Kettle(true);
    undefined
    
coffeepot
    Kettle {filled: true}

*/