
insert into items(rest_id, cost, prod_cost, name, description)
values ((SELECT rest_id FROM restaurants WHERE email = 'halo2305@gmail.com'), 3.99, 1.0, "Banana", "yellow fruit");

insert into items(rest_id, cost, prod_cost, name, description)
values ((SELECT rest_id FROM restaurants WHERE email = 'halo2305@gmail.com'), 2.99, 1.0, "Strawberry", "red fruit");

insert into items(rest_id, cost, prod_cost, name, description)
values ((SELECT rest_id FROM restaurants WHERE email = 'halo2305@gmail.com'), 8.99, 1.0, "Spaghetti", "Pasta noodles");

insert into items(rest_id, cost, prod_cost, name, description)
values ((SELECT rest_id FROM restaurants WHERE email = 'halo2305@gmail.com'), 5.00, 1.0, "Burrito", "Beef burrito");