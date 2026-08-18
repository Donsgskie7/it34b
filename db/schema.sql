        CREATE TABLE users(
            User_id AUTO_INCREMENT PRIMARY KEY ,
            user_email VARCHAR(255) UNIQUE NOT NULL ,
            user_password VARCHAR(255) NOT NULL ,
            user_role('admin','manager','user') DEFAULT 'user',


== Email verification fields
user_is_verified TINYTINT(1) NOT NULL DEFAULT 0,
user_verification_token VARCHAR(255) DEFAULT NULL,
user_email_verification_expires DATETIME DEFAULT NULL,

== Date parameter
user_create_at DEFAULT TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
user_update_at DEFAULT TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

);