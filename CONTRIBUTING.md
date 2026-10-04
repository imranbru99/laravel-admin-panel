# Contributing to Laravel Admin Panel

Thank you for considering contributing to `imrandevbd/laravel-admin-panel`!

## Code of Conduct

Please review and adhere to our [Code of Conduct](CODE_OF_CONDUCT.md) during all interactions with the project.

## Pull Request Process

1. Fork the repo and create your branch from `main`:
   ```bash
   git checkout -b feature/my-new-feature
   ```
2. Install dependencies:
   ```bash
   composer install
   ```
3. Ensure all tests and static analysis pass:
   ```bash
   vendor/bin/phpunit
   vendor/bin/phpstan analyse
   vendor/bin/pint --test
   ```
4. If you have added new features or modified behaviors, write corresponding tests in `tests/`.
5. Format code with Pint:
   ```bash
   vendor/bin/pint
   ```
6. Submit a Pull Request with a clear description of the problem solved and the design approach taken.
