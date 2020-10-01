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

## Installation
1. Run `composer require papertiger/mediamanager3`
2. Install plugin through admin `Settings > Plugins`.
