<?php

namespace MyApp;

class Quiz {
  private $_quizSet = [];

  public function __construct() {
    $this->_setup();

    if (!isset($_SESSION['current_num'])) {
     $_SESSION['current_num'] = 0; 
    }
  }

  public function getCurrentQuiz() {
    return $this->_quizSet[$_SESSION['current_num']];
  }

  public function checkAnswer() {
    $correctAnswer = $this->_quizSet[$_SESSION['current_num']]['a'][0];
    return $correctAnswer;
  }

  private function _setup() {
    $this->_quizSet[] = [
      'q' => 'What is A?',
      'a' => ['A0', 'A1', 'A2', 'A3']
    ];
    $this->_quizSet[] = [
      'q' => 'What is B?',
      'a' => ['B0', 'B1', 'B2', 'B3']
    ];
    $this->_quizSet[] = [
      'q' => 'What is C?',
      'a' => ['C0', 'C1', 'C2', 'C3']
    ];
  }
}
?>
