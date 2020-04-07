$(document).ready(function(){
    var canvas = document.getElementById("game");
    var context = canvas.getContext("2d");
    var timer = document.getElementById("timer");

    // damit die Bilder nicht gestaucht/gestreckt werden, aber trotzdem die Größe des Canvas geändert wird
    $(canvas)
    .prop("width", window.innerWidth-200)
    .prop("height", window.innerHeight-200);

    // Darstellungseinstellungen
    context.webkitImageSmoothingEnabled = false;
    context.mozImageSmoothingEnabled = false;
    context.imageSmoothingEnabled = false;
    context.imageSmoothingQuality = "high";

    // für Platzberechnung benötigte Variablen
    let canvasWidth = window.innerWidth-200;
    let canvasHeight = window.innerHeight-200;
    // Wie viele Maulwürfe, will man haben
    let amount = 6;
    let rows = 2;
    let rowDifference = 300;
    let startPosLeft = 0;
    let startHeight = 0;

    // Mole Werte
    let mWidth = 200;
    let mHeight;
    let abstand = (canvasWidth - (mWidth*(amount/rows)))/((amount/rows)+1);

    // Tunnel Werte
    let tWidth = 250;
    let tHeight;
    let tAbstand = (canvasWidth - (tWidth*(amount/rows)))/((amount/rows)+1);

    // Sprites
    var sprite = new Image();
    var tunnel = new Image();

    // setzen der Sprites
    sprite.src = "../images/mole.svg"
 
    tunnel.loaded = false;
    tunnel.onload = function() {
        this.loaded = true;
        drawTunnel();
    }
    tunnel.src = "../images/tunnel.svg"
    

    // Timer
    let time = 10; // in Sekunden
    let timeID; // zum Stoppen, wenn Zeit abgelaufen
    function drawElapsedTime() {
        if(time < 0) {
            clearInterval(timeID);
        } else {
            $(timer).text(time + " secs");
            time--;   
        }
    }

    // counter
    let counter = 0;
    function drawCount() {
        counter++;
        $(score).text(counter + " Hits");  
    }

    // Auswählen von Tunnel
    let hole;
    let oldhole;
    function chooseHole() {
        if(time < 0) {
            clearInterval(holeID);
        } else {
            hole = (Math.round(Math.random() * 100)) % amount; 
            if(hole == oldhole && Math.random() > 0.35) { // weighted randomness: in 65% der Fälle wird neue Zahl ausgewählt, falls das alte Hole, dem neuen entspricht
                hole = (hole + 1) % amount;
            }
            oldhole = hole
            drawMole(hole); // Funktion drawMole aufrufen
        }
    }

    // let the mole appear/disappear
    let currentMoleX;
    let currentMoleY;
    let molePos; // Array in dem Molepositions gespeichert werden (3 dimensional)

    function drawMole(number) {
        mHeight = mWidth * (sprite.height / sprite.width);

        // Herausfinden, in welcher Reihe und welche Nummer der Maulwurf hat (wenn z.b. 6 Maulwürfe und 2 Reihen, dann 3 pro Reihe)
        let whichRow = Math.floor(number/(amount/rows));
        let rowNumber = number % (amount/rows);

        currentMoleX = startPosLeft+abstand + rowNumber * (mWidth+abstand);
        currentMoleY = startHeight + whichRow * rowDifference;

        let lowererdMole = currentMoleY+100;
        let up = true;

        // wie sich Mole bewegt
        moveID = setInterval(moveMole, 20);
        function moveMole() {
            context.clearRect(0, 0, canvas.width, canvas.height);
            clearInterval();
            drawTunnel();

            if(lowererdMole > currentMoleY && up) {
                context.drawImage(sprite, currentMoleX, lowererdMole-=5, mWidth, mHeight)
            } else if (lowererdMole <= currentMoleY+100) {
                up = false;
                context.drawImage(sprite, currentMoleX, lowererdMole+=5, mWidth, mHeight)
            } else if (lowererdMole > (currentMoleY+100) && !up) {
                clearInterval(moveID);
            }

            // set mole posititon
            molePos = [
                [   // top right corner [x, y]
                    [currentMoleX+(mWidth*0.44)/2, lowererdMole + mHeight * 0.17], 
                    [currentMoleX+(mWidth*0.24)/2, lowererdMole + mHeight * 0.17 + mHeight * 0.33], 
                    [currentMoleX+(mWidth*0.08)/2, lowererdMole + mHeight * 0.17 + mHeight * 0.66]
                ], 
                [   // bottom left corner [x, y]
                    [currentMoleX+mWidth - (mWidth*0.44)/2, lowererdMole + mHeight * 0.17 + mHeight * 0.33], 
                    [currentMoleX+mWidth - (mWidth*0.24)/2, lowererdMole + mHeight * 0.17 + mHeight * 0.66], 
                    [currentMoleX+mWidth - (mWidth*0.08)/2, lowererdMole + mHeight * 0.17 + mHeight]
                ] 
            ];
            console.log(molePos);
        }

    }

    // Zeichnet den Tunnel, aber nur wenn Sprite geladen ist
    function drawTunnel() {
        if(tunnel.loaded) {
            for (let index = 0; index < amount; index++) {
                let whichRow = Math.floor(index/(amount/rows));
                let rowNumber = index % (amount/rows);
                let tunnelPosX = startPosLeft + tAbstand + rowNumber * (tWidth+tAbstand);
                let tunnelPosY = startHeight + whichRow * rowDifference + 150; // + 200 weil tunnel unter mole startet

                // Um Verschiebungen bei Sprites vorzuwirken
                let positioning = ((tWidth-mWidth)/2)-10 ;
                if (index%3 == 0) {
                    tunnelPosX = tunnelPosX + positioning;
                } else if(index%3 == 2) {
                    tunnelPosX = tunnelPosX - positioning;
                }

                tHeight = tWidth * (tunnel.height / tunnel.width);
                context.drawImage(tunnel, tunnelPosX, tunnelPosY, tWidth, tHeight);
                // Im Vordergrund
                context.globalCompositeOperation = 'destination-over';
            }
        } else {
            console.log("Fehler");
        }
    }
    
    // hit detection
    // https://lavrton.com/hit-region-detection-for-html5-canvas-and-how-to-listen-to-click-events-on-canvas-shapes-815034d7e9f8/
    canvas.addEventListener('click', (e) => {
        // Object
        const mousePos = {
            x: e.clientX - canvas.offsetLeft,
            y: e.clientY - canvas.offsetTop
        };

        // schauen ob sich die Maus irgendwo in einer der Drei "Zonen" des Sprites befindet, immer mit top left corner und bottom right corner
        if( // mousePos.x >= top right corner x && mousePos.x <= bottom left corner && mousePos.y >= top right corner && mousePos.y <= bottom left corner 
            mousePos.x >= molePos[0][0][0] && mousePos.x <= molePos[1][0][0] && mousePos.y >= molePos[0][0][1] && mousePos.y <= molePos[1][0][1]
            || mousePos.x >= molePos[0][1][0] && mousePos.x <= molePos[1][1][0] && mousePos.y >= molePos[0][1][1] && mousePos.y <= molePos[1][1][1]
            || mousePos.x >= molePos[0][2][0] && mousePos.x <= molePos[1][2][0] && mousePos.y >= molePos[0][2][1] && mousePos.y <= molePos[1][2][1]
        ) {
            console.log(mousePos.x >= molePos[0][0][0] && mousePos.x <= molePos[1][0][0] && mousePos.y >= molePos[0][0][1] && mousePos.y <= molePos[1][0][1]);
            console.log(mousePos.x >= molePos[0][1][0] && mousePos.x <= molePos[1][1][0] && mousePos.y >= molePos[0][1][1] && mousePos.y <= molePos[1][1][1]);
            console.log(mousePos.x >= molePos[0][2][0] && mousePos.x <= molePos[1][2][0] && mousePos.y >= molePos[0][2][1] && mousePos.y <= molePos[1][2][1]);
            console.log(molePos[0][2][0] + " " + molePos[1][2][0] + " " + molePos[0][2][1] + " " + molePos[1][2][1])
            console.log("In it");
            //setToZero();
            setToZero();
            drawCount();
            clearInterval(moveID);
            context.clearRect(0, 0, canvas.width, canvas.height);
            
            drawTunnel();
            
        } 
        console.log('canvas click' + mousePos.x + " " + mousePos.y);
    });

    function setToZero() {
        for(let i=0; i<molePos.length; i++) {
            for(let j=0; j<molePos[i].length; j++) {
                for(let k=0; k<molePos[i][j].length; k++) {
                    molePos[i][j][k] =  0;
                }
            }
        }
    }

    // gets loaded when the window is loaded
    function init() {
        timeID = setInterval(drawElapsedTime, 1000); // 1000 = 1 Sekunde
        holeID = setInterval(chooseHole, 1500); // defines how often a new hole is chosen 1500 = 1.5 Sekunden
        drawTunnel();
    }

    window.onload = init();

});



