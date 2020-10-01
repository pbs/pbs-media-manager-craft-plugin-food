# Media Manager

Craft CMS plugin for synchronize Media entries data from PBS API

## Pre-installation
1. Append following line in `composer.json` :

   ```
   "repositories": [
      {
         "type": "vcs",
         "url": "ssh://git@git.pbs.org:7999/moon/pbs-media-manager-craft-plugin.git"
      }
   ]
   ```
2. Append another line :

   ```
   "require": {
     ...
     "moon/pbs-media-manager-craft-plugin": "dev-master"
   }
   ```


## Installation
1. Run `composer clearcache`
1. Run `composer update`
2. Install plugin through admin `Settings > Plugins`.
