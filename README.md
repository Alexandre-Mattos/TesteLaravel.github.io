<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Description

    Desafio muito bacana de fazer, consumo de API externas com formatação para exibição em uma listagem com um conjunto
    de filtros


## Installation

    Para rodar o programa:
        - PHP -v 8.1.0
        - Wamp;
        - Ao clonar o repositório e rodar o wamp, rodar os seguintes comandos no terminal:
            - composer install
            - copy .env.example .env
            - php artisan key:generate
            - php artisan optimize
            - php artisan serve

    E é para estar o seu servidor local!

    
## Rotas
  
    '/repositorios' -> Listagem


## Sobre o Teste

    Somente uma listagem de repositórios pessoais  públicos contendo:
        1. Funcionalidade de filtro dos repositórios por repositórios arquivados e ativos;
        2. Funcionalidade de ordenação alfabética e por data do ultimo commit dos repositórios;
        3. Funcionalidade de pesquisa simples dos repositórios (exemplo, pesquiso por "node" e vejo a lista de repositórios que possuem a string "node" em parte do nome.
