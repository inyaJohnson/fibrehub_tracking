use tracking;
create table customer_info(id INT AUTO_INCREMENT PRIMARY KEY, 
customer_id VARCHAR(10),
customer_name VARCHAR(30),
phone VARCHAR(11),
email VARCHAR(50),
address VARCHAR(100)
);

create table service_info(
service_id INT AUTO_INCREMENT PRIMARY KEY,
service VARCHAR(50),
bandwidth VARCHAR(50),
location VARCHAR(50),
cloud_no int,
modem_no VARCHAR(50),
ip_address VARCHAR(50),
id int,
CONSTRAINT customer_info_id_fk FOREIGN KEY (id) REFERENCES customer_info(id)
);


create table technician_info(
technician_id INT AUTO_INCREMENT PRIMARY KEY, 
technician_name VARCHAR(50),
technician_email VARCHAR(50),
id int,
CONSTRAINT service_info_id_fk FOREIGN KEY (id) REFERENCES service_info(id)
);

create table customer_marketer(
    customer_marketer_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_marketer_name VARCHAR(50),
    id int,
    CONSTRAINT technician_info_id_fk FOREIGN KEY (id) REFERENCES technician_info(id)
    );

CREATE TABLE payment_info(
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    pay_date VARCHAR(20),
    due_date VARCHAR(20),
    amount VARCHAR(10),
    outstanding VARCHAR(10),
    notification int DEFAULT 0,
    id int,
    CONSTRAINT customer_marketer_id_fk FOREIGN KEY(id) REFERENCES customer_marketer(id) 
    );

