CREATE TABLE user_sessions(
    -- Session ID Tto be used in dashboards and references 
    session_id INT AUTO_INCREMENT PRIMARY KEY,

    -- User ID reference
    user_id INT NOT NULL,

    -- sESSION ATTRIBUTE
    session_start DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    session_end DATETIME DEFAULT NULL,
    session_duration INT DEFAULT NULL,

    -- Contraints and Foreign Key Implementation
    CONSTRAINT fk_user_session_user_id
        FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON DELETE CASCODE
        ON UPDATE CASCODE
);