# Custom Auth App

A Laravel application where the role-based authorization layer is built from scratch rather than pulled in from a package.

## What it does

Users are linked to roles through a `role_user` pivot table, and those roles gate access to a products resource. API access is issued through Sanctum personal access tokens.

## Schema

- `users`
- `roles`
- `role_user` — many-to-many pivot
- `products`
- `personal_access_tokens` — Sanctum

## Structure

- `app/Http/Controllers/UserController.php` — registration, login, role assignment
- `app/Http/Controllers/ProductController.php` — the guarded resource

## Stack

PHP · Laravel · Sanctum

## Running

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
