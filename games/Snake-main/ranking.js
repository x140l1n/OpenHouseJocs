var players = [];

export function rankPlayer(name, points){
    var player = {
        name: name,
        score: points
    }
    //sortRanking();
    players.push(player);
    console.log(players);
}

function sortRanking(){
    /*players.sort((a, b)=>{
        if (a.points > b.points) {
            
        }
    })*/
}



