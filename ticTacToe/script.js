let playerX, playerO, movements=0;
let movesX = new Array();
let movesY = new Array();

function start() {
    playerO = document.getElementById("playerO").value;
    playerX = document.getElementById("playerX").value;
    document.getElementById("modalBackground").style.display = 'none';
    document.getElementById("playerTurn").innerText = playerX;
}

function gameMove(id) {
    let box = document.getElementById(id);

    if(box.style.display == "block")
        return;

    movements++;
    if(movements%2 != 0) {
        box.style.background = "url(img/x.png) no-repeat center";
        document.getElementById("playerTurn").innerText = playerO;
        movesX.push(id);
        stateVerify(movesX, playerX);
    } else {
        box.style.background = "url(img/o.png) no-repeat center";
        document.getElementById("playerTurn").innerText = playerX;
        movesY.push(id);
        stateVerify(movesY, playerO);
    }

    box.style.display = "block";
}

function restart() {
    movements=0;
    while(movesX.length) {
        movesX.pop();
    }
    while(movesY.length) {
        movesY.pop();
    }
    for(i=1; i<10; i++) {
        id = `b${i}`;
        document.getElementById(id).style.display = "flex";
        document.getElementById(id).style.background = "none"
    }
    document.getElementById("modalBackground").style.display = 'none';
}

function stateVerify(moves, player) {
    const win = [
        ["b1", "b2", "b3"],
        ["b4", "b5", "b6"],
        ["b7", "b8", "b9"],
        ["b1", "b4", "b7"],
        ["b2", "b5", "b8"],
        ["b3", "b6", "b9"],
        ["b1", "b5", "b9"],
        ["b3", "b5", "b7"]
    ]

    if(movements == 9) {
        console.log("Empatou");
        //ação de empate
    } else {
        for(i=0; i<8; i++){
            //result é um array com os elementos em comum entre win e moves
            let result = win[i].filter(function (item) {
                return moves.indexOf(item) > -1;
            })
            if(result.length === 3) {
                console.log("venceu!");
                victory(player);
                break;
            }
        }
    }
}

function draw() {
    document.getElementById("modalBackground").style.display = 'flex';
    document.getElementById("modalContent").innerHTML = 
    `<h2>Empate</h2>
    <p>Gostariam de Jogar novamente?</p> 
    <button style='margin-bottom: 20px;' id='restartButton'>Sim</button>`
    document.getElementById("restartButton").addEventListener("click", restart);
}

function victory(player) {
    document.getElementById("modalBackground").style.display = 'flex';
    document.getElementById("modalContent").innerHTML = 
    `<h2>Vitória</h2>
    <p>Parabéns ${player}! Gostaria de Jogar novamente?</p> 
    <button style='margin-bottom: 20px;' id='restartButton'>Sim</button>`
    document.getElementById("restartButton").addEventListener("click", restart);
}