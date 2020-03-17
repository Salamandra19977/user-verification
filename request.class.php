<?php
    class Request
    {
        private $errors = [];

        public function isPost()
        {
           return $_SERVER['REQUEST_METHOD'] == 'POST';
        }

        public function clear($str)
        {
            return strip_tags( trim($str) );
        }

        public function getField($inputName)
        {
            $value = $_POST[$inputName] ?? '';
            return $this->clear($value);
        }

        public function required($inputName)
        {
            $value = $this->getField($inputName);
            if(empty($value))
            {
                $this->errors[$inputName][] = 'поле обязательно к заполнению';
            }
        }

        public function checkPassword($inputName,$inputNameTwo){
            $value = $this->getField($inputName);
            $valueTwo = $this->getField($inputNameTwo);
            if($value != $valueTwo){
                $this->errors[$inputNameTwo][] = 'пароли не совпадают';
            }
        }

        public function min($inputName, $min)
        {
            $value = $this->getField($inputName);
            if(mb_strlen($value) < $min)
            {
                $this->errors[$inputName][] = 'Минимальная длина пароля '.$min;
            }
        }

        public function getErrors()
        {
            return $this->errors;
        }

    }
?>