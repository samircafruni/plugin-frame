
# Plugin Blocos Gutenberg Wordpress

Boilerplate simples para a criação de blocos Gutenberg.




## Requisitos
Versões testadas

```
php      --version       => v7.4.33
node     --version       => v19.2.0
composer --version       => v2.4.4
```

*Obs: Para utilizar esse boilerplate precisamos ter o ***ACF PRO*** em nosso Wordpress*

## Ambiente

Para conseguir testar o plugin é necessario ter um ambiente wordpress e adicionar o
plugin na pasta `wp-content/plugins`.

[Wordpress com Docker](https://www.erudio.com.br/blog/configurando-uma-stack-wordpress-com-docker-e-docker-compose)

*Obs: Para que o plugin funcione é necessario ter também um tema adequado para a inserção dos blocos Gutenberg*

## Instalação

* Instalando dependências NodeJS
```
$ npm install
```

* Instalando dependências Composer (*Obs: Para rodar o composer install é necessario executar o build pelo menos uma vez para criar a pasta ./dist*)
```
$ composer install
```

## Builds

* Build do plugin para produção
```
$ npm run build
```

* Build do plugin para desenvolvimento com observadores
```
$ npm run start
```


## Estrutura dos arquivos

```
plugin-name/
|
|– dist                             # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|
|– src/                             # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |– app/                         # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |- Classes/                 # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |   |- Core/                # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |   |- Libs/                # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |   
|   |   |- Controllers/             # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |   |- Gutenberg/           # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |   |
|   |   |   |- Web/                 # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |   |   |- Admin/           # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |   |   |- Page/            # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |
|   |   |- Traits/                  # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |
|   |– resources/                   # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |- assets/                  # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |   |- images/              # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |   |
|   |   |   |- scripts/             # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |   |   |- gutenberg/       # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |   |   |- admin.js         # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |   |   |- index.js         # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |   |
|   |   |   |- styles/              # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |   |   |- admin.scss       # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|   |   |   |   |- index.scss       # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|
|– .gitignore                       # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|– composer.json                    # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|– index.php                        # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|– package.json                     # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|- plugin-name.php                  # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|- webpack.mix.js                   # Lorem ipsum dolor sit amet, consectetur adipiscing elit.
|

```

## Como Criar um Bloco ?

* 01 - Registrando nosso bloco: devemos seguir o exemplo dentro de `src/app/Controllers/Gutenberg/`
* 02 - Registrando o bloco a action do wordpress: seguir exemplo dentro de `src/app/Classes/Core/Setup.php`
* 03 - Registando nossos campos ACF: seguir exemplo dentro de `src/app/Classes/Libs/Acf/`
* 04 - Registrando nossos campos ACF a action do wordpress: seguir exemplo dentro de `src/app/Classes/Core/Setup.php`

