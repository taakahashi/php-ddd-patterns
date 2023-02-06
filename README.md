# PHP: DDD Tático e Patterns

## Introdução
Imagine que você precisa começar um projeto complexo. A escolha de utilizar DDD significa que você não deve começar escrevendo código sem antes planejar e estruturar o projeto.

É preciso entender a complexidade do software, mapear o domínio, estabelecer uma linguagem universal e os seus contextos delimitados. Dividir o problema e a solução, antes de estabelecer os elementos estratégicos e prosseguir com a abordagem tática.

## Elementos Táticos
Este é um momento antes de pôr a mão no código, é importante se preparar. 
Antes de chegar aqui, já tivemos um olhar estratégico para o software. 

Entendemos o problema e a solução. Criamos um mapa de contexto, definimos diversos contextos delimitados (criando subdominios) e cada tipo deste contexto tem um problema a ser resolvido.

>O que é o DDD tático? <br>
R: Quando estamos falando sobre DDD e precisamos olhar mais a fundo um contexto delimitado, nós precisamos ser capazes de modelar de forma mais assertiva os seus principais componentes, comportamentos e individualidades, bem como suas relações. Vamos colocar uma lupa em um contexto delimitado e ver como as coisas funcionam.

## Entidades
Falamos frequentemente sobre entidades, mas não se trata das entidades comuns, como aquelas que são mapeadas para tabelas do banco de dados e possuem métodos de acesso (getters e setters).

Vamos discutir uma parte mais conceitual que aumenta a qualidade do software, promovendo coesão e estabilidade, garantindo que o coração da aplicação seja robusto.

>O que é uma entidade? <br>
"Uma entidade é algo único que é capaz de ser alterado de forma contínua durante um longo período de tempo." <br>
(Vernon, Vaughn. Implementing Domain-Driven Design) 
<br><br>
> "Uma entidade é algo que possui uma continuidade em seu ciclo de vida e pode ser distinguida independente dos atributos que são importantes para a aplicação do usuário. Pode ser uma pessoa, cidade, carro, um ticket de loteria ou uma transação bancária." <br>
(Evans, Eric. Domain-Driven Design)

## Entidades Anêmicas
Uma entidade é chamada entidade anêmica, quando ela tem somente os atributos, getters e setters. A função dela é armazenar dados e nada mais, semelhante a um DTO que não contém regras de negócios.

O mais próximo de um comportamento que ela tem é alterar os valores dos próprios atributos.
Entidades anêmicas são frequentes em projetos que utilizam ORM e softwares orientados ao banco de dados.

## Expressividade
É necessário tornar a entidade expressiva. A arquitetura deve ser clara e intuitiva sendo possível entender o que cada parte faz apenas olhando para ela.

Um exemplo disso é que na nossa entidade, pode haver métodos como **desativar** onde dentro dele há somente um atributo recebendo false semelhante a um **set**. Porém, a grande diferença é que um método você bate o olho e sabe de cara o que ele faz.   

## Consistência
A nossa entidade precisa representar o nosso elemento no estado atual. Isso significa que ela não pode estar desatualizada. É preciso garantir que 100% das vezes os dados da entidade estejam consistentes.

Caso ela não esteja consistente, a entidade não consegue validar regras de negócio.

## Autovalidação
Uma regra de ouro para manter a sua entidade consistente, é que uma entidade por padrão sempre deve ser autovalidar. Se uma entidade não se autovalidar e deixar essa responsabilidade para outro objeto ou rotina, ela corre o risco de em algum momento por um erro externo ficar em um estado incosistente.

## Entidade vs ORM 
Para algumas pessoas, entidade é somente aquela classe que faz a persistência no banco de dados com os seus *gets/sets*. 

Por isso é necessário entender a diferença e os seus conceitos. São duas entidades diferentes e uma não precisa anular o uso da outra. São arquivos com nome iguais que são independentes. 

A entidade do ORM tem o contexto de guardar dados, é focada em persistência.
<br>
A entidade por si só tem o contexto de atender o negócio, é focada nas regras de negócio.
## Value Objects
Em muitos sistemas os atributos das classes são tratados com tipos primitivos. Eles são, inteiros, strings, etc. <br> Um nome, uma rua, um CPF, tudo acaba sendo string, por exemplo.

DDD é como resolver um problema de negócio, é como representar a sua aplicação. E para representar de uma forma rica e expressiva, utilizamos os **Objetos de Valores** nos nossos atributos ao invés de tipos genéricos.

>"Quando você se preocupa apenas com os atributos de um elemento de um Model, classifique isso como um Value Object. Trate um Value Object como imutável." <br>
(Evans, Eric. Domain-Driven Design)

Por exemplo, CEP e CPF sendo “string”, sem máscara e fazendo esse tratamento depois. Se nosso CEP e CPF forem do mesmo tipo primitivo, eles são praticamente a mesma coisa.

Seguindo nessa linha, a nossa modelagem acaba sendo reduzida, fazendo com que fique “pobre”.

Uncle Bob gosta muito de dizer “screaming architecture”, ou seja, a arquitetura tem que estar gritando como as coisas devem ser. Muitas vezes o nosso software não expressa o que ele realmente é ou faz. Expressa somente um conjunto de variáveis que tem um tipo.

Para resolver isso, ajudando a modelar o domínio de forma “rica” podemos utilizar o DDD para resolver o problema de negócio e enxergar a aplicação. Precisamos modelar o coração da forma mais “rica” possível, de uma forma que ela expresse o que ela é com as suas características e não mais com características genéricas. O que nos ajuda em tudo isso, são os Value Objects.
Eles ajudam a modelar o domínio de um sistema de negócio de forma mais precisa, expressiva e consistente.

## Aggregates
>“Um agregado é um conjunto de objetos associados que tratamos como uma unidade para propósito de mudança de dados. <br>
(Evans, Eric. Domain-Driven Design)

Vamos imaginar um sistema com 4 elementos: cliente (entidade), endereço (value object), pedido (entidade) e item (entidade).

Cliente precisa ter um endereço e pode ou não ter N pedidos.
<br>
Pedido precisa ter N itens e precisa ter um cliente.

Sendo assim, sabemos que temos 2 contextos. Um de cliente e um de pedido.
<br>
Chamamos esses contextos de agregados, pois são conjuntos de objetos tratados como uma unidade única e possuem uma identidade própria. Eles delimitam o contexto de negócios estabelecendo as regras e restrições que regulam o comportamento das entidades e serviços do sistema.

Um agregado é composto por um objeto principal, chamado raiz de agregado, e vários objetos associados a ele, conhecidos como entidades dependentes. A raiz de agregado gerencia as operações de negócios e as alterações de estado do agregado, enquanto as entidades dependentes armazenam os dados do negócio.

## Domain Services
Não confunda Domain Services com os serviços comuns, como Web Service, Services SOAP ou REST. Se é preciso enviar um email, criamos um serviço na infra. O que será discutido a seguir não tem relação com esses usos comuns
    
>"Um serviço de domínio é uma operação sem estado que cumpre uma tarefa específica do domínio. Muitas vezes, a melhor indicação de que você deve criar um Serviço no modelo de domínio é quando a operação que você precisa executar parece não se encaixar como um método em um Agregado ou um Objeto de Valor." <br>
(Vernon, Vaughn. Implementing Domain-Driven Design)

>"Quando um processo ou transformação significativa no domínio não for uma responsabilidade natural de uma Entidade ou Objeto de Valor, adicione uma operação ao modelo como uma interface autônoma declarada como um Serviço. Defina a interface baseada na linguagem do modelo de domínio e certifique-se de que o nome da operação faça parte da Linguagem Ubíqua. Torne o Serviço sem estado." <br>
(Evans, Eric. Domain-Driven Design)

Os serviços não possuem estado. Se for necessário realizar uma operação e não for possível fazer dentro da própria entidade, devido a necessidade de outras entidades, outras operações ou acesso externo, provavelmente será necessário utilizar um serviço de domínio.

Lembre-se de que um serviço de domínio é executado na camada de domínio, nas regras de negócio. Não estamos falando de infraestrutura ou de ações como envio de emails. Estamos tratando de regras de negócio, como temos visto até agora.

Abaixo, alguns exemplos possíveis de situações onde pode ser necessário utilizar um serviço de domínio:
- Uma ação realizada por uma entidade pode afetar outras entidades?
- Como realizar operações em massa?
- Como calcular algo cujos dados estão em mais de uma entidade?

Para lembrar:
- Se houver muitos Domain Services no projeto, isso pode indicar que os agregados estão anêmicos;
- Os Domain Services são Stateless, ou seja, eles não mantêm estado, então, se uma função é executada, ela coleta alguns dados de entrada e retorna somente um valor final, sem armazenar esses dados no domínio;

## Repositories
> Um repositório comumente se refere a um local de armazenamento, geralmente considerado um local de segurança ou preservação dos itens nele armazenados. Quando você armazena algo em um repositório e depois retorna para recuperá-lo, você espera que ele esteja no mesmo estado que estava quando você o colocou lá. Em algum momento, você pode optar por remover o item armazenado do repositório." <br>
(Vernon, Vaughn. Implementing Domain-Driven Design)

Quando trabalhamos com repositórios, usamos agregados para persistir os dados no banco de dados. Esses agregados não precisam ser necessariamente mapeados para uma tabela específica, mas sim serem objetos que precisam ser persistidos. No entanto, esses agregados podem conter várias entidades e objetos de valor. Se você precisa trabalhar com essas informações 1:1 e representar uma tabela específica, existem outros padrões, como o DAO, que se adequam melhor a essa necessidade.

> Esses objetos semelhantes a coleções são sobre persistência. Todo tipo **Agregado** persistente terá um **Repositório**. De um modo geral, existe uma relação **1:1 entre um tipo agregado e um repositório.** <br>
(Vernon, Vaughn. Implementing Domain-Driven Design)

Em resumo, os repositórios são simples, pois eles representam coleções. Estas coleções de dados vão estar armazenadas no banco de dados e podem ser recuperadas no formato dos seus agregados.

# Comandos utilizados
- `composer install`
- `composer require --dev phpunit/phpunit ^9`
- `composer require --dev php-code-coverage`


- `./vendor/phpunit/phpunit/phpunit --generate-configuration`
- `php vendor/bin/doctrine dbal:run-sql "SELECT * FROM product;"`