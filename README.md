# PHP Developer assignment

## Task

Your task is to create a PHP application that is a feeds reader. The app can read feed from multiple feeds and store them to database. Sample feeds http://www.feedforall.com/sample-feeds.htm.

## Requirements
- The application must be developed by using a php framework and follow coding standard of that framework.
- As a developer, I want to run a command which help me to setup database easily with one run.
- As a developer, I want to run a command which accepts the feed urls (separated by comma) as argument to grab items from given urls. Duplicate items are accepted.
- As a developer, I want to see output of the command not only in shell but also in pre-defined log file. The log file should be defined as a parameter of the application.
- As a user, I want to see the list of items which were grabbed by running the command line. I also should see the pagination if there are more than one page. The page size is up to you.
- As a user, I want to filter items by category name on list of items.
- As a user, I want to create new item manually
- As a user, I want to update/delete an item

## How to do
1. Fork this repository
2. Start coding
3. Use gitflow to manage branches on your repository
4. Open a pull request to this repository after done

---

## Setting up (By Nguyen Hai Dang)

### Requirements
 - Make sure you have read and follow the `Server Requirements` section of [Laravel 5.5 official](https://laravel.com/docs/5.5)
 - Make sure you have [Composer](https://getcomposer.org/) installed on your machine.
 - Make sure you have Mysql running on your machine.
 - For Javascript development, make sure you have installed `npm` or `yarn`.

 ### Installation
 - Clone project to your machine, and move to the root project's folder.
 - Rename `.env.example` file to `.env` inside your project root and fill the database information
 - Run `php artisan key:generate`
 - Run `composer install` to install php dependencies.
 - Create new a database in Mysql which name is same `DB_DATABASE` from `.env` file.
 - Run `php artisan migrate` to create all tables.

 ### Generating Items from command line
  - Run `php artisan feeds:add {urls}` to store all items from given urls. For example: `php artisan feeds:add https://www.feedforall.com/sample.xml,http://www.rss-specifications.com/blog-feed.xml`
  - To see the log, please open `storage/logs/laravel.log`.

 ### Start development server
  - Run `php artisan serve` and open the displaying url on browser, Example: `http://127.0.0.1:8000`