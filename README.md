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

## Entidades Anêmicas
Uma entidade é chamada de entidade anêmica, quando ela tem somente os atributos, getters e setters. Ela serve para armazenar seus dados e nada mais. É muito parecido com um DTO que não carrega regra de negócios.

O mais próximo de um comportamento que ela tem, é alterar os valores dos próprios atributos.

Essas entidades anêmicas são muito comuns quando se é trabalhado com ORM e um software orientado ao banco de dados.

## Expressividade
Precisamos deixar a entidade expressiva. Há até uma frase que diz para trabalharmos com "screaming architecture", que significa que a nossa arquitetura precisa "gritar", ou seja, precisamos bater o olho e entender o que cada parte faz.

Um exemplo disso é que na nossa entidade, pode haver métodos como **desativar** onde dentro dele há somente um atributo recebendo false como num **set**. Porém, a grande diferença é que um método você bate o olho e sabe de cara o que ele faz.   

## Consistência
A nossa entidade precisa representar nosso elemento no estado atual. Isso significa que ela não pode estar desatualizada. É preciso garantir que 100% das vezes os dados da entidade estejam consistentes.

Caso ela não esteja consistente, a entidade não consegue validar regras de negócio.

## Autovalidação
Uma regra de ouro para manter sua entidade consistente, é que uma entidade por padrão sempre deve ser autovalidar. Se uma entidade não se autovalidar e deixar essa responsabilidade para outro objeto ou rotina, ela corre o risco de em algum momento por um erro externo ficar em um estado incosistente.

## Entidade vs ORM 


# Comandos utilizados
- `composer install`
