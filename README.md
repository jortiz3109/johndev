[![Build Status](https://travis-ci.org/jortiz3109/johndev.svg?branch=master)](https://travis-ci.org/jortiz3109/johndev)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=jortiz3109_johndev&metric=security_rating)](https://sonarcloud.io/dashboard?id=jortiz3109_johndev)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=jortiz3109_johndev&metric=vulnerabilities)](https://sonarcloud.io/dashboard?id=jortiz3109_johndev)

# Laravel Blog

This is a simple app for blogging.

![DASHBOARD](https://www.johndev.co/blog-dashboard-example.png)

You can download this project as follows.

```bash
git clone https://github.com/jortiz3109/johndev.git
```

## Installation

This application was developed with Laravel 8x, most of the following steps are related to laravel
installation and configuration.

### Requirements

As any Laravel application, you will need to make sure your server meets the following requirements.

- PHP >= 7.2.5
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

In addition, you need the following dependencies.

- MySQL >= 5.7

## Setup

Let's copy the `.env.example` to `.env`.

```bash
cp .env.example .env
```
### Env Vars

Set up `DB_` and other env vars as you need.

| Variable                  | Description                              |
|---------------------------|------------------------------------------|
| SITE_TITLE                |  The site title                          |
| SITE_SOCIAL_GITHUB_LINK   |  Link to Github account                  |
| SITE_SOCIAL_GITHUB_TEXT   |  Text to display on Github link          |
| SITE_SOCIAL_TWITTER_LINK  |  Link to Twitter account                 |
| SITE_SOCIAL_TWITTER_TEXT  |  Text to display on Twitter link         |
| SITE_SOCIAL_LINKEDIN_LINK |  Link to Linkedin account                |
| SITE_SOCIAL_LINKEDIN_TEXT |  Text to display on Linkedin link        |


## Step by Step Installation

Make sure you have composer installed in your machine and execute the following command to install the
dependencies.

```bash
composer install
```

Then generate the key for the application.

```bash
php artisan key:generate
```

Finally, create the database schema and basic data executing the following command.

```bash
php artisan migrate --seed
```
## Creating admin user

To create the admin user and its role with all related permissions you could run the following code on tinker

```bash
User::factory()->create([
    'name' => 'Your name',
    'email' => 'Your email',
    'password => bcrypt('R34llyS3cur3P4ssw0rd')
]);
```
