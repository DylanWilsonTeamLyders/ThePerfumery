# Potential To-Do's!

-   CSS Continuation:
    -   Make homepage and drag and drop page more dynamic and appealing.
    -   Favicon.
    -   Reduce redundant css.
    -   Fix errors overflow.
-   Media queries:
    -   Vertical queries.
    -   Reduce redundancies.
-   Browser and device testing.
-   Add a option to change password.
-   Fix errors overflowing 100vh.
-   Fix drag and drop:
    -   Allow mobile use (will require vertical redesign).
    -   Prevent items from being dragged on top of one another.
    -   Connect drag DB with users DB, so that if a user deletes their account in the users DB, it is also removed from the drag DB.
        -   Add drag items to users?
-   Simplify insertInto and insertIntoDrag into a singular DB function.

# Known Issues

-   Drag and drop

    -   Drag and drop does not work on mobile.
    -   Draggable items can be dropped on top of each other. Temp fix of alert and prevention when attempting to drop in a non-accepted area.
    -   Scaling on drag and drop page.
    -   Drag database does not update when user deletes their account.

-   Errors on register and update can overflow the page.

-   Not formatted vertically beyond 1490px.

-   Database connection is not closed.

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
        -   database.php for all database connections.
    -   $database creates a new Database object to query off of in all files with the header.
    -   Functions:
        -   br(): Echos line break.
        -   printErrors: Prints any errors within the $errors array to an h2 with class "errors".
        -   checkLogin(): Determines if the their is a $\_SESSION['username'] token stored for the client, and if not redirects to login page.

### HTML

-   **delete**: Prompts user to choose to delete their account or not.
-   **drag**: A simple drag and drop example using HTML and JS drag and drop API as well as AJAX to update the database without resetting the page.
-   **homepage**: Landing page for logged in users. Provides access to perfume tracker, edit, delete, and logout. If they click logout, the session is killed and the header is switched to index.php.
-   **login**: Basic login for users. Populates errors if queries come back null.
-   **register**: Registration form. Populates errors if queries come back with information in them already (username or email is taken). Validation takes place in several stages here.
-   **update**: Allows users to update any of their information.

### PHP

-   **ajax**: Receives information regarding the ID of the item moved and the landing zone. Updates the JSON object in the database to represent where each item is located in the drag and drop.
-   **delete_action**: If user confirms deletion the session is killed, their account is deleted from the users DB, and the header is switched to index.php.
-   **homepage_action**: Redirects user to different locations and programmatically generates a homepage photo based on the users wishlist. If no wishlist is found, uses the full list of perfumes.
-   **login_action**: Checks if entered username and password match info in DB. If they do, a session is created and the user is redirected to loggedin.php.
-   **register_action**: Populates errors if queries come back with information in them already (username or email is taken). Validation takes place in several stages here. If no errors, session is started and user is redirected to loggedin.php.
-   **updateinfo_action**: Shows user information from queried DB to provide up to date information. Validation takes place in several stages here. If no errors, $\_SESSION['username'] is overwritten with updated username to provide continual queries. User is sent to loggedin.
