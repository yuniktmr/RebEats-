
ALTER TABLE items AUTO_INCREMENT = 1;

insert into items(rest_id, cost, name, description)
values ((SELECT rest_id FROM restaurants WHERE email = 'halo2305@gmail.com'), 3.99, "Banana", "yellow fruit");

insert into items(rest_id, cost, name, description)
values ((SELECT rest_id FROM restaurants WHERE email = 'halo2305@gmail.com'), 2.99, "Strawberry", "red fruit");

insert into items(rest_id, cost, name, description)
values ((SELECT rest_id FROM restaurants WHERE email = 'halo2305@gmail.com'), 8.99, "Spaghetti", "Pasta noodles");

insert into items(rest_id, cost, name, description)
values ((SELECT rest_id FROM restaurants WHERE email = 'halo2305@gmail.com'), 5.00, "Burrito", "Beef burrito");