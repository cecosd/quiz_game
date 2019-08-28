<div id="app">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="game-tab" data-toggle="tab" href="#game" role="tab" aria-controls="game" aria-selected="true">
                <i class="fas fa-list-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">
                <i class="fas fa-cogs"></i>
            </a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="game" role="tabpanel" aria-labelledby="game-tab">
            <h1 class="question-header">Who said it?</h1>
            <div class="card question-card">
                <div class="card-body">
                    <p v-if="currentQuestion !== false" class="card-text">{{currentQuestion.question}}</p>
                </div>
            </div>
            <div v-if="game_mode == 'binary'">
                <div class="text-center m-5">
                    <h4>{{currentQuestion.answer}}?</h4>
                </div>
                <div class="col-lg-12">
                    <button type="button" class="btn btn-success btn-lg" @click="submitBinaryAnswer(1)">Yes</button>
                    <button type="button" class="btn btn-danger float-right btn-lg" @click="submitBinaryAnswer(0)">No</button>
                </div>
            </div>
            <div v-if="game_mode == 'optional'">
                <div class="col-lg-3 text-left mt-5 mb-5">
                    <div class="question-option" v-for="(option, option_index) in currentQuestion.options" @click="submitOptionalAnswer(option_index)">--> {{option.content}}</div>
                </div>
            </div>

            <div class="modal fade" id="answer-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <span v-if="answer_correct">
                                Correct! The right answer is: 
                            </span>
                            <span v-if="!answer_correct">
                                Sorry, you are wrong! The right answer is:
                            </span>
                            <span v-if="game_mode == 'optional'">
                                {{currentQuestion.answer}}
                            </span>
                            <span v-if="game_mode == 'binary'">
                                {{(currentQuestion.is_correct) ? 'Yes' : 'No'}}
                            </span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="nextQuestion()">Ok</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="statistics-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Game finished. Here are your statistics</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Total questions: {{max_questions}}</p>
                            <p>Total correct: {{total_correct}}</p>
                            <p>Total incorrect: {{total_incorrect}}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="newGame()">Start new game</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
            <h1 class="question-header">Settings panel</h1>
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <div class="input-group-prepend"></div>
                            <span class="input-group-text">Choose game mode</span>
                        </div>
                        <select v-model="game_mode" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                            <option value="binary">Binary Yes\No mode</option>
                            <option value="optional">Multiple options</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>