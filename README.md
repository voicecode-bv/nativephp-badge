# voicecode-bv/nativephp-badge

A small NativePHP Mobile plugin that sets the **app icon badge counter**
(the red number on the app icon) from JavaScript.

## Installation

```bash
composer require voicecode-bv/nativephp-badge
```

If the package is not on Packagist, add the repository to the consuming app's
`composer.json` first:

```json
"repositories": [
    { "type": "vcs", "url": "https://github.com/voicecode-bv/nativephp-badge" }
]
```

The JS bridge is published under the `@voicecode-bv/nativephp-badge` import. Point your
bundler at it (the package is installed into `vendor/voicecode-bv/nativephp-badge`):

```ts
// vite.config.ts
'@voicecode-bv/nativephp-badge': path.resolve(
    __dirname,
    'vendor/voicecode-bv/nativephp-badge/resources/js/index.ts',
),
```

```jsonc
// tsconfig.json
"paths": {
    "@voicecode-bv/nativephp-badge": ["./vendor/voicecode-bv/nativephp-badge/resources/js/index.ts"]
}
```

## Why

iOS sets the icon badge automatically from the `aps.badge` field of an incoming
push payload, but it does **not** decrement the badge when the user reads
notifications inside the app. This plugin exposes a `Badge.Set` bridge function
so the SPA can keep the badge in sync with the unread-notifications count.

## Usage (JS)

```ts
import { setBadge } from '@voicecode-bv/nativephp-badge';

await setBadge(3); // show "3" on the app icon
await setBadge(0); // clear the badge
```

## Platform notes

- **iOS**: sets the exact badge number via `UNUserNotificationCenter.setBadgeCount`.
- **Android**: numeric icon badges are launcher-dependent with no reliable
  launcher-agnostic API. `Badge.Set` only handles clearing (count `0`, via
  `NotificationManager.cancelAll()`); positive counts are a no-op and rely on
  the FCM push payload's `notification_count`.

## Bridge function

| Name        | Params         | Returns           |
| ----------- | -------------- | ----------------- |
| `Badge.Set` | `{ count: int }` | `{ success: bool }` |
