# ClientManager

This is a client manager system test.

It contains 2 examples of CRUD.

The first is the User CRUD which is a conventional Laravel CRUD using blade.

The second is a Company CRUDS which uses web services and Vue.

## Getting Started

You can start with cloning the repo.
````
git clone https://github.com/WayneBrummer/ClientManager.git
````
Then you can run NPM or don't as it is production ready.
````
npm run dev
````

### Prerequisites

These are the base requirements to run this system.

- PHP 7.2

- NPM


### Installing


```
 Copy .env.example file to .env
 
 Change the database details.

 php composer install
 
 php artisan key:generate
 
 php artisan migrate --seed
```

Admin details are:
```
 email: wayne@test.co.za
 pass: qwe123
```

User details are:
```
 email: SELECT * from users where id = 1
 pass: qwe123
```


## Running the tests

To Run the unit tests,

```
phpunit
```

To Run the dusk tests,

```
npm run test
```

### And coding style tests

These tests follow the processes and flow of the system.

Style-CI
PSR2


## Built With

* [Laravel](http://laravel.com) - The PHP framework used
* [VueJs](http://vue.com) - The Frontend framework used
* [Composer](https://composer.com/) - Dependency Management


## Authors

* **Wayne Brummer** - *Initial work* - [RomanKooki](https://github.com/RomanKooki)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details