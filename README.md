# To Do!

-   CSS Continuation
-   Media queries
-   Prepared statements
-   Attempt to break the system
-   Clean up file system
-   Organize and comment all pages
-   Set passwords to hashes
-   Better documentation

# Issues

-   Users perfume wishlist is reset if they change their username, and the DB is populated with a "new user."
    -   Potential fix: Add wishlist and owned to users table? Or make users autopopulate / change key based on login?

# Folders

### Class

All classes are stored here and initialized via autoloader in init.php.

-   Database.php

-   Makes database connections as needed.

### CSS

All CSS style sheets are stored here and initialized in headfoot/header.

-   **meyer.css**: Meyer reset for all browser built in css.

-   **style.css**: Basic universal style sheet.

### Headfoot

Persistently used headers and footers stored here.

-   Header
    -   Includes:
        -   init.php: Access all classes with a single require.
    -   $database creates a new Database object to query off of in all files with the header.
    -   Functions:
        -   br(): Echos line break.
        -   printErrors: Prints any errors within the $errors array to an h2 with class "errors".
        -   checkLogin(): Determines if the their is a $\_SESSION['username'] token stored for the client, and if not redirects to login page.

### HTML

-   **deleteaccount**: Prompts user to choose to delete their account or not. If they click yes, the session is killed and the header is switched to index.php.
-   **loggedin**: Landing page for logged in users. Provides access to edit, delete, and logout. If they click logout, the session is killed and the header is switched to index.php.
-   **login_form**: Basic login for users. Populates errors if queries come back null.
-   **register_form**: Registration form. Populates errors if queries come back with information in them already (username or email is taken). Validation takes place in several stages here.
-   **updateinfo**: Allows users to update any of their information.

### PHP

-   **login_action**: Checks if entered username and password match info in DB. If they do, a session is created and the user is redirected to loggedin.php.
-   **register_action.php**: Populates errors if queries come back with information in them already (username or email is taken). Validation takes place in several stages here. If no errors, session is started and user is redirected to loggedin.php.
-   **updateinfo_action**: Shows user information from queried DB to provide up to date information. Validation takes place in several stages here. If no errors, $\_SESSION['username'] is overwritten with updated username to provide continual queries. User is sent to loggedin.
