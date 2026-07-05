# Pra Theme

[![CI](https://github.com/prazdnikvova/pra-theme/actions/workflows/ci.yml/badge.svg)](https://github.com/prazdnikvova/pra-theme/actions/workflows/ci.yml)

A lean, opinionated WordPress starter theme — the distilled result of shipping
and optimizing real client sites (see the [pbt case study](https://github.com/prazdnikvova/pbt)).
Small enough to read in one sitting, complete enough that performance,
security, i18n and CI are solved before you write your first line of project code.

*Українська версія — [нижче](#pra-theme--українською).*

## What you get

- **Clean template hierarchy** — 19 files, no `category.php`/`tag.php`/`author.php`
  duplicates (WordPress falls back to `archive.php`), a compact `entry-*` partial
  family, comments without trackback legacy.
- **Asset loading done right** — `style.css` holds only the theme header; real
  CSS lives in `assets/css/theme.css`, JS in `assets/js/main.js` loaded from the
  footer with `defer`. Versions come from `filemtime()` — editing a file busts
  the cache, nothing is bumped by hand. **Zero jQuery.**
- **Security hardening out of the box** (`inc/security.php`) — REST user
  enumeration closed, `?author=` probes return 404, security headers
  (X-Frame-Options, nosniff, Referrer-Policy, Permissions-Policy, HSTS on SSL),
  WP version leak removed.
- **Accessibility basics** — skip link, screen-reader text helpers,
  `initial-scale=1` viewport, meaningful "read more" links.
- **i18n-ready** — every string wrapped in gettext with the `pra-theme` domain,
  `languages/pra-theme.pot` included.
- **Quality gates included** — PHPCS ruleset (output escaping, input
  sanitization, nonces, prepared SQL, i18n correctness), GitHub Actions CI
  (php -l on PHP 8.2/8.3 + PHPCS), and a 13-check Playwright smoke test.

## Quick start

1. Copy the theme into `wp-content/themes/`, rename the folder to your slug.
2. Search & replace: `pra-theme` (text domain + handles), `pra_` (function
   prefix), `Pra Theme` (display name) — three literal replacements across the
   theme, then update `style.css` and `composer.json` headers.
3. Activate and build. Register per-feature scripts/styles in
   `pra_enqueue_assets()` and enqueue them only where used — the pattern scales
   from a landing page to a catalog (see the pbt case study for the block-scoped
   version of the same idea).

## Checks

```bash
# PHPCS (security + i18n ruleset)
composer install
composer phpcs

# Smoke test — needs a local WP site running the theme
cd tests
npm install
npx playwright install chromium   # first time only
PRA_BASE_URL=http://your-site.local npm test
```

The smoke test verifies: 200 + security headers on the home page, skip link,
`main#content` landmark, viewport, no generator meta, deferred `main.js`,
zero JS console errors, 404 status for missing pages, working search, and
that anonymous `wp-json/wp/v2/users` returns 404.

## Credits & license

Based on [BlankSlate](https://github.com/webguyio/blankslate) (GPL).
GNU General Public License v3 or later.

**Volodymyr Prazdnikov** — [LinkedIn](https://www.linkedin.com/in/volodymyr-prazdnikov-2516451ab/)

---

# Pra Theme — українською

Мінімалістична, але доведена до пуття стартова тема WordPress — дистилят
досвіду реальних клієнтських проєктів (див. [кейс pbt](https://github.com/prazdnikvova/pbt)).
Достатньо мала, щоб прочитати за один підхід; достатньо повна, щоб
продуктивність, безпека, i18n і CI були вирішені ще до першого рядка коду проєкту.

## Що всередині

- **Чиста ієрархія шаблонів** — 19 файлів, без дублів `category.php`/`tag.php`/
  `author.php` (WordPress сам відкочується до `archive.php`), компактна сім'я
  партіалів `entry-*`, коментарі без trackback-легасі.
- **Правильне підключення асетів** — `style.css` містить лише шапку теми;
  реальний CSS в `assets/css/theme.css`, JS в `assets/js/main.js` з футера з
  `defer`. Версії з `filemtime()` — правка файлу пробиває кеш сама, нічого не
  бампається руками. **Нуль jQuery.**
- **Безпека з коробки** (`inc/security.php`) — REST user enumeration закритий,
  `?author=` віддає 404, security-заголовки (X-Frame-Options, nosniff,
  Referrer-Policy, Permissions-Policy, HSTS на SSL), витік версії WP прибрано.
- **База доступності** — skip link, класи screen-reader-text,
  viewport з `initial-scale=1`, змістовні лінки «читати далі».
- **Готовність до перекладу** — всі рядки в gettext з доменом `pra-theme`,
  `languages/pra-theme.pot` у комплекті.
- **Контроль якості в комплекті** — PHPCS-набір (екранування виводу,
  санітизація вводу, nonce, prepared SQL, коректність i18n), CI на GitHub
  Actions (php -l на PHP 8.2/8.3 + PHPCS) і Playwright-смоук на 13 чеків.

## Швидкий старт

1. Скопіюй тему в `wp-content/themes/`, перейменуй теку на свій слаг.
2. Заміни по темі: `pra-theme` (text domain + хендли), `pra_` (префікс
   функцій), `Pra Theme` (назва) — три літеральні заміни, плюс шапки
   `style.css` і `composer.json`.
3. Активуй і будуй. Скрипти/стилі фіч реєструй у `pra_enqueue_assets()` і
   вмикай лише там, де вони використовуються — патерн масштабується від
   лендінга до каталогу (block-scoped версію цієї ж ідеї див. у кейсі pbt).

## Перевірки

```bash
# PHPCS (безпека + i18n)
composer install
composer phpcs

# Смоук — потрібен локальний WP-сайт з темою
cd tests
npm install
npx playwright install chromium   # лише першого разу
PRA_BASE_URL=http://your-site.local npm test
```

## Подяки і ліцензія

На базі [BlankSlate](https://github.com/webguyio/blankslate) (GPL).
GNU General Public License v3 or later.

**Volodymyr Prazdnikov** — [LinkedIn](https://www.linkedin.com/in/volodymyr-prazdnikov-2516451ab/)
