DROP DATABASE IF EXISTS mealplan;
CREATE DATABASE mealplan;
use mealplan;
DROP TABLE IF EXISTS recipe;
DROP TABLE IF EXISTS instructions;
DROP TABLE IF EXISTS recIngredient;
DROP TABLE IF EXISTS ingredients;
DROP TABLE IF EXISTS measurement;
DROP TABLE IF EXISTS account;
DROP TABLE IF EXISTS kitchen;
DROP TABLE IF EXISTS supermarket;
DROP TABLE IF EXISTS meals;
DROP TABLE IF EXISTS breakfast;
DROP TABLE IF EXISTS lunch;
DROP TABLE IF EXISTS dinner;

CREATE TABLE recipe(
    recID int auto_increment not null,
    recDate date not null, 
    recName varchar(30) not null,
    calorie int(11) not null,
    primary key (recID)
);

CREATE TABLE instructions(
    instructID int not null,
    recID int not null,
    direction varchar(50) not null,
    primary key (recID, instructID),
    foreign key (recID) references recipe(recID) on update cascade on delete cascade
);

CREATE TABLE recIngredient(
    recID int not null,
    ingredientID int not null,
    measurement varchar(15) not null,
    primary key (recID, ingredientID),
    foreign key (recID) references recipe(recID) on update cascade on delete cascade,
    foreign key (ingredientID) references ingredients(ingrID) on update cascade on delete cascade
);

CREATE TABLE ingredients(
    ingrID int auto_increment not null,
    ingrName varchar(15) not null,
    primary key (ingrID)
);

CREATE TABLE measurement(
    measureID int auto_increment not null,
    measure varchar(15) not null,
    primary key (measureID)
);

CREATE TABLE kitchen(
    ingredID int auto_increment not null,
    quantity varchar(15) not null,
    ingredName varchar(15) not null,
    primary key (ingredID)
);

CREATE TABLE supermarket(
    groceryID int auto_increment not null,
    groceryname varchar(15) not null,
    quantity varchar(15) not null,
    primary key (groceryID)
);
/* MEALS */

CREATE TABLE meals(
    mealID int auto_increment not null,
    totalCal int not null,
    uName VARCHAR(30) NOT NULL,
    primary key (mealID),
    foreign key (uName) references account(uName) on update cascade on delete cascade
);

CREATE TABLE breakfast(
    mealID int auto_increment not null,
    recID int not null,
    servings int not null,
    calories varchar(50) not null,
    uName VARCHAR(30) NOT NULL,
    primary key (mealID),
    foreign key (recID) references recipe(recID) on update cascade on delete cascade,
    foreign key(uName) references account(uName) on update cascade on delete cascade
);

CREATE TABLE lunch(
    mealID int auto_increment not null,
    recID int not null,
    servings int not null,
    calories varchar(50) not null,
    uName VARCHAR(30) NOT NULL,
    primary key (mealID),
    foreign key (recID) references recipe(recID) on update cascade on delete cascade,
    foreign key(uName) references account(uName) on update cascade on delete cascade
);

CREATE TABLE dinner(
    mealID int auto_increment not null,
    recID int not null,
    servings int not null,
    calories varchar(50) not null,
    uName VARCHAR(30) NOT NULL,
    primary key (mealID),
    foreign key (recID) references recipe(recID) on update cascade on delete cascade,
    foreign key(uName) references account(uName) on update cascade on delete cascade
);

CREATE TABLE account ( 
    uName VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(30) NOT NULL,
    primary key(uName)
);
