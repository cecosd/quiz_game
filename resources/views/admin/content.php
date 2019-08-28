<div id="app" class="container">
    <div class="row">
        <div class="col-md-6 order-md-1">
            <h4 class="mb-3">Add Question</h4>
            <form action="/store-question" method="POST" class="needs-validation">
                <div class="form-group">
                    <label for="exampleInput">Quote</label>
                    <input name="question" type="text" class="form-control" id="exampleInput" aria-describedby="quoteHelp" placeholder="Type quote here..." required>
                    <small id="quoteHelp" class="form-text text-muted">Add a quote to use it for the game afterwards.</small>
                </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                Binary answer
                            </div>
                            <div class="input-group-text">
                                <input type="radio" name="is_correct" value="1"> YES
                            </div>
                            <div class="input-group-text">
                                <input type="radio" name="is_correct" value="0"> NO
                            </div>
                        </div>
                        <input type="text" name="answer" class="form-control" aria-label="Text input with checkbox" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                Option 1 (check if correct answer)
                            </div>
                            <div class="input-group-text">
                                <input type="radio" name="option1_is_correct">
                            </div>
                        </div>
                        <input type="text" name="option1_content" class="form-control" aria-label="Text input with checkbox" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                Option 2 (check if correct answer)
                            </div>
                            <div class="input-group-text">
                                <input type="radio" name="option2_is_correct">
                            </div>
                        </div>
                        <input type="text" name="option2_content" class="form-control" aria-label="Text input with checkbox" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                Option 3 (check if correct answer)
                            </div>
                            <div class="input-group-text">
                                <input type="radio" name="option3_is_correct">
                            </div>
                        </div>
                        <input type="text" name="option3_content" class="form-control" aria-label="Text input with checkbox" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                Option 4 (check if correct answer)
                            </div>
                            <div class="input-group-text">
                                <input type="radio" name="option4_is_correct">
                            </div>
                        </div>
                        <input type="text" name="option4_content" class="form-control" aria-label="Text input with checkbox" required>
                    </div>
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit">Save Question</button>
            </form>
        </div>
    </div>
</div>