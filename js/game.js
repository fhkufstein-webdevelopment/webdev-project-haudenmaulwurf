const settings = {
    game: document.getElementById("game"),
    moles: 9,
    // difficulty 1-3; 1 easy, 2 medium, 3 hard
    difficulty: 2,
    counter: 0,
};

$(document).ready(function () {
    // Wenn Button mit Schwierigkeit gedrückt wird, dann wird das Spiel gestartet
    $(".difficultyButton").click(function () {
        let buttonDiv = document.getElementById("buttons");
        settings.difficulty = parseInt($(this).val(), 10);
        for (let i = 0; i < $("button").length; i++) {
            $("button")[i].style.display = "none";
        }
        init();

        buttonDiv.style.display = "none";
    });
});

function init() {
    let timer = document.getElementById("timer");
    let speed;
    switch (settings.difficulty) {
        case 1:
            speed = 3;
            break;
        case 2:
            speed = 2;
            break;
        case 3:
            speed = 1.2;
            break;
        case 999:
            speed = 0.3;
            break;
    }

    for (let index = 0; index < settings.moles; index++) {
        // Div für Mole
        let mole = document.createElement("div");
        mole.id = "mole" + index.toString();
        mole.className = "grid-item";

        // "Dirt", Bereich aus dem der Mole herauskommt
        let imageDirt = document.createElement("div");
        imageDirt.classList = "dirt";

        // Maulwurf
        let moleImage = document.createElement("img");
        moleImage.src = "images/firstMole.svg";
        moleImage.classList = "mole";

        let spawnInterval = setInterval(() => {
            colorSetter(moleImage);
            $("#game").removeClass("noshow");

            if (Math.random() > 0.97) {
                // damit nur getoggelt wird, wenn der Mole noch nicht herausen ist
                if (!moleImage.classList.contains("alive")) {
                    moleImage.classList.toggle("alive");
                }
            }

            for (let i = 0; i < $(".alive").length; i++) {
                $(".alive")[i].style.animationDuration = speed.toString() + "s";
            }
        }, 100); //update interval

        // remove alive after animation ends
        $(mole).on("animationend webkitAnimationEnd", function () {
            if (moleImage.classList.contains("alive")) {
                moleImage.classList.toggle("alive");
            }
            if (moleImage.classList.contains("normalMole")) {
                moleImage.classList.remove("normalMole");
            } else if (moleImage.classList.contains("redMole")) {
                moleImage.classList.remove("redMole");
            } else if (moleImage.classList.contains("yellowMole")) {
                moleImage.classList.remove("yellowMole");
            }
        });

        // TIMER
        let time = 10; // in Sekunden
        let timeID; // zum Stoppen, wenn Zeit abgelaufen
        function drawElapsedTime() {
            if (time < 0) {
                // countdown stoppen und spawnen von Maulwürfen stoppen
                clearInterval(timeID);
                clearInterval(spawnInterval);

                for (let i = 0; i < settings.moles; i++) {
                    moleImage.classList.remove("alive");
                }
                // Endbutton erscheinen lassen
                let endArea = document.getElementById("endArea");
                endArea.style.display = "block";
                let endButton = document.getElementById("endButton");
                endButton.style.display = "block";
            } else {
                $(timer).text(time + " secs");
                time--;
            }
        }
        timeID = setInterval(drawElapsedTime, 1000);

        moleImage.addEventListener("click", (event) => {
            if (event.target.classList.contains("alive")) {
                let counterText = document.getElementById("pointsCounter");

                event.target.classList.toggle("alive");
                if (event.target.classList.contains("normalMole")) {
                    settings.counter++;
                } else if (event.target.classList.contains("yellowMole")) {
                    settings.counter += 2;
                } else if (event.target.classList.contains("redMole")) {
                    settings.counter--;
                }
                // Updaten der neuen Punktanzahl
                $(counterText).text("Points: " + settings.counter);
            }
        });

        mole.appendChild(imageDirt);
        // Image an div hängen
        mole.appendChild(moleImage);
        // div an game-bereich hängen
        settings.game.appendChild(mole);
    }


    // senden der daten am ende
    $("#endButton").click(function () {
        console.log(settings.counter);
        // Daten senden an DB
        $.ajax({
            url: '/webdev-project-haudenmaulwurf/scoreboard',
            type: 'POST',
            dataType: "json",
            data: {'action':'saveScore', 'score': settings.counter}
        }).done(function() {
            window.location.href = "/webdev-project-haudenmaulwurf/scoreboard";
        });

    });

    // auswählen welche farbe der maulwurf haben soll
    function colorSetter(moleImage) {
        let alreadySet =
            moleImage.classList.contains("normalMole") ||
            moleImage.classList.contains("yellowMole") ||
            moleImage.classList.contains("redMole");

        if (settings.difficulty == 1 && !alreadySet) {
            if (Math.random() < 0.3) {
                moleImage.classList.add("redMole");
            } else {
                moleImage.classList.add("normalMole");
            }
        } else if (settings.difficulty == 2 && !alreadySet) {
            if (Math.random() < 0.1) {
                moleImage.classList.add("yellowMole");
            } else if (Math.random() < 0.2) {
                moleImage.classList.add("redMole");
            } else {
                moleImage.classList.add("normalMole");
            }
        } else if (settings.difficulty == 3 && !alreadySet) {
            if (Math.random() < 0.3) {
                moleImage.classList.add("yellowMole");
            } else if (Math.random() < 0.2) {
                moleImage.classList.add("redMole");
            } else {
                moleImage.classList.add("normalMole");
            }
        }
    }
}
