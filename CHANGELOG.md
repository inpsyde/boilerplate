# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [unreleased]
### Added
* Plugin bootstrap boilerplate code
* Change to reflect Inpsyde's current policy to use the 'GPL-2.0 or later' license

## [0.2.2]
### Added
* Add `.phpunit.result.cache` to `.gitignore` template

### Changed
* [Normalize](https://github.com/localheinz/composer-normalize/) `composer.json`
* Change plugin header order

### Fixed
* Bitbucket Pipeline

## [0.2.1]
### Changed
* Change contact email address to english version
* Change all Inpsyde URL to SSL
* Apply current Inpsyde code style guide
* Add code coverage configuration to `phpunit.xml.dist` template
* Add strict type declaration to PHP file templates

### Added
* Add `wordpress-muplugin` as possible package type
* Add `bitbucket-pipelines.yml` and coding standards to be integrated in CI

### Fixed
* Remove localization (`gettext`) function calls

## [0.2.0]
### Added
 * Reference to [keep a changelog](https://keepachangelog.com/) in `CHANGELOG.md` template
 * Improve `CHANGELOG.md`

### Fixed
 * Wrong path to test directory in `phpunit.xml` template

## [0.1.0]
First pre-release. Implements the basic stuff.

### Added
 * Templates for WordPress themes and plugins
 * Templates for PHP composer packages


[0.2.2]: https://github.com/inpsyde/boilerplate/compare/0.2.1...0.2.2
[0.2.1]: https://github.com/inpsyde/boilerplate/compare/0.2.0...0.2.1
[0.2.0]: https://github.com/inpsyde/boilerplate/compare/0.1.0...0.2.0
[0.1.0]: https://github.com/inpsyde/boilerplate/releases/tag/0.1.0
