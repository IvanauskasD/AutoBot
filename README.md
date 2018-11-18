To run this project:

- Create database using this command: ```php bin/console doctrine:database:create```
- Update database using these commands: ```php bin/console doctrine:schema:update --dump-sql``` and ```php bin/console doctrine:schema:update --force```
- To start project: ```composer install``` to install missing folders and then ```php bin/console server:run```



