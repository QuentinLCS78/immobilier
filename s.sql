-- Création de la base de données
CREATE DATABASE IF NOT EXISTS OmnesImmobilier;
USE OmnesImmobilier;

-- Création de la table des agents
CREATE TABLE agents (
    agent_id INT AUTO_INCREMENT PRIMARY KEY,
    agent_name VARCHAR(255) NOT NULL,
    agent_email VARCHAR(255) NOT NULL,
    agent_phone VARCHAR(50),
    agent_photo VARCHAR(255)  -- URL ou chemin du fichier pour la photo
);   

-- Création de la table des disponibilités
CREATE TABLE availability (
    availability_id INT AUTO_INCREMENT PRIMARY KEY,
    agent_id INT,
    available_date DATE,
    available_time TIME,
    FOREIGN KEY (agent_id) REFERENCES agents(agent_id)
);

-- Insertion des agents
INSERT INTO agents (agent_name, agent_email, agent_phone, agent_photo) VALUES
('John Doe', 'johndoe@example.com', '123-456-7890', 'images/johndoe.jpg'),
('Jane Smith', 'janesmith@example.com', '234-567-8901', 'images/janesmith.jpg'),
('Alice Johnson', 'alicej@example.com', '345-678-9012', 'images/alicej.jpg'),
('Bob Brown', 'bobb@example.com', '456-789-0123', 'images/bobb.jpg'),
('Emma Wilson', 'emmaw@example.com', '567-890-1234', 'images/emmaw.jpg');

-- Insertion des disponibilités des agents
INSERT INTO availability (agent_id, available_date, available_time) VALUES
(1, '2024-06-01', '09:00:00'),
(1, '2024-06-01', '13:00:00'),
(2, '2024-06-02', '10:00:00'),
(2, '2024-06-02', '14:00:00'),
(3, '2024-06-03', '11:00:00'),
(3, '2024-06-03', '15:00:00'),
(4, '2024-06-04', '09:00:00'),
(4, '2024-06-04', '13:00:00'),
(5, '2024-06-05', '10:00:00'),
(5, '2024-06-05', '14:00:00');
