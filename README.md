## SKRIPTIK

#### IMPORTANT!!!
Please create separate branch if you want to push your works by using 
```bash
git checkout -b name_of_your_new_branch
```
and then you can commit your work to your local branch, and push to the remote branch.

If your work is ready to be released on the production, do a pull request, and i will immediately review and accept it.

#### Initialization Instruction

There is no need to create the tables inside your server, laravel will do it automatically.

just create a database named `skriptik` and

fill your `.env` file with your database server detail e.g :

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
//database_name is skriptik
DB_DATABASE=skriptik
DB_USERNAME=root
DB_PASSWORD=toor
```

and run
```bash
php artisan migrate
```

and then do your shit things

####Database Creation via Laravel Framework

if you want to create a table for your work here is the steps :
1. do

```bash
php artisan make:model YourModel --migration
```

2. open `YourModel.php` in /app folder and add this :
```php
class YourModel extends model
{
    protected $table = "YourModel";    
}
```

3. go to /database/migrations and there will be your migration file, edit the method `up`
```php
public function up()
    {
        Schema::create('YourModel', function (Blueprint $table) {
            $table->increments('id'); //id autoincrement
            $table->string('nama'); //ini serah lo
            $table->string('email'); //ini juga
            $table->string('nohp'); //ini juga
            $table->text('alamat'); //ini juga
            $table->timestamps(); /kolom default, jan diapa apain, kalo ga ada tambahin aja kek begindang
        });
    }
```

and do

```bash
php artisan migrate
```

and we're done
