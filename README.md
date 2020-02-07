# WCPHX 2020 Reference Install<br>'Building Custom UX with Gutenberg and WP Roles' 

## Features
Coming soon......

## Directory Structure
```shell
PROJECT/                        # → Root Directory
├── wp-content/                 #
│   ├── themes/                 #
│   │   └── wcphx-genesis       # → Project Theme
│   └── plugins/                #
│       └── wcphx-functions/# → Project Functionality
├── .gitignore                  # → WPE CLI Gitignore
└── composer.json               # → Installs 3rd Party Plugins
```

## Setup Your Local Environment
1. Install a fresh WordPress install locally. You can use MAMP, [Flywheel Local](https://localbyflywheel.com/), [WP Engine DevKit](https://wpengine.com/devkit/), or other tools. We recommend one that includes [WP-CLI](https://wp-cli.org/).
2. In the [My WPEngine](https://my.wpengine.com/), go to Backup Points, select the most recent backup, and click “Download Zip”. You could download a full backup (and skip the steps below for sourcing media from production), but for large sites I like doing a partial backup excluding media. Select “Partial Backup” and check everything but “Media Uploads”. Set the email address to your own and you’ll be emailed a zip file.
3. Copy over the appropriate files to your local WP install (themes, plugins). Do not include the mu-plugins directory; that contains WPEngine specific code.
4. Import the database locally, using phpMyAdmin, direct SQL query or [Migrate DB Pro](https://deliciousbrains.com/wp-migrate-db-pro/) (pulling from production).
5. Update the URLs in the local database **NOTE: Ignore this when using Migrate DB Pro**. Using wp cli: `wp search-replace $(wp option get siteurl) http://wp.dev/mywebsite`, where the last URL is your local site’s URL. If you don’t have wp cli, try [Search Replace DB](https://interconnectit.com/products/search-and-replace-for-wordpress-databases/).
6. Delete the theme `wp-content/themes/[theme_name]` and the plugin `wp-content/plugins/core-functionality`.
7. At the top level of the WordPress directory in terminal and run the following commands. This will pull down the version controlled theme and plugin.
```
git init
git remote add origin git@github.com:abstractwp/[repo_name].git
git pull origin pro
git fetch --all
git checkout dev
```


## Using NPM, Composer, & WP-CLI without installation
Flywheel Local includes a variety of tools pre-installed: 
- WP-CLI
- Composer
- npm
- Gulp
- Grunt

To access, in the Local by Flywheel interface right click the install name and click `open site SSH`



## Making Project Theme Changes
Navigate to the theme directory
```
cd wp-content/themes/wcphx-genesis/
```

Create a new branch for your changes
```
git checkout -b your-branch-name
git branch --track origin your-branch-name
```

If required run NPM
```
npm install
npm start
```

Pushing your changes
```
git add .
git commit -m "your awesome commit message"
git push
```

## Making Project Plugin Changes
Navigate to the project plugin directory  
```
cd wp-content/plugins/wcphx-functions/
```

Create a new branch for your changes
```
git checkout -b your-branch-name
git branch --track origin your-branch-name
```

If required run NPM
```
npm install
npm start
```

Pushing your changes
```
git add .
git commit -m "your awesome commit message"
git push
```