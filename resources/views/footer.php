<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
const app = new Vue({
    el: '#app',
    data: {
        game_mode: 'binary',
        questions: [],
        current_index: 0,
        max_questions: null,
        total_correct: 0,
        total_incorrect: 0,
        answer_correct: null,
    },
    watch: {
        game_mode: function(mode) {
            this.newGame();
            $('.nav-tabs a[href="#game"]').tab('show');
        }
    },
    computed: {
        currentQuestion: function()
        {
            if(Object.keys(this.questions).length == 0){
                return false;
            }

            return this.questions[this.current_index];
        }
    },
    methods: {
        getData: function(){
            var link = (this.game_mode == 'binary') ? '/get-questions' : '/get-questions-optional-mode';
            
            axios
                .get(link)
                .then(response => {
                    this.questions = response.data.data;   
                    this.max_questions = response.data.total;
                });
        },
        submitBinaryAnswer: function(answer){
            
            if (this.currentQuestion.is_correct == answer) {
                this.answerCorrect();
            } else {
                this.answerIncorrect();
            }

            this.manageModals();
        },
        submitOptionalAnswer: function(option_index){
            
            if (this.currentQuestion.options[option_index].is_correct) {
                this.answerCorrect();
            } else {
                this.answerIncorrect();
            }

            this.manageModals();
        },
        nextQuestion: function(){  
            if(this.max_questions == this.current_index + 1 ){
                this.showStatisticsModal();
                this.hideAnswerModal();
            }else{
                this.hideAnswerModal();
                this.current_index++;
            }
        },
        newGame: function(){  
            this.hideStatisticsModal();
            this.getData(); 
            this.resetGame();
        },
        resetGame: function(){
            this.current_index = 0;
            this.total_correct = 0;
            this.total_incorrect = 0;
            this.answer_correct = null;
        },
        manageModals: function(){
            if(this.current_index == this.max_questions){
                this.showStatisticsModal();
            } else {
                this.showAnswerModal();          
            }
        },
        answerCorrect: function(){
            this.total_correct++;
            this.answer_correct = true;
        },
        answerIncorrect: function(){
            this.total_incorrect++;
            this.answer_correct = false;
        },
        showStatisticsModal: function(){
            $('#statistics-modal').modal({
                backdrop: 'static',
                keyboard: false
            });
        },
        hideStatisticsModal: function(){
            $('#statistics-modal').modal('hide');
        },
        hideAnswerModal: function(){
            $('#answer-modal').modal('hide');
        },
        showAnswerModal: function(){
            $('#answer-modal').modal({
                backdrop: 'static',
                keyboard: false
            });  
        },
    },
    created(){
        this.getData();
    }
});
</script>

</body>
</html>