<?php
	
	require 'vendor/autoload.php';
	// Pegando o arquivo autoload da pasta vendor, para que possa utilizar o Twig

	$loader = new Twig_Loader_Filesystem('views');
	// Declarando a pasta views (que serão exibidas ao usar twig)
	$twig = new Twig_Environment($loader);
	// Carregando a pasta views

	$md5Filter = new Twig_SimpleFilter('md5', function($string) {
		return md5($string);
	});
	// Criando um filtro para utilizar no código

	$twig->addFilter($md5Filter);
	// Adicionando o filtro

	$lexer = new Twig_Lexer($twig, array(

		'tag_block' => array('+++', '+++'),
		'tag_variable' => array('{{ ', ' }}')

		));
	// Criando uma sintaxe própria para o nosso código

	$twig->setLexer($lexer);
	// Serve para setar uma sintaxe diferente ao seu código, customizando totalmente o HTML

	echo $twig->render('hello.html', array(
		'nome' => "Lucas",
		'idade' => 18,
		'email'=>"lucasmed812@gmail.com", 

		'users' => array(
				array('nome' => 'Moisés', 'idade' => 17, 'email' => 'mocaoli@yahoo.com.br'),
				array('nome' => 'Romerito', 'idade' => 25, 'email' => 'undefined@gmail.com'),
				array('nome' => 'Joãozinho', 'idade' => 10, 'email' => 'joao@yahoo.com.br')
			)
		));
	// Chamando a página "hello.html" que está em views

?>