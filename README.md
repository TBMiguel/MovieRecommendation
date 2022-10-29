# Teste Pratico via humana

## Teste prático de CRUD de recomendações de filmes/séries com Laravel & Livewire

Para o teste técnico foi solicitada a seguinte tarefa:

Desenvolver uma aplicação WEB onde o usuário consiga logar e cadastrar filmes ou séries para que recebam recomendações do mesmo, precisando ela:

1 - Ter um Feed Central, onde todos os usuários cadastrados e logados tenham acesso de visualização.
2 - Interações votar se recomenda a série/filme, votar se não recomenda a série/filme, seguir posts para acompanhar resultados.
Ao seguir, automaticamente acompanha.
3 - Cadastrar usuário:
    3.1 - Criar post de filme/série
    3.2 - Apagar um post com série ou filme, desde que, ninguém tenha interagido com o post.
    3.3 - Marcar um post com série ou filme como concluído, neste caso ninguém mais pode votar ou acompanhar esse post.
    3.4 - Acessar a página de feed central, esta página lista todos os posts dos outros usuários.
    3.5 - Acessar a página de feed que ele segue, aparece posts que ele votou recomendando ou não, ou então só marcou pra seguir
    
    [https://imgur.com/a/63xRB5q]

## Para testar esse projeto clone esse repositório com o git clone (url - link ssh) ou baixe o .zip clicando em code.

 - Rodar o npm run dev
 - De o composer update
 - Rode um npm install
 - Configure variaveis do banco de dados copiando o .env.example e renomeie para .env - No caso utilizado Docker
 - Rode as migrations
