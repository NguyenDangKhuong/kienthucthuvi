# Laravel Mix Boilerplate for WordPress

### Run

1. Construct WordPress in your favorite way, e.g. Docker, XAMPP, and Local by Flywheel.

2. With symbolic link, refer theme directory in Laravel Mix Boilerplate, from theme directory in WordPress.
```
$ ln -s wp-content/themes/foobar-japan /path/to/wp/wp-content/themes/foobar-japan
```

3. Open admin page of WordPress, and switch theme.
```
Twenty XXXXX -> FooBar Japan
```

4. Duplicate `.env` as `.env-sample`.
```
$ cp .env-sample .env
```

5. Open `.env`, and set WordPress URL to `MIX_BROWSER_SYNC_PROXY`.
```
MIX_BROWSER_SYNC_PROXY=http://localhost:8000
```

6. Install dependencies.
```
$ npm i
```

7. Run command for development, then you can see sample page.
```
$ npm run dev
```

8. Before deploying, run command for production.
```
$ npm run prod
```
