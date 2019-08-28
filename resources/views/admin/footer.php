<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
const app = new Vue({
    el: '#app',
    data: {
        question_type: 'binary',
        question: {
            type: null,
            question: null,
            answer: null,
            is_correct: null,
            option1: {
                content: null,
                is_correct: null
            },
            option2: {
                content: null,
                is_correct: null
            },
            option3: {
                content: null,
                is_correct: null
            },
            option4: {
                content: null,
                is_correct: null
            },
        },
    },
    watch: {
        game_mode: function(mode) {
            this.newGame();
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
        saveQuestion: function(){            
            axios
                .post('/store-question', this.question)
                .then(response => {
                    console.log(response.data);
                });
        },
    },
    created(){

    }
});
</script>

</body>
</html>