docker compose up --build

poczekać z minutę

endpoint:
(http://localhost:8087/api/users)

getUsers
Zwraca listę wszystkich użytkowników z ich punktami w formacie JSON. Pobiera dane z tabeli users. Można przetestować za pomocą curl:

curl -X GET http://localhost:8087/api/users

addPoints
Dodaje określoną liczbę punktów użytkownikowi o podanym id. Waliduje dane wejściowe i zwraca zaktualizowanego użytkownika w formacie JSON. Przetestuj za pomocą:
curl -X POST http://localhost:8087/api/users/{id}/add-points -H "Content-Type: application/json" -d '{"points": 10}'

removePoints
Odejmuje punkty użytkownikowi o podanym id, upewniając się, że wynikowa liczba punktów nie jest ujemna. Zwraca zaktualizowanego użytkownika lub błąd, jeśli operacja nie jest możliwa. Przetestuj za pomocą:
curl -X POST http://localhost:8087/api/users/{id}/remove-points -H "Content-Type: application/json" -d '{"points": 10}'
