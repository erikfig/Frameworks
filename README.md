# Framework de estudo 2

## Sobre esta documentação

Ela se refere ao framework do [branch 2.0](https://github.com/erikfig/Frameworks/tree/2.0) e é apenas um rascunho por enquanto, ainda preciso revisar, mas já vai ajudar a muita gente, este framework é apenas um estudo e não deve ser usado em produção.

O repositório desta versão está fechado para alterações, seguirei os estudos em [https://github.com/WebDevBr/Framework](https://github.com/WebDevBr/Framework)

## Instalar

Para instalar é simples, apenas baixe utilizando o botão Download ZIP ai do lado, ou clone este repositório (prefira esta segunda opção).

Para clonar você vai precisar do Git instalado localmente, em seguida execute os comandos a baixo

São vários comandos, coloquei 1 por linha, execute todos.

    git clone -b 2.0 git@github.com:erikfig/Frameworks.git
    composer install

Se o segundo comando falhar você pode precisar baixar o Composer (pouco mais de 1mb) [neste link](https://getcomposer.org/download/), não esqueça de por o arquivo que receber (chamado **composer.phar**) no diretório raiz da aplicação, então execute assim:

    php composer.phar install

## PHP Built-in Server

Você não precisa de nenhuma configuração especial para o PHP Built-in Server, basta rodar o arquivo **server.php** em linha de comando:

    php server.php

Você pode personalizar (alterar porta, localhost para outra coisa, o diretório publico) editando o arquivo **src/WebDevBr/Config/App.php**.

[Aqui a documentação completa](https://github.com/erikfig/Frameworks/wiki)

Att. Erik Figueiredo
