<p align="center"><a href="https://www.diagro.be" target="_blank"><img src="https://diagro.be/assets/img/diagro-logo.svg" width="400"></a></p>

<p align="center">
<img src="https://img.shields.io/badge/project-lib_laravel_webhooks_server-yellowgreen" alt="Diagro webhooks server library">
<img src="https://img.shields.io/badge/type-library-informational" alt="Diagro service">
<img src="https://img.shields.io/badge/php-8.1-blueviolet" alt="PHP">
<img src="https://img.shields.io/badge/laravel-9.0-red" alt="Laravel framework">
</p>

## Beschrijving

Deze bibliotheek wordt gebruikt als de backend applicatie events stuurt naar luisterende webhooks.
Er is een route POST /webhooks/register, die toestaat om apps webhooks te registeren op de server.
Er wordt een tabel `webhook_clients` gemaakt na migration. Deze bevat de webhook urls en de secrets.
Deze zijn encrypted.

## Installatie

* Composer: `diagro/lib_laravel_whs: "^1.0"`