<h1 align="center">📦 Cadastro e Listagem de Produtos (SRP em PHP) 🐘</h1>

Este é um projeto simples de cadastro e listagem de produtos, desenvolvido do zero em PHP puro, com o objetivo de aplicar e demonstrar o Princípio da Responsabilidade Única (SRP) e a organização de código em camadas, conforme especificado no PRD (Documento de Requisitos do Produto).

O sistema não utiliza banco de dados; a persistência dos dados é feita em um arquivo de texto (storage/products.txt), onde cada produto é armazenado como um objeto JSON em uma nova linha.

🎯 Objetivos de Aprendizagem
O desenvolvimento deste projeto teve como foco os seguintes conceitos:

Aplicar o SRP: Separar as responsabilidades de validação, orquestração e persistência de dados em classes distintas.

Usar Composer e Autoload PSR-4: Configurar o carregamento automático de classes seguindo o padrão PSR-4.

Organizar o projeto em camadas: Estruturar o código nas camadas de Apresentação (public), Aplicação (Application), Domínio/Contratos (Domain/Contracts) e Infraestrutura (Infra).

Implementar persistência em arquivo: Criar um sistema funcional utilizando um arquivo de texto como meio de armazenamento.

⚙️ Como Executar o Projeto
Pré-requisitos
XAMPP instalado.

Composer instalado globalmente.

Passo a Passo
Clone ou baixe este projeto para a pasta htdocs do seu XAMPP.

O caminho final deve ser algo como: C:/xampp/htdocs/products-srp-demo/.

Abra o terminal na pasta raiz do projeto.

Execute o Composer para gerar os arquivos de autoloading:

composer install

Inicie o servidor Apache pelo painel de controle do XAMPP.

Acesse as páginas pelo seu navegador:

Página de Cadastro: http://localhost/products-srp-demo/public/

Página de Listagem: http://localhost/products-srp-demo/public/products.php

🧪 Casos de Teste Manuais
A seguir estão os casos de teste para validar o funcionamento do sistema, conforme os requisitos.

## Teste 1: Cadastro de Produto Válido
Passos:
Acesse a página de cadastro.

Preencha o nome com Teclado Mecânico.

Preencha o preço com 150.50.

Clique em "Cadastrar".

Resultado Esperado:
Mensagem de "Produto cadastrado com sucesso!".

Código HTTP da resposta: 201 Created.

O produto deve aparecer na página de listagem.

## Teste 2: Cadastro com Nome Inválido (curto)
Passos:
Acesse a página de cadastro.

Preencha o nome com A.

Preencha o preço com 50.

Clique em "Cadastrar".

Resultado Esperado:
Mensagem de erro: "Falha no cadastro: O nome do produto deve ter entre 2 e 100 caracteres.".

Código HTTP da resposta: 422 Unprocessable Entity.

## Teste 3: Cadastro com Preço Inválido (negativo)
Passos:
Acesse a página de cadastro.

Preencha o nome com Mouse Gamer.

Preencha o preço com -99.

Clique em "Cadastrar".

Resultado Esperado:
Mensagem de erro: "Falha no cadastro: O preço não pode ser negativo.".

Código HTTP da resposta: 422 Unprocessable Entity.

## Teste 4: Visualização da Listagem Vazia
Passos:
Garanta que o arquivo storage/products.txt esteja vazio.

Acesse a página de listagem.

Resultado Esperado:
A página deve exibir a mensagem "Nenhum produto cadastrado.".

## Teste 5: Visualização da Listagem com Itens
Passos:
Cadastre 2 ou 3 produtos válidos.

Acesse a página de listagem.

Resultado Esperado:
A página deve exibir uma tabela com todos os produtos cadastrados, com seus respectivos IDs, nomes e preços.
