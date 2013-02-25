<?php
require_once('jogoVelha.php');

class JogoVelhaTest extends PHPUnit_Framework_TestCase {

    public function testJogoVelhaExiste(){    
        $JogoVelha = new JogoVelha();
        $this->assertTrue(is_a($JogoVelha, 'JogoVelha'));
    }

    public function testTabuleiroExiste(){    
        $JogoVelha = new JogoVelha();
        $this->assertNotEmpty($JogoVelha->tabuleiro);
    }
    
    public function testJogar(){    
        $JogoVelha = new JogoVelha();
        $jogada = array(
            array('x', null, null),
            array('x', null, null),
            array('x', null, null)
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals(3, sizeof($JogoVelha->tabuleiro[0]));
    }
    
    public function testNaoTerminou() {
        $JogoVelha = new JogoVelha();
        $jogada = array(
            array('x', null, null),
            array('o', null, null),
            array('x', null, null)
        );
        $JogoVelha->jogar($jogada);
        $terminou = $JogoVelha->terminou();
        $this->assertFalse($terminou);        
    }

    public function testTerminou() {
        $JogoVelha = new JogoVelha();
        $jogada = array(
            array('x', 'o', 'o'),
            array('o', 'x', 'x'),
            array('x', 'o', 'o')
        );
        $JogoVelha->jogar($jogada);
        $terminou = $JogoVelha->terminou();
        $this->assertTrue($terminou);        
        $jogada = array(
            array('x', null, null),
            array('o', null, null),
            array('x', 'o', 'o')
        );
        $JogoVelha->jogar($jogada);
        $terminou = $JogoVelha->terminou();
        $this->assertTrue($terminou);
    }
    
    public function testXGanhou(){
        $JogoVelha = new JogoVelha();
        $jogada = array(
            array('x', 'o' , 'o'),
            array('x', null, null),
            array('x', null, null)
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('x', $JogoVelha->ganhador());

        $jogada = array(
            array('o', 'x' , 'o'),
            array(null,'x', null),
            array(null,'x', null)
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('x', $JogoVelha->ganhador());

        $jogada = array(
            array('o', 'o' , 'x'),
            array(null,null, 'x'),
            array(null,null, 'x')
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('x', $JogoVelha->ganhador());
        
        $jogada = array(
            array('x', 'x' , 'x'),
            array('o', null, null),
            array('o', null, null)
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('x', $JogoVelha->ganhador());

        $jogada = array(
            array('o', null, null),
            array('x', 'x' , 'x'),
            array('o', null, null)
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('x', $JogoVelha->ganhador());
        
        $jogada = array(
            array('o', null, null),
            array('o', null, null),
            array('x', 'x' , 'x')
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('x', $JogoVelha->ganhador());

        $jogada = array(
            array('x', null, null),
            array('o', 'x' , null),
            array('o', null, 'x')
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('x', $JogoVelha->ganhador());

        $jogada = array(
            array('o', null, 'x'),
            array('o', 'x' , null),
            array('x', null, null)
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('x', $JogoVelha->ganhador());
    }
    
    public function testOGanhou(){
        $JogoVelha = new JogoVelha();
        $jogada = array(
            array('o', 'x' , 'x'),
            array('o', null, null),
            array('o', null, null)
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('o', $JogoVelha->ganhador());    

        $jogada = array(
            array('x', 'o' , 'x'),
            array(null,'o', null),
            array(null,'o', null)
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('o', $JogoVelha->ganhador());    

        $jogada = array(
            array('x', 'x' , 'o'),
            array(null,null, 'o'),
            array(null,null, 'o')
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('o', $JogoVelha->ganhador());    
        
        $jogada = array(
            array('o', 'o' , 'o'),
            array('x', null, null),
            array('x', null, null)
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('o', $JogoVelha->ganhador());
        
        $jogada = array(
            array('x', null, null),
            array('o', 'o', 'o'),
            array('x', null, null)
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('o', $JogoVelha->ganhador());
        
        $jogada = array(
            array('x', null, null),
            array('x', null, null),
            array('o', 'o', 'o')
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('o', $JogoVelha->ganhador());
        
        $jogada = array(
            array('o', null, null),
            array('x', 'o' , null),
            array('x', null, 'o')
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('o', $JogoVelha->ganhador());

        $jogada = array(
            array('x', null, 'o'),
            array('x', 'o' , null),
            array('o', null, null)
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('o', $JogoVelha->ganhador());
    }
    
    public function testVelha(){
        $JogoVelha = new JogoVelha();
        $jogada = array(
            array('o','x','x'),
            array('x','x','o'),
            array('o','o','x')
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('velha', $JogoVelha->ganhador());    
    }
    
    public function testFalha(){
        $JogoVelha = new JogoVelha();
        $jogada = array(
            array('o', null, 'x'),
            array(null,null, null),
            array('o', null, 'x')
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('continua', $JogoVelha->ganhador());
        
        $jogada = array(
            array('o', 'x', 'x'),
            array(null,null, null),
            array('o', 'o', 'x')
        );
        $JogoVelha->jogar($jogada);
        $this->assertEquals('continua', $JogoVelha->ganhador());
    }

}  
?>
