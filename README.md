# Inpsyde Boilerplate

This tool is based on top of [`brightnucleus/boilerplate`](https://github.com/brightnucleus/boilerplate). It's goal is to simplify and speed up the process of creating new packages for the daily WordPress work. It's focused on creating composer packages of type `wordpress-plugin`, `wordpress-theme`, `library` and `project` with the default directory structure and meta files (`phpunit.xml.dist`, `composer.json` and so on) but without any code. The created structure follows the Inpsyde Codex.

## Usage

All you need is at least PHP 5.6 and [composer](https://getcomposer.org/) installed. 

```
$ composer create-project inpsyde/boilerplate <DIRECTORY>
```

After composer has fetched some dependencies, you will get asked some question about the new package:

```
> InpsydeBoilerplate\Setup::run
Now running setup tasks...
Task Welcome
  ___                                _
 |_ _| _ __   _ __   ___  _   _   __| |  ___
  | | | '_ \ | '_ \ / __|| | | | / _` | / _ \
  | | | | | || |_) |\__ \| |_| || (_| ||  __/
 |___||_| |_|| .__/ |___/ \__, | \__,_| \___|
             |_|          |___/
  ____          _  _                     _         _
 | __ )   ___  (_)| |  ___  _ __  _ __  | |  __ _ | |_  ___
 |  _ \  / _ \ | || | / _ \| '__|| '_ \ | | / _` || __|/ _ \
 | |_) || (_) || || ||  __/| |   | |_) || || (_| || |_|  __/
 |____/  \___/ |_||_| \___||_|   | .__/ |_| \__,_| \__|\___|
                                 |_|
Task AskAboutProjectParameters
Vendor name [Human readable vendor name (probably your company's name)] Default: "Inpsyde" ?
Vendor name in lowercase [Used in composer package name (no spaces, [a-z0-9-] )] Default: "inpsyde" ?
Package name [Human readable package name] Default: "Awesome Package" ? My new theme
Package name in lowercase [Used for the composer package name (no spaces, [a-z0-9-] )] Default: "my-new-theme" ?
License [License abbreviation [MIT|GPL]] Default: "MIT" ? GPL
Package type [The composer type of the package (library, wordpress-plugin, wordpress-theme or project)] Default: "library" ? wordpress-theme
Package base namespace [The base PHP namespace of the package.] Default: "MyNewTheme" ?
Textdomain [Used for translation in gettext functions] Default: "my-new-theme" ?
Package description [The package description in one sentence] Default: "TODO: Describe what this package is all about" ? This is the description of my new theme
Author name [The name of the author (in person) of the package] Default: "Jane Doe" ? David Naber
Author email [The email of the author.] Default: "hallo@inpsyde.com" ? d.naber@inpsyde.com
```

Finally the boilerplate runs some scripts to create all the files according to your inputs. At the end the sources and VCS files of the boilerplate gets deleted and a new git repository is initialized.

After that, your directory looks like this:

```
$ ls -al <DIRECTORY>
drwxrwxr-x  8 david david   320 Jun 12 17:33 ./
drwxrwxrwt 18 root  root   2440 Jun 12 17:33 ../
drwxrwxr-x  4 david david    80 Jun 12 17:33 assets/
-rw-rw-r--  1 david david   149 Jun 12 17:33 CHANGELOG.md
-rw-rw-r--  1 david david   539 Jun 12 17:33 composer.json
-rw-rw-r--  1 david david   158 Jun 12 17:33 functions.php
drwxrwxr-x  7 david david   200 Jun 12 17:33 .git/
-rw-rw-r--  1 david david    21 Jun 12 17:33 .gitignore
-rw-rw-r--  1 david david 17751 Jun 12 17:33 LICENSE
-rw-rw-r--  1 david david   389 Jun 12 17:33 phpunit.xml.dist
-rw-rw-r--  1 david david   781 Jun 12 17:33 README.md
drwxrwxr-x  2 david david    60 Jun 12 17:33 src/
-rw-rw-r--  1 david david   258 Jun 12 17:33 style.css
drwxrwxr-x  3 david david    60 Jun 12 17:33 tests/
drwxrwxr-x  3 david david    80 Jun 12 17:33 vendor/
drwxrwxr-x  2 david david    60 Jun 12 17:33 w-org-assets/
```

The structure of the directory depends on the type of package you choose. For example the `w-org-assets/` directory won't appear for `library` or `project` types.

## Acknowledgment

This package is build on top of the [`brightnucleus/boilerplate`](https://github.com/brightnucleus/boilerplate) package by [Alain Schlesser](http://www.alainschlesser.com/).

## Crafted by Inpsyde

The team at [Inpsyde](https://inpsyde.com) is engineering the Web since 2006.

## License

Copyright (c) 2016 Inpsyde GmbH

Good news, this plugin is free for everyone! Since it's released under the [MIT License](LICENSE) you can use it free of charge on your personal or commercial website.

## Contributing

All feedback / bug reports / pull requests are welcome. But keep in mind this package is used for the daily work at Inpsyde.