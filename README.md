# PHP: DDD Tactical and Patterns

## Introdução
Vamos imaginar que você precisa desenvolver um novo projeto e ele será um enorme desafio. Nesse momento você decidiu trabalhar com DDD e com isso, você sabe logo de cara que não vai sair colocando a mão no código.

Você vai entender a complexidade do software, mapear o domínio, criar uma linguagem universal e os contextos delimitados. Conseguir separar o espaço do problema e da solução, para só depois dos elementos estratégicos definidos, você vai para a parte tática.

## Elementos Táticos
Este é um momento antes de por a mão no código.

Antes de chegar aqui, já tivemos um olhar estratégico para o software. 

Entendemos o problema e a solução. Criamos um mapa de contexto, definimos diversos contextos delimitados (criando subdominios) e cada tipo deste contexto tem um problema a ser resolvido.

     O que é o DDD tático?
     R: Quando estamos falando sobre DDD e precisamos olhar mais a fundo um contexto delimitado, nós precisamos ser capazes de modelar de forma mais assertiva os seus principais componentes, comportamentos e individualidades, bem como suas relações.
     Vamos colocar uma lupa em um contexto delimitado e ver como as coisas funcionam.

## Entidades
Um dos principais elementos que estamos acostumados a falar sempre, são as entidades. Mas não são as entidades que são comumente faladas, como aquelas que referenciam uma tabela do banco de dados e que tenham seus getters e setters.

Aqui falaremos de uma parte bem mais conceitual, trazendo mais qualidade para o software com coesão e estável, garantindo que o coração da aplicação fique robusto.

    O que é uma entidade?

    "Uma entidade é algo único que é capaz de ser alterado de forma contínua durante um longo período de tempo."
    (Vernon, Vaughn. Implementing Domain-Driven Design)

    "Uma entidade é algo que possui uma continuidade em seu ciclo de vida e pode ser distinguida independente dos atributos que são importantes para a aplicação do usuário. Pode ser uma pessoa, cidade, carro, um ticket de loteria ou uma transação bancária."
    (Evans, Eric. Domain-Driven Design)

# Comandos utilizados
- `composer install`
