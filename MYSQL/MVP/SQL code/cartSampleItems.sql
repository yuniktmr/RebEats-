
insert into items(rest_id, cost, name, images)
values ((SELECT rest_id FROM restaurants WHERE email = 'halo2305@gmail.com'), 20.00, "Pizza", "pizza.jpg");

insert into items(rest_id, cost, name, images)
values ((SELECT rest_id FROM restaurants WHERE email = 'halo2305@gmail.com'), 10.00, "Burger", "burger.jpg");

insert into items(rest_id, cost, name, images)
values ((SELECT rest_id FROM restaurants WHERE email = 'halo2305@gmail.com'), 9.00, "Sushi", "sushi.jpg");

insert into items(rest_id, cost, name, images)
values ((SELECT rest_id FROM restaurants WHERE email = 'halo2305@gmail.com'), 15.00, "Pasta", "pasta.jpg");