-- CREATE TABLE tbl_admin(
--     admin_id serial primary key,
--     admin_name varchar(255) NOT NULL UNIQUE,
--     admin_username varchar(255) NOT NULL UNIQUE,
--     admin_password varchar(255) NOT NULL UNIQUE,
--     admin_img varchar(255),
--     admin_address varchar(255),
--     admin_phone numeric(10) NOT NULL UNIQUE,
--     admin_email varchar(255) NOT NULL UNIQUE
-- );

-- INSERT INTO tbl_admin(admin_name, admin_username, admin_password, admin_img, admin_address, admin_phone, admin_email)
-- VALUES 
-- ('sameer jagtap','samjagtap','samsj@2010','sam.jpg','jejuri',9604183192,'samjagtap041@gmail.com'),
-- ('rutik yadav','rutikyadav','rutik','rutik.jpg','jejuri',9088776655,'rutikyadav@gmail.com');


-- SELECT * FROM tbl_admin;


-- CREATE TABLE tbl_category(
--     category_id serial PRIMARY KEY,
--     category_name varchar(100),
--     category_active varchar(100) CONSTRAINT category_active
--         CHECK (category_active = 'Active' or category_active = 'active' or category_active = 'Not Active' or category_active = 'not active')
-- );

-- INSERT INTO tbl_category(category_name,category_active)
-- VALUES ('Drink','Active'),
-- ('BreckFast','Active'),
-- ('Dinner','Active');

-- SELECT * FROM tbl_category;


-- CREATE TABLE tbl_menu(
--     menu_id serial PRIMARY KEY,
--     menu_name varchar(255),
--     menu_img varchar(255),
--     menu_description varchar(255),
--     menu_price float,
--     menu_active varchar(100) CONSTRAINT menu_active
--          CHECK (menu_active = 'Active' or menu_active = 'active' or menu_active = 'Not Active' or menu_active = 'not active'),
--     category_id serial REFERENCES tbl_category
-- );


-- INSERT INTO tbl_menu(menu_name,menu_img,menu_description,menu_price,menu_active,category_id)
-- VALUES ('Citrus peach cooler','Citrus-peach-cooler.jpg','Grapefruit, pomelo but we particularly like blood oranges.',200,'Active',1);

-- SELECT * FROM tbl_menu;


-- SELECT * FROM tbl_menu 
-- WHERE category_id in (SELECT category_id FROM tbl_category WHERE category_active = 'Active')
-- AND category_id = 1 AND menu_active = 'Active';




-- CREATE TABLE tbl_customer(
--     cust_id serial PRIMARY KEY,
--     cust_name varchar(150),
--     cust_phone numeric(10) NOT NULL UNIQUE,
--     cust_username varchar(255) NOT NULL UNIQUE,
--     cust_pass varchar(255) NOT NULL UNIQUE,
--     cust_email varchar(255) NOT NULL UNIQUE,
--     cust_img varchar(255),
--     cust_address varchar(255)
-- );

-- INSERT INTO tbl_customer(cust_name,cust_phone,cust_username,cust_pass,cust_email,cust_img,cust_address)
-- VALUES ('sameer jagtap',9604183192,'samjagtap','sam','samjagtap041@gmail.com','sam.jpg','jejuri'),
-- ('rutik yadav',9088776655,'rutikraj','rutik','rutik@gmail.com','rutik.jpg','jejuri');

-- SELECT * FROM tbl_customer;



-- CREATE TABLE tbl_cart(
--     cart_id serial PRIMARY KEY,
--     cust_id serial REFERENCES tbl_customer,
--     menu_id serial REFERENCES tbl_menu,
--     added_on timestamp DEFAULT CURRENT_TIMESTAMP
-- );

-- INSERT INTO tbl_cart(cust_id,menu_id)
-- VALUES (1,15),
-- (2,13);

-- SELECT * FROM tbl_cart;

-- SELECT menu_name,menu_img,menu_description,menu_price,menu_active
-- FROM tbl_menu,tbl_cart 
-- WHERE cust_id = 1;




-- CREATE TABLE tbl_stuff(
--     stuff_id serial PRIMARY KEY,
--     stuff_name varchar(100),
--     stuff_address varchar(255),
--     stuff_possition varchar(100),
--     stuff_img varchar(255)
-- );

-- INSERT INTO tbl_stuff(stuff_name, stuff_address, stuff_possition, stuff_img)
-- VALUES ('Williamson','pune','Halwai chef','Williamson.jpg'),
-- ('Kristiana','mumbai','Head Chef','Kristiana.jpg'),
-- ('Steve Thomas','mumbai','Senior or mid-level Chef','Steve-Thomas.jpg');
-- ('David','LA','Commis Chef','David.jpg'),
-- ('Edward','mumbai','Kitchen chef','Edward.jpg'),
-- ('Robert','mumbai','Continental Cook','Robert.jpg');

-- SELECT * FROM tbl_stuff;



-- CREATE TABLE tbl_contact(
--     cont_id serial PRIMARY KEY,
--     name varchar(100),
--     email varchar(255),
--     message varchar(555),
--     cust_id serial REFERENCES tbl_customer,
--     time_stamp timestamp DEFAULT CURRENT_TIMESTAMP
-- );

-- INSERT INTO tbl_contact(name, email, message,  cust_id)
-- VALUES 
-- ('sameer jagtap','samjagtap041@gmail.com','ssucns aiisw cooee vooejc diijw ifhbf fuwhuhbwd uigdqb uhuhwv',3);

-- SELECT * FROM tbl_contact;



-- CREATE TABLE tbl_blog(
--     blog_id serial PRIMARY KEY,
--     blog_title varchar(255),
--     content varchar(20000),
--     writer_name varchar(255),
--     img varchar(255),
--     admin_id serial REFERENCES tbl_admin,
--     time_stamp timestamp DEFAULT CURRENT_TIMESTAMP
-- );

-- SELECT * FROM tbl_blog;


-- select to_timestamp ('time_stamp', 'DD.MM.YYYY HH24:MI:SS')::time

-- SELECT DATE(time_stamp) FROM tbl_blog;




-- CREATE TABLE tbl_comments(
--     comment_id serial PRIMARY KEY,
--     cust_id serial REFERENCES tbl_customer,
--     cust_username varchar(255),
--     comment text,
--     posted_on timestamp DEFAULT CURRENT_TIMESTAMP,
--     blog_id serial REFERENCES tbl_blog
-- );

-- INSERT INTO tbl_comments(cust_id, cust_username, comment, blog_id) 
-- VALUES (1,'sameer','nice',8);

-- SELECT * FROM tbl_comments;




-- CREATE TABLE tbl_orders(
--     order_id serial PRIMARY KEY,
--     cust_id serial REFERENCES tbl_customer,
--     menu_id serial REFERENCES tbl_menu,
--     qty int,
--     shipping_charges float,
--     total float,
--     size varchar(20) CONSTRAINT size
--         CHECK (size = 'small' or size = 'middium' or size = 'large'),
--     status varchar(20) CONSTRAINT status
--         CHECK (status = 'Placed' or status = 'In-Kitchen' or status = 'On-The-Way' or status = 'Delivered' or status = 'Canceled'),
--     date_time date DEFAULT CURRENT_DATE
-- );

-- SELECT * FROM tbl_orders;




-- CREATE TABLE tbl_order_cancel_msg(
--     msg_id serial PRIMARY KEY,
--     order_id serial REFERENCES tbl_orders,
--     cust_name varchar(255),
--     status int  CONSTRAINT status
--         CHECK (status = 0 or status = 1 ),
--     date_time date DEFAULT CURRENT_DATE
-- );

-- SELECT * FROM tbl_order_cancel_msg;


-- SELECT date_time FROM tbl_orders WHERE date_time = now();


-- CREATE TABLE tbl_table(
--     table_id serial PRIMARY KEY,
--     cust_id serial REFERENCES tbl_customer,
--     cust_name varchar(255),
--     cust_email varchar(255),
--     cust_phone numeric(10),
--     booking_date date,
--     booking_time time,
--     no_of_persons int,
--     income float,
--     status int  CONSTRAINT status
--         CHECK (status = 0 or status = 1 )
-- );

-- INSERT INTO tbl_table(cust_id,cust_name,cust_email,cust_phone,booking_date,booking_time,no_of_persons,income,status)
-- VALUES(7,'asmita harpale','asmita@gmail.com','9988776655','6-4-2021','11:30',4,200,1);

-- SELECT * FROM tbl_table;




-- select * from  tbl_table  WHERE booking_date < CURRENT_DATE OR booking_date = CURRENT_DATE AND booking_time < LOCALTIME ;















































































-- CREATE table ex3(
--     id serial PRIMARY KEY,
--     name varchar(100),
--     date date DEFAULT CURRENT_DATE
-- );
-- ALTER TABLE tbl_orders ALTER COLUMN date_time TYPE date DEFAULT CURRENT_DATE;

-- INSERT INTO ex3 VALUES(1,'sam');

-- SELECT * FROM ex3;

-- SELECT date FROM ex3 WHERE date = CURRENT_DATE;


-- CREATE TABLE tbl_orders2(
--     order_id serial PRIMARY KEY,
--     cust_id serial REFERENCES tbl_customer,
--     menu_id serial REFERENCES tbl_menu,
--     qty int,
--     shipping_charges float,
--     total float,
--     size varchar(20) CONSTRAINT size
--         CHECK (size = 'small' or size = 'middium' or size = 'large'),
--     status varchar(20) CONSTRAINT status
--         CHECK (status = 'Placed' or status = 'In-Kitchen' or status = 'On-The-Way' or status = 'Delivered' or status = 'Canceled'),
--     date_time timestamp DEFAULT CURRENT_TIMESTAMP
-- );

-- SELECT * FROM tbl_orders2;

-- ALTER TABLE tbl_orders2 ALTER COLUMN date_time TYPE timestamp WITH time ZONE USING CURRENT_DATE;


-- INSERT INTO tbl_orders2(cust_id,menu_id,qty,shipping_charges,total,size,status)
-- VALUES(6,20,2,50,550,'small','Placed');
-- SELECT * FROM tbl_orders2;

-- SELECT * FROM tbl_orders2;


select * from tbl_customer;