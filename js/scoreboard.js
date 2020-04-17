$( document ).ready(function() {
    let currentScore = $(".h3_lastscore")[0].classList.item(0);

    for (let i = 0; i < $(".tr_highscores").length; i++) {
        let eachHighscore = $(".tr_highscores")[i];
        let eachHighscoreNumber = $(".tr_highscores")[i].classList.item(0);

        if (eachHighscoreNumber == currentScore) {
            eachHighscore.classList.add("needsHighlight");
        }
        eachHighscore.classList.remove(eachHighscore.classList.item(0));
    }

    for (let i = 0; i < $(".tr_userscores").length; i++) {
        let eachUserscore = $(".tr_userscores")[i];
        let eachUserscoreNumber = $(".tr_userscores")[i].classList.item(0);

        if (eachUserscoreNumber == currentScore) {
            eachUserscore.classList.add("needsHighlight");
        }
        eachUserscore.classList.remove(eachUserscore.classList.item(0));
    }

    $(".h3_lastscore")[0].classList.remove(currentScore);

});