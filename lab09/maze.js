"use strict";

var loser = null;  // whether the user has hit a wall

window.onload = function() {
    $("start").onclick = startClick;
    $("end").observe("mouseover",overEnd);
    document.body.observe("mousemove",overBody);
    var boundaries = $$("div#maze div.boundary");
    for(var i = 0 ; i < boundaries.length ; i++){
        boundaries[i].onmouseover = overBoundary;
    }  
};

// called when mouse enters the walls; 
// signals the end of the game with a loss
function overBoundary(event) {
    if(loser === false){
        loser = true;
        var boundaries = $$("div#maze div.boundary");
        for (var i = 0 ; i < boundaries.length ; i++) {
            boundaries[i].addClassName("youlose");
        }
        $("status").textContent = "You lose! :(";    
    }
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
    loser = false;
    var boundaries = $$("div#maze div.boundary");
    for(var i = 0 ; i < boundaries.length ; i++){
        boundaries[i].removeClassName("youlose");
    }
    $("status").textContent = "Find the end";    
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
    if(loser == false){
        $("status").textContent = "You win! :)";
        loser = true;      
    }
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
    var xy = $("maze").positionedOffset();
    if(loser === false){
        if(xy.left > event.clientX || xy.right < event.clientX){
            loser = true;
            var boundaries = $$("div#maze div.boundary");
            for (var i = 0 ; i < boundaries.length ; i++) {
                boundaries[i].addClassName("youlose");
            }
            $("status").textContent = "You lose! :(";    
        }
    }
}



