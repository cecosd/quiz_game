<?php 

namespace App\Services;

use App\Database\DB;

class GameService
{    
    public function conn()
    {
        return new DB();
    }

    public function binaryMode()
    {        
        $rows = $this->conn()
                    ->run("SELECT 
                                * 
                        FROM `questions` 
                            LIMIT 10")
                    ->fetchAll(\PDO::FETCH_ASSOC);

        $questions = [];

        foreach($rows as $row){            
            $questions[$row['id']] = $row;
        }

        return $questions;           
    } 

    public function optionalMode()
    {                
        $rows = $this->conn()
                    ->run("SELECT 
                            questions.id, 
                            questions.question, 
                            options.content, 
                            options.is_correct 
                        FROM questions 
                            RIGHT JOIN options 
                            ON options.question_id = questions.id 
                        LIMIT 40")
                    ->fetchAll(\PDO::FETCH_ASSOC);
        
        $questions = [];

        foreach($rows as $row){            
            $questions[$row['id']]['question'] = $row['question'];
            $questions[$row['id']]['options'][] = [
                'content' => $row['content'],
                'is_correct' => $row['is_correct'],
            ];
            if($row['is_correct']){
                $questions[$row['id']]['answer'] = $row['content'];
            }
        }

        return $questions;

    } 

    public function store($data)
    {                       
        $question = $this->conn()
            ->run("INSERT INTO 
                    questions
                    (`question`, `answer`, `is_correct`)
                    VALUES (:question, :answer, :is_correct)", [
                        'question' => $data['question'],
                        'answer' => $data['answer'],
                        'is_correct' => $data['is_correct'],
                    ]);

        $stmt = $this->conn()->run("SELECT LAST_INSERT_ID()");
        $id = $stmt->fetchColumn();

        $options = $this->conn()
            ->run("INSERT INTO 
                    options
                    (`content`, `question_id`, `is_correct`)
                    VALUES (:content1, $id, :is_correct1),
                    (:content2, $id, :is_correct2),
                    (:content3, $id, :is_correct3),
                    (:content4, $id, :is_correct4)", [
                        'content1' => $data['option1_content'],
                        'content2' => $data['option2_content'],
                        'content3' => $data['option3_content'],
                        'content4' => $data['option4_content'],
                        'is_correct1' => isset($data['option1_is_correct']),
                        'is_correct2' => isset($data['option2_is_correct']),
                        'is_correct3' => isset($data['option3_is_correct']),
                        'is_correct4' => isset($data['option4_is_correct'])
                    ]);


    } 
}