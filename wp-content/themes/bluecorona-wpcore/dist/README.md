## Sass and CSS

Some basics about the Sass and CSS files:
- The theme itself uses the `/style.css`file only to identify the theme inside of WordPress. The file is not loaded by the theme and does not include any styles.
- The `/css/theme.css` and its minified little brother `/css/theme.min.css` file(s) provides all styles. It is composed of five different SCSS sets and one variable file at `/sass/theme.scss`:

 ```@import "theme/theme_variables";  // 1. Add your variables into this file. Also add variables to overwrite Bootstrap or understrap(starter theme) variables here
 @import "../src/bootstrap-sass/assets/stylesheets/bootstrap";  // 2. All the Bootstrap stuff - Don´t edit this!
 @import "understrap/understrap"; // 3. Some basic WordPress stylings and needed styles to combine Boostrap and Underscores
 @import "../src/fontawesome/scss/font-awesome"; // 4. Font Awesome Icon styles
 // Any additional imported files //
 @import "theme/theme";  // 5. Add your styles into this file
 ```

- Don’t edit the number 2-4 files/filesets listed above.
- Your design goes into: `/sass/theme`. 
  - Add your styles to the `/sass/theme/_theme.scss` file 
  - And your variables to the `/sass/theme/_theme_variables.scss`
  - Or add other .scss files into it and `@import` it into `/sass/theme/_theme.scss`.


### Installing Dependencies for Sass compilation
- Make sure you have installed Node.js and Browser-Sync (optional) on your computer globally
- Then open your terminal and browse to the location of your theme copy
- Run: `$ npm install`

### Running
To work with and compile your Sass files on the fly start:

- `$ gulp watch`


Or, to run with Browser-Sync:

- First change the browser-sync options to reflect your environment in the file `/gulpconfig.json` in the beginning of the file:
```javascript
{
    "browserSyncOptions" : {
        "proxy": "localhost/theme_test/", // <----- CHANGE HERE
        "notify": false
    },
    ...
};
```
- then run: `$ gulp watch-bs`

## Mandatory Plugins to be installed

- These will be installed automatically when installing theme with the deployement app 

- Classic Editor - https://wordpress.org/plugins/classic-editor/

- Lazy Load XT - https://wordpress.org/plugins/lazy-load-xt/