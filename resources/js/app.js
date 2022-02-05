require('./bootstrap');
    
    window.Vue = require('vue');
    
    const app = new Vue({
        el: '#main',
    
        data: {
                
                teamgames,
                pendingUpdate: {
                    minute: '',
                    type: '',
                    description: ''
                }
        },
    
        methods: {
            updatePlayGame(event) {
                event.preventDefault();
                axios.post(`/playgame/${this.games.id}`, this.pendingUpdate)
                    .then(response => {
                        console.log(response);
                        this.update_games.unshift(response.data);
                        this.pendingUpdate = {};
                    });
            },
    
            updateScorePlayGame() {
                const data = {
                    firstteams_id: this.teamgames.firstteams_id,
                    secondteams_id: this.teamgames.secondteams_id,
                };
                axios.post(`/playgame/${this.games.id}/score`, data)
                    .then(response => {
                        console.log(response)
                    });
            },
    
            updateFirstTeamScore(event) {
                this.teamgames.first_team_score = event.target.innerText;
                this.updatePlayGame();
            },
    
            updateSecondTeamScore(event) {
                this.teamgames.second_team_score = event.target.innerText;
                this.updatePlayGame();
            }
        }
    });