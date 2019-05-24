CREATE TABLE staff_personal_info(staff_id INT AUTO_INCREMENT PRIMARY KEY, 
last_name VARCHAR(50), 
other_names VARCHAR(50), 
sex VARCHAR(10),
status VARCHAR(10), 
dof VARCHAR(10), 
email VARCHAR(50), 
phone VARCHAR(11), 
address VARCHAR(100),
state VARCHAR(50), 
profile_picture VARCHAR(50)
);

CREATE TABLE staff_health_info(staff_health_id INT AUTO_INCREMENT PRIMARY KEY, 
disability VARCHAR(100) DEFAULT 'None', 
blood_group VARCHAR(20), 
genotype VARCHAR(10), 
allergy VARCHAR(100) DEFAULT 'None', 
staff_id INT,
CONSTRAINT staff_personal_info_staff_id_fk FOREIGN KEY(staff_id) REFERENCES staff_personal_info(staff_id)
);

CREATE TABLE staff_next_of_kin_info(staff_next_of_kin_id INT AUTO_INCREMENT PRIMARY KEY, 
next_of_kin_name VARCHAR(50), 
next_of_kin_telephone VARCHAR(11), 
next_of_kin_email VARCHAR(50), 
next_of_kin_address VARCHAR(50), 
staff_id INT, 
CONSTRAINT staff_health_info_staff_id_fk FOREIGN KEY(staff_id) REFERENCES staff_health_info(staff_id)
);

CREATE TABLE staff_bank_info(staff_bank_id INT AUTO_INCREMENT PRIMARY KEY, 
account_name VARCHAR(50), 
account_number VARCHAR(20),
bank_name VARCHAR(50),
staff_id INT,
CONSTRAINT staff_next_of_kin_info_staff_id_fk FOREIGN KEY (staff_id) REFERENCES staff_next_of_kin_info(staff_id) 
);

CREATE TABLE staff_employment_info(staff_employment_id INT AUTO_INCREMENT PRIMARY KEY, 
employer_name VARCHAR(50), 
role VARCHAR(50),
date_of_employment VARCHAR(12),
department VARCHAR(50),
worktool BLOB,
staff_id INT,
CONSTRAINT staff_bank_info_staff_id_fk FOREIGN KEY (staff_id) REFERENCES staff_bank_info(staff_id) 
)