Install the repo in a directory off your webroot called "assignment".

Assuming the app is running on your localhost, this URL gets you to the login screen: http://localhost/assignment/public.

The one set of valid credentials is test@test.com/abc123

The application uses a simple server-side MVC implementation for organizing the code. Functionally, the application utilizes ajax to process a login form submission and authenticate a user. The server-side authentication uses hard-coded values for expediency, with a logical next step being the integration of a database for storing user credentials and additional code for working with the database.

To satisfy the requirement for overriding the authentication method, I added an SSOUser class that extends the User class, overriding the validateUser() method to provide the alternate capability of authenticating against an SSO service. This method is called when clicking on the "Utilize SSO" button. What I have implemeted is little more than stubbing out the method calls, but it provides an example of polymorphism for the User class.

Other improvements to the app would involve more complete dynamic routing, better/more error handling, data sanitation/security, and visual styling. There is currently no server-side session being set, but that would be a logical add to maintain state.

Finally, while a cookie containing the user's ID is being set on successful authentication, it is not being utilized by the business logic in the app. This was left incomplete in order to facilitate testing the existing business logic. A complete application would check for the cookie server-side to validate the auth status of the user and might also utilize the cookie information client-side.
