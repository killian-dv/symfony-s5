
## Backend for movies app

This repository is a symfony backend for a movie management application. It is under symfony 6 with api-platform

## Installation

First, you need to clone the repository

```bash
git clone https://github.com/killian-dv/symfony-s5.git
```
Install dependencies
```bash
composer install
```
Configure your local server with your database information on .env file. And make migration
```bash
php bin/console c:c
php bin/console d:s:u --force
```
Now you can run the symfony local server
```bash
symfony server:start
```
## API Reference
All api documentation is available thanks to the automatic documentation generated by api-platform at the following address: `YourLocalURL/api/docs`


