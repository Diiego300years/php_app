Hi,
that's a project which I did like in few hours. My main goal was to create simple api and conteneraise it.




docker compose up --build

Wait above 1 minute

endpoint:
(http://localhost:8087/api/users)

<h1>Available functions:</h1>
<h2>getUsers</h2>
Returns a list of all users with their points in JSON format. Gets data from the users table. Can be tested with curl:
<br>curl -X GET http://localhost:8087/api/users

<h2>addPoints</h2>
Adds the specified number of points to the user with the given id. Validates the input and returns the updated user in JSOh1N format. Test with:
<br>curl -X POST http://localhost:8087/api/users/{id}/add-points -H "Content-Type: application/json" -d '{"points": 10}'

<h2>removePoints</h2>
Subtracts points from the user with the given id, ensuring that the resulting number of points is not negative. Returns the updated user or an error if the operation is not possible. Test with: 
<br>curl -X POST http://localhost:8087/api/users/{id}/remove-points -H "Content-Type: application/json" -d '{"points": 10}'
