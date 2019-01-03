# MMMMM
Mediocre Mapper Multi Mapper Manager

Easily deploy and destroy multiple [MMMM](https://github.com/squeaksies/MediocreMapper/releases) servers.

### Requirements
* jq
* sqlite3
* bash
* php
* curl
* sed
* unzip
* An HTTP server

### Usage
Just put it where your HTTP server will serve it, and run php.
You might want to edit some settings like:
* `_domain` in `mmmmm`.
* `$root` in `upload.php` and `remove.php`.

If you're going have MMMMM publicly available it would be wise to password protect access to `remove.php`.
