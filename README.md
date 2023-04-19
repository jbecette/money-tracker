# Money Tracker

A simple finance tracker app made with [Laravel](https://laravel.com/) + [AdminLTE](https://adminlte.io/themes/v3/), using [Jeroennoten's](https://github.com/jeroennoten/Laravel-AdminLTE) package.

![Money Tracker Screenshot](images/money-tracker-sample.png?raw=true "Money Tracker")

## Prerequisites

* Apache
* PHP 7.4.33 or newer
* MySQL 8
* Composer
* npm

## How to setup the project locally

1) Clone the project
```
git clone https://github.com/jbecette/money-tracker
```

2) Move into the project's directory and install the Composer dependencies

```bash
cd money-tracker
composer install
```

3) Install Node dependencies

```bash
npm install
```

4) Create the .env file, copying it from the example

```bash
cp .env.example .env
```

5) Generate the app's encryption key

```bash
php artisan key:generate
```

6) Create an empty MySQL database

```mysql
CREATE DATABASE IF NOT EXISTS `money-tracker`
```

7) Edit the .env file with the database reference and credentials.

For example:

```php
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=money-tracker
DB_USERNAME=root
DB_PASSWORD=
```

8) Run migrations

```bash
php artisan migrate
```

9) Run seeds

```bash
php artisan db:seed
```

10) Run the project locally

```bash
php artisan serve
```
This should allow us to reach the project at http://127.0.0.1:8000/

In order to login, first we must create a user following the **Register a new membership** link.

## Usage

In this app you'll be able to create **accounts**, register **transactions** for them (**income** and **expenses**), and get a **balance**.

Each registered user will have their own accounts and transactions, and will not be able to see another user's.

### Creating an account

  * Go to the **Accounts** section by clicking the option in the left sidebar.
  * Press the **Add New** button on top of the grid.
  * Enter an **Account Name** and a short **description**
  * Press **Submit**.

![Creating an account](images/money-tracker-create-account.gif?raw=true "Creating an account")
 
 ### Inserting transactions

* Go to the **Transactions** section by clicking the option in the left sidebar.
* Select an account.
* Press the **Add New** button on top of the grid.
* Choose a **Transaction Type** (**income** or **expense**)
* Select a **Transaction Description** from the combo below (it will update automatically with some predefined options, based on the transaction type selected).
* Enter an **amount** and an optional **comment**.
* Press **Submit**.

The transaction will be inserted and we'll return to the transactions grid. The **balance** will be updated automatically by summing all transactions:

![Inserting a transaction](images/money-tracker-insert-transaction.gif?raw=true "Inserting a transaction")

Accounts and transactions can be edited at any time. If the transaction's amount is edited, the balance will be updated accordingly.

## FAQ

> How do I insert new transaction descriptions?

Add them in the transaction types seeder (TransactionTypesSeeder.php).