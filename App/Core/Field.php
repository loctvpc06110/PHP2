<?php
    namespace App\Core;

    class Field {
        public const TYPER_TEXT = 'text';
        public const TYPER_PASSWORD = 'password';
        public const TYPER_NUMBER = 'number';

        public string $type;
        public string $attribute;

        public function __construct(string $attribute){
            $this->type = self::TYPER_TEXT;
            $this->attribute = $attribute;
        }
        
        public function __toString()
        {
            return sprintf('
                <div class="form-group">
                    <label>%s</label>
                    <input type="%s" name="%s">
                </div>
            ',    
            $this->getLabel($this->attribute),
            $this->type,
            $this->attribute);
        }

        public function passwordField(){
            $this->type = self::TYPER_PASSWORD;
            return $this;
        }
   
        public function labels(): array 
        {
            return [
                'firstname' => 'First Name',
                'lastname' => 'Last Name',
                'email' => 'Your Email',
                'password' => 'Password',
                'confirmPassword' => 'Confirm Password',
            ];
        }

        public function getLabel($attribute){
            echo $attribute;
            return $this->labels()[$attribute] ?? $attribute;
        }
    }
?>