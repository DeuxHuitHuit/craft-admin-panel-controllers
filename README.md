# Craft Admin Panel Controllers

Install

```sh
composer require deuxhuithuit/craft-admin-panel-controllers
./craft plugin/install admin-panel-controllers
```

It will add 3 endpoints:

1. /actions/admin-panel-controllers/dashboard/redirect
2. /actions/admin-panel-controllers/auth/check
3. /actions/admin-panel-controllers/edit/redirect?site={entry.site}&uri={entry.uri}

For the auth check to work in headless mode, `sameSiteCookieValue` in `general.php` has to be set to `none`.
