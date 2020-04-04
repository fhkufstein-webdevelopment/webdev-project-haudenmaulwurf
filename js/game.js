function gameWon(userScore) {
//... some awesome stuff happened here before...
    $.ajax({
        'url':    'game',
        'method': 'post',
        'data':    {'action': 'createAndSaveScore', 'score': userScore, 'tmsp': timeStamp},
        'success': function(receivedData) {
            if(receivedData.result) {
//after save change url to scoreboard
                location.href = 'scoreboard';
            }
        }
    });

}