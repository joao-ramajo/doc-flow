# DocFlow | Laravel File System

Sistema de gerenciamento de documentos baseado em clientes e empresas usando Laravel.

Este projeto tem como objetivo a aplicação dos conceitos sobre a manipulação de arquivos e diretorios com as ferramentas do ecosistema `Laravel` como a `Facade Storate` para manipulação de arquivos e pastas dentro de um sistema.

O projeto é baseado na necessidade de pequenas/médias empresas organizarem seus documentos baseado em clientes, visando centralizar o armazenamento de diversos tipos de arquivos para uma melhor performance e controle.

## SUMÁRIO 
- [Tecnologias Implementadas](#tecnologias-implementadas)
- [Entidades](#entidades)
    - [Users](#users)
    - [Businesses](#businesses)
    - [Client](#clients)
    - [Document](#documents)


## TECNOLOGIAS IMPLEMENTADAS

Usando o ecosistema do `Laravel`a criação e manipulação de pastas e arquivos é feita principalmente pela ferramenta de `Facade` `Storage` que se mostra uma classe poderosa na manipulação destes arquivos, podendo criar, armazenar, editar e excluir  estes elementos, além de outras funcionalidades como o download reescrita e manipulação

## ENTIDADES 

Para o desenvolvimento do projeto, estimei 3 entidades principais, sendo elas: 

### USERS

A classe `User` representa um funcionario de uma empresa(Businessses) que pode ter diversos clientes atrelados a sua empresa, podendo cadastrar novos arquivos ou clientes conforme sua necessidade.

### BUSINESSES

A classe `Business` representa uma empresa, sua implementação está simples no momento, pois o foco e o desenvolvimento das funcionalidades principais, ela serve de elo entre os funcionarios, clientes e documentos.


### DOCUMENTS

A classe `Document` representa um documento salvo para um usuário, ela guarda as informações como quem salvou o arquivo, qual o cliente relacionado e empresa, o diretorio do documento real fica salvo nela para uma manipulação mais fácil.

### CLIENTS

A clase `Client`representa um cliente interligado entre uma empresa e um documento, eles vão poder ter acesso a seus documentos porém não terão acesso ao sistema de forma comum.

A ideia é que um cliente pode solicitar acesso a um documento para recuperar ou rever, assim será gerado um link temporario para acessar/baixar o arquivo.

