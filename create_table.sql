/****** CREATE TABLE statements ******/

CREATE DATABASE Football;
USE Football;

/****** CREATE TABLE statements ******/
CREATE TABLE Competition (
    comp_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    comp_name VARCHAR(50) NOT NULL );

CREATE TABLE Teams (
    team_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    team_name VARCHAR(50) NOT NULL,
    Email VARCHAR(50) NOT NULL );

CREATE TABLE Fixtures (
    fixture_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fixture_date DATE NOT NULL,
    fixture_time TIME NOT NULL,
    home_teamID INT NOT NULL, 
    away_teamID INT NOT NULL,
    comp_id INT NOT NULL );

CREATE TABLE Player_positions (
    position_id INT NOT NULL PRIMARY KEY,
    position_descr TEXT );

CREATE TABLE Players(
    player_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    team_id INT NOT NULL,
    Fullname VARCHAR(50) NOT NULL,
    player_sqd_num INT NOT NULL );

CREATE TABLE Player_fixtures(
    fixture_id INT NOT NULL,
    player_id INT NOT NULL,
    goals_scored INT NOT NULL );

