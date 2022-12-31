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
Para algumas pessoas, entidade é somente aquela classe que faz a persistência no banco de dados com seus *gets/sets*. 

Por isso é necessário entender a diferença e seus conceitos. São duas entidades diferentes e uma não precisa anular o uso da outra. São arquivos com nome iguais que são independentes. 

A entidade do ORM tem o contexto de guardar dados, é focada em persistência.
<br>
A entidade por si só tem o contexto de atender o negócio, é focada nas regras de negócio.
## Value Objects
Em muitos sistemas os atributos das classes são tratados com tipos primitivos. Eles são, inteiros, strings, etc. <br> Um nome, uma rua, um CPF, tudo acaba sendo string, por exemplo.

DDD é como você resolve um problema de negócio, é como você representa a sua aplicação. E para representar de uma forma rica e expressiva, utilizamos os **Objetos de Valores** em nossos atributos ao invés de tipos genéricos.

    "Quando você se preocupa apenas com os atributos de um elemento de um Model, classifique isso como um Value Object."
    "Trate um Value Object como imutável."
    
    (Evans, Eric. Domain-Driven Design)

Por exemplo, CEP e CPF sendo “string”, sem máscara e fazendo esse tratamento depois. Se nosso CEP e CPF forem do mesmo tipo primitivo, eles são praticamente a mesma coisa.

Seguindo nessa linha, nossa modelagem acaba sendo reduzida, fazendo com que fique “pobre”.

Uncle Bob gosta muito de dizer “screaming architecture”, ou seja, a arquitetura tem que estar gritando a forma como as coisas devem ser. Muitas vezes o nosso software não expressa o que ele realmente é ou faz. Expressa somente um conjunto de variáveis que tem um tipo.

Para resolver isso, ajudando a modelar o domínio de forma “rica” podemos utilizar o DDD para resolver o problema de negócio e enxergar a aplicação. Precisamos modelar o coração da forma mais “rica” possível, de uma forma que ela expresse o que ela é com as suas características e não mais com características genéricas. O que nos ajuda em tudo isso, são os Value Objects.
Eles ajudam a modelar o domínio de um sistema de negócio de forma mais precisa, expressiva e consistente.

## Aggregates
    “Um agregado é um conjunto de objetos associados que tratamos como uma unidade para propósito de mudança de dados.”
    (Evans, Eric. Domain-Driven Design)

Vamos imaginar um sistema com 4 elementos: cliente (entidade), endereço (value object), pedido (entidade) e item (entidade).

Cliente precisa ter um endereço e pode ou não ter N pedidos.
<br>
Pedido precisa ter N itens e precisa ter um cliente.

Sendo assim, sabemos que temos 2 contextos. Um de cliente e um de pedido.
<br>
Esses contextos, chamamos de agregados pois ele é um conjunto de objetos que são tratados como uma única unidade de trabalho e que possuem uma identidade própria. Ele delimita o contexto de um sistema de negócio ao definir as regras e restrições que regem o comportamento das entidades e serviços do sistema.

Um agregado é composto por um objeto principal, conhecido como raiz de agregado, e por vários objetos associados a ele, conhecidos como entidades dependentes. A raiz de agregado é responsável por gerenciar as operações de negócios e as alterações de estado do agregado, enquanto as entidades dependentes são responsáveis por armazenar os dados do negócio.

# Comandos utilizados
- `composer install`
- `composer require --dev phpunit/phpunit ^9`
- `composer require --dev php-code-coverage`


- `./vendor/bin/phpunit --generate-configuration`
- `./vendor/bin/phpunit tests --colors --coverage-html ./report`


    Configuração XDebug: 

    - Instalar XDebug
        - apt install php8.1-xdebug
    - Habilitar XDebug no php.ini
        - xdebug.mode=develop,debug,coverage