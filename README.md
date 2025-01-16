## Módulo 4 - Trabalhando com Bando de dados.

- **Data Definition Language (DDL):** create, alter, drop. Alteração da estrutura do banco.
- **Data Manipulating Language (DML)**: Select, Insert, Delete, Update. Manipulação de dados.
- **Data Transactional Language (DTL):** Begin, Commit, Rollback. Transações.
- **Data Control Language (DCL):** Grant, Revoke, Deny. Gerenciamento do banco de dados.

### Seeder

É um recurso do laravel para gerar dados “fake” para a aplicação. Criamos uma classe semeadora com o comando *“artisan make:seed nameSeeder ”*.  Na classe “DatabaseSeeder”, invocamos a classe seeder dentro do método *“call”* usando o comando *“artisan db:seed”.* Podemos gerar varios tipos de informação “fake” para os nossos models.

Comando para rodar um seeder específico  *sail art db:seed --class=PlanSeeder*

### Factory

É um recurso do laravel para criar dados em grande quantidade, as factories permitem a utilização da biblioteca “*facker*”, é necessario que o model use a trait *“HasFactory”*. Esse recurso é combinado com os *“Seeder”* para que seja criado os dados através da linha de comando. 

Podemos combinar factories quando um campo de um model é dependente de outro model. Por exemplo com relacionamentos.

### Attributes

É uma funcionalidade do laravel que permite realizar transformações de dados durante a transição do dado entre o banco e a aplicação. Para isso criamos um método no módel com o *nome de um dos atributos da model* ou *podemos criar um atributo novo*, *esse metodo deve ter o retorno tipado com a classe \Illuminate\Database\Eloquent\Casts\Attribute, nesse casso também é necessario utilizar o $this->attributes['name'].*

### UUIDS

Quando usamos o atributo *uuid* como identificador principal do model podemos adicionar a *Trait HasUuids* dessa forma o laravel ira gerar o uuid automaticamente quando um model for criado. Porém se o uudi não for identificador principal do model, podemos utilizar o método *uniqueIds() da Trait HasUuids* dessa forma informando qual campo deve receber a geração do uuid. Na geração de uma migration podemos adicionar um campo uuid e utilizar a função *primary()* para indicar que este campo será o identificador princiapal da classe.

### Comando de consulta do Eloquent

- **Consulta**
    - **all()** - Trás todos os registros da tabela, *retornando uma collection*.
    - **first()** - Finaliza um consulta no eloquent, buscando o primeiro dado.
    - **limit()** - Limita a quantidade de dados da consulta. Retorna um *Builder.*
    - **get()** - É utilizado para finalizar consultar no eloquent.
    - **select()** - Utilizado para filtrar os dados do registro. Retorna um *Builder.*
    - **count()** - Conta quantos registros existem.
    - **find()** - Busca um registro pelo id.
    - **findOrFail()** - Busca um registro pelo id, se não encontrar lança uma exceção.
    - **findOr()** -  Busca um registro pelo id, se não encontrar lança uma exceção. Permite personalizar a exceção.
    - **toSql()** - Retorna a consulta sql.
- **Filtros**
    - **where()** - Utilizado para filtrar informações, é possível passar variações de consulta no parâmetro. Varios where são um & logico do sql.
    - **orWhere()** - Ou logico do sql.
    - Podemos passar uma função dentro dos where, quando queremos agrupas um restrição da consulta, como se estivessemos colocando () em um trecho do sql.
- **Relacionamentos**
    - **with()** - Permite trazer na consulta a model com os seus relacionamentos. Passando um array com o nome da função que realizar o relacionamento. Também é possível passar uma closure para trazar dados especificos do relacionamento.
    - with([’client’])
    - with([’client’ → functions($query){ $query→select(’user_id’, ’documento’) }])
    - with([’client:user_id,document as cpf, birthdate’])
    - **LazyLoad** - Buscamos primeiro o model principal e depois chamamos o relacionamento.
- **QueryBuilder**
    - Recurso do laravel que permite escrever queries mais próximas do SQL através da facade DB::. O resultado será uma collection, porém ao usar query builder, não é possível acessar as features das models.