<?php
class indexController {
	public function index(){
		if(isset($_SESSION['secure']) && $_SESSION['secure'] == SECURE_SESSION)
			mvc::redirect('/painel');
	}
	public function planos(){
		mvc::$var['planos'] = array(
			array(
				'nome' => 'Bronze',
				'valor' => '20,00',
				'descricao' => 'Para pequenas empresas.',
				'itens' => array(
					"10 Usuários",
					"100 Reg. de Ligações",
					"1 Atendimentos online simultâneos"
				)
			)
		);
	}
	public function contato(){}
}
?>