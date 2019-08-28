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
}