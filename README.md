# sakila
## Sakila Github:
[Sakila Github](https://github.com/AlgebraPHP2020/sakila)


## Postrupak instalacije:
Kloniranje repozitorija:
```sh
$ git clone https://github.com/AlgebraPHP2020/sakila.git
```

Kreiranje laravel projekta:
```sh
$ composer create-project --prefer-dist laravel/laravel sakila-tmp
```

Uci u direktorij sakila:
```sh
$ cd sakila/
```

Pokrenuti web server:
```sh
$ php artisan serve
```

## Postavka SAKILA baze podataka:
Dohvati sakila bazu:
```sh
$ cd database
$ php -r "copy('https://downloads.mysql.com/docs/sakila-db.zip', 'sakila-db.zip');"
```

Pokreni skripte u Heidisql:
```SQL
$ RUN sakila-schema.sql
$ RUN sakila-data.sql
```





### Todos

 - Write MORE Tests
 - Add Night Mode