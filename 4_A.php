<!-- Tampilkan semua data game beserta genre maupun stock yang tersisa -->
SELECT game.title, game.image, genre.name
FROM game
INNER JOIN genre on game.genre_id = genre.id

<!-- tampilkan semua game dengan genre yang sama -->
SELECT game.title, game.image, genre.name
FROM game
INNER JOIN genre on game.genre_id = genre.id
WHERE game.genre_id = '1' 
<!-- or -->
SELECT game.title, game.image, genre.name
FROM game
INNER JOIN genre on game.genre_id = genre.id
WHERE genre.name LIKE '%Action%'