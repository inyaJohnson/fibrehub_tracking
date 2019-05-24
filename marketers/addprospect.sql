use tracking;
create table prospect_info(prospect_id INT AUTO_INCREMENT PRIMARY KEY,
first_name VARCHAR(30),
last_name VARCHAR(30),
address VARCHAR(100),
email VARCHAR(50),
phone VARCHAR(11),
contact_date date
);

create table organisation_info(
organisation_id INT AUTO_INCREMENT PRIMARY KEY,
organisation_name VARCHAR(50),
organisation_email VARCHAR(50),
organisation_telephone VARCHAR(11),
prospect_id int,
CONSTRAINT prospect_info_prospect_id_fk FOREIGN KEY (prospect_id) REFERENCES prospect_info(prospect_id)
);


create table marketer_info(
marketer_id INT AUTO_INCREMENT PRIMARY KEY, 
marketer_name VARCHAR(50),
marketer_email VARCHAR(50),
prospect_id int,
CONSTRAINT organisation_info_prospect_id_fk FOREIGN KEY (prospect_id) REFERENCES organisation_info(prospect_id)
);
