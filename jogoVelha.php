<?php
class JogoVelha {
    
    public $tabuleiro = array(array(), array(), array());
    public $terminou = false;
    
    public function jogar($jogada){
        $this->tabuleiro = $jogada;
    } 
    
    public function terminou() { 
        $count = 0;
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if (!empty($this->tabuleiro[$i][$j])) {
                    $count = $count + 1;                
                }
            }
        }
        
        return ($count >= 5);
    }
    
    public function ganhador(){
        $ganhador = 'continua';
        if ($this->terminou()) {
            $ganhador = 'velha';
            for ($i = 0; $i < 3; $i++) {
                if (($this->tabuleiro[$i][0] == $this->tabuleiro[$i][1]) && ($this->tabuleiro[$i][1] == $this->tabuleiro[$i][2])) {
                    $ganhador = $this->tabuleiro[$i][0];
                }
                if (($this->tabuleiro[0][$i] == $this->tabuleiro[1][$i]) && ($this->tabuleiro[1][$i] == $this->tabuleiro[2][$i])) {
                    $ganhador = $this->tabuleiro[0][$i];
                }
            }
            if (($this->tabuleiro[0][0] == $this->tabuleiro[1][1]) && ($this->tabuleiro[1][1] == $this->tabuleiro[2][2])) {
                $ganhador = $this->tabuleiro[1][1];
            }
            if (($this->tabuleiro[0][2] == $this->tabuleiro[1][1]) && ($this->tabuleiro[1][1] == $this->tabuleiro[2][0])) {
                $ganhador = $this->tabuleiro[1][1];
            }            
        }   
             
        return $ganhador;
    }
    
}
?>
