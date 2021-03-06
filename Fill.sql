INSERT INTO `restaurants` (`rest_id`, `earnings`, `email`, `rest_name`, `address`, `pNumber`, `zipcode`, `open`, `close`, `images`)
VALUES (NULL, '0.00', 'pizzahut@gmail.com', 'Pizza hut', 'Oxford', '6623800345', '38655', NULL, NULL, 'pizzahut.jpg'), 
(NULL, '0.00', 'burgerjoint@gmail.com', 'Burger Joint', 'Longmont, Colorado', '819254456', '80142', NULL, NULL, 'burgerjoint.jpg'), 
(NULL, '0.00', 'italia@yahoo.com', 'Bertucci', 'Ocean city', '567890123', '21842', NULL, NULL, 'italian.jpg'), 
(NULL, '0.00', 'spicy@yahoo.in', 'Mirchi', 'Oxford, MS', '662345678', '38677', NULL, NULL, 'indian.png'), 
(NULL, '0.00', 'papajohns@gmail.com', 'Papa Johns\' pizza', 'Oxford, MS', '6623800999', '38655', NULL, NULL, 'papajohns.jpg'), 
(NULL, '0.00', 'starbucks@gmail.com', 'Starbucks', 'Longmont, CO', '819245678', '80501', NULL, NULL, 'starbucks.jpg');

INSERT INTO `items` (`item_id`, `rest_id`, `cost`, `name`, `description`, `images`, `ratings`)
VALUES (NULL, '11', '20.00', 'Burger', NULL, 'burger.jpg', '0'), 
 (NULL, '12', '10', 'Pasta', NULL, 'pasta.jpg', '0'), 
 (NULL, '14', '15', 'Pizza', NULL, 'pizza.jpg', '0'),
  (NULL, '10', '8', 'Pizza', NULL, 'pizza.jpg', '0'), 
  (NULL, '15', '5', 'Frapuccino', NULL, 'frap.jpg', '0'), 
  (NULL, '13', '11', 'Biryani', NULL, 'biryani.jpg', '0');