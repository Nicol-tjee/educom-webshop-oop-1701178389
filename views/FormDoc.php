<?php
require_once "../views/BasicDoc.php";

class FormDoc extends BasicDoc {
    private function showOpenForm() {echo '<form action="index.php" method="POST">';}
    protected function showFormContent() {}
    protected function showFormButton() {}
    private function showCloseForm() {echo '</form>';}

    protected function showContent() {
        $this->showOpenForm(); 
        $this->showFormContent();
        $this->showFormButton();
        $this->showCloseForm(); 
    }
}

?> 