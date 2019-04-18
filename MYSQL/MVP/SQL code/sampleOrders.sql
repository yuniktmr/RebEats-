
ALTER TABLE orders AUTO_INCREMENT = 1;

INSERT INTO orders(cus_id, rest_id, cost, `address`) VALUES(1,1,20,'1111 road');

INSERT INTO order_items(ord_id,item_id,instructions) VALUES(1, 1, "these are instructions");
INSERT INTO order_items(ord_id,item_id,instructions) VALUES(1, 2, "these are more instructions");
INSERT INTO order_items(ord_id,item_id,instructions) VALUES(1, 3, "these are also instructions");

INSERT INTO orders(cus_id, rest_id, cost, `address`) VALUES(1,1,20,'14 oxford road');

INSERT INTO order_items(ord_id,item_id,instructions) VALUES(2, 1, "these are instructions2");
INSERT INTO order_items(ord_id,item_id,instructions) VALUES(2, 3, "these are more instructions2");
INSERT INTO order_items(ord_id,item_id,instructions) VALUES(2, 2, "these are also instructions2");